<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class ImageController extends Controller
{
    public function showImageUploadForm()
    {
        // List existing images in storage/app/public/uploads
        $files = Storage::disk('public')->files('uploads');
        // Only include typical image files
        $images = collect($files)
            ->filter(function ($path) {
                return preg_match('/\.(jpe?g|png|gif|webp)$/i', $path);
            })
            ->map(function ($path) {
                // Build thumb path: uploads/foo.webp -> uploads/thumbs/foo_thumb.webp
                $thumbPath = preg_replace('/^uploads\//', 'uploads/thumbs/', $path);
                $thumbPath = preg_replace('/\.([^.]+)$/', '_thumb.$1', $thumbPath);

                return [
                    'path' => $path,
                    'url' => asset('storage/' . $path),
                    'thumb_url' => asset('storage/' . $thumbPath),
                ];
            })
            ->values();

        return view('admin.images.upload', compact('images'));
    }

    public function uploadImages(Request $request)
    {
        // Validate multiple image upload
        $validated = $request->validate([
            'images' => ['required', 'array', 'max:20'],
            'images.*' => ['file', 'image', 'mimes:jpeg,jpg,png,gif,webp', 'max:5120'], // max 5MB each
        ]);

        // Configure Intervention Image to use an available driver
        $driver = extension_loaded('imagick') ? 'imagick' : (extension_loaded('gd') ? 'gd' : null);
        if (!$driver) {
            return back()->withErrors('Image processing requires the GD or Imagick PHP extension. Please enable one of them and try again.');
        }
        Image::configure(['driver' => $driver]);

        $stored = [];

        foreach ($request->file('images', []) as $file) {
            // Create unique filenames
            $basename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $safeBase = preg_replace('/[^A-Za-z0-9_-]/', '_', $basename);
            $timestamp = now()->format('YmdHisv');
            $filename = $safeBase . '_' . $timestamp . '.webp';
            $thumbname = $safeBase . '_' . $timestamp . '_thumb.webp';

            // Read original
            $img = Image::make($file->getRealPath());
            // Fix orientation based on EXIF data if present (guard if EXIF is unavailable)
            if (function_exists('exif_read_data')) {
                try { $img->orientate(); } catch (\Throwable $e) { /* ignore if exif unsupported */ }
            }

            // Resize to a reasonable max size, keep aspect ratio, prevent upsizing
            $img->resize(1920, 1920, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('webp', 85);

            // Save processed main image
            Storage::disk('public')->put('uploads/' . $filename, (string) $img);

            // Create and save a square thumbnail (center crop)
            $thumb = Image::make($file->getRealPath());
            if (function_exists('exif_read_data')) {
                try { $thumb->orientate(); } catch (\Throwable $e) { /* ignore */ }
            }
            // Fit to 400x400 while keeping important center
            $thumb->fit(400, 400, function ($constraint) {
                $constraint->upsize();
            })->encode('webp', 80);

            Storage::disk('public')->put('uploads/thumbs/' . $thumbname, (string) $thumb);

            $stored[] = [
                'path' => 'uploads/' . $filename,
                'thumb' => 'uploads/thumbs/' . $thumbname,
            ];
        }

        return back()->with('status', count($stored) . ' image(s) uploaded successfully.');
    }
}

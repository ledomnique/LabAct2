<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    // Show a list of posts
    public function index()
    {
        // show posts oldest first 
        $posts = Post::oldest()->paginate(10);
        // get trashed posts for the Trash section
        $trashed = Post::onlyTrashed()->latest()->paginate(5, ['*'], 'trashed_page');

        return view('admin.posts.index', compact('posts', 'trashed'));
    }

    // Show a single post
    public function show(string $id)
    {
        $post = Post::find($id);

        return view('admin.posts.show', compact('post'));
    }

    // Show a single post for a normal user (only if they own it)
    public function showForUser(string $postId)
    {
        $user = Auth::user();
        $post = Post::find($postId);
        if (!$user || $post->user_id !== $user->id) {
            abort(403);
        }

        return view('user.post', compact('post'));
    }

    // // Show the form to create a new post - obsolete function (deleted)
    // public function create()
    // {
    //     return view('admin.posts.create');
    // }

    // Show the form to edit an existing post
    public function edit(string $id)
    {
        // only admins can edit posts
        $user = Auth::user();
        if (!$user || $user->role !== 'admin') {
            abort(403);
        }

        $post = Post::find(id: $id);


        return view('admin.posts.edit', compact('post'));
    }

    // Store a new post
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $user = Auth::user();
            if ($user && $user->role === 'admin') {
                return redirect()->route('admin.posts.index')
                    ->withErrors($validator)
                    ->withInput();
            }

            return redirect()->route('user.my-posts')
                ->withErrors($validator)
                ->withInput();
        }

        $data = $validator->validated();
        // attach the current user as the author
        $data['user_id'] = Auth::id();

        // Create the post from the form found in admin/posts/index.blade.php
        Post::create($data);

        // Flash message on successful post creation
        $user = Auth::user();
        if ($user && $user->role === 'admin') {
            return redirect()->route('admin.posts.index')->with('success', 'Your post was successfully created.');
        }

        return redirect()->route('user.my-posts')->with('success', 'Your post was successfully created.');

    }

    // Update an existing post
    public function update(Request $request, string $id)
    {
        // only admins can update posts
        $user = Auth::user();
        if (!$user || $user->role !== 'admin') {
            abort(403);
        }

        $post = Post::find(id: $id);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $post->update($data);

        return redirect()->route('admin.posts.show', $post)->with('success', 'Your post was successfully updated.');
    }

    // utilizing eloquent ORM on the following functions:
    // Soft-delete a post (admin only)
    public function destroy(Request $request, string $id)
    {
        $post = Post::find(id: $id);

        $user = Auth::user();
        if (!$user || $user->role !== 'admin') {
            abort(403);
        }

        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Post is successfully trashed.');
    }

    // Restore a soft-deleted post (admin only)
    public function restore($id)
    {
        $user = Auth::user();
        if (!$user || $user->role !== 'admin') {
            abort(403);
        }

        $post = Post::onlyTrashed()->findOrFail($id);
        $post->restore();

        return redirect()->route('admin.posts.index')->with('success', 'Post has been successfully restored.');
    }

    // Permanently delete a post (admin only)
    public function forceDelete($id)
    {
        $user = Auth::user();
        if (!$user || $user->role !== 'admin') {
            abort(403);
        }

        $post = Post::onlyTrashed()->findOrFail($id);
        $post->forceDelete();

        return redirect()->route('admin.posts.index')->with('success', 'Post has been permanently deleted.');
    }
}
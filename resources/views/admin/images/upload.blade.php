<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Images') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <h3 class="text-xl font-semibold text-gray-900 mb-4 p-3">Image Upload</h3>

                @if (session('status'))
                    <div class="mb-4 rounded-md bg-green-50 p-3 text-green-800">
                        {{ session('status') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-4 rounded-md bg-red-50 p-3 text-red-800">
                        <ul class="list-disc pl-5 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.images.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    <div>
                        <label for="images" class="block text-sm font-medium text-gray-700">Select images</label>
                        <input id="images" name="images[]" type="file" multiple accept="image/*"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
                        <p class="mt-1 text-sm text-gray-500">You can select up to 20 images. Max 5MB each.</p>
                    </div>
                    <div>
                        <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Upload
                        </button>
                    </div>
                </form>

                @isset($images)
                    <div class="mt-8">
                        <h4 class="text-lg font-semibold text-gray-900 mb-3">Uploaded Images</h4>
                        @if (count($images) === 0)
                            <p class="text-sm text-gray-500">No images uploaded yet.</p>
                        @else
                            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
                                @foreach ($images as $image)
                                    <div class="rounded-lg border p-2 bg-gray-50">
                                        <a href="{{ $image['url'] }}" target="_blank" rel="noopener">
                                            <img src="{{ $image['thumb_url'] }}" alt="Uploaded image" class="w-full h-32 object-cover rounded" loading="lazy">
                                        </a>
                                        <div class="mt-2 text-[10px] text-gray-600 break-words">
                                            {{ basename($image['path']) }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endisset
            </div>
        </div>
    </div>

</x-app-layout>
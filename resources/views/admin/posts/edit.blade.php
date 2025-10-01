<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="mb-6">
                    <a href="{{ url('admin/posts/') }}" class="text-indigo-600 hover:text-indigo-900">&larr; Back to posts</a>
                </div>
                <form method="POST" action="{{ url('admin/posts/' . $post->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 gap-4">
                        <input name="title" placeholder="Title" class="border rounded p-2" value="{{ old('title', $post->title) }}">
                        <textarea name="body" placeholder="Body" class="border rounded p-2" rows="8">{{ old('body', $post->body) }}</textarea>
                        <div>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500">Save Post</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

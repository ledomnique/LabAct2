<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8 px-10">
                <div class="mb-6">
                    <a href="{{ url('/admin/posts/') }}" class="text-indigo-600 hover:text-indigo-900">&larr; Back to posts</a>
                    |
                    <a href="{{ url('/admin/posts/' . $post->id . '/edit') }}" class="text-green-600 hover:text-green-900">Edit</a>
                </div>
                <h1 class="text-2xl font-bold mb-2">{{ $post->title }}</h1>
                <div class="text-sm text-gray-500 mb-4">
                    {{ $post->created_at->format('m-d-Y') }}
                </div>

                <div class="prose max-w-none">
                    {!! nl2br(e($post->body)) !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

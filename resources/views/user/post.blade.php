<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 mb-6">
                <div class="mb-6">
                    <a href="{{ url('user/my-posts') }}" class="text-indigo-600 hover:text-indigo-900">&larr; Back to my posts</a>
                </div>
                <h3 class="text-2xl font-semibold">{{ $post->title }}</h3>
                <p class="text-sm text-gray-500">{{ optional($post->user)->name ?? 'You' }} • {{ $post->created_at->format('Y-m-d') }}</p>
                <div class="mt-4 prose">
                    {!! nl2br(e($post->body)) !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

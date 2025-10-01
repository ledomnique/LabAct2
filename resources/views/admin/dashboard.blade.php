<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <div class="text-sm text-gray-500">Number of Posts</div>
                    <div class="mt-2 text-3xl font-bold text-gray-800">{{ \App\Models\Post::count() }}</div>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mt-6">
                <div class="p-6">
                    <div class="text-sm text-gray-500">Number of Users</div>
                    <div class="mt-2 text-3xl font-bold text-gray-800">{{ \App\Models\User::count() }}</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-9">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Create post form -->
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 mb-6">
                @if(session('success'))
                <div class="mb-2 text-green-700 bg-green-100 p-3 rounded">
                    {{ session('success') }}
                </div>
                @endif

                <div class="mb-4 text-xl font-semibold">
                    <h1>Create A Post</h1>
                </div>
                <form method="POST" action="{{ url('admin/posts') }}">
                    @csrf
                    <div class="grid grid-cols-1 gap-4">
                        <div>
                            <input name="title" placeholder="Post Title" class="border rounded p-2 w-full" value="{{ old('title') }}">
                            @if($errors->has('title'))
                                    <p class="text-sm text-red-600 mt-1">{{ $errors->first('title') }}</p>
                            @endif
                        </div>
                        <div>
                            <textarea name="body" placeholder="Post Content..." class="border rounded p-2 w-full" rows="4">{{ old('body') }}</textarea>
                            @if($errors->has('body'))
                                    <p class="text-sm text-red-600 mt-1">{{ $errors->first('body') }}</p>
                            @endif
                        </div>
                        
                        <div>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500">Add Post</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Posts table -->
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-5 text-xl font-semibold">
                    <h1>All Posts</h1>
                </div>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Content</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Posted By</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created At</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            <th class="px-6 py-3 bg-gray-50"></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($posts as $post)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $post->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ Illuminate\Support\Str::limit($post->title, 30, '...') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ \Illuminate\Support\Str::limit($post->body, 40, '...') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $post->user ? $post->user->name : 'N/A' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $post->created_at->format('Y-m-d') }}</td>
                                
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{ url('admin/posts/' . $post->id) }}" class="text-indigo-600 hover:text-indigo-900">View</a>
                                    |
                                    <a href="{{ url('admin/posts/' . $post->id . '/edit') }}" class="text-green-600 hover:text-green-900">Edit</a>
                                    |
                                    <a href="{{ url('admin/posts/' . $post->id . '/destroy') }}" class="text-red-600 hover:text-red-900">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="p-4">
                    {{ $posts->links('vendor.pagination.custom') }}
                </div>
            </div>
            
            <!-- Trash / Deleted posts -->
            @if(isset($trashed) && $trashed->count())
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mt-6 p-4">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Trash - Deleted Posts</h3>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Posted By</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Deleted At</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($trashed as $t)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $t->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $t->title }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $t->user ? $t->user->name : 'N/A' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ optional($t->deleted_at)->format('Y-m-d H:i') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <form method="POST" action="{{ url('admin/posts/' . $t->id . '/restore') }}" class="inline-block">
                                        @csrf
                                        <button type="submit" class="text-blue-600 hover:text-blue-900">Restore</button>
                                    </form>
                                    |
                                    <form method="POST" action="{{ url('admin/posts/' . $t->id . '/force-delete') }}" class="inline-block" onsubmit="return confirm('Permanently delete this post? This cannot be undone.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">Delete Permanently</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="p-4">
                    {{ $trashed->links('vendor.pagination.custom') }}
                </div>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>

<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
// use App\Http\Middleware\EnsureTokenIsValid;
use App\Http\Controllers\PostController;
use App\Http\Middleware\EnsureUserHasRole;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/guide', function () {
    return view('guide');
})->name('guide');

Route::get('/developer', function () {
    return view('developer');
})->name('developer');

Route::get('/audience', function () {
    return view('audience');
})->name('audience');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        $user = Auth::user();
        if ($user && $user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        if ($user && $user->role === 'user') {
            return redirect()->route('user.dashboard');
        }

        return view('dashboard');
    })->name('dashboard');
    
    // Admin routes
    Route::middleware('ensure.role:admin')->prefix('admin')->group(function() {

            // Admin dashboard (catch-all route)
            Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard')->where('any', '.*');

            // page to view all users
            Route::get('/users', [AdminController::class, 'listUsers'])->name('admin.users.index');

            // for posts
            Route::get('/posts', [PostController::class, 'index'])->name('admin.posts.index');
            Route::post('/posts', [PostController::class, 'store'])->name('admin.posts.store');
            Route::put('/posts/{id}', [PostController::class, 'update'])->name('admin.posts.update');
            Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('admin.posts.edit');
            Route::get('/posts/{id}', [PostController::class, 'show'])->name('admin.posts.show');

            // soft-delete posts
            Route::get('/posts/{id}/destroy', [PostController::class, 'destroy'])->name('admin.posts.destroy.get');
            Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('admin.posts.destroy');
            Route::post('/posts/{id}/restore', [PostController::class, 'restore'])->name('admin.posts.restore');
            Route::delete('/posts/{id}/force-delete', [PostController::class, 'forceDelete'])->name('admin.posts.forceDelete');
    });
    
    //User routes
    Route::middleware('ensure.role:user')->prefix('user')->group(function () {
            Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
            Route::get('/my-posts', [UserController::class, 'index'])->name('user.my-posts');
        // allow users to create posts (store) and view their own posts
            Route::post('/posts', [PostController::class, 'store'])->name('user.posts.store');
            Route::get('/posts/{id}', [PostController::class, 'showForUser'])->name('user.posts.show');
    });
});

// Error route if token is invalid
Route::get('/error', function() {
    return view('error');
})->name('error');

// Protected route for posts, requires valid token
// Route::get('/posts', function() {
//     return view('posts.index');
// })->name('posts.index')->middleware(EnsureTokenIsValid::class);

// Group routes for Posts that require the token middleware
// Route::middleware(EnsureTokenIsValid::class)->group(function () {
//     Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

//     Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
// });

// Route::get('/posts', [PostController::class, 'index'])->name('posts.index')->middleware('auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified', 'ensure.admin');
// Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create')->middleware('auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified', 'ensure.admin');





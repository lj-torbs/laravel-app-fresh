<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Ideas;
use App\Models\Post;
use App\Models\User; 
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;

Route::view('/', 'welcome', [
    'greeting' => 'Hello, World!',
    'name' => 'John Doe',
    'age' => 30,
    'tasks' => [
        'Learn Laravel',
        'Build a project',
        'Deploy to production',
    ],
]);

Route::view('/about', 'about');
Route::view('/contact', 'contact');

Route::get('/register', function () {
    return view('user_registration');
})->name('users.create');

Route::post('/register', function (Request $request) {
    $validated = $request->validate([
        'first_name'     => 'required|string|max:255',
        'last_name'      => 'required|string|max:255',
        'middle_name'    => 'nullable|string|max:255',
        'nickname'       => 'nullable|string|max:255',
        'email'          => 'required|email|unique:users,email',
        'age'            => 'required|numeric',
        'address'        => 'required',
        'contact_number' => 'required',
        'password'       => 'required|min:6',
    ]);

    User::create([
        'first_name'     => $validated['first_name'],
        'last_name'      => $validated['last_name'],
        'middle_name'    => $validated['middle_name'],
        'nickname'       => $validated['nickname'],
        'email'          => $validated['email'],
        'age'            => $validated['age'],
        'address'        => $validated['address'],
        'contact_number' => $validated['contact_number'],
        'password'       => bcrypt($request->password), 
    ]);

    return back()->with('status', 'User saved successfully!');
})->name('users.store');

Route::get('/users', [UserController::class, 'index'])->name('users.index');

Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');

Route::delete('/users/{id}', function ($id) {
    \App\Models\User::findOrFail($id)->delete();
    return back()->with('status', 'User removed successfully!');
})->name('users.destroy');

Route::get('/formtest', function(){
    $posts = Post::all();
    return view('formtest',[
        'posts' => $posts,
    ]);
});

Route::post('/formtest', function(){
    Post::create([
        'description' => request('description'),
    ]);
    return redirect('/formtest');
});

Route::delete('/formtest/{id}', function ($id) {
    Post::findOrFail($id)->delete();
    return redirect('/formtest');
});

Route::get('/delete', function(){
    Post::truncate();  
    return redirect('/formtest');
});

Route::get('/posts', function(){
    $posts = Post::all();
    return view('posts.index', ['posts' => $posts]);
});

Route::get('/posts/{post}', function (Post $post) {
    return view('posts.show', ['post' => $post]);
});

Route::get('/posts/{post}/edit', function (Post $post) {
    return view('posts.edit', ['post' => $post]);
});

Route::patch('/posts/{post}', function (Post $post) {
    $post->update([
        'description' => request('description'),
        'updated_at' => now(),
    ]);
    return redirect('/posts/' . $post->id);
});
<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Ideas;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\User;


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


//index
Route::get('/posts', function(){
    $posts = Post::all();

    return view('posts.index', [
        'posts' => $posts,
    ]);
});

//show
Route::get('/posts/{post}', function (Post $post) {
    return view('posts.show', [
        'post' => $post,
    ]);
});

//edit
Route::get('/posts/{post}/edit', function (Post $post) {
    return view('posts.edit', [
        'post' => $post,
    ]);
}
);

//update
Route::patch('/posts/{post}', function (Post $post) {
    $post->update([
        'description' => request('description'),
        'updated_at' => now(),
    ]);

    return redirect('/posts' . '/' . $post->id);
}
);


Route::get('/user-registration', function () {
     $users = User::all(); 
    return view('user-registration', compact('users'));

});

Route::post('/user-registration', function (Request $request) {
    $validated = $request->validate([
        'first-name'     => 'required',
        'last-name'      => 'required',
        'middle-name'    => 'nullable',
        'nickname'       => 'nullable',
        'email'          => 'required|email|unique:users,email', 
        'age'            => 'required',
        'address'        => 'required',
        'contact-number' => 'required'
    ]);

    User::create([
        'first-name'     => $validated['first-name'], 
        'last-name'      => $validated['last-name'],
        'middle-name'    => $validated['middle-name'],
        'nickname'       => $validated['nickname'],
        'email'          => $validated['email'],
        'age'            => $validated['age'],
        'address'        => $validated['address'],
        'contact-number' => $validated['contact-number']
    ]);

    return redirect('user-registration') ;
    });

Route::delete('/user-registration/{id}', function ($id) {
    $user = User::findOrFail($id);
    $user->delete();

    return redirect('/user-registration')->with('success', 'User deleted!');
});

Route::get('/user-registration/{id}/edit', function ($id) {
    $user = User::findOrFail($id);
    return view('user-edit', compact('user'));
});

Route::PATCH('/user-registration/{id}', function (Illuminate\Http\Request $request, $id) {
    $user = User::findOrFail($id);
    
    $user->update([
        'first-name'     => $request->input('first-name'),
        'last-name'      => $request->input('last-name'),
        'middle-name'    => $request->input('middle-name'),
        'nickname'       => $request->input('nickname'),
        'email'          => $request->input('email'),
        'age'            => $request->input('age'),
        'address'        => $request->input('address'),
        'contact-number' => $request->input('contact-number'),
    ]);

    return redirect('/user-registration')->with('success', 'Profile updated!');
});
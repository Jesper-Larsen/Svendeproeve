<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostForm;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create()
    {
        return view('posts.create');
    }
    public function store(CreatePostForm $request)
    {

        //this gives us the currently logged in user
        $user = $request->user();

        //this fetches all the post data from the form
        //we can post all the data from post and not get an error
        // because laravel handles this in Post model through fillable array
        //Laravel will only save the data from the key that is in the fillables array
        $formData = $request->all();

        //this creates posts based on the relation from user to post
        //meaning the id of user is automatically populated and saved in the user_id column of posts table
        $user->posts()->create($formData);

        return redirect()->route('posts.list');
    }
    public function index()
    {
        $posts = Post::paginate(10);
        return view('posts.list', compact('posts'));
    }
    // {
    //     $posts = $request->posts()->paginate(10);
    //     return view('posts.list', ['posts' => $posts]);
    // }

    public function show(Post $post, $slug)
    {
        $post = $post->withSlug($slug)->first();

        return view('posts.single', ['post' => $post]);
    }

    public function edit(Post $post, $slug)
    {
        $post = $post->withSlug($slug)->first();

        return view('posts.edit', ['post' => $post]);
    }

    public function update(CreatePostForm $request, Post $post, $slug)
    {
        $post = $post->withSlug($slug)->first();

        $user = $request->user();

        if ($user->can('update', $post)) {
            $post->update($request->only('title', 'content'));

            return redirect()->route('posts.list');
        }

        return redirect()->route('posts.list')->with('errorMessage', 'You do not have permission to edit this post.');
    }
    public function delete(Post $post, $slug)
    {
        $post = $post->withSlug($slug)->first();
        $user = auth()->user();

        if ($user->role == '1' || $post->user_id == auth()->id()) {
            $post->delete();
        } else {
            return redirect()->route('posts.list')->with('errorMessage', 'You do not have permission to delete this post.');
        }
        return redirect()->route('posts.list');
    }
}

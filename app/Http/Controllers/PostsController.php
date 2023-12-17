<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class PostsController extends Controller
{
    private $columns = [
        'postTitle',
        'author',
        'description',
        'published',
    ];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts = Post::get();
        return view('posts', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('addPost');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // $posts= new Post();
        // $posts->postTitle= $request->title;
        // $posts->author= $request->author;
        // $posts->description= $request->description;
        // if(isset($request->published)){
        //     $posts->published = 1;
        // }else{
        //     $posts->published = 0;
        // }
        // $posts->save();
        // return '<h1>Post Added Successfully</h1>';
        //////////////////////////////////////////////////////////////////////////////////
        //validation
        $posts = $request->validate([
            'postTitle' => 'required|string|max:50',
            'author' => 'required|string',
            'description' => 'required|string',
        ]);
        $posts = $request->only($this->columns);
        $posts['published'] = isset($request->published);
        Post::create($posts);
        return redirect('posts');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $post = Post::findOrFail($id);
        return view('viewPost', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $post = Post::findOrFail($id);
        return view('updatePost', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $posts = $request->only($this->columns);
        $posts['published'] = isset($request->published);
        Post::where('id', $id)->update($posts);
        return redirect('posts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::where('id', $id)->delete();
        return redirect('posts');
    }
    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();
        return view('trashedPost', compact('posts'));
    }

    public function forceDelete(string $id)
    {
        Post::where('id', $id)->forceDelete();
        return redirect('posts');
    }

    public function restore(string $id)
    {
        Post::where('id', $id)->restore();
        return redirect('posts');
    }
}

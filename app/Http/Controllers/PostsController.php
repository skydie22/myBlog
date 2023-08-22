<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = Posts::all();

        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //validate form
        $this->validate($request, [
            'judul',
            'deskripsi'
        ]);

        //create posts
        Posts::Create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Posts $posts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Posts $posts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Posts $posts, $id)
    {
        //find posts id
        $post = Posts::findOrFail($id);

        //update posts
        $post->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Posts $posts, $id)
    {
        //find posts id
        $post = Posts::findOrFail($id);

        //delete posts
        $post->delete();

        return redirect()->back();
    }
}

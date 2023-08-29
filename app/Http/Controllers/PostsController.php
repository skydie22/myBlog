<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
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

        return view('admin.article.index', compact('post'));
    }

    public function indexStore()
    {
        $kategori = Kategori::all();

        return view('admin.article.store', compact('kategori'));
    }

    public function indexUpdateArticle($id)
    {
        $p = Posts::find($id);
        $kategori = Kategori::all();

        // dd($post);
        return view('admin.article.update', compact('p', 'kategori'));
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
            'deskripsi',
            'foto' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        //create posts
        $imageName = time() . '.' . $request->foto->extension();
        $request->foto->move(public_path('img/article/thumbnail'), $imageName);
        Posts::Create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'kategori_id' => $request->kategori_id,
            'foto' => $imageName,

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
    public function update(Request $request, $id)
    {
        //find posts id




        Posts::find($id)->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
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

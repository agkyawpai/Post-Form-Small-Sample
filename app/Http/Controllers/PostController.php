<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PostSaveRequest;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posts = Post::all();
        return view('create')->with('posts', $posts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostSaveRequest $request)
    {
        $title = $request->title;
        $description = $request->description;
        $file = $request->file;
        $fileExtension = $request->file->extension();
        $fileName = $request->file->getClientOriginalName();
        $fileSave = $request->file->move(public_path('upload'),$fileName);
        $res = DB::table('posts')->insert([
            'title' => $title,
            'description' => $description,
            'file' => $fileName,
        ]);
        if ($res) {
            return back()->with('success', 'အောင်မြင်သည်။');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
{
    $post = Post::find($id);
    return view('detail', compact('post'));
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $post = Post::find($id);
        return view('edit', compact('post'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostSaveRequest $request, $id)
    {

        $post = Post::findOrFail($id);
        $post->title = $request->input('title');
        $post->description = $request->input('description');

        if ($request->hasFile('file')) {
            $file = $request->file;
            $fileExtension = $request->file->extension();
            $fileName = $request->file->getClientOriginalName();
            $fileSave = $request->file->move(public_path('upload'),$fileName);
            $post->file = $fileName;
        }

        $post->save();

        return redirect()->route('post.create')->with('success', 'အောင်မြင်သည်။');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->back()->with('success', 'ဖျက်သိမ်းမှုအောင်မြင်သည်။');
    }
}

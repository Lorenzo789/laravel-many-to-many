<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $post = Post::all();

        return view('admin.posts.index', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tags = Tag::all();
        $post = new Post();
        return view('admin.posts.create', compact('post', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => [
                'min:3',
                'max:255',
                'required',
            ],
            'post_content' => 'min:5|required',
            'post_image' => 'active_url',
            'tags' => 'exists:tags,id',
        ]);

        $data = $request->All();

        $data['user_id'] = Auth::id();
        $data['post_date'] = new DateTime();

        Post::create($data);
        return redirect()->route('admin.index')->with('created', $data['user_id']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Post::findOrFail($id);
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::findOrFail($id);
        $tags = Tag::all();
        return view('admin.posts.edit', compact('post', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $post = Post::findOrFail($id);

        $request->validate([
            'title' => [
                'min:3',
                'max:255',
                'required',
                Rule::unique('posts')->ignore($post->title, 'title'),
            ],
            'post_content' => 'min:5|required',
            'post_image' => 'active_url',
            'tags' => 'exists:tags,id',
        ]);

        $data = $request->all();

        $data['user_id'] = $post->user_id;
        $data['post_date'] = $post->post_date;

        $post->update($data);

        return redirect()->route('admin.posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('admin.index')->with('deleted', $post->title);
    }
}

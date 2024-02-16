<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class CreateController extends Controller
{
    public function create(){
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $userId = Auth::id();

        $post = new Post();
        $post->userid = $userId;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        return redirect('/dashboard')->with('success', 'Post created successfully.');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->back()->with('success', 'Post deleted successfully.');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('editpage', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        return redirect('/dashboard')->with('success', 'Post updated successfully.');
    }

}

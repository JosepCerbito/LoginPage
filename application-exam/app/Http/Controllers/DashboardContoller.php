<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardContoller extends Controller
{
    public function index(){
        $user = Auth::user();
        $posts = Post::orderBy('created_at', 'desc')->paginate(10); 
    
        // Loop through each post and format the created_at timestamp
        foreach ($posts as $post) {
            $post->formatted_created_at = $post->created_at->format('F j, Y, g:i a');
        }
    
        return view('dashboard', compact('user', 'posts'));
    }
}

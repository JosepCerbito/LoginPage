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
    
        return view('dashboard', compact('user', 'posts'));
    }
}

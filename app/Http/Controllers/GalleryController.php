<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Profile;
use App\Post;

class GalleryController extends Controller
{
    public function show($shopName)
    {
        // dd(Auth::id());
        $profile = Profile::where('user_id', '=', Auth::user()->id)->first();
        $posts = Post::orderBy('updated_at', 'desc')->where('user_id', '=', Auth::user()->id)->get();
        
        return view("pages/shops/gallery/show",[
            'allPosts' => $posts,
            'profile' => $profile
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;

use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Facades\File;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function create()
    {
        return view('pages/posts/create');
    }

    public function store(Request $request)
    {
        $data = request()->validate{[
            'caption' => 'required',
            'description' => 'required',
            'image' => ['required', 'image'],
        ]};

        $imagePath = request('image')->store('uploads', 'public');

        // dd($imagePath);
        // auth()->user()->posts()->create([
        Post::create([
            'user_id' => Auth::user()->id,
            'caption'=> $request["caption"],
            'description' => $request["description"],
            'image' => $imagePath,
        ]);

        return redirect('profile');
    }

    public function edit(Post $post)
    {
        return view('pages/posts/edit', compact('post'));
    }

    public function update(Post $post, Request $request)
    {
        if(request('image')==null){
            $newImg_path = $post->image;
        }else{
            // dd($deleteImgPath);
            // Storage::delete('public/uploads/'.$post->image);
            Storage::disk('public')->delete($post->image); 
            $newImg_path = request('image')->store('uploads', 'public');
        }

        $resultPost= Post::where('id', '=', $post->id)->first();
        $resultPost->caption = $request->caption;
        $resultPost->description = $request->description;
        $resultPost->image = $newImg_path;
        $resultPost->save();

        return redirect('profile');
    }

    public function delete(Post $post)
    {
        Storage::disk('public')->delete($post->image); 
        Post::destroy($post->id);

        return redirect('profile');
    }
}

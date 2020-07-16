<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Post;
use App\Profile;

use Illuminate\Support\Facades\Storage; 

class ProfilesController extends Controller
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
    public function index()
    {
        // $post = Post::find(Auth::id())->get();
        // dd($posts);
        $userId = Auth::id();
        $posts = Post::orderBy('updated_at', 'desc')->where('user_id', '=', $userId)->get();
        $profile = Profile::where('user_id', '=', Auth::user()->id)->first();

        // dd($profile->profilePic);
        return view('pages/profile', [
            'allPosts' => $posts,
            'profile' => $profile,
        ]);
    }

    public function edit()
    {
        $profile = Profile::where('user_id', '=', Auth::user()->id)->first();
        return view('pages/profileEdit',[
            'profile' => $profile,
        ]);
    }

    public function update(Request $request)
    {
        $userProfile = Profile::where('user_id', Auth::user()->id)->first();
    
        if($userProfile==null){
            $data = request()->validate{[
                'shopName' => 'required',
                'description' => 'required',
                'profilePic' => ['required', 'profilePic'],
            ]};
    
            $profilePicPath = request('profilePic')->store('profilePics', 'public');
    
            if($request->url==null){
                $url = 'No request';
            }else{
                $url = $request["url"];
            };

            // dd($url);
            Profile::create([
                'user_id' => Auth::user()->id,
                'shopName'=> $request["shopName"],
                'profilePic' => $profilePicPath,
                'description' => $request["description"],
                'url' => $url,
            ]);
            return redirect('profile');
        }else{
            $updateProfile= Profile::where('user_id', '=', Auth::user()->id)->first();
            Storage::disk('public')->delete($updateProfile->profilePic); 

            // dd(request('profilePic'));
            if(request('profilePic')==null){
                $newImg_path = '';
            }else{
                $newImg_path = request('profilePic')->store('profilePics', 'public');
            };

            // dd($userProfile->url);
            if($request->url==null){
                $url = '';
            }else{
                $url = $request["url"];
            };

            $updateProfile->user_id = Auth::user()->id;
            $updateProfile->shopName = $request->shopName;
            $updateProfile->description = $request->description;
            $updateProfile->profilePic = $newImg_path;
            $updateProfile->url = $url;
            $updateProfile->save();
            
            return redirect('profile');
        }
    }
}

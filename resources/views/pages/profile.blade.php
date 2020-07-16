@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header d-flex justify-content-start align-items-center">
                    <div style="width: 50px; height: 50px; border-radius: 50%; border: 1px solid black; background-color: grey;">
                        <img src="/storage/{{$profile->profilePic ?? 'Pic'}}" alt="" style="width: 50px; height: 50px; border-radius: 50%;">
                    </div>
                    <div class="ml-3">
                        <h3>
                            {{Auth::user()->profile->shopName ?? 'Shop Name'}}
                        </h3>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped">
                        <tbody>
                          
                          <tr>
                            <td>Your Name:</td>
                          <td>{{Auth::user()->name}}</td>
                          </tr>
                          <tr>
                            <td>Email:</td>
                            <td>{{Auth::user()->email}}</td>
                          </tr>
                          <tr>
                            <td>Account Created:</td>
                            <td>{{Auth::user()->created_at}}</td>
                          </tr>
                          <tr>
                            <td>Store Name:</td>
                            <td>{{Auth::user()->profile->shopName ?? 'Update please'}}</td>
                          </tr>
                          <tr>
                            <td>Store Description:</td>
                            <td>{{Auth::user()->profile->description ?? 'Update please'}}</td>
                          </tr>
                          <tr>
                            <td>Store Link:</td>
                            <td>{{Auth::user()->profile->url ?? 'Click here if you would to request for a website'}}</td>
                            
                            {{-- <td><a href="{{ route('shops.gallery', [preg_replace('/\+/', '-', urlencode($profile->shopName  ?? 'error'))]) }}">{{ preg_replace('/\+/', '-', urlencode($profile->shopName ?? 'Updating in prograss' )) }}</a></td>                             --}}
                            {{-- <td><a href="{{ route('shops.gallery', [preg_replace('/\+/', '-', urlencode($profile->shopName))]) }}">{{ preg_replace('/\+/', '-', urlencode($profile->shopName)) ?? 'Updating in prograss' }}</a></td>                             --}}
                          </tr>
                        </tbody>
                      </table>
                    <a href="/profile/edit" class="btn btn-info mr-1 p-2">Edit profile</a>
                    <a href="/post/create" class="btn btn-success p-2">Add new post</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('posts')
@if(count($allPosts)>0)
  @foreach ($allPosts as $post)

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">
                            <h3>
                              {{ $post->caption }}
                            </h3>
                    </div>

                    <div class="card-body ">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="postCard">
                            <div class=""style="height: 200px; max-width: 200px; overflow: hidden;">
                              <img src="/storage/{{$post->image}}" alt="" style="width: 100%; height: 200px; object-fit: cover;">
                            </div>

                            <div class="px-3">
                              <h4>Description</h4>
                              <p>{{ $post->description }}</p>
                              <a href="/post/edit/{{$post->id}}" class="btn btn-info px-4 mb-2">Edit</a>
                              <a href="/post/delete/{{$post->id}}" class="btn btn-danger px-4 mb-2">Delete</a>
                              
                              <div class="">
                                <small>Created: {{ $post->created_at }} </small>
                                <small>Updated: {{ $post->updated_at }} </small>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  @endforeach
@endif
@endsection
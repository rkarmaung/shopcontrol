@extends('layouts.app')

@section('content')
  <div>
    <h1>Error</h1>
  </div>
@endsection


{{-- @section('posts')
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
@endsection --}}
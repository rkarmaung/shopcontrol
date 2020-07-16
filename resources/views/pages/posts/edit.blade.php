@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">
                    <h3>
                        Edit: {{$post->caption}}
                    </h3>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif



                    <form method="POST" action="/post/edit/{{ $post->id }}" enctype="multipart/form-data">
                      @csrf
                      @method('PATCH')

                      <div class="form-group row">
                          <label for="caption" class="col-md-4 col-form-label text-md-right">{{ __('Caption') }}</label>

                          <div class="col-md-6">
                              <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') ?? $post->caption }}" required autocomplete="caption" autofocus>

                              @error('caption')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                          <div class="col-md-6">
                              <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" value="" required autocomplete="description">{{ old('description') ?? $post->description }}</textarea>

                              @error('description')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row">
                        <label for="image" class="col-md-4 col-form-label text-md-right">Post Image</label>

                        <div class="col-md-6">
                            <input style="border: 0px !important;" type="file" id="image" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" autocomplete="image">

                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      </div>

                      <div class="form-group row mb-0">
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  Save Post
                              </button>
                          </div>
                      </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

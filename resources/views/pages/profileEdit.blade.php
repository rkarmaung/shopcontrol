@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">
                    <h3>
                        Edit Profile: {{Auth::user()->name ?? 'Shop Name'}}
                    </h3>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif



                    <form method="POST" action="/profile/patch" enctype="multipart/form-data">
                      @csrf
                      @method('PATCH')

                      <div class="form-group row">
                          <label for="shopName" class="col-md-4 col-form-label text-md-right">{{ __('Shop Name') }}</label>

                          <div class="col-md-6">
                              <input id="shopName" type="text" class="form-control @error('shopName') is-invalid @enderror" name="shopName" value="{{ $profile->shopName ?? old('shopName') }}" required autocomplete="shopName" autofocus>

                              @error('shopName')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                          <div class="col-md-6">
                              <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" value="" required autocomplete="description">{{ $profile->description ?? old('description') }}</textarea>

                              @error('description')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row">
                        <label for="url" class="col-md-4 col-form-label text-md-right">{{ __('Link') }}</label>

                        <div class="col-md-6">
                            <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ $profile->url ?? 'Click here to request url' }}" disabled autocomplete="url" autofocus>

                            @error('url')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="profilePic" class="col-md-4 col-form-label text-md-right">Profile picture</label>

                        <div class="col-md-6">
                            <input style="border: 0px !important;" type="file" id="profilePic" class="form-control @error('profilePic') is-invalid @enderror" name="profilePic" value="{{ old('profilePic') }}" autocomplete="profilePic">

                            @error('profilePic')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      </div>

                      <div class="form-group row mb-0">
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  Save changes
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

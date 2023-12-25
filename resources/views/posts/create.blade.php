@extends('layouts.app')

@section('content')
    <div class="container" style="padding-left: 80px">
        <form action="/p" enctype="multipart/form-data" method="post">
            @csrf
            <div class="row">
                <div class="col-8 offset-2">
                    <div class="row">
                        <h3>Add New Post</h3>
                    </div>
                    <div class="row mb-3">
                        <label for="caption" class="col-md-4 col-form-label">Post Caption</label>
                        <input id="caption"
                               name="caption"
                               type="text"
                               class="form-control @error('caption') is-invalid @enderror"
                               required autocomplete="caption" autofocus>

                        @if ($errors->has('image'))
                            <strong>{{ $errors->first('image') }}</strong>
                        @endif
                    </div>
                    <div class="row">
                        <label for="image" class="col-md-4 col-form-label">Post Image</label>

                        <input type="file" class="form-control" id="image" name="image">
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row pt-4">
                        <button class="btn btn-primary" style="max-width: 150px">Add New Post</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection


@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create New Post') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="post" action="{{ route('posts.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="post" class="form-label">Post Title</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter your post title here">
                                @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="content" class="form-label">Content</label>
                                <input type="text" class="form-control" id="content" name="content"  placeholder="Enter your content here">
                                @error('content')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="img_url" class="form-label">Image URL</label>
                                <input type="text" class="form-control" id="img_url" name="img_url"  placeholder="Enter your image url here (optional)">
                                @error('img_url')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div style="display:flex; justify-content: flex-start">
                            <button class="btn btn-outline-primary" type="submit">Post</button>
                                <a style="margin-left: 20px;" class="btn btn-outline-dark" href="{{route('posts.index')}}">Cancel</a>
                            </div>
                        </form>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

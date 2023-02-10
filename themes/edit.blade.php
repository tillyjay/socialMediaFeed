
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Theme') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="post" action="{{ route('themes.update', $theme->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{old('name') ?? $theme->name}}" placeholder="Enter Theme Name">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="cdn_url" class="form-label">CDN URL</label>
                            <input type="text" class="form-control" id="cdn_url" name="cdn_url" value="{{old('cdn_url') ?? $theme->cdn_url}}" placeholder="Enter CDN URL">
                            @error('cdn_url')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button style="margin-bottom: 15px;" class="btn btn-outline-primary" type="submit">Submit</button>
                    </form>

                        <a class="btn btn-outline-dark" href="{{route('themes.index')}}">Cancel</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

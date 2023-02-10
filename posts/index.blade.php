@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div style="display:flex; justify-content: space-between; align-items: center" class="card-header">{{ __('Welcome to the SocialMedia Feed') }}
                    <div style="display: flex; justify-content: flex-end; align-items: center;">
                    @if (Auth::check())
                        <a class="btn btn-outline-primary" href="{{route('posts.create')}}">Create New Post</a>
                    @endif

                    </div>
                </div>


                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-info" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        @foreach($posts as $post)

                        <div class="card" style="display: flex; flex-direction: column; justify-content: flex-start; align-items: flex-start; margin-bottom: 30px;">
                        <div class="card-header" style="display:flex; justify-content:space-between; align-items: center; width: 100%;">
                            <p style="margin-right: 30px">{{$post->created_at}}</p>
                            <p>{{$postName = $post->users->name}}</p>
                        </div>

                            <h2 style="padding: 10px;">{{$post->title}}</h2>
                            <img src="{{$post->img_url}}" style="width: 100%; border-top: 1px solid black; border-bottom: 1px solid black ">
                            <p style="padding: 15px 0px 5px 15px;">{{$post->content}}</p>

                            <div style="display:flex; justify-content: flex-start; padding:0px 0px 15px 15px;">
                            @auth
                                @if(Auth::id() == $post->created_by)
                                        <a style="margin-right: 20px;" class="btn btn-outline-success" href="{{route('posts.edit', $post->id)}}">Edit</a>
                                @endif
                                @if(Auth::id() == $post->created_by || Auth::user()->hasRole('Moderator'))
                                    <form method="post" action="{{route('posts.destroy', $post->id)}}">

                                @method('DELETE')
                                @csrf
                                <button class="btn btn-outline-danger" type="submit">Delete</button>
                            </form>
                            @endif
                                @endauth
                            </div>

                        </div>
                        @endforeach


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Themes List') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div class="d-grid gap-2">
                        <a class="btn btn-outline-primary" href="{{route('themes.create')}}">Add New Theme</a>
                        </div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col" colspan="3">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($themes as $theme)
                            <tr>
                                <td>{{$theme->name}}</td>

                                <td>
                                    <a class="btn btn-outline-success" href="{{route('themes.show', $theme->id)}}">Details</a>
                                </td>

                                <td>
                                    @if($theme->id != 1)
                                    <a class="btn btn-outline-warning" href="{{route('themes.edit', $theme->id)}}">Edit</a>
                                    @endif
                                </td>
                                <td>
                                    @if($theme->id != 1)
                                    <form method="post" action="{{route('themes.destroy', $theme->id)}}">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-outline-danger" type="submit">Delete</button>
                                    </form>
                                     @endif
                                </td>
                            </tr>
                                @endforeach


                            </tbody>

                        </table>
                        <div class="d-grid gap-2">
                        <a class="btn btn-outline-info" href="{{route('posts.index')}}">SocialMedia Feed</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

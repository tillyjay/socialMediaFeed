@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Theme Details') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">CDN URL</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{$theme->name}}</td>
                                <td>{{$theme->cdn_url}}</td>
                            </tr>
                            </tbody>
                        </table>

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col" colspan="3">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <a class="btn btn-outline-warning" href="{{route('themes.edit', $theme->id)}}">Edit</a>
                                </td>
                                <td>
                                    <form method="post" action="{{route('themes.destroy', $theme->id)}}">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-outline-danger" type="submit">Delete</button>
                                    </form>
                                </td>

                                <td>
                                    <a class="btn btn-outline-dark" href="{{route('themes.index')}}">Cancel</a>
                                </td>
                            </tr>

                            </tbody>

                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

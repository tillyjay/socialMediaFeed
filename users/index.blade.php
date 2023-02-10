@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Users') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div class="d-grid gap-2">
                        <a class="btn btn-outline-primary" href="{{route('users.create')}}">Add new User</a>
                        </div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Roles</th>
                                <th scope="col" colspan="3">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>
                                    <ul>
                                    @foreach($user->roles as $role)
                                        <li>{{$role->name}}</li>
                                    @endforeach
                                    </ul>
                                </td>

                                <td>
                                    <a class="btn btn-outline-success" href="{{route('users.show', $user->id)}}">Show</a>
                                </td>
                                <td>
                                    <a class="btn btn-outline-warning" href="{{route('users.edit', $user->id)}}">Edit</a>
                                </td>
                                <td>
                                    <form method="post" action="{{route('users.destroy', $user->id)}}">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-outline-danger" type="submit">Delete</button>
                                    </form>
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

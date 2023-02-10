@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User Details') }}</div>

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
                                <th scope="col">Email</th>
                                <th scope="col">Roles</th>
                                <th scope="col" colspan="3">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <ul>
                                    @foreach($user->roles as $role)
                                        <li>{{$role->name}}</li>
                                    @endforeach
                                    </ul>
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

                                <td>
                                    <a class="btn btn-outline-dark" href="{{route('users.index')}}">Cancel</a>
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


@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add new User') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="post" action="{{ route('users.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" placeholder="Enter Name here">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}" placeholder="Enter Email here">
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Roles</label>
                            @foreach($roles as $role)
                            <div class="form-check">
                                <input {{ is_array(old('role_ids')) && in_array($role->id, old('role_ids')) ? 'checked' : '' }} class="form-check-input" type="checkbox" name="role_ids[]" value="{{$role->id}}" id="">
                                <label class="form-check-label" for="flexCheckDefault">
                                    {{ $role->name }}
                                </label>
                            </div>
                            @endforeach
                        </div>

                        <button class="btn btn-outline-primary" type="submit">Submit</button>
                    </form>

                        <a class="btn btn-outline-dark" href="{{route('users.index')}}">Cancel</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

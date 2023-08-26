@extends('layout')

@section('content')
    <h1 class="text-center">Admin Login Page</h1>
    <div class="row my-5">
        <div class="col-md-6 mx-auto">
            <form method="POST" action="{{ route('admin.authenticate') }}">
                @csrf

                <div class="form-group">
                    <label for="username">username</label>
                    <input type="text" id="username" name="username" class="form-control">
                    @error('username')
                    <span>{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">password</label>
                    <input type="text" id="password" name="password" class="form-control">
                    @error('password')
                    <span>{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-block btn-primary">login</button>
            </form>
        </div>
    </div>
@endsection

@extends('layout')

@section('content')
    <div class="row my-5">
        <div class="col-md-12">
            <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                <label for="name">name:</label>
                <input type="text" id="name" name="name" class="form-control">
                @error('name')
                <span>{{ $message }}</span>
                @enderror
                </div>

                <div class="form-group">
                <label for="price">price:</label>
                <input type="text" id="price" name="price" class="form-control">
                @error('price')
                <span>{{ $message }}</span>
                @enderror
                </div>

                <div class="form-group">
                <label for="image">image:</label>
                    <br>
                <input type="file" id="image" name="image">
                @error('image')
                <span>{{ $message }}</span>
                @enderror
                </div>

                <button type="submit" class="btn btn-primary">submit</button>
            </form>
        </div>
    </div>
@endsection

@extends('layout')

@section('content')
    <h1 class="text-center">Admin Dashboard Page</h1>
    <div class="row my-5">
        <div class="col-md-12">
            <h2>plans</h2>
            <a href="{{ route('admin.plans.create') }}">create new plan</a>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>title</th>
                    <th>type</th>
                    <th>percent</th>
                    <th>start date</th>
                    <th>end date</th>
                </tr>
                </thead>
                <tbody>
                @foreach($plans as $plan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $plan->title }}</td>
                        <td>{{ $plan->sellType->title }}</td>
                        <td>{{ $plan->percent }}</td>
                        <td>{{ $plan->start_date }}</td>
                        <td>{{ $plan->end_date }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-12">
            <h2>products</h2>
            <a href="{{ route('admin.products.create') }}">create new product</a>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>image</th>
                    <th>name</th>
                    <th>price</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <img src="{{ asset('storage') . '/' . $product->image }}" width="100" height="100">;
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

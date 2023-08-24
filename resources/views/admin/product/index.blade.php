<h1>products list</h1>

@if(session()->has('flash_message'))
    <p>{{ session('flash_message')['message'] }}</p>
@endif

<a href="{{ route('admin.products.create') }}">create new</a>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>name</th>
            <th>price</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>
                    <img src="{{ asset('storage') . '/' . $product->image }}" width="50" height="50">;
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<h1>create product page</h1>

@if(session()->has('flash_message'))
    <p>{{ session('flash_message')['message'] }}</p>
@endif

<form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
    @csrf

    <label for="name">name:</label>
    <input type="text" id="name" name="name">
    @error('name')
        <span>{{ $message }}</span>
    @enderror
    <br>

    <label for="price">price:</label>
    <input type="text" id="price" name="price">
    @error('price')
        <span>{{ $message }}</span>
    @enderror
    <br>

    <label for="image">image:</label>
    <input type="file" id="image" name="image">
    @error('image')
        <span>{{ $message }}</span>
    @enderror
    <br>

    <button type="submit">submit</button>
</form>

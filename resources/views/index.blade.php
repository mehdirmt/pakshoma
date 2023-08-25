<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>
</head>
<body>

    @foreach($products as $product)
        <div>
            <h4>{{ $product->name }}</h4>
            <img src="{{ asset('storage') . '/' . $product->image }}" width="50" height="50">;
            <h4>{{ $product->price }}</h4>
            <button type="button" class="btn-addToCart" data-productId="{{ $product->id }}">add to cart</button>
        </div>
    @endforeach

    <script src="{{ asset('/assets/js/jquery.min.js') }}"></script>
    <script>
        $('.btn-addToCart').on('click', function (event) {
            let productId = $(this).attr('data-productId');
            $.ajax({
                url: "{{ route('addToCart') }}",
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                },
                data: {
                    product_id: productId
                },
                success: function (data, textStatus, jqXHR) {
                    alert('add product to cart success');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus);
                }
            });
        });
    </script>
</body>
</html>

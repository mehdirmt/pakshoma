@extends('layout')

@section('content')
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-4">
                <div class="card my-2">
                    <img class="card-img-top" src="{{ asset('storage') . '/' . $product->image }}" height="250"
                         alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">
                            Some quick example text to build on the card title and make up the bulk
                            of the card's content.
                        </p>
                        <button type="button" class="btn btn-sm btn-info btn-addToCart"
                                data-productId="{{ $product->id }}">add to cart
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('custom_scripts')
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
                    alert('an error occurred');
                }
            });
        });
    </script>
@endsection


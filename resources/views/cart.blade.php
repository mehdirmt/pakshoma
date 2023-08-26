<h1>cart page</h1>

<form id="form-cart">
    @csrf
    <table>
        <thead>
        <tr>
            <th>#</th>
            <th>image</th>
            <th>name</th>
            <th>price</th>
            <th>quantity</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <img src="{{ asset('storage') . '/' . $product->image }}" width="50" height="50">
                </td>
                <td>
                    {{ $product->name }}
                    <input type="hidden" name="products[{{ $loop->index }}][product]" value="{{ $product->id }}">
                </td>
                <td>{{ $product->price }}</td>
                <td>
                    <input type="number" name="products[{{ $loop->index }}][quantity]" value="1" min="1">
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <label for="select-sell_types">sell type:</label>
    <select id="select-sell_types">
        <option value="" data-plans="[]">select</option>
        @foreach($sell_types as $type)
            <option value="{{ $type->id }}" data-plans="{{ $type->plans->toJson() }}">
                {{ $type->title }}
            </option>
        @endforeach
    </select>
    <br>

    <label for="select-plans">sell plan:</label>
    <select id="select-plans" name="plan">
        <option value="">select</option>
    </select>
    @error('plan')
    <span>{{ $message }}</span>
    @enderror
    <br>
    <br>
</form>

<div>
    total price:
    <h1 id="h1-totalPrice"></h1>
</div>

<script src="{{ asset('/assets/js/jquery.min.js') }}"></script>
<script>
    $('#select-sell_types').on('change', function (event) {
        $('#select-plans').empty().append('<option value="">select</option>');

        let plans = JSON.parse(
            $(this).find(":selected").attr('data-plans')
        );

        plans.forEach(function (plan, index) {
            $('#select-plans').append("<option value='" + plan.id + "'>" + plan.title + "</option>");
        });
    });

    $('#select-plans').on('change', function (event) {
        $('#h1-totalPrice').text('');

        let planId = $(this).find(":selected").val();
        if ('' === planId) {
            return;
        }

        $.ajax({
            url: "{{ route('cart.calcTotalPrice') }}",
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': "{{ csrf_token() }}",
            },
            data: $('#form-cart').serializeArray(),
            beforeSend: function () {
                $('#h1-totalPrice').text("...");
            },
            success: function (data, textStatus, jqXHR) {
                $('#h1-totalPrice').text(data.data.total_price);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert('an error occurred');
            }
        });
    });
</script>

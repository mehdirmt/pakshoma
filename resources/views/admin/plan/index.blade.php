<h1>products list</h1>

@if(session()->has('flash_message'))
    <p>{{ session('flash_message')['message'] }}</p>
@endif

<a href="{{ route('admin.plans.create') }}">create new</a>

<table>
    <thead>
    <tr>
        <th>#</th>
        <th>title</th>
        <th>type</th>
        <th>factor</th>
    </tr>
    </thead>
    <tbody>
    @foreach($plans as $plan)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $plan->title }}</td>
            <td>{{ $plan->type }}</td>
            <td>{{ $plan->factor }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

<h1>plans list</h1>

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

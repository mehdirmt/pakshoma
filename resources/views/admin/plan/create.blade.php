<h1>create plan</h1>

@if(session()->has('flash_message'))
    <p>{{ session('flash_message')['message'] }}</p>
@endif

<form method="POST" action="{{ route('admin.plans.store') }}">
    @csrf

    <label for="title">title:</label>
    <input type="text" id="title" name="title">
    @error('title')
        <span>{{ $message }}</span>
    @enderror
    <br>

    <label for="type">type:</label>
    <select id="type" name="type">
        <option value="">select</option>
        @foreach($sellTypes as $type)
            <option value="{{ $type->id }}">{{ $type->title }}</option>
        @endforeach
    </select>
    @error('type')
        <span>{{ $message }}</span>
    @enderror
    <br>

    <label for="percent">percent</label>
    <input type="number" id="percent" name="percent" min="0">
    @error('percent')
        <span>{{ $message }}</span>
    @enderror
    <br>

    <label for="start_date">start date</label>
    <input type="date" id="start_date" name="start_date">
    @error('start_date')
        <span>{{ $message }}</span>
    @enderror
    <br>

    <label for="end_date">end date</label>
    <input type="date" id="end_date" name="end_date">
    @error('end_date')
        <span>{{ $message }}</span>
    @enderror
    <br>

    <button type="submit">submit</button>
</form>

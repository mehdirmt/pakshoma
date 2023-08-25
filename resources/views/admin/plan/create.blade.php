<h1>create plan</h1>

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
        <option value="C">hihi</option>
        @foreach($planTypes as $type)
            <option value="{{ $type->name }}">{{ $type->value }}</option>
        @endforeach
    </select>
    @error('type')
        <span>{{ $message }}</span>
    @enderror
    <br>

    <label for="fctor">factor</label>
    <input type="factor" id="factor" name="factor">
    @error('factor')
        <span>{{ $message }}</span>
    @enderror
    <br>

    <button type="submit">submit</button>
</form>

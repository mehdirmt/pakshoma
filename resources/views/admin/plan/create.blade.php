@extends('layout')

@section('content')
    <h1 class="text-center">Create Plan Page</h1>
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{ route('admin.plans.store') }}">
                @csrf

                <div class="form-group">
                    <label for="title">title:</label>
                    <input type="text" id="title" name="title" class="form-control">
                    @error('title')
                    <span>{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="type">type:</label>
                    <select id="type" name="type" class="form-control">
                        <option value="">select</option>
                        @foreach($sellTypes as $type)
                            <option value="{{ $type->id }}">{{ $type->title }}</option>
                        @endforeach
                    </select>
                    @error('type')
                    <span>{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="percent">percent</label>
                    <input type="number" id="percent" name="percent" min="0" class="form-control">
                    @error('percent')
                    <span>{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                <label for="start_date">start date</label>
                <input type="date" id="start_date" name="start_date" class="form-control">
                @error('start_date')
                <span>{{ $message }}</span>
                @enderror
                </div>

                <div class="form-group">
                <label for="end_date">end date</label>
                <input type="date" id="end_date" name="end_date" class="form-control">
                @error('end_date')
                <span>{{ $message }}</span>
                @enderror
                </div>

                <button type="submit" class="btn btn-primary">submit</button>
            </form>
        </div>
    </div>
@endsection

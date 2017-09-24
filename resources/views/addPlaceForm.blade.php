@extends('layouts.pageTemplate')

@section('content')
    <div class="container">
        <h2>Form add place</h2>
        <form method="post" action="{{ url('/addItem') }}">
            <div class="form-group">
                <label for="type">Type:</label>
                <input type="text" class="form-control" id="type" placeholder="Enter type" name="type" value="@empty($input['parent_id']) ? 0 : $input['parent_id'])">
            </div>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
            </div>
            <input type="hidden" name="_token" value="{{ parent_id }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-default" name="add_place">Add place</button>
        </form>
    </div>
@endsection

@extends('layouts.pageTemplate')

@section('content')
    <div class="container">
        <h2>Form add place</h2>
        <form  method="post" action="{{ url('/addItem') }}">
            <div class="form-group">
                <label for="type">Type:</label>
                <input type="text" class="form-control" id="type" placeholder="Enter type" name="type">
            </div>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-default" name="add_place">Add place</button>
        </form>
    </div>

    {{--
    {!! Form::model($place, ['action' => 'PlaceController@store']) !!}

    <div class="form-group">
        {!! Form::label('make', 'Make') !!}
        {!! Form::text('make', '', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('model', 'Model') !!}
        {!! Form::text('model', '', ['class' => 'form-control']) !!}
    </div>

    <button class="btn btn-success" type="submit">Add the Place!</button>

    {!! Form::close() !!}
--}}

@endsection

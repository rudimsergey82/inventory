@extends('layouts.pageTemplate')

@section('content')
{{--<!DOCTYPE html>
<html>
<head>
    <title>Laravel Category Treeview Example</title>--}}
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />--}}
   {{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>--}}
    {{--<link href="{{ asset('/css/treeview.css') }}" rel="stylesheet">--}}
{{--</head>--}}
<body>
<div class="col-md-12">
    <div class="panel panel-primary">
        <div class="panel-heading">Tree View Places </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <h3>Place List</h3>
                    <ul id="tree1">
                        @foreach($places as $place)
                            <li>
                                {{ $place->name_place }}
                                @if(count($place->childs))
                                    @include('manageChild',['childs' => $place->childs])
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-6">
                    <h3>Add New Place</h3>

                    {!! Form::open(['route'=>'add.place']) !!}

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif

                    <div class="form-group {{ $errors->has('type_place') ? 'has-error' : '' }}">
                        {!! Form::label('Type:') !!}
                        {!! Form::text('type_place', old('type_place'), ['class'=>'form-control', 'placeholder'=>'Enter Type', 'style'=>'height:50px']) !!}
                        <span class="text-danger">{{ $errors->first('type') }}</span>
                    </div>

                    <div class="form-group {{ $errors->has('name_place') ? 'has-error' : '' }}">
                        {!! Form::label('Name:') !!}
                        {!! Form::text('name_place', old('name_place'), ['class'=>'form-control', 'placeholder'=>'Enter Name', 'style'=>'height:50px']) !!}
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    </div>

                    <div class="form-group {{ $errors->has('parent_id') ? 'has-error' : '' }}">
                        {!! Form::label('Place:') !!}
                        {!! Form::select('parent_id', $allPlaces, old('parent_id'), ['class'=>'form-control', 'placeholder'=>'Select Place', 'style'=>'height:50px']) !!}
                        <span class="text-danger">{{ $errors->first('parent_id') }}</span>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-success">Add New</button>
                    </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{  asset('/js/treeview.js') }}"></script>
{{--</body>
</html>--}}
@endsection
@extends('layouts.pageTemplate')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show place</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('places.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Type:</strong>
                {{ $place->type_place}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $place->name}}
            </div>
        </div>
    </div>

    {{--<div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Parent type:</strong>
                {{ $parent->type_place}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Parent name:</strong>
                {{ $parent->name}}
            </div>
        </div>
    </div>--}}
@endsection
@extends('layouts.pageTemplate')

@section('content')

    <div class="row">
        <div class="body_item_form">
            <h2>Tree places</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{url('addItem')}}"> Create New Item</a>
        </div>
        <div>
            {!! $treePlaces !!}
        </div>
    </div>
@endsection

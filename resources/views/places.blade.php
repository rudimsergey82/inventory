@extends('layouts.pageTemplate')

@section('content')

    <div class="container">
        <div class="body_item_form">
            <h2>Tree places</h2>
        </div>
        <div>
            {!! $treePlaces !!}
        </div>
    </div>
@endsection

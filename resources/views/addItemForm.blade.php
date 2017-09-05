@extends('layouts.pageTemplate')

@section('content')
    <div class="container">
        <div class="body_item_form">
            <h2>Form add item</h2>
            <form class="form-horizontal-item" method="post" action="{{ url('/addItem') }}">
                <label>Name</label>
                <input title="" type="text" class="form-item" name="name" value="">
                <label>Identification number</label>
                <input type="text" class="form-item" name="identification" value="">
                <br>
                <label>Serial number</label>
                <input type="text" class="form-item" name="serial" value="">
                <label>Specifications</label>
                <textarea type="text" class="form-item" name="specification"></textarea>
                <br>
                <label>Day create</label>
                <input type="text" class="form-item" name="dt_create" value="">
                <label>Date buy</label>
                <input type="text" class="form-item" name="dt_buy" value="">
                <br>
                <label>Coast</label>
                <input type="text" class="form-item" name="coast" value="">
                <label>Date input use</label>
                <input type="text" class="form-item" name="dt_input_use" value="">
                <br>
                <label>Guarantee</label>
                <input type="text" class="form-item" name="guarantee" value="">
                <label>Place</label>
                <input type="text" class="form-item" name="place" value="">
                <br>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" class="form-item" value="add item" name="add_item">
            </form>
        </div>
    </div>
@endsection

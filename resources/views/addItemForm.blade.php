@extends('layouts.pageTemplate')

@section('content')
    <div class="container">
        <div class="body_item_form">
            <h2>Form add item</h2>
            <form class="form-horizontal-item" method="post" action="{{url('showItem')}}">
                <label>Name</label>
                <input type="text" class="form-item" name="name">
                <label>Identification number</label>
                <input type="text" class="form-item" name="identification">
                <br>
                <label>Serial number</label>
                <input type="text" class="form-item" name="serial">
                <label>Specifications</label>
                <textarea type="text" class="form-item" name="specification"></textarea>
                <br>
                <label>Day create</label>
                <input type="text" class="form-item" name="dt_create">
                <label>Date buy</label>
                <input type="text" class="form-item" name="dt_buy">
                <br>
                <label>Coast</label>
                <input type="text" class="form-item" name="coast">
                <label>Date input use</label>
                <input type="text" class="form-item" name="dt_input_use">
                <br>
                <label>Guarantee</label>
                <input type="text" class="form-item" name="guarantee">
                <label>Place</label>
                <input type="text" class="form-item" name="place">
                <br>
                <input type="submit" class="form-item" value="add item" name="add_item">
            </form>
        </div>
    </div>
@endsection

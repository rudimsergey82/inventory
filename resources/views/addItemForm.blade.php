@extends('layouts.pageTemplate')
{{--@extends('layouts.template')--}}

@section('content')
    <div class="container">
        <div class="panel-body">
            <!-- Отображение ошибок проверки ввода -->
            @include('common.errors')
            <h2>Form add item</h2>
            <form method="post" action="{{ url('/addItem') }}">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
                </div>
                <div class="form-group">
                    <label for="identification">Identification number:</label>
                    <input type="text" class="form-control" id="identification" placeholder="Enter identification"
                           name="identification_number">
                </div>
                <div class="form-group">
                    <label for="serial_number">Serial number:</label>
                    <input type="text" class="form-control" id="serial_number" placeholder="Enter serial number"
                           name="serial">
                </div>
                <div class="form-group">
                    <label for="specifications">Specifications:</label>
                    <input type="text" class="form-control" id="specifications" placeholder="Enter specifications"
                           name="specifications">
                </div>
                <div class="form-group">
                    <label for="dt_create">Date create:</label>
                    <input type="text" class="form-control"  id="#datepicker" placeholder="Enter date create"
                           name="dt_create">
                </div>
                <div class="form-group">
                    <label for="dt_buy">Date buy:</label>
                    <input type="text" class="form-control"  id="#datepicker" placeholder="Enter date buy" name="dt_buy">
                </div>
                <div class="form-group">
                    <label for="coast">Coast:</label>
                    <input type="text" class="form-control" id="coast" placeholder="Enter coast" name="coast">
                </div>
                <div class="form-group">
                    <label for="dt_input_use">Date input use:</label>
                    <input type="text" class="form-control"  id="#datepicker" placeholder="Enter date input use"
                           name="dt_input_use">
                </div>
                <div class="form-group">
                    <label for="guarantee">Guarantee:</label>
                    <input type="text" class="form-control" id="guarantee" placeholder="guarantee" name="guarantee">
                </div>
                {{--<div class="form-group">
                    <label for="place">Place:</label>
                    <input type="text" class="form-control" id="place" placeholder="place" name="place">
                </div>--}}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                {{--<input type="submit" class="form-item" value="add item" name="add_item">
                <div class="checkbox">
                <label><input type="checkbox" name="remember"> Remember me</label>
        </div>--}}
                <button type="submit" class="btn btn-default">Add item</button>
            </form>
        </div>
    </div>
@endsection

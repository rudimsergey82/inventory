@extends('layouts.pageTemplate')

@section('content')
    <div class="container">
        <div class="body_item_form">
            <h2>Form add place</h2>
            <form class="{{--form-horizontal-item--}}" method="post" action="{{ url('/addItem') }}">
                <div class="form-group">
                    <label>Type:</label>
                    <input title="" type="text" class="form-item" name="type" value="">
                </div>
                <div class="form-group">
                    <label>Name:</label>
                    <input title="" type="text" class="form-item" name="name" value="">
                </div>

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="form-item" value="add item" name="add_item">

            </form>
        </div>
    </div>
    <div class="container">
        <h2>Vertical (basic) form</h2>
        <form action="#">
            <div class="form-group">
                <label>Type:</label>
                <input title="" type="text" class="form-item" name="type" value="">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
            </div>
            <div class="checkbox">
                <label><input type="checkbox" name="remember"> Remember me</label>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>

@endsection

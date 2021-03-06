@extends('layouts.pageTemplate')

@section('content')
    <!-- Jumbotron -->
    @if ($message = Session::get('error_roles'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="jumbotron">
        <h1>Project Inventory</h1>
        <p class="lead">This project will help to realize the inventory process and accounting of material resources for
            enterprises and organizations to simplify and help them. It will facilitate the implementation of the
            process and reduce material costs and reduce man / costs.</p>
        <p><a class="btn btn-lg btn-success" href="{{ url('audit') }}" role="button">Get started Inventory</a></p>
    </div>
@endsection
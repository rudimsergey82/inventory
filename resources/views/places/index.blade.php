@extends('layouts.pageTemplate')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Manager places</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('places.create') }}"> Create New Place</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Type</th>
            <th>Place</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($places as $place)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $place->type_place}}</td>
                <td>{{ $place->name_place}}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('places.show',$place->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('places.edit',$place->id) }}">Edit</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['places.destroy', $place->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>

    {{--{!! $place->links() !!}--}}
@endsection
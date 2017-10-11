@extends('layouts.pageTemplate')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Manager Audit Items</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('auditItems.create') }}"> Create New Audit Item</a>
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
            <th>Name</th>
            <th>Identification number</th>
            <th>Serial number</th>
            <th>Specifications</th>
            <th>Date create</th>
            <th>Date buy</th>
            <th>Coast</th>
            <th>Date input use</th>
            <th>Item status</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($auditItems as $auditItem)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $auditItem->name}}</td>
                <td>{{ $auditItem->identification_number}}</td>
                <td>{{ $auditItem->serial_number}}</td>
                <td>{{ $auditItem->specifications}}</td>
                <td>{{ $auditItem->date_create}}</td>
                <td>{{ $auditItem->date_buy}}</td>
                <td>{{ $auditItem->coast}}</td>
                <td>{{ $auditItem->date_input_use}}</td>
                <td>{{ $auditItem->item_status}}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('auditItems.show',$auditItem->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('auditItems.edit',$auditItem->id) }}">Edit</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['auditItems.destroy', $auditItem->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>

    {{--{!! $place->links() !!}--}}
@endsection
@extends('layouts.pageTemplate')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2> Show item </h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ url('/items') }}"> Back</a>
                </div>
            </div>
        </div>
        <div class="body_item_form">
            <style>
                table {
                    border-collapse: collapse; /* Убираем двойные линии */
                    width: 100%; /* Ширина таблицы */
                    border-spacing: 0; /* Расстояние между ячеек */
                }

                td, th {
                    border: 1px solid #333; /* Параметры границ */
                    padding: 1px; /* Поля в ячейках */
                    text-align: center; /* Выравнивание по центру */
                }
            </style>
            <table class="table-all-items" border="1">
                <tr class="header-table-all-items">
                    {{--<th class="header-table">Action</th>--}}
                    {{--<th class="header-table">Number</th>--}}
                    <th class="header-table">Name</th>
                    <th class="header-table">Identification number</th>
                    <th class="header-table">Serial number</th>
                    <th class="header-table">Specifications</th>
                    <th class="header-table">Date create</th>
                    <th class="header-table">Date buy</th>
                    <th class="header-table">Coast</th>
                    <th class="header-table">Date input use</th>
                    <th class="header-table">Guarantee</th>
                    <th class="header-table">Place</th>
                </tr>
                @foreach($item as $value)
                    <tr>
                        {{--<td><a class="btn btn-lg btn-warning" href="{{url('item')}}/{{$item->item_id}}" role="button">V</a></td>--}}
                        {{--<td>{{ ++$i }}</td>--}}
                        <td>{{ $value->name_item }}</td>
                        <td>{{ $value->identification_number }}</td>
                        <td>{{ $value->serial_number }}</td>
                        <td>{{ $value->specifications }}</td>
                        <td>{{ $value->date_create }}</td>
                        <td>{{ $value->date_buy }}</td>
                        <td>{{ $value->coast }}</td>
                        <td>{{ $value->date_input_use }}</td>
                        <td>{{ $value->guarantee }}</td>
                        {{--@if(filled( {{ $value->name_place }} ))--}}
                        <td>{{ $value->type_place }} {{ $value->name_place or 'No place'}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div>
            {!! $QR !!}
            {{--{!! QrCode::size(100)->generate(Request::url()); !!}--}}
            <p>Scan me for inventory</p>
        </div>
        {{--</div>--}}
        <br>

        <div class="row">
            <div class="col-lg-6 margin-tb">
                <div class="pull-left">
                    <h2> Information audit </h2>

                    <table class="table-all-items" border="1">
                        <tr class="header-table-all-items">
                            <th class="header-table">Number</th>
                            <th class="header-table">Status</th>
                            <th class="header-table">Date audit</th>
                            <th class="header-table">Action</th>
                        </tr>
                        @foreach($audit as $value)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $value->item_status or 'No status' }}</td>
                                <td>{{ $value->created_at }}</td>
                                {{--<td><a class="btn btn-lg btn-warning" href="{{url('item')}}/{{$item->item_id}}" role="button">V</a></td>--}}
                                <td></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="col-lg-6 margin-tb">
                <div class="pull-left">
                    {{--<div class="pull-right">--}}
                    <h2> Add new place </h2>
                </div>
                <div class="form-group">
                    {!! Form::open(array('url' => 'item/addPlace','method'=>'POST')) !!}
                    {{--<strong>Name place:</strong>--}}
                    {{--{!! Form::text('name_place', null, array('placeholder' => 'Name','class' => 'form-control','style'=>'height:50px')) !!}--}}
                    <select id="select-places" name="places" class="form-control" style="height:50px">
                        <option>--Select place-- </option>
                        @foreach ($places as $place)
                            <option value="{{ $place->id }}">{{ $place->type_place }} {{$place->name_place}}</option>
                        @endforeach
                    </select>
                    <input type="hidden" name="item_id" value="{{ $id }}">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 margin-tb">
                {{--<div class="pull-right"></div>--}}
            </div>
            <div class="col-lg-6 margin-tb">
                <div class="pull-left">
                    <h2> Add audit</h2>
                </div>
                {!! Form::open(array('url' => 'item/addAudit','method'=>'POST')) !!}
                {{--<form class="form-horizontal" method="post">--}}
                    <select id="select-status" name="auditItem" class="form-control"
                            style="height:50px">
                        <option>--Select status--</option>
                        <option name="ok"> Ok</option>
                        <option name="fail"> Fail</option>
                        <option name="new">New</option>
                        {{--@foreach ($places as $place)
                            <option value="{{ $place->id }}">{{ $place->type_place }} {{$place->name_place}}</option>
                        @endforeach--}}
                    </select>
                    {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                    {{--<input type="submit" class="form-item" value="Add Audit">--}}
                    <button type="submit" class="btn btn-primary">Submit</button>
                {{--</form>--}}
                {!! Form::close() !!}

            </div>
        </div>
    </div>

@endsection

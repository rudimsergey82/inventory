@extends('layouts.pageTemplate')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show place</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('places.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Type:</strong>
                <h3>{{ $place->type_place}}</h3>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Name:</strong>
                <h3>{{ $place->name_place}}</h3>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
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
                <h3>Parent :</h3>
                <table class="table-all-items" border="1">
                    <tr class="header-table-all-items">
                        <th class="header-table">Type</th>
                        <th class="header-table">Name</th>
                        <th class="header-table">Action</th>
                    </tr>
                    <tr>
                        <td>{{ $parent->type_place or 'No parent'}}</td>
                        <td>{{ $parent->name_place or 'No parent'}}</td>
                        <td>
                            @if(isset($parent))
                                <a class="btn btn-lg btn-warning" href="{{route('places.show',$parent->id)}}">Show</a>
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="col-md-6">
            <div class="body_item_form">
                <h3>Children :</h3>
                {{--<style>
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
                </style>--}}
                <table class="table-all-items" border="1">
                    <tr class="header-table-all-items">
                        <th class="header-table">Type</th>
                        <th class="header-table">Name</th>
                        <th class="header-table">Action</th>
                    </tr>
                    @foreach($childs as $child)
                        <tr>
                            <td>{{ $child->type_place or 'No item'}}</td>
                            <td>{{ $child->name_place }}</td>
                            <td><a class="btn btn-lg btn-warning" href="{{route('places.show',$child->id)}}"
                                   role="button">Show</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
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
                    <h2>Items</h2>
                    @if(isset($items))
                        {!! Form::open(array('url' => 'place/addAudit','method'=>'POST')) !!}
                        <table class="table-all-items" border="1">
                            <tr class="header-table-all-items">
                                <th class="header-table">Number</th>
                                <th class="header-table">Name</th>
                                <th class="header-table">Identification number</th>
                                <th class="header-table">Serial number</th>
                                <th class="header-table">Specifications</th>
                                <th class="header-table">Date check</th>
                                <th class="header-table">Status</th>
                                <th class="header-table">Select new status</th>
                                <th class="header-table">Action</th>
                            </tr>
                            @foreach($items as $item)
                                @if(isset($item->name_item))
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $item->name_item }}</td>
                                        <td>{{ $item->identification_number }}</td>
                                        <td>{{ $item->serial_number }}</td>
                                        <td>{{ $item->specifications }}</td>
                                        <td>{{ $item->item_date_check }}</td>
                                        <td>{{ $item->item_status }}</td>
                                        <td>
                                            <select id="select-status" name="auditItem_{{$item->item_id}}"
                                                    class="form-control"
                                                    style="height:50px">
                                                <option>--Select status--</option>
                                                <option name="ok"> Ok</option>
                                                <option name="fail"> Fail</option>
                                                <option name="new">New</option>
                                            </select>
                                        </td>
                                        <td><a class="btn btn-lg btn-warning" href="{{url('item')}}/{{$item->id}}"
                                               role="button">Show</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </table>
                        <button type="submit" class="btn btn-primary">Add Audits</button>
                        {!! Form::close() !!}
                    @endif
                    <div>
                        {!! Form::open(array('url' => 'place/addAudit','method'=>'POST')) !!}
                        {{--{!! Form::select('id', App\Item::lists('id', 'name_item', 'identification_number'),null,['class'=>'form-control select2', 'style'=>'width: 100%;'] ) !!}
--}}                        <a class="btn btn-primary" href="#{{--{{ route('places.index',$place->id) }}--}}"> Add new items</a>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
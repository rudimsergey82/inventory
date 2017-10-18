@extends('layouts.pageTemplate')

@section('content')
    <div>
        <div class="row">
            <div class="col-lg-12{{-- margin-tb--}}">
                <div class="pull-left">
                    <h2>All items not found</h2>
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
                    <th class="header-table">Number</th>
                    <th class="header-table">Name</th>
                    <th class="header-table">Identification number</th>
                    <th class="header-table">Serial number</th>
                    <th class="header-table">Specifications</th>
                    <th class="header-table">Date create</th>
                    <th class="header-table">Date buy</th>
                    <th class="header-table">Coast</th>
                    <th class="header-table">Date input use</th>
                    <th class="header-table">Status</th>
                    <th class="header-table">Date audit</th>
                    <th class="header-table">Action</th>
                </tr>
                @foreach($failItems as $item)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $item->name_item or 'No item'}}</td>
                        <td>{{ $item->identification_number }}</td>
                        <td>{{ $item->serial_number }}</td>
                        <td>{{ $item->specifications }}</td>
                        <td>{{ $item->date_create }}</td>
                        <td>{{ $item->date_buy }}</td>
                        <td>{{ $item->coast }}</td>
                        <td>{{ $item->date_input_use }}</td>
                        <td>{{ $item->item_status }}</td>
                        <td>{{ $item->item_date_check }}</td>
                        <td><a class="btn btn-lg btn-warning" href="{{url('item')}}/{{$item->item_id}}"
                               role="button">V</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    <br>
@endsection

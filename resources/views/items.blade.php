@extends('layouts.pageTemplate')

@section('content')
    <div class="container">
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
            <h2>All items</h2>
            <table class="table-all-items" border="1">
                <tr class="header-table-all-items">
                    <th class="header-table">Action</th>
                    <th class="header-table">Number</th>
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
                @foreach($items as $item)
                    <tr>
                        <td><a class="btn btn-lg btn-warning" href="{{url('item')}}/{{$item->item_id}}" role="button">V</a>
                        </td>
                        <td>{{ ++$i }}</td>
                        <td>{{ $item->name_item or 'No item'}}</td>
                        <td>{{ $item->identification_number }}</td>
                        <td>{{ $item->serial_number }}</td>
                        <td>{{ $item->specifications }}</td>
                        <td>{{ $item->date_create }}</td>
                        <td>{{ $item->date_buy }}</td>
                        <td>{{ $item->coast }}</td>
                        <td>{{ $item->date_input_use }}</td>
                        <td>{{ $item->guarantee }}</td>
                        <td>{{ $item->type_place }} {{ $item->name_place or 'No place'}}</td>
                    </tr>
                @endforeach
            </table>
        </div>

        <div class="visible-print text-center">
            {!! QrCode::size(100)->generate(Request::url()) !!}
            <p>Scan me, to return page</p>
        </div>

        <div>
            <p><a class="btn btn-lg btn-success" href="{{url('addItem')}}" role="button">Add item</a></p>
        </div>
        <div>
            <p><a href="{{URL::to('printPreview')}}" class="btn btn-lg btn-primary">Print all items</a></p>
            <script type="text/javascript">
                $(document).ready(function(){
                    $('.btn-primary').printPage();
                });
            </script>
        </div>
    @include('common.importExport')
    </div>
@endsection

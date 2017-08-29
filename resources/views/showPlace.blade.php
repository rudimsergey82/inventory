@extends('layouts.pageTemplate')

@section('content')
    <div class="container">
        <div class="body_item_form">
            <h2>All places</h2>
            <table class="table-all-places" border="1">
                <tr class="header-table-all-places">
                    <th class="header-table">Number</th>
                    <th class="header-table">Name</th>
                    <th class="header-table">Identification number</th>
                    <th class="header-table">Serial number</th>
                    <th class="header-table">Specifications</th>
                    <th class="header-table">Date create</th>
                    <th class="header-table">Date buy</th>
                    <th class="header-table">Coast</th>
                    <th class="header-table">Date input use</th>
                    <th class="header-table">Service life</th>
                </tr>
                {{--@foreach($places as $place)
                    <tr>
                        <td>{{ $place->id }}</td>
                        <td>{{ $place->name }}</td>
                        <td>{{ $place->identification_number }}</td>
                        <td>{{ $place->serial_number }}</td>
                        <td>{{ $place->specifications }}</td>
                        <td>{{ $place->date_create }}</td>
                        <td>{{ $place->date_buy }}</td>
                        <td>{{ $place->coast }}</td>
                        <td>{{ $place->date_input_use }}</td>
                        <td>{{ $place->service_life }}</td>
                    </tr>
                @endforeach--}}
            </table>
        </div>
    </div>
@endsection

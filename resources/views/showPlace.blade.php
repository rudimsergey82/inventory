@extends('layouts.pageTemplate')

@section('content')

    <div class="container">
        {{--@foreach($tree as $arr)
            @if (empty($arr[$parent_id]))
                @php die; /*return;*/ @endphp
            @else {?>
            <div class="content">
                <ul>
                    @for ($i = 0; $i < count($arr[$parent_id]); $i++)

                        <li>
                            <div>
                                @php echo isset($arr[$parent_id][$i]['type_place']) ? htmlspecialchars($arr[$parent_id][$i]->type_place) : '' @endphp
                            </div>
                            <div class="">
                                <p> @php echo isset($arr[$parent_id][$i]['name']) ? htmlspecialchars($arr[$parent_id][$i]['name']) : '' @endphp</p>
                            </div>
                            <div>
                                <a href="#?action=add_place&place_id=@php echo $arr[$parent_id][$i]['id'] @endphp">Add
                                    place</a>
                                <a href="#?action=edit_place&place_id=@php echo $arr[$parent_id][$i]['id'] @endphp">Edit</a>
                                <a href="#?action=delete_place&place_id=@php echo $arr[$parent_id][$i]['id'] @endphp">Delete</a>
                            </div>

                            @include('managePlaces',['childs' => $child->childs])
                            /*self::buildTreePlace($arr, $arr[$parent_id][$i]['id']);
                            viewPlaces($arr, $arr[$parent_id][$i]['id']);*/

                        </li>
                    @endfor
                </ul>
            </div>
            @endif
        @endforeach--}}


        {{--<div class="body_item_form">
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
                </tr>--}}
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
        {{--            </table>
                    <div>
        @yield('showTreePlaces')
            </div>
        </div>--}}
    </div>
    @include('treePlaces'/*, 'PlaceController@showTreePlace'*/)
    {{--<div>
        @include('treePlaces'/*, 'PlaceController@showTreePlace',['childs' => $place->childs]*/)
    </div>--}}
    {{--    <div>
            {{ viewTreePlaces }}
        </div>--}}

@endsection

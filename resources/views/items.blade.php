@extends('layouts.pageTemplate')

@section('content')
    <div class="container">
        <div class="body_item_form">
            <h2>All items</h2>
            <table class="table-all-items" border="1">
                <tr class="header-table-all-items">
                    <th class="header-table"></th>
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
                        {{--<td><submit>View</submit></td>--}}
                        <td><a class="btn btn-lg btn-warning" href="{{url('item')}}/{{$item->id}}" role="button">V</a></td>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->identification_number }}</td>
                        <td>{{ $item->serial_number }}</td>
                        <td>{{ $item->specifications }}</td>
                        <td>{{ $item->date_create }}</td>
                        <td>{{ $item->date_buy }}</td>
                        <td>{{ $item->coast }}</td>
                        <td>{{ $item->date_input_use }}</td>
                        <td>{{ $item->guarantee }}</td>
                        <td>place</td>
                    </tr>
                @endforeach
            </table>
        </div>

        <div class="visible-print text-center">
            {!! QrCode::size(100)->generate(Request::url()); !!}
            <p>Сканируйте меня, чтобы вернуться на исходную страницу.</p>
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

    <div class="panel-body">

        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif

        @if ($message = Session::get('error'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('error') }}
            </div>
        @endif

        <h3>Import file to Database:</h3>
            <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ URL::to('importExcel') }}"
                  class="form-horizontal" method="post" enctype="multipart/form-data">
                <input type="file" name="import_file" />
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button class="btn btn-success btn-lg">Import File</button>
            </form>
        {{--<form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 20px;" action="{{ url('importExcel') }}
                " class="form-horizontal" method="post" enctype="multipart/form-data">

            <input type="file" name="import_file" />
            {{ csrf_field() }}
            <br/>

            <button class="btn btn-lg btn-success">Import CSV or Excel File</button>

        </form>--}}
        <br/>


        <h3>Export file from Database:</h3>
        <div style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 20px;">
            <a href="{{ url('downloadExcel/xlsx') }}"><button class="btn btn-success btn-lg">Download Excel xlsx</button></a>
            <a href="{{ url('downloadExcel/csv') }}"><button class="btn btn-success btn-lg">Download CSV</button></a>
        </div>

    </div>



    </div>
@endsection

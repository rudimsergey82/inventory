
   {{-- <div class="panel panel-primary">--}}
        {{--<div class="panel-heading">
            <h3 class="panel-title" style="padding:12px 0px;font-size:25px;"><strong>Laravel 5.3 - import export csv or
                    excel file into database example</strong></h3>
        </div>--}}
        {{--<div class="panel-body">--}}

{{--            @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
            @endif

            @if ($message = Session::get('error'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('error') }}
                </div>
            @endif--}}

    <nav {{--class="navbar navbar-default"--}}>
        {{--<div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Import - Export in Excel and CSV</a>
            </div>
        </div>--}}
        <div class="container">
            <div>
                @include('common.errors')
            </div>
            <a href="{{ URL::to('downloadExcel/xls') }}"><button class="btn btn-success">Download Excel xls</button></a>
            <a href="{{ URL::to('downloadExcel/xlsx') }}"><button class="btn btn-success">Download Excel xlsx</button></a>
            <a href="{{ URL::to('downloadExcel/csv') }}"><button class="btn btn-success">Download CSV</button></a>
            <form style="border: 4px solid #a1a1a1;margin-top: 15px;margin-right: 55px;padding: 15px;" action="{{ url('importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                <input type="file" name="import_file" />
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button class="btn btn-success">Import File</button>
            </form>
        </div>
    </nav>

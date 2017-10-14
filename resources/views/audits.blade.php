@extends('layouts.pageTemplate')

@section('content')
    {{-- <div class="container">--}}

    <div>
        <h3>Audit</h3>
    </div>

    <div id="tabs">
        <ul>
            <li><a href="#tabs-1"> All places </a></li>
            <li><a href="#tabs-2"> All items </a></li>
            {{--<li><a href="#tabs-3">All items</a></li>--}}

        </ul>
        {{--            <div class="btn-group btn-group-justified">
                        <a href="#" class="btn btn-primary">Apple</a>
                        <a href="#" class="btn btn-primary">Samsung</a>
                        <a href="#" class="btn btn-primary">Sony</a>
                    </div>--}}
        <div id="tabs-1">
            <div class="demo">
                {{--<h2>All places</h2>--}}
                @include('audits.formAuditPlace')

            </div>
        </div>
        <div id="tabs-2">
            <div class="body_item_form">
                <h2>All items</h2>
                @include('audits.formAuditItem')
            </div>
        </div>
    </div>
@endsection

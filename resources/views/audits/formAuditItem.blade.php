@if(isset($items))
    {!! Form::open(array('url' => 'audit/addItmAdts','method'=>'POST')) !!}
    <table class="table table-bordered{{-- table-all-items--}}" {{--border="1"--}}>
        <tr class="header-table-all-items">
            <th class="header-table">No</th>
            <th class="header-table">Name</th>
            <th class="header-table">Identification number</th>
            <th class="header-table">Serial number</th>
            <th class="header-table">Specifications</th>
            <th class="header-table">Place</th>
            <th class="header-table">Date check</th>
            <th class="header-table">Status</th>
            <th class="header-table">Select new status</th>
            <th class="header-table">Action</th>
        </tr>
        @foreach($items as $item)
            @if(isset($item->name_item)/* != null*/)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $item->name_item }}</td>
                    <td>{{ $item->identification_number }}</td>
                    <td>{{ $item->serial_number }}</td>
                    <td>{{ $item->specifications }}</td>
                    <td>{{ $item->type_place }} {{ $item->name_place }}</td>
                    <td>{{ $item->item_date_check }}</td>
                    <td>{{ $item->item_status }}</td>
                    <td>
                        {!! Form::select('item_status '."$item->item_id "."$item->place_id", ['new' => 'new', 'ok' => 'ok', 'fail' => 'fail'], old('item_status'), ['class'=>'form-control', 'placeholder'=>'Status', 'style'=>'height:50px']) !!}
                        {{--<input type="hidden" name="item_id {{ $item->item_id }}" value="{{ $item->item_id }}">--}}
                    </td>
                    <td><a class="btn btn-lg btn-warning" href="{{url('item')}}/{{$item->item_id}}"
                           role="button">V</a>
                    </td>
                </tr>
            @endif
        @endforeach
    </table>
    <button type="submit" class="btn btn-primary">Add Audits</button>
    {!! Form::close() !!}
@endif
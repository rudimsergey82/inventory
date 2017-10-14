@if(isset($items))
    {!! Form::open(array('url' => 'place/addAudit','method'=>'POST')) !!}
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
                    <td>{{ $item->name_item /*or 'No item'*/}}</td>
                    <td>{{ $item->identification_number }}</td>
                    <td>{{ $item->serial_number }}</td>
                    <td>{{ $item->specifications }}</td>
                    <td>{{ $item->type_place }} {{ $item->name_place }}</td>
                    <td>{{ $item->date_check }}</td>
                    <td>{{ $item->item_status }}</td>
                    <td>
                        <select id="select-status" name="auditItem_{{$item->item_id}}"
                                class="form-control"
                                style="height:50px">
                            <option data-class="avatar">--Select status--</option>
                            <option data-class="avatar" name="ok"> Ok</option>
                            <option data-class="avatar" name="fail"> Fail</option>
                            <option data-class="avatar" name="new">New</option>
                        </select>
                    </td>
                    <td><a class="btn btn-lg btn-warning" href="{{url('item')}}/{{$item->item_id}}"
                           role="button">V</a>
                    </td>
                </tr>
            @endif
        @endforeach
        {{--@foreach($childItems as $item)
            @if($item->name_item != null)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $item->name_item or 'No item'}}</td>
                    <td>{{ $item->identification_number }}</td>
                    <td>{{ $item->serial_number }}</td>
                    <td>{{ $item->specifications }}</td>
                    <td>{{ $item->date_check }}</td>
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
        @endforeach--}}
    </table>
    {{--<p>Date: <input type="text" id="datepicker"></p>--}}
    {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
    {{--<input type="submit" class="form-item" value="Add Audit">--}}
    <button type="submit" class="btn btn-primary">Add Audits</button>
    {!! Form::close() !!}
@endif
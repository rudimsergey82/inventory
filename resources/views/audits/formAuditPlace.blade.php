@if(isset($auditPlaces))
    {!! Form::open(array('url' => 'audit/addPlAdts','method'=>'POST')) !!}
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Type</th>
                <th>Place</th>
                <th>Date check</th>
                <th>Select new check</th>
                <th>Action</th>
            </tr>
            @foreach ($auditPlaces as $place)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $place->type_place}}</td>
                    <td>{{ $place->name_place}}</td>
                    <td>{{ $place->place_date_check}}</td>
                    <td>
                        {{--<input type="checkbox" name="{{$place->place_id}}" value="{{$place->place_id}}">--}}
                        {!! Form::checkbox('place_'."$place->id", 1, null, ['class' => 'field']) !!}
                        {{--{!! Form::select('place_status '."$place->id ", ['check' => 'ok'], old('place_status'), ['class'=>'form-control', 'placeholder'=>'Status', 'style'=>'height:50px']) !!}--}}
                    </td>
                    <td>
                        <a class="btn btn-info" href="{{ route('places.show',$place->id) }}">Show</a>
                    </td>
                </tr>
            @endforeach
        </table>
    <button type="submit" class="btn btn-primary">Add Audits</button>
    {!! Form::close() !!}
@endif
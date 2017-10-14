@if(isset($auditPlaces))
    {!! Form::open(array('url' => 'place/addAudit','method'=>'POST')) !!}
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Manager places</h2>
                </div>
            </div>
        </div>
{{--        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif--}}
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Type</th>
                <th>Place</th>
                <th>Date check</th>
                <th>Select new check</th>
                <th{{-- width="280px"--}}>Action</th>
            </tr>
            @foreach ($auditPlaces as $place)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $place->type_place}}</td>
                    <td>{{ $place->name_place}}</td>
                    <td>{{ $place->date_check}}</td>
                    <td><input type="checkbox" name="option2" value="{{$place->place_id}}"></td>
                    <td>
                        <a class="btn btn-info" href="{{ route('places.show',$place->id) }}">Show</a>
                    </td>
                </tr>
            @endforeach
        </table>
    <button type="submit" class="btn btn-primary">Add Audits</button>
    {!! Form::close() !!}
@endif
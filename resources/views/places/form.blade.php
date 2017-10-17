<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Type:</strong>
            {!! Form::text('type_place', null, array('placeholder' => 'Type','class' => 'form-control','style'=>'height:100px')) !!}
            <span class="text-danger">{{ $errors->first('type') }}</span>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {!! Form::text('name_place', null, array('placeholder' => 'Name','class' => 'form-control','style'=>'height:100px')) !!}
            <span class="text-danger">{{ $errors->first('name') }}</span>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Parent:</strong>
            {!! Form::select('parent_id', $allPlaces, old('parent_id'), ['class'=>'form-control', 'style'=>'height:100px', 'placeholder'=>'Select Place']) !!}
            <span class="text-danger">{{ $errors->first('parent_id') }}</span>
        </div>
    </div>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
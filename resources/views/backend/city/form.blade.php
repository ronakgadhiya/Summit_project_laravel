@if (session('status'))
<div class="mb-4 font-medium text-sm text-green-600">
    {{ session('status') }}
</div>
@endif
<div class="container">
<div class="row">
    <div class="col">
        <div class="form-group">
            {!! Form::label('Select Country',__('city.select_country'))!!}
            <span class="text-danger">*</span>
            {!! Form::select('country_id',$country,null,['id' => 'country_id','class' => 'form-control']); !!}
            
            @if ($errors->has('country_id'))
                <span class="text-danger">{{ $errors->first('country_id') }}</span>
            @endif
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('Select State',__('city.select_state'))!!}
            <span class="text-danger">*</span>
            {!! Form::select('state_id',[''=>'Select State'],null,['id' => 'state_id','class' => 'form-control']); !!}
        
            @if ($errors->has('state_id'))
                <span class="text-danger">{{ $errors->first('state_id') }}</span>
            @endif
        </div>
    </div>
</div>
    <div class="col">
        <div class="form-group">
                {!! Form::label('Enter City Name',__('city.enter_city_name'))!!}
                <span class="text-danger">*</span>
                {!! Form::text('name', null, ['class' => 'form-control','id' => 'name']) !!}
                @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
        </div>
    </div>

        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}

    </div>
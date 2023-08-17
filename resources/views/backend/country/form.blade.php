@if (session('status'))
<div class="mb-4 font-medium text-sm text-green-600">
    {{ session('status') }}
</div>
@endif
<div class="container">
    <div class="row">
        <div class="col">
            <div class="form-group">
                {!! Form::label('Enter Country Name',__('country.enter_country_name'))!!}
                    <span class="text-danger">*</span>
                    {!! Form::text('name', null, ['class' => 'form-control','id' => 'name']) !!}

                    @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                {!! Form::label('Enter Country Code',__('country.enter_country_code'))!!}
                    <span class="text-danger">*</span>
                    {!! Form::text('code', null, ['class' => 'form-control','id' => 'code']) !!}

                    @if ($errors->has('code'))
                            <span class="text-danger">{{ $errors->first('code') }}</span>
                    @endif
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col">
                {!! Form::submit('Submit', ['class' => 'btn btn-primary ']) !!}
            </div>
        </div>
    </div>
</div>
        
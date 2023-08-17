@if (session('status'))
<div class="mb-4 font-medium text-sm text-green-600">
    {{ session('status') }}
</div>
@endif
<div class="container">
    <div class="form-group">
        {!! Form::label('Enter Feature',__('feature.enter_name'))!!}
            <span class="text-danger">*</span>
            {!! Form::text('name', null, ['class' => 'form-control','id' => 'name']) !!}
            @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
    </div>
            {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
</div>

        
@if (session('status'))
<div class="mb-4 font-medium text-sm text-green-600">
    {{ session('status') }}
</div>
@endif
<div class="container">
<div class="row">
    
    <div class="col">
            <div class="form-group">
                    {!! Form::label('Enter title',__('tiket.title'))!!}
                    <span class="text-danger">*</span>
                    {!! Form::text('title', null, ['class' => 'form-control','id' => 'title']) !!}
                    
                    @if ($errors->has('title'))
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                    @endif
            </div>
        <div class="form-group">
                {!! Form::label('Enter name',__('speacker.name'))!!}
                <span class="text-danger">*</span>
                {!! Form::text('name', null, ['class' => 'form-control','id' => 'name']) !!}
                
                @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
        </div>
        <div class="form-group">
            {!! Form::label('Enter position',__('speacker.position'))!!}
            <span class="text-danger">*</span>
            {!! Form::text('position', null, ['class' => 'form-control','id' => 'position']) !!}
            
            @if ($errors->has('position'))
                    <span class="text-danger">{{ $errors->first('position') }}</span>
            @endif
        </div>
    </div>
</div>
        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}

    </div>      
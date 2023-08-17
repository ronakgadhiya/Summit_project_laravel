@if (session('status'))
<div class="mb-4 font-medium text-sm text-green-600">
    {{ session('status') }}
</div>
@endif
<div class="container">
<div class="row">
    
    <div class="col">
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
        <div class="form-group"> 
            {!! Form::label('Upload image',__('speacker.image'))!!}
                    <span class="text-danger">*</span>
            {!! Form::file('image',['id' => 'image','class'=>"btn"]) !!}
                    @if (isset($speacker) && $speacker->image != '')
                    <img src="{{ asset('images')}}/{{$speacker->image}} " style="width:100px; height: 100px;">
                    @endif
            @if ($errors->has('image'))
            <span class="text-danger">{{ $errors->first('image') }}</span>
            @endif
    </div>
    </div>
</div>
        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}

    </div>      
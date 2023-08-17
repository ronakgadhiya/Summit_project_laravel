@if (session('status'))
<div class="mb-4 font-medium text-sm text-green-600">
    {{ session('status') }}
</div>
@endif
<div class="container">
<div class="row">
    
    <div class="col">
        <div class="form-group">
                {!! Form::label('Enter title',__('slider.title'))!!}
                <span class="text-danger">*</span>
                {!! Form::text('title', null, ['class' => 'form-control','id' => 'title']) !!}
                
                @if ($errors->has('title'))
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
        </div>
        <div class="form-group">
            {!! Form::label('Enter subtitle',__('slider.subtitle'))!!}
            <span class="text-danger">*</span>
            {!! Form::text('subtitle', null, ['class' => 'form-control','id' => 'subtitle']) !!}
            
            @if ($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
            @endif
        </div>
        <div class="form-group"> 
            {!! Form::label('Upload image',__('slider.image'))!!}
                    <span class="text-danger">*</span>
            {!! Form::file('image',['id' => 'image','class'=>"btn"]) !!}
                    @if (isset($slider) && $slider->image != '')
                    <img src="{{ asset('images')}}/{{$slider->image}} " style="width:100px; height: 100px;">
                    @endif
            @if ($errors->has('image'))
            <span class="text-danger">{{ $errors->first('image') }}</span>
            @endif
    </div>
    </div>
</div>
        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}

    </div>      
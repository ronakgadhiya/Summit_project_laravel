@if (session('status'))
<div class="mb-4 font-medium text-sm text-green-600">
    {{ session('status') }}
</div>
@endif
<div class="container">
<div class="row">
        <div class="col">
                <div class="form-group">
                        {!! Form::label('user_id',__('tiket.select_username'))!!}
                        <span class="text-danger">*</span>
                        {!! Form::select('user_id',[''=>'Select username']+$username,null,['id' => 'username','class' => 'form-control','required' =>'true']); !!}  {{-- [''=>'Selectusername']+ --}}
                        @if ($errors->has('username'))
                        <span class="text-danger">{{ $errors->first('username') }}</span>
                        @endif
                </div>
        </div>
</div>
<div class="row">
        <div class="col">
                <div class="form-group">
                        {!! Form::label('feature',__('tiket.feature'))!!}
                        <span class="text-danger">*</span>
                        {!! Form::select('feature[]',$feature,null,['id' => 'feature','class' => 'form-control feature','multiple' => "true",'required' =>'true']); !!}  {{-- [''=>'Selectusername']+ --}}
                        @if ($errors->has('feature'))
                        <span class="text-danger">{{ $errors->first('feature') }}</span>
                        @endif
                </div>
        </div>
</div>
<div class="row">
        <div class="col-md-6">
                <div class="form-group">
                        {!! Form::label('Enter title',__('tiket.title'))!!}
                        <span class="text-danger">*</span>
                        {!! Form::text('title', null, ['class' => 'form-control','id' => 'title']) !!}
                        
                        @if ($errors->has('title'))
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                        @endif
                </div>
        </div>
        
        <div class="col-md-6">
                <div class="form-group">
                        {!! Form::label('Enter subtitle',__('tiket.subtitle'))!!}
                        <span class="text-danger">*</span>
                        {!! Form::text('subtitle', null, ['class' => 'form-control','id' => 'subtitle']) !!}
                        
                        @if ($errors->has('subtitle'))
                                <span class="text-danger">{{ $errors->first('subtitle') }}</span>
                        @endif
                    </div>
        </div>
</div>
<div class="row">
        
        <div class="col-md-6">
                <div class="form-group">
                        {!! Form::label('Enter btntitle',__('tiket.btntitle'))!!}
                        <span class="text-danger">*</span>
                        {!! Form::text('btntitle', null, ['class' => 'form-control','id' => 'btntitle']) !!}
                        
                        @if ($errors->has('btntitle'))
                                <span class="text-danger">{{ $errors->first('btntitle') }}</span>
                        @endif
                </div>
        </div>
        <div class="col-md-6">
                <div class="form-group">
                        {!! Form::label('Enter price',__('tiket.price'))!!}
                        <span class="text-danger">*</span>
                        {!! Form::number('price', null, ['class' => 'form-control','id' => 'price']) !!}
                        
                        @if ($errors->has('price'))
                                <span class="text-danger">{{ $errors->first('price') }}</span>
                        @endif
                    </div>
        </div>

</div>
        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}

    </div>      
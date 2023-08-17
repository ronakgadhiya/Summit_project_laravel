@if (session('status'))
<div class="mb-4 font-medium text-sm text-green-600">
    {{ session('status') }}
</div>
@endif
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                {!! Form::label('f_name',__('user.f_name'))!!}
                <span class="text-danger">*</span>
                {!! Form::text('f_name',old('f_name'),['id' => 'f_name','class' => 'form-control','required' => true]) !!}
                @if ($errors->has('f_name'))
                    <span class="text-danger">{{ $errors->first('f_name') }}</span>
                @endif 
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                {!! Form::label('l_name',__('user.l_name'))!!}
                <span class="text-danger">*</span>
                {!! Form::text('l_name',old('l_name'),['id' => 'l_name','class' => 'form-control','required' => true]) !!}
                @if ($errors->has('l_name'))
                    <span class="text-danger">{{ $errors->first('l_name') }}</span>
                @endif 
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                {!! Form::label('username',__('user.username'))!!}
            <span class="text-danger">*</span>
            {!! Form::text('username',old('username'),['id' => 'username','class' => 'form-control','required' => true]) !!}
            @if ($errors->has('username'))
                <span class="text-danger">{{ $errors->first('username') }}</span>
            @endif 
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                {!! Form::label('Select Country',__('user.select_country'))!!}
                <span class="text-danger">*</span>
                {!! Form::select('country_id',$country,null,['id' => 'country_id','class' => 'form-control']); !!}
                
                @if ($errors->has('country_id'))
                    <span class="text-danger">{{ $errors->first('country_id') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                {!! Form::label('Select State',__('user.select_state'))!!}
                <span class="text-danger">*</span>
                {!! Form::select('state_id',[''=>'Select State'],null,['id' => 'state_id','class' => 'form-control']); !!}
            
                @if ($errors->has('state_id'))
                    <span class="text-danger">{{ $errors->first('state_id') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                {!! Form::label('Select city',__('user.select_city'))!!}
                <span class="text-danger">*</span>
                {!! Form::select('city_id',[''=>'Select city'],null,['id' => 'city_id','class' => 'form-control']); !!}
            
                @if ($errors->has('city_id'))
                    <span class="text-danger">{{ $errors->first('city_id') }}</span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                {!! Form::label('email',__('user.email'))!!}
                <span class="text-danger">*</span>
                {!! Form::text('email',old('email'),['id' => 'Email','class' => 'form-control','required' => true]) !!}
                @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                {!! Form::label('mobile',__('user.mobile'))!!}
                <span class="text-danger">*</span>
                {!! Form::text('mobile',null,['id' => 'mobile','class' => 'form-control',]) !!}
                @if ($errors->has('mobile'))
                <span class="text-danger">{{ $errors->first('mobile') }}</span>
                @endif
            </div>
        </div>
    </div>
    @if(!isset($users))
    <div class="row">
        <div class="col">
        <div class="form-group">
            {!! Form::label('password',__('user.password'))!!}
            <span class="text-danger">*</span>
            {!! Form::password('password',['id' => 'Password','class' => 'form-control']) !!}
            @if ($errors->has('password'))
            <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
        </div>
        </div>
        <div class="col">
        <div class="form-group"> 
            {!! Form::label('conform_password',__('user.conform_password'))!!}
            <span class="text-danger">*</span>
            {!! Form::password('conform_password',['id' => 'Conform_Password','class' => 'form-control']) !!}
            @if ($errors->has('conform_password'))
            <span class="text-danger">{{ $errors->first('conform_password') }}</span>
            @endif
        </div>
        </div>
    </div>

    @endif
        <div class="form-group">  
            {!! Form::label('address',__('user.address'))!!}
            <span class="text-danger">*</span>
            {!! Form::textarea('address',null,['id' => 'address','class' => 'form-control',]) !!}
            @if ($errors->has('address'))
            <span class="text-danger">{{ $errors->first('address') }}</span>
            @endif
        </div>

            {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
</div>
    
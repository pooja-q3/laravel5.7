@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="pull-left"><h2>Add New User</h2> </div>
            <div class="pull-right"><a class="btn btn-primary" href="{{ route('user.index') }}"> Back</a></div>
        </div>
    </div>
    {!! Form::open(['url' => '/usersubmit','enctype' => 'multipart/form-data']) !!}
    @csrf

    @if ($errors->any())  
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach

        </ul>
    </div>
    @endif
    <div class="row">


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('name','Name',['class' => 'col-lg-2 control-label']) !!}
                <div class="col-lg-10">
                    {!! Form::text('name',$value=null, ['class'=>'form-control','placeholder'=>'name']) !!}
                    @if ($errors->has('name'))
                    <span class="alert-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('email','Email',['class' => 'col-lg-2 control-label']) !!}
                <div class="col-lg-10">
                    {!! Form::email('email', null, $attributes = $errors->has('email') ? array('placeholder' => 'Email', 'class' => 'form-control has-error') : array('placeholder' => 'Email', 'class' => 'form-control')) !!} 
                    {{$errors->first('email')}}

                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                {!!Form::label('password','Password',['class'=>'col-lg-2 control-label'])!!}
                <div class="col-lg-10">
                    {!! Form::password('password',['class'=>'form-control','placeholder'=>'password', 'type' => 'password']) !!}
                    @if($errors->has('password'))
                    <span class="alert-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                {!!Form::label('confirmpassword','Confirm Password',['class'=>'col-lg-2 control-label'])!!}
                <div class="col-lg-10">
                    {!! Form::password('confirm-password',['class'=>'form-control','placeholder'=>'confirm password', 'type' => 'password']) !!}
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('mobile','Mobile Number',['class' => 'col-lg-2 control-label']) !!}
                <div class="col-lg-10">
                    {!! Form::text('mobile_number',$value=null,['class'=>'form-control','placeholder','mobile number']) !!}
                    @if($errors->has('mobile_number'))
                    <span class="alert-danger">{{ $errors->first('mobile_number') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('selectrole', 'Select Role', ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col-lg-10">
                    {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                    <!--{!!  Form::select('role', ['A' => 'Admin', 'U' => 'User', 'SA' => 'Super Admin'],  'U', ['class' => 'form-control' ]) !!}-->
                </div>
            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('file', 'Image', ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col-lg-10">
                    {!! Form::file('image',['class'=>'form-control image','placeholder','upload image']);!!}
                </div>
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <div class="form-group">
                {!! Form::submit('Submit', ['class' => 'btn btn-lg btn-info pull-right'] ) !!}
            </div>
        </div>

    </div>


    {!! Form::close() !!}
</div>
</div>
<!--</form>-->
@stop

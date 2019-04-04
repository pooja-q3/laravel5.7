@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="pull-left"><h2>Edit User</h2> </div>
            <div class="pull-right"><a class="btn btn-primary" href="{{ route('user.index') }}"> Back</a></div>
        </div>
    </div>

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
    {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
    <!--{!! Form::model($user, ['route' =>['user.update',$user->id],'method'=>'put']) !!}-->
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('name','Name',['class' => 'col-lg-2 control-label']) !!}
                <div class="col-lg-10">
                    {!! Form::text('name',null, ['class'=>'form-control','placeholder'=>'name']) !!}
                    {{$errors->first('name')}}
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('email','Email',['class' => 'col-lg-2 control-label']) !!}
                <div class="col-lg-10">
                    {!! Form::email('email',null,['class'=>'form-control','placeholder'=>'email']) !!}
                    {{$errors->first('email')}}
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                {!!Form::label('password','Password',['class'=>'col-lg-2 control-label'])!!}
                <div class="col-lg-10">
                    {!! Form::password('password',['class' => 'form-control', 'placeholder'=>'Password']) !!}
                    {{$errors->first('password')}}
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                {!!Form::label('confirmpassword','Confirm Password',['class'=>'col-lg-2 control-label'])!!}
                <div class="col-lg-10">
                    {!! Form::password('password_confirmation',['class'=>'form-control', 'placeholder'=>'Confirm Password']) !!}
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('mobile','Mobile Number',['class' => 'col-lg-2 control-label']) !!}
                <div class="col-lg-10">
                    {!! Form::text('mobile_number',$value=null,['class'=>'form-control','placeholder','mobile number']) !!}
                    {{$errors->first('mobile_number')}}
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('selectrole', 'Select Role', ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col-lg-10">
                    {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function () {
    $('input').prop('autocomplete', 'off');
});
</script>
@stop


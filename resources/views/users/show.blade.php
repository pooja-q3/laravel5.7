@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="pull-left"><h2>View User Details</h2> </div>
            <div class="pull-right"><a class="btn btn-primary" href="{{ route('user.index') }}"> Back</a></div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <p>Name: {{$user->name}}</p> 
            <p>Email: {{$user->email}}</p> 
            <p>Mobile Number: {{$user->mobile_number}}</p>
            <p>Image: <img src="{{ asset("uploads/".$user->image) }}" width="80" height="80"/></p>
            <p>

            <div class="form-group">

                <strong>Roles:</strong>

                @if(!empty($user->getRoleNames()))

                @foreach($user->getRoleNames() as $v)

                <label class="badge badge-success">{{ $v }}</label>

                @endforeach

                @endif


            </div>
            </p>
        </div>


    </div>


</div>

<!--</form>-->
@stop

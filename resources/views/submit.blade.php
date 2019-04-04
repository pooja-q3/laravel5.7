@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">

        {{ Form::open(array('url' => 'foo/bar','method' => 'post', 'class' => 'form-bootstrap')) }}
        @csrf
        <div class="form-group">
            <label for="Username">Username</label>
            {!! Form::text('username','Username');!!}
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            {!! Form::text('email','example@gmail.com');!!}
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            {!! Form::password('password');!!}
        </div>

        <div class="form-group">
            <label for="checkbox">Checkbox</label>
            {!! Form::checkbox('name', 'value');!!}
        </div>

        <div class="form-group">
            <label for="radio">Radio</label>
            {!! Form::radio('name', 'value');!!}
        </div>

        <div class="form-group">
            <label for="file">File</label>
            {!! Form::file('image');!!}
        </div>

        <div class="form-group">
            <label for="select">Select</label>
            {!! Form::select('size', array('L' => 'Large', 'S' => 'Small'));!!}
        </div>
        {!! Form::submit('Click Me!');!!}
        {{ Form::close() }}



        <!--<h1>Submit a link</h1>-->
        <form action="/submit" method="post">
            <!--{!! csrf_field() !!}-->
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Title">
            </div>
            <div class="form-group">
                <label for="url">Url</label>
                <input type="text" class="form-control" id="url" name="url" placeholder="URL">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" placeholder="description"></textarea>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
</div>
@endsection
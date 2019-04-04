@extends('layouts.blade')
@section('title', 'Page Title')
@section('sidebar')
@parent
<p>This is appended to the master sidebar.</p>
@endsection

@section('content')
<p>This is my body content.</p>

@component('alert')
<!--<strong>Whoops!</strong> Something went wrong!-->
@slot('title')
Forbidden
@endslot
You are not allowed to access this resource!
@endcomponent
@endsection
@extends('layouts.app')
@section('content')
<div class="col-lg-10 col-lg-offset-1">

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Role Management</h2>

            </div>

            <div class="pull-right">

                @can('role-create')

                <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>

                @endcan

            </div>

        </div>

    </div>


    @if ($message = Session::get('success'))

    <div class="alert alert-success">

        <p>{{ $message }}</p>

    </div>

    @endif


    <table class="table table-bordered">

        <tr>

            <th>No</th>

            <th>Name</th>

            <th width="380px">Action</th>

        </tr>

        @foreach ($roles as $key => $role)

        <tr>

            <td>{{ ++$i }}</td>

            <td>{{ $role->name }}</td>

            <td>

                <a class="btn btn-info btn-sm" href="{{ route('roles.show',$role->id) }}">Show</a>
                <button type="button" class="btn btn-primary btn-sm openShowModel" data-id="{{$role->id}}" data-toggle="modal" data-target="#myModal">Show in Modal</button>

                @can('role-edit')

                <a class="btn btn-primary btn-sm" href="{{ route('roles.edit',$role->id) }}">Edit</a>

<!--                <button class="edit-modal btn btn-info btn-sm" data-id="{{$role->id}}" data-name="{{$role->name}}">
                    <span class="glyphicon glyphicon-edit"></span> Edit</button>-->

                @endcan

                @can('role-delete')
                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                {!! Form::close() !!}
                @endcan

            </td>

        </tr>

        @endforeach

    </table>


    {!! $roles->render() !!}

</div>
@include('roles.modal')
@endsection
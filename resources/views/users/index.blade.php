@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!--<div class="card">-->
            <div class="pull-left">User Listing</div>
            <div class="pull-right">

                <a class="btn btn-success btn-sm" href="{{ route('user.create') }}"> Create New User</a>

            </div>
            @if ($message = Session::get('success'))

            <div class="alert alert-success">

                <p>{{ $message }}</p>

            </div>

            @endif
            <!--<div class="card-body">-->
            <table  class="table table-bordered">
                <tr>
                    <th>Sno.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th>Action</th>
                </tr>


                @foreach($users as $user)
                <tr>
                    <td>{{++$i}}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $v)
                        <label class="badge badge-success">{{ $v }}</label>
                        @endforeach
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-info btn-sm" href="{{ route('user.show',$user->id) }}">View</a>
                        <a class="btn btn-primary btn-sm" href="{{ route('user.edit',$user->id) }}">Edit</a>

                        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}

                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                        {!! Form::close() !!}

                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <button class="btn btn-danger deleteRecord" data-id="{{ $user->id }}" >DRA</button>

                        <!--                        <a onclick="event.preventDefault(); document.getElementById('delete-user').submit();" class="btn btn-danger btn-sm" >Delete</a>
                                                <form id="delete-user"
                                                      action="{{ route('user.destroy', ['id' => $user->id]) }}"
                                                      method="POST"
                                                      style="display: none;">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                </form>                    -->
                    </td>




                </tr>
                @endforeach
            </table>

            {{ $users->render() }}
            <!--</div>-->
            <!--</div>-->
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $(".deleteRecord").on('click', function () {
            var id = $(this).data("id");
            var token = $("meta[name='csrf-token']").attr("content");
            $.ajax(
                    {
                        url: "user/ajax/" + id,
                        type: 'DELETE',
                        data: {
                            "id": id,
                            "_token": token,
                        },
                        success: function (response) {
                            alert("it Works" + response.success);
                            window.location.reload();
                        }
                    });
        });
    });

</script>
@stop

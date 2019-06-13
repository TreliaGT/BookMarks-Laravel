@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Users List</div>

                    @foreach ($users as $user)
                        <div class="card-body">
                            <ul class="list-group list-inline">
                                <li><a class="nav-link" href="/{{$user->id}}">
                                        <img src="/uploads/avatars/{{$user->profile->avatar}}"
                                             style="width:30px; height:30px;">
                                        {{$user->name}}</a></li>
                                <li><p>{{$user->profile->first_name}}  {{$user->profile->last_name}}</p></li>
                                <li><p>{{$user->profile->email}}</p></li>
                            </ul>
                        </div>
                    @endforeach

                    <div class="card-body">
                        <table class="table table-striped table-responsive-sm table-responsive-md">
                            <tr>
                                <th>Id</th>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Details</th>
                                <th>Delete</th>
                            </tr>
                            @foreach ($users as $user)
                                <tr>
                                    <td><p>{{$user->id}}</p></td>
                                    <td><img src="/uploads/avatars/{{$user->profile->avatar}}"
                                             style="width:30px; height:30px;">{{$user->name}}
                                    </td>
                                    <td><p> {{$user->profile->first_name}}  {{$user->profile->last_name }}</p></td>
                                    <td><p>{{$user->profile->email}}</p>
                                    <td>
                                        <a href="/users/{{$user->id}}">View Details</a>
                                    </td>
                                    <td>
                                        <button class="btn alert-danger" data-toggle="modal" data-target="#delete">
                                            Delete User
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="delete">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Delete User</h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    Are you sure you wish to delete this user?
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <form action="{{url('/users', [$user->id])}}" method="POST">
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                        <input type="submit" class="button alert float-right" value="Delete"/>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

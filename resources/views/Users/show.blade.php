@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Users List
                        @if($user->id == 1)

                         @else
                        <div class="float-right list-inline nav">
                            <a href="/users/{{$user->id}}/edit" class="nav-link ">Edit</a>
                        </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="card-columns">
                            <div class="col-lg-2 col-sm-12">
                                <img src="/uploads/avatars/{{$user->profile->avatar}}"
                                     style="width:150px; height:150px;">
                            </div>
                            <div class="col-lg-10 col-sm-12">
                                <table class="table table-striped table-responsive-sm table-responsive-md">
                                    <tr>
                                        <th>Id</th>
                                        <th>Username</th>
                                        <th> First Name</th>
                                        <th> Last Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                    </tr>
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->profile->first_name}} </td>
                                        <td>{{$user->profile->last_name }}</td>
                                        <td>{{$user->profile->email}}</td>
                                        <td>{{ $user->roles()->pluck('name')->implode(' ') }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header"> Social Media
                    </div>
                    <div class="card-body">
                        <ul>
                            @foreach($user->profile->social_media as $social_media)
                                <li> {{$social_media->name}}: {{$social_media->url}}   </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
@endsection

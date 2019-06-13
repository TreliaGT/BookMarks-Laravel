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
                </div>
            </div>
        </div>
    </div>
@endsection

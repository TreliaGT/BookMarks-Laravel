@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-12">
            <div class="card">
                <div class="card-header">{{$user->name}} Profile
                    <div class="float-right">
                        <button class="btn-primary btn"><a herf="/profile/{{$user->profile->id}}/id"> Edit Profile</a></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-columns">
                        <div class="col-lg-1 col-sm-12 border-dark align-content-around">
                            <img src="/uploads/avatars/{{$user->profile->avatar}}" style="width:150px; height:150px;">

                        </div>

                        <div class="col-lg-11 col-sm-12">
                            <p><span class="text-secondary">Email: </span> {{$user->profile->email}}</p>
                            <p><span class="text-secondary">First Name: </span> {{$user->profile->first_name}}</p>
                            <p><span class="text-secondary">Last Name: </span> {{$user->profile->last_name}}</p>
                        </div>

                    </div>
                    <div class="card-footer">
                        <form enctype="multipart/form-data" action="/profile" method="post">
                            <label class="text-secondary">Update Profile Image</label>
                            <input type="file" name="avatar">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="submit" class="btn btn-sm btn-primary">
                        </form>

                        <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#social">Add
                            Social
                        </button>
                        <div id="social" class="collapse">
                            <form class="form-group" action="/">
                                <div class="form-group">
                                    <labal for="name"> Social Media Name</labal>
                                    <input class="form-control" type="text" name="name">

                                </div>
                                <div class="form-group">
                                    <labal for="url"> URL</labal>
                                    <input class="form-control" type="Url" name="url">
                                </div>
                                <button type="submit" class="btn btn-secondary">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

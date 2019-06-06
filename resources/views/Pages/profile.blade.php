@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-12">
            <div class="card">
                <div class="card-header">{{$user->name}} Profile</div>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

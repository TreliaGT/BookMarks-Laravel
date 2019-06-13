@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-12">

            <div class="card">
                <div class="card-header"> Edit Profile</div>
                <div class="card-body">
                    <form method="post" action="{{route('profile.update', $profile->id) }}" name="ProfileUpdate">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <labal for="name" class="col-form-label">UserName</labal>
                            <input class="form-control" type="text" name="name"
                                   value="{{$profile->user->name}}">
                        </div>
                        <div class="form-group">
                            <labal for="firstname" class="col-form-label">First Name</labal>
                            <input class="form-control" type="text" name="firstname"
                                   value="{{$profile->first_name}}">
                        </div>
                        <div class="form-group">
                            <labal for="lastname" class="col-form-label">lastname Name</labal>
                            <input class="form-control" type="text" name="lastname" value="{{$profile->last_name}}">
                        </div>
                        <div class="form-group">
                            <labal for="email" class="col-form-label">Email</labal>
                            <input class="form-control" type="email" name="email" value="{{$profile->email}}">
                        </div>

                        <button type="submit" class="btn btn-success float-right">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

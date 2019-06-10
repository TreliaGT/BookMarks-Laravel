@extends('layouts.app');
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card col-lg-5 col-sm-12 m-1">
                    <div class="card-header">Add social Media</div>
                    <div class="card-body">
                        <form method="post" action="" name="addSocialMedia">
                            @csrf
                            <div class="form-group">
                                <labal for="Name" class="col-form-label">Social Name</labal>
                                <input class="form-control" type="text" name="SocialName">
                            </div>
                            <div class="form-group">
                                <labal for="URL" class="col-form-label">Url</labal>
                                <input class="form-control" type="url" name="URL">
                            </div>
                            <button type="submit" class="btn btn-success float-right">Add</button>
                        </form>
                    </div>
                </div>
                <div class="card col-lg-5 col-sm-12 m-1">
                    <div class="card-header">social Media</div>
                    <div class="card-body">
                        @foreach()

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

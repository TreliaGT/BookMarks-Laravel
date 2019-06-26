@extends('layouts.app');
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <button class="btn" data-toggle="collapse" data-target="#add">Add Social Media</button>
                <div id="add" class="collapse">
                    <div class="card col-lg-12 col-sm-12 m-1">
                        <div class="card-header">Add social Media</div>
                        <div class="card-body">
                            <form method="post" action="/profile/social" name="addSocialMedia">
                                @csrf
                                <div class="form-group">
                                    <labal for="name" class="col-form-label">Social Name</labal>
                                    <input class="form-control" type="text" name="name">
                                </div>
                                <div class="form-group">
                                    <labal for="url" class="col-form-label">Url</labal>
                                    <input class="form-control" type="url" name="url">
                                </div>
                                <button type="submit" class="btn btn-success float-right">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card col-lg-12 col-sm-12 m-1">
                    <div class="card-header">social Media</div>
                    <div class="card-body">
                        @foreach($profile->social_media as $social_media)
                                            <div>
                                                <ul>
                                                    <li> {{$social_media->name}}: <a href="{{$social_media->url}}">{{$social_media->url}}</a>
                                        <button class="btn alert-danger" data-toggle="modal" data-target="#delete">
                                            Delete
                                        </button>
                                        <div class="modal fade" id="delete">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Delete Social Media Link</h4>
                                                        <button type="button" class="close" data-dismiss="modal">×
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{url('/profile/social', [$social_media->id])}}"
                                                              method="POST">
                                                            {{method_field('DELETE')}}
                                                            {{csrf_field()}}
                                                            <input type="submit" class="button alert float-right"
                                                                   value="Delete"/>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

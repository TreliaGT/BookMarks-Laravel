@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{$bookmark->title}}
                        <div class="float-right list-inline nav">
                            <a href="/Bookmarks/{{$bookmark->id}}/edit" class="nav-link ">Edit</a>
                            <button class="nav-link btn alert-danger"  data-toggle="modal" data-target="#delete">
                                Delete </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-responsive-sm table-responsive-md">
                            <tr>
                                <th>Title</th>
                                <th>URL</th>
                                <th>thumbnail</th>
                                <th>Description</th>
                                @role('Admin')
                                <th>User</th>
                                @endrole
                            </tr>
                            <tr>
                                <td>{{$bookmark->title}}</td>
                                <td><a href="{{$bookmark->url}}">{{$bookmark->url}} </a></td>
                                <td><img src="/uploads/bookmarks/{{$bookmark->thumbnail}}"
                                         style="width:100px; height:100px;"></td>
                                <td>{{$bookmark->description}}</td>
                                @role('Admin')
                                <td>{{$bookmark->user->name}} <img
                                            src="/uploads/avatars/{{$bookmark->user->profile->avatar}}"
                                            style="width:30px; height:30px;"></td>
                                @endrole
                            </tr>
                        </table>
                    </div>
                    <div class="card">
                        <div class="card-header"> Tags</div>
                        <div class="card-body">
                            <ul>
                                @foreach($bookmark->tags as $tags)
                                    <li>{{$tags->name}}</li>
                                @endforeach
                            </ul>
                        </div>
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
                    <h4 class="modal-title">Delete Bookmark</h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    Are you sure you wish to delete this Bookmark?
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <form action="{{url('/Bookmarks', [$bookmark->id])}}" method="POST">
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                        <input type="submit" class="button alert float-right" value="Delete"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

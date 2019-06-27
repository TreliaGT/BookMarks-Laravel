@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{$bookmark->title}}
                        <div class="float-right list-inline nav">
                            @if($bookmark->user->id == Auth::user()->id)
                            <a href="/Bookmarks/{{$bookmark->id}}/edit" class="nav-link ">Edit</a>
                            <button class="nav-link btn alert-danger"  data-toggle="modal" data-target="#delete">
                                Delete </button>
                            @endif
                            @role('Admin')
                                <button class="nav-link btn alert-danger"  data-toggle="modal" data-target="#delete">
                                    Delete </button>
                            @endrole
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-responsive-sm table-responsive-md">
                            <tr>
                                <th>Title</th>
                                <th>URL</th>
                                <th>thumbnail</th>
                                <th>Description</th>
                                <th>User</th>
                                <th>Status</th>
                            </tr>
                            <tr>
                                <td>{{$bookmark->title}}</td>
                                <td><a href="{{$bookmark->url}}">{{$bookmark->url}} </a></td>
                                <td><img src="/uploads/bookmarks/{{$bookmark->thumbnail}}"
                                         style="width:100px; height:100px;"></td>
                                <td>{{$bookmark->description}}</td>
                                <td>{{$bookmark->user->name}} <img
                                            src="/uploads/avatars/{{$bookmark->user->profile->avatar}}"
                                            style="width:30px; height:30px;"></td>
                                @if($bookmark->status == 1)
                                    <td>Public</td>
                                @else
                                    <td>Private</td>
                                @endif
                            </tr>
                        </table>
                    </div>
                    <div class="card">
                        <div class="card-header"> Tags</div>
                        <div class="card-body">
                            <ul>
                                @foreach($bookmark->tags as $tags)
                                    <li><a href="/tags/{{$tags->tag_id}}">{{$tags->name}}</a> </li>
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

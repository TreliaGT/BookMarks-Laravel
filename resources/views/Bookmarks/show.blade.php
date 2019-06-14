@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{$bookmark->title}}
                        <div class="float-right list-inline nav">
                            <a href="/Bookmarks/{{$bookmark->id}}/edit" class="nav-link ">Edit</a>
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
                                <td>{{$bookmark->url}}</td>
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
@endsection

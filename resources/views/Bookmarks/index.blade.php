@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">User's BookMarks
                        <div class="float-right list-inline nav">
                            <a href="/Bookmarks/create" class="nav-link "> Create New Bookmark</a>

                            <form action="Bookmarks/search" method="POST" role="search">
                                {{ csrf_field() }}
                                <div class="input-group">
                                    <input type="text" class="form-control" name="q"
                                           placeholder="Search BookMarks">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-responsive-sm table-responsive-md">
                            <tr>
                                <th>Id</th>
                                <th>title</th>
                                <th>thumbnail</th>
                                <th>Status</th>
                                <th>User</th>
                                <th>Details</th>
                            </tr>
                            @foreach($bookmarks as $bookmark)
                                <tr>
                                    <td>{{$bookmark->id}}</td>
                                    <td>{{$bookmark->title}}</td>
                                    <td><img src="/uploads/bookmarks/{{$bookmark->thumbnail}}"
                                             style="width:100px; height:100px;"></td>
                                    @if($bookmark->status == 1)
                                        <td>Public</td>
                                    @else
                                        <td>Private</td>
                                    @endif
                                    <td>    {{$bookmark->user->name}}</td>
                                    <td>
                                        <a href="/Bookmarks/{{$bookmark->id}}">View Details</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">User's BookMarks
                        <div class="float-right list-inline nav">
                            <a href="/Bookmarks/create" class="nav-link "> Create New Bookmark</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-responsive-sm table-responsive-md">
                            <tr>
                                <th>Id</th>
                                <th>title</th>
                                <th>thumbnail</th>
                                @role('Admin')
                                <th>User</th>
                                @endrole
                                <th>Details</th>
                                <th>Delete</th>
                            </tr>
                            @foreach($bookmarks as $bookmark)
                                <tr>
                                    <td>{{$bookmark->id}}</td>
                                    <td>{{$bookmark->title}}</td>
                                    <td><img src="/uploads/bookmarks/{{$bookmark->thumbnail}}"
                                             style="width:100px; height:100px;"></td>
                                    @role('Admin')
                                   <td>    {{$bookmark->user->name}}</td>
                                    @endrole
                                    <td>
                                        <a href="/Bookmarks/{{$bookmark->id}}">View Details</a>
                                    </td>
                                    <td>
                                        <button class="btn alert-danger" data-toggle="modal" data-target="#delete">
                                            Delete
                                        </button>
                                    </td>
                                </tr>


                        </table>
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
    @endforeach
@endsection
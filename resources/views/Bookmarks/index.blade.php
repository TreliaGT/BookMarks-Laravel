@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">User's BookMarks</div>
                    <div class="card-body">
                        <table class="table table-striped table-responsive-sm table-responsive-md">
                            <tr>
                                <th>Id</th>
                                <th>title</th>
                                <th>thumbnail</th>
                                <th>Details</th>
                                <th>Delete</th>
                            </tr>
                        @foreach($bookmarks as $bookmark)
                            <tr>
                                <td>{{$bookmark->id}}</td>
                                <td>{{$bookmark->title}}</td>
                                <td>{{$bookmark->thumbnail}}</td>
                                <td>
                                    <a href="/Bookmarks/{{$bookmark->id}}">View Details</a>
                                </td>
                                <td>
                                    <button class="btn alert-danger" data-toggle="modal" data-target="#delete">
                                        Delete User
                                    </button>
                                </td>
                            </tr>
                        @endforeach
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
                    <h4 class="modal-title">Delete User</h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    Are you sure you wish to delete this user?
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
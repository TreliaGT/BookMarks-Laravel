@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Tags List
                        <div class="float-right list-inline nav">
                            <form action="/tags/search" method="POST" role="search">
                                {{ csrf_field() }}
                                <div class="input-group">
                                    <input type="text" class="form-control" name="q"
                                           placeholder="Search Tags">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </form>
                            @role('Admin')
                            <button class="nav-link btn alert-danger" data-toggle="modal" data-target="#delete">
                                Delete all Unused Tags
                            </button>
                            @endrole
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-responsive-sm table-responsive-md">
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Details</th>
                            </tr>
                            @foreach ($tags as $tag)
                                <tr>
                                    <td><p>{{$tag->tag_id}}</p></td>
                                    <td><p>{{$tag->name}}</p></td>
                                    <td>
                                        <a href="/tags/{{$tag->tag_id}}">View Details</a>
                                    </td>
                                </tr>
                            @endforeach
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
                    <h4 class="modal-title">Delete All Unused Tags</h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    Are you sure you wish to delete this Bookmark?
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <form action="/tags/deleteAll" method="POST">
                        {{csrf_field()}}
                        <input type="submit" class="button alert float-right" value="Delete"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

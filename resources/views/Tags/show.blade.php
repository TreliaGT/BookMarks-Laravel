@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{$tag->name}}
                        <div class="float-right list-inline nav">
                            <button class="nav-link btn alert-danger"  data-toggle="modal" data-target="#delete">
                                Delete </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-responsive-sm table-responsive-md">
                            <tr>
                                <th>Id</th>
                                <th>name</th>

                            </tr>
                            <tr>
                                <td><p>{{$tag->tag_id}}</p></td>
                                <td><p>{{$tag->name}}</p></td>
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
                    <form action="{{url('/tags', [$tag->tag_id])}}" method="POST">
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                        <input type="submit" class="button alert float-right" value="Delete"/>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
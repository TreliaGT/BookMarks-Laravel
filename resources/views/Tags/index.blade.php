@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Tags List</div>
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
@endsection

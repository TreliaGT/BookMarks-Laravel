@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center">
                <div class="card-header ">
                    <h2> welcome to the BookMark application</h2>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-responsive-sm table-responsive-md">
                        <tr>
                            <th>Id</th>
                            <th>title</th>
                            <th>thumbnail</th>
                            <th>Status</th>
                            <th>User</th>
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
                                <td><a href="/users/{{$bookmark->user->id}}">{{$bookmark->user->name}}</a></td>
                            </tr>

                        @endforeach
                    </table>
                </div>
                <div class="card-footer">
                    <span> Made By Georgia Trinidad v244682 2019</span>
                </div>
            </div>
        </div>
    </div>
@endsection

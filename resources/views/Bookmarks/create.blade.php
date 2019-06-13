@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Create Book Mark</div>
                    <div class="card-body">
                        <form  enctype="multipart/form-data" method="post" action="/Bookmarks" name="addSocialMedia">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <labal for="title">Title</labal>
                                <input type="text" name="title" class="form-control" >
                            </div>
                            <div class="form-group">
                                <labal for="url">Url</labal>
                                <input type="url" name="url" class="form-control">
                            </div>
                            <div class="form-group">
                                <labal for="description">Description</labal>
                                <textarea class="form-control" name="description"></textarea>
                            </div>
                            <div class="form-group">
                                <labal for="thumbnail">Thumbnail (Optional)</labal>
                                <input type="file" name="thumbnail" class="form-control-file">
                            </div>
                            <button type="submit" class="btn alert-primary float-right">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
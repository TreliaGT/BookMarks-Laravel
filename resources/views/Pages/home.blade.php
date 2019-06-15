@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in!
                        @role('Admin')
                        <p>I am a admin!<p>
                                @else
                                @role('Ban')
                            <p>Sorry, you were ban and won't be able to access anything</p>
                            <p>You may also get an email explaining why you have been ban</p>
                        @else
                            <p> Welcome to the Bookmark program</p>
                            @endrole
                            @endrole
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Event Management System - Login</div>

                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <a href="{{ url('/auth/twitter') }}" class="btn btn-primary"><i class="fa fa-twitter"></i> Login Dengan Twitter</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

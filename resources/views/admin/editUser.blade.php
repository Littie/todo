@extends('layouts.app')

@section('main-content')

    <div class="container tasks-list">
        <div class="row">
            <div class="col-xs-12">
                @include('layouts.admin._errors')
                {!!  Notification::showAll() !!}
                <form action="/users/update/{{ $user->id }}" method="post" class="form-horizontal">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="name" class="col-xs-2 control-label">Name</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" id="name" value="{{ $user->name }}" name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-xs-2 control-label">Email</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" id="email" value="{{ $user->email }}" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="role" class="col-xs-2 control-label">Role</label>
                        <div class="col-xs-8">
                            <select class="form-control" id="role" name="role">
                                <option value="admin" >admin</option>
                                <option value="guest" selected >guest</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-xs-2 control-label">Password</label>
                        <div class="col-xs-8">
                            <input type="password" class="form-control" id="password" name="password" value="{{ str_limit($user->password, 6) }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="confirm" class="col-xs-2 control-label">Confirm password</label>
                        <div class="col-xs-8">
                            <input type="password" class="form-control" id="confirm" name="password_confirmation" value="{{ str_limit($user->password, 6) }}">
                        </div>
                    </div>
                    <div class="col-xs-3 col-xs-offset-7">
                        <div class="form-group text-right">
                            <input class="btn btn-primary" type="submit" name="button" value="Save">
                            <input class="btn btn-primary" type="submit" name="button" value="Back">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@stop

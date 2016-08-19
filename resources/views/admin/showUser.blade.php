@extends('layouts.app')

@section('main-content')
    <div class="container show-user">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <table class="table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>Description</th>
                            <th>Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Name</td>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <td>Role</td>
                            <td>{{ $user->role }}</td>
                        </tr>
                        <tr>
                            <td>Active</td>
                            <td>@if ($user->is_delete == 0) true @else false @endif</td>
                        </tr>
                        <tr>
                            <td>Confirmed</td>
                            <td>@if ($user->confirmed == 1) true @else false @endif</td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <form action="{{ URL::previous() }}" method="post" class="pull-right">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-primary" value="Back">
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

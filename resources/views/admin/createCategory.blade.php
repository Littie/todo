@extends('layouts.app')

@section('main-content')
    <div class="container createCategory">
        <div class="row">
            <div class="col-xs-12">
                @include('layouts.admin._errors')
                {!!  Notification::showAll() !!}
                <form action="/category/store" method="post" class="form-horizontal">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="name" class="col-xs-2 control-label">Name</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                    </div>
                    <div class="col-xs-3 col-xs-offset-7">
                        <div class="form-group text-right">
                            <input class="btn btn-primary" type="submit" value="Save">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop


@extends('layouts.app')

@section('main-content')
    <div class="container create">
        <div class="row">
            <div class="col-xs-12">
                @include('layouts.admin._errors')
                {!!  Notification::showAll() !!}
                <h2 class="text-center">Create task</h2>
                <form action="/store" role="form" method="POST" class="form-horizontal">
                    {{ csrf_field() }}

                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <div class="form-group">
                        <label for="name" class="col-xs-2 control-label">Name</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="due-date" class="col-xs-2 control-label">Due date</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" id="due-date" name="due_date" value="{{ old('due_date') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="group" class="col-xs-2 control-label">Group</label>
                        <div class="col-xs-8">
                            <select class="form-control" id="group" name="group_id">
                                @foreach($groups as $group)
                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="note" class="col-xs-2 control-label">Note</label>
                        <div class="col-xs-8">
                            <textarea class="form-control" id="note" name="note">{{ old('note') }}</textarea>
                        </div>
                    </div>
                    <div class="col-xs-3 col-xs-offset-7">
                        <div class="form-group text-right">
                            <a href="/back">
                                <button class="btn btn-primary" type="button" name="back" value="Back">Back</button>
                            </a>
                            <input class="btn btn-primary" type="submit" value="Save">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop


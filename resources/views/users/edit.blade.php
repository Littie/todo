@extends('layouts.app')

@section('main-content')
    <div class="container edit">
        <div class="row">
            <div class="col-xs-12">

                @include('layouts.admin._errors')

                {!!  Notification::showAll() !!}

                <form action="/store/{{ $task->id }}" role="form" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PATCH">

                    <div class="form-group">
                        <label for="name" class="col-xs-2 control-label">Name</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" id="name" value="{{ $task->name }}" name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="due-date" class="col-xs-2 control-label" >Due date</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" id="due-date" value="{{ $task->due_date }}" name="due_date">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="group" class="col-xs-2 control-label">Group</label>
                        <div class="col-xs-8">
                            <select class="form-control" id="group" name="group_id">
                                @foreach($groups as $group)
                                    <option value="{{ $group->id }}" @if($task->group_id == $group->id) selected @endif>{{ $group->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="note" class="col-xs-2 control-label">Note</label>
                        <div class="col-xs-8">
                            <textarea class="form-control" id="note" name="note">{{ $task->note }}</textarea>
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


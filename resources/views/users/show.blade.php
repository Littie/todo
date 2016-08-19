@extends('layouts.app')

@section('main-content')
    <div class="container show">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="box box-solid box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ $task->name }}</h3>
                        <div class="box-tools pull-right">
                            <!-- Buttons, labels, and many other things can be placed here! -->
                            <!-- Here is a label for example -->
                            <h4>{{ $task->due_date }}</h4>
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        {{ $task->note }}
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <form action="{{ URL::previous() }}" method="post" class="pull-right">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" class="btn btn-primary" value="Back">
                        </form>
                    </div><!-- box-footer -->
                </div><!-- /.box -->
            </div>
        </div>
    </div>
@stop


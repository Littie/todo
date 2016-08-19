@extends('layouts.app')

@section('main-content')
    <div class="container">
        @if($period == 'custom')
            <div class="row">
                <form class="form-horizontal" id="getStatistics"  method="post" >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="startDate" class="col-xs-2 control-label">Start date</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" id="startDate" name="start">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="endDate" class="col-xs-2 control-label">End date</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" id="endDate" name="end">
                        </div>
                    </div>
                    <div class="col-xs-1 col-xs-offset-9">
                        <div class="form-group text-right">
                            <input class="btn btn-primary" type="submit" value="Show" >
                        </div>
                    </div>
                </form>
            </div>
        @endif
        <div class="row">
            <div class="col-xs-12">
                <h2 class="text-center">Statistic for {{ $period }}</h2>
                <div style="width: 600px; height: 600px;">
                    @if($period == 'day')
                        <canvas id="day-chart"></canvas>
                    @elseif($period == 'week')
                        <canvas id="week-chart"></canvas>
                    @elseif($period == 'month')
                        <canvas id="month-chart"></canvas>
                    @elseif($period == 'custom')
                        <canvas id="custom-chart"></canvas>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop

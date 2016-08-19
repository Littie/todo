<div class="container tasks">
    <div class="row">
        <div class="col-xs-12">
            <div class="table-responsive">
                {!!  Notification::showAll() !!}
                <h2 class="text-center">{{ $header }}</h2>
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        @foreach($headers as $head)
                            <th>{{ $head }}</th>
                        @endforeach
                    </tr>
                    </thead>
                    <tbody>
                    {{--*/ $i = ($tasks->perPage() * ($tasks->currentPage() - 1)); /*--}}
                    @foreach($tasks as $task)
                        {{--*/ $i++; /*--}}
                        <tr @if ($task->is_overdue == 1 && Request::segment(1) != 'completed') class="overdue" @endif>
                            <td class="text-center">{{ $i }}</td>
                            <td>{{ $task->name }}</td>
                            <td>{{ $task->group->name }}</td>
                            <td class="text-center">{{ $task->due_date }}</td>
                            @for ($k = 0; $k < count($links); $k++)
                                <td class="text-center"><a href="{{ $links[$k] }}/{{ $task->id  }}" @if($links[$k] == '/delete') onclick="return confirm('Are yue sure?') ? true : false" @endif><i class="{{ $icons[$k] }}" aria-hidden="true"></i></a> </td>
                            @endfor
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 text-center">
            <span>{{ $tasks->render() }}</span>
        </div>
    </div>
</div>
<div class="container users">
    <div class="row">
        <div class="col-xs-12">
            {!! Notification::showAll() !!}
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>N</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>View</th>
                        <th>Edit</th>
                        <th>@if (Request::segment(2) == 'all') Disable @else Restore @endif</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{--*/ $i = 0; /*--}}
                    @foreach($users as $user)
                        {{--*/ $i++; /*--}}
                        <tr>
                            <td class="text-center">{{ $i }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="text-center">{{ $user->created_at }}</td>
                            <td class="text-center">{{ $user->updated_at }}</td>
                            <td class="text-center"><a href="show/{{ $user->id }}"><i class="fa fa-list-alt" aria-hidden="true"></i></a></td>
                            <td class="text-center"><a href="edit/{{ $user->id  }}"><i class="fa fa-pencil-square-o fa-1x" aria-hidden="true"></i></a> </td>
                            <td class="text-center">
                                <a href="@if (Request::segment(2) == 'all')disable/@else enable/@endif{{ $user->id  }}">
                                    @if (Request::segment(2) == 'all')
                                        <i class="fa fa-trash fa-1x" aria-hidden="true"></i>
                                    @else
                                        <i class="fa fa-square-o" aria-hidden="true"></i>
                                    @endif
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


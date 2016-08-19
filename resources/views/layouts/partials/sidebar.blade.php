<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('message.header') }}</li>
            <!-- Optionally, you can add icons to the links -->
            <li @if (Request::is('/')) class="active" @endif>
                <a href="{{ url('/') }}">
                    <i class='fa fa-tasks'></i> <span>{{ trans('message.alltask') }}</span>
                    <small class="label pull-right bg-green-active">{{ $tasksCount }}</small>
                </a>
            </li>
            <li @if (Request::is('create')) class="active" @endif>
                <a href="{{ url('create') }}"><i class='fa fa-square-o'></i> <span>{{ trans('message.createtask') }}</span>
                    <small class="label pull-right bg-green">{{ $newTasksCount }} new</small>
                </a>
            </li>
            <li @if (Request::is('completed')) class="active" @endif>
                <a href="{{ url('completed') }}"><i class='fa fa-check-square-o'></i> <span>{{ trans('message.completedtasks') }}</span>
                    <small class="label pull-right bg-orange">{{ $checkedTasksCount }}</small>
                </a>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-files-o'></i> <span>{{ trans('message.categories') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu"  @if (Request::is('categories/*')) style="display:block" @endif>
                    @for($i = 0; $i < count($groups); $i++)
                        <li @if (Request::is('categories/' . $groups[$i]->name)) class="active" @endif>
                            <a href="/categories/{{ $groups[$i]->name }}">
                                <i class="fa fa-circle-o"></i>
                                {{ $groups[$i]->name }}
                                <small class="label pull-right bg-aqua">{{ $countTasksByGroup[$i] }}</small>
                            </a>
                        </li>
                    @endfor
                </ul>
            </li>
            <li class="treeview">
                <a href=""><i class='fa fa-pie-chart'></i> <span>{{ trans('message.statistic') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu" @if (Request::is('statistic/*')) style="display:block" @endif>
                    <li @if (Request::is('statistic/day')) class="active" @endif><a href="/statistic/day"><i class="fa fa-circle-o"></i>{{ trans('message.day') }}</a></li>
                    <li @if (Request::is('statistic/week')) class="active" @endif><a href="/statistic/week"><i class="fa fa-circle-o"></i>{{ trans('message.week') }}</a></li>
                    <li @if (Request::is('statistic/month')) class="active" @endif><a href="/statistic/month"><i class="fa fa-circle-o"></i>{{ trans('message.month') }}</a></li>
                    <li @if (Request::is('statistic/custom')) class="active" @endif><a href="/statistic/custom"><i class="fa fa-circle-o"></i>{{ trans('message.custom') }}</a></li>
                </ul>
            </li>
            @if (Auth::user()->role == 'admin')
            <li class="header">{{ trans('message.admin') }}</li>
                <li @if (Request::is('category/create')) class="active" @endif>
                    <a href="{{ url('/category/create') }}">
                        <i class='fa fa-square-o'></i> <span>{{ trans('message.createcategory') }}</span>
                        <small class="label pull-right bg-green-active">{{ $groups->count() }}</small>
                    </a>
                </li>
                <li class="treeview">
                    <a href=""><i class='fa fa-users'></i> <span>{{ trans('message.manageusers') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu" @if (Request::is('users/*')) style="display:block" @endif>
                        <li @if (Request::is('users/all')) class="active" @endif>
                            <a href="/users/all">
                                <i class="fa fa-circle-o"></i>{{ trans('message.users') }}
                                <small class="label pull-right bg-green">{{ $activeUsers }}</small>
                            </a>
                        </li>
                        <li @if (Request::is('users/create')) class="active" @endif>
                            <a href="/users/create">
                                <i class="fa fa-circle-o"></i>{{ trans('message.createuser') }}
                                <small class="label pull-right bg-green">{{ $newUsers }} new</small>
                            </a>
                        </li>
                        <li @if (Request::is('users/disabled')) class="active" @endif>
                            <a href="/users/disabled"><i class="fa fa-circle-o"></i>{{ trans('message.disabledusers') }}
                                <small class="label pull-right bg-red">{{ $disabledUsers }}</small>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>

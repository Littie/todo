<div id="navigation" class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="navbar-brand" href="#"><b>Tasks list</b></div>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/main"
                                      class="smoothScroll">{{ trans('adminlte_lang::message.home') }}</a>
                </li>
                <li><a href="/create"
                       class="smoothScroll">{{ trans('adminlte_lang::message.createtask') }}</a></li>
                <li><a href="/statistics"
                       class="smoothScroll">{{ trans('adminlte_lang::message.statistics') }}</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/home">{{ Auth::user()->name }}</a></li>
                <li><a href="/logout">{{ trans('adminlte_lang::message.signout') }}</a></li>
            </ul>
        </div>
    </div>
</div>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Page Description">
    <meta name="author" content="polikarpov_aj">
    <meta name="_token" content="{!! csrf_token() !!}"/>

    <title>Task list</title>

    {{-- Styles --}}

            <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"
          type="text/css"/>
    {{-- Customer style --}}
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    {{-- Anytime plugin--}}
    <link href="{{ asset('css/anytime.css') }}" rel="stylesheet">

    <link href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css" rel="stylesheet">

    {{-- JS --}}

    <!-- Bootstrap -->
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <!-- Jquery -->
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    {{-- Plugins --}}
    <script src="{{ asset('js/plugins.js') }}"></script>
    {{-- Plugin anytime--}}
    <script src="{{ asset('js/anytime.js') }}"></script>

    <script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">

            @include('layouts.users.login')

            {{--@include('layouts.users.tasks')--}}

            @yield('content')

        </div>
    </div>
</div>

</body>
</html>




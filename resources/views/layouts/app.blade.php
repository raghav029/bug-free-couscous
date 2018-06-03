<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base_url" content="{{ URL::to('/') }}">
    <title>{{ config('app.name', 'Hostel Management') }}</title>


    <!-- Styles -->
    <link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/metisMenu.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/sb-admin-2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/font-awesome/css/font-awesome.min.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Hostel Management</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        @foreach($requests as $request)
                        <li>
                            <a href="{{ route('requestView', $request->id) }}">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> {{ $request->request_name }}
                                    <span class="pull-right text-muted small">
                                    <time datetime="{{$request->created_at}}" title="{{$request->created_at}}"></time>
                                    </span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        @endforeach
                        
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                @guest
                <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                @else
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="{{ route('adminProfile') }}"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>

                        <li class="divider"></li>
                        <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out fa-fw"></i>{{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                    
                    </a>
                        </li>
                    @endguest
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">

                        <li> 
                            <a href="{{route('adminDashboard')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-home"></i> Rooms<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('roomCatIndex')}}">Rooms Category</a>
                                </li>
                                <li>
                                    <a href="{{route('roomIndex')}}">Rooms</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-user"></i> Tenants<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('tenantIndex')}}">Tenants</a>
                                </li>
                                <li>
                                    <a href="{{route('roomAllocationIndex')}}">Room Allocation</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bell"></i> Requests<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ route('requestAdminIndex') }}">All</a>
                                </li>
                                <li>
                                    <a href="{{ route('requestChangeRoom') }}">Change of Room</a>
                                </li>
                                <li>
                                    <a href="{{ route('requestFood') }}">Food</a>
                                </li>
                                <li>
                                    <a href="{{ route('requestLaundry') }}">Laundry</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-cart-plus"></i> Billing<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ route('billIndex') }}">All</a>
                                </li>
                                <li>
                                    <a href="{{ route('roomBills') }}">Room Bills</a>
                                </li>
                                <li>
                                    <a href="{{ route('allTenatnBills') }}">Tenant Bills</a>
                                </li>
                                <li>
                                    <a href="{{ route('allTenatnBillsHistory') }}">Tenants Bills History</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"> <i class="fa fa-clock-o"></i> Timings<span class="fa arrow"></span> </a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ route('timeIndex') }}"> Time Management </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Reports<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ route('tenantReports') }}">Tenants</a>
                                </li>
                                <li>
                                    <a href="{{ route('revenue') }}">Payments</a>
                                </li>
                                <li>
                                    <a href="{{ route('rentReport') }}">Rent</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-cog fa-spin fa-fw"></i> Settings<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ route('settingIndex') }}">Hostel Information</a>
                                </li>
                                <li>
                                    <a href="{{ route('administrators') }}">Administrator</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            @yield('content')
        </div>
    </div>
    <script src="{{ asset('public/js/jquery.min.js') }}"></script>
    <script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('public/js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('public/js/scripts.js') }}"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>心理测评系统</title>

    <meta name="description" content="overview &amp; stats" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="../assets/css2/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/css2/font-awesome.min.css" />
    <!-- page specific plugin styles -->

    <!-- text fonts -->
    <link rel="stylesheet" href="../assets/css2/ace-fonts.css" />

    <!-- ace styles -->
    <link rel="stylesheet" href="../assets/css2/ace.min.css" id="main-ace-style" />

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="../assets/css2/ace-part2.min.css" />
    <![endif]-->
    <link rel="stylesheet" href="../assets/css2/ace-skins.min.css" />
    <link rel="stylesheet" href="../assets/css2/ace-rtl.min.css" />
    <link rel="stylesheet" type="text/css" href="../assets/css2/home.css" />
    <!--[if lte IE 9]>
    <link rel="stylesheet" href="../assets/css2/ace-ie.min.css" />
    <link rel="stylesheet" href="../assets/css2/myself.css" />
    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <script src="../assets/js2/ace-extra.min.js"></script>

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
    <script src="../assets/js2/html5shiv.min.js"></script>
    <script src="../assets/js2/respond.min.js"></script>
    <![endif]-->
    <style>
        .role-btn {
            background: transparent !important;
            border: none;
            border-radius: 0;
            padding: 5px;
            color: black !important;
        }
        .btn {
            font-size:14px;
            border-radius:4px;
        }

    </style>
</head>

<body class="no-skin">
<!-- #section:basics/navbar.layout -->
<div id="navbar" class="navbar navbar-default">
    <script type="text/javascript">
        try {
            ace.settings.check('navbar', 'fixed')
        } catch (e) {}
    </script>

    <div class="navbar-container" id="navbar-container">
        <!-- #section:basics/sidebar.mobile.toggle -->
        <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler">
            <span class="sr-only">安工心理测评管理系统</span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>
        </button>

        <!--头部-->
        <div class="navbar-header pull-left">

            <!-- #section:basics/navbar.layout.brand -->
            <a href="{{ url('/home') }}" class="navbar-brand">
                <small>
                    <img src="../assets/images/logo.png" style="width:34px;height:34px;" title="安阳工学院" alt="logo">
                    安工心理测评管理系统
                </small>
            </a>

            <!-- /section:basics/navbar.layout.brand -->

            <!-- #section:basics/navbar.toggle -->

            <!-- /section:basics/navbar.toggle -->
        </div>

        <!-- #section:basics/navbar.dropdown -->
        <div class="navbar-buttons navbar-header pull-right" role="navigation">
            <ul class="nav ace-nav">

                <li class="green">
                    <a href="{{ url('/notifications') }}">
                        <i class="ace-icon fa fa-envelope icon-animated-vertical"></i>
                        <span class="badge badge-success"></span>
                    </a>
                </li>

                <!-- #section:basics/navbar.user_menu -->
                <li class="light-blue">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        <img class="nav-user-photo" src="../assets/avatars/user.jpg" alt="Photo" />
                            <span class="user-info">
									<small>欢迎登录,</small>
                                {{ Auth::user()->name }}
								</span>

                        <i class="ace-icon fa fa-caret-down"></i>
                    </a>

                    <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                        <li>
                            <a href="{{ url('/profile') }}">
                                <i class="ace-icon fa fa-user"></i> 个人资料
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="light-blue">
                    <a href="{{ url('/logout') }}" class="dropdown-toggle" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="ace-icon fa fa-power-off" style="color:red"></i>
                        <span class="">退出</span>
                    </a>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>

                <!-- /section:basics/navbar.user_menu -->
            </ul>
        </div>

        <!-- /section:basics/navbar.dropdown -->
    </div>
    <!-- /.navbar-container -->
</div>

<!-- /section:basics/navbar.layout -->
<div class="main-container" id="main-container">
    <script type="text/javascript">
        try {
            ace.settings.check('main-container', 'fixed')
        } catch (e) {}
    </script>

    <!-- #section:basics/sidebar -->
    <div id="sidebar" class="sidebar responsive">
        <script type="text/javascript">
            try {
                ace.settings.check('sidebar', 'fixed')
            } catch (e) {}
        </script>

        <!--侧边栏-->
        <ul class="nav nav-list">
            @role('admin')
            <li class="">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-cogs"></i>
                    <span class="menu-text">基础设置</span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>
                <b class="arrow"></b>
                <ul class="submenu">
                    <li class="">
                        <a href="{{ url('/roles') }}">
                            <i class="menu-icon fa fa-caret-right"></i> 角色管理
                        </a>

                        <b class="arrow"></b>
                    </li>
                    <li class="">
                        <a href="{{ url('/membermanage') }}">
                            <i class="menu-icon fa fa-caret-right"></i> 成员管理
                        </a>

                        <b class="arrow"></b>
                    </li>
                </ul>
            </li>
            @endrole
            <li class="">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-pencil-square-o"></i>
                    <span class="menu-text"> 心理测验</span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">
                    @permission('psychological_test')
                    <li class="">
                        <a href="{{ url('/gaugemanage') }}">
                            <i class="menu-icon fa fa-caret-right"></i> 量表管理
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="{{ url('/gaugeallot') }}">
                            <i class="menu-icon fa fa-caret-right"></i> 量表分配
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="{{ url('/gaugeinput') }}">
                            <i class="menu-icon fa fa-caret-right"></i> 测试结果录入
                        </a>

                        <b class="arrow"></b>
                    </li>
                    @endpermission
                    <li class="">
                        @role('user')
                        <a href="{{ url('/gaugeShow') }}">

                            <i class="menu-icon fa fa-caret-right"></i> 查看测试结果
                        </a>
                        @endrole
                        @permission('psychological_test')
                        <a href="{{ url('/home') }}">

                            <i class="menu-icon fa fa-caret-right"></i> 我的审核
                        </a>
                        @endpermission

                        <b class="arrow"></b>
                    </li>
                </ul>
            </li>

            <li class="">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-warning"></i>
                    <span class="menu-text">危机预警 </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">
                    <li class="">
                        <a href="{{ url('/warnsee') }}">
                            <i class="menu-icon fa fa-caret-right"></i> 查看预警
                        </a>

                        <b class="arrow"></b>
                    </li>
                    @permission('crisis_warning')
                    <li class="">
                        <a href="{{ url('/warnsetting') }}">
                            <i class="menu-icon fa fa-caret-right"></i> 预警设置
                        </a>

                        <b class="arrow"></b>
                    </li>
                    @endpermission
                </ul>
            </li>

            <li class="">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-file-text-o"></i>
                    <span class="menu-text">问卷调查 </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">
                    @permission('questionnaire_survey')
                    <li class="">
                        <a href="{{ url('/questmanage') }}">
                            <i class="menu-icon fa fa-caret-right"></i> 问卷管理
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="{{ url('/questallot') }}">
                            <i class="menu-icon fa fa-caret-right"></i> 问卷分配
                        </a>

                        <b class="arrow"></b>
                    </li>
                    @endpermission
                    <li class="">
                        <a href="{{ url('/questresult') }}">
                            <i class="menu-icon fa fa-caret-right"></i> 调查结果
                        </a>

                        <b class="arrow"></b>
                    </li>
                </ul>
            </li>
            <li class="">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-comments"></i>
                    <span class="menu-text">预约咨询</span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>
                <ul class="submenu">
                    @if(user()->permission)
                    <li class="">
                        <a href="{{ url('/appointsetting') }}">
                            <i class="menu-icon fa fa-caret-right"></i> 参数设置
                        </a>

                        <b class="arrow"></b>
                    </li>
                    @role('counselor')
                    <li class="">
                        <a href="{{ url('/home') }}">
                            <i class="menu-icon fa fa-caret-right"></i> 预约管理
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="{{ url('/appointcoach') }}">
                            <i class="menu-icon fa fa-caret-right"></i> 个案辅导
                        </a>

                        <b class="arrow"></b>
                    </li>
                        @endrole
                    @endif
                    @role('user')
                    <li class="">
                        <a href="{{ url('/appointmy') }}">
                            <i class="menu-icon fa fa-caret-right"></i> 我的预约
                        </a>

                        <b class="arrow"></b>
                    </li>
                    @endrole
                </ul>
            </li>
            <li class="">
                <a href="{{ url('/recycle') }}">
                    <i class="menu-icon fa fa-trash-o"></i>
                    <span class="menu-text">回收站</span>
                </a>

                <b class="arrow"></b>
            </li>
        </ul>
        <!-- /.nav-list -->

        <!-- #section:basics/sidebar.layout.minimize -->
        <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
            <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
        </div>

        <!-- /section:basics/sidebar.layout.minimize -->
        <script type="text/javascript">
            try {
                ace.settings.check('sidebar', 'collapsed')
            } catch (e) {}
        </script>
    </div>
    @yield('content')
    <!-- /section:basics/sidebar -->

    <div class="footer">
        <div class="footer-inner">
            <!-- #section:basics/footer -->
            <div class="footer-content">
                    <span class="bigger-120">
							<span class="blue bolder">安阳工学院</span> &nbsp;Copyright©2016-2020 &nbsp;豫ICP备10003654
                    </span>
            </div>

            <!-- /section:basics/footer -->
        </div>
    </div>


    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
    </a>
</div>
<!-- /.main-container -->
<script>$('#flash-overlay-modal').modal();</script>
</body>
</html>
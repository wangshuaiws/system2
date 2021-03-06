@extends('layouts.app')
        <!-- 主体 -->
@section('content')
        <div class="main-content">
            <div class="breadcrumbs" id="breadcrumbs">
                <script type="text/javascript">
                    try {
                        ace.settings.check('breadcrumbs', 'fixed')
                    } catch (e) {}
                </script>
                <!--路径导航-->
                <ul class="breadcrumb">
                    <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="{{ url('/home') }}">首页</a>
                    </li>
                    <li>基础设置</li>
                    <li class="active">成员管理</li>
                    <!--	<li class="active">Dashboard</li>-->
                </ul>
                <!-- /.breadcrumb -->
            </div>
            <div class="page-content-area">
                <div class="container">
                    @foreach($users as $user)
                        <div class="col-md-3">
                            <div class="panel {{ $user->hasRole('admin') ? 'panel-success' : 'panel-default' }}">
                                <div class="panel-heading">
                                    <h3 class="panel-title text-center">
                                        {{ $user->name }}
                                        @include('settings/_editUser')
                                    </h3>
                                </div>
                                <div class="panel-body">
                                    <p>Email: {{ $user->email }}</p>
                                    @if(count($user->roles))
                                        <table class="table">
                                            <tr>
                                                <th>角色</th>
                                                <th>权限</th>
                                            </tr>
                                            <tbody>
                                            @foreach($user->roles as $role)
                                                <tr>
                                                    <td>
                                                        <i class="fa fa-user"></i>
                                                        {{ $role->display_name or $role->name }}
                                                    </td>

                                                    <td>
                                                        <ul class="fa-ul">
                                                            @foreach($role->perms as $perm)
                                                                <li>
                                                                    <i class="fa-li fa fa-tag"></i>
                                                                    {{ $perm->display_name or $perm->name }}
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- /.main-content -->

                <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
                    <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
                </a>
            </div>
        </div>
            <!--[if !IE]> -->
            <script type="text/javascript">
                window.jQuery || document.write("<script src='../assets/js2/jquery.min.js'>" + "<" + "/script>");
            </script>

            <!-- <![endif]-->

            <!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='../assets/js2/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
            <script type="text/javascript">
                if ('ontouchstart' in document.documentElement) document.write("<script src='../assets/js2/jquery.mobile.custom.min.js'>" + "<" + "/script>");
            </script>
            <script src="../assets/js2/bootstrap.min.js"></script>

            <!-- page specific plugin scripts -->

            <!--[if lte IE 8]>
		  <script src="../assets/js2/excanvas.min.js"></script>
		<![endif]-->
            <script src="../assets/js2/jquery-ui.custom.min.js"></script>
            <script src="../assets/js2/jquery.ui.touch-punch.min.js"></script>
            <script src="../assets/js2/jquery.easypiechart.min.js"></script>
            <script src="../assets/js2/jquery.sparkline.min.js"></script>
            <script src="../assets/js2/flot/jquery.flot.min.js"></script>
            <script src="../assets/js2/flot/jquery.flot.pie.min.js"></script>
            <script src="../assets/js2/flot/jquery.flot.resize.min.js"></script>

            <!-- ace scripts -->
            <script src="../assets/js2/ace-elements.min.js"></script>
            <script src="../assets/js2/ace.min.js"></script>
@endsection
@extends('layouts.app')
@section('content')
<!-- 主体 -->
<div class="main-content">
    <!-- #section:basics/content.breadcrumbs -->
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
            <li class="active">角色管理</li>
            <!--	<li class="active">Dashboard</li>-->
        </ul>
        <!-- /.breadcrumb -->
    </div>
    <!-- /section:basics/content.breadcrumbs -->
    <div class="page-content">
        <div class="page-content-area">

                <!--必须整体包含在这里-->
                <div class="col-md-2">
                    <div class="row">
                        <!--正文-->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3>新建角色</h3>
                                {!! Form::open(['method' => 'post','route'=>'roles.store']) !!}
                                @include('auth.roles._createForm')
                                <div class="checkbox">
                                    @foreach ($perms as $perm)
                                        <label>
                                            {!! Form::checkbox('perm[]',$perm->id,false) !!}
                                            {{ $perm->display_name or $perm->name }}
                                        </label>
                                    @endforeach
                                </div>
                                <div class="form-group">
                                    {!! Form::submit('新建角色',['class' => "btn btn-sm btn-primary"]) !!}
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3>新建权限</h3>
                                {!! Form::open(['method' => 'post','route'=>'permissions.store']) !!}
                                @include('auth.roles._createForm')
                                <div class="form-group">
                                    {!! Form::submit('新建权限',['class' => "btn btn-sm btn-primary"]) !!}
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                    </div>
                    <!--/.row-->

            <div class="col-md-9">
                @include('auth.roles._rolePanel')
            </div>
                </div>
                <!-- /.page-content-area -->
            </div>
            <!-- /.page-content -->
        <!-- /.main-content -->
        <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
            <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
        </a>
    </div>
    <!-- /.main-container -->

    <!-- basic scripts -->

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
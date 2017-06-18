@extends('layouts.app')
<!-- 主体 -->
@section('content')
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
            <li>我的资料</li>
        </ul>
        <!-- /.breadcrumb -->
    </div>

    <!-- /section:basics/content.breadcrumbs -->
    <div class="page-content">
        <div class="page-content-area">
            <table class="row">
            @include('flash::message')
                <!--必须整体包含在这里-->
                <div class="col-md-6" style="margin-left: 300px;">
                        <div class="panel panel-default">
                            <!-- Default panel contents -->
                            <div class="panel-heading"> 个人资料 </div>
                            <div class="panel-body">
                            <h4>用户名 : {{ $user->name }}</h4>
                            <h4>性别 : {{ $user->sex == 'man'? '男':'女' }}</h4>
                            <h4>生日 : {{ $user->birthday }}</h4>
                            <h4>邮箱 : {{ $user->email }}</h4>
                            <h4>所属角色 : {{ $role->display_name }}</h4>
                            </div>
                            <br/>
                            @role('user')

                            <a href={{ url('/apply') }}>
                                <button class="btn btn-xs btn-primary" style="margin: 10px 280px;" type="button">申请成为咨询师</button>
                            </a>
                            @endrole
                        </div>
                </div>
            </table>
            <!-- /.page-content-area -->
        </div>
        <!-- /.page-content -->
    </div>
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
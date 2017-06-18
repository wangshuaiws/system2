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
                    <li>预约咨询</li>
                    <li class="active">参数设置</li>
                    <!--	<li class="active">Dashboard</li>-->
                </ul>
                <!-- /.breadcrumb -->
            </div>

            <!-- /section:basics/content.breadcrumbs -->
            <div class="page-content">
                <div class="page-content-area">
                    <div class="row">
                        <!--必须整体包含在这里-->
                        <div class="col-xs-12">
                            <div class="row">
                                @include('flash::message')
                                <!--正文-->
                                <div class="col-sm-12">
                                    <div class="tabbable">

                                        <ul id="tab" class="nav nav-tabs tab-color-blue background-blue">
                                            <li class="active">
                                                <a href="#means" data-toggle="tab">咨询信息</a>
                                            </li>
                                        </ul>

                                        <div class="tab-content">
                                            <div class="tab-pane in active" id="means">
                                                <div class="widget-header widget-hea1der-small">
                                                    <h5 style="display:inline;float:left">咨询信息</h5>
                                                    <div class="widget-toolbar align-middle" style=" width: 100px">
                                                        <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal">
                                                            <i class="ui-icon ace-icon fa fa-plus center bigger-110 white"></i>新增
                                                        </button>
                                                        <!-- Button trigger modal -->

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                        <h4 class="modal-title" id="myModalLabel">添加信息</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        {!! Form::open(['url'=>'/appoint/add','method'=>'POST']) !!}
                                                                        <div class="form-group">
                                                                            {!! Form::label('name','咨询方式 :',['class'=>'control-label']) !!}
                                                                            {!! Form::text('name',null,['class'=>'form-control']) !!}
                                                                        </div>
                                                                        <div class="form-group">
                                                                            {!! Form::label('place','咨询地点 :',['class'=>'control-label']) !!}
                                                                            {!! Form::text('place',null,['class'=>'form-control']) !!}
                                                                        </div>
                                                                        <div class="form-group">
                                                                            {!! Form::label('type','问题类型 :',['class'=>'control-label']) !!}
                                                                            {!! Form::text('type',null,['class'=>'form-control']) !!}
                                                                        </div>

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">关闭</button>
                                                                        {!! Form::submit('新增',['class'=>'btn btn-primary']) !!}
                                                                        {!! Form::close() !!}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <table id="means" class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>序号</th>
                                                            <th>登录名</th>
                                                            <th>咨询方式</th>
                                                            <th>咨询地点</th>
                                                            <th>问题类型</th>
                                                            <th>操作</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $i = 1; ?>
                                                    @foreach($information as $value)
                                                        <tr>
                                                            <td>{{ $i++ }}</td>
                                                            <td>{{ user()->name }}</td>
                                                            <td>{{ $value->ways }}</td>
                                                            <td>{{ $value->places }}</td>
                                                            <td>{{ $value->type }}</td>
                                                            <td><a href="/appoint/{{ $value->id }}">删除</a></td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!--/.row-->

                        </div>
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
        </div>
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
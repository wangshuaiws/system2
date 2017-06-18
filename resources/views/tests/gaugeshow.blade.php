@extends('layouts.app')

@section('content')
    <!-- /.main-content -->
    <div class="main-content">
        <!-- #section:basics/content.breadcrumbs -->
        <div class="breadcrumbs" id="breadcrumbs">
            <script type="text/javascript">
                try {
                    ace.settings.check('breadcrumbs', 'fixed')
                } catch (e) {}
            </script>

            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="{{ url('/home') }}">首页</a>
                </li>
                <!--	<li class="active">Dashboard</li>-->
            </ul>
            <!-- /.breadcrumb -->
        </div>
        <!-- /section:basics/content.breadcrumbs -->
        <div class="page-content">
            <div class="page-content-area">
                <div class="row">
                    <!--必须整体包含在这里-->
                    @include('flash::message')
                    <div class="col-xs-12">
                        <div class="row">
                            <!--正文-->
                            <div class="col-xs-12 col-sm-12 widget-container-col ui-sortable">
                                <div class="widget-box ui-sortable-handle" style="min-height:250px">
                                    <!-- #section:custom/widget-box.options -->
                                    <div class="widget-header">
                                        <h5 class="widget-title bigger lighter">
                                            已完成量表
                                        </h5>
                                    </div>

                                    <!-- /section:custom/widget-box.options -->
                                    <div class="widget-body">
                                        <div class="widget-main no-padding">
                                            <table id="warning" class="table table-striped table-bordered table-hover">
                                                <thead class="thin-border-bottom">
                                                <tr>
                                                    <th>
                                                        序号
                                                    </th>
                                                    <th>
                                                        用户名
                                                    </th>
                                                    <th>
                                                        量表名称
                                                    </th>
                                                    <th class="hidden-480">操作</th>
                                                    <th>状态</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php $i = 1; ?>
                                                @foreach($DoneScales as $scale)
                                                    <tr>
                                                        <td>{{ $i++ }}</td>
                                                        <td>{{ $scale->name }}</td>
                                                        <td>{{  $scale->title  }}</td>
                                                        <td><a href="/gaugecheck/{{ $scale->id }}">查看结果</a>
                                                            <a href="/scale/fDelete/{{ $scale->id }}">删除</a>
                                                        </td>
                                                        <td>已完成</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- /.span -->
                        </div>
                        <!-- /.row -->
                        <div class="row">
                            <!-- /.span -->
                        </div>
                        <!-- /.row -->
                    </div>
                </div>
                <!--/.row-->

            </div>
            <!-- /.page-content-area -->
        </div>
        <!-- /.page-content -->
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
    <script src="../assets/js2/jquery.dataTables.min.js"></script>
    <script src="../assets/js2/jquery.dataTables.bootstrap.js"></script>
    <!-- ace scripts -->
    <script src="../assets/js2/ace-elements.min.js"></script>
    <script src="../assets/js2/ace.min.js"></script>

@endsection

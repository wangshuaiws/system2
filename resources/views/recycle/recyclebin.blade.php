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
                    <li class="active">回收站</li>
                    <!--	<li class="active">Dashboard</li>-->
                    <!--<li><a href="{{ url('/cancel') }}" class="fa fa-bth btn-sm">清空回收站</a></li>-->
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
                                @role('user')
                                <div class="col-xs-12 col-sm-12 widget-container-col ui-sortable">
                                    <div class="widget-box ui-sortable-handle" style="min-height:250px">
                                        <!-- #section:custom/widget-box.options -->
                                        <div class="widget-header">
                                            <h5 class="widget-title bigger lighter">
                                                被删除量表
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
                                                            登录名
                                                        </th>
                                                        <th>
                                                            量表名称
                                                        </th>
                                                        <th>状态</th>
                                                        <th class="hidden-480">操作</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $i = 1; ?>
                                                    @foreach($scales as $scale)
                                                        <tr>
                                                            <td>{{ $i++ }}</td>
                                                            <td>{{ $scale->name }}</td>
                                                            <td>{{  $scale->title  }}</td>
                                                            <td>{{ $scale->completed ? '已完成' : '未完成' }}&nbsp;被删除</td>
                                                            <td><a href="/scale/back/{{ $scale->id }}">还原</a>
                                                                <a href="/scale/tDelete/{{ $scale->id }}">彻底删除</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endrole

                                @role('admin')
                                <div class="col-xs-12 col-sm-12 widget-container-col ui-sortable">
                                    <div class="widget-box ui-sortable-handle" style="min-height:250px">
                                        <!-- #section:custom/widget-box.options -->
                                        <div class="widget-header">
                                            <h5 class="widget-title bigger lighter">
                                                被删除申请
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
                                                            申请时间
                                                        </th>
                                                        <th>状态</th>
                                                        <th class="hidden-480">操作</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $i = 1; ?>
                                                    @foreach($applies as $apply)
                                                        <tr>
                                                            <td>{{ $i++ }}</td>
                                                            <td>{{ $apply->name }}</td>
                                                            <td>{{  $apply->created_at  }}</td>
                                                            <td>{{ $apply->status ? '已审核' : '未审核' }}&nbsp;被删除</td>
                                                            <td><a href="/backApply/{{ $apply->id }}">还原</a>
                                                                <a href="/apply/tDelete/{{ $apply->id }}">彻底删除</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endrole

                                @role('counselor')
                                <div class="col-xs-12 col-sm-12 widget-container-col ui-sortable">
                                    <div class="widget-box ui-sortable-handle" style="min-height:250px">
                                        <!-- #section:custom/widget-box.options -->
                                        <div class="widget-header">
                                            <h5 class="widget-title bigger lighter">
                                                被删除预约
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
                                                            预约人
                                                        </th>
                                                        <th>
                                                            预约时间
                                                        </th>
                                                        <th>状态</th>
                                                        <th class="hidden-480">操作</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $i = 1; ?>
                                                    @foreach($orders as $order)
                                                        <tr>
                                                            <td>{{ $i++ }}</td>
                                                            <td>{{ $order->user_name }}</td>
                                                            <td>{{ $order->date  }}</td>
                                                            <td>{{ $order->status ? '已审核' : '未审核' }}&nbsp;被删除</td>
                                                            <td><a href="/order/restore/{{ $order->id }}">还原</a>
                                                                <a href="/order/tDelete/{{ $order->id }}">彻底删除</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endrole

                                @permission('scale_manage')
                                <div class="col-xs-12 col-sm-12 widget-container-col ui-sortable">
                                    <div class="widget-box ui-sortable-handle" style="min-height:250px">
                                        <!-- #section:custom/widget-box.options -->
                                        <div class="widget-header">
                                            <h5 class="widget-title bigger lighter">
                                                被删除量表
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
                                                            量表名称
                                                        </th>
                                                        <th>
                                                            量表类别
                                                        </th>
                                                        <td>量表适应人群</td>
                                                        <th>状态</th>
                                                        <th class="hidden-480">操作</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $i = 1; ?>
                                                    @foreach($scale as $value)
                                                        <tr>
                                                            <td>{{ $i++ }}</td>
                                                            <td>{{ $value->title }}</td>
                                                            <td>{{  $value->type  }}</td>
                                                            <td>{{ $value->for_which }}</td>
                                                            <td>被删除</td>
                                                            <td><a href="/scaleManage/back/{{ $value->id }}">还原</a>
                                                                @role('admin')<a href="/scaleManage/tDelete/{{ $value->id }}">彻底删除</a>@endrole
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endpermission
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
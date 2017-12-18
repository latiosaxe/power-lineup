<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CMS {{ env('PROJECT_NAME') }}</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/assets/control/components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/control/components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/control/components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="/assets/control/components/morris.js/morris.css">
    <link rel="stylesheet" href="/assets/control/components/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="/assets/control/components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="/assets/control/components/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="/assets/control/components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="/assets/control/plugins/iCheck/all.css">
    <link rel="stylesheet" href="/assets/control/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="/assets/control/components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/plugins/sweetalert/sweetalert.css">
    <link rel="stylesheet" href="/assets/control/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="/assets/control/plugins/chosen/public/chosen.min.css">
    <link rel="stylesheet" href="/assets/control/plugins/chosen/public/docsupport/prism.css">

    <link rel="stylesheet" href="/assets/control/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="/assets/control/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/assets/control/dist/css/kouko.css">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        var KOUKO={
            base_url: '{{ url('/') }}/',
            control_url: '{{ url('/control') }}/',
            api_url: '{{ url('/api') }}/'
        };
    </script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <header class="main-header">
        <a href="/control" class="logo">
            {{ env('PROJECT_NAME') }}
        </a>
        <nav class="navbar navbar-static-top">
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <aside class="main-sidebar">
        <section class="sidebar">
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="/assets/control/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><strong>{{ $user }}</strong></p>
                    <p>Administrador</p>
                </div>
            </div>

            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">SECTIONS</li>
                <li><a href="/control/"><i class="fa fa-home"></i> <span>Inicio</span></a></li>
                <li>
                    <hr>
                </li>
                <li><a href="/" style="display: block;"><i class="fa fa-desktop"></i><span> Sitio {{ env('PROJECT_NAME') }}</span></a></li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @yield('content')

    </div>

    <aside class="control-sidebar control-sidebar-dark">
        <div class="tab-content">
            <ul class="control-sidebar-menu">
                <li>
                    <a href="/profile" style="color: #FFF;">
                        Check Your profile
                    </a>
                </li>
                <li>
                    <a href="/logout" style="color: #FFF;">
                        Logout
                    </a>
                </li>
            </ul>
        </div>
    </aside>
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


<script src="/assets/control/components/jquery/dist/jquery.min.js"></script>
<script src="/assets/control/components/jquery-ui/jquery-ui.min.js"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>

<script src="/assets/control/components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/assets/control/components/raphael/raphael.min.js"></script>
<script src="/assets/control/components/morris.js/morris.min.js"></script>
<script src="/assets/control/components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<script src="/assets/control/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/assets/control/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="/assets/control/components/jquery-knob/dist/jquery.knob.min.js"></script>
<script src="/assets/control/components/moment/min/moment.min.js"></script>
<script src="/assets/control/components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="/assets/control/components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="/assets/control/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="/assets/control/plugins/iCheck/icheck.min.js"></script>
<script src="/assets/control/components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="/assets/control/components/fastclick/lib/fastclick.js"></script>
<script src="/assets/control/dist/js/adminlte.min.js"></script>
<script src="/assets/control/components/ckeditor/ckeditor.js"></script>
<script src="/assets/control/components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="/assets/control/components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<script src="/assets/plugins/sweetalert/sweetalert.min.js"></script>
<script src="/assets/control/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="/assets/control/components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/assets/control/components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="/assets/control/plugins/chosen/public/chosen.jquery.min.js"></script>
<script src="/assets/control/plugins/chosen/public/chosen.proto.min.js"></script>
<script src="/assets/control/plugins/chosen/public/docsupport/prism.js"></script>
<script src="/assets/control/plugins/chosen/public/docsupport/init.js"></script>
{{--<script src="/assets/control/dist/js/pages/dashboard.js"></script>--}}
{{--<script src="/assets/control/dist/js/demo.js"></script>--}}

<script src="/assets/control/scripts/main.js"></script>

<script>
    $(document).ready(function(){
        KOUKO.main.init();
    });
</script>
@yield('javascript')
</body>
</html>

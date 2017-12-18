<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Iniciar Sesión | {{ env('PROJECT_NAME') }}</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/assets/control/components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/control/components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/control/components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="/assets/control/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="/assets/control/plugins/iCheck/square/blue.css">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        Panel de Administración
    </div>
    <div class="login-box-body">
        <p class="login-box-msg">Ingresa tus datos para poder acceder al CMS</p>

        <form id="loginForm">
            <div class="form-group has-feedback">
                <input type="text" id="user_name" class="form-control" placeholder="Username">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" id="password" class="form-control" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-6">
                </div>
                <div class="col-xs-6">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- jQuery 3 -->
<script src="/assets/control/components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/assets/control/components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="/assets/control/plugins/iCheck/icheck.min.js"></script>
<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#loginForm").submit(function(event){
            event.preventDefault();

            var data = {};
            data.username = $("#user_name").val();
            data.password = $("#password").val();

            data._token = $('meta[name="csrf-token"]').attr('content');

            console.log(data);

            $.ajax({
                url: '/authenticate',
                data: data,
                type: 'post',
                success: function () {
                    document.location.href = '/control'
                },
                error: function () {
                    alert("Error usuario y contraseña");
                }
            })
        });
    });
</script>
</body>
</html>







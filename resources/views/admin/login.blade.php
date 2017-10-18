<!DOCTYPE html>
<html lang="en">

<head>
    <title>Frota</title><meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset(css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/bootstrap-responsive.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/css-login.css')}}" />
    <link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.css')}}" />
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800'type='text/css'>
</head>
<body>
<div id="loginbox">
    <form id="loginform" class="form-vertical" method="POST" action="{{URL::route('login')}">
            {!! csrf_field() !!}
        <div class="control-group normal_text"> <h3><img src="img/logo.png" alt="Logo" /></h3></div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text" placeholder="Username" />
                </div>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" placeholder="Password" />
                </div>
            </div>
        </div>
        <div class="form-actions">
            <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">Lost password?</a></span>
            <span class="pull-right"><a type="submit" href="index.html" class="btn btn-success" /> Login</a></span>
        </div>
    </form>
    <form id="recoverform" method="POST" action="/admin/register" class="form-vertical">
        <p class="normal_text">Email</p>

        <div class="controls">
            <div class="main_input_box">
                <span class="add-on bg_lo"><i class="icon-envelope"></i></span><input type="text" placeholder="E-mail address" />
            </div>
        </div>

        <div class="form-actions">
            <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; voltar</a></span>
            <span class="pull-right"><a class="btn btn-info"/>Recuperar</a></span>
        </div>
    </form>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/matrix.login.js"></script>
</body>

</html>

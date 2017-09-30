<!DOCTYPE html>
<html lang="en">
    
<head>
        <title>Frota Login</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="css/login.css" />
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

    </head>
    <body>
        <div id="loginbox"> 
  

                <form role="form" method="POST" action="{{ route('login') }}" id="loginform" class="form-vertical" >

                    {{ csrf_field() }}
                 <div class="control-group normal_text"> <h3><img src="img/logo.png" alt="Logo" /></h3></div>
                    <div class="control-group{{ $errors->has('email') ? ' has-error' : '' }}">

                        <div class="controls">
                         <div class="main_input_box">
                         <span class="add-on bg_lg"><i class="icon-user"></i></span>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Username">

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                            </div>
                        </div>
                    </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                             <div class="controls">
                               <div class="main_input_box">

                                <span class="add-on bg_ly"><i class="icon-lock"></i></span>
                                <input id="password" type="password" class="form-control" name="password" required placeholder="Password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                                </div>
                             </div>
                             <span class="pull-left">
                                 <button type="submit" class="btn btn-primary">
                                    Login
                                   </button>
                                </span>
                         </div>
                    </form>


             </div>
        <script src="js/jquery.min.js"></script>  
        <script src="js/matrix.login.js"></script> 
    </body>

</html>


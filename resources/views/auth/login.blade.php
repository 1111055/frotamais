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
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-110417853-1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-110417853-1');
		</script>


    </head>
    <body>
        <div id="loginbox" style="float: left;margin-left: 10%;"> 

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
                                    <a href="{{ route('password.request') }}" class="flip-link btn btn-info" id="to-recover">Recuperar Password</a>
                                </span>
                         </div>
                    </form>


             </div>
    <body>
        <div id="loginbox" style="float: left;margin-left: 10%;"> 

                <form role="form" method="POST" action="{{ route('login') }}" id="loginform" class="form-vertical" >

                    {{ csrf_field() }}
                 <div class="control-group normal_text"> <h3><img src="img/logo.png" alt="Logo" /></h3></div>


                        <div class="controls">
                         <div class="main_input_box">
                              <form class="signup" action="index.html" method="post">
                                <div class="form-group">
                                  <input type="text" class="form-control" placeholder="Nome">
                                </div>
                                 <div class="form-group">
                                  <input type="text" class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group">
                                  <input type="text" class="form-control" placeholder="Empresa">
                                </div>
                                <div class="form-group">
                                  <input type="text" class="form-control" placeholder="Nif">
                                </div>
                                <div class="form-group">
                                <input type="submit" class="btn btn-success btn-block"  value="Enviar pedido de registo">
                                </div>
                              </form>
                         </div>
                        </div>
             

                </div>
                </form>


             </div>


    </body>

</html>


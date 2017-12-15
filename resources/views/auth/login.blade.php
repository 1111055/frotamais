<!DOCTYPE html>
<html lang="en">
    
<head>
        <title>Frota Mais - Gestão Automóvel</title><meta charset="UTF-8" />
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="author" content="Frota+">
        <meta name="generator" content="Frota+ | Gestão personalizada automóvel">
        <meta name="rating" content="general">
        <meta name="distribution" content="global">
        <meta name="expires" content="never">
        <meta name="Cache-Control" content="private">
        <meta name="revisit-after" content="3 days">
        <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
        <meta charset="utf-8">
        <meta name="Description" content="Frota Mais , gestão de veículos.">
        <meta name="Keywords" content="carros, veículos, consumos, disel, gasolina, inspecções , impostos, alertas, gestão.">


        <meta property="og:url" content="https://www.frotamais.com" />
        <meta property="og:title" content="Frota+ | Gestão personalizada automóvel" />
        <meta property="og:image" content="" />
        <meta property="og:description" content="carros, veículos, consumos, disel, gasolina, inspecções , impostos, alertas, gestão." />
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


                                 <button type="submit" class="btn btn-primary" style="width: 38%">
                                    Login
                                  </button>
                                    <a href="{{ route('password.request') }}" class="btn btn-info" id="to-recover" style="
    width: 45%;">Recuperar Password </a>


                              </div>
                             </div>
                         </div>
                    </form>


             </div>
  

                <div id="loginbox" style="float: left;margin-left: 10%; display: block; margin-top: 14%;"> 

                        <form role="form" method="POST" action="/users/savecompany"  class="form-vertical" >

                            {{ csrf_field() }}


                                <div class="controls">
                                 <div class="main_input_box">
                                      <form class="signup" action="index.html" method="post">
                                        <div class="form-group">
                                          <input type="text" class="form-control" name="name_user" placeholder="Nome">
                                        </div>
                                         <div class="form-group">
                                          <input type="text" class="form-control" name="email_user" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                          <input type="text" class="form-control" name="name_empresa" placeholder="Empresa">
                                        </div>
                                        <div class="form-group">
                                          <input type="text" class="form-control" name="nif" placeholder="Nif">
                                        </div>
                                        <div class="form-group">
                                        <input type="submit" class="btn btn-success btn-block"  value="Enviar pedido de registo">
                                        </div>
                                      </form>
                                 </div>
                                </div>
                     
                        </form>
                 </div>

             </div>


              <div id="loginbox" style="float: left;margin-left: 10%; display: none;margin-top: 10%;"> 

                    


                                <div class="controls">
                                 <div class="main_input_box">
                                      <div class="control-group normal_text"> <h3><img src="img/sucess.png" alt="Logo" style="max-width: 40px; max-height: 40px;" /></h3></div>
                                        <div class="form-group"  style="color: #fff; ">
                                          Submetido com sucesso. 
                                        </div>

                                       <div class="form-group"  style="color: #fff; ">
                                          O mais brevemente possivel receberá um email com os acessos. <br>
                                          Obrigado!
                                        </div>
                                 </div>
                                </div>
                
                 </div>

             </div>


    </body>

</html>


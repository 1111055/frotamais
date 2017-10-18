
<!DOCTYPE html>
<html lang="en">
    
<head>
        <title>Frota Login</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <link rel="stylesheet" href="../css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="../css/login.css" />
        <link href="../font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

    </head>
    <body>
        <div id="loginbox"> 
  
                  @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}


                            <p class="normal_text">Inserir o Email</p>

                            <div class="controls">
                                <div class="main_input_box">
                                    <span class="add-on bg_lo"><i class="icon-envelope"></i></span>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                 </div>   
                            </div>

                            <div class="form-actions">
                                <span class="pull-left"><a href="/" class="flip-link btn btn-success" id="to-login">&laquo; voltar</a></span>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                       <span class="pull-right">  <button type="submit" class="btn btn-info">
                                           Recuperar
                                        </button>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </form>


             </div>
        <script src="../js/jquery.min.js"></script>  
        <script src="../js/matrix.login.js"></script> 
    </body>

</html>

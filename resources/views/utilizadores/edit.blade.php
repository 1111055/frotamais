@extends('admin.app')
@extends('admin.app')

@section('content')

    @if(session('sucess'))
        <div style="background-color:green;color:#FFF;padding:15px;width: 100%;">{{session('sucess')}}</div>
    @endif

    @include ('admin.errors')


    <div class="container-fluid">
        <div class="span10">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                    <h5>Editar Utilizador</h5>
                </div>
                <div class="widget-content nopadding">

                    {!! Form::model($user, [
                            'method' => 'PUT',
                            'route' => ['users.update', $user->id],
                            'class' => 'form-horizontal'
                        ]) !!}

                    <div class="control-group">
                        {!! Form::label('* Nome:',null, ['class' => 'control-label']) !!}
                        <div class="controls">
                            {!! Form::text('name',$user->name,['class' => 'form-horizontal']) !!}
                        </div>
                    </div>

                    <div class="control-group">
                        {!! Form::label('* Email:',null, ['class' => 'control-label']) !!}
                        <div class="controls">
                            {!! Form::text('email',$user->email,['class' => 'form-horizontal']) !!}
                        </div>
                    </div>
                    <div class="control-group">
                        {!! Form::label('* Contacto:',null, ['class' => 'control-label']) !!}
                        <div class="controls">
                            {!! Form::text('contact',$user->contact,['class' => 'form-horizontal']) !!}
                        </div>
                    </div>

                    <div class="control-group">
                        {!! Form::label('* Número Mecanográfico:',null, ['class' => 'control-label']) !!}
                        <div class="controls">
                            {!! Form::text('number',$user->number,['class' => 'form-horizontal']) !!}
                        </div>
                    </div>
                    <div class="control-group">
                                {!! Form::label('* Password:',null, ['class' => 'control-label']) !!}
                                <div class="controls">
                                    {!! Form::password('password',null,['class' => 'form-horizontal']) !!}
                                </div>
                            </div>
                            <div class="control-group">
                                {!! Form::label('* Confirme Password:',null, ['class' => 'control-label']) !!}
                                <div class="controls">
                                    {!! Form::password('password_confirmation',null,['class' => 'form-horizontal']) !!}
                                </div>
                    </div>
                    @if(Auth::user()->typeuser==1)
                    <div class="control-group">
                        {!! Form::label('* Tipo de Utilizador:',null, ['class' => 'control-label']) !!}
                        <div class="controls">
                            {!! Form::select('typeuser', $typeu,$user->typeuser,['class' => 'form-horizontal']) !!}
                        </div>

                    </div>
                    @endif
                   @if(Auth::user()->typeuser==1)
                    <div class="control-group">
                        {!! Form::label('* Empresa:',null, ['class' => 'control-label']) !!}
                        <div class="controls">
                            {!! Form::select('company_id', $company,$user->company_id,['class' => 'form-horizontal']) !!}
                        </div>

                    </div>
                    @endif
                    <div class="form-actions">
                        {!! Form::submit('GUARDAR',['class' => 'btn btn-success']) !!}
                    </div>
                    {!! Form::close() !!}


                </div>
            </div>
        </div>
    </div>

@stop
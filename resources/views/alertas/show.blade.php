@extends('admin.app')

@section('content')

    @if(session('sucess'))
        <div style="background-color:green;color:#FFF;padding:15px;width: 100%;">{{session('sucess')}}</div>
    @endif

    @include ('admin.errors')


    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
            {{ Form::open(['route' => ['alerts.destroy', $alert->id], 'method' => 'delete']) }}
            <button type="submit" class="btn btn-danger btn-xs" style="float: left; margin-bottom: 10px; margin-left: 55px;">Eliminar</button>
            {{ Form::close() }}
            
                <div class="widget-box">

                    <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>Ficha do Veiculo</h5>
                    </div>
                    <div class="widget-content nopadding">
                        {!! Form::open(['url' => 'alerts','class' => 'form-horizontal']) !!}

                        <div class="control-group">
                            {!! Form::label('Mensagem:',null, ['class' => 'control-label']) !!}
                            <div class="controls">
                                {!! Form::text('marca',$alert->mensage,['readonly'],['class' => 'form-horizontal']) !!}
                            </div>
                        </div>

                        <div class="control-group">
                            {!! Form::label('Data Conclusão:',null, ['class' => 'control-label']) !!}
                            <div class="controls">
                                {!! Form::text('modelo',$alert->date,['readonly'],['class' => 'form-horizontal']) !!}
                            </div>
                        </div>
                        <div class="control-group">
                            {!! Form::label('Falta:',null, ['class' => 'control-label']) !!}
                            <div class="controls">
                                {!! Form::text('kms',null,['readonly'],['class' => 'form-horizontal']) !!}
                            </div>
                        </div>
                        <div class="form-actions">
                            <a href="{{route('alerts.edit',$alert->id)}}"> <i class="icon-edit icon-3x"></i></a>
                        </div>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>

        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>Utilizador Atribuido</h5>
                    </div>
                    <div class="widget-content nopadding">
                        {!! Form::open(['url' => 'alerts','class' => 'form-horizontal']) !!}

                        <div class="control-group">
                            {!! Form::label('N�mero Mecanogr�fico:',null, ['class' => 'control-label']) !!}
                            <div class="controls">
                                {!! Form::text('number',$alert->user['number'],['readonly'],['class' => 'form-horizontal']) !!}
                            </div>
                        </div>
                        <div class="control-group">
                            {!! Form::label('Nome:',null, ['class' => 'control-label']) !!}
                            <div class="controls">
                                {!! Form::text('name', $alert->user['name'],['readonly'],['class' => 'form-horizontal']) !!}
                            </div>
                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
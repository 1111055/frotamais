@extends('admin.app')

@section('content')

    @if(session('sucess'))
        <div style="background-color:green;color:#FFF;padding:15px;width: 100%;">{{session('sucess')}}</div>
    @endif

    @include ('admin.errors')
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>Editar Alerta</h5>
                    </div>
                    <div class="widget-content nopadding">

                        {!! Form::model($alert, [
                              'method' => 'PUT',
                              'route' => ['alerts.update', $alert->id],
                              'class' => 'form-horizontal'
                         ]) !!}

                        <div class="control-group">
                            {!! Form::label('* Colaborador:',null, ['class' => 'control-label']) !!}
                            <div class="controls">
                                {!! Form::select('colaborador', $colaborador,$alert->colaborador,['class' => 'form-horizontal']) !!}
                            </div>

                        </div>
                        <div class="control-group">
                            {!! Form::label('* Mensagem:',null, ['class' => 'control-label']) !!}
                            <div class="controls">
                                {!! Form::textarea('mensage',$alert->mensage,['size' => '30x5'],['class' => 'form-horizontal']) !!}
                            </div>

                        </div>
                        <div class="control-group">
                            {!! Form::label('* Data:',null, ['class' => 'control-label']) !!}
                            <div class="controls">
                                {!! Form::text('date',$alert->date,['class' => 'form-horizontal']) !!}
                            </div>
                        </div>
                        <div class="form-actions">
                            {!! Form::submit('GUARDAR',['class' => 'btn btn-success']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>

@stop
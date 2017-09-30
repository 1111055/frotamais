@extends('admin.app')

@section('content')


    @if(session('sucess'))
        <div style="background-color:green;color:#FFF;padding:15px;width: 100%;">{{session('sucess')}}</div>
    @endif

    @include ('admin.errors')
    <div class="container-fluid">
        <div class="row-fluid"  >
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>Editar Veiculo</h5>
                    </div>
                    <div class="widget-content nopadding">
                        {!! Form::model($vehicle, [
                             'method' => 'PUT',
                             'route' => ['vehicles.update', $vehicle->id],
                             'class' => 'form-horizontal'
                         ]) !!}


                        <div class="control-group">
                            {!! Form::label('* Marca:',null, ['class' => 'control-label']) !!}
                            <div class="controls">
                                {!! Form::text('marca',$vehicle->marca,['class' => 'form-horizontal']) !!}
                            </div>

                        </div>

                        <div class="control-group">
                            {!! Form::label('* Modelo:',null, ['class' => 'control-label']) !!}
                            <div class="controls">
                                {!! Form::text('modelo',$vehicle->modelo,['class' => 'form-horizontal']) !!}
                            </div>
                        </div>
                        <div class="control-group">
                            {!! Form::label('* Matricula:',null, ['class' => 'control-label']) !!}
                            <div class="controls">
                                {!! Form::text('matricula',$vehicle->matricula,['class' => 'form-horizontal']) !!}
                            </div>
                        </div>
                        <div class="control-group">
                            {!! Form::label('* Data Registo: ',null, ['class' => 'control-label']) !!}
                            <div class="controls">
                                {!! Form::text('dataregisto',$vehicle->dataregisto,['class' => 'form-horizontal','id' => 'dataregisto']) !!}
                            </div>
                        </div>
                        <div class="control-group">
                            {!! Form::label('* Kms:',null, ['class' => 'control-label']) !!}
                            <div class="controls">
                                {!! Form::text('kms',$vehicle->kms,['class' => 'form-horizontal']) !!}
                            </div>
                        </div>
                        <div class="control-group">
                            {!! Form::label('* Colaborador:',null, ['class' => 'control-label']) !!}
                            <div class="controls">
                                {!! Form::select('colaborador', $colaborador,$vehicle->colaborador,['class' => 'form-horizontal']) !!}
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
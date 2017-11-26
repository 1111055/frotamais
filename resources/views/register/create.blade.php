@extends('admin.app')

@section('content')

    @if(session('sucess'))
        <div style="background-color:green;color:#FFF;padding:15px;width: 100%;">{{session('sucess')}}</div>
    @endif

    @include ('admin.errors')
        <div class="row-fluid" >
            <div class="span10">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>Adicionar Despesa</h5>
                    </div>
                    <div class="widget-content nopadding">

                        {!! Form::open(['url' => 'registers','class' => 'form-horizontal']) !!}

                        <div class="control-group">
                            {!! Form::label('* Veículo:',null, ['class' => 'control-label']) !!}
                            <div class="controls">
                                {!! Form::select('vehicle_id', $vehicle,['class' => 'form-horizontal']) !!}
                            </div>

                        </div>
                        <div class="control-group">
                            {!! Form::label('* Tipo despesa:',null, ['class' => 'control-label']) !!}
                            <div class="controls">
                                {!! Form::select('type_id', $expense,['class' => 'form-horizontal']) !!}
                            </div>

                        </div>
                        <div class="control-group">
                            {!! Form::label('* Kms:',null, ['class' => 'control-label']) !!}
                            <div class="controls">
                                {!! Form::text('kms',null,['class' => 'form-horizontal']) !!}
                            </div>
                        </div>
                        <div class="control-group">
                            {!! Form::label('* Valor:',null, ['class' => 'control-label']) !!}
                            <div class="controls">
                                {!! Form::text('preco',null,['class' => 'form-horizontal']) !!}
                            </div>
                        </div>
                        <div class="control-group">
                            {!! Form::label('Número de litros(Combustivel):',null, ['class' => 'control-label']) !!}
                            <div class="controls">
                                {!! Form::text('litros',null,['class' => 'form-horizontal']) !!}
                            </div>
                        </div>
                        <div class="control-group">
                               {!! Form::label('* Data: ',null, ['class' => 'control-label']) !!}
                               <div class="controls">
                                   {!! Form::text('dataregisto',null,['class' => 'form-horizontal','id' => 'dataregisto']) !!}
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

@stop
@extends('admin.app')

@section('content')


    @if(session('sucess'))
        <div style="background-color:green;color:#FFF;padding:15px;width: 100%;">{{session('sucess')}}</div>
    @endif

    @include ('admin.errors')
    <div class="container-fluid">
        <div class="row-fluid"  >
            <div class="span10">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>Editar Despesa</h5>
                    </div>
                    <div class="widget-content nopadding">
                        {!! Form::model($register, [
                             'method' => 'PUT',
                             'route' => ['registers.update', $register->id],
                             'class' => 'form-horizontal'
                         ]) !!}

                        <div class="control-group">
                            {!! Form::label('* Veículo:',null, ['class' => 'control-label']) !!}
                            <div class="controls">
                                {!! Form::select('vehicle_id',$vehicle,$register->vehicle_id,['class' => 'form-horizontal']) !!}
                            </div>

                        </div>
                        <div class="control-group">
                            {!! Form::label('* Tipo Despesa:',null, ['class' => 'control-label']) !!}
                            <div class="controls">
                                {!! Form::select('type_id', $expense,$register->typexpense['typedesc'],['class' => 'form-horizontal']) !!}
                            </div>

                        </div>
                        <div class="control-group">
                            {!! Form::label('* KMS:',null, ['class' => 'control-label']) !!}
                            <div class="controls">
                                {!! Form::text('kms',$register->kms,['class' => 'form-horizontal']) !!}
                            </div>
                        </div>
                        <div class="control-group">
                            {!! Form::label('* Preço:',null, ['class' => 'control-label']) !!}
                            <div class="controls">
                                {!! Form::text('preco',$register->preco,['class' => 'form-horizontal']) !!}
                            </div>
                        </div>
                        <div class="control-group">
                            {!! Form::label('Nº Litros:',null, ['class' => 'control-label']) !!}
                            <div class="controls">
                                {!! Form::text('litros',$register->litros,['class' => 'form-horizontal']) !!}
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
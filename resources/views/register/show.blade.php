@extends('admin.app')

@section('content')

    @if(session('sucess'))
        <div style="background-color:green;color:#FFF;padding:15px;width: 100%;">{{session('sucess')}}</div>
    @endif

    @include ('admin.errors')


    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span10">
                {{ Form::open(['route' => ['registers.destroy', $register->id], 'method' => 'delete']) }}
                <button type="submit" class="btn btn-danger btn-xs" style="float: left; margin-bottom: 10px; margin-left: 55px;">Eliminar</button>
                {{ Form::close() }}

                <div class="widget-box">

                    <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5> Ver Despesa</h5>
                    </div>
                    <div class="widget-content nopadding">
                        {!! Form::open(['url' => 'vehicles','class' => 'form-horizontal']) !!}

                        <div class="control-group">
                            {!! Form::label('Veículo:',null, ['class' => 'control-label']) !!}
                            <div class="controls">
                                {!! Form::text('vehicle_id',$register->vehicle['matricula'],['readonly'],['class' => 'form-horizontal']) !!}
                            </div>
                        </div>

                        <div class="control-group">
                            {!! Form::label('Tipo de Despesa:',null, ['class' => 'control-label']) !!}
                            <div class="controls">
                                {!! Form::text('type_id',$register->typexpense['typedesc'],['readonly'],['class' => 'form-horizontal']) !!}
                            </div>
                        </div>

                        <div class="control-group">
                            {!! Form::label('kms:',null, ['class' => 'control-label']) !!}
                            <div class="controls">
                                {!! Form::text('kms',$register->kms,['readonly'],['class' => 'form-horizontal']) !!}
                            </div>
                        </div>
                        <div class="control-group">
                            {!! Form::label('Preço:',null, ['class' => 'control-label']) !!}
                            <div class="controls">
                                {!! Form::text('preco',$register->preco,['readonly'],['class' => 'form-horizontal']) !!}
                            </div>
                        </div>
                        <div class="control-group">
                            {!! Form::label('Nº Litros:',null, ['class' => 'control-label']) !!}
                            <div class="controls">
                                {!! Form::text('litros',$register->litros,['readonly'],['class' => 'form-horizontal']) !!}
                            </div>
                        </div>
                        <div class="control-group">
                            {!! Form::label('Data:',null, ['class' => 'control-label']) !!}
                            <div class="controls">
                                {!! Form::text('updated_at',$register->created_at,['readonly'],['class' => 'form-horizontal']) !!}
                            </div>
                        </div>
                        <div class="form-actions">
                            <a href="{{route('registers.edit',$register->id)}}"> <i class="icon-edit icon-3x"></i></a>
                        </div>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>




@stop
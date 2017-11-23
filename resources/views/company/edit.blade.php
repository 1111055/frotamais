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
                    <h5>Editar Empresa</h5>
                </div>
                <div class="widget-content nopadding">

                    {!! Form::model($company, [
                            'method' => 'PUT',
                            'route' => ['company.update', $company->id],
                            'class' => 'form-horizontal'
                        ]) !!}

                    <div class="control-group">
                        {!! Form::label('* Nome:',null, ['class' => 'control-label']) !!}
                        <div class="controls">
                            {!! Form::text('nome',$company->nome,['class' => 'form-horizontal']) !!}
                        </div>
                    </div>

                    <div class="control-group">
                        {!! Form::label('* Morada:',null, ['class' => 'control-label']) !!}
                        <div class="controls">
                            {!! Form::text('morada',$company->morada,['class' => 'form-horizontal']) !!}
                        </div>
                    </div>
                    <div class="control-group">
                        {!! Form::label('* Codigo Postal:',null, ['class' => 'control-label']) !!}
                        <div class="controls">
                            {!! Form::text('cod_postal',$company->cod_postal,['class' => 'form-horizontal']) !!}
                        </div>
                    </div>

                    <div class="control-group">
                        {!! Form::label('* Niff:',null, ['class' => 'control-label']) !!}
                        <div class="controls">
                            {!! Form::text('nif',$company->nif,['class' => 'form-horizontal']) !!}
                        </div>
                    </div>
                    <div class="control-group">
                        {!! Form::label('* Activo:',null, ['class' => 'control-label']) !!}
                        <div class="controls">
                            {!! Form::checkbox('activo',$company->activo,null,['class' => 'form-horizontal']) !!}
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

@stop
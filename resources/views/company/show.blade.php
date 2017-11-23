@extends('admin.app')

@section('content')

@if(session('sucess'))
<div style="background-color:green;color:#FFF;padding:15px;width: 25%;float: right;">{{session('sucess')}}</div>
@endif

@include ('admin.errors')


<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
    

            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                    <h5>Ficha da Empresa</h5>
                </div>

                <hr>

                <div class="form-actions">
                        {{ Form::open(['route' => ['company.destroy', $company->id], 'method' => 'delete']) }}
                  <button type="submit" class="btn btn-danger btn-mini" style="float: left;display: inline;margin-top: 2%;">Eliminar</button>
                    {{ Form::close() }}
                    <a href="/company" class="btn btn-info btn-mini" style="margin-left: 2%;">Voltar</a>
                    <a href="{{route('company.edit',$company->id)}}"> <i class="icon-edit icon-3x" style="margin-left: 2%;margin-top: 1%;"></i></a>
                </div>
                </hr>
                <div class="widget-content nopadding">
                    {!! Form::open(['url' => 'company','class' => 'form-horizontal']) !!}

                    <div class="control-group">
                        {!! Form::label('Nome:',null, ['class' => 'control-label']) !!}
                        <div class="controls">
                            {!! Form::text('name', $company->nome ,['readonly'],['class' => 'form-horizontal']) !!}
                        </div>
                    </div>

                    <div class="control-group">
                        {!! Form::label('Moraad:',null, ['class' => 'control-label']) !!}
                        <div class="controls">
                            {!! Form::text('email',$company->morada,['readonly'],['class' => 'form-horizontal']) !!}
                        </div>
                    </div>
                    <div class="control-group">
                        {!! Form::label('Codigo Postal:',null, ['class' => 'control-label']) !!}
                        <div class="controls">
                            {!! Form::text('contact',$company->cod_postal,['readonly'],['class' => 'form-horizontal']) !!}
                        </div>
                    </div>
                    <div class="control-group">
                        {!! Form::label('Niff:',null, ['class' => 'control-label']) !!}
                        <div class="controls">
                            {!! Form::text('number',$company->niff,['readonly'],['class' => 'form-horizontal']) !!}
                        </div>
                    </div>
                     <!--div class="control-group">
                        {!! Form::label('Niff:',null, ['class' => 'control-label']) !!}
                        <div class="controls">
                            {!! Form::text('number',$company->niff,['readonly'],['class' => 'form-horizontal']) !!}
                        </div>
                    </div-->


                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>

@stop

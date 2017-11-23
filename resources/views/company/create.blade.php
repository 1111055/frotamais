@extends('admin.app')

@section('content')

    @if(session('sucess'))
        <div style="background-color:green;color:#FFF;padding:15px;width: 25%;float: right;">{{session('sucess')}}</div>
    @endif

    @include ('admin.errors')
<style type="text/css">
    
    .pagination {
    line-height: 16px;
    text-align: right;
    margin-top: 5px;
    margin-right: 10px;
}
.pagination li{

    display: inline;
}
.pagination li{
    font-size: 12px;
    padding: 4px 10px !important;
    border-style: solid;
    border-width: 1px;
    border-color: #dddddd #dddddd #cccccc; /* for IE < 9 */
    border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
    display: inline-block;
    line-height: 16px;
    background: #f5f5f5;
    color: #333333;
    text-shadow: 0 1px 0 #ffffff;
  } 
</style>
<div class="container-fluid">
        <div class="row-fluid">
            <div class="span10">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>Nova Empresa</h5>
                    </div>
                    <div class="widget-content nopadding">
                        {!! Form::open(['url' => 'company','class' => 'form-horizontal']) !!}

                            <div class="control-group">
                                {!! Form::label('* Nome:',null, ['class' => 'control-label']) !!}
                                <div class="controls">
                                    {!! Form::text('nome',null,['class' => 'form-horizontal']) !!}
                                </div>
                            </div>

                            <div class="control-group">
                                {!! Form::label('Morada:',null, ['class' => 'control-label']) !!}
                                <div class="controls">
                                    {!! Form::text('morada',null,['class' => 'form-horizontal']) !!}
                                </div>
                            </div>
                            <div class="control-group">
                                {!! Form::label('Localidade:',null, ['class' => 'control-label']) !!}
                                <div class="controls">
                                    {!! Form::text('localidade',null,['class' => 'form-horizontal']) !!}
                                </div>
                            </div>

                            <div class="control-group">
                                {!! Form::label('Cod Postal:',null, ['class' => 'control-label']) !!}
                                <div class="controls">
                                    {!! Form::text('cod_postal',null,['class' => 'form-horizontal']) !!}
                                </div>
                            </div>
                            <div class="control-group">
                                {!! Form::label('* Nif:',null, ['class' => 'control-label']) !!}
                                <div class="controls">
                                    {!! Form::text('nif',null,['class' => 'form-horizontal']) !!}
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




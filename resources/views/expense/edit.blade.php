@extends('admin.app')

@section('content')

    @if(session('sucess'))
        <div style="background-color:green;color:#FFF;padding:15px;width: 100%;">{{session('sucess')}}</div>
    @endif

    @include ('admin.errors')


    <div class="container-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                    <h5>Editar Tipo de Despeza</h5>
                </div>
                <div class="widget-content nopadding">

                    {!! Form::model($expense, [
                            'method' => 'PUT',
                            'route' => ['expense.update', $expense->id],
                            'class' => 'form-horizontal'
                        ]) !!}

                    <div class="control-group">
                        {!! Form::label('* Descrição:',null, ['class' => 'control-label']) !!}
                        <div class="controls">
                            {!! Form::text('typedesc',$expense->typedesc,['class' => 'form-horizontal']) !!}
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
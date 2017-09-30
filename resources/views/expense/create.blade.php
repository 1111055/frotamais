@extends('admin.app')

@section('content')

    @if(session('sucess'))
        <div style="background-color:green;color:#FFF;padding:15px;width: 100%;">{{session('sucess')}}</div>
    @endif

    @include ('admin.errors')


         <div class="row-fluid" >   
           <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>Novo Tipo Despesa</h5>
                    </div>
                    <div class="widget-content nopadding">
                        {!! Form::open(['url' => 'expense','class' => 'form-horizontal']) !!}

                        <div class="control-group">
                            {!! Form::label('* Tipo Despeza:',null, ['class' => 'control-label']) !!}
                            <div class="controls">
                                {!! Form::text('typedesc',null,['class' => 'form-horizontal']) !!}
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
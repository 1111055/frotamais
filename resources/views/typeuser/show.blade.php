@extends('admin.app')

@section('content')

    @if(session('sucess'))
        <div style="background-color:green;color:#FFF;padding:15px;width: 100%;">{{session('sucess')}}</div>
    @endif

    @include ('admin.errors')


    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                {{ Form::open(['route' => ['tuser.destroy', $tuser->id], 'method' => 'delete']) }}
                <button type="submit" class="btn btn-danger btn-xs" style="float: left; margin-bottom: 10px; margin-left: 55px;">Eliminar</button>
                {{ Form::close() }}

                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>Tipo de Utilizador</h5>
                    </div>
                    <div class="widget-content nopadding">
                        {!! Form::open(['url' => 'tuser','class' => 'form-horizontal']) !!}

                        <div class="control-group">
                            {!! Form::label('Descrição:',null, ['class' => 'control-label']) !!}
                            <div class="controls">
                                {!! Form::text('name', $tuser->typedesc ,['readonly'],['class' => 'form-horizontal']) !!}
                            </div>
                        </div>

                        <div class="form-actions">
                            <a href="{{route('tuser.edit',$tuser->id)}}"> <i class="icon-edit icon-3x"></i></a>
                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>

    </div>

@stop
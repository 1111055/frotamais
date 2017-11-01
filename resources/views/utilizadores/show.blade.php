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
                    <h5>Ficha Utilizador</h5>
                </div>

                <hr>

                <div class="form-actions">
                        {{ Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) }}
                  <button type="submit" class="btn btn-danger btn-mini" style="float: left;display: inline;margin-top: 2%;">Eliminar</button>
                    {{ Form::close() }}
                    <a href="/users" class="btn btn-info btn-mini" style="margin-left: 2%;">Voltar</a>
                    <a href="{{route('users.editar',$user->id)}}"> <i class="icon-edit icon-3x" style="margin-left: 2%;margin-top: 1%;"></i></a>
                </div>
                </hr>
                <div class="widget-content nopadding">
                    {!! Form::open(['url' => 'users','class' => 'form-horizontal']) !!}

                    <div class="control-group">
                        {!! Form::label('Nome:',null, ['class' => 'control-label']) !!}
                        <div class="controls">
                            {!! Form::text('name', $user->name ,['readonly'],['class' => 'form-horizontal']) !!}
                        </div>
                    </div>

                    <div class="control-group">
                        {!! Form::label('Email:',null, ['class' => 'control-label']) !!}
                        <div class="controls">
                            {!! Form::text('email',$user->email,['readonly'],['class' => 'form-horizontal']) !!}
                        </div>
                    </div>
                    <div class="control-group">
                        {!! Form::label('Contacto:',null, ['class' => 'control-label']) !!}
                        <div class="controls">
                            {!! Form::text('contact',$user->contact,['readonly'],['class' => 'form-horizontal']) !!}
                        </div>
                    </div>
                    <div class="control-group">
                        {!! Form::label('Número Mecanográfico:',null, ['class' => 'control-label']) !!}
                        <div class="controls">
                            {!! Form::text('number',$user->number,['readonly'],['class' => 'form-horizontal']) !!}
                        </div>
                    </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                    <h5>Veiculo</h5>
                </div>
                <div class="widget-content nopadding">
                    {!! Form::open(['url' => 'users','class' => 'form-horizontal']) !!}

                    <div class="control-group">
                        {!! Form::label('Numero:',null, ['class' => 'control-label']) !!}
                        <div class="controls">
                            {!! Form::text('vehicle',$user->carro['id'],['readonly'],['class' => 'form-horizontal']) !!}
                        </div>
                    </div>

                    <div class="control-group">
                        {!! Form::label('Kms:',null, ['class' => 'control-label']) !!}
                        <div class="controls">
                            {!! Form::text('email',$user->carro['kms'],['readonly'],['class' => 'form-horizontal']) !!}
                        </div>
                    </div>
                    <div class="control-group">
                        {!! Form::label('Media:',null, ['class' => 'control-label']) !!}
                        <div class="controls">
                            {!! Form::text('contact','5.6',['readonly'],['class' => 'form-horizontal']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
    <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-time"></i></span>
                        <h5>Alertas</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Driscrição</th>
                                <th>Estado</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($user->alerts as $al)

                            <tr>
                                <td class="taskDesc"><i class="icon-info-sign"></i> {{ $al->mensage }}</td>
                                <td class="taskStatus"><span class="in-progress">{{ $al->estado }}</span></td>
                                <td class="taskOptions"><a href="#" class="tip-top" data-original-title="Update"><i class="icon-ok"></i></a> <a href="#" class="tip-top" data-original-title="Delete"><i class="icon-remove"></i></a></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>
</div>

@stop
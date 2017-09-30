@extends('admin.app')

@section('content')

    @if(session('sucess'))
        <div style="background-color:green;color:#FFF;padding:15px;width: 100%;">{{session('sucess')}}</div>
    @endif

    @include ('admin.errors')


    <div class="container-fluid">
        <div class="widget-box" id="showtable">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                <h5>Tipo de Utilizador</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered data-table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tipo Utilizador</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tuser as $item)
                        <tr class="gradeX">
                            <td><a href="{{route('expense.show',$item->id)}}">{{ $item->id }}</a></td>
                            <td>{{ $item->typedesc }}</td>

                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
            <button type="button" id="novo" class="btn btn-primary btn-xs" style="float: left;margin-right: 10px;margin-top: 20px;">Novo</button>
        </div>
        <div class="row-fluid" id="showform" style="display: none">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>Novo Tipo Utilizador</h5>
                    </div>
                    <div class="widget-content nopadding">
                        {!! Form::open(['url' => 'tuser','class' => 'form-horizontal']) !!}

                        <div class="control-group">
                            {!! Form::label('* Tipo Utilizador:',null, ['class' => 'control-label']) !!}
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

    </div>
    </div>

@stop
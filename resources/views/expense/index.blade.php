@extends('admin.app')

@section('content')

    @if(session('sucess'))
        <div style="background-color:green;color:#FFF;padding:15px;width: 100%;">{{session('sucess')}}</div>
    @endif

    @include ('admin.errors')


    <div class="container-fluid">
        <div class="widget-box" id="showtable">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                <h5>Tipo de Despeza</h5>
            </div>
              <hr>
             <a class="btn btn-success btn-mini" href="{{route('alerts.exportactivos')}}">EXCELL</a>
              <a class="btn btn-success btn-mini" href="{{route('alerts.pdf','0')}}">PDF</a>
            <a class="btn btn-info btn-mini" href="{{route('expense.create')}}">Novo</a>
            <hr>
            <div class="widget-content nopadding">
                <table class="table table-bordered data-table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tipo Despeza</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($expense as $item)
                        <tr class="gradeX">
                            <td><a href="{{route('expense.show',$item->id)}}">{{ $item->id }}</a></td>
                            <td>{{ $item->typedesc }}</td>

                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@stop
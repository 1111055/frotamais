@extends('admin.app')

@section('content')

    @if(session('sucess'))
        <div style="background-color:green;color:#FFF;padding:15px;width: 100%;">{{session('sucess')}}</div>
    @endif

    @include ('admin.errors')
    <div class="container-fluid" >
        <div class="widget-box" id="showtable">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                <h5>Alertas Em Aberto</h5>
            </div>
            <hr>
             <a class="btn btn-success btn-mini" href="{{route('alerts.exportactivos')}}">EXCELL</a>
              <a class="btn btn-success btn-mini" href="{{route('alerts.pdf','0')}}">PDF</a>
            <a class="btn btn-info btn-mini" href="{{route('alerts.create')}}">Novo</a>
            <hr>
            <div class="widget-content nopadding">
                <table class="table table-bordered data-table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Colaborador</th>
                        <th>Mensagem</th>
                        <th>Data Inserido</th>
                        <th>Data Concluido</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($alert as $item)
                    <tr class="gradeX">
                        <td><a href="{{route('alerts.show',$item->id)}}">{{ $item->id }}</a></td>
                        <td>{{ $item->user['name'] }}</td>
                        <td>{{ $item->mensage }}</td>
                        <td>{{ $item->updated_at }}</td>
                        <td>{{ $item->date }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{ $alert->appends(['sort' => 'colaborador'])->links() }}
        </div>
            <div class="container-fluid" >
        <div class="widget-box" id="showtable">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                <h5>Alertas Resolvidos</h5>
            </div>
            <hr>
             <a class="btn btn-success btn-mini" href="{{route('alerts.exportinactivos')}}">EXCELL</a>
              <a class="btn btn-success btn-mini" href="{{route('alerts.pdf','1')}}">PDF</a>
              <hr>
            <div class="widget-content nopadding">
                <table class="table table-bordered data-table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Colaborador</th>
                        <th>Mensagem</th>
                        <th>Data Inserido</th>
                        <th>Data Concluido</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($alertt as $item)
                    <tr class="gradeX">
                        <td><a href="{{route('alerts.show',$item->id)}}">{{ $item->id }}</a></td>
                        <td>{{ $item->user['name'] }}</td>
                        <td>{{ $item->mensage }}</td>
                        <td>{{ $item->updated_at }}</td>
                        <td>{{ $item->date }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
             {{ $alertt->appends(['sort' => 'colaborador'])->links() }}
        </div>

    </div>



@stop
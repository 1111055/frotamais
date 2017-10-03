@extends('admin.app')

@section('content')


    @if(session('sucess'))
        <div style="background-color:green;color:#FFF;padding:15px;width: 100%;">{{session('sucess')}}</div>
    @endif

    @include ('admin.errors')
<div class="container-fluid">
        <div class="widget-box" >
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                <h5>Veículos</h5>
            </div>
            <hr>
             <a class="btn btn-success btn-mini" href="{{route('vehicles.export')}}">EXCELL</a>
              <a class="btn btn-success btn-mini" href="{{route('vehicles.pdf')}}">PDF</a>
              <a class="btn btn-info btn-mini" href="{{route('vehicles.create')}}">NOVO</a>
              <hr>
            <div class="widget-content nopadding">
                <table class="table table-bordered data-table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Matricula</th>
                        <th>Data Matricula</th>
                        <th>kms</th>
                        <th>Colaborador</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($vehicles as $item)
                    <tr class="gradeX">
                        <td><a href="{{route('vehicles.show',$item->id)}}">{{ $item->id }}</a></td>
                        <td>{{ $item->marca }}</td>
                        <td>{{ $item->modelo }}</td>
                        <td>{{ $item->matricula }}</td>
                        <td>{{ $item->dataregisto }}</td>
                        <td>{{ $item->kms }}</td>
                        <td>{{ $item->user['name'] }}</td>
                    </tr>
                    @endforeach

                    
                    </tbody>

                </table>

            </div>
              {{ $vehicles->appends(['sort' => 'name'])->links() }}
        </div>
</div>

@stop
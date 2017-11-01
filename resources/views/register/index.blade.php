@extends('admin.app')

@section('content')

    @if(session('sucess'))
        <div style="background-color:green;color:#FFF;padding:15px;width: 100%;">{{session('sucess')}}</div>
    @endif

    @include ('admin.errors')
    <div class="container-fluid" >
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                <h5>Despesas</h5>
            </div>
            <hr>
            <a class="btn btn-success btn-mini" href="{{route('registers.export')}}">EXCELL</a>
              <a class="btn btn-success btn-mini" href="{{route('registers.pdf')}}">PDF</a>
              <a class="btn btn-info btn-mini" href="{{route('registers.create')}}">NOVO</a>
              <hr>
              <div>
                  <h5>Filtros</h5>
              </div>
              

              <a href="/registers?type=2">Combustivel</a> |
              <a href="/registers?type=3">Pneus</a> |
              <a href="/registers">Reset</a> 
              <hr>
            <div class="widget-content nopadding">
                <table class="table table-bordered data-table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Carro</th>
                        <th>kms</th>
                        <th>tipo de despesa</th>
                        <th>Preco</th>
                        <th>Litros</th>
                        <th>Data</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($register as $item)
                        <tr class="gradeX">
                            <td><a href="{{route('registers.show',$item->id)}}">{{ $item->id }}</a></td>
                            <td>{{ $item->vehicle['matricula'] }}</td>
                            <td>{{ $item->kms }}</td>
                            <td>{{ $item->typexpense['typedesc'] }}</td>
                            <td>{{ $item->preco }}</td>
                            <td>{{ $item->litros }}</td>
                            <td>{{$item->dataregisto}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{ $register->links() }}
        </div>

    </div>
@stop
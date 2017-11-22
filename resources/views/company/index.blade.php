@extends('admin.app')

@section('content')

    @if(session('sucess'))
        <div style="background-color:green;color:#FFF;padding:15px;width: 100%;">{{session('sucess')}}</div>
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
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                <h5>Empresas</h5>
            </div>
            <hr>
             <a class="btn btn-success btn-mini" href="{{route('company.export')}}">EXCELL</a>
              <a class="btn btn-success btn-mini" href="{{route('company.pdf')}}">PDF</a>
              <a class="btn btn-info btn-mini" href="{{route('company.create')}}">NOVO</a>
              <hr>
            <div class="widget-content nopadding">
                <table class="table table-bordered data-table" >
                    <thead>
                    <tr>
                     
                        <th>Nome</th>
                        <th>Morada</th>
                        <th>Localidade</th>
                        <th>Cod Postal</th>
                        <th>Nif</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($company as $item)
                    <tr class="gradeX">
                        <td><a href="{{route('company.show',$item->id)}}">{{ $item->nome }}</a></td>
                        
                        <td>{{ $item->morada }}</td>
                        <td>{{ $item->localidade }}</td>
                        <td>{{ $item->cod_postal }}</td>
                        <td>{{ $item->nif }}</td>
                    </tr>
                    @endforeach
                    
                    </tbody>
                </table>

            </div>
              {{ $company->appends(['sort' => 'nome'])->links() }}
        </div>
</div>

@stop




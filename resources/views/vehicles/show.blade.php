@extends('admin.app')

@section('content')

    @if(session('sucess'))
        <div style="background-color:green;color:#FFF;padding:15px;width: 100%;">{{session('sucess')}}</div>
    @endif

    @include ('admin.errors')
    <style>

    .numberos{color: #FFF;font-size: 24px; margin-top: 13%;}
    .letras{color: #FFF;font-size: 12px; margin-top: 2%;}
    </style>

    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">

                <div class="widget-box">

                    <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>Ficha do Veiculo</h5>
                    </div>

                    <hr>
                       <div class="form-actions">
                        <div style="float: left; display: inline; margin-top: 1%">
                        {{ Form::open(['route' => ['vehicles.destroy', $vehicle->id], 'method' => 'delete']) }}
                        <button type="submit" class="btn btn-danger btn-mini" >Eliminar</button>
                        {{ Form::close() }}
                        </div>
                        <div style="margin-left: 9%;">    
                            <a href="{{route('vehicles.edit',$vehicle->id)}}"> <i class="icon-edit icon-3x"></i></a>
                        </div>
                        </div>
            
                    <hr>
                    <div class="widget-content nopadding">
                        {!! Form::open(['url' => 'vehicles','class' => 'form-horizontal']) !!}

                        <div class="control-group">
                            {!! Form::label('Marca:',null, ['class' => 'control-label']) !!}
                            <div class="controls">
                                {!! Form::text('marca',$vehicle->marca,['readonly'],['class' => 'form-horizontal']) !!}
                            </div>
                        </div>

                        <div class="control-group">
                            {!! Form::label('Modelo:',null, ['class' => 'control-label']) !!}
                            <div class="controls">
                                {!! Form::text('modelo',$vehicle->modelo,['readonly'],['class' => 'form-horizontal']) !!}
                            </div>
                        </div>
                        <div class="control-group">
                            {!! Form::label('Kms:',null, ['class' => 'control-label']) !!}
                            <div class="controls">
                                {!! Form::text('kms',$vehicle->kms,['readonly'],['class' => 'form-horizontal']) !!}
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
                             <ul class="quick-actions">
                                <li class="bg_ly"> <div class="numberos">{{ number_format($media,1) }}</div> 
                                    <div class="letras">Média Anual</div></li>
                                <li class="bg_lo"> <div class="numberos">{{ number_format($mediam,1) }}</div>
                                     <div class="letras">Média Mensal</div></li>
                                <li class="bg_lb"><div class="numberos"> {{ number_format($totalpk,2) }} </div>     <div class="letras">Preço por Km</div></li>
                                <li class="bg_lg"> <div class="numberos"> {{ number_format($avgmonth,2) }} </div>     <div class="letras">Valor Médio Mensal</div></li>
                            </ul>
                           </div>     
             </div>

        </div>

        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>Utilizador Activo</h5>
                    </div>
                    <div class="widget-content nopadding">
                        {!! Form::open(['url' => 'users','class' => 'form-horizontal']) !!}

                        <div class="control-group">
                            {!! Form::label('Numero Mecanografico:',null, ['class' => 'control-label']) !!}
                            <div class="controls">
                                {!! Form::text('number',$vehicle->user['number'],['readonly'],['class' => 'form-horizontal']) !!}
                            </div>
                        </div>


                        <div class="control-group">
                            {!! Form::label('Nome:',null, ['class' => 'control-label']) !!}
                            <div class="controls">
                                {!! Form::text('name', $vehicle->user['name'],['readonly'],['class' => 'form-horizontal']) !!}
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

                    <div class="widget-title"> <span class="icon"> <i class="icon-signal"></i> </span>
                        <h5>Consumos</h5>
                    </div>
                    <div class="widget-content">
                        <div id="curve_chart" style="width: 100%; height: 100%"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

       var teste = {!! json_encode($val) !!};
       var stats = {!! json_encode($stats) !!};
      
      function drawChart() {
        var data = new google.visualization.DataTable();
        
        data.addColumn('string','Mes');

        for(var k in teste){
          
             data.addColumn('number',teste[k]);
        }
        var count=0;
        for(var r in stats){
           
             data.addRow([stats[count][0],stats[count][1],stats[count][2],stats[count][3],stats[count][4]]);
             count++;
        }    


        var options = {
          title: 'Gasto do carro no corrente ano',
          hAxis: {title: '2017',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('curve_chart'));
        chart.draw(data, options);

        chart.draw(data, options);
      }
    </script>

@stop
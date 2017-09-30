@extends('admin.app')

@section('content')

    <div class="quick-actions_homepage">
        <ul class="quick-actions">
            <li class="bg_ls"> <a href="{{route('users.index')}}"> <i class="icon icon-user"></i>Colaboradores</a> </li>
            <li class="bg_ls"> <a href="{{route('vehicles.index')}}"> <i class="icon-truck"></i>Veículos</a> </li>
            <li class="bg_ls"> <a href="{{route('alerts.index')}}"> <i class="icon-bell"></i>Alertas</a> </li>
            <li class="bg_ls"> <a href="{{route('config.index')}}"> <i class="icon icon-cog"></i>Configurações</a> </li>
        </ul>
    </div>


    <div class="quick-actions_homepage">
              <ul class="site-stats">
                <li class="bg_lh"><i class="icon-tag"></i> <strong>{{ $totaluser  }}</strong> <small>Total Utilizadores</small></li>
                <li class="bg_lh"><i class="icon-tag"></i> <strong>{{ $totalcar  }}</strong> <small>Total de Veículos</small></li>
                <li class="bg_lh"><i class="icon-tag"></i> <strong>{{ $totalalert  }}</strong> <small>Total Alertas Activos</small></li>
                <li class="bg_lh"><i class="icon-tag"></i> <strong>{{ $totalalert  }}</strong> <small>Total Alertas Resolvidos</small></li>
              </ul>
     </div>
    <div class="row-fluid">
        <div class="span7">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-signal"></i> </span>
                    <h5>Controlo de todo o custo por carro.</h5>
                </div>
                <div class="widget-content">
                    <td><div id="Sarah_chart_div" style="border: 1px solid #ccc"></div></td>

                </div>
            </div>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span7">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-signal"></i> </span>
                    <h5>Custo total por despesa.</h5>
                </div>
                <div class="widget-content">
                    <td><div id="Anthony_chart_div" style="border: 1px solid #ccc"></div></td>
                </div>
            </div>
        </div>

    </div>
@stop
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
// Load Charts and the corechart package.
google.charts.load('current', {'packages':['corechart']});

// Draw the pie chart for Sarah's pizza when Charts is loaded.
google.charts.setOnLoadCallback(drawSarahChart);

// Draw the pie chart for the Anthony's pizza when Charts is loaded.
google.charts.setOnLoadCallback(drawAnthonyChart);


function drawSarahChart() {


    var record={!! json_encode($val) !!};


// Create the data table for Sarah's pizza.
var data = new google.visualization.DataTable();
data.addColumn('string', 'Topping');
data.addColumn('number', 'Slices');
    for(var k in record){
        var v = record[k];

        data.addRow([k,v]);

    }

// Set options for Sarah's pie chart.
var options = {title:'All Values Cars',
width:'100%',
height: '100%', pieHole: 0.4,};

// Instantiate and draw the chart for Sarah's pizza.
var chart = new google.visualization.PieChart(document.getElementById('Sarah_chart_div'));
chart.draw(data, options);
}
function drawAnthonyChart() {


    var record={!! json_encode($valtype) !!};


// Create the data table for Sarah's pizza.
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Topping');
    data.addColumn('number', 'Slices');
    for(var k in record){
        var v = record[k];

        data.addRow([k,v]);

    }

// Set options for Sarah's pie chart.
    var options = {title:'All Values Cars',
        width:'100%',
        height: '100%', pieHole: 0.4};

// Instantiate and draw the chart for Sarah's pizza.
    var chart = new google.visualization.PieChart(document.getElementById('Anthony_chart_div'));
    chart.draw(data, options);
}


</script>
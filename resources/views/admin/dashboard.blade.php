@extends('admin.app')

@section('content')


    <div class="row-fluid">
        <div class="span7">
            <div class="widget-box">


                    <ul class="quick-actions">
                        <li class="bg_ly"> <a href="{{route('users.index')}}"> <i class="icon icon-user" style="margin-top: 20%;"></i></a> </li>
                        <li class="bg_ls"> <a href="{{route('vehicles.index')}}"> <i class="icon-truck" style="margin-top: 20%;"></i></a> </li>
                        <li class="bg_lo"> <a href="{{route('alerts.index')}}"> <i class="icon-bell"  style="margin-top: 20%;"></i></a> </li>
                        <li class="bg_lb"> <a href="{{route('registers.index')}}"> <i class="icon-money"  style="margin-top: 20%;"></i></a> </li>
                         @if(Auth::user()->typeuser==1)
                        <li class="bg_lg"> <a href="{{route('config.index')}}"> <i class="icon icon-cog"  style="margin-top: 20%;"></i></a> </li>
                        @endif
                    </ul>
                
            
            </div>

        
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-signal"></i> </span>
                    <h5>Custo total por veículo.</h5>
                </div>
                <div class="widget-content">
                    <td><div id="Sarah_chart_div" style="border: 1px solid #ccc"></div></td>

                </div>
            </div>

            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-signal"></i> </span>
                    <h5>Custo total por despesa.</h5>
                </div>
                <div class="widget-content">
                    <td><div id="Anthony_chart_div" style="border: 1px solid #ccc"></div></td>
                </div>
            </div>

        </div>


        <div class="span4 bt">
            <div class="widget-box">
                
                            <div class="quick-actions_homepage">
                                      <ul class="site-stats">
                                        <li class="bg_lh"><i class="icon icon-user"></i> <strong>{{ $totaluser  }}</strong> <small>Total Utilizadores</small></li>
                                        <li class="bg_lh"><i class="icon-truck"></i> <strong>{{ $totalcar  }}</strong> <small>Total de Veículos</small></li>
                                        <li class="bg_lh"><i class="icon-bell"></i> <strong>{{ $totalalert  }}</strong> <small>Total Alertas Activos</small></li>
                                        <li class="bg_lh"><i class="icon icon-bell"></i> <strong>{{ $totalalert  }}</strong> <small>Total Alertas Resolvidos</small></li>
                                      </ul>
                             </div>

              
            </div>

           <div class="widget-box">
                  <div class="widget-title bg_lo"  data-toggle="collapse" href="#collapseG3" > <span class="icon"> <i class="icon-chevron-down"></i> </span>
                    <h5>Proximas Tarefas</h5>
                  </div>
                  <div class="widget-content nopadding updates collapse in" id="collapseG3">
                    @foreach($al as $item)
                    <div class="new-update clearfix"><i class="icon-ok-sign"></i>

                      <div class="update-done"><a title="" href="{{route('alerts.show',$item->id)}}"><strong>{{ $item->user['name'] }}</strong></a> <span>{{$item->mensage}}</span>                           
                      </div>

                      <div class="update-date"><span class="update-day">{{ date('d', strtotime($item->created_at))}}</span>{{ date('M', strtotime($item->created_at))}}</div>
                    </div>
                    @endforeach
                  </div>
            </div>
        </div>
        

    </div>




  
@stop
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
// Load Charts and the corechart package.
google.charts.load('current', {'packages':['corechart']});

google.charts.setOnLoadCallback(drawSarahChart);

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
var options = {title:'',
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
    var options = {title:'',
        width:'100%',
        height: '100%', pieHole: 0.4};

// Instantiate and draw the chart for Sarah's pizza.
    var chart = new google.visualization.PieChart(document.getElementById('Anthony_chart_div'));
    chart.draw(data, options);
}


</script>

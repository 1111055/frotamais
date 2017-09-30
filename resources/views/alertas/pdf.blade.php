    <div class="container-fluid" >
        <div class="widget-box" id="showtable">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                <h5>Alertas</h5>
            </div>
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
    </div>
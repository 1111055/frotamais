    <div class="container-fluid" >
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                <h5>Despesas</h5>
            </div>
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
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
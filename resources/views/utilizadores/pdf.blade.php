<div class="container-fluid">
        <div class="widget-box" id="showtable">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                <h5>Utilizadores</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered data-table" >
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Contacto</th>
                        <th>Numero Mecanografico</th>
                        <th>Veículo</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $item)
                    <tr class="gradeX">
                        <td><a href="{{route('users.show',$item->id)}}">{{ $item->id }}</a></td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->contact }}</td>
                        <td>{{ $item->number }}</td>
                        <td>{{ $item->carro['matricula'] }}</td>
                    </tr>
                    @endforeach
                    
                    </tbody>
                </table>

            </div>
        </div>
</div>
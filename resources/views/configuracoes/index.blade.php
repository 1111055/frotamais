@extends('admin.app')

@section('content')

    <div class="quick-actions_homepage">
        <ul class="quick-actions">
            <li class="bg_ls"> <a href="{{route('tuser.index')}}"> <i class="icon icon-cog"></i>Tipo de Colaboradores</a> </li>
            <li class="bg_ls"> <a href="{{route('expense.index')}}"> <i class="icon icon-cog"></i>Tipo de Despesas</a> </li>
        </ul>
    </div>
@stop

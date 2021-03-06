@extends('master')
@section('title', 'Painel Administrativo')

@section('content')
<div class="container">
    <div class="bs-component">
        {!! Breadcrumbs::render('admin') !!}
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li><a href=" {{ url('admin/users')        }} ">Usuários</a></li>
                <li><a href=" {{ url('admin/turmas')       }} ">Turmas</a></li>
                <li><a href=" {{ url('admin/materias')     }} ">Materias</a></li>
                <li><a href=" {{ url('admin/item-reserva') }} ">Itens Reserva</a></li>
                <li><a href=" {{ url('admin/conteudo-aula')}} ">Conteúdos Aula</a></li>
                <li><a href=" {{ url('admin/avaliacao')    }} ">Avaliações</a></li>
                <li><a href=" {{ url('admin/reservas')     }} ">Reservas</a></li>
                <li><a href=" {{ url('admin/horarios')     }} ">Horários</a></li>
            </ul>
        </div>
        <div class=" col-md-offset-2">
            <div class=" panel-default">
                <div class="panel-heading">Painel Administrativo</div>
                <div class="panel-body">
                    <h3>Bem vindo Professor {{\Auth::user()->name}} !</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
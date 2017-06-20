@extends('master')
@section('title', 'Painel do Professor')

@section('content')

<div class="container">
    {!! Breadcrumbs::render('professor') !!}
    <div class="bs-component">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li><a href=" {{ url('professor/conteudo-aula') }} ">Conteúdos Aula</a></li>
                <li><a href=" {{ url('professor/avaliacao')     }} ">Avaliações</a></li>
                <li><a href=" {{ url('professor/reservas')      }} ">Reservas</a></li>
                <li><a href=" {{ url('professor/presencas')      }} ">Presencas</a></li>
                <li class="dropdown">
                    <a href="">Notas</a>
                    <div class="dropdown-content">
                        <a href=" {{ url('professor/notas')         }} ">Inserir Notas</a>
                        <a href=" {{ url('professor/ver-notas')         }} ">Ver Notas</a>
                    </div>
                </li>
            </ul>
        </div>
        <div class="col-md-offset-2 main">
            <div class="panel panel-default">
                <div class="panel-heading">Painel do Professor</div>
                <div class="panel-body">
                    <h3>Bem vindo Professor {{\Auth::user()->name}} !</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

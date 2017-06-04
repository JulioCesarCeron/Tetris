@extends('master')
@section('title', 'Usuários')

@section('content')
    <div class="container">
        {!! Breadcrumbs::render('users') !!}
        <div class="well well bs-component">
            <div class="content">
                <h3 class="header">Administração de Conteúdos das Aulas</h3>
            </div>
            <a href="{{ route('professor.conteudo-aula.create') }}" class="btn btn-raised btn-success">Conteudo
                <span class='glyphicon glyphicon-plus'></span>
            </a>
        </div>
        
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        @if (session('remove'))
            <div class="alert alert-danger">
                {{ session('remove') }}
            </div>
        @endif

        <div class="well well bs-component">
            <div class="content">
                <table class="table">
                    <thead>
                    <tr>
                        <th style="width: 10px;">#</th>
                        <th>Turma</th>
                        <th>Última alteração</th>
                        <th class="table-acoes-right">Ações</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
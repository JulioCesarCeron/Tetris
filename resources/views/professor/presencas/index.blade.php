@extends('master')
@section('title', 'Usuários')

@section('content')
    <div class="container">
        {{-- {!! Breadcrumbs::render('avaliacao') !!} --}}
        <div class="well well bs-component">
            <div class="content">
                <h3 class="header">Administração de Presenças</h3>
            </div>
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
                <table class="table table-striped table-stacked">
                    <thead>
                    <tr>
                        <th style="width: 10px;">#</th>
                        <th class="text-center">Turma</th>
                        <th class="text-center">Série</th>
                        <th class="table-text-right">Selecionar</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($turmas as $turma)
                            <tr>
                                <td>{{ $turma->id }}</td>
                                <td class="text-center">{{ $turma->turma }}</td>
                                <td class="text-center">{{ $turma->serie }}ª</td>
                                <td class="table-text-right">
                                    <a href="{{ route('professor.presencas.show', ['id' => $turma->id]) }}" class="btn btn-raised btn-info" title="Selecionar Turma" >
                                        <span class="glyphicon glyphicon-log-in"></span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@extends('master')
@section('title', 'Usuários')

@section('content')
    <div class="container">
        {!! Breadcrumbs::render('avaliacoes') !!}
        <div class="well well bs-component">
            <div class="content">
                <h3 class="header">Lista de avaliações</h3>
            </div>

        </div>

        <div class="well well bs-component">
            <div class="content">
                <table class="table">
                    <thead>
                    <tr>
                        <th class="text-center" style="width: 10px;">Turma</th>
                        <th class="text-center">Materia</th>
                        <th class="text-center">Tipo Avaliação</th>
                        <th class="table-text-right">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($avaliacoes as $avaliacao)
                            <tr>
                                <td class="text-center"> {{$avaliacao->turma->turma}} </td>
                                <td class="text-center"> {{$avaliacao->materia->materia}} </td>
                                <td class="text-center"> {{$avaliacao->tipo_avaliacao}} </td>
                                <td class="table-text-right"> 
                                    <a href=" {{route('professor.notas.show', ['id' => $avaliacao->id ])}} " class="btn btn-secondary">
                                        <span class="glyphicon glyphicon-copy"></span>
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
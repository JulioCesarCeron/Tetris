@extends('master')
@section('title', 'Usuários')

@section('content')
    <div class="container">
        {!! Breadcrumbs::render('presencas-turmas', $turma) !!}
        <div class="well well bs-component">
            <div class="content">
                <h3 class="header">Administração de Presenças</h3>
            </div>
        </div>
        

        <div class="well well bs-component">
            <div class="content">
                <table class="table table-striped table-stacked">
                    <thead>
                    <tr>
                        <th style="width: 10px;">#</th>
                        <th >Materia</th>
                        <th class="table-text-right">Selecionar</th>
                    </tr>
                    </thead>
                    <tbody>
                         @foreach($materias as $materia)
                            <tr>
                                <td> {{$materia->id}} </td>
                                <td> {{$materia->materia}} </td>
                                <td class="table-text-right">
                                    <a href="{{ route('professor.presencas.alunos', ['turma_id' => $turma_id, 'materia_id' => $materia->id]) }}" class="btn btn-raised btn-info" title="Remover Avaliação" >
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
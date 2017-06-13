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
                        <th class="text-center">Data</th>
                        @if($route == "ver")
                            <th class="table-text-right">Ver Notas</th>
                        @else
                            <th class="table-text-right">Inserir Notas</th>
                        @endif

                    </tr>
                    </thead>
                    <tbody>
                        @foreach($avaliacoes as $avaliacao)
                            <tr>
                                <td class="text-center"> {{$avaliacao->turma->turma}} </td>
                                <td class="text-center"> {{$avaliacao->materia->materia}} </td>
                                <td class="text-center"> {{$avaliacao->tipo_avaliacao}} </td>
                                <td class="text-center">
                                    @php
                                        $date = new DateTime($avaliacao->data_avaliacao);
                                        echo $date->format('d/m/Y');
                                    @endphp
                                </td>
                                <td class="table-text-right"> 
                                    @if($route == "ver")
                                        <a href=" {{route('professor.notas.ver', ['id' => $avaliacao->id ])}} " class="btn btn-secondary">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                    @else
                                        <a href=" {{route('professor.notas.show', ['id' => $avaliacao->id ])}} " class="btn btn-secondary">
                                            <span class="glyphicon glyphicon-copy"></span>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
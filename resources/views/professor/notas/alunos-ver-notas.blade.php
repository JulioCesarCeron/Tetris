
@extends('master')
@section('title', 'Usuários')

@section('content')
    <div class="container">
        {!! Breadcrumbs::render('ver-notas-turma', $turma) !!}
        <div class="well well bs-component">
            <div class="content">
                <h3 class="header">Notas de {{$materia->materia}} da Turma {{$turma->turma}}</h3>
            </div>
        </div>

        <div class="well well bs-component">
            <div class="content">
                <table class="table table-striped table-stacked">
                    <thead>
                    <tr>
                        <th style="width: 10px;">#</th>
                        <th>Nome</th>
                        @php
                            $numNotas = 1;
                        @endphp
                        @foreach($avaliacoes as $aval)
                            @if($aval->materia->id == $materia->id)
                                <th>Nota {{$numNotas}} </th>
                                @php
                                    $numNotas++; 
                                @endphp
                            @endif
                        @endforeach
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($alunos as $aluno)
                            <tr>
                                <td> {{$aluno->id}} </td>
                                <td> {{$aluno->name}} </td>
                                @foreach($aluno->notas as $nota)
                                    @if($nota->avaliacao->materia->id == $materia->id)
                                        <td>{{$nota->nota}}</td>
                                    @endif
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
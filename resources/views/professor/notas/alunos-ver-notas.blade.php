
@extends('master')
@section('title', 'Usuários')

@section('content')
    <div class="container">
        {{-- {!! Breadcrumbs::render('avaliacao-turma', $avaliacao) !!} --}}
        <div class="well well bs-component">
            <div class="content">
                <h3 class="header">Ver Notas</h3>
            </div>
        </div>

        <div class="well well bs-component">
            <div class="content">
                <table class="table">
                    <thead>
                    <tr>
                        <th style="width: 10px;">#</th>
                        <th>Nome</th>
                        {{-- <th class="table-text-right">Notas</th> --}}
                        @php
                            $numNotas = 1;
                        @endphp
                        @foreach($alunos->first()->notas as $aluno)
                            <th>Nota {{$numNotas}} </th>
                            @php
                                $numNotas++; 
                            @endphp
                        @endforeach

                    </tr>
                    </thead>
                    <tbody>
                        @foreach($alunos as $aluno)
                            <tr>
                                <td> {{$aluno->id}} </td>
                                <td> {{$aluno->name}} </td>
                                    @foreach($aluno->notas as $nota)
                                        <td>{{$nota->nota}}</td>
                                    @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
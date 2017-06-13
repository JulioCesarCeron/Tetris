
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
                        <th class="text-center" style="width: 10px;">#</th>
                        <th>Nome</th>
                        <th class="table-text-right">Notas</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($notas as $nota)
                            <tr>
                                <td class="text-center"> {{$nota->aluno_user_id}} </td>
                                <td> {{$nota->aluno->name}} </td>
                                <td class="table-text-right"> {{$nota->nota}} </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
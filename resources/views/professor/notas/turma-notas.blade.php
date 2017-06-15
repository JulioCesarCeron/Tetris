
@extends('master')
@section('title', 'Usuários')

@section('content')
    <div class="container">
        {{-- {!! Breadcrumbs::render('avaliacao-turma', $avaliacao) !!} --}}
        <div class="well well bs-component">
            <div class="content">
                <h3 class="header">Administração de Notas</h3>
            </div>
        </div>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="well well bs-component">
            <div class="content">
                <table class="table">
                    <thead>
                    <tr>
                        <th class="text-center" style="width: 10px;">#</th>
                        <th>Turma</th>
                        <th class="table-text-right">Selecionar</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($turmas as $turma)
                            <tr>
                                <td class="text-center"> {{$turma->turma->id}} </td>
                                <td> {{$turma->turma->turma}} </td>
                                <td class="table-text-right">  
                                    <a href="{{route('professor.notas.ver', ['id' => $turma->turma->id])}} "> 
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
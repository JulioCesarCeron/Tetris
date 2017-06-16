
@extends('master')
@section('title', 'Usuários')

@section('content')
    <div class="container">
        {!! Breadcrumbs::render('ver-notas') !!}
        <div class="well well bs-component">
            <div class="content">
                <h3 class="header">Ver notas por turma</h3>
            </div>
        </div>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="well well bs-component">
            <div class="content">
                <table class="table table-striped table-stacked">
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
                                    <a href="{{route('professor.notas.ver.turma', ['id' => $turma->turma->id])}} " class="btn btn-padding btn-raised btn-info"> 
                                        <span class="glyphicon glyphicon-eye-open"></span> 
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
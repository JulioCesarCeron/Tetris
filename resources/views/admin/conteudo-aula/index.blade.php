@extends('master')
@section('title', 'Usuários')

@section('content')
    <div class="container">
        {!! Breadcrumbs::render('admin-conteudo-aula') !!}
        <div class="well well bs-component">
            <div class="content">
                <h3 class="header">Administração de Conteúdos das Aulas</h3>
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
                        <th class="text-center">Materia</th>
                        <th class="text-center">Data</th>
                        <th class="text-center">Professor</th>
                        <th class="table-text-right">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($conteudoAulas as $conteudoAula)
                            <tr>
                                <td>{{ $conteudoAula->id }}</td>
                                <td class="text-center">{{ $conteudoAula->turma->turma }} </td>
                                <td class="text-center"> 
                                    <a href="{!! route('admin.conteudo-aula.show', [ 'id' => $conteudoAula->id]) !!}">
                                        {{ $conteudoAula->materia->materia }} </td>
                                    </a>
                                <td class="text-center">
                                    @php
                                        $date = new DateTime($conteudoAula->data_conteudo);
                                        echo $date->format('d/m/Y');
                                    @endphp
                                </td>
                                <td class="text-center">{{$conteudoAula->professor->name}}</td>
                                <td class="table-text-right">
                                    <a href="{{ route('admin.conteudo-aula.edit', ['id' => $conteudoAula->id]) }}" class="btn btn-raised btn-info" title="Editar Conteúdo">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </a> 
                                    <a href="{{ route('admin.conteudo-aula.destroy', ['id' => $conteudoAula->id]) }}" class="btn btn-raised btn-danger" title="Remover Conteúdo" onclick="{{"event.preventDefault();document.getElementById('conteudoAula-delete-form-{$conteudoAula->id}').submit();"}}">
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </a>
                                    {!! 
                                        form(\FormBuilder::plain([
                                            'id'     => "conteudoAula-delete-form-{$conteudoAula->id}",
                                            'method' => 'DELETE',
                                            'url'    => route('admin.conteudo-aula.destroy',['id' => $conteudoAula->id]),
                                            'style'  => "display: none;"
                                        ]));
                                    !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
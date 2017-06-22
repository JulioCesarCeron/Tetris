@extends('master')
@section('title', 'Usuários')

@section('content')
    <div class="container">
        {!! Breadcrumbs::render('admin-avaliacao') !!}
        <div class="well well bs-component">
            <div class="content">
                <h3 class="header">Administração de Avaliações</h3>
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
                        <th class="text-center">Data</th>
                        <th class="text-center">Tipo</th>
                        <th class="text-center">Materia</th>
                        <th class="table-text-right">Turma</th>
                        <th class="table-text-right">Professor</th>
                        <th class="table-text-right">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($avaliacoes as $avaliacao)
                            <tr>
                                <td>{{ $avaliacao->id }}</td>
                                <td class="text-center"> 
                                    @php
                                        $date = new DateTime($avaliacao->data_avaliacao);
                                        echo $date->format('d/m/Y');
                                    @endphp
                                </td>
                                <td class="text-center">{{ $avaliacao->tipo_avaliacao }} </td>
                                <td class="text-center">{{ $avaliacao->materia->materia }} </td>
                                <td class="table-text-right">{{ $avaliacao->turma->turma }}</td>
                                <td class="table-text-right">{{ $avaliacao->professor->name }}</td>
                                <td class="table-text-right">
                                    <a href="{{ route('admin.avaliacao.edit', ['id' => $avaliacao->id]) }}" class="btn btn-raised btn-info" title="Editar Avaliação">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </a> 
                                    <a href="{{ route('admin.avaliacao.destroy', ['id' => $avaliacao->id]) }}" class="btn btn-raised btn-danger" title="Remover Avaliação" onclick="{{"event.preventDefault();document.getElementById('avaliacao-delete-form-{$avaliacao->id}').submit();"}}">
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </a>
                                    {!! 
                                        form(\FormBuilder::plain([
                                            'id'     => "avaliacao-delete-form-{$avaliacao->id}",
                                            'method' => 'DELETE',
                                            'url'    => route('admin.avaliacao.destroy',['id' => $avaliacao->id]),
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
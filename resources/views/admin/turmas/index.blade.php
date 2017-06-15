@extends('master')
@section('title', 'Turmas')

@section('content')
    <div class="container">
        {!! Breadcrumbs::render('turmas') !!}
        <div class="well well bs-component">
            <div class="content">
                <h3 class="header">Administração de Turmas</h3>
            </div>
            <a href="{{ route('admin.turmas.create') }}" class="btn btn-raised btn-success">Turma
                <span class='glyphicon glyphicon-plus'></span>
            </a>
            
            <a href="{{ route('admin.turma-alunos.create') }}" class="btn btn-raised btn-info">Aluno
                <span class='glyphicon glyphicon-plus'></span>
            </a>
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
                <table class="table ">
                    <thead>
                    <tr>
                        <th style="width: 10px;">#</th>
                        <th>Turma</th>
                        <th>Série</th>
                        <th class="table-text-right">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($turmas as $turma)
                        <tr>
                            <td>{{ $turma->id    }}</td>
                            <td>
                                <a href="{!! route('admin.turma-alunos.show', [ 'id' => $turma->id]) !!}">
                                    {{ $turma->turma }}
                                </a>
                            </td>
                            <td>{{ $turma->serie }}ª</td>
                            <td class="table-text-right">
                                <a href="{{ route('admin.turmas.edit',['id' => $turma->id]) }}" class="btn btn-raised btn-info" >
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>
                                <a href="{{ route('admin.turmas.destroy', ['id' => $turma->id]) }}" class="btn btn-raised btn-danger" onclick="{{"event.preventDefault();document.getElementById('turma-delete-form-{$turma->id}').submit();"}}">
                                    <span class="glyphicon glyphicon-remove"></span>
                                </a>
                                {!! 
                                    form(\FormBuilder::plain([
                                        'id'     => "turma-delete-form-{$turma->id}",
                                        'method' => 'DELETE',
                                        'url'    => route('admin.turmas.destroy',['id' => $turma->id]),
                                        'style'  => "display: none;"
                                    ]));
                                !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $turmas->links() }}
            </div>
        </div>
    </div>
@endsection
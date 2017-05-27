@extends('master')
@section('title', 'Turma Alunos')

@section('content')
	<div class="container">
        {!! Breadcrumbs::render('turmas-alunos', $turma) !!}
		<div class="well well bs-component">
		    <div class="content">
		        <h3 class="header"> Turma: {!! $turma->turma !!} - {!! $turma->serie !!}ª Série</h2>
		    </div>           

            <a href="{{ route('admin.turma.turma-alunos.adiciona', ['id' => $turma->id]) }}" class="btn btn-raised btn-info">Aluno
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
                            <th>Nome</th>
                            <th>email</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    	@php
                    		$countId = 0 
                    	@endphp
                        
                        @foreach($alunos as $aluno)
                            <tr>
                                <td>{{ $aluno->id    }}</td>
                                <td>{{ $aluno->name }}</td>
                                <td>{{ $aluno->email }}</td>
                                <td>
                                    <a href="{{ route('admin.turma-alunos.destroy', ['id' => $aluno->id]) }}" onclick="{{"event.preventDefault();document.getElementById('turmaAluno-delete-form-{$turmaAlunos->get($countId)->id}').submit();"}}">
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </a>
                                    {!! 
                                        form(\FormBuilder::plain([
                                            'id'     => "turmaAluno-delete-form-{$turmaAlunos->get($countId)->id}",
                                            'method' => 'DELETE',
                                            'url'    => route('admin.turma-alunos.destroy',['id' => $turmaAlunos->get($countId++)->id], ['id' => $turma->id]),
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
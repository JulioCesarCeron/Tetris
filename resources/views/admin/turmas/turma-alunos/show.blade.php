@extends('master')
@section('title', 'Turma Alunos')

@section('content')
	<div class="container col-md-8 col-md-offset-2">
		<div class="well well bs-component">
		    <div class="content">
		        <h2 class="header"> Turma: {!! $turma->turma !!}</h2>
		         <h2 class="header"> Serie: {!! $turma->serie !!}</h2>
		    </div>
			<a href="" class="btn btn-info">Edit</a>
			<form method="post" action="" class="pull-left">
			    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
			        <div>
			            <button type="submit" class="btn btn-warning">Delete</button>
			        </div>
			</form>

			
			@if (session('status'))
			    <div class="alert alert-success">
			        {{ session('status') }}
			    </div>
			@endif


		</div>
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
                                    <a href="{{ route('admin.turmas.destroy', ['id' => $aluno->id]) }}" onclick="{{"event.preventDefault();document.getElementById('turmaAluno-delete-form-{$turmaAlunos->get($countId)->id}').submit();"}}">
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </a>
                                    {!! 
                                        form(\FormBuilder::plain([
                                            'id'     => "turmaAluno-delete-form-{$turmaAlunos->get($countId)->id}",
                                            'method' => 'DELETE',
                                            'url'    => route('admin.turma-alunos.destroy',['id' => $turmaAlunos->get($countId++)->id], ['id' => $turma->id])
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
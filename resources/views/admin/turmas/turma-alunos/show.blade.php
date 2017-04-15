@extends('master')
@section('title', 'Turma Alunos')

@section('content')
	<div class="container col-md-8 col-md-offset-2">
		<div class="well well bs-component">
		    <div class="content">
		        <h2 class="header"> Turma: {!! $turma->turma !!}</h2>
		         <h2 class="header"> Serie: {!! $turma->serie !!}</h2>
		    </div>           
            
            @php
                $turma_id = $turma->id;
            @endphp
			<a href="{{ route('admin.turma-alunos.create') }}" class="btn btn-info">Aluno
                <span class='glyphicon glyphicon-plus'></span>
            </a>
			
			


		</div>
        
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
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
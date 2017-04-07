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
		</div>

		@foreach($alunos as $aluno)
		   <div class="well well bs-component">
		       <div class="content">
		           {!! $aluno->name !!} || {!! $aluno->email !!}
		       </div>
		   </div>
		@endforeach
	</div>
@endsection
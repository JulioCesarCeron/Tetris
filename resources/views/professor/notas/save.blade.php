@extends('master')
@section('title', 'Adicionar Nota')

@section('content')
    <div class="container">
        @if($breadcrumb == 'create')
            {!! Breadcrumbs::render('adicionar-nota', $avaliacao, $aluno) !!}
        @elseif($breadcrumb == 'edit')
            {{-- {!! Breadcrumbs::render('conteudo-aula-edit', $conteudoAula) !!} --}}
        @endif
        <div class="bs-component">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">{{$title}}</h3>
                </div>
                <div class="panel-body">
                    
                    {{-- @if($conteudoAula)
                        <form method="POST" action="{{ route('professor.conteudo-aula.update',['id' => $conteudoAula->id])}}" accept-charset="UTF-8">
                        <input name="_method" type="hidden" value="PUT">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    @else --}}
                        <form method="POST" action="{{url('professor/notas')}}" accept-charset="UTF-8">
                    {{-- @endif --}}
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <input type="hidden" name="avaliacao_id" id="avaliacao_id" value="{{$avaliacao->id}}">
                        <input type="hidden" name="aluno_user_id" id="aluno_user_id" value="{{$aluno->id}} ">
                        <fieldset>
                            <div class="form-group" >
                                <label for="aluno" class="control-label required">Aluno(a)</label>
                                 <input disabled type="text" class="form-control" style="border: none;" name="aluno" id="aluno" value="{{$aluno->name}} ">
                            </div>
                            <div class="form-group" >
                                <label for="avaliacao_tipo" class="control-label required">Tipo de avaliação</label>
                                 <input disabled type="text" class="form-control" style="border: none;" name="avaliacao_tipo" id="avaliacao_tipo" value="{{$avaliacao->tipo_avaliacao}} ">
                            </div>
                            <div class="form-group" >
                                <label for="turma" class="control-label required">Turma</label>
                                 <input disabled type="text" class="form-control" style="border: none;" name="turma" id="turma" value="{{$avaliacao->turma->turma}} ">
                            </div>
                            <div class="form-group" >
                                <label for="materia" class="control-label required">Matéria</label>
                                 <input disabled type="text" class="form-control" style="border: none;" name="materia" id="materia" value="{{$avaliacao->materia->materia}} ">
                            </div>
                            <div class="form-group">
                                <label for="nota" class="control-label required">Insira a nota do aluno</label>
                                <input type="number" step="any" class="form-control" name="nota" id="nota" value="" autofocus>
                            </div>
                            <button class="form-control" type="submit">
                                <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
                            </button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
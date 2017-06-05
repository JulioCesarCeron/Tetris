@extends('master')
@section('title', 'Adicionar Aluno')

@section('content')
    <div class="container">
        @if($breadcrumb == 'create')
            {!! Breadcrumbs::render('conteudo-aula-create') !!}
        @elseif($breadcrumb == 'edit')
            {!! Breadcrumbs::render('conteudo-aula-edit', $conteudoAula) !!}
        @endif
        <div class="bs-component">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">{{$title}}</h3>
                </div>
                <div class="panel-body">
                    
                    @if($conteudoAula)
                        <form method="POST" action="{{ route('professor.conteudo-aula.update',['id' => $conteudoAula->id])}}" accept-charset="UTF-8">
                        <input name="_method" type="hidden" value="PUT">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    @else
                        <form method="POST" action="{{url('professor/conteudo-aula')}}" accept-charset="UTF-8">
                    @endif
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <input type="hidden" name="professor_id" id="professor_id" value="{{ Auth::User()->id }}">
                        <fieldset>
                            <div class="form-group" >
                                <label for="turma_id" class="control-label required">Turma</label>
                                <select class="form-control" id="turma_id" name="turma_id">
                                    @if($conteudoAula)
                                        <option selected value="{{$conteudoAula->turma_id}}">{{$conteudoAula->turma->turma}}</option>
                                    @endif
                                    @foreach($turmas as $turma)
                                        <option value="{{$turma->id}}">{{$turma->turma}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group" >
                                <label for="materia_id" class="control-label required">Materia</label>
                                <select class="form-control" id="materia_id" name="materia_id">
                                    @if($conteudoAula)
                                        <option selected value="{{$conteudoAula->materia_id}}">{{$conteudoAula->materia->materia}}</option>
                                    @endif
                                    @if($materias)
                                        @foreach($materias as $materia)
                                            <option value="{{$materia->id}}">{{$materia->materia}}</option>
                                        @endforeach
                                    @endif
                                    
                                </select>
                            </div> 
                            <div class="form-group" >
                                <label for="data_conteudo" class="control-label required is-empty">Data</label>
                                @if($conteudoAula)
                                    <input type="date" class="form-control" name="data_conteudo" id="data_conteudo" value="{{$conteudoAula->data_conteudo}}"/>
                                @else
                                    <input type="date" class="form-control" name="data_conteudo" id="data_conteudo" value=""/>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="conteudo_aula" class="control-label required">Conteúdo Aula</label>
                                @if($conteudoAula)
                                    <textarea class="form-control" required="required" name="conteudo_aula" cols="50" rows="10" id="conteudo_aula">{{$conteudoAula->conteudo_aula}}</textarea>
                                @else
                                    <textarea class="form-control" required="required" name="conteudo_aula" cols="50" rows="10" id="conteudo_aula"></textarea>
                                @endif
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
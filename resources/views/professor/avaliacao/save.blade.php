@extends('master')
@section('title', 'Adicionar Aluno')

@section('content')
    <div class="container">
       {{--  @if($breadcrumb == 'create')
            {!! Breadcrumbs::render('conteudo-aula-create') !!}
        @elseif($breadcrumb == 'edit')
            {!! Breadcrumbs::render('conteudo-aula-edit', $avaliacoes) !!}
        @endif --}}
        <div class="bs-component">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">{{$title}}</h3>
                </div>
                <div class="panel-body">
                    
                    {{-- @if($avaliacoes)
                        <form method="POST" action="{{ route('professor.avalicao.update',['id' => $avaliacoes->id])}}" accept-charset="UTF-8">
                        <input name="_method" type="hidden" value="PUT">
                    @else --}}
                        <form method="POST" action="{{url('professor/avaliacao')}}" accept-charset="UTF-8">
                    {{-- @endif --}}
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <input type="hidden" name="professor_id" id="professor_id" value="{{ Auth::User()->id }}">
                        <fieldset>
                            
                            <div class="form-group" >
                                <label for="tipo_avaliacao" class="control-label required">Tipo de avaliação</label>
                                <select class="form-control" id="tipo_avaliacao" name="tipo_avaliacao">
                                    @if($avaliacoes)
                                        <input type="date" class="form-control" name="data_avaliacao" id="data_avaliacao" value="{{$avaliacoes->tipo_avaliacao}}"/>
                                    @endif
                                    <option selected value="Prova">Prova</option>
                                    <option  value="Recuperação"  >Recuperação</option>
                                    <option  value="Trabalho"     >Trabalho</option>
                                    <option  value="Apresentação" >Apresentação</option>
                                </select>
                            </div>

                            <div class="form-group" >
                                <label for="data_avaliacao" class="control-label required is-empty">Data</label>
                                @if($avaliacoes)
                                    <input type="date" class="form-control" name="data_avaliacao" id="data_avaliacao" value="{{$avaliacoes->data_avaliacao}}"/>
                                @else
                                    <input type="date" class="form-control" name="data_avaliacao" id="data_avaliacao" value=""/>
                                @endif
                            </div>

                            <div class="form-group" >
                                <label for="materia_id" class="control-label required">Materia</label>
                                <select class="form-control" id="materia_id" name="materia_id">
                                    @if($avaliacoes)
                                        <option selected value="{{$avaliacoes->materia_id}}">{{$avaliacoes->materia->materia}}</option>
                                    @else
                                        <option selected value="">Matéria</option>
                                    @endif
                                    @if($materias)
                                        @foreach($materias as $materia)
                                            <option value="{{$materia->id}}">{{$materia->materia}}</option>
                                        @endforeach
                                    @endif

                                    
                                </select>
                            </div>

                            <div class="form-group" >
                                <label for="turma_id" class="control-label required">Turma</label>
                                <select class="form-control" id="turma_id" name="turma_id">
                                    @if($avaliacoes)
                                        <option selected value="{{$avaliacoes->turma_id}}">{{$avaliacoes->turma->turma}}</option>
                                    @else
                                        <option selected value="">Turma</option>
                                    @endif
                                    @foreach($turmas as $turma)
                                        <option value="{{$turma->id}}">{{$turma->turma}}</option>
                                    @endforeach
                                </select>
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
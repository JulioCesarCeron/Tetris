@extends('master')
@section('title', 'Adicionar Aluno')

@section('content')
    <div class="container">
        {!! Breadcrumbs::render('admin-conteudo-aula-show', $conteudoAula) !!}
        <div class="bs-component">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Ver Conteúdo</h3>
                </div>
                <div class="panel-body">
                    <div class="col-md-12">
                        <div class="form-group" >
                            <label for="turma_id" class="control-label required">Turma</label>
                            <select class="form-control" id="turma_id" name="turma_id">
                                    <option selected disabled value="{{$conteudoAula->turma_id}}">{{$conteudoAula->turma->turma}}</option>
                            </select>
                        </div>

                        <div class="form-group" >
                            <label for="materia_id" class="control-label required">Materia</label>
                            <select class="form-control" id="materia_id" name="materia_id">
                                <option selected disabled value="{{$conteudoAula->materia_id}}">{{$conteudoAula->materia->materia}}</option>
                            </select>
                        </div> 

                        <div class="form-group" >
                            <label for="data_conteudo" class="control-label required is-empty">Data</label>
                            <input disabled type="date" class="form-control" name="data_conteudo" id="data_conteudo" value="{{$conteudoAula->data_conteudo}}"/>
                        </div>

                        <div class="form-group">
                            <label for="conteudo_aula" class="control-label required">Conteúdo Aula</label>
                            <textarea class="form-control" disabled required="required" name="conteudo_aula" cols="50" rows="10" id="conteudo_aula">{{$conteudoAula->conteudo_aula}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
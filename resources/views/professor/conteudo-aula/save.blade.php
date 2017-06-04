@extends('master')
@section('title', 'Adicionar Aluno')

@section('content')
    <div class="container">
        <div class="bs-component">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Adicionar Conteúdo Aula</h3>
                </div>
                <div class="panel-body">

                    <form method="post">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <fieldset>
                            <div class="form-group" >
                                <label for="turma_id" class="control-label required">Turma</label>
                                <select class="form-control" id="turma_id" name="turma_id">
                                    <option value="">turma</option>
                                    <option value="1">Turma 2F</option>
                                </select>
                            </div>
                            <div class="form-group" >
                                <label for="materia_id" class="control-label required">Materia</label>
                                <select class="form-control" id="materia_id" name="materia_id">
                                    <option value="">materia</option>
                                    <option value="1">Matemática</option>
                                    <option value="2">história</option>
                                </select>
                            </div> 
                            <div class="form-group" >
                                <label for="data_conteudo" class="control-label required is-empty">Data</label>
                                <input type="date" class="form-control" name="data_conteudo" id="data_conteudo" value=""/>
                            </div>

                            <div class="form-group">
                                <label for="conteudo_aula" class="control-label required">Conteúdo Aula</label>
                                <textarea class="form-control" required="required" name="conteudo_aula" cols="50" rows="10" id="conteudo_aula"></textarea>
                            </div>

                            <button class="form-control" type="submit">
                                <a href="javascript:void(0)" class="btn btn-success">
                                    <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
                                </a>
                            </button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
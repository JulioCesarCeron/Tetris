@extends('master')
@section('title', 'Adicionar Aluno')

@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Adicionar Aluno</h3>
            </div>
            <div class="panel-body">
                <form method="post">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <fieldset>
                        <div class="form-group" >
                            <label for="user_id" class="control-label required">Aluno</label>
                            <select class="form-control" id="user_id" name="user_id">
                                @foreach($alunos as $aluno)
                                    <option value="{{$aluno->id}}">{{$aluno->name}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="turma_id" class="control-label required">Turma</label>
                            
                            <select disabled class="form-control" id="turma_id" name="turma_id">
                                <option value="{{$turma->id}}">{{$turma->turma}}</option>
                            </select>
                            <input type="hidden" name="turma_id" value="{{$turma->id}}" />
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
@endsection
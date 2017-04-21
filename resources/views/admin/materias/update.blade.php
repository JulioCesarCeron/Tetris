@extends('master')
@section('title', 'Adicionar Aluno')

@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Adicionar UPDATE</h3>
            </div>
            <div class="panel-body">
                <form method="POST" action="{{ route('admin.materias.update',['id' => $materia->id])}}" accept-charset="UTF-8">
                    <input name="_method" type="hidden" value="PUT">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <fieldset>
                        <div class="form-group" >
                            <label for="materia" class="control-label required">Matéria</label>
                            <input class="form-control" required="required" name="materia" type="text" id="materia" value="{{$materia->materia}}">
                        </div>
                        <div class="form-group">
                            <label for="professor_user_id" class="control-label required">Professor</label>
                            <select class="form-control" id="professor_user_id" name="professor_user_id">
                                <option selected="selected" value="{{$materia->professor->id}}">{{$materia->professor->name}}</option>
                                @foreach($professors as $professor)
                                    <option value="{{$professor->id}}">{{$professor->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button class="form-control" type="submit">
                            <a href="javascript:void(0)" class="btn btn-success">
                                <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
                            </a>
                        </button>
                    </fieldset>
                </form>
				
				{{-- <form method="POST" action="http://127.0.0.1:8000/admin/turmas/1" accept-charset="UTF-8">
				<input name="_method" type="hidden" value="PUT">
				<input name="_token" type="hidden" value="dYOiR3oNLVa4CEus9E20o3xa2sBZNW52C8iFojCM">
					<div class="form-group">
						<label for="serie" class="control-label required">Serie</label>
						<input class="form-control" required="required" name="serie" type="text" value="2" id="serie">
					</div>
					<div class="form-group">
						<label for="turma" class="control-label required">Turma</label>
						<input class="form-control" required="required" name="turma" type="text" value="2B" id="turma">
					</div>
					<button class="form-control" type="submit">
						<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
					</button>
				</form> --}}

            </div>
        </div>
    </div>
@endsection
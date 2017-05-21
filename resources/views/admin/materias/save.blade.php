@extends('master')
@section('title', 'Adicionar Aluno')

@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Adicionar Matéria</h3>
            </div>
            <div class="panel-body">

                @if($materia)
                    <form method="PUT" action="{{url('admin/materias')}}" accept-charset="UTF-8">
                    <input name="_method" type="hidden" value="PUT">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                @else
                    <form method="POST" action="{{url('admin/materias')}}" accept-charset="UTF-8">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                @endif
                    <fieldset>
                        <div class="form-group" >
                            <label for="materia" class="control-label required">Matéria</label>
                            @if($materia)
                                <input class="form-control" required="required" name="materia" type="text" id="materia" value="{{$materia->materia}}">
                            @else
                                <input class="form-control" required="required" name="materia" type="text" id="materia">
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="professor_user_id" class="control-label required">Professor</label>
                            <select class="form-control" id="professor_user_id" name="professor_user_id">
                                @if($materia)
                                    <option selected="selected" value="{{$materia->professor->id}}">{{$materia->professor->name}}</option>
                                @endif
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
            </div>
        </div>
    </div>
@endsection
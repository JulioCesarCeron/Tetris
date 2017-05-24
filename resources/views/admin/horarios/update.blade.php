@extends('master')
@section('title', 'Editar Horário')

@section('content')
    <div class="container">
        <div class="bs-component">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Editar Horário</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="content">
                                <h3 class="header"> Turma: {{$horario->turma->turma}} </h3>
                                <h3 class="header"> Serie: {{$horario->turma->serie}} </h3>
                            </div>
                        </div>
                    </div>
                    <br/>
                </div>
            </div>
        </div>
        <div class="well well bs-component">
        <form method="POST" action="{{ route('admin.horarios.update',['id' => $horario->id])}}" accept-charset="UTF-8">
            <input name="_method" type="hidden" value="PUT">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <fieldset>
                <div class="form-group" >
                    <div class="content">
                        <p id="calendar-title"></p>
                        <div id="calendar"></div>
                        <table class="table table-calendar">
                            <tbody>
                                @for ($i = 0; $i < 4; $i++)
                                    @php
                                        $count = 3 + $i;
                                    @endphp
                                    <tr>
                                        @for($j = 0; $j < 7; $j++)
                                            @if($j == 0 || $j == 6)
                                                <td></td>
                                            @else
                                                <td>
                                                    <div class="form-group" >
                                                        <label for="{{$dia_per[$count]}}" class="control-label required">{{$i+1}}° Período</label>
                                                        <select class="form-control form-control-calendar" id="{{$dia_per[$count]}}" name="{{$dias[$j] . "_" . ($i+1)}}">
                                                             <option selected="selected" value=" {{$materia_id[($count-1)]}}"> {{$materia_name[($count-1)]}}</option>
                                                            @foreach($materias as $materia)
                                                                <option value="{{$materia->id}}">{{$materia->materia}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </td>
                                                @php
                                                    $count+=4;
                                                @endphp
                                            @endif
                                        @endfor
                                    </tr>
                                    @if($i == 1)
                                        <tr>
                                            @for($j = 0; $j < 7; $j++)
                                                @if(!($j == 0 || $j == 6))
                                                    <td>-------</td>
                                                @else
                                                    <td></td>
                                                @endif
                                            @endfor
                                        </tr>
                                    @endif
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="form-group" >
                    <label for="turma_id" class="control-label required">Turma</label>
                    <select class="form-control" id="turma_id" name="turma_id">
                            <option selected="selected" value="">{{$horario->turma->turma}}</option>
                        @foreach($turmas as $turma)
                            <option value="{{$turma->id}}">{{$turma->turma}}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-raised btn-success" type="submit">
                    SALVAR
                    <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
                </button>
            </fieldset>
        </form>
    </div>
@endsection
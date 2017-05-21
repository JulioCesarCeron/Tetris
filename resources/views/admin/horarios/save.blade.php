@extends('master')
@section('title', 'Horários')

@section('content')
    <div class="container">
        <div class="bs-component">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Criar novo Horário</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                        </div>
                    </div>
                    <br/>
                </div>
            </div>
        </div>
        <div class="well well bs-component">
             <form method="POST" action="{{url('admin/horarios')}}" accept-charset="UTF-8">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <fieldset>
                    <div class="form-group" >
                        <div class="content">
                            <p id="calendar-title"></p>
                            <div id="calendar"></div>
                            <table class="table table-calendar">
                                <tbody>
                                    @for ($i = 0; $i < 4; $i++)
                                        <tr>
                                            @for($j = 0; $j < 7; $j++)                                            
                                                @if($j == 0 || $j == 6)
                                                    <td></td>
                                                @else
                                                    <td>
                                                        <div class="form-group" >
                                                            <label for="{{$dias[$j] . "_" . ($i+1)}}" class="control-label required">{{$i+1}}° Período</label>
                                                            <select class="form-control form-control-calendar" id="{{$dias[$j] . "_" . ($i+1)}}" name="{{$dias[$j] . "_" . ($i+1)}}">
                                                                 <option value="">Selecione</option>
                                                                @foreach($materias as $materia)
                                                                    <option value="{{$materia->id}}">{{$materia->materia}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </td>
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
    </div>
@endsection
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
                    <div class="form-group">
                        <div class="content">
                            <div id="calendar"></div>
                            <table class="table table-calendar">
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <div class="form-group">
                                                <label for="seg_per_1" class="control-label required">1° Período</label>
                                                <select class="form-control form-control-calendar" id="seg_per_1" name="seg_per_1">
                                                    <option selected="selected" value="{{$horario->seg_per_1_materia->id}}">{{$horario->seg_per_1_materia->materia}}</option>
                                                    @foreach($materias as $materia)
                                                        <option value="{{$materia->id}}">{{$materia->materia}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label for="ter_per_1" class="control-label required">1° Período</label>
                                                <select class="form-control form-control-calendar" id="ter_per_1" name="ter_per_1">
                                                    <option selected="selected" value="{{$horario->ter_per_1_materia->id}}">{{$horario->ter_per_1_materia->materia}}</option>
                                                    @foreach($materias as $materia)
                                                        <option value="{{$materia->id}}">{{$materia->materia}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label for="quar_per_1" class="control-label required">1° Período</label>
                                                <select class="form-control form-control-calendar" id="quar_per_1" name="quar_per_1">
                                                    <option selected="selected" value="{{$horario->quar_per_1_materia->id}}">{{$horario->quar_per_1_materia->materia}}</option>
                                                    @foreach($materias as $materia)
                                                        <option value="{{$materia->id}}">{{$materia->materia}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label for="quin_per_1" class="control-label required">1° Período</label>
                                                <select class="form-control form-control-calendar" id="quin_per_1" name="quin_per_1">
                                                    <option selected="selected" value="{{$horario->quin_per_1_materia->id}}">{{$horario->quin_per_1_materia->materia}}</option>
                                                    @foreach($materias as $materia)
                                                        <option value="{{$materia->id}}">{{$materia->materia}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label for="sex_per_1" class="control-label required">1° Período</label>
                                                <select class="form-control form-control-calendar" id="sex_per_1" name="sex_per_1">
                                                    <option selected="selected" value="{{$horario->sex_per_1_materia->id}}">{{$horario->sex_per_1_materia->materia}}</option>
                                                    @foreach($materias as $materia)
                                                        <option value="{{$materia->id}}">{{$materia->materia}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <div class="form-group">
                                               <label for="seg_per_2" class="control-label required">2° Período</label>
                                               <select class="form-control form-control-calendar" id="seg_per_2" name="seg_per_2">
                                                    <option selected="selected" value="{{$horario->seg_per_2_materia->id}}">{{$horario->seg_per_2_materia->materia}}</option>
                                                    @foreach($materias as $materia)
                                                        <option value="{{$materia->id}}">{{$materia->materia}}</option>
                                                    @endforeach
                                               </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label for="ter_per_2" class="control-label required">2° Período</label>
                                                <select class="form-control form-control-calendar" id="ter_per_2" name="ter_per_2">
                                                    <option selected="selected" value="{{$horario->ter_per_2_materia->id}}">{{$horario->ter_per_2_materia->materia}}</option>
                                                    @foreach($materias as $materia)
                                                        <option value="{{$materia->id}}">{{$materia->materia}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label for="quar_per_2" class="control-label required">2° Período</label>
                                                <select class="form-control form-control-calendar" id="quar_per_2" name="quar_per_2">
                                                    <option selected="selected" value="{{$horario->quar_per_2_materia->id}}">{{$horario->quar_per_2_materia->materia}}</option>
                                                    @foreach($materias as $materia)
                                                        <option value="{{$materia->id}}">{{$materia->materia}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label for="quin_per_2" class="control-label required">2° Período</label>
                                                <select class="form-control form-control-calendar" id="quin_per_2" name="quin_per_2">
                                                    <option selected="selected" value="{{$horario->quin_per_2_materia->id}}">{{$horario->quin_per_2_materia->materia}}</option>
                                                    @foreach($materias as $materia)
                                                        <option value="{{$materia->id}}">{{$materia->materia}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label for="sex_per_2" class="control-label required">2° Período</label>
                                                <select class="form-control form-control-calendar" id="sex_per_2" name="sex_per_2">
                                                    <option selected="selected" value="{{$horario->sex_per_2_materia->id}}">{{$horario->sex_per_2_materia->materia}}</option>
                                                    @foreach($materias as $materia)
                                                        <option value="{{$materia->id}}">{{$materia->materia}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>-------</td>
                                        <td>-------</td>
                                        <td>-------</td>
                                        <td>-------</td>
                                        <td>-------</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <div class="form-group">
                                                <label for="seg_per_3" class="control-label required">3° Período</label>
                                                <select class="form-control form-control-calendar" id="seg_per_3" name="seg_per_3">
                                                    <option selected="selected" value="{{$horario->seg_per_3_materia->id}}">{{$horario->seg_per_3_materia->materia}}</option>
                                                    @foreach($materias as $materia)
                                                        <option value="{{$materia->id}}">{{$materia->materia}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label for="ter_per_3" class="control-label required">3° Período</label>
                                                <select class="form-control form-control-calendar" id="ter_per_3" name="ter_per_3">
                                                    <option selected="selected" value="{{$horario->ter_per_3_materia->id}}">{{$horario->ter_per_3_materia->materia}}</option>
                                                    @foreach($materias as $materia)
                                                        <option value="{{$materia->id}}">{{$materia->materia}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label for="quar_per_3" class="control-label required">3° Período</label>
                                                <select class="form-control form-control-calendar" id="quar_per_3" name="quar_per_3">
                                                    <option selected="selected" value="{{$horario->quar_per_3_materia->id}}">{{$horario->quar_per_3_materia->materia}}</option>
                                                    @foreach($materias as $materia)
                                                        <option value="{{$materia->id}}">{{$materia->materia}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label for="quin_per_3" class="control-label required">3° Período</label>
                                                <select class="form-control form-control-calendar" id="quin_per_3" name="quin_per_3">
                                                    <option selected="selected" value="{{$horario->quin_per_3_materia->id}}">{{$horario->quin_per_3_materia->materia}}</option>
                                                    @foreach($materias as $materia)
                                                        <option value="{{$materia->id}}">{{$materia->materia}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label for="sex_per_3" class="control-label required">3° Período</label>
                                                <select class="form-control form-control-calendar" id="sex_per_3" name="sex_per_3">
                                                    <option selected="selected" value="{{$horario->sex_per_3_materia->id}}">{{$horario->sex_per_3_materia->materia}}</option>
                                                    @foreach($materias as $materia)
                                                        <option value="{{$materia->id}}">{{$materia->materia}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <div class="form-group">
                                                <label for="seg_per_4" class="control-label required">4° Período</label>
                                                <select class="form-control form-control-calendar" id="seg_per_4" name="seg_per_4">
                                                    <option selected="selected" value="{{$horario->seg_per_4_materia->id}}">{{$horario->seg_per_4_materia->materia}}</option>
                                                    @foreach($materias as $materia)
                                                        <option value="{{$materia->id}}">{{$materia->materia}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label for="ter_per_4" class="control-label required">4° Período</label>
                                                <select class="form-control form-control-calendar" id="ter_per_4" name="ter_per_4">
                                                    <option selected="selected" value="{{$horario->ter_per_4_materia->id}}">{{$horario->ter_per_4_materia->materia}}</option>
                                                    @foreach($materias as $materia)
                                                        <option value="{{$materia->id}}">{{$materia->materia}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label for="quar_per_4" class="control-label required">4° Período</label>
                                                <select class="form-control form-control-calendar" id="quar_per_4" name="quar_per_4">
                                                    <option selected="selected" value="{{$horario->quar_per_4_materia->id}}">{{$horario->quar_per_4_materia->materia}}</option>
                                                    @foreach($materias as $materia)
                                                        <option value="{{$materia->id}}">{{$materia->materia}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label for="quin_per_4" class="control-label required">4° Período</label>
                                                <select class="form-control form-control-calendar" id="quin_per_4" name="quin_per_4">
                                                    <option selected="selected" value="{{$horario->quin_per_4_materia->id}}">{{$horario->quin_per_4_materia->materia}}</option>
                                                    @foreach($materias as $materia)
                                                        <option value="{{$materia->id}}">{{$materia->materia}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label for="sex_per_4" class="control-label required">4° Período</label>
                                                <select class="form-control form-control-calendar" id="sex_per_4" name="sex_per_4">
                                                    <option selected="selected" value="{{$horario->sex_per_4_materia->id}}">{{$horario->sex_per_4_materia->materia}}</option>
                                                    @foreach($materias as $materia)
                                                        <option value="{{$materia->id}}">{{$materia->materia}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="form-group col-md-8 form-group-turma">
                        <label for="turma_id" class="control-label required">Turma</label>
                        <select class="form-control" id="turma_id" name="turma_id">
                            <option selected="selected" value="8">1B</option>
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
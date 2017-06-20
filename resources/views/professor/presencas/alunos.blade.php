@extends('master')
@section('title', 'Usuários')

@section('content')
    <div class="container">
        {!! Breadcrumbs::render('presencas-alunos', $turma, $materia) !!}
        <div class="well well bs-component">
            <div class="content">
                <h3 class="header">Administração de Presenças</h3>
            </div>
        </div>
        
        @php
            $dataAtual = date ("Y-m-d");
        @endphp

        <div class="well well bs-component">
            <div class="content">
                <table class="table table-striped table-stacked">
                    <thead>
                    <tr>
                        <th style="width: 10px;">#</th>
                        <th >Nome</th>
                        <th class="table-text-right">Presença</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            date_default_timezone_set('America/Sao_Paulo');
                            $dataAtual = date ("Y-m-d");
                            echo "<div class='form-group is-empty'><label for='data_reserva' class='control-label required is-empty'>Data</label><input type='date' class='form-control' value=" . $dataAtual . " name='date' style='width: 130px; margin-left: Calc(50% - 40px);'></div>";
                        @endphp

                         @foreach($alunos as $aluno)

                            <tr>
                                <td> {{$aluno->id}} </td>
                                <td> {{$aluno->name}} </td> 
                                <td class="table-text-right">
                                    @php
                                        $verifyPresença = true;
                                    @endphp
                                    @foreach($aluno->presenca as $presenca)
                                        @if(($presenca->data_presenca == $dataAtual) && ($presenca->materia_id == $materia_id))
                                            Presença salva
                                            @php
                                                $verifyPresença = false;
                                            @endphp
                                        @endif
                                    @endforeach
                                    @if($verifyPresença)
                                        <a href="" class="btn btn-raised btn-danger" title="Remover Avaliação" onclick="{{"event.preventDefault();document.getElementById('presenca-ausente-form-{$aluno->id}').submit();"}}">AUSENTE</a>
                                        <form method="POST" action="{{url('professor/presencas')}}" accept-charset="UTF-8" id="presenca-ausente-form-{{$aluno->id}}" style="display: none;">
                                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                            <input type="hidden" name="materia_id"    id="materia_id"    value="{{ $materia_id }}">
                                            <input type="hidden" name="presenca"      id="presenca"      value="0">
                                            <input type="hidden" name="turma_id"      id="turma_id"      value="{{ $turma_id }}">
                                            <input type="hidden" name="aluno_user_id" id="aluno_user_id" value="{{ $aluno->id }}">
                                            <input type="hidden" name="data_presenca" id="data_presenca" value=" {{$dataAtual}} 14:00 ">
                                        </form>

                                        <a href="" class="btn btn-raised btn-info" title="Remover Avaliação" onclick="{{"event.preventDefault();document.getElementById('presenca-presente-form-{$aluno->id}').submit();"}}">presente</a>
                                        <form method="POST" action="{{url('professor/presencas')}}" accept-charset="UTF-8" id="presenca-presente-form-{{$aluno->id}}" style="display: none;">
                                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                            <input type="hidden" name="materia_id"    id="materia_id"    value="{{ $materia_id }}">
                                            <input type="hidden" name="presenca"      id="presenca"      value="1">
                                            <input type="hidden" name="turma_id"      id="turma_id"      value="{{ $turma_id }}">
                                            <input type="hidden" name="aluno_user_id" id="aluno_user_id" value="{{ $aluno->id }}">
                                            <input type="hidden" name="data_presenca" id="data_presenca" value=" {{$dataAtual}} ">
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
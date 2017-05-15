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
            <div class="content">
                <table class="table ">
                    <thead>
                    <tr>
                        <th style="width: 10px;">#</th>
                        <th>Turma</th>
                        <th>Série</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @for ($i = 0; $i < 10; $i++)
                        <tr>
                            <td> $horario->id    </td>
                            <td> $turma->turma </td>
                            <td> $turma->serie </td>
                            <td>
                                <a href="">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a> |
                                <a href="" >
                                    <span class="glyphicon glyphicon-remove"></span>
                                </a>

                            </td>
                        </tr>
                    @endfor
                    </tbody>
                </table>
               
            </div>
        </div>
    </div>
@endsection
@extends('master')
@section('title', 'Horários')

@section('content')
    <div class="container">
        <div class="bs-component">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Gerenciamento das materias semanais</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                           <a href="{{ route('admin.horarios.create') }}" class="btn btn-raised btn-success">Horário
                                <span class='glyphicon glyphicon-plus'></span>
                            </a>

                        </div>
                    </div>
                    <br/>
                </div>
            </div>
        </div>

        <div class="well well bs-component">
            <div class="content">
                <p id="calendar-title"></p>
                <div id="calendar"></div>
                  <table class="table table-calendar">
                    <tbody>
                        @for ($i = 0; $i < 4; $i++)
                            <tr>
                                <td>Domingo</td>
                                <td>Segunda</td>
                                <td>Terça</td>
                                <td>Quarta</td>
                                <td>Quinta</td>
                                <td>Sexta</td>
                                <td>Sábado</td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
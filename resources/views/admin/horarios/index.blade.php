@extends('master')
@section('title', 'Horários')

@section('content')
    <div class="container">
        <div class="bs-component">
            {!! Breadcrumbs::render('horarios') !!}
            <div class="well well bs-component">
                <div class="content">
                    <h3 class="header">Administração de Horários</h3>
                </div>
                <a href="{{ route('admin.horarios.create') }}" class="btn btn-raised btn-success" title="Novo Horário">Horário
                    <span class='glyphicon glyphicon-plus'></span>
                </a>
            </div>
        </div>
        



        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        @if (session('remove'))
            <div class="alert alert-danger">
                {{ session('remove') }}
            </div>
        @endif

        <div class="well well bs-component">
            <div class="content">
                <table class="table horarios-table table-striped table-stacked">
                    <thead>
                    <tr>
                        <th style="width: 10px;">#</th>
                        <th>Horário</th>
                        <th class="table-text-right">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($horarios as $horario)
                        <tr>
                            <td> {{$horario->id}} </td>
                            <td>
                                <a href="{{ route('admin.horarios.show', ['id' => $horario->id]) }}" class="btn btn-raised btn-success" title="Visualizar Horário">Turma {{$horario->turma->turma}}
                                    <span class="glyphicon glyphicon-th"></span>
                                </a>
                            </td>
                            <td class="table-text-right">
                                <a href="{{ route('admin.horarios.edit', ['id' => $horario->id]) }}" class="btn btn-raised btn-info" title="Editar Horário">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>
                                <a href="{{ route('admin.horarios.destroy', ['id' => $horario->id]) }}" class="btn btn-raised btn-danger" title="Remover Horário" onclick="{{"event.preventDefault();document.getElementById('horario-delete-form-{$horario->id}').submit();"}}">
                                    <span class="glyphicon glyphicon-remove"></span>
                                </a>
                                {!! 
                                    form(\FormBuilder::plain([
                                        'id'     => "horario-delete-form-{$horario->id}",
                                        'method' => 'DELETE',
                                        'url'    => route('admin.horarios.destroy',['id' => $horario->id]),
                                        'style'  => "display: none;"
                                    ]));
                                !!}
                            </td>
                        </tr>
                       {{--  <div>
                            <a href="{{ route('admin.horarios.show', ['id' => $horario->id]) }}" class="btn btn-raised btn-success">Turma {{$horario->turma->turma}}
                                <span class="glyphicon glyphicon-th"></span>
                            </a>
                            <a href="{{ route('admin.horarios.edit', ['id' => $horario->id]) }}" class="btn btn-raised btn-info">

                                <span class="glyphicon glyphicon-pencil"></span>
                            </a>
                            <a href="{{ route('admin.horarios.destroy', ['id' => $horario->id]) }}" class="btn btn-raised btn-danger" title="Remover" onclick="{{"event.preventDefault();document.getElementById('horario-delete-form-{$horario->id}').submit();"}}">
                                <span class="glyphicon glyphicon-remove"></span>
                            </a>
                            {!! 
                                form(\FormBuilder::plain([
                                    'id'     => "horario-delete-form-{$horario->id}",
                                    'method' => 'DELETE',
                                    'url'    => route('admin.horarios.destroy',['id' => $horario->id]),
                                    'style'  => "display: none;"
                                ]));
                            !!}
                        </div> --}}
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
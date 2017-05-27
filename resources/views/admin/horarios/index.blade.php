@extends('master')
@section('title', 'Horários')

@section('content')
    <div class="container">
        <div class="bs-component">
            {!! Breadcrumbs::render('horarios') !!}
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Administração de Horários</h3>
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
                @foreach($horarios as $horario)
                    <div>
                        <a href="{{ route('admin.horarios.show', ['id' => $horario->id]) }}" class="btn btn-raised btn-success">Turma {{$horario->turma->turma}}
                            <span class="glyphicon glyphicon-th"></span>
                        </a>
                        <a href="{{ route('admin.horarios.edit', ['id' => $horario->id]) }}" class="btn btn-raised btn-info">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                        <a href="{{ route('admin.horarios.destroy', ['id' => $horario->id]) }}" class="btn btn-raised btn-danger" onclick="{{"event.preventDefault();document.getElementById('horario-delete-form-{$horario->id}').submit();"}}">
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
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
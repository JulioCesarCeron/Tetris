@extends('master')
@section('title', 'Horários')

@section('content')
    <div class="container">
        <div class="bs-component">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Horários</h3>
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
                    <a href="{{ route('admin.horarios.show', ['id' => $horario->id]) }}" class="btn btn-raised btn-success">Turma {{$horario->turma->turma}}
                        <span class="glyphicon glyphicon-th"></span>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
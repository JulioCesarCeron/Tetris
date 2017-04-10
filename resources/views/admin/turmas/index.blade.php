@extends('master')
@section('title', 'Turmas')

@section('content')
    <div class="container">
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Administração de Turmas</h3>
                </div>
                <div class="panel-body">
                    
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ route('admin.turmas.create') }}" class="btn btn-raised btn-success">
                                <span class='glyphicon glyphicon-plus'></span>
                            </a>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-md-12">
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
                                @foreach($turmas as $turma)
                                    <tr>
                                        <td>{{ $turma->id    }}</td>
                                        <td>
                                            <a href="{!! action('TurmasController@show', $turma->id) !!}">
                                                {{ $turma->turma }}
                                            </a>
                                        </td>
                                        <td>{{ $turma->serie }}</td>
                                        <td>
                                            <a href="{{ route('admin.turmas.edit',['id' => $turma->id]) }}">
                                                <span class="glyphicon glyphicon-pencil"></span>
                                            </a> |
                                            <a href="{{ route('admin.turmas.destroy', ['id' => $turma->id]) }}" onclick="{{"event.preventDefault();document.getElementById('turma-delete-form-{$turma->id}').submit();"}}">
                                                <span class="glyphicon glyphicon-remove"></span>
                                            </a>
                                            {!! 
                                                form(\FormBuilder::plain([
                                                    'id'     => "turma-delete-form-{$turma->id}",
                                                    'method' => 'DELETE',
                                                    'url'    => route('admin.turmas.destroy',['id' => $turma->id])
                                                ]));
                                            !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $turmas->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
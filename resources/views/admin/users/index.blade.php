@extends('master')
@section('title', 'Usuários')


@section('content')
    <div class="container">
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Administração de Usuários</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ route('admin.users.create') }}" class="btn btn-raised btn-success">
                                <span class='glyphicon glyphicon-plus'></span>
                            </a>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 10px;">#</th>
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                    <th>Tipo</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->id  }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->type }}</td>
                                        <td>
                                            <a href="{{ route('admin.users.edit',['id' => $user->id]) }}">
                                                <span class="glyphicon glyphicon-pencil"></span>
                                            </a> |
                                            <a href="{{ route('admin.users.destroy', ['id' => $user->id]) }}" onclick="{{"event.preventDefault();document.getElementById('user-delete-form-{$user->id}').submit();"}}">
                                                <span class="glyphicon glyphicon-remove"></span>
                                            </a>
                                            {!! 
                                                form(\FormBuilder::plain([
                                                    'id'     => "user-delete-form-{$user->id}",
                                                    'method' => 'DELETE',
                                                    'url'    => route('admin.users.destroy',['id' => $user->id])
                                                ]));
                                            !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
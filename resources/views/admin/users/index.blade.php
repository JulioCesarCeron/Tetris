@extends('master')
@section('title', 'Usuários')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {!! Breadcrumbs::render('users') !!}
                <div class="well well bs-component">
                    <div class="content">
                        <h3 class="header">Administração de Usuários</h3>
                    </div>
                    <a href="{{ route('admin.users.create') }}" class="btn btn-raised btn-success" title="Novo Usuário">Usuário
                        <span class='glyphicon glyphicon-plus'></span>
                    </a>
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

                <div class="well well bs-component well-none">
                    <table class="table table-striped table-stacked">
                        <thead>
                        <tr>
                            <th style="width: 10px;">#</th>
                            <th>Nome</th>
                            <th class="table-mobile">E-mail</th>
                            <th>Tipo</th>
                            <th class="table-text-right">Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id  }}</td>
                                <td>
                                    <a href="{{ route('admin.users.show',['id' => $user->id]) }}" title="Visualizar Usuário">
                                        {{ $user->name }}    
                                    </a>
                                </td>
                                <td class="table-mobile">{{ $user->email }}</td>
                                <td>{{ $user->type }}</td>
                                <td class="table-text-right">
                                    <a href="{{ route('admin.users.edit',['id' => $user->id]) }}" class="btn btn-raised btn-info" title="Editar Usuário">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </a>
                                    <a href="{{ route('admin.users.destroy', ['id' => $user->id]) }}" class="btn btn-raised btn-danger" title="Remover Usuário" onclick="{{"event.preventDefault();document.getElementById('user-delete-form-{$user->id}').submit();"}}">
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </a>
                                    {!! 
                                        form(\FormBuilder::plain([
                                            'id'     => "user-delete-form-{$user->id}",
                                            'method' => 'DELETE',
                                            'url'    => route('admin.users.destroy',['id' => $user->id]),
                                            'style'  => "display: none;"
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
@endsection
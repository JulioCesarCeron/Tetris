@extends('master')
@section('title', 'Matérias')

@section('content')
    <div class="container">
        {!! Breadcrumbs::render('materias') !!}
        <div class="well well bs-component">
            <div class="content">
                <h3 class="header">Administração de Matérias</h3>
            </div>
            <a href="{{ route('admin.materias.create') }}" class="btn btn-raised btn-success">Matéria
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

        <div class="well well bs-component">
            <div class="content">
                <table class="table">
                    <thead>
                    <tr>
                        <th style="width: 10px;">#</th>
                        <th>Matéria</th>
                        <th>Professor</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($materias as $materia)
                        <tr>
                            <td>{{ $materia->id  }}</td>
                            <td>{{ $materia->materia }}</td>
                            <td>{{ $materia->professor->name }}</td>
                            <td>
                                <a href="{{ route('admin.materias.edit',['id' => $materia->id]) }}">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a> |
                                <a href="{{ route('admin.materias.destroy', ['id' => $materia->id]) }}" onclick="{{"event.preventDefault();document.getElementById('materia-delete-form-{$materia->id}').submit();"}}">
                                    <span class="glyphicon glyphicon-remove"></span>
                                </a>
                                {!! 
                                    form(\FormBuilder::plain([
                                        'class'    => "materia-submit-delete",
                                        'id'       => "materia-delete-form-{$materia->id}",
                                        'method'   => 'DELETE',
                                        'url'      => route('admin.materias.destroy',['id' => $materia->id]),
                                        'style'  => "display: none;"
                                    ]));
                                !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{-- {{ $materias->links() }} --}}
            </div>
        </div>
    </div>

@endsection
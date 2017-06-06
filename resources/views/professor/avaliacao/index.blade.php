@extends('master')
@section('title', 'Usuários')

@section('content')
    <div class="container">
        {!! Breadcrumbs::render('conteudo-aula') !!}
        <div class="well well bs-component">
            <div class="content">
                <h3 class="header">Administração de Avaliações</h3>
            </div>
            <a href="{{ route('professor.avaliacao.create') }}" class="btn btn-raised btn-success">Avaliação
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
                        <th class="text-center">Data</th>
                        <th class="text-center">Materia</th>
                        <th class="table-text-right">Turma</th>
                        <th class="table-text-right">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($avaliacoes as $avaliacoe)
                            <tr>
                                <td>{{ $avaliacoe->id }}</td>
                                <td class="text-center">{{ $avaliacoe->data_avaliacao }} </td>
                                <td class="text-center"> 
                                    {{-- <a href="{!! route('professor.conteudo-aula.show', [ 'id' => $avaliacoe->id]) !!}"> --}}
                                        {{ $avaliacoe->materia_id }} </td>
                                    {{-- </a> --}}
                                <td class="table-text-right">{{$avaliacoe->turma_id}}</td>
                                <td class="table-text-right">
                                    {{-- <a href="{{ route('professor.conteudo-aula.edit', ['id' => $avaliacoe->id]) }}"> --}}
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    {{-- </a>  --}}
                                    {{-- <a href="{{ route('professor.conteudo-aula.destroy', ['id' => $avaliacoe->id]) }}" onclick="{{"event.preventDefault();document.getElementById('avaliacoe-delete-form-{$avaliacoe->id}').submit();"}}"> --}}
                                        <span class="glyphicon glyphicon-remove"></span>
                                    {{-- </a>
                                    {!! 
                                        form(\FormBuilder::plain([
                                            'id'     => "avaliacoe-delete-form-{$avaliacoe->id}",
                                            'method' => 'DELETE',
                                            'url'    => route('professor.conteudo-aula.destroy',['id' => $avaliacoe->id]),
                                            'style'  => "display: none;"
                                        ]));
                                    !!} --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
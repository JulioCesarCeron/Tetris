@extends('master')
@section('title', 'Usuários')

@section('content')
    <div class="container">
        {{-- {!! Breadcrumbs::render('avaliacao') !!} --}}
        <div class="well well bs-component">
            <div class="content">
                <h3 class="header">Administração de Reservas</h3>
            </div>
            <a href="{{ route('professor.reservas.create') }}" class="btn btn-raised btn-success" title="Nova Avaliação">Reserva
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

        @if (session('existe'))
            <div class="alert alert-warning">
                <span class="glyphicon glyphicon-floppy-remove icon-existe" style="font-size: 20px;"></span>
                {{ session('existe') }}
            </div>
        @endif

        <div class="well well bs-component">
            <div class="content">
                <table class="table table-striped table-stacked">
                    <thead>
                    <tr>
                        <th style="width: 10px;">#</th>
                        <th class="text-center">Items</th>
                        <th class="text-center">Turma</th>
                        <th class="text-center">Data Reserva</th>
                        <th class="table-text-right">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($reservas as $reserva)
                            <tr>
                                <td> {{$reserva->id}} </td>
                                <td class="text-center"> {{$reserva->item->nome_item}} </td>
                                <td class="text-center"> {{$reserva->turma->turma}} </td>
                                <td class="text-center"> {{$reserva->data_reserva}} </td>
                                <td class="table-text-right">
                                    <a href="{{ route('professor.reservas.destroy', ['id' => $reserva->id]) }}" class="btn btn-raised btn-danger" title="Remover Avaliação" onclick="{{"event.preventDefault();document.getElementById('reserva-delete-form-{$reserva->id}').submit();"}}">
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </a>
                                    {!! 
                                        form(\FormBuilder::plain([
                                            'id'     => "reserva-delete-form-{$reserva->id}",
                                            'method' => 'DELETE',
                                            'url'    => route('professor.reservas.destroy',['id' => $reserva->id]),
                                            'style'  => "display: none;"
                                        ]));
                                    !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@extends('master')
@section('title', 'Usuários')

@section('content')
    <div class="container">
        {!! Breadcrumbs::render('admin-reservas') !!}
        <div class="well well bs-component">
            <div class="content">
                <h3 class="header">Administração de Reservas</h3>
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

        @if (session('existe'))
            <div class="alert alert-warning">
                <span class="glyphicon glyphicon-floppy-remove icon-existe" style="font-size: 20px;"></span>
                {{ session('existe') }}
            </div>
        @endif

        <div class="well well bs-component">
            <div class="content">
               <div id="calendar-reservas"></div>
            </div>
            <br>
            <h3>Todas as Reservas</h3>
            <hr style="border-color: #b3b2b2;">
            <div class="content">
                <table class="table table-striped table-stacked">
                    <thead>
                    <tr>
                        <th style="width: 10px;">#</th>
                        <th class="text-center">Item</th>
                        <th class="text-center">Turma</th>
                        <th class="text-center">Data Reserva</th>
                        <th class="text-center">Professor</th>
                        <th class="table-text-right">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($reservas as $reserva)
                            <tr>
                                <td> {{$reserva->id}} </td>
                                <td class="text-center"> {{$reserva->item->nome_item}} </td>
                                <td class="text-center"> {{$reserva->turma->turma}} </td>
                                <td class="text-center">
                                    @php
                                        $date = new DateTime($reserva->data_reserva);
                                        echo $date->format('d/m/Y');
                                    @endphp
                                </td>
                                <td class="text-center"> {{$reserva->professor->name}} </td>
                                <td class="table-text-right">
                                    <a href="{{ route('admin.reservas.destroy', ['id' => $reserva->id]) }}" class="btn btn-raised btn-danger" title="Remover Avaliação" onclick="{{"event.preventDefault();document.getElementById('reserva-delete-form-{$reserva->id}').submit();"}}">
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </a>
                                    {!! 
                                        form(\FormBuilder::plain([
                                            'id'     => "reserva-delete-form-{$reserva->id}",
                                            'method' => 'DELETE',
                                            'url'    => route('admin.reservas.destroy',['id' => $reserva->id]),
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
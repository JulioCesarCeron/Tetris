@extends('master')
@section('title', 'Usuários')


@section('content')
    <div class="container">
    
        <div class="bs-component">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Gerenciamento de itens para reserva</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ route('admin.itens-reserva.create') }}" class="btn btn-raised btn-success">Item
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
                <table class="table">
                    <thead>
                    <tr>
                        <th style="width: 10px;">#</th>
                        <th>Item</th>
                        <th>Quantidade</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($itemsReservas as $itemsReserva)
                        <tr>
                            <td>{{ $itemsReserva->id  }}</td>
                            <td>{{ $itemsReserva->item  }}</td>
                            <td>{{ $itemsReserva->quantidade }}</td>
                            <td>
                                <a href="{{ route('admin.itens-reserva.edit',['id' => 2]) }}">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a> |
                                <a href="{{ route('admin.itens-reserva.destroy', ['id' => $itemsReserva->id]) }}" onclick="{{"event.preventDefault();document.getElementById('item-delete-form-{$itemsReserva->id}').submit();"}}">
                                    <span class="glyphicon glyphicon-remove"></span>
                                </a>
                                {!! 
                                    form(\FormBuilder::plain([
                                        'class'  => "item-submit-delete",
                                        'id'     => "item-delete-form-{$itemsReserva->id}",
                                        'method' => 'DELETE',
                                        'url'    => route('admin.itens-reserva.destroy',['id' => $itemsReserva->id])
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

    <script>
        $('.item-submit-delete').on("submit", function(){
            return confirm("Tem certeza que deseja excluir essa Matéria?")
        });
    </script>

@endsection
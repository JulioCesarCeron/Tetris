@extends('master')
@section('title', 'Itens Reserva')

@section('content')
    <div class="container">
        <div class="bs-component">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Administração</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ route('admin.item-reserva.create') }}" class="btn btn-raised btn-success">Item
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
                <table class="table ">
                    <thead>
                    <tr>
                        <th style="width: 10px;">#</th>
                        <th>Item</th>
                        <th>Quantidade</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($itens as $item)
                        <tr>
                            <td>{{ $item->id    }}</td>
                            <td>{{ $item->nome_item }}</td>
                            <th>{{ $item->quantidade }}</th>
                            <td>
                                <a href="{{ route('admin.item-reserva.edit',['id' => $item->id]) }}">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a> |
                                 <a href="{{ route('admin.item-reserva.destroy', ['id' => $item->id]) }}" onclick="{{"event.preventDefault();document.getElementById('item-delete-form-{$item->id}').submit();"}}">
                                    <span class="glyphicon glyphicon-remove"></span>
                                </a>
                                {!! 
                                    form(\FormBuilder::plain([
                                        'id'     => "item-delete-form-{$item->id}",
                                        'method' => 'DELETE',
                                        'url'    => route('admin.item-reserva.destroy',['id' => $item->id])
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
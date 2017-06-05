@extends('master')
@section('title', 'Itens Reserva')

@section('content')
    <div class="container">
        {!! Breadcrumbs::render('itens-reserva') !!}
        <div class="well well bs-component">
            <div class="content">
                <h3 class="header">Administração de Itens para reserva</h3>
            </div>
            <a href="{{ route('admin.item-reserva.create') }}" class="btn btn-raised btn-success">Item
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
                <table class="table ">
                    <thead>
                    <tr>
                        <th style="width: 10px;">#</th>
                        <th>Item</th>
                        <th>Quantidade</th>
                        <th class="table-text-right">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($itens as $item)
                        <tr>
                            <td>{{ $item->id    }}</td>
                            <td>
                                <a href="{{ route('admin.item-reserva.show', ['id' => $item->id]) }}">
                                    {{ $item->nome_item }}
                                </a>
                            </td>
                            <th>{{ $item->quantidade }}</th>
                            <td class="table-text-right">
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
                                        'url'    => route('admin.item-reserva.destroy',['id' => $item->id]),
                                        'style'  => "display: none;"
                                    ]));
                                !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $itens->links() }}
            </div>
        </div>
    </div>
@endsection
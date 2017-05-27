@extends('master')
@section('title', 'Salvar nova Turma')

@section('content')
    <div class="container">
        <div class="row">
            {{--<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Library</a></li>
                <li class="breadcrumb-item active">Data</li>
            </ol>--}}
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">ITEM</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="nome_item" class="control-label required">Nome item</label>
                        <input class="form-control" disabled="disabled" name="nome_item" type="text" value="{{$itemReserva->nome_item}}" id="nome_item">
                    </div>
                    <div class="form-group">
                        <label for="quantidade" class="control-label required">Quantidade</label>
                        <input class="form-control" disabled="disabled" name="quantidade" type="number" value="{{$itemReserva->quantidade}}" id="quantidade">
                    </div>
                    <div class="form-group">
                        <label for="descricao" class="control-label required">Descricao</label>
                        <textarea class="form-control" disabled="disabled" name="descricao" cols="50" rows="10" id="descricao">{{$itemReserva->descricao}}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
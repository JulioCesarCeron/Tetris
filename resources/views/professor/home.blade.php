@extends('master')
@section('title', 'Painel do Professor')

@section('content')
<div class="container">
    <div class="bs-component">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li><a href=" {{ url('professor/conteudo-aula') }} ">Conteúdos Aula</a></li>
            </ul>
        </div>
        <div class="col-md-offset-2 main">
            <div class="panel panel-default">
                <div class="panel-heading">Painel do Professor</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

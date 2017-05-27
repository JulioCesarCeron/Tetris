@extends('master')
@section('title', 'Salvar nova Turma')

@section('content')
    <div class="container">
        <div class="bs-component">
            {!! Breadcrumbs::render('turmas-adicionar-aluno') !!}
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">{{$title}}</h3>
                </div>
                <div class="panel-body">
                    <?php $form->add('submit','submit', [
                        'label' => '<a href="javascript:void(0)" class="btn btn-success">
                                        <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
                                    </a>'
                    ])?>
                    {!! form($form) !!}
                </div>
            </div>
        </div>
    </div>
@endsection

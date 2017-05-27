@extends('master')
@section('title', 'Salvar nova Turma')

@section('content')
    <div class="container">
        <div class="bs-component">
            @if($breadcrumb == 'create')
                {!! Breadcrumbs::render('turmas-create') !!}
            @elseif($breadcrumb == 'edit')
                {!! Breadcrumbs::render('turmas-edit', $turma) !!}
            @endif
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">{{$title}}</h3>
                </div>
                <div class="panel-body">
                    <?php $form->add('submit','submit', [
                        'label' => '<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>'
                    ])?>
                    {!! form($form) !!}
                </div>
            </div>
        </div>
    </div>
@endsection
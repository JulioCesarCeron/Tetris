@extends('master')
@section('title', 'Salvar novo usuário')

@section('content')
    <div class="container">
        <div class="row">
            @if($breadcrumb == 'create')
                {!! Breadcrumbs::render('users-create') !!}
            @elseif($breadcrumb == 'edit')
                {!! Breadcrumbs::render('user-edit', $user) !!}
            @else
                {!! Breadcrumbs::render('user_show', $user) !!}
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
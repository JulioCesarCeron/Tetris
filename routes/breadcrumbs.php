<?php

Breadcrumbs::register('admin', function($breadcrumbs) {
    $breadcrumbs->push('Home', route('admin.'));
});

//USERS
Breadcrumbs::register('users', function($breadcrumbs) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Usuários', route('admin.users.index'));
});

Breadcrumbs::register('users-create', function($breadcrumbs) {
    $breadcrumbs->parent('users');
    $breadcrumbs->push('Novo', route('admin.users.create'));
});

Breadcrumbs::register('user_show', function($breadcrumbs, $user) {
    $breadcrumbs->parent('users');
    $breadcrumbs->push($user->name, route('admin.users.show', $user->id));
});

Breadcrumbs::register('user-edit', function($breadcrumbs, $user) {
    $breadcrumbs->parent('user_show', $user);
    $breadcrumbs->push('Editar', route('admin.users.edit', $user->id));
});

//TURMAS
Breadcrumbs::register('turmas', function($breadcrumbs) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Turmas', route('admin.turmas.index'));
});

Breadcrumbs::register('turmas-create', function($breadcrumbs) {
    $breadcrumbs->parent('turmas');
    $breadcrumbs->push('Nova', route('admin.turmas.create'));
});

Breadcrumbs::register('turmas-edit', function($breadcrumbs, $turma) {
    $breadcrumbs->parent('turmas');
    $breadcrumbs->push('Editar: Turma ' . $turma->turma);
});

Breadcrumbs::register('turmas-adicionar-aluno', function($breadcrumbs) {
    $breadcrumbs->parent('turmas');
    $breadcrumbs->push('Adicionar Aluno', route('admin.turma-alunos.create'));
});

Breadcrumbs::register('turmas-alunos', function($breadcrumbs, $turma) {
    $breadcrumbs->parent('turmas');
    $breadcrumbs->push('Turma:' . $turma->turma, route('admin.turma-alunos.show', $turma->id));
});

Breadcrumbs::register('turmas-adicionar-aluno-turma', function($breadcrumbs, $turma) {
    $breadcrumbs->parent('turmas-alunos', $turma);
    $breadcrumbs->push('Adicionar Aluno', route('admin.turma-alunos.create'));
});

//MATERIAS
Breadcrumbs::register('materias', function($breadcrumbs) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Materias', route('admin.materias.index'));
});

Breadcrumbs::register('materias-create', function($breadcrumbs) {
    $breadcrumbs->parent('materias');
    $breadcrumbs->push('Nova', route('admin.materias.create'));
});

Breadcrumbs::register('materias-edit', function($breadcrumbs, $materia) {
    $breadcrumbs->parent('materias');
    $breadcrumbs->push('Editar Matéria: '. $materia->materia, route('admin.materias.edit', ['id' => $materia->id]));
});

//ITENS RESERVA
Breadcrumbs::register('itens-reserva', function($breadcrumbs) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Itens reserva', route('admin.item-reserva.index'));
});

Breadcrumbs::register('itens-reserva-create', function($breadcrumbs) {
    $breadcrumbs->parent('itens-reserva');
    $breadcrumbs->push('Novo item', route('admin.item-reserva.create'));
});

Breadcrumbs::register('itens-reserva-show', function($breadcrumbs, $item) {
    $breadcrumbs->parent('itens-reserva');
    $breadcrumbs->push($item->nome_item, route('admin.item-reserva.show', $item->id));
});

Breadcrumbs::register('itens-reserva-edit', function($breadcrumbs, $item) {
    $breadcrumbs->parent('itens-reserva');
    $breadcrumbs->push('Editar item: ' . $item->nome_item, route('admin.item-reserva.edit', $item->id));
});


//HORARIOS
Breadcrumbs::register('horarios', function($breadcrumbs) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Horários', route('admin.horarios.index'));
});

Breadcrumbs::register('horarios-create', function($breadcrumbs) {
    $breadcrumbs->parent('horarios');
    $breadcrumbs->push('Novo Horário', route('admin.horarios.create'));
});

Breadcrumbs::register('horarios-edit', function($breadcrumbs, $horario) {
    $breadcrumbs->parent('horarios');
    $breadcrumbs->push('Editar horário Turma: ' . $horario->turma->turma, route('admin.horarios.edit', $horario->id));
});

Breadcrumbs::register('horarios-show', function($breadcrumbs, $horario) {
    $breadcrumbs->parent('horarios');
    $breadcrumbs->push('Horário Turma ' . $horario->turma->turma, route('admin.horarios.show', $horario->id));
});


/*
Breadcrumbs::register('category', function($breadcrumbs, $category) {
    $breadcrumbs->parent('blog');

    foreach ($category->ancestors as $ancestor) {
        $breadcrumbs->push($ancestor->title, route('category', $ancestor->id));
    }

    $breadcrumbs->push($category->title, route('category', $category->id));
});

Breadcrumbs::register('page', function($breadcrumbs, $page) {
    $breadcrumbs->parent('category', $page->category);
    $breadcrumbs->push($page->title, route('page', $page->id));
});*/
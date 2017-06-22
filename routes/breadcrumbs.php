<?php

/****************ADMINISTRADORES*********************/

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
        //USERS


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
        //TURMAS

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
        //MATERIAS


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
        //ITENS RESERVA

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
        //HORARIOS
        
        //CONTEUDO AULA
            Breadcrumbs::register('admin-conteudo-aula', function($breadcrumbs) {
                $breadcrumbs->parent('admin');
                $breadcrumbs->push('Conteúdos Aula', route('admin.conteudo-aula.index'));
            });

            Breadcrumbs::register('admin-conteudo-aula-create', function($breadcrumbs) {
                $breadcrumbs->parent('admin-conteudo-aula');
                $breadcrumbs->push('Novo Conteúdo', route('admin.conteudo-aula.create'));
            });

            Breadcrumbs::register('admin-conteudo-aula-edit', function($breadcrumbs, $conteudoAula) {
                $breadcrumbs->parent('admin-conteudo-aula');
                $breadcrumbs->push('Editar Conteúdo', route('admin.conteudo-aula.edit', ['id' => $conteudoAula->id ]));
            });

            Breadcrumbs::register('admin-conteudo-aula-show', function($breadcrumbs, $conteudoAula) {
                $breadcrumbs->parent('admin-conteudo-aula');
                $breadcrumbs->push('Mostrar Conteúdo', route('admin.conteudo-aula.show', ['id' => $conteudoAula->id ]));
            });
        //CONTEUDO AULA
        
        //AVALIACAO
            Breadcrumbs::register('admin-avaliacao', function($breadcrumbs) {
                $breadcrumbs->parent('admin');
                $breadcrumbs->push('Avaliações', route('admin.avaliacao.index'));
            });

            Breadcrumbs::register('admin-avaliacao-create', function($breadcrumbs) {
                $breadcrumbs->parent('admin-avaliacao');
                $breadcrumbs->push('Nova Avaliação', route('admin.avaliacao.create'));
            });

            Breadcrumbs::register('admin-avaliacao-edit', function($breadcrumbs, $avaliacao) {
                $breadcrumbs->parent('admin-avaliacao');
                $breadcrumbs->push('Editar Avaliação', route('admin.avaliacao.edit', ['id' => $avaliacao->id]));
            });
        //AVALIACAO
        
        //RESERVAS
            Breadcrumbs::register('admin-reservas', function($breadcrumbs) {
                $breadcrumbs->parent('admin');
                $breadcrumbs->push('Reservas', route('admin.reservas.index'));
            });
        //RESERVAS
/****************ADMINISTRADORES*********************/

/****************PROFESSORES*********************/

Breadcrumbs::register('professor', function($breadcrumbs) {
    $breadcrumbs->push('Home', route('professor.'));
});

    //CONTEUDO AULA
        Breadcrumbs::register('conteudo-aula', function($breadcrumbs) {
            $breadcrumbs->parent('professor');
            $breadcrumbs->push('Conteúdos Aula', route('professor.conteudo-aula.index'));
        });

        Breadcrumbs::register('conteudo-aula-create', function($breadcrumbs) {
            $breadcrumbs->parent('conteudo-aula');
            $breadcrumbs->push('Novo Conteúdo', route('professor.conteudo-aula.create'));
        });

        Breadcrumbs::register('conteudo-aula-edit', function($breadcrumbs, $conteudoAula) {
            $breadcrumbs->parent('conteudo-aula');
            $breadcrumbs->push('Editar Conteúdo', route('professor.conteudo-aula.edit', ['id' => $conteudoAula->id ]));
        });

        Breadcrumbs::register('conteudo-aula-show', function($breadcrumbs, $conteudoAula) {
            $breadcrumbs->parent('conteudo-aula');
            $breadcrumbs->push('Mostrar Conteúdo', route('professor.conteudo-aula.show', ['id' => $conteudoAula->id ]));
        });
    //CONTEUDO AULA

    //AVALIACAO
        Breadcrumbs::register('avaliacao', function($breadcrumbs) {
            $breadcrumbs->parent('professor');
            $breadcrumbs->push('Avaliações', route('professor.avaliacao.index'));
        });

        Breadcrumbs::register('avaliacao-create', function($breadcrumbs) {
            $breadcrumbs->parent('avaliacao');
            $breadcrumbs->push('Nova Avaliação', route('professor.avaliacao.create'));
        });

        Breadcrumbs::register('avaliacao-edit', function($breadcrumbs, $avaliacao) {
            $breadcrumbs->parent('avaliacao');
            $breadcrumbs->push('Editar Avaliação', route('professor.avaliacao.edit', ['id' => $avaliacao->id]));
        });
    //AVALIACAO

    //NOTAS
        Breadcrumbs::register('avaliacoes', function($breadcrumbs) {
            $breadcrumbs->parent('professor');
            $breadcrumbs->push('Avaliações', route('professor.notas.index'));
        });

        Breadcrumbs::register('avaliacao-turma', function($breadcrumbs, $avaliacao) {
            $breadcrumbs->parent('avaliacoes');
            $breadcrumbs->push( $avaliacao->tipo_avaliacao . " " . $avaliacao->materia->materia . " Turma:" . $avaliacao->turma->turma  , route('professor.notas.show', ['id' => $avaliacao->id]));
        });

        Breadcrumbs::register('adicionar-nota', function($breadcrumbs, $avaliacao, $aluno) {
            $breadcrumbs->parent('avaliacao-turma', $avaliacao);
            $breadcrumbs->push( "Adicionar nota", route('professor.notas.adiciona', ['avaliacao' => $avaliacao->id, 'aluno' => $aluno->id]));
        });

        Breadcrumbs::register('ver-notas', function($breadcrumbs) {
            $breadcrumbs->parent('professor');
            $breadcrumbs->push('Ver notas', route('professor.notas.ver'));
        });

        Breadcrumbs::register('ver-notas-turma', function($breadcrumbs, $turma) {
            $breadcrumbs->parent('ver-notas');
            $breadcrumbs->push('Turma ' . $turma->turma, route('professor.notas.ver.turma', ['turma_id' => $turma->id]));
        });
    //NOTAS
    
    //RESERVAS
        Breadcrumbs::register('reservas', function($breadcrumbs) {
            $breadcrumbs->parent('professor');
            $breadcrumbs->push('Reservas', route('professor.reservas.index'));
        });

        Breadcrumbs::register('reservas-nova-reserva', function($breadcrumbs) {
            $breadcrumbs->parent('reservas');
            $breadcrumbs->push('Nova Reserva', route('professor.reservas.index'));
        });
    //RESERVAS
    
    //PRESENÇAS
        Breadcrumbs::register('presencas', function($breadcrumbs) {
            $breadcrumbs->parent('professor');
            $breadcrumbs->push('Presenças', route('professor.presencas.index'));
        });

        Breadcrumbs::register('presencas-turmas', function($breadcrumbs, $turma) {
            $breadcrumbs->parent('presencas');
            $breadcrumbs->push('Turma ' . $turma->turma, route('professor.presencas.materias', ['id' => $turma->id]));
        });

        Breadcrumbs::register('presencas-alunos', function($breadcrumbs, $turma, $materia) {
            $breadcrumbs->parent('presencas-turmas', $turma);
            $breadcrumbs->push('Alunos da Matéria: ' . $materia->materia, route('professor.presencas.alunos', ['turma_id' => $turma->id, 'materia_id' => $materia->id]));
        });
    //PRESENÇAS



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
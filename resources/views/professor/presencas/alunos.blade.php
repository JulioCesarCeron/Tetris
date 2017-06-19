@extends('master')
@section('title', 'Usuários')

@section('content')
    <div class="container">
        {{-- {!! Breadcrumbs::render('avaliacao') !!} --}}
        <div class="well well bs-component">
            <div class="content">
                <h3 class="header">Administração de Presenças</h3>
            </div>
        </div>
        

        <div class="well well bs-component">
            <div class="content">
                <table class="table table-striped table-stacked">
                    <thead>
                    <tr>
                        <th style="width: 10px;">#</th>
                        <th >Nome</th>
                        <th class="table-text-right">Presença</th>
                    </tr>
                    </thead>
                    <tbody>
                         @foreach($alunos as $aluno)
                            <tr>
                                <td class="text-center"> {{$aluno->id}} </td>
                                <td > {{$aluno->name}} </td>
                                <td class="table-text-right">
                                    <a href="{{ route('professor.presencas.store', ['id' => $aluno->id]) }}" class="btn btn-raised btn-info" title="Remover Avaliação" onclick="{{"event.preventDefault();document.getElementById('aluno-delete-form-{$aluno->id}').submit();"}}">
                                        presente
                                    </a>
                                    {!! 
                                        form(\FormBuilder::plain([
                                                'id'     => "aluno-delete-form-{$aluno->id}",
                                                'method' => 'POST',
                                                'url'    => route('professor.reservas.store'),
                                                'style'  => "display: none;",
                                            ])->add('materia_id', 'text' )
                                            ->add('presenca', 'text' )
                                            ->add('turma_id', 'text' )
                                            ->add('aluno_user_id', 'text' )
                                            ->add('submit', 'submit' )
                                        );
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
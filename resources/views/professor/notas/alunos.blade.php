
@extends('master')
@section('title', 'Usuários')

@section('content')
    <div class="container">
        {!! Breadcrumbs::render('avaliacao-turma', $avaliacao) !!}
        <div class="well well bs-component">
            <div class="content">
                <h3 class="header">Administração de Notas</h3>
            </div>
        </div>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="well well bs-component">
            <div class="content">
                <table class="table table-striped table-stacked">
                    <thead>
                    <tr>
                        <th class="text-center" style="width: 10px;">#</th>
                        <th>Nome</th>
                        <th class="table-text-right">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($alunos as $aluno)
                            <tr>
                                <td class="text-center"> {{$aluno->id}} </td>
                                <td> {{$aluno->name}} </td>
                                <td class="table-text-right">  
                                    @php 
                                        $strNota = (string) $aluno->notas;
                                        $needle = '"avaliacao_id":' . $avaliacao->id . ',';
                                        $posNota = strpos($strNota, $needle);
                                    @endphp
                                    
                                    @if($posNota)
                                        Nota lançada
                                    @else
                                        <a href="{{route('professor.notas.adiciona', ['avaliacao' => $avaliacao->id, 'aluno' => $aluno->id])}} " class="btn btn-padding btn-raised btn-info"> 
                                            <span class="glyphicon glyphicon-plus"></span> 
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
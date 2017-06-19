@extends('master')
@section('title', 'Adicionar Nota')

@section('content')
    <div class="container">
        {!! Breadcrumbs::render('reservas-nova-reserva') !!}
        <div class="bs-component">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">{{$title}}</h3>
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{url('professor/reservas')}}" accept-charset="UTF-8">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <input type="hidden" name="professor_user_id" id="professor_user_id" value="{{ Auth::User()->id }}">


                        <input type="hidden" name="title" id="title" value="title">
                        <input type="hidden" name="url"   id="url"   value="javascript:void(0)}">
                        <input type="hidden" name="class" id="class" value="event-important">
                        

                        
                        <fieldset>
                            <div class="form-group" >
                                <label for="itemReserva_id" class="control-label required">Item</label>
                                <select class="form-control" id="itemReserva_id" name="itemReserva_id">
                                    <option selected disabled> Item </option>
                                    @foreach($itens as $item)
                                        <option value="{{$item->id}}">{{$item->nome_item}}</option>
                                    @endforeach
                                </select>
                            </div>    
                            <div class="form-group" >
                                <label for="turma_id" class="control-label required">Turma</label>
                                <select class="form-control" id="turma_id" name="turma_id">
                                    <option selected disabled> Turma </option>
                                    @foreach($turmas as $turma)
                                        <option value="{{$turma->id}}">{{$turma->turma}}</option>
                                    @endforeach
                                </select>
                            </div>  
                             <div class="form-group" >
                                <label for="materia_id" class="control-label required">Matéria</label>
                                <select class="form-control" id="materia_id" name="materia_id">
                                    <option selected disabled> Matéria </option>
                                    @foreach($materias as $materia)
                                        <option value="{{$materia->id}}">{{$materia->materia}}</option>
                                    @endforeach
                                </select>
                            </div>                            
                            <div class="form-group" >
                                <label for="data_reserva" class="control-label required is-empty">Data</label>
                                <input type="date" class="form-control" name="data_reserva" id="data_reserva" value=""/>
                                <input type="hidden" name="start" id="start" value="0000000">
                                <input type="hidden" name="end"   id="end"   value="0000000">
                            </div>
                            <button class="form-control" type="submit">
                                <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
                            </button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
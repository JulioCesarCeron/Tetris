@extends('master')
@section('title', 'Usuários')


@section('content')
    <div class="container">
        {!! Breadcrumbs::render('user_show', $user) !!}
        <div class="bs-component">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Usuário #{{$user->id}}</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name" class="control-label">Name</label>
                                <input class="form-control" disabled name="name" type="text" value="{{$user->name}}" id="name">
                            </div>
                            <div class="form-group">
                                <label for="email" class="control-label">Email</label>
                                <input class="form-control" disabled name="email" type="email" value="{{$user->email}}" id="email">
                            </div>
                            <div class="form-group">
                                <label for="type" class="control-label">Type</label>
                                <select class="form-control" disabled id="type" name="type">
                                    <option value="admin" selected="selected">{{$user->type}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br/>
                </div>
            </div>
        </div>
    </div>
@endsection
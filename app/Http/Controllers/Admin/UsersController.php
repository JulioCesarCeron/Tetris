<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Forms\UserForm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kris\LaravelFormBuilder\FormBuilder;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $users = User::paginate(15);
        //$users = User::ofType('aluno')->get();
        return view('admin.users.index',compact('users'));
    }

    public function indexAluno() {
        $users = User::ofType('aluno')->get();
        return compact('users');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $form = \FormBuilder::create(UserForm::class, [
            'method' => 'POST',
            'url' => route('admin.users.store')
        ]);
        $title = "Novo usuário";
        return view('admin.users.save', compact('form', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormBuilder $formBuilder) {

        $form = $formBuilder->create(UserForm::class);
        $user = $form->getFieldValues();
        $user["password"] = bcrypt($user['password']);
        User::create($user);
        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user) {
        $form = \FormBuilder::create(UserForm::class, [
            'method' => 'PUT',
            'url'    => route('admin.users.update', ['id' => $user->id]),
            'model'  => $user
        ]);
        $title = "Editar Usuário";
        return view('admin.users.save', compact('form', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(FormBuilder $formBuilder, User $user) {
        $form = $formBuilder->create(UserForm::class);
        $user->fill($form->getFieldValues());
        $user["password"] = bcrypt($user['password']);
        $user->save();
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user) {
        $user->delete();
        return redirect()->route('admin.users.index');
    }
}

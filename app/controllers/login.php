<?php
use app\models\Read;

$validated = validate([
    'email' => 'required',
    'password' => 'required'
]);

$search = new Read;

$user = $search->findBy('users', ['email' => $validated['email']]);
if(!$user){
    setFlash('Login', 'Erro ao fazer o login, verifique as informações');
    return redirect('/');
}

if(!password_verify($validated['password'], $user->password)){
    setFlash('Login', 'Erro ao fazer o login, verifique as informações');
    return redirect('/');
}

$_SESSION['LOGGED'] = $user;
redirect('/');
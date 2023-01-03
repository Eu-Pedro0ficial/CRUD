<?php 

use app\models\Create;


$validated = validate([
    'name' => 'required',
    'sobrenome' => 'required',
    'email' => 'required|email|unique',
    'password' => 'required|maxLen'

]);
$validated['password'] = password_hash($validated['password'], PASSWORD_DEFAULT);

$create = new Create;
$created = $create->create('users', $validated);

if(!$created){
    setFlash('errorCreate', 'Ocorreu um erro ao criar, tente novamente!');
    return redirect('?view=register');
}
setFlash('successCreate', 'Criado com sucesso!');
return redirect('/');
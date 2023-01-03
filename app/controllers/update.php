<?php
use app\models\Update;

$validated = validate([
    'name' => 'required',
    'sobrenome' => 'required',
    'email' => 'required|email',
]);

$pattern = '/[^0-9]/';
$update = new Update;
$updated = $update->update('users', $validated, ['id' => preg_replace($pattern, '', logged()->id)]);

if(!$updated){
    setFlash('update', 'Erro ao atualizar os dados, tente novamente mais tarde!');
    return redirect('/');
}
setFlash('update', 'User atualizado com sucesso, logge de novo para voltar a navegar');
unset($_SESSION['LOGGED']);
return redirect('/');
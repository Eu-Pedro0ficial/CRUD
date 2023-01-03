<?php

use app\models\Delete;

$pattern = '/[^0-9]/';
$delete = new Delete;
$deleted = $delete->delete('users', ['id' =>preg_replace($pattern, '', logged()->id)]);
if(!$deleted){
    setFlash('Delete', 'Erro ao deletar o usuario, tente novamente mais tarde!');
    return redirect('/');
}
setFlash('Delete', 'User deletado com sucesso');
unset($_SESSION['LOGGED']);
return redirect('/');
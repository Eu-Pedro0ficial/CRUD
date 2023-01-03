<?php
use app\models\Read;

function validate(array $validated){
    $result = [];
    foreach ($validated as $field => $validate) {

        $result[$field] = (!str_contains($validate, "|")) ? singleValidation($validate, $field) : multipleValidation($validate, $field);

    }
    if(in_array(false, $result)){
        return false;
    }
    return $result;
}
function singleValidation($validate, $field){
    return $validate($field);
}
function multipleValidation($validate, $field){
    $result = [];
    $explodeValidate = explode('|',$validate);
    foreach ($explodeValidate as $value) {
        $result[$field] = $value($field);

        if($result[$field] === false || $result[$field] === null){
            break;
        }
    }
    return $result[$field];

}
function required($field){
    $require = strip_tags($_POST[$field]);
    if($require === ''){
        setFlash($field, 'Os campos precisam ser preenchidos!');
        return false;
    }
    return $require;
}
function unique($field){
    $fieldIsUnique = strip_tags($_POST[$field]);
    $search = new Read;
    $isUnique = $search->findBy('users', ['email' => $fieldIsUnique]);
    if($isUnique){
        setFlash($field, 'Esse email ja foi utilizado, escolha outro!');
        return false;
    }
    return $fieldIsUnique;
}
function formated($field){
    $formate = strip_tags($_POST[$field]);
    $pattern = '/[^0-9]+/';
    $replace = '';
    $formated = preg_replace($pattern, $replace, $formate);
    return $formated;
}
function maxLen($field){
    $fieldMaxLen = strip_tags($_POST[$field]);
    if(strlen($fieldMaxLen) > 12){
        setFlash($field, 'A senha não pode ter mais de 12 characteres');
        return false;
    }
    return $fieldMaxLen;
}
function email($field){
    $email = strip_tags($_POST[$field]);
    if(!$email){
        setFlash($field, 'Utilize um email valido por favor!');
        return false;
    }
    return $email;
}

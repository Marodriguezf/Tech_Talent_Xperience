<?php

$arr = [];
$arr['correo'] = $_POST['correo'];


$row= db_query("select * from registro_candidatos where correo = :correo limit 1", $arr);

if (!empty($row)) 
{

    $row = $row[0];
    //revisar la contraseña
    if(password_verify($_POST['password'], $row['password']))
    {
        // contraseña correcta
        $info['success'] = true;
    }else
    {
        $info['errors']['correo']= "correo o password incorrecto";
    }


}else
{
    $info['errors']['correo']= "correo o password incorrecto";
}


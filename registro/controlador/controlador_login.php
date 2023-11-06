<?php


$arr = [];
$arr['correo']              = $_POST['correo'];

$row = db_query("select * from registro_candidatos where correo = :correo limit 1", $arr);


if (!empty($row)) 
{
    $row = $row[0];
    
    var_dump($row['password']);
    
    if(password_verify($_POST['password'], $row['password'])) 
    {
        // Contraseña correcta
        $info['success'] = true;
        $_SESSION['PROFILE']= $row;
    } else {
        $info['errors']['correo'] = "Correo o contraseña incorrectos";
    }
}else 
{
    $info['errors']['correo'] = "Correo o contraseña incorrectos";
}

// Devuelve una respuesta JSON
echo json_encode($info);


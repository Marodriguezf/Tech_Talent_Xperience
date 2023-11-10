<?php

// Validaciones

// Validar nombre
if (empty($_POST['nombre'])) {
    $info['errors']['nombre'] = "Se requiere un Nombre";
} else 
if (!preg_match(" /^[\p{L}\s]+$/u ", $_POST['nombre'])) {
    $info['errors']['nombre'] = "El nombre solo puede tener letras, no se permiten caracteres especiales o números";
}

// Validar apellido
if (empty($_POST['apellido'])) {
    $info['errors']['apellido'] = "Se requiere un apellido";
} else 
if (!preg_match("/^[\p{L}\s]+$/u ", $_POST['apellido'])) {
    $info['errors']['apellido'] = "El apellido solo puede tener letras, no se permiten caracteres especiales o números";
}

// Validar correo
if (empty($_POST['correo'])) {
    $info['errors']['correo'] = "Se requiere un correo";
} else if (!filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL)) {
    $info['errors']['correo'] = "El correo no es válido";
}

// Validar password
if (!empty($_POST['password'])) {

    if ($_POST['password'] !== $_POST['confirmar_password']) {
        $info['errors']['password'] = "El password no coincide";
    } else 
    if (strlen($_POST['password']) < 8) {
        $info['errors']['password'] = "El password debe tener al menos 8 caracteres";
    }
}

if (!empty($_FILES['foto']['name'])) {
    $folder = "uploads/";
    if (!file_exists($folder)) {
        mkdir($folder, 0777, true);
        file_put_contents($folder . 'index.html', 'acceso denegado');
    }
    $allowed = ['image/jpeg', 'image/png'];
    if (in_array($_FILES['foto']['type'], $allowed)) {
        $image = $folder . time() . $_FILES['foto']['name'];
        move_uploaded_file($_FILES['foto']['tmp_name'], $image);
    } else {
        $info['errors']['foto'] = "solo estas imagenes seran permitida: " . implode(",", $allowed);
    }
}

if (empty($info['errors']) && $row) {

    // guardar en la base de datos
    $arr = [];
    $arr['nombre'] = $_POST['nombre'];
    $arr['apellido'] = $_POST['apellido'];
    $arr['correo'] = $_POST['correo'];
    $arr['id_candidato'] = $row['id_candidato'];

    $image_query = "";
    if (!empty($image)) {
        $arr['foto'] = $image;
        $image_query = ",foto = :foto";
    }
    $password_query = "";
    if (!empty($_POST['password'])) 
    {
        $arr['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $password_query = ",password = :password";
    }

        
    db_query("update registro_candidatos set nombre = :nombre,apellido = :apellido, correo = :correo $image_query $password_query where id_candidato = :id_candidato limit 1", $arr);
    
    // eliminar imagenes
    if(!empty($image)&& file_exists($row['foto']))
    {
        unlink($row['foto']);
    }
    $row = db_query("select * from registro_candidatos where id_candidato = :id_candidato limit 1", ['id_candidato' => $row['id_candidato']]);

    if ($row) 
    {
        $row = $row[0];
        $_SESSION['PROFILE'] = $row;
    }

    $info['success'] = true;
}

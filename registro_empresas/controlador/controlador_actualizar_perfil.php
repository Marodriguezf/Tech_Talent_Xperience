<?php

// Validaciones

// Validar nombre de empresa
if (empty($_POST['nombre_empresa'])) {
    $info['errors']['nombre_empresa'] = "Se requiere un Nombre de empresa";
} else 
if (!preg_match(" /^[\p{L}\s]+$/u ", $_POST['nombre_empresa'])) {
    $info['errors']['nombre_empresa'] = "El nombre solo puede tener letras, no se permiten caracteres especiales o números";
}

// Validar sector
if (empty($_POST['sector'])) {
    $info['errors']['sector'] = "Se requiere el sector de la empresa";
} else 
if (!preg_match("/^[\p{L}\s]+$/u ", $_POST['sector'])) {
    $info['errors']['sector'] = "El apellido solo puede tener letras, no se permiten caracteres especiales o números";
}

// Validar correo empresa
if (empty($_POST['correo_empresa'])) {
    $info['errors']['correo_empresa'] = "Se requiere un correo de empresa";
} else if (!filter_var($_POST['correo_empresa'], FILTER_VALIDATE_EMAIL)) {
    $info['errors']['correo_empresa'] = "El correo no es válido";
}

// Validar password
if (!empty($_POST['password_empresa'])) {

    if ($_POST['password_empresa'] !== $_POST['password_empresa']) {
        $info['errors']['password_empresa'] = "El password no coincide";
    } else 
    if (strlen($_POST['password_empresa']) < 8) {
        $info['errors']['password_empresa'] = "El password debe tener al menos 8 caracteres";
    }
}

if (!empty($_FILES['foto_empresa']['name'])) {
    $folder = "uploads/";
    if (!file_exists($folder)) {
        mkdir($folder, 0777, true);
        file_put_contents($folder . 'index.html', 'acceso denegado');
    }
    $allowed = ['image/jpeg', 'image/png'];
    if (in_array($_FILES['foto_empresa']['type'], $allowed)) {
        $image = $folder . time() . $_FILES['foto_empresa']['name'];
        move_uploaded_file($_FILES['foto_empresa']['tmp_name'], $image);
    } else {
        $info['errors']['foto_empresa'] = "solo estas imagenes seran permitida: " . implode(",", $allowed);
    }
}

if (empty($info['errors']) && $row) {

    // guardar en la base de datos
    $arr = [];
    $arr['nombre_empresa'] = $_POST['nombre_empresa'];
    $arr['sector'] = $_POST['sector'];
    $arr['correo_empresa'] = $_POST['correo_empresa'];
    $arr['id_empresa'] = $row['id_empresa'];

    $image_query = "";
    if (!empty($image)) {
        $arr['foto_empresa'] = $image;
        $image_query = ",foto_empresa= :foto_empresa";
    }
    $password_query = "";
    if (!empty($_POST['password_empresa'])) 
    {
        $arr['password_empresa'] = password_hash($_POST['password_empresa'], PASSWORD_DEFAULT);
        $password_query = ",password_empresa = :password_empresa";
    }

        
    db_query("update registro_empresas set nombre_empresa = :nombre_empresa,sector = :sector,correo_empresa = :correo_empresa $image_query $password_query where id_empresa = :id_empresa limit 1", $arr);
    
    // eliminar imagenes
    if(!empty($image)&& file_exists($row['foto_empresa']))
    {
        unlink($row['foto_empresa']);
    }
    $row = db_query("select * from registro_empresas where id_empresa = :id_empresa limit 1", ['id_empresa' => $row['id_empresa']]);

    if ($row) 
    {
        $row = $row[0];
        $_SESSION['PROFILE'] = $row;
    }

    $info['success'] = true;
}

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

if (empty($info['errors'])) {

    // guardar en la base de datos
    $arr = [];
    $arr['nombre_empresa'] = $_POST['nombre_empresa'];
    $arr['sector'] = $_POST['sector'];
    $arr['correo_empresa'] = $_POST['correo_empresa'];
    $arr['password_empresa'] = password_hash($_POST['password_empresa'], PASSWORD_DEFAULT);


    db_query("insert into registro_empresas(nombre_empresa,sector, correo_empresa,password_empresa) values(:nombre_empresa,:sector, :correo_empresa, :password_empresa)", $arr);

    $info['success'] = true;
}

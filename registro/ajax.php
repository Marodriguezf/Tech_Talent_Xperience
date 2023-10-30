<?php
if (!empty($_POST && ['data_type'])) {
    $info['data_type']  = $_POST['data_type'];
    $info['errors']     = [];
    $info['success']    = false;

    if ($_POST['data_type'] == "signup") {
        // Validaciones 


        //Validar nombre

        if (empty($_POST['nombre'])) {
            $info['errors']['nombre'] = "Se requiere un Nombre";
        } else
        if (!preg_match(" /^[\p{L}]+$/ ", $_POST['nombre'])) {
            $info['errors']['nombre'] = "el nombre solo puede tener letras, no se permiten caracteres especiales o numeros";
        }

        //Validar apellido

        if (empty($_POST['apellido'])) {
            $info['errors']['apellido'] = "Se requiere un apellido";
        } else
        if (!preg_match(" /^[\p{L}]+$/ ", $_POST['apellido'])) {
            $info['errors']['apellido'] = "el apellido solo puede tener letras, no se permiten caracteres especiales o numeros";
        }
        //Validar correo

        if (empty($_POST['correo'])) {
            $info['errors']['correo'] = "Se requiere un correo";
        } else
        if (!filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL)) {
            $info['errors']['correo'] = "El correo no es valido";
        }

        //Validar password
        if (empty($_POST['password'])) {
            $info['errors']['password'] = "Se requiere un password";
        } else
        if ($_POST['password'] !== $_POST[' confirmar_ password']) {
            $info['errors']['password'] = "El password no coincide";
        } else
        if (strlen($_POST['password']) < 8) {
            $info['errors']['password'] = "El password debe tener al menos 8 caracteres";
        }

        if (empty($info['errors'])) {
            //Guardar en la base de datos
            $info['success'] = true;
        }
    }
    echo json_encode($_POST);
}

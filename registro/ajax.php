<?php

require 'functions.php';

if (!empty($_POST['data_type'])) 
{
    $info['data_type'] = $_POST['data_type'];
    $info['errors'] = [];
    $info['success'] = false;

    if ($_POST['data_type'] == "signup") 
    {
        require './controlador/controlador_signup.php';

    }else
     if ($_POST['data_type'] == "login")
    {
        require './controlador/controlador_login.php';

    }

    
    // Devolver una respuesta JSON
    echo json_encode($info);

}
<?php

require 'functions.php';

if (!empty($_POST['data_type'])) {
    $info['data_type'] = $_POST['data_type'];
    $info['errors'] = [];
    $info['success'] = false;

    if ($_POST['data_type'] == "signup") {
        require './controlador/controlador_signup.php';
    } else
    if ($_POST['data_type'] == "perfil_actualizar") 
    { 
        $id = user('id_candidato');

        $row = db_query("select * from registro_candidatos where id_candidato = :id_candidato limit 1", ['id_candidato' => $id]);
        
        if ($row) {
            $row = $row[0];
        }
        require './controlador/controlador_actualizar_perfil.php';

    } else

    if ($_POST['data_type'] == "perfil_eliminar") 
    { 
        $id = user('id_candidato');

        $row = db_query("select * from registro_candidatos where id_candidato = :id_candidato limit 1", ['id_candidato' => $id]);
        
        if ($row) {
            $row = $row[0];
        }
        require './controlador/controlador_eliminar_perfil.php';

    } else

     if ($_POST['data_type'] == "login") {
        require './controlador/controlador_login.php';
    }

    // Devolver una respuesta JSON
    echo json_encode($info);
}

<?php


if (!empty($_POST['data_type'])) 
{

    $info['data_type'] = $_POST['data_type'];
    $info['errors'] = [];
    $info['success'] = false;

    if ($_POST['data_type'] == "crear_vacante") {
        if (empty($_POST['titulo'])) {


            $info['errors']['titulo'] = "Es requerido un titulo de vacante";

        } elseif (!preg_match(" /^[\ p{L}]+$/ ", $_POST['titulo'])) {
            $info['errors']['titulo'] = "El titulo no puede contener caracteres especiales o numeros";
        }

        if (empty($info['errors'])) 
        {
            $info['success'] = true;
        }

    }
        //Devolver una respuesta JSON
    echo json_encode($_POST);
}


    /*{
        require './controlador/crear_vacante.php';
    } else
    if ($_POST['data_type'] == "actualizar_vacante") 
    { 
        $id = user('id_vacante');

        $row = db_query("select * from vacantes where id_vacante = :id_vacante limit 1", ['id_vacante' => $id]);
        
        if ($row) {
            $row = $row[0];
        }
        require './controlador/controlador_actualizar_vacante.php';

    } else

    if ($_POST['data_type'] == "eliminar_vacante") 
    { 
        $id = user('id_vacante');

        $row = db_query("select * from vacantes where id_vacante = :id_vacante limit 1", ['id_vacante' => $id]);
        
        if ($row) {
            $row = $row[0];
        }
        require './controlador/controlador_eliminar_vacante.php';

    } else */



    

<?php

// Validaciones

// Valida el acceso del ususario
if (!is_logged_in () || user('id_candidato') != $_POST['id_candidato']) {
    $info['errors']['nombre'] = "No tienes permisos para eliminar este perfil";
} 


if (empty($info['errors']) && $row) {

    // Eliminar
    $arr = [];
    $arr ['id_candidato'] = $id;
    db_query("delete from registro_candidatos where id_candidato = :id_candidato limit 1",$arr);
    
    // eliminar imagenes
    if(file_exists($row['foto']))
    {
        unlink($row['foto']);
    }

    $info['success'] = true;
}
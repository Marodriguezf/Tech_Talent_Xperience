<?php

// Validaciones

// Valida el acceso del ususario
if (!is_logged_in () || user('id_empresa') != $_POST['id_empresa']) {
    $info['errors']['nombre_empresa'] = "No tienes permisos para eliminar este perfil";
} 


if (empty($info['errors']) && $row) {

    // Eliminar
    $arr = [];
    $arr ['id_empresa'] = $id;
    db_query("delete from registro_empresas where id_empresa = :id_empresa limit 1",$arr);
    
    // eliminar imagenes
    if(file_exists($row['foto_empresa']))
    {
        unlink($row['foto_empresa']);
    }

    $info['success'] = true;
}
<?php

	$arr = [];
	$arr['correo_empresa'] 		= $_POST['correo_empresa'];

 	$row = db_query("select * from registro_empresas where correo_empresa = :correo_empresa limit 1",$arr);

	if(!empty($row))
	{
		$row = $row[0];

		//check the password
		if(password_verify($_POST['password_empresa'], $row['password_empresa']))
		{
			//password correct
			$info['success'] 	= true;
			$_SESSION['PROFILE'] =$row;
		}else
		{
			$info['errors']['correo_empresa'] = "Email o contraseña Inconrrecta";
		}

	}else
	{
		$info['errors']['correo_empresa'] = "Email o contraseña Inconrrecta";
	}
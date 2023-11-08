<?php

	$arr = [];
	$arr['correo'] 		= $_POST['correo'];

 	$row = db_query("select * from registro_candidatos where correo = :correo limit 1",$arr);

	if(!empty($row))
	{
		$row = $row[0];

		//check the password
		if(password_verify($_POST['password'], $row['password']))
		{
			//password correct
			$info['success'] 	= true;
			
		}else
		{
			$info['errors']['email'] = "Wrong email or password";
		}

	}else
	{
		$info['errors']['email'] = "Wrong email or password";
	}
<?php
session_start();
function db_query(string $query, array $data = array())
{
	$string = "mysql:hostname=localhost;dbname=talento";
	$con = new PDO($string, 'root', '');

	$stm = $con->prepare($query);
	$check = $stm->execute($data);

	if($check)
	{
		$res = $stm->fetchAll(PDO::FETCH_ASSOC);
		if(is_array($res) && !empty($res))
		{
			return $res;
		} 
	}

	return false;
}

function is_logged_in():bool
{

	if(!empty($_SESSION['PROFILE']))
	{
		return true;
	}

	return false;
}

function redirect($path):void
{
	header("Location: $path");
	die;
}

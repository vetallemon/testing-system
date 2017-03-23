<?php

	session_start();
	
	require_once 'class.user.php';
	$session = new USER();

	$auth_user = new USER();


	$user_id = $_SESSION['user_session'];

	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
	$stmt->execute(array(":user_id"=>$user_id));

	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

	if(!($userRow['user_name'] =='admin'))
	{
		$session->redirect('index.php');
	}
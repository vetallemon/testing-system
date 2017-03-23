<?php
require_once("session.php");
require_once("class.user.php");
$auth_user = new USER();
$user_id = $_SESSION['user_session'];
$stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
$stmt->execute(array(":user_id"=>$user_id));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
require_once("connect.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="dist/css/bootstrapValidator.css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<script type="text/javascript" src="css/jquery.min.js"></script>
	<script type="text/javascript" src="js/owl.carousel.js"></script>
</head>
<body>
<div class="container">
<div class="header">

	<nav class='navbar navbar-default'><ul class='nav navbar-nav'>
			<li><a href="home.php">Головна</a></li>
			<li><a href="profile.php">Профіль</a></li>
			 <?php if($userRow['user_name']=='admin'): ?>

				 <li><a href="create_test.php"> Створити тест</a></li>
				 <li><a href="result_all.php"> Результати</a></li>

				<?php endif ?>


</ul><ul class="nav navbar-nav navbar-right-login">

			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
					<span class="glyphicon glyphicon-user"></span>&nbsp;Привіт -  <?php echo $userRow['user_name']; ?>&nbsp;<span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="profile.php"><span class="glyphicon glyphicon-user"></span>&nbsp;Профіль</a></li>
					<li><a href="logout.php?logout=true"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Вийти</a></li>
				</ul>
			</li>
		</ul></nav>

</div>

<div class="content">

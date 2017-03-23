<?php
session_start();
require_once("connect.php");
$_SESSION['test_name'] = $_POST['test_name'];
$test->createTest($_POST['test_name']);
$id = $test->getIdTest($_POST['test_name']);
$_SESSION['id_test'] = $id['id'];
header('Location:create_question.php');
?>
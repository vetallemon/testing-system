<?php
require_once('session_admin.php');
session_start();
include 'connect.php';
if(isset($_GET['id'])){
$id=$_GET['id'];
        $test->deleteTest($id);

}
header('Location:home.php');
?>
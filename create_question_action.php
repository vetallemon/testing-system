<?php
session_start();
include 'connect.php';

$test->createQuestion($_POST['question_name'],$_SESSION['id_test']);
$id_question = $test->getIdQuestion($_POST['question_name']);
if(isset($_POST['dynamic'])){
    $dynamic = $_POST['dynamic'];
}
if(isset($_POST['answers'])){
    $answers = $_POST['answers'];
}
foreach ($dynamic as $key => $item) {
    $pr = 0;
    if($key == $answers){
        $pr = 1;
    }
    $test->setAnswer($item, $id_question['id'],$pr);
}
unset($dynamic);
header('Location:create_question.php');
?>
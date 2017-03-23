<?php
session_start();
include 'connect.php';

$_SESSION['test_id'];
$i=0;
$answer = $_POST['answer'];

foreach ($_POST as $key => $item) {
    if($key=='answer'){

    }
    else{

    if($i==0){
        $test->editQuestion($key,$item);
        $i++;
    }
    else{
        if($key==$answer){
            $test->editAnswer($key,$item,'1');
        }
        else{
            $test->editAnswer($key,$item,'0');
        }

    }

         }
}

header('Location:update.php?id='.$_SESSION['test_id']);

?>
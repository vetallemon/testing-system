<?php
require_once("session.php");
require_once("connect.php");
require_once("class.user.php");
$auth_user = new USER();
$user_id = $_SESSION['user_session'];
$stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
$stmt->execute(array(":user_id"=>$user_id));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
$arr=array();
$arr=$_POST;
$scores = 0;
foreach ($arr as $key => $value) {
    if (!$test->getCorrectAnswer($value)==""){
        $scores++;
    }
}
$test_name = $test->getTestName($_SESSION['test_id']);
$test->setResult($userRow['user_name'],$test_name['test_name'],$scores);
header('Location:profile.php');
?>

<?php
require_once('footer.php');
?>

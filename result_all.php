<?php
require_once('session_admin.php');
require_once('header.php');

$result_all= $test->getResults();
?>
<table class="table table-bordered">
    <tr class="info">
        <th>Ім'я</th>
        <th> Назва тесту</th>
        <th>Бали</th>
        <th>Час завершення</th>
    </tr>
<?php foreach ($result_all as  $result):?>

<tr>
    <td> <?= $result['user_name'] ?></td>
    <td> <?= $result['test_name'] ?></td>
    <td> <?= $result['result'] ?></td>
    <td> <?= $result['time_d'] ?></td>
</tr>




<?php
endforeach;
?>
</table>

<?php
require_once('footer.php');
?>
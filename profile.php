<?php
	require_once("session.php");
	require_once("class.user.php");
    require_once('header.php');
	$results = $test->getUserResults($userRow['user_name']);
?>
<table class="table table-bordered">
	<tr class="info">
		<th>Назва тесту</th>
		<th>Кількість правильних відповідей</th>
		<th>Час завершення тесту</th>
	</tr>
	<?php foreach ($results as  $result):?>
		<tr>
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

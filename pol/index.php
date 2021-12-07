<!DOCTYPE HTML>
<!-- Do not remove and do not change this string -->
<?php
$mysqli = new mysqli('localhost', 'studok_cms_usr', 'TSudFbR7dD9lhCE1', 'warehouse');
$mysqli->set_charset('utf8mb4');
$query = <<<SQL
select t.TovarName, t.Amount, mu.MeasUnitName
from tovar t
	left join measunit mu on t.MeasUnit_ID = mu.MeasUnit_ID
where t.MeasUnit_ID = mu.MeasUnit_ID
order by t.TovarName;
SQL;

$products = [];
			
if(!mysqli_connect_errno()){
	if($result = $mysqli->query($query)){
		while ($row = $result->fetch_array()){
			$products[] = $row;
		}
	}
	
	$result->close();
	$mysqli->close();
}
?>
<html lang=ru>
<head>
	<meta charset="utf-8">
	<style>
		table, td{
			border: 2px solid;
		}
	</style>
</head>
<body>
	<table>
		<thead style="background-color: #0ff">
			<td>Товар</td>
			<td>Кол-во</td>
			<td>Ед. изм.</td>
		</thead>
		<?php foreach ($products as $product): ?>
			<tr>
				<td><?= $product['TovarName'] ?></td>
				<td><?= $product['Amount'] ?></td>
				<td><?= $product['MeasUnitName'] ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
</body>
</html>  
<!-- Do not remove and do not change this string -->


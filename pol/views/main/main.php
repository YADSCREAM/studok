<!DOCTYPE HTML>
<html>
<head>
	<title>Главная</title>
	<meta charset= "utf-8">
	<link rel="stylesheet" href="assets/css/style.css">
	<script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
<script src="/assets/js/google-translate.js"></script>
<script src="//translate.google.com/translate_a/element.js?cb=TranslateInit"></script>
<link rel="shortcut icon" type="image/png" href="assets/img/favicon.ico"/>
</head>
<body>
	<?php include ('views/partials/header.php');?>
	<div id = "main">
		<h1>Полезная информация для студентов технических специальностей</h1>
	 
		<table>
			<?php
				$products = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM `products`"));
				$count1 = count($products)/5;
				for($i=0;$i<$count1;$i++)
				{
			?>
			<tr>
				<?php
					$count2 = 5;
					if($i+1 >= $count1)
					{
						$count2 = (count($products))%5;
					}
					for($j=0;$j<$count2;$j++)
					{
				?>
				<td id="td2"><a href="?go=subject&id=<?= $products[$i*5+$j][0] ?>"><?= $products[$i*5+$j][1] ?></a></td>
				<?php } ?>
			</tr>
			<?php } ?>
		</table>
	</div>
	<?php include ('views/partials/footer.php');?>
</body>
</html>
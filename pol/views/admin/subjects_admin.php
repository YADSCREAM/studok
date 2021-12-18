<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Предметы</title>
	<script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
<script src="/assets/js/google-translate.js"></script>
<script src="//translate.google.com/translate_a/element.js?cb=TranslateInit"></script>
</head>
<style>
    th, td {
        padding: 10px;
    }

    th {
        background: #606060;
        color: #fff;
    }

    td {
        background: #b5b5b5;
    }
</style>
<body>
<h3>Предметы</h3>
<form action="/?go=admin_subject&action=add" method="post">
    <p>Название предмета</p>
    <input type="text" name="title">
    <button type="submit">Добавить</button>
</form>
    <table>
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Действие</th>
            <th>Действие</th>
        </tr>
<?php
	/*
	* Перебираем массив и рендерим HTML с данными из массива
	* Ключ 0 - id
	* Ключ 1 - title
	* Ключ 2 - price
	* Ключ 3 - description
	*/
	foreach ($admin_subj as $s) {
	?>
		<tr>
			<td><?= $s[0] ?></td>
			<td><a href="/?go=subject&id=<?= $s[0] ?>"><?= $s[1] ?></a></td>
			<td><a href="/?go=admin_subject&action=edit&id=<?= $s[0] ?>">Изменить</a></td>
			<td><a style="color: red;" href="/?go=admin_subject&action=delete&id=<?= $s[0] ?>">Удалить</a></td>
		</tr>
	<?php
	}
	?>
</table>
</body>
</html>
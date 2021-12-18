<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Панель администратора</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">-->
	<script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
<script src="/assets/js/google-translate.js"></script>
<script src="//translate.google.com/translate_a/element.js?cb=TranslateInit"></script>
</head>
<body>
<?php include ('views/partials/header.php');?>
    <div class="container">
        <h1>Панель администратора</h1>
		<br>
		<br>
		<br>
        <a href="/?go=admin&action=add">Добавить тему</a>
        <div>
            <table class="admin-table">
                <tr>
                    <th>Дата</th>
                    <th>Заголовок</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach($articles as $a): ?>
                <tr>
                    <td><?=$a['date'];?></td>
                    <td><?=$a['title'];?></td>
                    <td><a href="/?go=admin&action=edit&id=<?=$a['id'];?>">Редактировать</a></td>
                    <td><a href="/?go=admin&action=delete&id=<?=$a['id'];?>">Удалить</a></td>
                </tr>
                <?php endforeach ?>
            </table>
        </div>
    </div>
<?php include ('views/partials/footer.php');?>
</body>
</html>
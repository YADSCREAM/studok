<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Обновление предмета</title>
	<script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
<script src="/assets/js/google-translate.js"></script>
<script src="//translate.google.com/translate_a/element.js?cb=TranslateInit"></script>
</head>
<body>
    <h3>Обновление предмета</h3>
    <form action="/?go=admin_subject&action=edit&id=<?=$_GET['id'];?>" method="post">
        <input type="hidden" name="id" value="<?= $product['id'] ?>">
        <p>Название</p>
        <input type="text" name="title" value="<?= $product['title'] ?>">
        <p>Описание</p>
        <textarea name="description"><?= $product['description'] ?></textarea>
        <p>Price</p>
        <input type="number" name="price" value="<?= $product['price'] ?>"> <br> <br>
        <a href="/?go=admin_subject">Назад</a> <button type="submit">Обновить</button>
    </form>
</body>
</html>
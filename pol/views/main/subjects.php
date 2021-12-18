<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Студок</title>
	<link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
<script src="/assets/js/google-translate.js"></script>
<script src="//translate.google.com/translate_a/element.js?cb=TranslateInit"></script>
<link rel="shortcut icon" type="image/png" href="assets/img/favicon.ico"/>
</head>
<body>
	<?php include ('views/partials/header.php');?>
    <div class="container">
        <h1><?=$name;?></h1>
        <div>
            <?php foreach($subjects as $a): ?>
            <div class="article">
                <h3><a href="?go=article&id=<?=$a['article_id']?>"><?=$a['article_title'];?></a></h3>
            </div>
            <?php endforeach ?>
        </div>
    </div>
	<?php include ('views/partials/footer.php');?>
</body>
</html>
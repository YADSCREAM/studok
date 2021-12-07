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
    <div class="main">
	<br>
	<br>
 
        <h1 style="font-size: 12px;"><?=$article['title'];?></h1>
        <div>
            <div class="article">
				<a href="/?go=subject&id=<?=$subjId;?>">К темам</a>
                <?php 
                    session_start();
                    if ($_SESSION['user'] && !empty($_GET['id'])) {
                        if(!$bookmarkExists)
                            echo ' | <a href="/?go=bookmark_add&id='.$_GET['id'].'">Добавить закладку</a>';
                        else
                            echo ' | <a href="/?go=bookmark_del&id='.$_GET['id'].'">Удалить закладку</a>';
                    }
                ?>
                <?php if($prevArticle!=-1) {
                    echo ' | <a href="/?go=article&id='.$prevArticle.'">Предыдущая тема</a>'; 
                }?>
                <?php if($nextArticle!=-1) {
                    echo ' | <a href="/?go=article&id='.$nextArticle.'">Следующая тема</a>'; 
                }?>
				<br>
				<em>Опубликовано: <?=$article['date'];?></em><br>
                <div class="texter"><?=$article['content'];?></div>
				
            </div>
        </div>
    </div>
	<?php include ('views/partials/footer.php');?>
</body>
</html>
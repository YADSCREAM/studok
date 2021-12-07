<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: /?go=login');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Мой профиль</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/main.css?asdf">
	<script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
<script src="/assets/js/google-translate.js"></script>
<script src="//translate.google.com/translate_a/element.js?cb=TranslateInit"></script>
</head>
<body>
    <?php include ('views/partials/header.php');?>
    <!-- Профиль -->
        <h2 style="margin: 10px 0;"><?= $_SESSION['user']['full_name'] ?></h2>
        <a href="#"><?= $_SESSION['user']['email'] ?></a>
		<?php
			if($_SESSION['user']['isAdmin']==1){
				echo ' | <a href="/?go=admin_subject">Список предметов</a>';
				echo ' | <a href="/?go=admin">Список тем</a>';
			}
		?> | 
        <a href="/?go=logout" class="logout">Выход</a>
    <br>
    <?php
    if(count($bookmarks)>0){
        echo "Всего закладок: ".count($bookmarks);
        echo "<br>";
        echo "<table border=1>";
        echo "<tr><th>Предмет</th><th>Тема</th></tr>";
        foreach($bookmarks as $b){
            echo "<tr>";
                echo "<td><a href='/?go=subject&id=".$b['subject_id']."'>".GetSubjectName($connect,$b['subject_id'])."</a></td>";
                echo "<td><a href='/?go=article&id=".$b['article_id']."'>".GetArticleName($connect,$b['article_id'])."</a></td>";
                echo "<td><a href='/?go=bookmark_del&id=".$b['article_id']."&from_profile=1'>Убрать закладку</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    else{
        echo "У Вас не закладок!";
    }
    ?>
</body>
</html>
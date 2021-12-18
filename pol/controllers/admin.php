<?php
require_once("models/articles.php");
require_once("models/subjects.php");
session_start();
if (!$_SESSION['user'] || $_SESSION['user']['isAdmin']==0) {
    header('Location: /');
}

if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = "";
}

if ($action == "add") {
    if (!empty($_POST)) {
        articles_new($connect, $_POST['title'], $_POST['date'], $_POST['content'], (int)$_POST['product_id']);
        header("Location: /?go=admin");
    }
    $productNames = getProductNames($connect);
    include("views/admin/article_admin.php");
} else if ($action == "edit") {
    if (!isset($_GET['id'])) {
        header("Location: /?go=admin");
    }
    $id = (int)$_GET['id'];
    
    if (!empty($_POST) && $id > 0) {
        articles_edit($connect, $id, $_POST['title'], $_POST['date'], $_POST['content'], (int)$_POST['product_id']);
        header("Location: /?go=admin");
    }
    $subjectId = GetSubjectIdFromArticle($connect, $id);
    $article = articles_get($connect, $id);
    $productNames = getProductNames($connect);
    include("views/admin/article_admin.php");
} else if ($action == "delete") {
    if (!isset($_GET['id'])) {
        header("Location: /?go=admin");
    }
    $id = $_GET['id'];
    articles_delete($connect, $id);
    header("Location: /?go=admin");
} else {
    $articles = articles_all($connect);
    include("views/admin/articles_admin.php");
}

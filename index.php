<?php
	require_once("config/connect.php");
	switch($_GET['go']){
		// Админка
		case "admin":
			include("controllers/admin.php");
		break;
		case "admin_subject":
			include("controllers/admin_subject.php");
		break;
		// Авторизация и профиль
		case "login":
			include("views/auth/login.php");
		break;
		case "register":
			include("views/auth/register.php");
		break;
		case "profile":
			require_once("models/auth.php");
			require_once("models/subjects.php");
			require_once("models/articles.php");
			require_once("controllers/bookmarks.php");
			$user_info = GetUserInfo($connect,$_SESSION['id']);
			$bookmarks = GetUserBookmarks($connect);
			include("views/auth/profile.php");
		break;
		case "logout":
			include("controllers/logout.php");
		break;
		// Закладки
		case "bookmark_add":
			require_once("models/subjects.php");
			require_once("controllers/bookmarks.php");
			$subjId = GetSubjectIdFromArticle($connect,$_GET['id']);
			AddBookmark($connect, $_GET['id'],$subjId);
		break;
		case "bookmark_del":
			require_once("models/subjects.php");
			require_once("controllers/bookmarks.php");
			$subjId = GetSubjectIdFromArticle($connect,$_GET['id']);
			DeleteBookmark($connect, $_GET['id'],$subjId);
			if($_GET['from_profile']==1){
				header("Location: /?go=profile");
			}
			else{
				header("Location: /?go=article&id=".$_GET['id']);
			}
		break;
		// Основной сайт
		case "article":
			require_once("models/articles.php");
			require_once("models/subjects.php");
			require_once("controllers/bookmarks.php");
			$article = articles_get($connect,$_GET['id']);
			$subjId = GetSubjectIdFromArticle($connect,$_GET['id']);
			$prevArticle = GetPrevArticle($connect, $_GET['id'],$subjId);
			$nextArticle = GetNextArticle($connect, $_GET['id'],$subjId);
			$bookmarkExists = isBookmarkExists($connect,$_GET['id'],$subjId);
			include("views/main/article.php");
		break;
		case "subject":
			require_once("models/subjects.php");
			$subjects = GetSubjectList($connect,$_GET['id']);
			$name = GetSubjectName($connect,$_GET['id']);
			include("views/main/subjects.php");
		break;
		case "contacts":
			include("views/main/contacts.php");
		break;
		case "about":
			include("views/main/about.php");
		break;
		default:
			include("views/main/main.php");
		break;
	}
?>
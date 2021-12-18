<?php
	session_start();
	if (!$_SESSION['user'] || $_SESSION['user']['isAdmin']==0) {
		header('Location: /');
	}
	function GetAllSubjectsAdmin($connect){
		$products = mysqli_query($connect, "SELECT * FROM `products`");
		/*
		* Преобразовываем полученные данные в нормальный массив
		*/
		$products = mysqli_fetch_all($products);
		return $products;
	}
	
	function GetSubjectAdmin($connect, $id){
		$query = sprintf("SELECT * FROM products WHERE id=%d",(int)$id);
        $result = mysqli_query($connect, $query);
        if(!$result){
            die(mysqli_error($connect));
        }
        $product = mysqli_fetch_assoc($result);
        return $product;
	}
	
	function AddNewSubjectAdmin($connect, $title){
        $title = trim($title);
        if($title == '')
        {
            return false;
        }
        $t = "INSERT INTO products (title) VALUES ('%s')";
        $query = sprintf($t,
            mysqli_escape_string($connect, $title)
        );
        $result = mysqli_query($connect, $query);
        if(!$result)
        {
            die(mysqli_error($connect));
        }
        return true;
    }
	
	function EditSubjectAdmin($connect, $id, $title, $description, $price){
        $title = trim($title);
        $description = trim($description);
        $price = (int)$price;

        if($title == '')
        {
            return false;
        }
        $sql = "UPDATE products SET title='%s', description='%s', price = %d WHERE id='%d'";
        $query = sprintf($sql,
            mysqli_escape_string($connect, $title),
            mysqli_escape_string($connect, $description),
            mysqli_escape_string($connect, $price),
            $id
        );
        $result = mysqli_query($connect, $query);
        if(!$result)
        {
            die(mysqli_error($connect));
        }
        return mysqli_affected_rows($connect);
    }
	
	function DeleteSubjectAdmin($connect, $id)
    {
        $id = (int)$id;
        if($id==0)
        {
            return false;
        }
        $query = sprintf("DELETE FROM products WHERE id='%d'", $id);
        $result = mysqli_query($connect, $query);
        if(!$result)
        {
            die(mysqli_error($connect));
         }
         return mysqli_affected_rows($connect);
    }
	
	
	if (isset($_GET['action'])) {
		$action = $_GET['action'];
	} else {
		$action = "";
	}

	if ($action == "add") {
		if (!empty($_POST)) {
			AddNewSubjectAdmin($connect, $_POST['title']);
		}
		header('Location: /?go=admin_subject');
	}
	else if ($action == "delete") {
		if (!empty($_GET['id'])) {
			DeleteSubjectAdmin($connect, $_GET['id']);
		}
		header('Location: /?go=admin_subject');
	}
	else if ($action == "edit"){
		if (!empty($_GET['id'])){
			$product = GetSubjectAdmin($connect,$_GET['id']);
			if (!empty($_POST)) {
				EditSubjectAdmin($connect,$_GET['id'],$_POST['title'],$_POST['description'],$_POST['price']);
				header('Location: /?go=admin_subject');
			}
			include("views/admin/subjects_admin_edit.php");
		}
		else{
			header('Location: /?go=admin_subject');
		}
	}
	else{
		$admin_subj = GetAllSubjectsAdmin($connect);
		include("views/admin/subjects_admin.php");
	}

?>
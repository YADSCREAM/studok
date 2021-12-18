<?php
	function GetUserInfo($connect,$id){
		$query = sprintf("SELECT * FROM users WHERE id=%d",(int)$id);
        $result = mysqli_query($connect, $query);
        if(!$result){
            die(mysqli_error($connect));
        }
        return mysqli_fetch_assoc($result);
	}
?>
<?php
	function GetSubjectList($connect,$id)
	{
		$query = sprintf("select a.id as article_id,
						  a.title as article_title
						  from articles a
						  left join products p on p.id = a.product_id
						  where p.id = %d",(int)$id);
        $result = mysqli_query($connect, $query);
        if(!$result){
            die(mysqli_error($connect));
        }

        $n = mysqli_num_rows($result);
        $subjects = array();

        for ($i = 0; $i < $n; $i++){
            $row = mysqli_fetch_assoc($result);
            $subjects[] = $row;
        }
        return $subjects;
	}
	
	function GetSubjectName($connect,$id){
		$query = sprintf("SELECT title FROM products WHERE id=%d",(int)$id);
        $result = mysqli_query($connect, $query);
        if(!$result){
            die(mysqli_error($connect));
        }
        $res = mysqli_fetch_assoc($result);
		return $res['title'];
	}
	
	function GetSubjectIdFromArticle($connect,$id){
		$query = sprintf("SELECT product_id FROM articles WHERE id=%d",(int)$id);
        $result = mysqli_query($connect, $query);
        if(!$result){
            die(mysqli_error($connect));
        }
        $res = mysqli_fetch_assoc($result);
		return $res['product_id'];
	}

    function GetPrevArticle($connect,$id,$subjectId){
		$query = sprintf("SELECT * FROM articles WHERE product_id=%d",(int)$subjectId);
        $result = mysqli_query($connect, $query);
        if(!$result){
            die(mysqli_error($connect));
        }
        $n = mysqli_num_rows($result);
        $subjects = array();
        for ($i = 0; $i < $n; $i++){
            $row = mysqli_fetch_assoc($result);
            $subjects[] = $row;

        }
        $ids=[];
        for ($i = 0; $i < $n; $i++){
            if($subjects[$i]['id']<$id){
                array_push($ids,$subjects[$i]['id']);
            }
        }
        if(count($ids)==0)
            return -1;
        return max($ids);
	}
    function GetNextArticle($connect,$id,$subjectId){
		$query = sprintf("SELECT * FROM articles WHERE product_id=%d",(int)$subjectId);
        $result = mysqli_query($connect, $query);
        if(!$result){
            die(mysqli_error($connect));
        }
        $n = mysqli_num_rows($result);
        $subjects = array();
        for ($i = 0; $i < $n; $i++){
            $row = mysqli_fetch_assoc($result);
            $subjects[] = $row;

        }
        $ids=[];
        for ($i = 0; $i < $n; $i++){
            if($subjects[$i]['id']>$id){
                array_push($ids,$subjects[$i]['id']);
            }
        }
        if(count($ids)==0)
            return -1;
        return min($ids);
	}
?>
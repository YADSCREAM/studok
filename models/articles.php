<?php
    function articles_all($link){
        $query = "SELECT * FROM articles ORDER BY id DESC";
        $result = mysqli_query($link, $query);
        if(!$result){
            die(mysqli_error($link));
        }

        $n = mysqli_num_rows($result);
        $articles = array();

        for ($i = 0; $i < $n; $i++){
            $row = mysqli_fetch_assoc($result);
            $articles[] = $row;
        }
        return $articles;
    }
    function articles_get($link, $id_article){
        $query = sprintf("SELECT * FROM articles WHERE id=%d",(int)$id_article);
        $result = mysqli_query($link, $query);
        if(!$result){
            die(mysqli_error($link));
        }
        $article = mysqli_fetch_assoc($result);
        return $article;
    }

    function articles_new($link, $title, $date, $content, $productId)
    {
        $title = trim($title);
        $content = trim($content);

        if($title == '')
        {
            return false;
        }
        $t = "INSERT INTO articles (title, date, content, product_id) VALUES ('%s','%s','%s', %d)";
        $query = sprintf($t,
            mysqli_escape_string($link, $title),
            mysqli_escape_string($link, $date),
            mysqli_escape_string($link, $content),
            mysqli_escape_string($link, $productId)
        );

        $result = mysqli_query($link, $query);

        if(!$result)
        {
            die(mysqli_error($link));
        }

        return true;

    }

    function articles_edit($link, $id, $title, $date, $content, int $productId){
        $title = trim($title);
        $content = trim($content);
        $date = trim($date);
        $id = (int)$id;

        if($title == '')
        {
            return false;
        }
        $sql = "UPDATE articles SET title='%s', content='%s', date='%s', product_id = %d WHERE id='%d'";
        $query = sprintf($sql,
            mysqli_escape_string($link, $title),
            mysqli_escape_string($link, $content),
            mysqli_escape_string($link, $date),
            mysqli_escape_string($link, $productId),
            $id
        );
        $result = mysqli_query($link, $query);

        if(!$result)
        {
            die(mysqli_error($link));
        }
        return mysqli_affected_rows($link);
    }

    function articles_delete($link, $id)
    {
        $id = (int)$id;
        if($id==0)
        {
            return false;
        }
        $query = sprintf("DELETE FROM articles WHERE id='%d'", $id);
        $result = mysqli_query($link, $query);
        if(!$result)
        {
            die(mysqli_error($link));
         }
         return mysqli_affected_rows($link);
    }

    function articles_intro($text, $len=255)
    {
        return substr($text,0,$len);
    }

/**
 * @param $mysqli
 * @return mixed abs
 */
function getProductNames($mysqli)
{
    $sql = <<<SQL
select id, title from products
SQL;
    return $mysqli->query($sql)->fetch_all(MYSQLI_ASSOC);
}

function GetArticleName($connect,$id){
    $query = sprintf("SELECT title FROM articles WHERE id=%d",(int)$id);
    $result = mysqli_query($connect, $query);
    if(!$result){
        die(mysqli_error($connect));
    }
    $res = mysqli_fetch_assoc($result);
    return $res['title'];
}
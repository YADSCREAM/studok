<?php
    session_start();
    function isBookmarkExists($connect, $id, $subjId){
        $t = "SELECT * FROM bookmarks WHERE user_id=%d AND article_id=%d AND subject_id = %d";
            $query = sprintf($t,
                mysqli_escape_string($connect, $_SESSION['user']['id']),
                mysqli_escape_string($connect, $id),
                mysqli_escape_string($connect, $subjId)
            );
            $result = mysqli_query($connect, $query);
            if(!$result){
                die(mysqli_error($connect));
            }

            $n = mysqli_num_rows($result);
            $articles = array();

            for ($i = 0; $i < $n; $i++){
                $row = mysqli_fetch_assoc($result);
                $articles[] = $row;
            }
            return count($articles)>0;

    }

    function AddBookmark($connect, $id, $subjId){
        if ($_SESSION['user'] && !empty($id)) {
            if(!isBookmarkExists($connect, $id, $subjId))
            {
                $t = "INSERT INTO bookmarks (user_id, article_id, subject_id) VALUES ('%d','%d','%d')";
                $query = sprintf($t,
                    mysqli_escape_string($connect, $_SESSION['user']['id']),
                    mysqli_escape_string($connect, $id),
                    mysqli_escape_string($connect, $subjId)
                );
                $result = mysqli_query($connect, $query);
                if(!$result)
                {
                    die(mysqli_error($connect));
                }
            }
            header("Location: /?go=article&id=".$id);
        }
        else{
            header("Location: /");
        }
    }

    function DeleteBookmark($connect, $id, $subjId){
        if ($_SESSION['user'] && !empty($id)) {
            if(isBookmarkExists($connect, $id, $subjId))
            {
                $t = "DELETE FROM bookmarks WHERE user_id=%d AND article_id=%d AND subject_id = %d";
                $query = sprintf($t,
                    mysqli_escape_string($connect, $_SESSION['user']['id']),
                    mysqli_escape_string($connect, $id),
                    mysqli_escape_string($connect, $subjId)
                );
                $result = mysqli_query($connect, $query);
                if(!$result)
                {
                    die(mysqli_error($connect));
                }
            }
        }
        else{
            header("Location: /");
        }
    }

    function GetUserBookmarks($connect){
        if ($_SESSION['user']) {
            $query = "SELECT * FROM bookmarks WHERE user_id=".$_SESSION['user']['id'];
            $result = mysqli_query($connect, $query);
            if(!$result){
                die(mysqli_error($connect));
            }
            $n = mysqli_num_rows($result);
            $bookmarks = array();
            for ($i = 0; $i < $n; $i++){
                $row = mysqli_fetch_assoc($result);
                $bookmarks[] = $row;
            }
            return $bookmarks;
        }
        else{
            return array();
        }
    }

/* Это многострочный комментарий
       ещё одна строка комментария */


?>
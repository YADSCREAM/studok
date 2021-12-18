<?php
define('HOST', 'localhost');
define('USER', 'studok_cms_usr');
define('PASSWORD', 'TSudFbR7dD9lhCE1');
define('DATABASE', 'studok_cms');

$connect = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
mysqli_set_charset($connect, "utf8");

if (!$connect) {
    die('Error connect to database!');
}
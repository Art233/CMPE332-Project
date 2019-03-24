<?php
$dsn = 'mysql:host=localhost;dbname=332project'; //Data source Name
$username = 'root';
$password = '';
$options = array(PDO::MYSQL_ATTR_INIT_COMMAND=> 'SET NAMES utf8');

 $pdo = new PDO($dsn, $username, $password,$options);
 ?>
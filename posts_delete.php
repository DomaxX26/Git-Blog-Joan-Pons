<?php 

// TODO: Obtenir l'id enviat pel query string
$id = $_GET["id"]; //25


// TODO: Implementar la consulta
$pdo = new PDO("mysql:host=mysql-server;dbname=coffee-talks;charset-utf8" , "root" , "secret");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $pdo->prepare("SELECT * FROM article WHERE codart=:codi");
$stmt ->bindValue("codi", $id);
$stmt->execute();

$article = $stmt-> fetch();

if(!empty($codic)){

$stmt = $pdo->prepare("DELETE FROM article WHERE codart=$id");
$stmt->execute();

echo ("Article eliminat correctament");
}
?>
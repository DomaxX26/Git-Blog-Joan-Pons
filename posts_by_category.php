<?php 

// TODO: Obtenir l'id enviat pel query string
$id = $_GET["id"]; 
//Implementar la consulta
$pdo = new PDO("mysql:host=mysql-server;dbname=coffee-talks;charset-utf8" , "root" , "secret");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $stmt = $pdo->prepare("SELECT * FROM article, categoria, usuari WHERE article.codcat = categoria.codcat AND article.codusu = usuari.codusu AND categoria.codcat=:codi ORDER BY datart DESC");
 $stmt ->bindValue("codi", $id);
 $stmt->execute();

 $artcategories = $stmt-> fetchAll();
 
?>

<html>
<head>
    <title>Coffee Talk Blog</title>
</head>
<body>
<h1>Welcome to Coffee Talk Blog</h1>
<h2>En la Categoria <?=$artcategories[0]["nomcat"]?></h2>
    <ul>
        <?php foreach($artcategories as $catarticle) : ?>
            <li>
               <a href="posts_show.php?id=<?=$catarticle["codcat"]?>"><?=$catarticle["titart"]?></a> from the <?=$catarticle["nomusu"]?>
            </li>
         <?php endforeach; ?>
    </ul>
<hr>
<a href='index.php'>Home</a> || <a href='logout.php'>Logout</a>
</body>
</html>
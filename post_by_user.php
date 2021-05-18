<?php 

// TODO: Obtenir l'id enviat pel query string
$id = $_GET["id"]; 
//Implementar la consulta
$pdo = new PDO("mysql:host=mysql-server;dbname=coffee-talks;charset-utf8" , "root" , "secret");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $stmt = $pdo->prepare("SELECT * FROM article, categoria, usuari WHERE article.codcat = categoria.codcat AND article.codusu = usuari.codusu AND article.codusu=:codi ORDER BY datart DESC");
 $stmt ->bindValue("codi", $id);
 $stmt->execute();

 $articles = $stmt-> fetchAll();
 
?>

<html>
<head>
    <title>Coffee Talk Blog</title>
</head>
<body>
<h1>Welcome to Coffee Talk Blog</h1>
<!--TODO: Show posts -->

    <h2>Publicat per <?=$articles["nomusu"]?></h2>

<ul>
            <?php foreach($articles as $article) : ?>
                <li>
                    <a href="posts_show.php?id=<?=$article["codart"]?>"><?=$article["titart"]?></a> from the <?=$article["nomcat"]?>
                </li>
            <?php endforeach; ?>
        </ul>
</body>
</html>
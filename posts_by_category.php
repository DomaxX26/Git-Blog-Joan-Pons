<?php 

// TODO: Obtenir l'id enviat pel query string
$id = $_GET["id"]; 
//Implementar la consulta
require("DOMDocument.php");

 $stmt = $pdo->prepare("SELECT * FROM article, categoria, usuari WHERE article.codcat = categoria.codcat AND article.codusu = usuari.codusu AND categoria.codcat=:codi ORDER BY datart DESC");
 $stmt ->bindValue("codi", $id);
 $stmt->execute();

 $artcategories = $stmt-> fetchAll();
 
?>

<html>
<head>
    <title>Coffee Talk Blog</title>
    <link rel="stylesheet" type="text/css" href="estils.css">
</head>
<body>
<div class="body">
<h1>Welcome to Coffee Talk Blog</h1>
<?php require("footer.php") ?>
<h2>En la Categoria <?=$artcategories[0]["nomcat"]?></h2>
<div class="show_category">
    <ul>
        <?php foreach($artcategories as $catarticle) : ?>
            <li class="articulo">
               <a href="posts_show.php?id=<?=$catarticle["codcat"]?>"><?=$catarticle["titart"]?></a> from the <?=$catarticle["nomusu"]?>
            </li>
         <?php endforeach; ?>
    </ul>
</div>
</div>
</body>
</html>
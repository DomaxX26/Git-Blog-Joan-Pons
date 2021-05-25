<?php

// TODO: Obtenir l'id enviat pel query string
$id = $_GET["id"]; //25

// TODO: Implementar la consulta
$pdo = new PDO("mysql:host=mysql-server;dbname=coffee-talks;charset-utf8", "root", "secret");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $pdo->prepare("SELECT * FROM article WHERE codart=:codi");
$stmt->bindValue("codi", $id);
$stmt->execute();

$article = $stmt->fetch();

?>


<html>

<head>
    <title>Coffee Talk Blog</title>
</head>

<body>
    <h1>Welcome to Coffee Talk Blog</h1>


    <form action="posts_delete.php?id=<?= $article["codart"] ?>" method="POST">
        <p><label for="name">Vols esborrar el article?</label></p>
        <p><input type="submit" name="si" value="SI"> <input type="submit" name="no" value="NO"></p>

        <?php if ($_SERVER["REQUEST_METHOD"] === "POST") : ?>

            <!-- TODO: 2.2. Processar el formulari-->
            <?php $isValid = true; ?>

            <?php if ($isValid === true) : ?>

                <?php if (isset($_POST['si'])) : ?>

                    <!--Connexio amb la base de dades-->
                    <?php $pdo = new PDO("mysql:host=mysql-server;dbname=coffee-talks;charset-utf8", "root", "secret");
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); ?>

                    <?php if (!empty($article)) : ?>
                        <?php $stmt = $pdo->prepare("DELETE FROM article WHERE codart=:id");
                        $stmt->bindValue("id", $id);
                        $stmt->execute(); ?>

                        <p>S'ha eliminat el article correctament.</p>
                    <?php endif; ?>
                    
                <?php endif; ?>
                <?php if (isset($_POST["no"])) : ?>
                    <p>No s'ha borrat el article</p>
                <?php endif; ?>
            <?php endif; ?>
            <a href="http://localhost:8080/index.php">Torna al index</a>

        <?php endif; ?>

    </form>
</body>

</html>
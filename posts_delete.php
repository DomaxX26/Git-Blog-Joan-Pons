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




// TODO: 1. Inicialitzar variables
$isValid = false;
$isPost = false;
// TODO: 2. Comprovar el mètode de sol·licitud
    if($_SERVER["REQUEST_METHOD"]==="POST"){
    // TODO: 2.2. Processar el formulari
        $isValid = true;

        if($isValid === true){

            if($_POST["si"])

            //Connexio amb la base de dades
            $pdo = new PDO("mysql:host=mysql-server;dbname=coffee-talks;charset-utf8" , "root" , "secret");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            if(!empty($article)){
            $stmt = $pdo->prepare("DELETE FROM article WHERE codart=:id");
            $stmt-> bindValue("id", $id);
            $stmt->execute();

            echo ("Article eliminat correctament");
            }
            else{
            echo ("No s'ha borrat el article");
                }
        }

        
    
    }else{
        
    }
   
   
?>


<html>
<head>
    <title>Coffee Talk Blog</title>
</head>
    <body>
    <h1>Welcome to Coffee Talk Blog</h1>


        <form action="posts_delete.php?id=<?=$article["codart"]?>" method="POST">
            <p><label for="name">Vols esborrar el article?</label></p>
            <p><input type ="submit" name="si" value="SI"> <input type="submit" value="NO"></p>
        </form>
    </body>
</html>
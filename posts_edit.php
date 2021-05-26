<?php

// TODO: Obtenir l'id enviat pel query string
$id = $_GET["id"]; //25
// activem la gestió de sessions
session_start();
$loggedUser = $_SESSION["user"] ?? "";
// si l'usuari no ha iniciat sessió l'enviem a la pàgina de login
if (empty($loggedUser)){
   header("Location: login.php");
}

// TODO: 1. Inicialitzar variables
$isValid = false;
$isPost = false;
// TODO: 2. Comprovar el mètode de sol·licitud
    if($_SERVER["REQUEST_METHOD"]==="POST"){
    // TODO: 2.2. Processar el formulari
        $isPost = true;

        $titart = filter_input(INPUT_POST, "titart");
        $bodyart = filter_input(INPUT_POST, "bodyart");

        $isValid = true;

        //Comprovacio de que cap dels camps esta buits
        if(empty($titart)){
            $isValid = false;
        }

        if(empty($bodyart)){
            $isValid = false;
        }

        
        if($isValid === true){

            //Connexio amb la base de dades
            require("DOMDocument.php");

            $codusu = $_SESSION["user"];
            $datart = date("Y-m-d");

            //Implementacio de la consulta
            $stmt = $pdo -> prepare("UPDATE article SET titart ='$titart', bodyart = '$bodyart', datart = '$datart' WHERE  codart='$id'");

            //Asignar valors als paràmetres
            $stmt ->bindValue("titart", $titart);
            $stmt ->bindValue("bodyart", $bodyart);
            $stmt ->bindValue("datart", $datart);
			$stmt->bindValue("codi", $id);

            $stmt ->execute();
        }
    
    }else{
        require("DOMDocument.php");

        $stmt = $pdo->prepare("SELECT * FROM article WHERE codart=:codi");
		$stmt->bindValue("codi", $id);
		$stmt->execute();

		$article = $stmt->fetch();
    }

?>

<html>

<head>
	<title>Coffee Talk Blog</title>
</head>

<body>
	<h1>Welcome to Coffee Talk Blog</h1>

	<?php if ($isPost === false) : ?>

		<!--TODO: 2.1. Mostrar formulari //-->
		<form acction="post_add.php" method="post">
			<p>Titol de l'article <input type="text" name="titart" value="<?=$article['titart']?>"></p>
			<p>Cos de l'article</p>
			<textarea name="bodyart" rows="10" cols="45" placeholder="Introdueix el cos del article..."><?=$article['bodyart']?></textarea>		
			<p><input type="submit" value="Enviar"></p>
		</form>
	<?php else : ?>

		<!--TODO: 2.3.1. Mostrar errors de validació //-->
		<?php if ($isValid === true) : ?>
			<p>S'han editat el post amb exit</p>

		<?php else : ?>
			<p>No s'ha editat el post</p>
		<?php endif; ?>

	<?php endif; ?>

	<?php require("footer.php") ?>
</body>

</html>
<?php
// activem la gestió de sessions
session_start();
$loggedUser = $_SESSION["user"] ?? "";
// si l'usuari no ha iniciat sessió l'enviem a la pàgina de login
if (empty($loggedUser))
   header("Location: login.php");


// TODO: 1. Inicialitzar variables
// TODO: 2. Comprovar el mètode de sol·licitud
    
   // TODO: 2.2. Processar el formulari
    // TODO: 2.2. Obtenir les dades del formulari
    // TODO: 2.3. Validar les dades
    // TODO: 2.3. Comprovar si hi ha algún error de validació        
        // TODO: 2.3.2. Inserir en la base de dades
   
?>

<html>
<head>
    <title>Coffee Talk Blog</title>
</head>
<body>
<h1>Welcome to Coffee Talk Blog</h1>

<!--TODO: 2.1. Mostrar formulari //-->
<!--TODO: 2.3.1. Mostrar errors de validació //-->
<!--TODO: 2.3.3. Mostrar missatge de confirmació //-->
<p><a href='posts_edit.php'>Edit</a> || <a href='posts_delete.php'>Delete</a> || <a href='comments_add.php'>Add a comment</a></p>
<hr>
<a href='index.php'>Home</a> || <a href='logout.php'>Logout</a>
</body>
</html>
<?php
session_start();
$loggedUser = $_SESSION["user"] ?? "";

?>
<html>
<head>
    <title>Coffee Talk Blog</title>
</head>
<body>
    <h1>Welcome to Coffee Talk Blog</h1>
    <?php if (empty($loggedUser)) :?>
    <p>Please <a href="login.php">login</a>.</p>
    <?php else :?>
    <!--TODO: Show posts -->
        <ul>
            <li>
                <a href="">Post 1</a> by User 1 from the Category 1
            </li>
            <li>
                <a href="">Post 2</a> by User 2 from the Category 1
            </li>

        </ul>
        <p>Clic to <a href="posts_add.php">add</a> a posting.</p>
    <?php endif; ?>
</body>
</html>
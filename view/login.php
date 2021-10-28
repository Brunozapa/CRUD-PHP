<?php
include('../app/Controller/verificaLogin.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <link rel="stylesheet" href="style\login-cadastro.css">
</head>

<body>
    <div class="container-lg">
        <form action="/app/Controller/login.php" method="post">
            <h2>Login</h2>
            <input name="email" type="text" placeholder="email" required>
            <input name="senha" type="password" placeholder="senha" required>
            <button type="submit">login</button>
            <span><a href="cadastro.php">cadastre-se</a></span>
        </form>
        <div class="erro_msg">
            <p>Mensagem de erro</p>
        </div>
    </div>
</body>

</html>

<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <link rel="stylesheet" href="style\login-cadastro.css">
</head>

<body>
    <div class="container">
        <form action="..\login.php" method="post">
            <h2>Login</h2>
            <input name="email" type="text" placeholder="email">
            <input name="senha" type="password" placeholder="senha">
            <button type="submit">login</button>
            <span><a href="cadastro.php">cadastre-se</a></span>
        </form>
    </div>
</body>

</html>
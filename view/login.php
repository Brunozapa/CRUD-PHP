<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
</head>
<style>
    .container-login {
        margin: auto;
        width: 200px;
    }

    .container-login input {
        margin-bottom: 10px;
    }
</style>

<body>
    <div class="container-login">
        <form action="..\login.php" method="post">
            <h3>Login</h3>
            <input name="email" type="text" placeholder="email">
            <input name="senha" type="password" placeholder="senha">
            <button type="submit">login</button>
            <span><a href="cadastro.php">cadastra-se</a></span>
        </form>
    </div>
</body>

</html>
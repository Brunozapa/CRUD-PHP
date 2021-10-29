
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
            <button type="submit">Login</button>
            <span><a href="cadastro.php">Cadastre-se</a></span>
        </form>
        <div class="erro_msg">

        </div>
    </div>
</body>

</html>

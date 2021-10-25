
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<style>
    .container-cadastro {
        margin: auto;
        width: 200px;
    }

    .container-cadastro input {
        margin-bottom: 10px;
    }
</style>

<body>
    <div class="container-cadastro">
        <form action="..\cadastro.php" method="post">
            <h3>Cadastro</h3>
            <input name="nome" type="text" placeholder="nome">
            <input name="email" type="text" placeholder="email">
            <input name="senha" type="senha" placeholder="senha">
            <button type="submit">Cadastrar</button>
        </form>
    </div>
</body>

</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Coneexão com o banco de dados 
    include 'conexao.php';

    // Receber os dados do formulário de login 
    $nome = $_POST['nome'];
     $login = $_POST['login'];
    $senha = $_POST['senha'];
    

    try {
        $sql = "INSERT INTO usuarios (nome, login, senha) VALUES (?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt-> execute ([$nome, $login, $senha]);
        echo "Lançamentos Cadastrada com sucesso!";
        header("Location: login.php");
    } catch (PDOException $e) {
        echo "Erro ao Cadastrar Lançamentos:" . $e->getMessage();
    }

}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href= "css/estilo.css">
    <link rel="stylesheet" href= "css/estilologin.css">
    <title>Login</title>
</head>

<body>
   
    <form action="cadastro.php" method="post">
        <h2>Cadastrar novos usuarios</h2>
        <label for="usuario">Usuário:</label>
        <input type="text" id="usuario" name="nome" required><br><br>
        <label for="login">login:</label>
        <input type="text" id="login" name="login" required><br><br>
        <label for="senha">senha:</label>
        <input type="password" id="senha" name="senha" required><br><br>
        <button type="submit">Cadastrar</button> 
        <br>
        
        <br>
        
    
</form>


</body>
</html>
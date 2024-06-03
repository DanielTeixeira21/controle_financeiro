<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Coneexão com o banco de dados 
    include 'conexao.php';

    // Receber os dados do formulário de login 
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    

    // Consulta ao banco de dados para verificar as credenciais do Usuário 
    $sql = "SELECT * FROM usuarios WHERE login = ? AND  senha = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$usuario, $senha]);
    $usuarioEncontrado = $stmt->fetch();

    if ($usuarioEncontrado){
        //Usuário autenticado com sucesso
        $_SESSION['usuario'] = $usuario;
        header("Location: index.php"); //Redireciona para a página principal após
        exit();

    } else{
        // Credenciais inválidas, exibeir mensagem de erro ou redirecionar de volta
        echo "Credenciais inválidas. Por favor, tente novamente.";
    }

}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form action="login.php" method="post">
        <label for="usuario">Usuário:</label>
        <input type="text" id="usuaario" name="usuario" required><br><br>
        <label for="senha">senha:</label>
        <input type="password" id="senha" name="senha" required><br><br>
        <button type="submit">Login<button>
</form>


</body>
</html>
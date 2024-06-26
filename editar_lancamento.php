<?php
session_start();
// Verificar se o usuário está autenticado
if (!isset($_SESSION['usuario'])) {
    // Usuário não autenticaqdo, redirecionar para a página de login
    header("Location: login.php");
    exit();
}
// Página protegida
echo "Bem-vindo," . $_SESSION['usuario'];

include 'conexao.php';
if (isset($_POST['delete'])) {
    $id= $_POST['id'];
    try {
        $sql = "DELETE FROM lançamentos WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        header("Location: index.php");
        exit();
    } catch (PDOException $e) {
        echo "Erro ao excluir lançamentos:" . $e->getMessage();
    }
} 

include 'conexao.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $stmt = $conn->query("SELECT * from lançamentos where id=$id");
        $lancamento = $stmt->fetch(PDO::FETCH_ASSOC);
       
        
    } catch (PDOException $e) {
        echo "erro ao excluir lançamentos:" . $e->getMessage();
    }
}

if (isset($_POST['fixa'])) {
    $descrição = $_POST['descrição'];
    $valor = $_POST['valor'];
    $data = $_POST['data'];
    $fixa = $_POST['fixa'];
    $tipo = $_POST['tipo'];
    try {
        $sql = "UPDATE lançamentos SET descrição = ?, valor = ?,tipo = ?, data = ?, fixa = ?  WHERE id = ?";
        
        $stmt = $conn->prepare($sql);
        $stmt-> execute ([$descrição, $valor, $tipo, $data, $fixa, $id]);
        header("Location: index.php");
    } catch (PDOException $e) {
        echo "Erro ao Cadastrar Lançamentos:" . $e->getMessage();
    }

}





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href= "css/estilo.css">
<body>
    <form method='post'>
      <label>Descrição</label>  
      <input type="text" value="<?php echo $lancamento['descrição']?>" name="descrição" /><br><br>
    Valor: . <input type="number" value="<?php echo $lancamento['valor']?>" name="valor" ><br><br> 
    Data: . <input type="date" value="<?php echo $lancamento['data']?>"name= "data" ><br><br>
    <label>Tipo:<label>
    <select name= "tipo">
        <option value="entrada" <?php echo $lancamento ['tipo'] == 'entrada' ? 'selected' : '' ?>>entrada</option>
        <option value= "saida" <?php echo $lancamento ['tipo'] == 'saida' ? 'selected' : '' ?>>saida</option>
    </select>
<br></br>

<label>Fixa</label>
<select name="fixa">
    <option value="nao" <?php echo $lancamento ['fixa'] == 'nao' ? 'selected' : '' ?>>Nao</option>
    <option value= "sim" <?php echo $lancamento ['fixa'] == 'sim' ? 'selected' : '' ?>>sim</option>
</select>
<br></br>
<button type="submit">Editar Lançamento</button>
</form>
</body>
</html>
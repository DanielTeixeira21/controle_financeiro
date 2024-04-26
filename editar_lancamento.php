<?php
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
    <form>
      <label>Descrição</label>  
      <input type="text" value="<?php echo $lancamento['descrição']?>" name="" /><br><br>
    Valor: . <input type="number" value="<?php echo $lancamento['valor']?>" name="" ><br><br> 
    Data: . <input type="date" value="<?php echo $lancamento['data']?>"name= "" ><br><br>
    <label>Tipo:<label>
    <select name= "tipo">
        <option value="Entrada" <?php echo $lancamento ['tipo'] == 'entrada' ? 'selected' : '' ?>>Entrada</option>
        <option value= "Saida" <?php echo $lancamento ['tipo'] == 'saida' ? 'selected' : '' ?>>Saida</option>
    </select>
<br></br>

<label>Fixa</label>
<select name="Fixa">
    <option value="nao" <?php echo $lancamento ['fixa'] == 'nao' ? 'selected' : '' ?>>Nao</option>
    <option value= "sim" <?php echo $lancamento ['fixa'] == 'sim' ? 'selected' : '' ?>>sim</option>
</select>
<br></br>
<input type="submit" name="submit" value"Atualizar lancamento">
</form>
</body>
</html>
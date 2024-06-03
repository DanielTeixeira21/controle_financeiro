<?php
include 'conexao.php';

// Verificar se o usuário está autenticado
if (!isset($_SESSION['usuario'])) {
    // Usuário não autenticaqdo, redirecionar para a página de login
    header("Location: login.php");
    exit();
}
// Página protegida
echo "Bem-vindo," . $_SESSION['usuario'];

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
?>


<!DOCTYPE html> 
<html lang="pt-br"> 
<head> 
    <meta charset="UTF-8"> 
    <title>Controle Financeiro Pessoal</title> 
    <link rel="stylesheet" href= "css/estilo.css">
</head> 
<body>
    <h1>Controle Financeiro Pessoal</h1>
    <a href="lancamentos.php"><button>Acessar Lancamentos</button></a>
    <a href="logout.php"><button class="saida">Sair</button></a>
<?php
include 'conexao.php';

try{
    $stmt = $conn->query("SELECT *, MONTH(data) as mes, YEAR(data) as ano FROM lançamentos ORDER BY data ASC");
    $lancamentosPorMes = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $lancamentosPorMes[$row['ano']][$row['mes']][] = $row;
    }

    foreach ($lancamentosPorMes as $ano =>$meses){
        foreach ($meses as $mes => $lancamentos){
            echo "<h3>" . DateTime::createFromFormat('!m', $mes)->format('F') . " $ano</h3>";
            echo "<table border='1'>
                <tr>
                    <th>Descricao</th>
                    <th>Valor</th>
                    <th>Tipo</th>
                    <th>Data</th>
                    <th>Fixa</th>
                </tr>";
            foreach($lancamentos as $lancamentos) {
                echo "<tr class='{$lancamentos['tipo']}'>
                <td>{$lancamentos['descrição']}</td>
                <td>R$ {$lancamentos['valor']}</td>
                <td>{$lancamentos['tipo']}</td>
                <td>" . date("d/m/Y", strtotime($lancamentos['data'])) . "</td>
                <td>{$lancamentos['fixa']}</td>
                <td>
<a href='delete.php?id={$lancamentos['id']}' class='botao alerta'> Excluir</a>
<a href='delete.php?id={$lancamentos['id']}' class='botao sucesso'> Editar</a>
                    
               
                    
        
                </td>
              </tr>";
           
            }
            echo "</table><br>";
        }        

    }
} catch(PDOException $e){
    echo "Erro ao consultar lancamentos: " . $e->getMessage();
}
?>
</body>

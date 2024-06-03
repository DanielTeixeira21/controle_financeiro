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
?>
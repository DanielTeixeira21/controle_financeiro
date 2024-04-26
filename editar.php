<?php
if (isset($_POST['id'])) {
    $id = $_POST['id'];    
    header("Location: editar_lancamento.php?id=$id");
    exit();
} else {
    echo "ID do lançamento não foi recebido.";
}
?>
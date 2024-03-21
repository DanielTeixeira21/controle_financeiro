<?php
if (isset($_Post['edit'])) {
    $id = $_post['id'];
    header("Location: editr_lancamentos.php?id=$id");
    exit();
} else {
    echo "ID do lançamento não foi recebido.";
}
?>
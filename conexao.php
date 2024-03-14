<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "lançamentos";

try {
    $conn = new PDO("mysql:host=$servidor;dbname=$dbname", $usuario, $senha);
    // Define o modo de erro do PDO para exceção 
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
}   catch(PDOException $e) {
    echo "Conexão falhou: " . $e->getMessage();
}
?>

<?php
session_start();
//Destruir todas as variáveis de sessão
Session_destroy();
//Redirecionar para a página de login após o logout
header("Location: Login.php");
exit();
?>
<?php
    session_start();
    //deleta as variáveis de sessão
    unset($_SESSION['usuario']);
    //finaliza a sessão
    session_destroy();
    sleep(2); //aguarda 2 segundos
    header("location:../index.php");
?>
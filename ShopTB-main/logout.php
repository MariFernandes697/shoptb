<?php
     session_start();
     session_unset(); //Apaga os registros da função
     session_destroy(); //Destrói a sessão

     header("Location: formLogin.php");//Redireciona o usuário para a tela de Login
     exit();

?>
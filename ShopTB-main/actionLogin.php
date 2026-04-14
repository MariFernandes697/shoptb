<?php

    include "conexaoBD.php"; //Abrir aquivo para consultar banco de dados
    session_start();//Iniciar sessao

    $emailUsuario = mysqli_real_escape_string($conn, $_POST['emailUsuario']); //Filtra a entrada de dados
    $senhaUsuario = mysqli_real_escape_string($conn, $_POST['senhaUsuario']); //Filtra a entrada de dados

    // Query para buscar os dados de login
    $buscarLogin = "SELECT *
                    FROM Usuarios 
                    WHERE emailUsuario = '{$emailUsuario}'
                    AND senhaUsuario = md5('{$senhaUsuario}') ";

    // Executa a Query
    $efetuarLogin = mysqli_query($conn, $buscarLogin);

    if($registro = mysqli_fetch_assoc($efetuarLogin)){

        // Criar variáveis de sessão
        $_SESSION['idUsuario'] = $registro['idUsuario'];
        $_SESSION['nomeUsuario'] = $registro['nomeUsuario'];
        $_SESSION['emailUsuario'] = $registro['emailUsuario'];
        $_SESSION['nivelUsuario'] = $registro['nivelUsuario'];
        $_SESSION['logado'] = true;


        // Redireciona o usuario para a página inicial
        header("Location:   teste.php");
        exit();
    }
    else{
        header("Location: formLogin.php?erroLogin=dadosInvalidos");
        exit();
    }

?>

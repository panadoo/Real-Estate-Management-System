<?php
session_start();

include_once "funcoes.php";

$_SESSION["sessionmaxtime"] = time();

include 'conn.php';

if($conn->connect_error){
    echo 'Ocorreu um erro no acesso a base de dados' . $conn->connect_error;
    exit;
} 

// Verificar se os campos de login foram submetidos
if ($stm = $conn->prepare("SELECT * FROM utilizadores WHERE nome_utilizador = ? AND palavra_passe = ?")) {
    $stm->bind_param("ss", $_POST["utilizador"], $_POST["password"]);
    $stm->execute();

    $stm->store_result();

    // Após a verificação dos dados de login
    if($stm->num_rows > 0) {
        $_SESSION["login"] = 1;
        $_SESSION["browser"] = $_SERVER["HTTP_USER_AGENT"];
        echo 'Dados válidos.<br/>Sessão criada com sucesso!<br/>';
        if(!getCookie('testa_cookie'))
            //passagem da sessao por URL
            echo '<a href="validacao.php?' . htmlspecialchars(SID) . '">Página seguinte (URL)</a><br/>';
        else
            //passagem da sessao por COOKIE
            echo '<a href="validacao.php">Página seguinte (Cookie)</a>';
    } else {
        $_SESSION["login"] = 0; // Definindo $_SESSION["login"] como 0 em caso de credenciais inválidas
        echo "Os dados não são válidos. Aguarde...";
        header("Refresh: 5; url=login.php");
    }
}
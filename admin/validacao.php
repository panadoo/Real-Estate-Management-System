<?php
if(isset($_GET[session_name()]))
    session_id($_GET[session_name()]);

session_start();

if(isset($_SESSION["sessionmaxtime"]) && (time()-$_SESSION["sessionmaxtime"])>120){
    session_unset();
    session_destroy();
    echo 'A sessão expirou. Aguarde...';
    header("Refresh: 5; url=login.php");
}
else
    if(isset($_SESSION["login"]) && $_SESSION["login"] == 1 && $_SESSION["browser"] == $_SERVER["HTTP_USER_AGENT"]) {
        // Se a sessão estiver ativa e válida
        echo "A sessão está válida!<br/>";
        echo '<a href="index.php">Pagina Inicial</a>';

    } else {
        //caso não esteja ativa
        echo 'A sessão não está ativa.<br/>';
        echo '<a href="login.php">Página de login</a>';
    }
?>
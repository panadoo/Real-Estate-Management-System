<?php
if (isset($_GET[session_name()])) {
    session_id($_GET[session_name()]);
}

session_start();

if (isset($_SESSION["sessionmaxtime"]) && (time() - $_SESSION["sessionmaxtime"]) > 120) {
    session_unset();
    session_destroy();
    echo '<div class="message">A sessão expirou. Aguarde...</div>';
    header("Refresh: 5; url=login.php");
} else {
    if (isset($_SESSION["login"]) && $_SESSION["login"] == 1 && $_SESSION["browser"] == $_SERVER["HTTP_USER_AGENT"]) {
        // Se a sessão estiver ativa e válida
        echo '<div class="message">A sessão está válida!</div>';
        
        $host="localhost";
        $user="root";
        $password="mysql";
        $db="gestao_imobiliaria";
        $data=mysqli_connect($host,$user,$password,$db);

        if($data===false)
        {
            die("connection error");
        }
                
            if($_SERVER["REQUEST_METHOD"]=="POST")
            {
                $name = $_POST['utilizador'];
                $pass = $_POST['password'];

                $sql="select * from utilizadores where nome_utilizador='".$name."' AND palavra_passe='".$pass."'  ";
                $result=mysqli_query($data,$sql);
                $row=mysqli_fetch_array($result);
            }
            if($row["tipo"]=="normal")
            {
                $_SESSION['username']=$name;
                $_SESSION['tipo']="normal";

                header("refresh: 5; location:index.php");
            }
            elseif($row["tipo"]=="admin")
            {	
                $_SESSION['username']=$name;
                $_SESSION['tipo']="admin";

                header("location:./admin/index.php");
            }
    } else {
        // Caso não esteja ativa
        echo '<div class="message">A sessão não está ativa.</div>';
        echo '<div class="link"><a href="login.php">Página de login</a></div>';
    }
}
?>

<?php
session_start();

include_once "funcoes.php";

$_SESSION["sessionmaxtime"] = time();

include 'conn.php';

if ($conn->connect_error) {
    echo '<div style="color: red; text-align: center; font-size: 18px;">Ocorreu um erro ao acessar a base de dados: ' . $conn->connect_error . '</div>';
    exit;
}

// Verificar se os campos de login foram submetidos
if ($stm = $conn->prepare("SELECT * FROM utilizadores WHERE nome_utilizador = ? AND palavra_passe = ?")) {
    $stm->bind_param("ss", $_POST["utilizador"], $_POST["password"]);
    $stm->execute();

    $stm->store_result();

    // Após a verificação dos dados de login
    if ($stm->num_rows > 0) {
        $_SESSION["login"] = 1;
        $_SESSION["browser"] = $_SERVER["HTTP_USER_AGENT"];
        $message = '<div style="color: green; text-align: center; font-size: 18px;">Dados válidos.</div>';
        $message .= '<div style="text-align: center; font-size: 18px;">Sessão criada com sucesso!</div><br>';
        if (!getCookie('testa_cookie'))
            //passagem da sessao por URL
            $message .= '<div style="text-align: center; font-size: 18px;"><a href="validacao.php?' . htmlspecialchars(SID) . '">Página seguinte (URL)</a></div><br>';
        else
            //passagem da sessao por COOKIE
            $message .= '<div style="text-align: center; font-size: 18px;"><a href="validacao.php">Página seguinte (Cookie)</a></div>';
    } else {
        $_SESSION["login"] = 0; // Definindo $_SESSION["login"] como 0 em caso de credenciais inválidas
        $message = '<div style="color: red; text-align: center; font-size: 18px;">Os dados não são válidos. Aguarde...</div>';
        header("Refresh: 5; url=login.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        .container {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 80%;
            max-width: 300px;
            padding: 20px;
            background-color: #f2f2f2; /* Cor de fundo cinza claro */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            color: black; /* Cor do texto dentro do container */
        }

        .message {
            margin-bottom: 20px;
            text-align: center;
            font-size: 18px;
        }

        .link {
            text-align: center;
            font-size: 18px;
        }

        .link a {
            text-decoration: none;
        }

        .link a:hover {
            text-decoration: underline; /* Efeito de sublinhado ao passar o mouse */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="message">
            <?php echo $message; ?>
        </div>
        <div class="link">
            <?php
            if (!empty($link)) {
                echo $link;
            }
            ?>
        </div>
    </div>
</body>
</html>

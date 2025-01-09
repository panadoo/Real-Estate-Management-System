<?php
// Iniciar a sessão
session_start();

// Função para obter o tipo de utilizador
function obterTipoUtilizador($conn, $utilizador) {
    $sql = "SELECT tipo FROM utilizadores WHERE nome_utilizador = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $utilizador);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        return $row['tipo'];
    }
    return null;
}

// Verificar se o formulário de login foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectar ao banco de dados
    include 'conn.php'; // Supondo que este é o arquivo que faz a conexão com o banco de dados

    // Verificar se o utilizador e a palavra-passe foram submetidos
    if (isset($_POST['utilizador']) && isset($_POST['palavra_passe'])) {
        // Obter os dados do formulário
        $utilizador = $_POST['utilizador'];
        $palavra_passe = $_POST['palavra_passe'];

        // Consultar o banco de dados para verificar as credenciais
        $sql = "SELECT * FROM utilizadores WHERE nome_utilizador = ? AND palavra_passe = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $utilizador, $palavra_passe);
        $stmt->execute();
        $result = $stmt->get_result();

        // Verificar se o utilizador existe e se a palavra-passe está correta
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            // Definir as variáveis de sessão com base no tipo de utilizador
            $_SESSION['id_utilizador'] = $row['id_utilizador'];
            $_SESSION['nome_utilizador'] = $row['nome_utilizador'];
            $_SESSION['tipo'] = $row['tipo'];

            // Redirecionar com base no tipo de utilizador
            if ($_SESSION['tipo'] == 'admin') {
                header("Location: ./index.php"); // Caminho absoluto para a pasta admin
            } else {
                header("Location: ../user/index.php"); // Caminho absoluto para a pasta user
            }
            exit();
        } else {
            $erro = "Utilizador ou palavra-passe inválidos.";
        }

        // Fechar a consulta e a conexão com o banco de dados
        $stmt->close();
        $conn->close();
    }
}

// Verificar redirecionamento para página de registro
if (isset($_GET['action']) && $_GET['action'] == 'register') {
    if (isset($_SESSION['tipo']) && $_SESSION['tipo'] == 'admin') {
        header("Location: regista_admin.php");
    } else {
        header("Location: regista_user.php");
    }
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos_body.css">
    <link rel="stylesheet" href="estilos_login.css">
    <title>Login</title>
</head>
<body>
    <?php if (isset($erro)) echo "<p>$erro</p>"; ?>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="container">
        <div class="form-group">
            <h2><b>Login</b></h2>
            <label for="utilizador">Utilizador:</label>
            <input type="text" id="utilizador" name="utilizador" required>
        </div>
        <div class="form-group">
            <label for="palavra_passe">Palavra-passe:</label>
            <input type="password" id="palavra_passe" name="palavra_passe" required>
        </div>
        <div class="form-group">
            <input type="submit" value="Login">
            <input type="reset" value="Apagar">
            <p>Ainda não estás registado ? <a href="?action=register" class="button">Registar</a></p>
        </div>
    </form>
</body>
</html>

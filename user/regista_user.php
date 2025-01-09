<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="estilos_body.css">
    <link rel="stylesheet" href="estilos_regista.css">
</head>
<body>
    <?php include 'menu_user.php' ?>
    <div class="content-container">
        <div class="container">
            <h2>Registo de Utilizador</h2><br>
            <form method="POST" action="regista_user.php">
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" required>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="senha">Senha:</label>
                    <input type="password" id="senha" name="senha" required>
                </div>

                <div class="form-group">
                    <input type="submit" value="Registar">
                </div>
            </form>
            <?php
            // Se o formulário foi enviado, processar os dados
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Conexão com o banco de dados
                include 'conn.php';
                
                if ($conn->connect_error) {
                    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
                }

                // Obter os valores do formulário
                $nome = $_POST["nome"];
                $email = $_POST["email"];
                $senha = $_POST["senha"];

                // Preparar e executar a consulta SQL
                $sql = "INSERT INTO utilizadores (nome_utilizador, palavra_passe, email) VALUES ('$nome', '$senha', '$email')";
                if ($conn->query($sql) === true) {
                    echo "Utilizador registado com sucesso!";
                } else {
                    echo "Erro ao registar utilizador: " . $conn->error;
                }
                // Fechar a conexão com o banco de dados
                $conn->close();
            }
            ?>
        </div>
    </div>
</body>
</html>

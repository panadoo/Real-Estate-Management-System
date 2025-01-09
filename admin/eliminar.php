<link rel="stylesheet" href="estilos_body.css">
<link rel="stylesheet" href="estilos_edita_regista.css">
<?php
//session_start();
include 'login_check.php';
include "Menu_utilizadores.php";

//conexao a bd
include "conn.php";

// Verifica se ocorreu algum erro na conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Verifica se referencia foi fornecida
if (isset($_GET["referencia"])) {
    $referencia = $_GET["referencia"];
    
    $sql = "DELETE FROM imobiliaria WHERE referencia = $referencia";
    if ($conn->query($sql) === TRUE) {
        echo '<div class="content-container">
                <div class="success-container">
                    <h3>Registo eliminado com sucesso!</h3>
                </div>
            </div>';
        header("refresh:2;url=index.php");
        exit(); // Termina o script após o redirecionamento
    } else {
        echo "Erro ao eliminar do utilizador: " . $conn->error;
    }
}
// Fecha a conexão com o banco de dados
$conn->close();
?>
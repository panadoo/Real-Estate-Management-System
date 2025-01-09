<?php
include 'login_check.php';
include 'Menu_utilizadores.php';
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" 
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="estilos_body.css">
    <link rel="stylesheet" href="estilos_index_alter_delete.css">
</head>
<body>
    <div class="container">
        <?php
            // Conexão com o banco de dados MySQL
            include "conn.php";

            // Verifica se houve algum erro na conexão
            if ($conn->connect_error) {
                die("Falha na conexão: " . $conn->connect_error);
            }

            // Verifica se a referencia do imóvel foi fornecido
            if (isset($_GET["referencia"])) {
                $referencia = $_GET["referencia"];
                
                // Consulta SQL para excluir o imóvel com base na referência fornecida
                $sql = "DELETE FROM imobiliaria WHERE referencia = $referencia";
                
                // Executa a consulta
                if ($conn->query($sql) === TRUE) {
                    echo "Imóvel excluído com sucesso.";
                } else {
                    echo "Erro ao excluir o imóvel: " . $conn->error;
                }
            }

            // Consulta SQL para selecionar todos os imóveis
            $consulta = "SELECT * FROM imobiliaria";

            // Executa a consulta
            $resultado = $conn->query($consulta);

            // Verifica se a consulta retornou algum resultado
            if ($resultado->num_rows > 0) {
                // Exibe os dados de cada imóvel
                while ($imovel = $resultado->fetch_assoc()) {
                    echo "<div class='imovel'>";
                    echo "<img src='img/" . $imovel['fotografia'] . "' alt='Fotografia do Imóvel'>";
                    echo "<div class='info'>";
                    echo "<h2 class='link-preto'><a href='consultar.php?referencia=" . $imovel['referencia'] . "'>" . $imovel['titulo'].', ' . $imovel['morada'].', ' . $imovel['regiao'] . "</a></h2>";
                    echo "<p class='preco-size'><strong> €" . number_format($imovel['preco'], 2, ',', '.') . "</strong></p>";
                    echo "<p class ='p1'>T" . $imovel['quartos']. ' ' . $imovel['casas_banho'] . "m²</p>";
                    echo "<p class='descricao'>" . limitarTexto($imovel['descricao'], 19) . "</p>";
                    echo "</div>"; // Fechando a div 'info'
                    echo "<div class='botao-container'>"; // Container para os botões
                    // Adicionando o formulário para o botão Eliminar
                    echo '<form action="" method="get">';
                    echo '<a class="botao botao-editar" href="editar_imovel.php?referencia=' . $imovel['referencia'] . '">Editar</a>';
                    echo '<a class="botao botao-eliminar" href="eliminar.php?referencia=' . $imovel['referencia'] . '" onclick="return confirm(\'Tem a certeza de que pretende eliminar este registo?\')">Eliminar</a>';
                    /*echo '<input class="botao botao-eliminar" type="submit" value="Eliminar">';*/
                    echo '</form>';
                    echo "</div>"; // Fechando o container dos botões
                    echo "</div>"; // Fechando a div 'imovel'
                }
            } else {
                echo "Nenhum imóvel encontrado.";
            }

            // Fecha a conexão com o banco de dados
            $conn->close();

            // Função para limitar o número de palavras e adicionar reticências
            function limitarTexto($texto, $limite) {
                // Explode o texto em palavras
                $palavras = explode(" ", $texto);
                
                // Se o número de palavras for maior que o limite, reduz para o limite e adiciona reticências
                if (count($palavras) > $limite) {
                    $texto = implode(" ", array_slice($palavras, 0, $limite)) . "...";
                } 
                return $texto;
            }
        ?>
        <!-- Botão para retornar ao topo -->
        <?php if (!empty($_SERVER['HTTP_REFERER'])) { ?>
            <button onclick="topFunction()" id="btnTopo" alt="Topo">
                <i class="fa-solid fa-arrow-up"></i>
            </button>
        <?php } ?>

        <script>
            // Função para rolar suavemente para o topo da página
            function topFunction() {
                // Verifica se o suporte para o método de rolagem suave está disponível
                if ('scrollBehavior' in document.documentElement.style) {
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                } else {
                    // Caso contrário, rola instantaneamente para o topo
                    window.scrollTo(0, 0);
                }
            }

            // Mostrar ou ocultar o botão dependendo da posição da página
            window.onscroll = function() {
                scrollFunction();
            };

            function scrollFunction() {
                // Se a posição vertical da página for maior que 20 pixels, mostra o botão
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    document.getElementById('btnTopo').style.display = 'block';
                } else {
                    // Caso contrário, esconde o botão
                    document.getElementById('btnTopo').style.display = 'none';
                }
            }
        </script>
    </div>
</body>
</html>

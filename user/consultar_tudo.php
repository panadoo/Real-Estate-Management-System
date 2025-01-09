<?php
include "conn.php";
include 'login_check.php';
include 'menu_user.php';
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
    <link rel="stylesheet" href="estilos_consulta_tudo.css">
</head>
<body>
    <div class="container">
        <?php
            if ($conn->connect_error) {
                die("Falha na conexão: " . $conn->connect_error);
            }

            $consulta = "SELECT * FROM imobiliaria";
            $resultado = $conn->query($consulta);

            if ($resultado->num_rows > 0) {
                while ($imovel = $resultado->fetch_assoc()) {
                    echo "<div class='imovel'>";
                    echo "<img src='img/" . $imovel['fotografia'] . "' alt='Fotografia do Imóvel'>";
                    echo "<h2>" . $imovel['titulo'].', ' . $imovel['morada'].', ' . $imovel['regiao'] . "</h2>";
                    echo "<p class='preco-size'><strong>" . number_format($imovel['preco'], 2, ',', '.') . " €</strong></p>";
                    echo "<p>" . $imovel['area_propriedade'].'m² | T' . $imovel['quartos']."</p>";
                    echo "<p class='descricao'>" . $imovel['descricao'] . "</p>";
                    echo '<br>';
                    echo "<div class='caracteristicas-especificas'>";
                    echo "<h3>Características específicas:</h3>";
                    echo "<div class='caracteristicas-container'>"; // Container para características
                    echo "<ul class='caracteristicas-esquerda'>"; // Lista de características à esquerda
                    if ($imovel["andares"] > 0) {
                        $plural = ($imovel["andares"] > 1) ? "andares" : "andar";
                        echo "<li>" . $imovel["andares"] . " " . $plural . "</li>";
                    }
                    if ($imovel["quartos"] > 0) {
                        $plural = ($imovel["quartos"] > 1) ? "quartos" : "quarto";
                        echo "<li>" . $imovel["quartos"] . " " . $plural . "</li>";
                    }
                    if ($imovel["casas_banho"] > 0) {
                        $plural = ($imovel["casas_banho"] > 1) ? "casas de banho" : "casa de banho";
                        echo "<li>" . $imovel["casas_banho"] . " " . $plural . "</li>";
                    }
                    if ($imovel["garagem"] > 0) {
                        $plural = ($imovel["garagem"] > 1) ? "garagens" : "garagem";
                        echo "<li>" . $imovel["garagem"] . " " . $plural . "</li>";
                    }
                    echo "<li>Construído em " . $imovel["ano_construcao"] . "</li>";
                    echo "<li>Classe Energética: " . $imovel["classe_energetica"] . "</li>";

                    echo "<li>Área da propriedade: " . $imovel["area_propriedade"] . " m²</li>";
                    echo "</ul>"; // Fim da lista de características à esquerda

                    echo "<ul class='caracteristicas-direita'>"; // Lista de características à direita
                    echo "<li>Terraço: " . $imovel["terraco"] . "</li>";
                    echo "<li>Varanda: " . $imovel["varanda"] . "</li>";
                    echo "<li>Piscina: " . $imovel["piscina"] . "</li>";
                    echo "<li>Jardim: " . $imovel["jardim"] . "</li>";
                    echo "<li>Ar Condicionado: " . $imovel["AC"] . "</li>";
                    echo "<li>Aquecimento Central: " . $imovel["aquecimento_central"] . "</li>";
                    echo "</ul>"; // Fim da lista de características à direita
                    echo "</div>"; // Fim do container para características
                    echo "</div>"; // Fim da seção de características específicas
                    echo "</div>"; // Fecho do div 'imovel'
                }
            } else {
                echo "Nenhum imóvel encontrado.";
            }

            $conn->close();
        ?>
        <!-- Botão para voltar ao topo -->
        <?php if (!empty($_SERVER['HTTP_REFERER'])) { ?>
            <button onclick="topFunction()" id="btnTopo" alt="Topo">
                <i class="fa-solid fa-arrow-up"></i>
            </button>
        <?php } ?>

        <script>
            // Função para voltar suavemente para o topo da página
            function topFunction() {
                // Verifica se o suporte para o método de rolagem suave está disponível
                if ('scrollBehavior' in document.documentElement.style) {
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                } else {
                    // Caso contrário, volta instantaneamente para o topo
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

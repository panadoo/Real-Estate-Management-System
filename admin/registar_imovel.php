<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" 
          crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="estilos_edita_regista.css">          
<link rel="stylesheet" href="estilos_body.css">
<?php
include 'conn.php';
include 'login_check.php';
include "Menu_utilizadores.php";

// Se o formulário foi enviado, processar os dados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Processar os dados do formulário
    $titulo = $_POST["titulo"];
    $descricao = $_POST["descricao"];
    $regiao = $_POST["regiao"];
    $morada = $_POST["morada"];
    $tipo = $_POST["tipo"];
    $quartos = $_POST["quartos"];
    $casas_banho = $_POST["casas_banho"];
    $area = $_POST["area"];
    $ano = $_POST["ano"];
    $preco = $_POST["preco"];
    $foto = $_POST["foto"];
    $andares = $_POST["andares"];
    $garagem = $_POST["garagem"]; // Define garagem como NULL se estiver vazio
    $AC = $_POST["AC"];
    $aquecimento = $_POST["aquecimento"];
    $piscina = $_POST["piscina"];
    $jardim = $_POST["jardim"];
    $terraco = $_POST["terraco"];
    $varanda = $_POST["varanda"];
    $classe_energetica = $_POST["classe_energetica"];

    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Preparar e executar a consulta SQL
    $sql = "INSERT INTO imobiliaria (titulo, descricao, morada, preco, regiao, fotografia, tipo, area_propriedade,
             quartos, casas_banho, ano_construcao, andares, garagem, AC, aquecimento_central, piscina, jardim, terraco, varanda, classe_energetica) VALUES 
            ('$titulo','$descricao', '$morada', '$preco', '$regiao', '$foto', '$tipo', '$area', '$quartos', '$casas_banho', '$ano', '$andares',
             ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isssssss", $garagem, $AC, $aquecimento, $piscina, $jardim, $terraco, $varanda, $classe_energetica);
    if ($stmt->execute() === true) {
        echo '<div class="content-container">
                <div class="success-container">
                    <h3>Imóvel registado com sucesso!</h3>
                </div>
            </div>';
        header("refresh:2;url=index.php");
        exit();
    } else {
        echo '<div class="content-container">
                <div class="success-container">
                    <h3>Erro ao registar Imóvel' . $conn->error;'</h3>
                </div>
            </div>';
        header("refresh:2;url=index.php");
        exit();
    }
    // Fechar a conexão com o banco de dados
    $stmt->close();
    $conn->close();
}
?>


<body>
    <div class="content-container">
        <div class="container">
            <h2>Registo de Imóvel</h2>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

            <div class="form-group">
                    <label for="regiao">Título:</label>
                    <input type="text" id="titulo" name="titulo" required>
                </div>
                
                <div class="form-group">
                    <label for="descricao">Descrição:</label>
                    <textarea type="text" id="descricao" name="descricao" required></textarea>
                </div>
                
                <div class="form-group">
                    <label for="regiao">Região:</label>
                    <input type="text" id="regiao" name="regiao" required>
                </div>

                <div class="form-group">
                    <label for="morada">Morada:</label>
                    <input type="text" id="morada" name="morada" required>
                </div>

                <div class="form-group">
                    <label for="tipo">Tipo:</label>
                    <input type="text" id="tipo" name="tipo" required>
                </div>

                <div class="form-group">
                    <label for="quartos">Número de quartos:</label>
                    <input type="number" id="quartos" name="quartos" required>
                </div>
                
                <div class="form-group">
                    <label for="casas_banho">Número de casas de banho:</label>
                    <input type="number" id="casas_banho" name="casas_banho" required>
                </div>

                <div class="form-group">
                    <label for="area">Área do imóvel:</label>
                    <input type="number" id="area" name="area" required>
                </div>

                <div class="form-group">
                    <label for="data">Ano de Construção:</label>
                    <input type="number" id="ano" name="ano" min="1900" max="2100" required>
                </div>

                <div class="form-group">
                    <label for="preco">Preço:</label>
                    <input type="number" id="preco" name="preco" required>
                </div>

                <div class="form-group">
                    <label for="foto">Fotografia:</label>
                    <input type="file" id="foto" name="foto" accept="image/*" required>
                </div>

                <div class="form-group">
                    <label for="garagem">Garagem:</label>
                    <input type="number" id="garagem" name="garagem" required>
                </div>

                <div class="form-group">
                    <label for="garagem">Andares:</label>
                    <input type="number" id="andares" name="andares" required>
                </div>

                <div class="custom-radio">
                    <label>Ar condicionado:</label><br>
                        <div class="radio_select">
                            <input type="radio" id="AC-sim" name="AC" value="sim" required>
                            <label for="AC-sim">Sim</label>
                            <input type="radio" id="AC-nao" name="AC" value="nao" required>
                            <label for="AC-nao">Não</label><br>
                        </div>
                </div>

                <div class="custom-radio">
                    <label>Aquecimento central:</label><br>
                        <div class="radio_select">
                            <input type="radio" id="aquecimento-sim" name="aquecimento" value="sim" required>
                            <label for="aquecimento-sim">Sim</label>
                            <input type="radio" id="aquecimento-nao" name="aquecimento" value="nao" required>
                            <label for="aquecimento-nao">Não</label><br>
                        </div>
                </div>

                <div class="custom-radio">
                    <label>Piscina:</label><br>
                        <div class="radio_select">
                            <input type="radio" id="piscina-sim" name="piscina" value="sim" required>
                            <label for="piscina-sim">Sim</label>
                            <input type="radio" id="piscina-nao" name="piscina" value="nao" required>
                            <label for="piscina-nao">Não</label><br>
                        </div>
                </div>

                <div class="custom-radio">
                    <label>Jardim:</label><br>
                        <div class="radio_select">
                            <input type="radio" id="jardim-sim" name="jardim" value="sim" required>
                            <label for="jardim-sim">Sim</label>
                            <input type="radio" id="jardim-nao" name="jardim" value="nao" required>
                            <label for="jardim-nao">Não</label><br>
                        </div>
                </div>

                <div class="custom-radio">
                    <label>Terraço:</label><br>
                        <div class="radio_select">
                            <input type="radio" id="terraco-sim" name="terraco" value="sim" required>
                            <label for="terraco-sim">Sim</label>
                            <input type="radio" id="terraco-nao" name="terraco" value="nao" required>
                            <label for="terraco-nao">Não</label><br>
                        </div>
                </div>

                <div class="custom-radio">
                    <label>Varandas:</label><br>
                        <div class="radio_select">
                            <input type="radio" id="varanda-sim" name="varanda" value="sim" required>
                            <label for="varanda-sim">Sim</label>
                            <input type="radio" id="varanda-nao" name="varanda" value="nao" required>
                            <label for="varanda-nao">Não</label><br>
                        </div>
                </div>

                <div class="form-group">
                    <label for="classe_energetica">Classe Energética:</label>
                    <div class="radio_select">
                    <select id="classe_energetica" name="classe_energetica" required>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                    </select>
                    </div>                    
                </div>
                <p class="aviso">*todos os campos são obrigatórios</p>
                <div class="form-group">
                    <input type="submit" value="Registar">
                </div>
            </form>
        </div>

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
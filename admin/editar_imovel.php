<!DOCTYPE html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" 
          crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="estilos_body.css">
<link rel="stylesheet" href="estilos_edita_regista.css">

<?php
include 'conn.php';
include 'login_check.php';
include 'Menu_utilizadores.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['referencia']) && is_numeric($_POST['referencia'])) {
        
        // Processar os dados do formulário
        $referencia = $_POST['referencia'];
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
        $aquecimento = $_POST["aquecimento_central"];
        $piscina = $_POST["piscina"];
        $jardim = $_POST["jardim"];
        $terraco = $_POST["terraco"];
        $varanda = $_POST["varanda"];
        $classe_energetica = $_POST["classe_energetica"];

        if ($conn->connect_error) {
            die("Erro na conexão com a base de dados: " . $conn->connect_error);
        }

        $sql = "UPDATE imobiliaria SET titulo='$titulo', descricao='$descricao', morada='$morada',
         preco=$preco, regiao='$regiao', fotografia='$foto', tipo='$tipo', area_propriedade=$area,
          quartos=$quartos, casas_banho=$casas_banho, ano_construcao=$ano, andares=$andares, garagem=$garagem,
           AC='$AC', aquecimento_central='$aquecimento', piscina='$piscina', jardim='$jardim', terraco='$terraco',
            varanda='$varanda', classe_energetica='$classe_energetica' WHERE referencia=$referencia";

        if ($conn->query($sql) === TRUE) {
            echo '<div class="content-container">
                    <div class="success-container">
                        <h3>Registo alterado com sucesso!</h3>
                    </div>
                </div>';
            header("refresh:2;url=index.php");
            exit(); // Termina o script após o redirecionamento
        } else {
            echo '<div class="content-container">
                    <div class="success-container">
                        <h3>Erro ao alterar o registo</h3>
                    </div>
                </div>';
            header("refresh:2;url=index.php");
            exit();
        }

        $conn->close();
    } else {
        echo "ID de registo inválido.";
    }
} else {
    if (isset($_GET['referencia']) && is_numeric($_GET['referencia'])) {
        $referencia = $_GET['referencia'];

        include 'conn.php';

        if ($conn->connect_error) {
            die("Erro na conexão com a base de dados: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("SELECT * FROM imobiliaria WHERE referencia = ?");
        $stmt->bind_param("i", $referencia);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
?>

<head>
    
</head>
<body>
    <div class="content-container">
        <div class="container">
            <h2>Registo de Imóvel</h2>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

                <input type="hidden" name="referencia" value="<?php echo $referencia; ?>">
                <div class="form-group">
                    <label for="titulo">Título:</label>
                    <input type="text" id="titulo" name="titulo" value="<?php echo $row['titulo']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="descricao">Descrição:</label>
                    <textarea id="descricao" name="descricao" required><?php echo $row['descricao']; ?></textarea>
                </div>

                <div class="form-group">
                    <label for="regiao">Região:</label>
                    <input type="text" id="regiao" name="regiao" value="<?php echo $row['regiao']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="morada">Morada:</label>
                    <input type="text" id="morada" name="morada" value="<?php echo $row['morada']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="tipo">Tipo:</label>
                    <input type="text" id="tipo" name="tipo" value="<?php echo $row['tipo']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="quartos">Número de quartos:</label>
                    <input type="number" id="quartos" name="quartos" value="<?php echo $row['quartos']; ?>"requied>
                </div>
                
                <div class="form-group">
                    <label for="casas_banho">Número de casas de banho:</label>
                    <input type="number" id="casas_banho" name="casas_banho" value="<?php echo $row['casas_banho']; ?>"requied>
                </div>

                <div class="form-group">
                    <label for="area">Área do imóvel:</label>
                    <input type="text" id="area" name="area" value="<?php echo $row['area_propriedade']; ?>"requied>
                </div>

                <div class="form-group">
                    <label for="ano">Ano de Construção:</label>
                    <input type="number" id="ano" name="ano" value="<?php echo $row['ano_construcao']; ?>" min="1900" max="2100"requied>
                </div>

                <div class="form-group">
                    <label for="preco">Preço:</label>
                    <input type="number" id="preco" name="preco" value="<?php echo $row['preco']; ?>"requied>
                </div>

                <div class="form-group">
                    <label for="foto">Fotografia:</label>
                    <input type="file" id="foto" name="foto" accept="image/*" required>
                </div>

                <div class="form-group">
                    <label for="garagem">Garagem:</label>
                    <input type="number" id="garagem" name="garagem" value="<?php echo $row['garagem']; ?>"requied>
                </div>

                <div class="form-group">
                    <label for="andares">Andares:</label>
                    <input type="number" id="andares" name="andares" value="<?php echo $row['andares']; ?>"requied>
                </div>

                <div class="custom-radio">
                    <label>Ar condicionado:</label><br>
                    <div class="radio_select">
                        <input type="radio" id="AC-sim" name="AC" value="sim" <?php echo ($row['AC'] == 'sim') ? 'checked' : ''; ?> required>
                        <label for="AC-sim">Sim</label>
                        <input type="radio" id="AC-nao" name="AC" value="nao" <?php echo ($row['AC'] == 'nao') ? 'checked' : ''; ?> required>
                        <label for="AC-nao">Não</label><br>
                    </div>
                </div>

                <div class="custom-radio">
                    <label>Aquecimento central:</label><br>
                    <div class="radio_select">
                        <input type="radio" id="aquecimento-sim" name="aquecimento_central" value="sim" <?php echo ($row['aquecimento_central'] == 'sim') ? 'checked' : ''; ?> required>
                        <label for="aquecimento-sim">Sim</label>
                        <input type="radio" id="aquecimento-nao" name="aquecimento_central" value="nao" <?php echo ($row['aquecimento_central'] == 'nao') ? 'checked' : ''; ?> required>
                        <label for="aquecimento-nao">Não</label><br>
                    </div>
                </div>

                <div class="custom-radio">
                    <label>Piscina:</label><br>
                    <div class="radio_select">
                        <input type="radio" id="piscina-sim" name="piscina" value="sim" <?php echo ($row['piscina'] == 'sim') ? 'checked' : ''; ?> required>
                        <label for="piscina-sim">Sim</label>
                        <input type="radio" id="piscina-nao" name="piscina" value="nao" <?php echo ($row['piscina'] == 'nao') ? 'checked' : ''; ?> required>
                        <label for="piscina-nao">Não</label><br>
                    </div>
                </div>

                <div class="custom-radio">
                    <label>Jardim:</label><br>
                    <div class="radio_select">
                        <input type="radio" id="jardim-sim" name="jardim" value="sim" <?php echo ($row['jardim'] == 'sim') ? 'checked' : ''; ?> required>
                        <label for="jardim-sim">Sim</label>
                        <input type="radio" id="jardim-nao" name="jardim" value="nao" <?php echo ($row['jardim'] == 'nao') ? 'checked' : ''; ?> required>
                        <label for="jardim-nao">Não</label><br>
                    </div>
                </div>

                <div class="custom-radio">
                    <label>Terraço:</label><br>
                    <div class="radio_select">
                        <input type="radio" id="terraco-sim" name="terraco" value="sim" <?php echo ($row['terraco'] == 'sim') ? 'checked' : ''; ?> required>
                        <label for="terraco-sim">Sim</label>
                        <input type="radio" id="terraco-nao" name="terraco" value="nao" <?php echo ($row['terraco'] == 'nao') ? 'checked' : ''; ?> required>
                        <label for="terraco-nao">Não</label><br>
                    </div>
                </div>

                <div class="custom-radio">
                    <label>Varandas:</label><br>
                    <div class="radio_select">
                        <input type="radio" id="varanda-sim" name="varanda" value="sim" <?php echo ($row['varanda'] == 'sim') ? 'checked' : ''; ?> required>
                        <label for="varanda-sim">Sim</label>
                        <input type="radio" id="varanda-nao" name="varanda" value="nao" <?php echo ($row['varanda'] == 'nao') ? 'checked' : ''; ?> required>
                        <label for="varanda-nao">Não</label><br>
                    </div>
                </div>

                <div class="form-group">
                    <label for="classe_energetica">Classe Energética:</label>
                    <div class="radio_select">
                        <select id="classe_energetica" name="classe_energetica" required>
                            <option value="A" <?php echo ($row['classe_energetica'] == 'A') ? 'selected' : ''; ?>>A</option>
                            <option value="B" <?php echo ($row['classe_energetica'] == 'B') ? 'selected' : ''; ?>>B</option>
                            <option value="C" <?php echo ($row['classe_energetica'] == 'C') ? 'selected' : ''; ?>>C</option>
                        </select>
                    </div>                    
                </div>

                <div class="form-group">
                    <input type="submit" value="Atualizar">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
<?php
        } else {
            echo "Imóvel não encontrado.";
        }
        $stmt->close();
        $conn->close();
    } else {
        echo "ID de referência inválido.";
    }
}
?>

<?php if (!empty($_SERVER['HTTP_REFERER'])): ?>
    <button onclick="topFunction()" id="btnTopo" alt="Topo">
        <i class="fa-solid fa-arrow-up"></i>
    </button>
<?php endif; ?>

<script>
    function topFunction() {
        if ('scrollBehavior' in document.documentElement.style) {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        } else {
            window.scrollTo(0, 0);
        }
    }

    window.onscroll = function() {
        scrollFunction();
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById('btnTopo').style.display = 'block';
        } else {
            document.getElementById('btnTopo').style.display = 'none';
        }
    }
</script>
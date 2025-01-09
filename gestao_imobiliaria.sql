CREATE DATABASE  IF NOT EXISTS `gestao_imobiliaria` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `gestao_imobiliaria`;
-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: gestao_imobiliaria
-- ------------------------------------------------------
-- Server version	8.0.37

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `imobiliaria`
--

DROP TABLE IF EXISTS `imobiliaria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `imobiliaria` (
  `referencia` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) DEFAULT NULL,
  `descricao` text,
  `morada` varchar(80) DEFAULT NULL,
  `preco` int DEFAULT NULL,
  `regiao` varchar(45) DEFAULT NULL,
  `fotografia` varchar(255) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `area_propriedade` int DEFAULT NULL,
  `quartos` int DEFAULT NULL,
  `casas_banho` int DEFAULT NULL,
  `ano_construcao` year DEFAULT NULL,
  `andares` int DEFAULT NULL,
  `garagem` int DEFAULT NULL,
  `AC` varchar(15) DEFAULT NULL,
  `aquecimento_central` varchar(15) DEFAULT NULL,
  `piscina` varchar(15) DEFAULT NULL,
  `jardim` varchar(15) DEFAULT NULL,
  `classe_energetica` varchar(1) DEFAULT NULL,
  `terraco` varchar(15) DEFAULT NULL,
  `varanda` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`referencia`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imobiliaria`
--

LOCK TABLES `imobiliaria` WRITE;
/*!40000 ALTER TABLE `imobiliaria` DISABLE KEYS */;
INSERT INTO `imobiliaria` VALUES (1,'Apartamento T3 à venda','Situado no coração do Estoril, uma localidade deslumbrante e exclusiva entre Lisboa e Cascais, descubra este sofisticado Apartamento T3 de Luxo.\r\n\r\nCom um esplêndido terraço privativo e uma convidativa piscina aquecida, esta propriedade representa uma oportunidade única, seja para uma experiência de vida ímpar ou para investimento numa das áreas mais procuradas de Portugal.\r\n\r\nInserido no edifício General Carmona Premium Cascais, este exclusivo Apartamento T3 no centro do Estoril, é uma joia rara com 190 m2 de área bruta privativa.\r\n\r\nSituado num condomínio com apenas quatro unidades, este lar é um refúgio de serenidade e luxo. Com um deslumbrante jardim privativo, piscina aquecida e 3 lugares de garagem, oferece um estilo de vida inigualável.\r\n\r\nO apartamento possui 231 m2 de Área Bruta e 159m2 de Área Útil, distribuída do seguinte modo:\r\n\r\n• Ao entrar, é recebido por um elegante corredor que conduz a uma ampla sala de estar e jantar (34,38 m2), aberta para a cozinha.\r\n• A cozinha (23,43 m2), em open space e totalmente equipada, inclui um frigorífico para vinhos, perfeito para os amantes de enologia.\r\n• A Master Suite, verdadeiramente imponente, estende-se por uma generosa área de 40 m², distribuídos por: 19,32 m² no quarto, um closet amplo de 12 m², e uma elegante casa de banho de 8,60 m², criando um ambiente de conforto e sofisticação.\r\n• A Segunda Suíte apresenta uma área de 15 m², complementada por um Closet de 4,82 m² e uma Casa de Banho de 5,39 m².\r\n• Um Quarto com 16,26 m2 que também pode servir como escritório, mais uma casa de banho completa de serviço geral.\r\n• Espaço exterior privativo com 212 m², que inclui um esplêndido jardim, zona para refeições ao ar livre, uma piscina aquecida, perfeita para relaxamento em qualquer estação do ano, e uma área de solário com deck de madeira, proporcionando um ambiente sereno e harmonioso.\r\n• Garagem privativa com 3 lugares de garagem.\r\n\r\nO condomínio General Carmona Premium Cascais prima pela arquitetura e elevada qualidade dos seus acabamentos premium, tais como:\r\n\r\n• Piso radiante nas casas de banho.\r\n• Ar condicionado em todas as divisões.\r\n• Bomba de calor eficiente para aquecimento da piscina.\r\n• Eletrodomésticos de última geração.\r\n• Pavimentos de madeira Weitzer Parkett e cerâmica Geotiles e papel de parede texturizado Veskom Ketoy.\r\n• Caixilharia em oscilo-batente com corte térmico e vidros duplos.\r\n• Móveis lacados a branco com acabamento em carvalho envelhecido.\r\n• Tampos das bancadas de cozinha e dos móveis das casas de banho em Silestone.\r\n• Torneiras Hansgrohe ou Bruma.\r\n\r\nNas proximidades, situam-se algumas das mais belas praias de Portugal, incluindo a famosa Praia do Tamariz, e jardins encantadores que envolvem o icónico Casino Estoril. Além disso, a zona é servida por uma variedade de escolas conceituadas, restaurantes famosos, lojas de luxo e infraestruturas de qualidade, como campos de golfe e clubes de ténis, tornando-a ideal para um estilo de vida sofisticado e confortável.\r\n\r\nA localização beneficia de excelentes acessos rodoviários e transportes públicos. Lisboa e o Aeroporto Humberto Delgado estão a apenas 30 minutos de distância. A Estação de Comboios do Estoril situa-se a uma curta caminhada.\r\n\r\nNeste novo condomínio, descubra um padrão elevado de exclusividade e bom gosto, idealizado para quem valoriza conforto, privacidade e uma localização premium no coração do Estoril. Situado a uma curta distância das praias e do mar, este é o lugar perfeito para quem deseja um estilo de vida distinto e sofisticado. Venha conhecer!','Av. General Carmona A',1860000,'Cascais e Estoril, Lisboa','moradia_banda.png','Apartamento',231,3,3,2018,5,1,'nao','sim','nao','sim','A','sim','nao'),(2,'independente','Morar perto de Lisboa, Cascais e Sintra e poder desfrutar da qualidade de vida num resort de golf, onde as zonas verdes e a tranquilidade do campo proporcionam uma qualidade de vida invejável, é o que lhe propomos.\r\n\r\nNo Oeiras Golf & Residence encontra esta moradia de luxo com Tipologia T5, acabada de construir (2021), com vista espetacular, jardim, piscina e espaço para acolher uma família grande.\r\n\r\nCom uma localização privilegiada, mesmo em frente ao campo de Golf, foi projetada de modo a enquadrar-se com a paisagem verde envolvente, tirando partido do amplo lote (1.400 m²).\r\n\r\nDistinguindo-se pela sua arquitetura contemporânea, acabamentos modernos e construção de elevado padrão de qualidade, privilegiando o conforto, a moradia foi pensada de modo a tirar partido do espaço e da luz envolvente. Nesse contexto, foram utilizadas cores neutras, claras, pavimento em madeira, armários em branco lacado, acentuando a sua versatilidade devido à sua natureza e elegância, pensada para acomodar os mais diversos tipos de decoração. \r\n\r\nA Moradia está implantada num lote de terreno de 1 400 m² e tem uma área de construção de 490 m², distribuída por 2 pisos, do seguinte modo: \r\n\r\nÁrea Exterior:\r\n• Ampla zona ajardinada com 815 m²;\r\n• Piscina com 30 m² e área de solário em deck de madeira (45,6 m²);\r\n• Área de estacionamento coberta para 2 viaturas e amplo logradouro com espaço para mais estacionamento.\r\n\r\nPiso Superior:\r\n• Hall de entrada (17,4 m²) com ligação a uma escadaria/hall no piso inferior com duplo pé direito (21,3 m²);\r\n• Quarto/escritório com 14 m²;\r\n• Suíte principal (18,65 m²) com Closet (4,63 m²), WC (13,2 m²) e varanda com vista sobre o golf (2,5 m²);\r\n• Quarto (17,35 m²) com vista sobre o golf;\r\n• Quarto (14,9 m²) com varanda (2,5 m²), com vista sobre o golf;\r\n• Quarto (14,8 m²) com Closet (4,63 m²), WC (13,2 m²) e varanda (2,5 m²);\r\n• WC (6 m²);\r\n• WC (6,1 m²);\r\n\r\nPiso Inferior:\r\n• Sala de Estar (40,4 m²);\r\n• Sala de Jogos (18 m²);\r\n• Sala de Jantar (22,85 m²);\r\n• Cozinha (22,1 m²) totalmente equipada: placa de indução, exaustor de teto, forno, micro ondas, máquina de lavar loiça, frigorifico e congelador encastrados;\r\n• Lavandaria com 5,60 m²;\r\n• Área Técnica com 11 m²;\r\n• Lavabo social (2,8 m²);\r\n\r\nCobertura:\r\n• Zona onde estão instalados os painéis solares.\r\n\r\nO imóvel possui acabamentos de luxo, pré-instalação de ar condicionado, painéis solares, bomba de calor, isolamento térmico e acústico, vidros duplos, cortinas elétricas, etc. \r\n\r\nO Oeiras Golf & Residence, localizado no concelho de Oeiras junto ao Taguspark, encontra-se a poucos minutos de Lisboa, bem como das praias da linha do Estoril.\r\n\r\nO empreendimento contempla componentes paisagísticas, ambientais, de lazer e desporto únicas, com destaque para o Campo de Golf (com 9 buracos e expansão futura para 18).\r\n\r\nExcelente oportunidade para habitar e desfrutar do melhor que a vida tem ou para investir. Contacte-me e visite!','rua Carreira de Tiro, 57',3395000,'Oeiras Golf, Barcarena, Lisboa','Moradia_geminada.png','Moradia',490,5,4,2021,3,2,'sim','nao','sim','nao','A','sim','sim'),(3,'Moradia geminada','Em Oeiras, Porto Salvo, na localidade residencial e tranquilo de Leceia, encontra esta moradia geminada T3, que oferece vistas deslumbrantes para o mar e a Serra de Sintra, bem como para a área verde envolvente.\n\nA zona, um loteamento urbano recente e moderno, o Bairro do Outeiro, fica situado entre a vila de Barcarena, o Tagus Park e o Oeiras Golf.\n\nA moradia possui acabamentos de qualidade, 3 quartos, sendo 1 em suíte, uma garagem ampla, piscina, jardim e zona de lazer.\n\nO imóvel está implantado num lote de terreno com 339 m² e possui 183 m² de área bruta de construção, distribuída por 2 pisos e garagem/anexo, da seguinte forma:\n\nPiso 1:\n• Sala espaçosa (35,35 m²) com lareira e janela panorâmica de 7m que dá acesso a um amplo jardim com piscina.\n• Cozinha (10 m²) em semi open space com a sala, equipada com eletrodomésticos Bosch, frigorífico americano LG com wifi, garrafeira elétrica, lava-loiça Rodi, torneira Franke, bancada Silestone e armários lacados com ampla arrumação. \n• Área técnica/Lavandaria (2,2 m²) com equipamentos Bosch, armário de arrumos, depósito de água de 300L ligado a painéis solares e gravador de videovigilância.\n• Hall de entrada (6,14 m²) com porta blindada Portrisa, vista para jardim de inverno, armário técnico/roupeiro.\n• WC Social (2,1 m²) com design moderno e equipamentos de qualidade.\n• Escada em madeira de carvalho para o piso superior.\n\nPiso 2:\n• Hall de acesso aos quartos (4,75 m²) com varanda e rolos japoneses.\n• Suite com todas as comodidades dos quartos, janela para acesso à varanda e WC privativo (3,5 m²).\n• 2 Quartos (10 m² e 9,4 m²) com roupeiros desenhados à medida e uma varanda (3,45 m²);\n• WC com equipamentos modernos, banheira estilo francês, duche Stoneshale, torneiras Bruma;\n\nExterior:\n• Deck compósito (26 m²) em torno da piscina de sal, com cobertura elétrica e bomba de calor.\nGaragem/anexo com 30 m² e pré-instalação para wall box.\n• Jardim (157 m²) cuidadosamente planeado com sistema de rega automática e iluminação exterior.\n\nCaracterísticas:\n• Ar condicionado Mitsubishi em todas as divisões.\n• Domótica Legrand Valena Life.\n• Lareira com recuperador de calor.\n• Pavimento em vinílico impermeável no piso social, pavimento flutuante Aquastop nos quartos e piso cerâmico Pavigrés nos WCs.\n• Cortinados e estores elétricos.\n• Caixilharias e vidros duplos Guardian Sun.\n• Tomadas USB e RJ45/LAN em todos os quartos.\n• Portão automático, sistema de videovigilância e alarme AJAX.\n• Aquecimento solar das águas sanitárias.\n\nEsta propriedade combina elegância, conforto e tecnologia avançada, ideal para quem valoriza qualidade e uma vida tranquila com vistas magníficas.\n\nFica localizada a 15 minutos de carro de Lisboa, Cascais ou Sintra. Próxima dos parques empresariais (Tagus Park, Lagoas Parque e Quinta da Fonte), escolas internacionais, a 5 minutos do Oeiras Parque, junto ao Oeiras Golf & Residence e com rápido acesso às praias da linha de Lisboa-Cascais.\n\nMarque já uma visita e venha conhecer a sua próxima casa!','Rua Camilo de Oliveira, 14',1150000,'Porto Salvo, Oeiras, Lisboa','apartamento_t3.png','Moradia',184,3,3,2022,23,3,'nao','sim','nao','sim','C','sim','nao'),(4,'Moradia ','Moradia em bandaMoradia em bandaMoradia em bandaMoradia em bandaMoradia em bandaMoradia em bandaMoradia em bandaMoradia em bandaMoradia em banda','Rua dos Paióis, 11Rua dos Paióis, 11Rua dos Paióis, 11',24,'Caldas da Rainha','hasbulla.jpeg','apartamento',4,132,2,2000,2,41,'sim','nao','nao','nao','B','nao','nao');
/*!40000 ALTER TABLE `imobiliaria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utilizadores`
--

DROP TABLE IF EXISTS `utilizadores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `utilizadores` (
  `id_utilizador` int NOT NULL AUTO_INCREMENT,
  `nome_utilizador` varchar(45) NOT NULL,
  `email` varchar(70) NOT NULL,
  `palavra_passe` varchar(15) NOT NULL,
  `tipo` text,
  PRIMARY KEY (`id_utilizador`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilizadores`
--

LOCK TABLES `utilizadores` WRITE;
/*!40000 ALTER TABLE `utilizadores` DISABLE KEYS */;
INSERT INTO `utilizadores` VALUES (2,'bras','bras@gmail.com','bras','admin'),(3,'eva','eva@gmail.com','eva','normal');
/*!40000 ALTER TABLE `utilizadores` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-06-28 12:54:49

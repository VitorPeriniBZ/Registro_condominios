SET time_zone = "+00:00";


CREATE TABLE IF NOT EXISTS `informacoes` (
  `id` int(110) NOT NULL AUTO_INCREMENT,
  `nome_condominio` varchar(50) NOT NULL,
  `cnpj` varchar(14) NOT NULL,
  `contato_sindico` varchar(11) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `rua` varchar(50) NOT NULL,
  `bairro` varchar(30) NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `telefone` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
)
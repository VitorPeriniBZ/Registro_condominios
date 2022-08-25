CREATE TABLE `users` (
  `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
    

);

CREATE TABLE `informacoes`(
    `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `nome_sindico` varchar(50) NOT NULL,
    `nome_condominio`varchar(50) NOT NULL,
    `cnpj`varchar(18) NOT NULL,
    `contato_sindico`varchar(11) NOT NULL,
    `cep` varchar(50) NOT NULL,
    `rua` varchar(50) NOT NULL,
    `bairro` varchar(50) NOT NULL,
    `cidade` varchar(50) NOT NULL,
    `estado` varchar(30) NOT NULL,
    `telefone` varchar(11) NOT NULL,
    `info` varchar(200) NOT NULL,
    `horario` varchar(30) NOT NULL,
    `servico` varchar(20) NOT NULL
);

CREATE TABLE `historico`(
    `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `user_id` int NOT NULL, 
    `info_id` int NOT NULL, 
    foreign key (`user_id`) references `users`(`id`),
    foreign key (`info_id`) references `informacoes`(`id`)
);

CREATE TABLE `statuses` (
    `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `name` varchar(20) NOT NULL
);

CREATE TABLE `inf_stat_user`(
    `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `info_id` int NOT NULL,
    `status_id` int NOT NULL,
    `user_id` int NOT NULL,
    foreign key (`info_id`) references `informacoes`(`id`),
    foreign key (`status_id`) references `statuses`(`id`),
    foreign key (`user_id`) references `users`(`id`)
);

CREATE TABLE `servicos`(
    `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `name` varchar(20) NOT NULL
);

CREATE TABLE `info_serv` (
    `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `info_id` int NOT NULL,
    `serv_id` int NOT NULL,
    foreign key (`info_id`) references `informacoes`(`id`),
    foreign key (`serv_id`) references `servicos`(`id`)  

);


    INSERT INTO `users` (`id`, `username`, `password`) VALUES ('1', 'nascimento', '');
    INSERT INTO `users` (`id`, `username`, `password`) VALUES ('2', 'miguel', '');
    INSERT INTO `users` (`id`, `username`, `password`) VALUES ('3', 'leonardo', '');
    INSERT INTO `users` (`id`, `username`, `password`) VALUES ('4', 'josimar', '');


    INSERT INTO `statuses` (`id`, `name`) VALUES ('1', 'Recebido');
    INSERT INTO `statuses` (`id`, `name`) VALUES ('2', 'Visitado');
    INSERT INTO `statuses` (`id`, `name`) VALUES ('3', 'Orçamento Efetuado');
    INSERT INTO `statuses` (`id`, `name`) VALUES ('4', 'Finalizado');
    INSERT INTO `statuses` (`id`, `name`) VALUES ('5', 'Encerrado');


    INSERT INTO `servicos` (`id`, `name`) VALUES ('1', 'Com Transbordo');
    INSERT INTO `servicos` (`id`, `name`) VALUES ('2', 'Fulltime');
    INSERT INTO `servicos` (`id`, `name`) VALUES ('3', 'Híbrida');
    INSERT INTO `servicos` (`id`, `name`) VALUES ('4', 'Autônoma');


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `statuses` (
  `id` int(11) NOT NULL,
  `stat` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO `statuses` (`id`, `stat`) VALUES
(1, 'Recebido'),
(2, 'Visitado'),
(3, 'Orçamento Efetuado'),
(4, 'Finalizado'),
(5, 'Encerrado');


ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

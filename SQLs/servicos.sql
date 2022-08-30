

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



CREATE TABLE `servicos` (
  `id` int(11) NOT NULL,
  `serv` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO `servicos` (`id`, `serv`) VALUES
(1, 'Com Transbordo'),
(2, 'Fulltime'),
(3, 'Híbrida'),
(4, 'Autônoma');


ALTER TABLE `servicos`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `servicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

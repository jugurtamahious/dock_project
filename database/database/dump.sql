SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `post`;
CREATE TABLE `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `blog` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `post_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `name_encode` varchar(50) DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `user` (`id`, `username`, `password`, `name_encode`, `is_admin`) VALUES
(2,	'jugurta',	'$2y$10$4ltoDGJs2CZvZI5w4XQEBOx.ERXTaFL9ZWtcp63W0nxRd7mUdVtCW',	NULL,	NULL),
(3,	'j_mahious',	'$2y$10$nSRoLyBuPuITQAHYQwtkTeMOmSmQeuP8clOuOl9sLdlQ.gIW0MCB2',	NULL,	NULL),
(7,	'rayane',	'$2y$10$CQjFDctqJ/w82JqJ5nv4KebxzFwD3zfIbdRLjIY6KUDW0HMPUJGsm',	NULL,	NULL),
(8,	'Slash',	'$2y$10$lQc.MSr64CxesIcpVCPdBuZFbFQ1EnVE6/tke6U9ALXA3e7d7vOcm',	NULL,	NULL);




    

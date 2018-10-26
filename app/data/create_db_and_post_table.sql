CREATE DATABASE IF NOT EXISTS `check24_db` DEFAULT CHARACTER SET utf8;

USE `check24_db`;

--
-- Table structure for table `post`
--
DROP TABLE IF EXISTS `post`;
CREATE TABLE `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `body` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

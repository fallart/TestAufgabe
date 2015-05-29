CREATE TABLE IF NOT EXISTS `adresse` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `adress` varchar(100) NOT NULL,
  `zip_code` int(11) NOT NULL,
  `city` varchar(20) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `birthdate` date NOT NULL,
  `enabled` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `adresse`
  ADD PRIMARY KEY (`id`);
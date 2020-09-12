SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE `tweet` (
  `id` int(11) NOT NULL,
  `user` varchar(200) NOT NULL,
  `tweet` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `tweet`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tweet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

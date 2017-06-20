USE DATABASE `projects`;

CREATE TABLE IF NOT EXISTS `pigeon` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `owner` varchar(100) NOT NULL COMMENT 'Owner of pigeon',
  `name` varchar(100) NOT NULL COMMENT 'Name of pigeon',
  `weight` int(5) unsigned NOT NULL COMMENT 'Weight of pigeon',
  `age` int(3) unsigned NOT NULL COMMENT 'Age of pigeon',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

INSERT INTO `pigeon` (`id`, `owner`, `name`, `weight`, `age`)
VALUES
 (NULL, 'Karel de Vries', 'Speedy', 900, 12),
 (NULL, 'Nicole Winters', 'Flying Dutchman', 850, 6),
 (NULL, 'Peter Laantjes', 'The Flash', 789, 7),
 (NULL, 'Jeroen Benners', 'Jeroen Junior', 1100, 14),
 (NULL, 'Karel de Vries', 'Prince', 1025, 13);



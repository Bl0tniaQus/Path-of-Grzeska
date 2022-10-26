DROP DATABASE IF EXISTS pog;
CREATE DATABASE pog;
USE pog;
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nazwa` text COLLATE utf8_polish_ci NOT NULL,
  `Hasla` text COLLATE utf8_polish_ci NOT NULL,
  `Postać` text COLLATE utf8_polish_ci NOT NULL,
  `Klasa` text COLLATE utf8_polish_ci NOT NULL,
  `EXP` int(11) NOT NULL,
  `strength` int(11) NOT NULL,
  `dexterity` int(11) NOT NULL,
  `intellect` int(11) NOT NULL,
  `skill1` text COLLATE utf8_polish_ci NOT NULL,
  `skill2` text COLLATE utf8_polish_ci NOT NULL,
  `skill3` text COLLATE utf8_polish_ci NOT NULL,
  `skill4` text COLLATE utf8_polish_ci NOT NULL,
  `skill5` text COLLATE utf8_polish_ci NOT NULL,
  `skill6` text COLLATE utf8_polish_ci NOT NULL,
  `lvl` int(11) NOT NULL,
  `UsedSkillpoints` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=4 ;

INSERT INTO `accounts` (`id`, `Nazwa`, `Hasla`, `Postać`, `Klasa`, `EXP`, `strength`, `dexterity`, `intellect`, `skill1`, `skill2`, `skill3`, `skill4`, `skill5`, `skill6`, `lvl`, `UsedSkillpoints`) VALUES
(1, 'root', 'root', 'root', 'Warrior', 382, 48, 5, 22, 'Heavy strike', 'Stone skin', 'Three-sided slash', 'Enchanted blade', 'None', 'None', 12, 55),
(2, 'rootm', 'root', 'rootm', 'Mage', 122, 10, 5, 45, 'Thunderclap', 'Fireball', 'Frostbolt', 'Enchanted armour', 'None', 'None', 10, 40),
(3, 'rooth', 'root', 'rooth', 'Archer', 2, 5, 10, 5, 'Double shot', 'Piercing arrow', 'None', 'None', 'None', 'None', 3, 0);

CREATE TABLE IF NOT EXISTS `opponents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Opp1` int(1) NOT NULL,
  `Opp2` int(1) NOT NULL,
  `Opp3` int(1) NOT NULL,
  `Opp4` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=4 ;

INSERT INTO `opponents` (`id`, `Opp1`, `Opp2`, `Opp3`, `Opp4`) VALUES
(1, 1, 1, 1, 1),
(2, 1, 1, 1, 1),
(3, 1, 1, 0, 0);


CREATE TABLE IF NOT EXISTS `skills` (
`id` int(1) NOT NULL AUTO_INCREMENT,
`AuraOfTheSword` int(1) NOT NULL,
`EnchantedBlade` int(1) NOT NULL,
`StoneSkin` int(1) NOT NULL,
`ThreeSidedSlash` int(1) NOT NULL,
`Fireball` int(1) NOT NULL,
`EnchantedArmour` int(1) NOT NULL,
`Thunderclap` int(1) NOT NULL,
`QuickShot` int(1) NOT NULL,
`EmpoweredStorm` int(1) NOT NULL,
`BurningArrow` int(1) NOT NULL,
`InnateQuickness` int(1) NOT NULL,
`IronChord` int(1) NOT NULL,
`DoubleShot` int(1) NOT NULL,
`PiercingArrow` int(1) NOT NULL,
`HeavyStrike` int(1) NOT NULL,
`Frostbolt` int(1) NOT NULL,
`ViperStrike` int(1) NOT NULL,
PRIMARY KEY (`id`)
)ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=4;

INSERT INTO `skills` (`id`, `AuraOfTheSword`, `EnchantedBlade`, `StoneSkin`, `ThreeSidedSlash`, `Fireball`, `EnchantedArmour`, `Thunderclap`, `QuickShot`, `EmpoweredStorm`, `BurningArrow`, `InnateQuickness`, `IronChord`, `DoubleShot`, `PiercingArrow`, `HeavyStrike`, `Frostbolt`, `ViperStrike`) VALUES
(1, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1),
(2, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0);



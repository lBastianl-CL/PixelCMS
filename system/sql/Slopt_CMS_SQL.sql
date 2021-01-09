DROP TABLE IF EXISTS `users_like`;
CREATE TABLE `users_like` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(255) DEFAULT NULL,
  `likefrom` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

ALTER TABLE users ADD user_likes int(11) DEFAULT 0;

DROP TABLE IF EXISTS `uotw`;
CREATE TABLE `uotw` (
  `userid` varchar(255) DEFAULT NULL,
  `text` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `uotw` VALUES ('1', 'Amo el hotel');

DROP TABLE IF EXISTS `teams`;
CREATE TABLE `teams` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `badgeid` varchar(5) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO `teams` VALUES ('1', 'Spam Team', 'SPAM');
INSERT INTO `teams` VALUES ('3', 'Bouw Team', 'BOUW');
INSERT INTO `teams` VALUES ('4', 'Event Team', 'EVENT');
INSERT INTO `teams` VALUES ('5', 'Pixelaar', 'PIXEL');
INSERT INTO `teams` VALUES ('6', 'Gok Team', 'GOK');

DROP TABLE IF EXISTS `staffapplication`;
CREATE TABLE `staffapplication` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text,
  `realname` text,
  `skype` text,
  `age` text,
  `functie` text,
  `onlinetime` text,
  `experience` text,
  `quarrel` text,
  `serious` text,
  `improve` text,
  `microphone` text,
  `ip` text,
  `date` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `resetpassword`;
CREATE TABLE `resetpassword` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL,
  `resetkey` varchar(255) DEFAULT NULL,
  `enable` enum('0','1') DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `referrerbank`;
CREATE TABLE `referrerbank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(255) DEFAULT NULL,
  `diamonds` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `referrer`;
CREATE TABLE `referrer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` decimal(10,0) DEFAULT NULL,
  `refid` decimal(10,0) DEFAULT NULL,
  `diamonds` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `cms_news_message`;
CREATE TABLE `cms_news_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` int(11) NOT NULL DEFAULT '0',
  `newsid` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `message` varchar(250) DEFAULT NULL,
  `hash` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `cms_news_like`;
CREATE TABLE `cms_news_like` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(255) DEFAULT NULL,
  `newsid` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS cms_news;
CREATE TABLE cms_news (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL DEFAULT '0',
  `shortstory` text NOT NULL,
  `longstory` text NOT NULL,
  `author` varchar(100) NOT NULL DEFAULT 'Tom',
  `date` int(11) NOT NULL DEFAULT '0',
  `type` varchar(100) NOT NULL DEFAULT '1',
  `roomid` varchar(100) NOT NULL DEFAULT '1',
  `curtidas` varchar(100) DEFAULT '0',
  `updated` enum('0','1') NOT NULL DEFAULT '0',
  `formulario` int(11) DEFAULT '0',
  `visitas` int(11) DEFAULT '0',
   PRIMARY KEY (id)
);
DROP TABLE IF EXISTS cms_news;
CREATE TABLE cms_news (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL DEFAULT '0',
  `shortstory` text NOT NULL,
  `longstory` text NOT NULL,
  `author` varchar(100) NOT NULL DEFAULT 'Tom',
  `date` int(11) NOT NULL DEFAULT '0',
  `type` varchar(100) NOT NULL DEFAULT '1',
  `roomid` varchar(100) NOT NULL DEFAULT '1',
  `curtidas` varchar(100) DEFAULT '0',
  `updated` enum('0','1') NOT NULL DEFAULT '0',
  `formulario` int(11) DEFAULT '0',
  `visitas` int(11) DEFAULT '0',
   PRIMARY KEY (id)
);
DROP TABLE IF EXISTS cms_report;
CREATE TABLE `cms_report` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(250) NOT NULL,
  `categoria` varchar(250) NOT NULL,
  `comentario` text NOT NULL,
  `autor` varchar(250) NOT NULL,
   PRIMARY KEY (id)
);
DROP TABLE IF EXISTS cms_badges;
CREATE TABLE `cms_badges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `badge_id` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (id)
);

ALTER TABLE users ADD pin VARCHAR(4);
ALTER TABLE users ADD teamrank int(1) DEFAULT 0;
ALTER TABLE users ADD hide_staff int(2) DEFAULT 1;
ALTER TABLE users ADD rewards int(11) DEFAULT 25;
ALTER TABLE users ADD fbid varchar(255) DEFAULT NULL;
ALTER TABLE users ADD fbenable  enum('0','1','2') DEFAULT 2;

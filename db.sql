USE `school`;

DROP TABLE IF EXISTS `article`;

CREATE TABLE `article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `regDate` datetime NOT NULL,
  `title` varchar(100) NOT NULL,
  `viewCnt` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

insert  into `article`(`id`,`regDate`,`title`,`viewCnt`) values (1,'2016-08-06 15:32:42','1',31),(2,'2016-08-06 15:32:50','2',4);

DROP TABLE IF EXISTS `articlereply`;

CREATE TABLE `articlereply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `regDate` datetime NOT NULL,
  `articleId` int(10) unsigned NOT NULL,
  `body` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `regDate` datetime NOT NULL,
  `loginId` char(50) NOT NULL,
  `loginPw` char(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `loginId` (`loginId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;


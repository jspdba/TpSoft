/**
 * 分类表
**/
CREATE TABLE IF NOT EXISTS `think_topic` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_bin NOT NULL,
  `leval` int(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/**
 * 软件表
**/
/*
CREATE TABLE IF NOT EXISTS `think_soft` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `url` varchar(64),
  `cid` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
*/
CREATE TABLE IF NOT EXISTS `think_soft` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `lang` varchar(64) NOT NULL,
  `env` varchar(64) NOT NULL,
  `price` double default .0,
  `icon` varchar(64),
  `info` varchar(1000),
  `cid` int(11) unsigned default 0,
  `createTime` timestamp default current_timestamp,
  `modifyTime` timestamp default current_timestamp,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/**
 * 用户表
**/
CREATE TABLE IF NOT EXISTS `think_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `passwd` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
/**
 * 存放csv文件
 */
CREATE TABLE IF NOT EXISTS `think_csv` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `topic` varchar(64) NOT NULL,
  `name` varchar(64) NOT NULL,
  `url` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/**
 *小贴士
 */
CREATE TABLE IF NOT EXISTS `think_tips` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `content` varchar(1000) NOT NULL,
  `createTime` timestamp default current_timestamp,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;



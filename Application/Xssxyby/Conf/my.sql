/**
 * 分类表
**/
CREATE TABLE IF NOT EXISTS `netjp_topic` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_bin NOT NULL,
  `leval` int(32) NOT NULL,
  `createTime` timestamp default current_timestamp,
  `modifyTime` timestamp default current_timestamp,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `netjp_soft` (
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
CREATE TABLE IF NOT EXISTS `netjp_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `passwd` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `createTime` timestamp default current_timestamp,
  `modifyTime` timestamp default current_timestamp,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

INSERT INTO `netjp_user` (`id`, `username`, `passwd`, `email`) VALUES
(1, 'admin', 'admin', 'jspdba@163.com');

/**
 *小贴士
 */
CREATE TABLE IF NOT EXISTS `netjp_tips` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `content` varchar(1000) NOT NULL,
  `createTime` timestamp default current_timestamp,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- insert into `netjp_user` values(null,'admin','admin','jspdba@163.com',null,null);
# Destoon V6.0 R20151110 http://www.destoon.com
# 2016-06-29 10:54:05
# --------------------------------------------------------


DROP TABLE IF EXISTS `destoon_qiandao`;
CREATE TABLE `destoon_qiandao` (
  `itemid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `userid` bigint(20) NOT NULL DEFAULT '0',
  `username` varchar(30) NOT NULL DEFAULT '',
  `signdays` smallint(3) NOT NULL DEFAULT '0',
  `feeadd` int(10) NOT NULL DEFAULT '0',
  `ostype` varchar(50) NOT NULL DEFAULT '',
  `areaid` smallint(6) NOT NULL DEFAULT '0',
  `note` varchar(255) NOT NULL DEFAULT '',
  `ip` varchar(50) NOT NULL DEFAULT '',
  `addtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`itemid`),
  UNIQUE KEY `itemid` (`itemid`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COMMENT='会员到签';
CREATE TABLE `mgo_go2_go2` (
  `go2_10_id` int(11) unsigned NOT NULL auto_increment,
  `sec_10_id` int(11) unsigned NOT NULL default '0',
  `go2_30_nome` varchar(100) default '',
  `go2_30_link` varchar(150) NOT NULL default '',
  `go2_11_target` tinyint(3) unsigned NOT NULL default '0',
  `go2_30_imagem` varchar(150) NOT NULL default '',
  `go2_10_acessos` int(11) unsigned NOT NULL default '0',
  `go2_12_ativo` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`go2_10_id`),
  KEY `sec_10_id` (`sec_10_id`)
) ENGINE=MyISAM;

CREATE TABLE `mgo_sec_section` (
  `sec_10_id` int(11) unsigned NOT NULL auto_increment,
  `sec_30_nome` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`sec_10_id`)
) ENGINE=MyISAM;


INSERT INTO `mgo_sec_section` VALUES (1, 'General');
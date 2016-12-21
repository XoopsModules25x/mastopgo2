CREATE TABLE `mgo_go2_go2` (
  `go2_10_id`      INT(11) UNSIGNED    NOT NULL AUTO_INCREMENT,
  `sec_10_id`      INT(11) UNSIGNED    NOT NULL DEFAULT '0',
  `go2_30_nome`    VARCHAR(100)                 DEFAULT '',
  `go2_30_link`    VARCHAR(150)        NOT NULL DEFAULT '',
  `go2_11_target`  TINYINT(3) UNSIGNED NOT NULL DEFAULT '0',
  `go2_30_imagem`  VARCHAR(150)        NOT NULL DEFAULT '',
  `go2_10_acessos` INT(11) UNSIGNED    NOT NULL DEFAULT '0',
  `go2_12_ativo`   TINYINT(4)          NOT NULL DEFAULT '0',
  PRIMARY KEY (`go2_10_id`),
  KEY `sec_10_id` (`sec_10_id`)
)
  ENGINE = MyISAM;

CREATE TABLE `mgo_sec_section` (
  `sec_10_id`   INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sec_30_nome` VARCHAR(100)     NOT NULL DEFAULT '',
  PRIMARY KEY (`sec_10_id`)
)
  ENGINE = MyISAM;


INSERT INTO `mgo_sec_section` VALUES (1, 'General');

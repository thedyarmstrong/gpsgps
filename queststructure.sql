/*
Navicat MySQL Data Transfer

Source Server         : tebet
Source Server Version : 50524
Source Host           : 192.168.15.233:3306
Source Database       : gps

Target Server Type    : MYSQL
Target Server Version : 50524
File Encoding         : 65001

Date: 2018-08-02 19:40:27
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for quest
-- ----------------------------
DROP TABLE IF EXISTS `quest`;
CREATE TABLE `questtampung` (
  `num` int(9) NOT NULL AUTO_INCREMENT,
  `project` char(4) NOT NULL,
  `cabang` char(4) NOT NULL,
  `kunjungan` char(3) NOT NULL,
  `teller` varchar(64) DEFAULT NULL,
  `shp` varchar(64) DEFAULT NULL,
  `pwt` varchar(64) DEFAULT NULL,
  `tl` varchar(64) DEFAULT NULL,
  `tanggal` date NOT NULL DEFAULT '0000-00-00',
  `jam` varchar(5) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `rekaman` enum('true','false') DEFAULT 'false',
  `rekaman_status` tinyint(1) DEFAULT '0',
  `tglrekaman` date DEFAULT NULL,
  `tlhonor` enum('0','1') DEFAULT '0',
  `bukti` varchar(100) DEFAULT NULL,
  `equest` varchar(20) DEFAULT NULL,
  `dp` varchar(10) DEFAULT NULL,
  `centang` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `shpdua` varchar(64) DEFAULT NULL,
  `spvdua` varchar(64) DEFAULT NULL,
  `idstkb` varchar(255) DEFAULT NULL,
  `waktuassign` datetime DEFAULT NULL,
  `tdcs` time DEFAULT NULL,
  `tdtl` time DEFAULT NULL,
  PRIMARY KEY (`num`,`project`,`cabang`,`kunjungan`,`tanggal`),
  KEY `ix_pck` (`project`,`cabang`,`kunjungan`),
  KEY `IX_TL` (`tl`)
) ENGINE=MyISAM AUTO_INCREMENT=178162 DEFAULT CHARSET=latin1;

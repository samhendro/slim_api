/*
Navicat MySQL Data Transfer

Source Server         : xampp_php5
Source Server Version : 50624
Source Host           : localhost:3306
Source Database       : slim_api_db

Target Server Type    : MYSQL
Target Server Version : 50624
File Encoding         : 65001

Date: 2018-05-23 20:36:28
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `t_kategori`
-- ----------------------------
DROP TABLE IF EXISTS `t_kategori`;
CREATE TABLE `t_kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT NULL,
  `kategori` varchar(100) DEFAULT NULL,
  `keterangan` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_kategori
-- ----------------------------

-- ----------------------------
-- Table structure for `t_produk`
-- ----------------------------
DROP TABLE IF EXISTS `t_produk`;
CREATE TABLE `t_produk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(20) DEFAULT NULL,
  `kode_kategori` varchar(10) DEFAULT NULL,
  `nama_produk` varchar(200) DEFAULT NULL,
  `keterangan` text,
  `kondisi` enum('Lama','Baru') DEFAULT 'Baru',
  `jumlah` int(11) DEFAULT NULL,
  `harga` decimal(10,0) DEFAULT NULL,
  `images` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_produk
-- ----------------------------

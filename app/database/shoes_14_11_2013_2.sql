/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50532
Source Host           : localhost:3306
Source Database       : test_shoes

Target Server Type    : MYSQL
Target Server Version : 50532
File Encoding         : 65001

Date: 2013-11-17 10:40:02
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tbl_seller`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_seller`;
CREATE TABLE `tbl_seller` (
  `seller_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `seller_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seller_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seller_note` tinytext COLLATE utf8_unicode_ci,
  `paid_total` int(10) unsigned DEFAULT '0',
  `debt_total` int(10) unsigned DEFAULT '0',
  `debt_other_total` int(10) DEFAULT '0',
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`seller_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tbl_seller
-- ----------------------------
INSERT INTO `tbl_seller` VALUES ('1', 'H.T', 'Chợ Bình Tây - Hoàng Trân 183', '', '196120', '27105', null, null, '2013-10-31 09:00:04', '2013-11-10 22:24:55');
INSERT INTO `tbl_seller` VALUES ('2', 'P.L', 'Chợ Bình Tây - Phúc Lợi 219', '', '152500', '35460', null, null, '2013-10-31 09:00:08', '2013-11-11 15:35:31');
INSERT INTO `tbl_seller` VALUES ('3', 'Q.M', 'Chợ Bình Tây - Quang Minh 207', '', '41760', '2000', null, null, '2013-10-31 09:00:11', '2013-11-10 21:51:08');

-- ----------------------------
-- Table structure for `tbl_seller_invoice`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_seller_invoice`;
CREATE TABLE `tbl_seller_invoice` (
  `invoice_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `seller_id` int(11) unsigned NOT NULL DEFAULT '0',
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quality` int(10) DEFAULT '0',
  `cost_price` int(10) DEFAULT '0',
  `selling_price` int(10) unsigned DEFAULT '0',
  `profits` int(10) DEFAULT '0',
  `payment` int(10) unsigned DEFAULT '0',
  `debt_total` int(10) unsigned DEFAULT '0',
  `invoice_note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_return` tinyint(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`invoice_id`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tbl_seller_invoice
-- ----------------------------
INSERT INTO `tbl_seller_invoice` VALUES ('1', '3', null, '100', '84', '89', '5', '0', '10900', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('2', '3', null, '-25', '85', '94', '9', '0', '8550', 'Hàng cũ', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('3', '3', null, '100', '85', '89', '4', '6550', '10900', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('4', '3', null, '100', '84', '87', '3', '17600', '2000', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('5', '3', null, '50', '74', '78', '4', '0', '5900', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('6', '3', null, '70', '68', '73', '5', '9010', '2000', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('7', '3', null, '150', '80', '86', '6', '0', '14900', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('8', '3', null, '-50', '80', '86', '6', '8600', '2000', 'Giao cho Phúc Lợi 24/10', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('9', '2', null, '50', '67', '73', '6', '0', '16330', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('10', '2', null, '70', '66', '73', '7', '5000', '16440', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('11', '2', null, '-1', '63', '70', '7', '0', '16370', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('12', '2', null, '70', '64', '71', '7', '4000', '17340', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('13', '2', null, '200', '85', '90', '5', '0', '35340', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('14', '2', null, '50', '94', '100', '6', '20000', '20340', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('15', '2', null, '100', '80', '88', '8', '5000', '24140', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('16', '2', null, '100', '74', '78', '4', '5000', '26940', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('17', '2', null, '50', '94', '100', '6', '10000', '21940', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('18', '2', null, '50', '81', '87', '6', '5000', '21290', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('19', '2', null, '25', '65', '71', '6', '0', '23065', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('20', '2', null, '45', '68', '73', '5', '0', '26350', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('21', '2', null, '50', '84', '90', '6', '0', '30850', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('22', '2', null, '50', '94', '100', '6', '0', '35850', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('23', '2', null, '100', '86', '93', '7', '0', '45150', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('24', '2', null, '-5', '83', '92', '9', '15000', '29690', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('25', '2', null, '50', '94', '100', '6', '5000', '29690', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('26', '2', null, '60', '80', '85', '5', '0', '34790', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('27', '2', null, '50', '93', '103', '10', '10000', '29940', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('28', '2', null, '60', '95', '103', '8', '0', '36120', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('29', '2', null, '50', '85', '90', '5', '10000', '30620', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('30', '2', null, '50', '80', '80', '0', '0', '34620', 'Giá bán 86k từ sạp 207', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('31', '2', null, '100', '90', '98', '8', '0', '44420', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('32', '2', null, '45', '104', '115', '11', '10000', '39595', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('33', '2', null, '0', '0', '0', '0', '500', '39095', 'mua sữa cho Hoa', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('34', '2', null, '100', '107', '115', '8', '8000', '42595', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('35', '2', null, '80', '72', '80', '8', '10000', '38995', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('36', '2', null, '15', '77', '85', '8', '0', '40270', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('37', '2', null, '20', '42', '47', '5', '0', '41210', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('38', '2', null, '50', '106', '115', '9', '15000', '31960', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('39', '1', null, '50', '65', '77', '12', '0', '18850', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('40', '1', null, '50', '89', '97', '8', '0', '23700', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('41', '1', null, '100', '104', '112', '8', '10000', '24900', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('42', '1', null, '-5', '81', '89', '8', '0', '24455', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('43', '1', null, '-5', '103', '114', '11', '0', '23885', '', '0', '2013-10-01 21:28:12', '2013-11-11 13:06:04');
INSERT INTO `tbl_seller_invoice` VALUES ('44', '1', null, '0', '0', '0', '0', '2140', '21745', 'hư 3/10, bớt giá tháng 5', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('45', '1', null, '100', '115', '122', '7', '0', '33945', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('46', '1', null, '-2', '103', '114', '11', '0', '33717', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('47', '1', null, '-1', '99', '109', '10', '0', '33608', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('48', '1', null, '-1', '54', '59', '5', '0', '33549', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('49', '1', null, '-1', '107', '118', '11', '0', '33431', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('50', '1', null, '-5', '72', '79', '7', '11291', '21745', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('51', '1', null, '100', '100', '107', '7', '0', '32445', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('52', '1', null, '50', '80', '89', '9', '0', '36895', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('53', '1', null, '0', '0', '0', '0', '12885', '24010', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('54', '1', null, '80', '120', '124', '4', '0', '33930', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('55', '1', null, '100', '95', '102', '7', '19750', '24380', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('56', '1', null, '-5', '67', '74', '7', '0', '24010', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('57', '1', null, '60', '44', '49', '5', '0', '26950', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('58', '1', null, '60', '56', '60', '4', '0', '30550', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('59', '1', null, '60', '50', '54', '4', '0', '33790', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('60', '1', null, '50', '60', '64', '4', '0', '36990', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('61', '1', null, '-3', '80', '89', '9', '6073', '30650', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('62', '1', null, '40', '44', '44', '0', '6665', '25745', 'lộn giá 50k', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('63', '1', null, '100', '102', '107', '5', '0', '36445', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('64', '1', null, '100', '102', '107', '5', '0', '36445', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('65', '1', null, '50', '90', '97', '7', '15550', '25745', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('66', '1', null, '70', '110', '117', '7', '0', '33935', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('67', '1', null, '-1', '103', '114', '11', '12076', '21745', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('68', '1', null, '70', '81', '89', '8', '0', '27975', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('69', '1', null, '60', '85', '94', '9', '0', '33615', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('70', '1', null, '80', '110', '119', '9', '15300', '27835', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('71', '1', null, '50', '45', '49', '4', '6090', '24195', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('72', '1', null, '50', '101', '107', '6', '0', '29545', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('73', '1', null, '10', '81', '89', '8', '0', '30435', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('74', '1', null, '-7', '90', '99', '9', '7997', '21745', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('75', '1', null, '60', '60', '64', '4', '0', '25585', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('76', '1', null, '70', '70', '79', '9', '0', '31115', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('77', '1', null, '-10', '110', '119', '9', '0', '29925', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('78', '1', null, '-10', '94', '104', '10', '0', '28885', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('79', '1', null, '-5', '99', '109', '10', '0', '28340', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('80', '1', null, '-1', '85', '94', '9', '6501', '21745', '', '0', '2013-10-01 21:28:12', '2013-11-11 13:12:26');
INSERT INTO `tbl_seller_invoice` VALUES ('81', '1', null, '50', '87', '94', '7', '4700', '21745', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('82', '1', null, '60', '90', '97', '7', '5820', '21745', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('83', '1', null, '30', '115', '121', '6', '0', '25375', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('84', '1', null, '20', '105', '111', '6', '0', '27595', '', '0', '2013-10-01 21:28:12', '2013-10-01 21:28:12');
INSERT INTO `tbl_seller_invoice` VALUES ('85', '1', null, '30', '120', '124', '4', '10680', '20635', '', '0', '2013-11-10 22:20:20', '2013-11-10 22:20:20');
INSERT INTO `tbl_seller_invoice` VALUES ('86', '1', null, '10', '105', '111', '6', '0', '21745', '', '0', '2013-11-10 22:20:42', '2013-11-10 22:20:42');
INSERT INTO `tbl_seller_invoice` VALUES ('87', '1', null, '50', '107', '114', '7', '15100', '12345', '', '0', '2013-11-10 22:20:58', '2013-11-10 22:20:58');
INSERT INTO `tbl_seller_invoice` VALUES ('88', '1', null, '100', '87', '94', '7', '0', '21745', '', '0', '2013-11-10 22:21:23', '2013-11-10 22:21:23');
INSERT INTO `tbl_seller_invoice` VALUES ('89', '1', null, '100', '45', '49', '4', '0', '26645', '', '0', '2013-11-10 22:22:18', '2013-11-10 22:22:18');
INSERT INTO `tbl_seller_invoice` VALUES ('90', '1', null, '-5', '81', '89', '8', '0', '26200', '', '0', '2013-11-10 22:22:30', '2013-11-11 13:12:12');
INSERT INTO `tbl_seller_invoice` VALUES ('91', '1', null, '-7', '94', '104', '10', '0', '25472', '', '0', '2013-11-10 22:22:42', '2013-11-11 13:18:15');
INSERT INTO `tbl_seller_invoice` VALUES ('92', '1', null, '30', '100', '106', '6', '0', '28652', '', '0', '2013-11-10 22:22:54', '2013-11-10 22:22:54');
INSERT INTO `tbl_seller_invoice` VALUES ('93', '1', null, '30', '114', '119', '5', '0', '32222', '', '0', '2013-11-10 22:23:07', '2013-11-10 22:23:07');
INSERT INTO `tbl_seller_invoice` VALUES ('94', '1', null, '30', '81', '89', '8', '10000', '24892', '', '0', '2013-11-10 22:23:25', '2013-11-10 22:23:25');
INSERT INTO `tbl_seller_invoice` VALUES ('95', '1', null, '100', '87', '94', '7', '0', '34292', '', '0', '2013-11-10 22:24:04', '2013-11-10 22:24:04');
INSERT INTO `tbl_seller_invoice` VALUES ('96', '1', null, '-5', '90', '99', '9', '0', '33797', '', '0', '2013-11-10 22:24:20', '2013-11-11 13:23:35');
INSERT INTO `tbl_seller_invoice` VALUES ('97', '1', null, '50', '100', '109', '9', '12000', '27247', '', '0', '2013-11-10 22:24:31', '2013-11-10 22:24:31');
INSERT INTO `tbl_seller_invoice` VALUES ('98', '1', null, '20', '120', '129', '9', '0', '29827', '', '0', '2013-11-10 22:24:42', '2013-11-10 22:24:42');
INSERT INTO `tbl_seller_invoice` VALUES ('99', '1', null, '20', '130', '139', '9', '5502', '27105', '', '0', '2013-11-10 22:24:55', '2013-11-10 22:24:55');
INSERT INTO `tbl_seller_invoice` VALUES ('100', '2', null, '50', '84', '90', '6', '0', '36460', '', '0', '2013-11-10 22:25:29', '2013-11-10 22:25:29');
INSERT INTO `tbl_seller_invoice` VALUES ('101', '2', null, '50', '84', '92', '8', '5000', '36060', '', '0', '2013-11-10 22:25:44', '2013-11-10 22:25:44');
INSERT INTO `tbl_seller_invoice` VALUES ('102', '2', null, '100', '45', '48', '3', '5000', '35860', '', '0', '2013-11-10 22:25:58', '2013-11-10 22:25:58');
INSERT INTO `tbl_seller_invoice` VALUES ('103', '2', null, '50', '85', '92', '7', '5000', '35460', '', '0', '2013-11-11 15:35:31', '2013-11-11 15:35:31');

-- ----------------------------
-- Table structure for `tbl_share_holder`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_share_holder`;
CREATE TABLE `tbl_share_holder` (
  `share_holder_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `share_holder_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `share_holder_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `share_holder_note` tinytext COLLATE utf8_unicode_ci,
  `share_holder_capital` int(10) unsigned DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`share_holder_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tbl_share_holder
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_share_holder_cost`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_share_holder_cost`;
CREATE TABLE `tbl_share_holder_cost` (
  `cost_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cost_for` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cost` int(10) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`cost_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tbl_share_holder_cost
-- ----------------------------
INSERT INTO `tbl_share_holder_cost` VALUES ('1', '12/10 Lệch sổ', '270', '2013-10-01 20:45:11', '2013-10-01 20:45:11');
INSERT INTO `tbl_share_holder_cost` VALUES ('2', '18/10 Thu thiếu Hoàng Trân', '500', '2013-10-01 20:45:11', '2013-10-01 20:45:11');
INSERT INTO `tbl_share_holder_cost` VALUES ('3', 'Xăng', '100', '2013-10-01 20:45:11', '2013-10-01 20:50:07');
INSERT INTO `tbl_share_holder_cost` VALUES ('4', '2kg bọc', '76', '2013-10-01 20:45:11', '2013-10-01 20:50:07');
INSERT INTO `tbl_share_holder_cost` VALUES ('5', 'Xăng, DT, Bốc xếp', '500', '2013-10-01 20:45:11', '2013-10-01 20:45:11');
INSERT INTO `tbl_share_holder_cost` VALUES ('6', 'Bị phạt giao thông', '500', '2013-10-01 20:45:11', '2013-10-02 20:45:11');
INSERT INTO `tbl_share_holder_cost` VALUES ('7', 'Xăng', '80', '2013-10-01 20:45:11', '2013-10-04 20:45:11');
INSERT INTO `tbl_share_holder_cost` VALUES ('8', 'Xăng', '500', '2013-10-01 20:45:11', '2013-10-10 20:45:11');
INSERT INTO `tbl_share_holder_cost` VALUES ('9', 'Boa', '15', '2013-10-01 20:45:11', '2013-10-12 20:45:11');
INSERT INTO `tbl_share_holder_cost` VALUES ('10', 'Xăng', '420', '2013-10-01 20:45:11', '2013-10-15 20:45:11');
INSERT INTO `tbl_share_holder_cost` VALUES ('11', 'Xăng', '90', '2013-10-01 20:45:11', '2013-10-15 20:45:11');
INSERT INTO `tbl_share_holder_cost` VALUES ('12', 'Thay bình xe novo', '275', '2013-10-01 20:45:11', '2013-10-17 20:45:11');
INSERT INTO `tbl_share_holder_cost` VALUES ('13', 'Đám ma', '200', '2013-10-01 20:45:11', '2013-10-19 20:45:11');
INSERT INTO `tbl_share_holder_cost` VALUES ('14', 'Xăng, DT, Bốc xếp', '420', '2013-10-01 20:45:11', '2013-10-19 20:45:11');
INSERT INTO `tbl_share_holder_cost` VALUES ('15', 'SN Hoàng Trân', '500', '2013-10-01 20:45:11', '2013-10-19 20:45:11');
INSERT INTO `tbl_share_holder_cost` VALUES ('16', 'Xe, sửa', '3000', '2013-10-01 20:45:11', '2013-10-19 20:45:11');
INSERT INTO `tbl_share_holder_cost` VALUES ('17', 'Xăng 90, gửi xe', '150', '2013-10-01 20:45:11', '2013-10-24 20:45:11');
INSERT INTO `tbl_share_holder_cost` VALUES ('18', 'Phí lên mẫu dép', '500', '2013-10-01 20:45:11', '2013-10-24 20:45:11');
INSERT INTO `tbl_share_holder_cost` VALUES ('19', 'Xăng, DT, Bốc xếp', '370', '2013-10-01 20:45:11', '2013-10-25 20:45:11');
INSERT INTO `tbl_share_holder_cost` VALUES ('20', 'Bia SN bé Thu', '205', '2013-10-01 20:45:11', '2013-10-29 20:45:11');
INSERT INTO `tbl_share_holder_cost` VALUES ('21', 'Bao hiem xe', '100', '2013-10-01 20:45:11', '2013-10-29 20:45:11');
INSERT INTO `tbl_share_holder_cost` VALUES ('22', 'Xăng, DT, Bốc xếp', '450', '2013-10-01 20:45:11', '2013-10-31 20:45:11');
INSERT INTO `tbl_share_holder_cost` VALUES ('23', 'Xăng, gửi xe', '150', '2013-10-01 20:45:11', '2013-10-31 20:45:11');
INSERT INTO `tbl_share_holder_cost` VALUES ('24', 'Thay sên', '200', '2013-10-01 20:45:11', '2013-10-31 20:45:11');
INSERT INTO `tbl_share_holder_cost` VALUES ('25', 'Liên điện thoại', '200', '2013-11-10 20:45:17', '2013-11-04 20:45:17');
INSERT INTO `tbl_share_holder_cost` VALUES ('26', 'Xăng, DT, Bốc xếp', '400', '2013-11-10 20:45:22', '2013-11-05 20:45:22');
INSERT INTO `tbl_share_holder_cost` VALUES ('27', 'Bị phạt giao thông', '200', '2013-11-10 20:45:30', '2013-11-05 20:45:30');
INSERT INTO `tbl_share_holder_cost` VALUES ('28', 'Khuôn đế', '60', '2013-11-10 20:45:43', '2013-11-07 20:45:30');
INSERT INTO `tbl_share_holder_cost` VALUES ('29', 'Xăng, DT, Bốc xếp', '300', '2013-11-11 15:36:00', '2013-11-10 15:36:00');

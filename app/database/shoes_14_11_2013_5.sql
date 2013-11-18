/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50532
Source Host           : localhost:3306
Source Database       : test_shoes

Target Server Type    : MYSQL
Target Server Version : 50532
File Encoding         : 65001

Date: 2013-11-18 22:15:22
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
INSERT INTO `tbl_seller` VALUES ('1', 'H.T', 'Chợ Bình Tây - Hoàng Trân 183', '', '0', '15000', null, null, '2013-10-31 09:00:04', '2013-11-18 15:13:02');
INSERT INTO `tbl_seller` VALUES ('2', 'P.L', 'Chợ Bình Tây - Phúc Lợi 219', '', '0', '12680', null, null, '2013-10-31 09:00:08', '2013-11-18 15:13:02');
INSERT INTO `tbl_seller` VALUES ('3', 'Q.M', 'Chợ Bình Tây - Quang Minh 207', '', '0', '2000', null, null, '2013-10-31 09:00:11', '2013-11-10 21:51:08');

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
  `selling_price` int(10) DEFAULT '0',
  `profits` int(10) DEFAULT '0',
  `payment` int(10) unsigned DEFAULT '0',
  `debt_total` int(10) unsigned DEFAULT '0',
  `invoice_note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_return` tinyint(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`invoice_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tbl_seller_invoice
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_share_holder`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_share_holder`;
CREATE TABLE `tbl_share_holder` (
  `share_holder_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `share_holder_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `share_holder_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `share_holder_note` tinytext COLLATE utf8_unicode_ci,
  `share_holder_capital` int(10) DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`share_holder_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tbl_share_holder
-- ----------------------------
INSERT INTO `tbl_share_holder` VALUES ('1', 'Hoàng Phúc', 'Đồng Nai', 'Sổ nợ: 28,380\r\n\r\n28/9:   Rút 1000\r\n12/10: Rút 2000 - Đ.cưới Lập\r\n18/10: Rút 4000\r\n26/10: Rút 500 - Sửa xe', '-7500', '0907933886', '2013-10-31 09:09:21', '2013-11-17 08:05:05');
INSERT INTO `tbl_share_holder` VALUES ('2', 'Kim Liên', '410B/16 Hậu Giang', '26/09: Thêm 30000\r\n9/10:   Thêm 30000\r\n4/11:   Rút    1000', '59000', '01669133398', '2013-10-31 09:09:26', '2013-11-17 08:04:19');
INSERT INTO `tbl_share_holder` VALUES ('3', 'Trả hàng', '', '15/10: 2x85  =170\r\n15/10: 5x80  =400\r\n17/10: 5x75  =375\r\n19/10: 1x110=110 (Liên mua)\r\n19/10: 1x120=120 (Liên mua)', '1175', '', '2013-11-17 08:01:26', '2013-11-17 08:06:43');
INSERT INTO `tbl_share_holder` VALUES ('4', 'Nguồn chi khác', '', '11/10: 3000 Lấy đế', '-3000', '', '2013-11-17 08:19:56', '2013-11-17 09:09:13');

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

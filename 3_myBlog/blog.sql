/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : blog

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-04-14 22:35:28
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for t_blog
-- ----------------------------
DROP TABLE IF EXISTS `t_blog`;
CREATE TABLE `t_blog` (
  `blog_id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_title` varchar(255) DEFAULT NULL,
  `blog_content` text,
  `post_time` datetime DEFAULT NULL,
  `catalog_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `checked` int(11) DEFAULT NULL,
  PRIMARY KEY (`blog_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_blog
-- ----------------------------
INSERT INTO `t_blog` VALUES ('1', '人机大队长', '落地成河', '2018-10-21 15:17:37', '1', '2', '2');
INSERT INTO `t_blog` VALUES ('2', '你是一个秘密', '吃鸡', '2018-10-21 16:33:43', '2', '2', '4');
INSERT INTO `t_blog` VALUES ('3', '堇年', '杀敌1W', '2018-10-28 10:38:35', '2', '4', '6');

-- ----------------------------
-- Table structure for t_blog_catalog
-- ----------------------------
DROP TABLE IF EXISTS `t_blog_catalog`;
CREATE TABLE `t_blog_catalog` (
  `catalog_id` int(11) NOT NULL AUTO_INCREMENT,
  `catalog_name` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`catalog_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_blog_catalog
-- ----------------------------
INSERT INTO `t_blog_catalog` VALUES ('1', '98k', '2');
INSERT INTO `t_blog_catalog` VALUES ('2', '吃鸡集锦', '2');

-- ----------------------------
-- Table structure for t_collect
-- ----------------------------
DROP TABLE IF EXISTS `t_collect`;
CREATE TABLE `t_collect` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_collect
-- ----------------------------
INSERT INTO `t_collect` VALUES ('1', '1', '1');
INSERT INTO `t_collect` VALUES ('2', '1', '2');
INSERT INTO `t_collect` VALUES ('3', '1', '3');
INSERT INTO `t_collect` VALUES ('4', '2', '1');

-- ----------------------------
-- Table structure for t_comment
-- ----------------------------
DROP TABLE IF EXISTS `t_comment`;
CREATE TABLE `t_comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text,
  `post_time` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `blog_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_comment
-- ----------------------------

-- ----------------------------
-- Table structure for t_message
-- ----------------------------
DROP TABLE IF EXISTS `t_message`;
CREATE TABLE `t_message` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(255) DEFAULT NULL,
  `post_time` datetime DEFAULT NULL,
  `sender` int(11) DEFAULT NULL,
  `receiver` int(11) DEFAULT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_message
-- ----------------------------

-- ----------------------------
-- Table structure for t_user
-- ----------------------------
DROP TABLE IF EXISTS `t_user`;
CREATE TABLE `t_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `is_del` int(1) DEFAULT '0',
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT '' COMMENT '邮箱',
  `sex` varchar(1) DEFAULT NULL COMMENT '0:男  1:女',
  `province` varchar(50) DEFAULT NULL COMMENT '省',
  `mood` varchar(255) DEFAULT NULL COMMENT '个人心情',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_user
-- ----------------------------
INSERT INTO `t_user` VALUES ('2', 'lisi', '0', '123', 'lisi@163.com', null, null, null);
INSERT INTO `t_user` VALUES ('3', '111', '0', '111', '', null, null, null);
INSERT INTO `t_user` VALUES ('4', '222', '0', '222', '', null, null, null);
INSERT INTO `t_user` VALUES ('5', '444', '0', '44', '', null, null, null);
INSERT INTO `t_user` VALUES ('6', '444', '0', '55', '', null, null, null);
INSERT INTO `t_user` VALUES ('7', '666', '0', '666', '', null, null, null);
INSERT INTO `t_user` VALUES ('8', 'qq', '0', 'qq', 'qqq', '1', null, null);
INSERT INTO `t_user` VALUES ('9', 'qq', '0', 'qq', 'qqq', '1', null, null);
INSERT INTO `t_user` VALUES ('10', 'ww', '0', 'wwww', 'www', '2', null, null);
INSERT INTO `t_user` VALUES ('11', 'rrr', '0', 'rrr', 'rrr', '2', null, null);
INSERT INTO `t_user` VALUES ('12', '1', '0', '1', '1', '女', null, null);

/*
Navicat MySQL Data Transfer

Source Server         : zhang
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : to_blog

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2019-02-07 19:44:45
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for blog_admin
-- ----------------------------
DROP TABLE IF EXISTS `blog_admin`;
CREATE TABLE `blog_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(30) NOT NULL COMMENT '用户名',
  `password` char(32) NOT NULL COMMENT '用户密码',
  `salt` char(6) NOT NULL,
  `update_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_admin
-- ----------------------------
INSERT INTO `blog_admin` VALUES ('1', 'zhang', '04522abf42bb8ad979fe66948402bc0d', 'hello', '1547878594');

-- ----------------------------
-- Table structure for blog_article
-- ----------------------------
DROP TABLE IF EXISTS `blog_article`;
CREATE TABLE `blog_article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `summary` varchar(200) NOT NULL,
  `tag` varchar(20) NOT NULL,
  `author` varchar(10) NOT NULL,
  `views` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '默认访问量为0',
  `img_url` varchar(200) NOT NULL,
  `contents` text NOT NULL,
  `cat_id` tinyint(3) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  `updated_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_article
-- ----------------------------
INSERT INTO `blog_article` VALUES ('3', 'socket   ', 'php网络编程之socket的常用函数介绍以及简单实用', 'socket', '0x', '94', 'uploads/article/thumb\\20190130\\951cf67bd0ca747416ea87b280d65242.jpg', '<p>					</p><p>nice</p><p><br/></p><p>				</p>', '2', '1548835798', '1548835798');
INSERT INTO `blog_article` VALUES ('4', 'xxxxxxxxxxxx', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxx', 'xxxxx', '0xxx', '18', 'uploads/article/thumb\\20190131\\def40b6ae873c5f72ac23d28a3e16dc9.jpg', '<p>xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx<br/></p>', '2', '1548913576', '1548913576');
INSERT INTO `blog_article` VALUES ('5', 'ddddddddddddd', 'ddddddddddd', 'ddddddd', 'dfdf', '32', 'uploads/article/thumb\\20190131\\5b7bb3cb691923f621cf3cfe85444832.jpg', '<p>dddddddddddddddddddddddddssssfsdddddddddddddddddddddfdgs 四代安抚 四代发送到四代但是 <br/></p>', '1', '1548913606', '1548913606');
INSERT INTO `blog_article` VALUES ('6', 'ffffffffffffff', 'fffffdgfdsgdsssss', 'fffff', '0fgf', '32', 'uploads/article/thumb\\20190131\\1d12696117e276c284b6ef44c0efba02.jpg', '<p>dfsggggggggggggggggggggggggg<br/></p>', '3', '1548913730', '1548913730');

-- ----------------------------
-- Table structure for blog_cat
-- ----------------------------
DROP TABLE IF EXISTS `blog_cat`;
CREATE TABLE `blog_cat` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(20) NOT NULL,
  `cat_desc` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_cat
-- ----------------------------
INSERT INTO `blog_cat` VALUES ('1', 'php', '正式面向全国');
INSERT INTO `blog_cat` VALUES ('2', 'java', '非常的nice');
INSERT INTO `blog_cat` VALUES ('3', 'css', '样式');

-- ----------------------------
-- Table structure for blog_link
-- ----------------------------
DROP TABLE IF EXISTS `blog_link`;
CREATE TABLE `blog_link` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `site_name` varchar(50) NOT NULL,
  `site_url` varchar(100) NOT NULL,
  `order_by` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_link
-- ----------------------------

-- ----------------------------
-- Table structure for blog_pic
-- ----------------------------
DROP TABLE IF EXISTS `blog_pic`;
CREATE TABLE `blog_pic` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `summary` varchar(200) NOT NULL,
  `img_url` varchar(150) NOT NULL,
  `url` varchar(150) NOT NULL COMMENT '跳转地址',
  `is_show` tinyint(3) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_pic
-- ----------------------------
INSERT INTO `blog_pic` VALUES ('3', '1111111', 'ffffffffffdfddf', 'uploads/pic\\20190207\\94e4169464dc56aa60d5775dc7cfa658.jpg', '1111.ff', '1');
INSERT INTO `blog_pic` VALUES ('4', 'xxxdddd', 'ddddddddddddddddddd', 'uploads/pic\\20190207\\1f88295f4f173ae36db8a7433f6607fd.jpg', 'xxxx.dd', '1');
INSERT INTO `blog_pic` VALUES ('5', 'ffffff', 'gffdsfsdfsdfs', 'uploads/pic\\20190207\\af41ad9958171618f5ac4ca68610b47e.jpg', 'ggggggggs.ddd', '1');

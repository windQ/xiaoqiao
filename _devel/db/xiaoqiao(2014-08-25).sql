/*
Navicat MySQL Data Transfer

Source Server         : 203
Source Server Version : 50519
Source Host           : 192.168.20.203:3306
Source Database       : xiaoqiao

Target Server Type    : MYSQL
Target Server Version : 50519
File Encoding         : 65001

Date: 2014-08-25 17:37:15
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL COMMENT '管理员状态，0为禁用，1为激活',
  `roles` enum('admin','super_admin') DEFAULT NULL COMMENT '管理员角色,admin 一般管理员 super_admin超级管理员',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='管理员表';

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('0', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '1', 'super_admin');

-- ----------------------------
-- Table structure for `column`
-- ----------------------------
DROP TABLE IF EXISTS `column`;
CREATE TABLE `column` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL COMMENT '栏目名',
  `p_id` int(11) DEFAULT '0' COMMENT '父id',
  `status` tinyint(4) DEFAULT '1' COMMENT '记录状态，0禁用，1激活',
  `sort` int(11) DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 COMMENT='栏目表,二级分类';

-- ----------------------------
-- Records of column
-- ----------------------------
INSERT INTO `column` VALUES ('1', '彩妆培训', '0', '1', '0');
INSERT INTO `column` VALUES ('2', '商业合作', '0', '1', '0');
INSERT INTO `column` VALUES ('3', '新娘跟妆', '0', '1', '0');
INSERT INTO `column` VALUES ('4', '工作室动态', '0', '1', '0');
INSERT INTO `column` VALUES ('5', '新闻管理', '0', '1', '0');
INSERT INTO `column` VALUES ('6', '作品发布', '0', '1', '0');
INSERT INTO `column` VALUES ('27', '白领个人形像班', '1', '1', '0');
INSERT INTO `column` VALUES ('28', '时尚整体造型师班', '1', '1', '0');
INSERT INTO `column` VALUES ('29', '影视剧形象设计服务', '2', '1', '0');
INSERT INTO `column` VALUES ('30', '舞台表演形象设计服务', '2', '1', '0');
INSERT INTO `column` VALUES ('31', '新娘形象设计服务', '2', '1', '0');
INSERT INTO `column` VALUES ('32', '生活形象设计服务', '2', '1', '0');
INSERT INTO `column` VALUES ('33', '广告形象设计服务', '2', '1', '0');
INSERT INTO `column` VALUES ('34', '行业动态', '5', '1', '0');
INSERT INTO `column` VALUES ('35', '培训课程', '5', '1', '0');
INSERT INTO `column` VALUES ('36', '商业化妆', '5', '1', '0');
INSERT INTO `column` VALUES ('37', '首席化妆师--Yuki老师作品', '3', '1', '0');
INSERT INTO `column` VALUES ('38', '资深化妆师', '3', '1', '0');
INSERT INTO `column` VALUES ('39', '金牌化妆师', '3', '1', '0');
INSERT INTO `column` VALUES ('40', '高级化妆师', '3', '1', '0');
INSERT INTO `column` VALUES ('41', '总监', '3', '1', '0');
INSERT INTO `column` VALUES ('42', '彩妆', '6', '1', '0');
INSERT INTO `column` VALUES ('43', '工作室动态1', '4', '1', '0');

-- ----------------------------
-- Table structure for `news`
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(45) NOT NULL COMMENT '标题',
  `cover` varchar(150) DEFAULT '' COMMENT '封面图片',
  `contents` text NOT NULL COMMENT '内容',
  `column` int(11) NOT NULL DEFAULT '0' COMMENT '标签是新闻栏目还是商业合作栏目',
  `sub_column_id` int(11) NOT NULL COMMENT '子栏目id',
  `create_time` varchar(45) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='新闻表，包括新闻发布和商业合作栏目';

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES ('3', '江湖救急 测试修改', null, '<p>测试编辑再测试asdfasdfasdf</p>', '1', '27', '1408891652');
INSERT INTO `news` VALUES ('6', '新闻发布', null, '<p>新闻发布</p><p><img src=\"/upload/image/20140824/1408892295139286.jpg\" title=\"1408892295139286.jpg\" alt=\"4604.jpg\"/></p>', '5', '34', '1408892296');
INSERT INTO `news` VALUES ('8', '商业合作', 'upload/cover/20140825/31_2014082511181953faaafb80b3a.png', '<p>tttttttttttttttt</p><p><br/></p><p><br/></p><p><br/></p><p>sdfasdfasdf</p><p><br/></p><p><br/></p><p><span style=\"color: rgb(227, 108, 9);\">werqwerqwr</span></p>', '2', '31', '1408936331');
INSERT INTO `news` VALUES ('9', '11111111', 'upload/cover/20140825/30_2014082517224053fb006087e61.jpg', '<p>asdfasdfasdf</p><p><br/></p><p>asdf</p><p><br/></p><p><br/></p><p>eeeee</p>', '2', '30', '1408958560');

-- ----------------------------
-- Table structure for `news_id_seq`
-- ----------------------------
DROP TABLE IF EXISTS `news_id_seq`;
CREATE TABLE `news_id_seq` (
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of news_id_seq
-- ----------------------------
INSERT INTO `news_id_seq` VALUES ('10');

-- ----------------------------
-- Table structure for `product`
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL COMMENT '标题',
  `description` text COMMENT '描述',
  `images` text NOT NULL COMMENT '图片集合',
  `column` varchar(45) NOT NULL COMMENT '栏目',
  `sub_column_id` varchar(45) NOT NULL COMMENT '子栏目',
  `create_time` varchar(45) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='作品表：包括作品发布，工作室动态，新娘跟妆栏目';

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES ('2', '作品发布', '作品发布', '[\"upload\\/photo\\/20140825\\/6_2014082516485453faf876c7388_thumb.png\"]', '6', '42', '1408956534');
INSERT INTO `product` VALUES ('3', '标题', '标题2222', '[]', '4', '43', '1408958630');

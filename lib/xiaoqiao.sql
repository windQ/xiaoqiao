/*
Navicat MySQL Data Transfer

Source Server         : 203
Source Server Version : 50519
Source Host           : 192.168.20.203:3306
Source Database       : xiaoqiao

Target Server Type    : MYSQL
Target Server Version : 50519
File Encoding         : 65001

Date: 2014-08-28 17:27:33
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL COMMENT '管理员状态，0为禁用，1为激活',
  `roles` enum('admin','super_admin') DEFAULT NULL COMMENT '管理员角色,admin 一般管理员 super_admin超级管理员',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='管理员表';

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '1', 'super_admin');

-- ----------------------------
-- Table structure for `column`
-- ----------------------------
DROP TABLE IF EXISTS `column`;
CREATE TABLE `column` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL COMMENT '栏目名',
  `p_id` int(11) NOT NULL DEFAULT '0' COMMENT '父id',
  `status` tinyint(4) DEFAULT '1' COMMENT '记录状态，0禁用，1激活',
  `sort` int(11) DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`,`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COMMENT='栏目表,二级分类';

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
INSERT INTO `column` VALUES ('44', '456456', '4', '1', '0');

-- ----------------------------
-- Table structure for `news`
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL COMMENT '标题',
  `cover` varchar(150) DEFAULT '' COMMENT '封面图片',
  `contents` text NOT NULL COMMENT '内容',
  `column` int(11) NOT NULL DEFAULT '0' COMMENT '标签是新闻栏目还是商业合作栏目',
  `sub_column_id` int(11) NOT NULL COMMENT '子栏目id',
  `create_time` varchar(45) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`,`create_time`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='新闻表，包括新闻发布和商业合作栏目';

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES ('2', '商业合作', null, '<p>adfasdfsadf</p>', '1', '27', '1409020940');
INSERT INTO `news` VALUES ('3', '江湖救急 测试修改', null, '<p>测试编辑再测试asdfasdfasdf</p>', '1', '27', '1408891652');
INSERT INTO `news` VALUES ('6', '新闻发布', null, '<p>新闻发布</p><p><img src=\"/upload/image/20140824/1408892295139286.jpg\" title=\"1408892295139286.jpg\" alt=\"4604.jpg\"/></p>', '5', '34', '1408892296');
INSERT INTO `news` VALUES ('8', '商业合作', 'upload/cover/20140827/31_2014082716303753fd972dd66c2.jpg', '<p>tttttttttttttttt</p>_ueditor_page_break_tag_<p>sdfasdfasdf</p><p><br/></p><p><br/></p><p><span style=\"color: rgb(227, 108, 9);\">werqwerqwr</span></p>', '2', '31', '1408936331');
INSERT INTO `news` VALUES ('9', '11111111', 'upload/cover/20140827/30_2014082716304753fd973759048.jpg', '<p>asdfasdfasdf</p><p>asdf</p>_ueditor_page_break_tag_<p>eeeee</p>', '2', '30', '1408958560');
INSERT INTO `news` VALUES ('11', '彩妆培训2', null, '<p></p><p><span style=\"line-height: 19.5px; background-color: rgb(255, 255, 255); color: rgb(51, 51, 51); font-size: 14px; font-family: arial, helvetica, sans-serif;\"><strong>课程介绍：</strong>本课程为化妆基础课程，适合无任何基础的学员学习。</span><br style=\"font-family: Arial, Tahoma, PMingLiu, sans-serif; font-size: 13px; line-height: 19.5px; white-space: normal; background-color: rgb(255, 255, 255);\"/><span style=\"line-height: 19.5px; background-color: rgb(255, 255, 255); color: rgb(51, 51, 51); font-size: 14px; font-family: arial, helvetica, sans-serif;\"><strong>培养目标：</strong>对彩妆、美甲、各类盘发造型、服装搭配、形象设计等方面感兴趣的学生、白领、工作族，或因工作、职场、社交、交友等需要自我形象提升的人群。</span><br style=\"font-family: Arial, Tahoma, PMingLiu, sans-serif; font-size: 13px; line-height: 19.5px; white-space: normal; background-color: rgb(255, 255, 255);\"/><span style=\"line-height: 19.5px; background-color: rgb(255, 255, 255); color: rgb(51, 51, 51); font-size: 14px; font-family: arial, helvetica, sans-serif;\"><strong>授课方式：</strong>小班制或一对一顾问化教学、创新模块教学、多媒体PPT教学、示范、互动、实训。</span><br style=\"font-family: Arial, Tahoma, PMingLiu, sans-serif; font-size: 13px; line-height: 19.5px; white-space: normal; background-color: rgb(255, 255, 255);\"/><span style=\"line-height: 19.5px; background-color: rgb(255, 255, 255); color: rgb(51, 51, 51); font-size: 14px; font-family: arial, helvetica, sans-serif;\"><strong>课程内容：</strong></span></p><p><span style=\"line-height: 19.5px; background-color: rgb(255, 255, 255); color: rgb(51, 51, 51); font-size: 14px; font-family: arial, helvetica, sans-serif;\"><strong><br/></strong></span></p><p><span style=\"line-height: 19.5px; background-color: rgb(255, 255, 255); color: rgb(51, 51, 51); font-size: 14px; font-family: arial, helvetica, sans-serif;\"><strong><br/></strong></span></p>_ueditor_page_break_tag_<p><br/></p><p><br/></p><p>在列表页应该看不到这些</p><p><br/></p><p>这是下一页</p>', '1', '27', '1409118510');
INSERT INTO `news` VALUES ('12', '时尚整体造型班', null, '<p><span style=\"color: rgb(112, 48, 160);\">时尚整体造型班1</span></p><p><span style=\"color: rgb(0, 32, 96);\">时尚整体造型班2</span></p><p><span style=\"color: rgb(0, 176, 240);\">时尚整体造型班3</span></p><p><span style=\"color: rgb(146, 208, 80);\">时尚整体造型班4</span></p><p><br/></p>_ueditor_page_break_tag_<p>时尚整体造型班5</p><p>时尚整体造型班6</p><p>时尚整体造型班7</p><p><br/></p>', '1', '28', '1409124021');
INSERT INTO `news` VALUES ('13', '舞台表演', 'upload/cover/20140827/30_2014082716301453fd9716c6daf.jpg', '<p>舞台表演</p>', '2', '30', '1409128214');
INSERT INTO `news` VALUES ('14', '测试新闻2', null, '<p>测试新闻2</p><p><br/></p><p>测试新闻2</p>_ueditor_page_break_tag_<p>测试新闻2</p><p>测试新闻2</p><p>测试新闻2</p><p>测试新闻2</p>', '5', '35', '1409130107');

-- ----------------------------
-- Table structure for `product`
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL COMMENT '标题',
  `description` text COMMENT '描述',
  `cover` varchar(150) NOT NULL DEFAULT '' COMMENT '封面',
  `images` text NOT NULL COMMENT '图片集合',
  `column` varchar(45) NOT NULL COMMENT '栏目',
  `sub_column_id` varchar(45) NOT NULL COMMENT '子栏目',
  `create_time` varchar(45) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='作品表：包括作品发布，工作室动态，新娘跟妆栏目';

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES ('2', '作品发布', '作品发布', 'upload/photo/20140825/6_2014082516485453faf876c7388_thumb.png', '[\"upload\\/photo\\/20140825\\/6_2014082516485453faf876c7388_thumb.png\",\"upload\\/photo\\/20140828\\/6_2014082816161453fee54ee9d0d_thumb.jpg\",\"upload\\/photo\\/20140828\\/6_2014082816161553fee54f41954_thumb.jpg\",\"upload\\/photo\\/20140828\\/6_2014082816161553fee54f8287e_thumb.jpg\",\"upload\\/photo\\/20140828\\/6_2014082816161553fee54fd3994_thumb.jpg\"]', '6', '42', '1408956534');
INSERT INTO `product` VALUES ('3', '标题', '标题2222', 'upload/photo/20140828/4_2014082817031153fef04f6fa6f_thumb.jpg', '[\"upload\\/photo\\/20140828\\/4_2014082817031153fef04f6fa6f_thumb.jpg\",\"upload\\/photo\\/20140828\\/4_2014082817034753fef073efaf1_thumb.jpg\",\"upload\\/photo\\/20140828\\/4_2014082817034853fef07422618_thumb.jpg\",\"upload\\/photo\\/20140828\\/4_2014082817034853fef074496cf_thumb.png\",\"upload\\/photo\\/20140828\\/4_2014082817034853fef0748349d_thumb.JPG\"]', '4', '43', '1408958630');
INSERT INTO `product` VALUES ('5', 'dsadsadsa', 'dsadsadas', 'upload/photo/20140828/3_2014082817115553fef25bbf3d7_thumb.jpg', '[\"upload\\/photo\\/20140828\\/3_2014082817115553fef25bbf3d7_thumb.jpg\",\"upload\\/photo\\/20140828\\/3_2014082817120653fef2667afa1_thumb.JPG\"]', '3', '37', '1409019091');
INSERT INTO `product` VALUES ('6', '商业合作', 'tttttttttt', '', '[]', '3', '37', '1409021143');
INSERT INTO `product` VALUES ('7', '彩妆培训3', '彩妆培训3', 'upload/photo/20140828/6_2014082814343453fecd7a2e7e6_thumb.jpg', '[\"upload\\/photo\\/20140828\\/6_2014082814343453fecd7a2e7e6_thumb.jpg\",\"upload\\/photo\\/20140828\\/6_2014082814343453fecd7a8c7ea_thumb.jpg\",\"upload\\/photo\\/20140828\\/6_2014082814343453fecd7adce0f_thumb.jpg\"]', '6', '42', '1409207673');
INSERT INTO `product` VALUES ('8', '11111111', '5555', 'upload/photo/20140828/4_2014082817054253fef0e68c6c8_thumb.JPG', '[\"upload\\/photo\\/20140828\\/4_2014082817054253fef0e68c6c8_thumb.JPG\",\"upload\\/photo\\/20140828\\/4_2014082817060853fef10088417_thumb.JPG\",\"upload\\/photo\\/20140828\\/4_2014082817061053fef102c39a4_thumb.JPG\"]', '4', '44', '1409216742');
INSERT INTO `product` VALUES ('9', '彩妆培训2', 'uuu', 'upload/photo/20140828/3_2014082817065253fef12c8ada5_thumb.JPG', '[\"upload\\/photo\\/20140828\\/3_2014082817065253fef12c8ada5_thumb.JPG\",\"upload\\/photo\\/20140828\\/3_2014082817065353fef12d7affd_thumb.JPG\"]', '3', '38', '1409216812');
INSERT INTO `product` VALUES ('10', '3333333333', 'dddddddd', 'upload/photo/20140828/3_2014082817093353fef1cdddea5_thumb.JPG', '[\"upload\\/photo\\/20140828\\/3_2014082817093353fef1cdddea5_thumb.JPG\",\"upload\\/photo\\/20140828\\/3_2014082817093453fef1cef078c_thumb.jpg\"]', '3', '40', '1409216973');

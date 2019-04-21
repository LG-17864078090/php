/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : school

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-04-18 17:33:11
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `adminID` int(20) NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  `name` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `sex` varchar(2) CHARACTER SET utf8 DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `address` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', '1001', '123', 'admin', '男', '19395402753', '哈尔滨');

-- ----------------------------
-- Table structure for announces
-- ----------------------------
DROP TABLE IF EXISTS `announces`;
CREATE TABLE `announces` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `content` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `publisherID` int(20) NOT NULL,
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of announces
-- ----------------------------
INSERT INTO `announces` VALUES ('10', '阿斯达', 'asdasdasdasdasds', '1001', '2019-04-15 12:42:49');
INSERT INTO `announces` VALUES ('11', '公告一', '这是一条公告', '1001', '2019-04-15 12:47:10');
INSERT INTO `announces` VALUES ('13', '赤赤', '赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤赤', '1001', '2019-04-15 06:57:36');
INSERT INTO `announces` VALUES ('24', '463782', 'xzhghhjx bngzhshjZNBnxvhgcZbxcgHGASdafsfxgvx bzxguaygsvchxcvbj dvccaxvHVxhxgfsHJXbJHnBBCHBHJBBSDHFFBBU盾换肤VB金山毒霸还不是动机不纯绝对不会是否与防水层喜欢吃不是个福三年级卡被警方哈开始发卡机绝大部分九分裤社保卡方式份iue让人和我ue时代峻峰河北省第八次', '1001', '2019-04-18 12:34:46');
INSERT INTO `announces` VALUES ('25', '损失按时', '十大歌手的风格一壶酒从自行车VB你们是电饭锅好几款而法规和健康自行车VB你们， 自行车VB你们， 输入待摊费用股货架而提出与户部街你看了吗是电饭锅回家考虑阿斯顿发个回家考虑中心厨房VB吗相册VB你们， 复印件快乐而推欧赔电饭锅和进口量性福村GV绘笔江南快递费遇到过饮水机欧冠杯枫华府第大祭司份是股东会刺激时刻VB复活甲雕刻时光独一份混双第几奥萨费用太高低速和司机啊 高低床避实就虚阿卡常用成语的股数系家中', '1001', '2019-04-18 12:36:16');

-- ----------------------------
-- Table structure for course
-- ----------------------------
DROP TABLE IF EXISTS `course`;
CREATE TABLE `course` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `courseID` int(20) NOT NULL,
  `courseName` varchar(20) CHARACTER SET utf8 NOT NULL,
  `teacherID` int(20) DEFAULT NULL,
  `classroomNum` int(20) DEFAULT NULL,
  `startweek` int(2) DEFAULT NULL,
  `endweek` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`,`courseID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of course
-- ----------------------------
INSERT INTO `course` VALUES ('3', '123122', '数学', '1997', '65', '2', '13');
INSERT INTO `course` VALUES ('4', '453', '语文', '1996', '563', '3', '9');
INSERT INTO `course` VALUES ('5', '34234', 'c++', '1997', '76', '10', '34');
INSERT INTO `course` VALUES ('6', '654', 'vb', '1997', '543', '1', '3');
INSERT INTO `course` VALUES ('7', '2432', 'java', '1995', '989', '10', '14');
INSERT INTO `course` VALUES ('8', '4534', 'js', '1994', '643', '4', '5');
INSERT INTO `course` VALUES ('9', '4531', '操作系统', '1994', '65', '3', '4');

-- ----------------------------
-- Table structure for grade
-- ----------------------------
DROP TABLE IF EXISTS `grade`;
CREATE TABLE `grade` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `studentID` int(20) NOT NULL,
  `courseID` int(20) NOT NULL,
  `grade` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of grade
-- ----------------------------

-- ----------------------------
-- Table structure for parents
-- ----------------------------
DROP TABLE IF EXISTS `parents`;
CREATE TABLE `parents` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `childID` int(20) NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  `name` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `sex` varchar(2) CHARACTER SET utf8 DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `address` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `teacherID` int(20) DEFAULT NULL,
  `exist` int(2) NOT NULL DEFAULT '0' COMMENT '0未注册，1已注册',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of parents
-- ----------------------------

-- ----------------------------
-- Table structure for school_info
-- ----------------------------
DROP TABLE IF EXISTS `school_info`;
CREATE TABLE `school_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `intro` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `about` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of school_info
-- ----------------------------
INSERT INTO `school_info` VALUES ('1', '                111听人说一个人的时候，温起壶中酒；独倚拜月楼，望着庭中盛放的满院流光；凄冷的冬风定会静静的摇落下一地的相思，只为承载起那些忧伤孤独的过往，在岁月的年轮中不停的刻圈成画；却始终画不到那个所谓的终点。有你的曾经一直潜藏在故事里蔓延着最为凄美的片段，梦中的枯藤已千年不绿；被风吹干后的答案；夺走了彼此记忆中最为动人的拥抱。那些禁锢在心底深处的怅然，冲淡了相聚时的喜悦与快乐；难以掩盖的忧伤中载满了无法清点不舍与难过。123456', '            孩子的教育问题一直是我国家长心中较为重要的事情，尤其是在校外的补课班，家长的关注度一直居高不下，所以，在众多的课外教辅机构中脱颖而出是每一家教育机构都尤为关心的事情。那么，在教学水平和教学环境相差无几的情况下什么才是一家教育机构吸引家长的闪光点呢——服务。\n            目前哈市各大教育机构中都会有一大部分人和学生家长点对点的进行沟通、反馈。这是一个非常庞大的群体，这些人掌握着众多家长和学生的个人信息，对于教育机构来说这是非常有价值的商业资源，但是对于消费者来说这确实非常可怕的信息安全隐患。对此，如何才能在保证服务的同时又能增强个人信息的安全性成为了各家教育机构面临的首要问题。\n            从服务方式来看，传统的教辅机构的服务方式无非是电话follow、KMC、约访沟通等，这样的服务方式无一例外都需要耗费巨大的人力、物力、财力开销，无论是消费者或者是服务者。那么一个全新的服务形式就成为了市场上最迫切需要的也是学生和家长最需要的;\n            从竞争环境来看，现已有比较成熟的平台有“校管家”等，很多教辅机构都非常认可。但是这些都是较大型的网站平台，而且是需要付费才可以使用的，很多规模较小的补课班如果使用这类平台网站，他们的经营成本就会大大增加。所以对于这类规模较小的补课班和不想投入高成本的文化艺术学校来说，一个相对较小切成本较低的平台会更加受欢迎。\n666');

-- ----------------------------
-- Table structure for students
-- ----------------------------
DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `studentID` int(20) NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  `name` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `sex` varchar(2) CHARACTER SET utf8 DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `address` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `teacherID` int(20) DEFAULT NULL,
  `exist` int(2) NOT NULL DEFAULT '0' COMMENT '0未注册，1已注册',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of students
-- ----------------------------
INSERT INTO `students` VALUES ('1', '20162838', 'liguan', '李冠', '男', '13954027535', '哈尔滨', '1997', '1');

-- ----------------------------
-- Table structure for teachers
-- ----------------------------
DROP TABLE IF EXISTS `teachers`;
CREATE TABLE `teachers` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `teacherID` int(20) NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  `name` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `sex` varchar(2) CHARACTER SET utf8 DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `address` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of teachers
-- ----------------------------
INSERT INTO `teachers` VALUES ('1', '1997', 'liguan', '李大大', '男', '13954027535', '哈尔滨');
INSERT INTO `teachers` VALUES ('2', '1996', 'liguan', 'll', '男', '13954027535', 'sasavs');
INSERT INTO `teachers` VALUES ('3', '1995', 'asas', 'asas', '男', '13111111111', '11111');
INSERT INTO `teachers` VALUES ('4', '1994', '123', 'ttt', '男', '13111111111', '11');
INSERT INTO `teachers` VALUES ('5', '12', '12', 'sss', '男', '13111111111', '11111');

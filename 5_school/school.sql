/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : school

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-04-25 09:05:11
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
INSERT INTO `admin` VALUES ('1', '1001', '123', 'admin', '男', '13954027535', '哈尔滨');

-- ----------------------------
-- Table structure for announces
-- ----------------------------
DROP TABLE IF EXISTS `announces`;
CREATE TABLE `announces` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `content` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `publisherID` int(20) NOT NULL,
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of announces
-- ----------------------------
INSERT INTO `announces` VALUES ('10', '阿斯达', 'asdasdasdasdasds', '1001', '2019-04-15 12:42:49');
INSERT INTO `announces` VALUES ('28', '我还年轻', '在这个世界里\n\n寻找着你的梦想\n\n你问我梦想在哪里\n\n我还年轻我还年轻\n\n他们都说\n\n我们把理想都忘在\n\n在那轻狂的日子里\n\n我不哭泣\n\n我不逃避\n\n给我一瓶酒\n\n再给我一支烟\n\n说走就走\n\n我有的是时间\n\n我不想在未来的日子里\n\n独自哭着无法往前\n\n给我一瓶酒\n\n再给我一支烟\n\n说走就走\n\n我有的是时间\n\n我不想在未来的日子里\n\n独自哭着无法往前\n\n在这个世界里\n\n寻找着你的未来\n\n你问我未来在哪里\n\n我还年轻我还年轻\n\n他们都说\n\n我们把理想都忘在\n\n在那轻狂的日子里\n\n我不哭泣\n\n我不逃避\n\n给我一瓶酒\n\n再给我一支烟\n\n说走就走\n\n我有的是时间\n\n我不想在未来的日子里\n\n独自哭着无法往前\n\n给我一瓶酒\n\n再给我一支烟\n\n说走就走\n\n我有的是时间\n\n我不想在未来的日子里\n\n独自哭着无法往前\n\n我在青春的边缘挣扎\n\n我在自由的镜头凝望\n\n我在荒芜的草原上流浪\n\n寻找着理想\n\n我在青春的边缘挣扎\n\n我在自由的镜头凝望\n\n我在荒芜的草原上流浪\n\n寻找着寻找着理想', '1001', '2019-04-18 07:40:12');
INSERT INTO `announces` VALUES ('29', '我曾（Cover：隔壁老樊）', '我曾被无数的冷风\n\n吹透我胸口\n\n我曾被遥远的梦\n\n逼着我仰望星空\n\n我曾被无数的嘲讽\n\n让我放弃我的音乐梦\n\n我曾被无数的黄土\n\n淹没我的澎湃汹涌\n\n我曾想要我的歌声\n\n无尽沉沦的感动\n\n我曾把他们当成我\n\n风雨过后那一道彩虹\n\n我曾把堕落的原因\n\n都丢给时间\n\n我曾把机会就扔在我眼前\n\n我曾把完整的镜子打碎\n\n夜晚的枕头都是眼泪\n\n我多想让过去重来\n\n再给我一次机会\n\n我想说过去的时间\n\n我谁都不为\n\n除了空谈\n\n也就是事事非非\n\n我曾想要我的歌声\n\n无尽沉沦的感动\n\n我曾把他们当作我\n\n风雨过后那一道彩虹\n\n我曾把堕落的原因\n\n都丢给时间\n\n我曾把机会就扔在我眼前\n\n我曾把完整的镜子打碎\n\n夜晚的枕头都是眼泪\n\n我多想让过去重来\n\n再给我一次机会\n\n我想说过去的时间\n\n我谁都不为\n\n除了空谈\n\n也就是事事非非\n\n我曾把完整的镜子打碎\n\n夜晚的枕头都是眼泪\n\n我多想让过去重来\n\n再给我一次机会\n\n我想说过去的时间\n\n我谁都不为\n\n除了空谈\n\n也就是事事非非', '1001', '2019-04-18 07:41:17');
INSERT INTO `announces` VALUES ('30', '电饭锅和进口量是电饭锅回家考虑', 'ear三天打鱼复古红计科', '1001', '2019-04-18 07:42:49');
INSERT INTO `announces` VALUES ('31', 'lalal', 'dcgshgj阿斯钢杜哈快睡吧DAU上帝把苏地哦啊接口文档发芽我的三的十大歌手点发送发顺丰水电费水电费工商分局很快就发挥各服务地方说过的话肥假话该课号很干净发货单工时费打就会根据发货单工时费撒地方的规范化归咎于乳液挺舒服的张旭从下表少加横岗犹太人也太水电费需出厂编号结果因太丰富', '1001', '2019-04-23 09:39:49');

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
  `starttime` int(2) DEFAULT '1',
  `startweek` int(2) DEFAULT NULL,
  `endweek` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`,`courseID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of course
-- ----------------------------
INSERT INTO `course` VALUES ('6', '654', 'vb', '1997', '543', '1', '1', '3');
INSERT INTO `course` VALUES ('7', '2432', 'java', '1995', '989', '1', '10', '14');
INSERT INTO `course` VALUES ('9', '4531', '操作系统', '1994', '65', '3', '3', '4');
INSERT INTO `course` VALUES ('10', '3453', '高数', '1997', '789', '5', '1', '6');
INSERT INTO `course` VALUES ('11', '4532', 'j2ee', '1994', '32', '3', '1', '4');
INSERT INTO `course` VALUES ('14', '6789', '.net', '123', '2342', '7', '5', '8');
INSERT INTO `course` VALUES ('15', '3421', '语文', '1234567', '675', '9', '6', '9');

-- ----------------------------
-- Table structure for feedback
-- ----------------------------
DROP TABLE IF EXISTS `feedback`;
CREATE TABLE `feedback` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `problem` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `feedbackerID` int(20) NOT NULL,
  `feedbackerWork` varchar(15) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of feedback
-- ----------------------------
INSERT INTO `feedback` VALUES ('33', '啦啦啦啦啦', '20162838', 'parent', '2019-04-24 04:14:21');
INSERT INTO `feedback` VALUES ('34', '啧啧啧', '20162838', 'student', '2019-04-24 04:15:04');
INSERT INTO `feedback` VALUES ('35', '我是老师反馈', '1997', 'teacher', '2019-04-25 08:23:35');
INSERT INTO `feedback` VALUES ('36', '学生反馈', '20162838', 'student', '2019-04-25 08:25:18');

-- ----------------------------
-- Table structure for grade
-- ----------------------------
DROP TABLE IF EXISTS `grade`;
CREATE TABLE `grade` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `sID` int(20) NOT NULL,
  `cID` int(20) NOT NULL,
  `grade` int(5) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of grade
-- ----------------------------
INSERT INTO `grade` VALUES ('4', '20162838', '654', '0');
INSERT INTO `grade` VALUES ('8', '20160472', '3453', '0');
INSERT INTO `grade` VALUES ('9', '20160472', '453', '0');
INSERT INTO `grade` VALUES ('10', '20162838', '2432', '0');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of parents
-- ----------------------------
INSERT INTO `parents` VALUES ('1', '20162838', 'liguan', 'LG家长', '男', '13954027535', '哈尔滨南岗家长', '1997', '1');

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
INSERT INTO `school_info` VALUES ('1', '                111听人说一个人的时候，温起壶中酒；独倚拜月楼，望着庭中盛放的满院流光；凄冷的冬风定会静静的摇落下一地的相思，只为承载起那些忧伤孤独的过往，在岁月的年轮中不停的刻圈成画；却始终画不到那个所谓的终点。有你的曾经一直潜藏在故事里蔓延着最为凄美的片段，梦中的枯藤已千年不绿；被风吹干后的答案；夺走了彼此记忆中最为动人的拥抱。那些禁锢在心底深处的怅然，冲淡了相聚时的喜悦与快乐；难以掩盖的忧伤中载满了无法清点不舍与难过。123456嗦嘎啥斤斤计较军', '            孩子的教育问题一直是我国家长心中较为重要的事情，尤其是在校外的补课班，家长的关注度一直居高不下，所以，在众多的课外教辅机构中脱颖而出是每一家教育机构都尤为关心的事情。那么，在教学水平和教学环境相差无几的情况下什么才是一家教育机构吸引家长的闪光点呢——服务。\n            目前哈市各大教育机构中都会有一大部分人和学生家长点对点的进行沟通、反馈。这是一个非常庞大的群体，这些人掌握着众多家长和学生的个人信息，对于教育机构来说这是非常有价值的商业资源，但是对于消费者来说这确实非常可怕的信息安全隐患。对此，如何才能在保证服务的同时又能增强个人信息的安全性成为了各家教育机构面临的首要问题。\n            从服务方式来看，传统的教辅机构的服务方式无非是电话follow、KMC、约访沟通等，这样的服务方式无一例外都需要耗费巨大的人力、物力、财力开销，无论是消费者或者是服务者。那么一个全新的服务形式就成为了市场上最迫切需要的也是学生和家长最需要的;\n            从竞争环境来看，现已有比较成熟的平台有“校管家”等，很多教辅机构都非常认可。但是这些都是较大型的网站平台，而且是需要付费才可以使用的，很多规模较小的补课班如果使用这类平台网站，他们的经营成本就会大大增加。所以对于这类规模较小的补课班和不想投入高成本的文化艺术学校来说，一个相对较小切成本较低的平台会更加受欢迎。ddd\n666\n爱好深V爱好');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of students
-- ----------------------------
INSERT INTO `students` VALUES ('2', '20160472', 'wuxi', '吴玺', '男', '13111111111', '哈尔滨', '1994', '1');
INSERT INTO `students` VALUES ('4', '20162234', 'wuxi', '吴玺玺', '男', '15545992557', '哈尔滨', '1995', '0');
INSERT INTO `students` VALUES ('5', '20162838', '??', '学生李冠', '男', '13954027535', '黑龙江大学', '1997', '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of teachers
-- ----------------------------
INSERT INTO `teachers` VALUES ('1', '1997', '123', 'LG', '男', '13954027515', '哈尔滨老师');
INSERT INTO `teachers` VALUES ('2', '1996', '123', 'll', '男', '13954027535', 'sasavs');
INSERT INTO `teachers` VALUES ('3', '1995', 'asas', 'asas', '男', '13111111111', '11111');
INSERT INTO `teachers` VALUES ('4', '1994', '123', 'ttt', '男', '13111111111', '11');
INSERT INTO `teachers` VALUES ('5', '12', '12', 'sss', '男', '13111111111', '11111');
INSERT INTO `teachers` VALUES ('6', '12345678', '12345678', '吴玺', '男', '13111111111', '洒水大所大啊');
INSERT INTO `teachers` VALUES ('7', '123', '123', '123', '男', '13954027535', '擦洒水');
INSERT INTO `teachers` VALUES ('8', '1234567', 'wuxi', '王建', '男', '15545992775', '北京');

/*
Navicat MySQL Data Transfer

Source Server         : bendi
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : phpcrm01

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-05-07 12:08:17
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `ci_area`
-- ----------------------------
DROP TABLE IF EXISTS `ci_area`;
CREATE TABLE `ci_area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parentid` int(11) DEFAULT '0',
  `name` varchar(50) DEFAULT '',
  `isdel` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='地区管理';

-- ----------------------------
-- Records of ci_area
-- ----------------------------
INSERT INTO `ci_area` VALUES ('11', '0', '北京市', '0');
INSERT INTO `ci_area` VALUES ('12', '11', '朝阳区', '0');
INSERT INTO `ci_area` VALUES ('13', '11', '丰台区', '0');
INSERT INTO `ci_area` VALUES ('14', '11', '西城区', '0');

-- ----------------------------
-- Table structure for `ci_config`
-- ----------------------------
DROP TABLE IF EXISTS `ci_config`;
CREATE TABLE `ci_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT '',
  `value` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='系统设置';

-- ----------------------------
-- Records of ci_config
-- ----------------------------
INSERT INTO `ci_config` VALUES ('1', 'customer', 'a:7:{s:4:\"name\";s:1:\"1\";s:4:\"type\";s:1:\"1\";s:4:\"area\";s:1:\"1\";s:6:\"mobile\";s:1:\"1\";s:6:\"record\";s:1:\"1\";s:7:\"adddate\";s:1:\"1\";s:7:\"adduser\";s:1:\"1\";}');
INSERT INTO `ci_config` VALUES ('2', 'contract', 'a:14:{s:6:\"number\";s:1:\"1\";s:11:\"ordernumber\";s:1:\"1\";s:5:\"sdate\";s:1:\"1\";s:5:\"edate\";s:1:\"1\";s:4:\"type\";s:1:\"1\";s:5:\"money\";s:1:\"1\";s:7:\"yjmoney\";s:1:\"1\";s:7:\"qkmoney\";s:1:\"1\";s:7:\"invoice\";s:1:\"1\";s:3:\"tax\";s:1:\"1\";s:5:\"audit\";s:1:\"1\";s:9:\"audittime\";s:1:\"1\";s:7:\"adduser\";s:1:\"1\";s:7:\"addtime\";s:1:\"1\";}');
INSERT INTO `ci_config` VALUES ('3', 'order', 'a:8:{s:7:\"linkman\";s:1:\"1\";s:5:\"sdate\";s:1:\"1\";s:5:\"edate\";s:1:\"1\";s:7:\"deposit\";s:1:\"1\";s:5:\"state\";s:1:\"1\";s:7:\"content\";s:1:\"1\";s:4:\"user\";s:1:\"1\";s:4:\"time\";s:1:\"1\";}');
INSERT INTO `ci_config` VALUES ('4', 'single', 'a:12:{s:4:\"type\";s:1:\"1\";s:5:\"state\";s:1:\"1\";s:7:\"linkman\";s:1:\"1\";s:8:\"nexttime\";s:1:\"1\";s:7:\"content\";s:1:\"1\";s:7:\"adduser\";s:1:\"1\";s:7:\"addtime\";s:1:\"1\";s:7:\"bt_type\";s:1:\"1\";s:8:\"bt_state\";s:1:\"1\";s:10:\"bt_linkman\";s:1:\"1\";s:11:\"bt_nexttime\";s:1:\"1\";s:10:\"bt_content\";s:1:\"1\";}');
INSERT INTO `ci_config` VALUES ('5', 'service', 'a:16:{s:12:\"customername\";s:1:\"1\";s:5:\"title\";s:1:\"1\";s:7:\"linkman\";s:1:\"1\";s:4:\"type\";s:1:\"1\";s:5:\"edate\";s:1:\"1\";s:7:\"content\";s:1:\"1\";s:5:\"solve\";s:1:\"1\";s:4:\"info\";s:1:\"1\";s:7:\"adduser\";s:1:\"1\";s:7:\"addtime\";s:1:\"1\";s:15:\"bt_customername\";s:1:\"1\";s:8:\"bt_title\";s:1:\"1\";s:7:\"bt_type\";s:1:\"1\";s:10:\"bt_linkman\";s:1:\"1\";s:8:\"bt_edate\";s:1:\"1\";s:10:\"bt_content\";s:1:\"1\";}');
INSERT INTO `ci_config` VALUES ('6', 'financier', 'a:11:{s:5:\"edate\";s:1:\"1\";s:5:\"outin\";s:1:\"1\";s:4:\"type\";s:1:\"1\";s:5:\"money\";s:1:\"1\";s:7:\"content\";s:1:\"1\";s:7:\"adduser\";s:1:\"1\";s:7:\"addtime\";s:1:\"1\";s:8:\"bt_edate\";s:1:\"1\";s:7:\"bt_type\";s:1:\"1\";s:8:\"bt_money\";s:1:\"1\";s:10:\"bt_content\";s:1:\"1\";}');
INSERT INTO `ci_config` VALUES ('7', 'linkmans', 'a:11:{s:4:\"name\";s:1:\"1\";s:3:\"sex\";s:1:\"1\";s:3:\"job\";s:1:\"1\";s:6:\"mobile\";s:1:\"1\";s:3:\"tel\";s:1:\"1\";s:5:\"email\";s:1:\"1\";s:2:\"qq\";s:1:\"1\";s:4:\"alww\";s:1:\"1\";s:7:\"content\";s:1:\"1\";s:7:\"addtime\";s:1:\"1\";s:6:\"Submit\";s:6:\"保存\";}');
INSERT INTO `ci_config` VALUES ('8', 'customer_addmust', 'a:2:{s:7:\"bt_name\";s:1:\"1\";s:6:\"Submit\";s:6:\"保存\";}');

-- ----------------------------
-- Table structure for `ci_contract`
-- ----------------------------
DROP TABLE IF EXISTS `ci_contract`;
CREATE TABLE `ci_contract` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '导航栏目',
  `number` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '',
  `type` varchar(100) DEFAULT '',
  `isinvoice` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '',
  `istax` varchar(50) DEFAULT '',
  `sdate` date DEFAULT NULL,
  `edate` date DEFAULT NULL,
  `uid` int(11) DEFAULT '0',
  `adduser` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '',
  `orderid` int(11) DEFAULT '0',
  `ordernumber` varchar(50) DEFAULT '',
  `fromdate` date DEFAULT NULL,
  `content` text,
  `customerid` int(11) DEFAULT '0',
  `customername` varchar(100) DEFAULT '',
  `reason` varchar(255) DEFAULT '',
  `adddate` date DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  `state` tinyint(1) DEFAULT '3' COMMENT '订单状态 3待审 2合同无效 1合同有效',
  `auditdate` date DEFAULT NULL,
  `audittime` datetime DEFAULT NULL,
  `auditname` varchar(255) DEFAULT '',
  `auditreasons` varchar(255) DEFAULT '',
  `upddate` date DEFAULT NULL,
  `updtime` datetime DEFAULT NULL,
  `money` decimal(11,2) DEFAULT '0.00',
  `qkmoney` decimal(11,2) DEFAULT '0.00',
  `yjmoney` decimal(11,2) DEFAULT '0.00',
  `isdel` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `number` (`number`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='合同管理';

-- ----------------------------
-- Records of ci_contract
-- ----------------------------
INSERT INTO `ci_contract` VALUES ('1', 'HT201905051714048', '买卖', '否', '', '2019-05-05', '2019-05-06', '1', 'TEST', '1', 'DD201905051713359', null, '', '65', '薛十一', '', '2019-05-05', '2019-05-05 17:14:34', '3', null, null, '', '', null, null, '0.00', '0.00', '0.00', '1');

-- ----------------------------
-- Table structure for `ci_customer`
-- ----------------------------
DROP TABLE IF EXISTS `ci_customer`;
CREATE TABLE `ci_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '' COMMENT '任务名称',
  `area1` varchar(50) DEFAULT '' COMMENT '省',
  `area2` varchar(100) DEFAULT '' COMMENT '市',
  `source` varchar(50) DEFAULT '' COMMENT '来源',
  `trade` varchar(50) DEFAULT '' COMMENT '任务类型',
  `type` varchar(50) DEFAULT '' COMMENT '转化情况',
  `address` varchar(255) DEFAULT '' COMMENT '账户信息',
  `email` varchar(50) DEFAULT '' COMMENT '邮箱',
  `start` varchar(50) DEFAULT '0' COMMENT '客户等级',
  `groupid` int(11) DEFAULT '0',
  `linkman` varchar(100) DEFAULT '',
  `job` varchar(50) DEFAULT '' COMMENT '任务链接',
  `zip` varchar(50) DEFAULT '',
  `qq` varchar(50) DEFAULT '',
  `mobile` varchar(50) DEFAULT '' COMMENT '手机号',
  `website` varchar(150) DEFAULT '' COMMENT '公司网址',
  `remark` varchar(255) DEFAULT '' COMMENT '备注',
  `reapp` tinyint(4) DEFAULT '1',
  `uid` int(11) DEFAULT '0' COMMENT '业务员ID',
  `adddate` date DEFAULT NULL COMMENT '录入时间',
  `addtime` datetime DEFAULT NULL,
  `adduser` varchar(50) DEFAULT '' COMMENT '业务员',
  `upddate` date DEFAULT NULL COMMENT '更新时间',
  `lastupdtime` datetime DEFAULT NULL COMMENT '更新时间',
  `deldate` date DEFAULT NULL COMMENT '删除时间',
  `deltime` datetime DEFAULT NULL,
  `nexttime` datetime DEFAULT NULL COMMENT '下次跟进时间',
  `reason` varchar(255) DEFAULT '' COMMENT '原因',
  `isshare` tinyint(1) DEFAULT '0',
  `sharerange` text,
  `isdel` tinyint(1) DEFAULT '0' COMMENT '0正常 1删除',
  `linkman_num` int(11) DEFAULT '0',
  `contract_num` int(11) DEFAULT '0',
  `order_num` int(11) DEFAULT '0',
  `file_num` int(11) DEFAULT '0',
  `service_num` int(11) DEFAULT '0',
  `single_num` int(11) DEFAULT '0',
  `updtime` datetime DEFAULT NULL,
  `weixin` varchar(100) DEFAULT NULL,
  `tel` varchar(100) DEFAULT NULL,
  `record` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8 COMMENT='任务管理';

-- ----------------------------
-- Records of ci_customer
-- ----------------------------
INSERT INTO `ci_customer` VALUES ('47', '333', '77777', '77777', '77777', '77777', '', '77777', '77777', '77777', '0', '3333', '33333', '', '33333', '3333', '77777', '7777', '1', '0', '2019-03-31', '2019-03-31 21:32:23', 'TEST', null, null, null, null, null, '', '0', null, '0', '0', '0', '0', '0', '0', '0', null, '77777', '7777', null);
INSERT INTO `ci_customer` VALUES ('48', '334', '77778', '77778', '77778', '77778', '', '77778', '77778', '77778', '0', '3334', '33334', '', '33334', '3334', '77778', '7778', '1', '0', '2019-03-31', '2019-03-31 21:32:23', 'TEST', null, null, null, null, null, '', '0', null, '0', '0', '0', '0', '0', '0', '0', null, '77778', '7778', null);
INSERT INTO `ci_customer` VALUES ('49', '335', '77779', '77779', '77779', '77779', '', '77779', '77779', '77779', '0', '3335', '33335', '', '33335', '3335', '77779', '7779', '1', '0', '2019-03-31', '2019-03-31 21:32:23', 'TEST', null, null, null, null, null, '', '0', null, '0', '0', '0', '0', '0', '0', '0', null, '77779', '7779', null);
INSERT INTO `ci_customer` VALUES ('50', '336', '77780', '77780', '77780', '77780', '', '77780', '77780', '77780', '0', '3336', '33336', '', '33336', '3336', '77780', '7780', '1', '0', '2019-03-31', '2019-03-31 21:32:23', 'TEST', null, null, null, null, null, '', '0', null, '0', '0', '0', '0', '0', '0', '0', null, '77780', '7780', null);
INSERT INTO `ci_customer` VALUES ('51', '337', '77781', '77781', '77781', '77781', '', '77781', '77781', '77781', '0', '3337', '33337', '', '33337', '3337', '77781', '7781', '1', '0', '2019-03-31', '2019-03-31 21:32:23', 'TEST', null, null, null, null, null, '', '0', null, '0', '0', '0', '0', '0', '0', '0', null, '77781', '7781', null);
INSERT INTO `ci_customer` VALUES ('52', '338', '77782', '77782', '77782', '77782', '', '77782', '77782', '77782', '0', '3338', '33338', '', '33338', '3338', '77782', '7782', '1', '0', '2019-03-31', '2019-03-31 21:32:23', 'TEST', null, null, null, null, null, '', '0', null, '0', '0', '0', '0', '0', '0', '0', null, '77782', '7782', null);
INSERT INTO `ci_customer` VALUES ('53', '339', '77783', '77783', '77783', '77783', '', '77783', '77783', '77783', '0', '3339', '33339', '', '33339', '3339', '77783', '7783', '1', '0', '2019-03-31', '2019-03-31 21:32:23', 'TEST', null, null, null, null, null, '', '0', null, '0', '0', '0', '0', '0', '0', '0', null, '77783', '7783', null);
INSERT INTO `ci_customer` VALUES ('54', '340', '77784', '77784', '77784', '77784', '', '77784', '77784', '77784', '0', '3340', '33340', '', '33340', '3340', '77784', '7784', '1', '0', '2019-03-31', '2019-03-31 21:32:23', 'TEST', null, null, null, null, null, '', '0', null, '0', '0', '0', '0', '0', '0', '0', null, '77784', '7784', null);
INSERT INTO `ci_customer` VALUES ('55', '341', '77785', '77785', '77785', '77785', '', '77785', '77785', '77785', '0', '3341', '33341', '', '33341', '3341', '77785', '7785', '1', '0', '2019-03-31', '2019-03-31 21:32:23', 'TEST', null, null, null, null, null, '', '0', null, '0', '0', '0', '0', '0', '0', '0', null, '77785', '7785', null);
INSERT INTO `ci_customer` VALUES ('56', '342', '77786', '77786', '', '', '', '77786', '77786', '', '0', '3342', '', '', '33342', '3342', '77786', '7786', '1', '0', '2019-03-31', '2019-03-31 21:32:23', 'TEST', '2019-04-01', null, null, null, '2019-05-04 13:00:00', '', '0', null, '0', '1', '0', '0', '0', '0', '0', '2019-04-01 11:52:39', '77786', '7786', '111111111111111111111111111111\r\n111111111111111111111111111111111111111\r\n1111111111111111111111111111111111111111\r\n11111111111111111111111111111111111111111111\r\n11111111111111111111111111111111111111111111\r\n1111111111111111111111111111');
INSERT INTO `ci_customer` VALUES ('57', '张三', null, null, null, null, '', null, null, null, '0', '张三', null, '', null, '15272795114', null, null, '1', '0', '2019-05-05', '2019-05-05 17:12:06', '', null, null, null, null, null, '', '0', null, '0', '0', '0', '0', '0', '0', '0', null, null, null, null);
INSERT INTO `ci_customer` VALUES ('58', '李四', null, null, null, null, '', null, null, null, '0', '李四', null, '', null, '15272795115', null, null, '1', '0', '2019-05-05', '2019-05-05 17:12:06', '', null, null, null, null, null, '', '0', null, '0', '0', '0', '0', '0', '0', '0', null, null, null, null);
INSERT INTO `ci_customer` VALUES ('59', '王五', null, null, null, null, '', null, null, null, '0', '王五', null, '', null, '15272795116', null, null, '1', '0', '2019-05-05', '2019-05-05 17:12:06', '', null, null, null, null, null, '', '0', null, '0', '0', '0', '0', '0', '0', '0', null, null, null, null);
INSERT INTO `ci_customer` VALUES ('60', '赵六', null, null, null, null, '', null, null, null, '0', '赵六', null, '', null, '15272795117', null, null, '1', '0', '2019-05-05', '2019-05-05 17:12:06', '', null, null, null, null, null, '', '0', null, '0', '0', '0', '0', '0', '0', '0', null, null, null, null);
INSERT INTO `ci_customer` VALUES ('61', '田七', null, null, null, null, '', null, null, null, '0', '田七', null, '', null, '15272795118', null, null, '1', '0', '2019-05-05', '2019-05-05 17:12:06', '', null, null, null, null, null, '', '0', null, '0', '0', '0', '0', '0', '0', '0', null, null, null, null);
INSERT INTO `ci_customer` VALUES ('62', '阳八', null, null, null, null, '', null, null, null, '0', '阳八', null, '', null, '15272795119', null, null, '1', '0', '2019-05-05', '2019-05-05 17:12:06', '', null, null, null, null, null, '', '0', null, '0', '0', '0', '0', '0', '0', '0', null, null, null, null);
INSERT INTO `ci_customer` VALUES ('63', '周九', null, null, null, null, '', null, null, null, '0', '周九', null, '', null, '15272795120', null, null, '1', '0', '2019-05-05', '2019-05-05 17:12:06', '', null, null, null, null, null, '', '0', null, '0', '0', '0', '0', '0', '0', '0', null, null, null, null);
INSERT INTO `ci_customer` VALUES ('64', '曹十', null, null, null, null, '', null, null, null, '0', '曹十', null, '', null, '15272795121', null, null, '1', '0', '2019-05-05', '2019-05-05 17:12:06', '', null, null, null, null, null, '', '0', null, '0', '0', '0', '0', '0', '0', '0', null, null, null, null);
INSERT INTO `ci_customer` VALUES ('65', '薛十一', null, null, null, null, '', null, null, null, '0', '薛十一', null, '', null, '15272795122', null, null, '1', '0', '2019-05-05', '2019-05-05 17:12:06', '', null, null, null, null, '2019-05-07 17:00:00', '', '0', null, '0', '1', '0', '1', '0', '0', '0', null, null, null, null);
INSERT INTO `ci_customer` VALUES ('66', '123', '123', '', '其它来源', '', '有意向', '山东', '1111@qq.com', '★', '0', '1', '', '', '1111', '13127290522', '', '11', '1', '1', '2019-05-07', '2019-05-07 08:49:46', 'TEST', '2019-05-07', null, null, null, null, '', '0', null, '0', '0', '0', '0', '0', '0', '0', '2019-05-07 08:51:14', '', '', '刚根据');

-- ----------------------------
-- Table structure for `ci_customer_file`
-- ----------------------------
DROP TABLE IF EXISTS `ci_customer_file`;
CREATE TABLE `ci_customer_file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customerid` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '0' COMMENT '任务名称',
  `customername` varchar(100) DEFAULT '',
  `title` varchar(50) DEFAULT '',
  `filepath` varchar(100) DEFAULT '',
  `filesize` int(11) DEFAULT '0',
  `content` varchar(50) DEFAULT '',
  `uid` int(11) DEFAULT '0',
  `adduser` varchar(50) DEFAULT '',
  `adddate` date DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  `isdel` tinyint(1) DEFAULT '0',
  `oldname` varchar(60) DEFAULT NULL,
  `newname` varchar(60) DEFAULT NULL,
  `fileext` varchar(60) DEFAULT NULL,
  `file_num` int(60) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='客户附件';

-- ----------------------------
-- Records of ci_customer_file
-- ----------------------------

-- ----------------------------
-- Table structure for `ci_files`
-- ----------------------------
DROP TABLE IF EXISTS `ci_files`;
CREATE TABLE `ci_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class` varchar(50) COLLATE utf8_unicode_ci DEFAULT '',
  `filepath` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `content` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `isshare` tinyint(1) DEFAULT '2',
  `uid` int(11) DEFAULT '0',
  `adduser` varchar(50) COLLATE utf8_unicode_ci DEFAULT '',
  `adddate` date DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  `isdel` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='在线客服';

-- ----------------------------
-- Records of ci_files
-- ----------------------------

-- ----------------------------
-- Table structure for `ci_financier`
-- ----------------------------
DROP TABLE IF EXISTS `ci_financier`;
CREATE TABLE `ci_financier` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '关联单号',
  `uid` int(11) DEFAULT '0' COMMENT '用户ID',
  `customerid` int(11) DEFAULT '0',
  `customername` varchar(100) DEFAULT '',
  `contractid` int(11) DEFAULT '0' COMMENT '合同ID',
  `orderid` int(11) DEFAULT '0',
  `type` varchar(50) DEFAULT '',
  `money` decimal(11,2) DEFAULT '0.00',
  `outin` tinyint(4) DEFAULT '1' COMMENT '收入支出 1收 2支',
  `reason` varchar(255) DEFAULT '',
  `content` text COMMENT '处理结果',
  `edate` date DEFAULT NULL COMMENT '收支日期',
  `xdate` date DEFAULT NULL,
  `adduser` varchar(50) DEFAULT '' COMMENT '制单人',
  `adddate` date DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  `isdel` tinyint(1) DEFAULT '0' COMMENT '1删除  0正常',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8 COMMENT='财务管理';

-- ----------------------------
-- Records of ci_financier
-- ----------------------------
INSERT INTO `ci_financier` VALUES ('7', '1', '0', '', '0', '0', '交通费', '11.00', '2', '', 'asdasdasdasd', '2018-03-13', null, 'TEST', '2018-03-13', '2018-03-13 10:13:24', '1');
INSERT INTO `ci_financier` VALUES ('9', '1', '0', '', '0', '0', '餐饮住宿', '123.00', '2', '', '123', '2018-07-12', null, 'TEST', '2018-07-12', '2018-07-12 23:59:58', '1');
INSERT INTO `ci_financier` VALUES ('10', '1', '0', '', '0', '0', '交通费', '500.00', '2', '', '212121', '2018-07-31', null, 'TEST', '2018-07-31', '2018-07-31 11:35:11', '0');
INSERT INTO `ci_financier` VALUES ('11', '1', '0', '', '0', '0', '订单预付款', '3000.00', '1', '', '3000', '2018-10-07', null, 'TEST', '2018-10-07', '2018-10-07 13:37:36', '0');
INSERT INTO `ci_financier` VALUES ('12', '1', '26', 'xiaotian', '0', '0', '产品续费', '300.00', '1', '', '300', '2018-10-07', null, 'TEST', '2018-10-07', '2018-10-07 13:38:09', '0');
INSERT INTO `ci_financier` VALUES ('13', '1', '26', 'xiaotian', '0', '0', '通讯费', '30.00', '2', '', '30', '2018-10-07', null, 'TEST', '2018-10-07', '2018-10-07 13:38:18', '0');
INSERT INTO `ci_financier` VALUES ('17', '1', '25', 'xiaozhang', '15', '16', '合同款', '10000.00', '1', '', '', '2018-12-04', null, 'TEST', '2018-12-04', '2018-12-04 20:40:11', '0');
INSERT INTO `ci_financier` VALUES ('20', '1', '14', '123幼儿园吗', '11', '10', '合同款', '1000.00', '1', '', '', '2018-12-04', null, 'TEST', '2018-12-04', '2018-12-04 20:40:41', '0');
INSERT INTO `ci_financier` VALUES ('22', '1', '26', 'xiaotian', '16', '17', '合同款', '35.00', '1', '', '', '2019-03-31', null, 'TEST', '2019-03-31', '2019-03-31 19:35:51', '0');
INSERT INTO `ci_financier` VALUES ('23', '1', '26', 'xiaotian', '16', '17', '合同款', '500.00', '1', '', '', '2019-03-31', null, 'TEST', '2019-03-31', '2019-03-31 19:49:06', '0');
INSERT INTO `ci_financier` VALUES ('24', '1', '26', 'xiaotian', '16', '17', '合同款', '600.00', '1', '', '', '2019-03-31', null, 'TEST', '2019-03-31', '2019-03-31 19:49:17', '0');
INSERT INTO `ci_financier` VALUES ('25', '1', '26', 'xiaotian', '16', '17', '合同款', '200.00', '1', '', '', '2019-03-31', null, 'TEST', '2019-03-31', '2019-03-31 19:55:30', '0');
INSERT INTO `ci_financier` VALUES ('26', '1', '26', 'xiaotian', '17', '17', '合同款', '300.00', '1', '', '', '2019-03-31', null, 'TEST', '2019-03-31', '2019-03-31 19:56:11', '0');
INSERT INTO `ci_financier` VALUES ('27', '1', '26', 'xiaotian', '17', '17', '合同款', '100.00', '1', '', '', '2019-03-31', null, 'TEST', '2019-03-31', '2019-03-31 19:56:58', '0');
INSERT INTO `ci_financier` VALUES ('28', '1', '26', 'xiaotian', '17', '17', '合同款', '300.00', '1', '', '', '2019-03-31', null, 'TEST', '2019-03-31', '2019-03-31 19:57:04', '0');
INSERT INTO `ci_financier` VALUES ('29', '1', '26', 'xiaotian', '17', '17', '合同款', '30.00', '1', '', '', '2019-03-31', null, 'TEST', '2019-03-31', '2019-03-31 19:57:18', '0');
INSERT INTO `ci_financier` VALUES ('30', '1', '26', 'xiaotian', '17', '17', '合同款', '5.00', '1', '', '', '2019-03-31', null, 'TEST', '2019-03-31', '2019-03-31 19:57:25', '0');
INSERT INTO `ci_financier` VALUES ('31', '1', '26', 'xiaotian', '17', '17', '合同款', '2.00', '1', '', '', '2019-03-31', null, 'TEST', '2019-03-31', '2019-03-31 19:57:37', '0');
INSERT INTO `ci_financier` VALUES ('32', '1', '26', 'xiaotian', '17', '17', '合同款', '0.00', '1', '', '', '2019-03-31', null, 'TEST', '2019-03-31', '2019-03-31 20:00:22', '0');
INSERT INTO `ci_financier` VALUES ('33', '1', '26', 'xiaotian', '17', '17', '合同款', '1.00', '1', '', '', '2019-03-31', null, 'TEST', '2019-03-31', '2019-03-31 20:03:44', '0');
INSERT INTO `ci_financier` VALUES ('34', '1', '26', 'xiaotian', '18', '17', '合同款', '1.00', '1', '', '', '2019-03-31', null, 'TEST', '2019-03-31', '2019-03-31 20:07:20', '0');
INSERT INTO `ci_financier` VALUES ('35', '1', '26', 'xiaotian', '18', '17', '合同款', '100.00', '1', '', '', '2019-03-31', null, 'TEST', '2019-03-31', '2019-03-31 20:07:57', '0');
INSERT INTO `ci_financier` VALUES ('36', '1', '26', 'xiaotian', '18', '17', '合同款', '500.00', '1', '', '', '2019-03-31', null, 'TEST', '2019-03-31', '2019-03-31 20:08:05', '0');
INSERT INTO `ci_financier` VALUES ('37', '1', '26', 'xiaotian', '18', '17', '合同款', '137.00', '1', '', '', '2019-03-31', null, 'TEST', '2019-03-31', '2019-03-31 20:08:15', '0');
INSERT INTO `ci_financier` VALUES ('38', '1', '26', 'xiaotian', '19', '18', '合同款', '100.00', '1', '', '', '2019-03-31', null, 'TEST', '2019-03-31', '2019-03-31 20:22:20', '0');
INSERT INTO `ci_financier` VALUES ('39', '1', '26', 'xiaotian', '19', '18', '合同款', '300.00', '1', '', '', '2019-03-31', null, 'TEST', '2019-03-31', '2019-03-31 20:22:28', '0');
INSERT INTO `ci_financier` VALUES ('40', '1', '26', 'xiaotian', '19', '18', '合同款', '130.00', '1', '', '', '2019-03-31', null, 'TEST', '2019-03-31', '2019-03-31 20:22:34', '0');
INSERT INTO `ci_financier` VALUES ('41', '1', '26', 'xiaotian', '19', '18', '合同款', '7.00', '1', '', '', '2019-03-31', null, 'TEST', '2019-03-31', '2019-03-31 20:22:40', '0');
INSERT INTO `ci_financier` VALUES ('42', '1', '26', 'xiaotian', '19', '18', '合同款', '8.00', '1', '', '', '2019-03-31', null, 'TEST', '2019-03-31', '2019-03-31 20:22:44', '0');
INSERT INTO `ci_financier` VALUES ('43', '1', '26', 'xiaotian', '20', '18', '合同款', '1.00', '1', '', '', '2019-03-31', null, 'TEST', '2019-03-31', '2019-03-31 20:27:32', '0');
INSERT INTO `ci_financier` VALUES ('44', '1', '26', 'xiaotian', '20', '18', '合同款', '530.00', '1', '', '', '2019-03-31', null, 'TEST', '2019-03-31', '2019-03-31 20:27:40', '0');
INSERT INTO `ci_financier` VALUES ('45', '1', '26', 'xiaotian', '20', '18', '合同款', '6.00', '1', '', '', '2019-03-31', null, 'TEST', '2019-03-31', '2019-03-31 20:30:35', '0');
INSERT INTO `ci_financier` VALUES ('46', '1', '26', 'xiaotian', '21', '18', '合同款', '1.00', '1', '', '', '2019-03-31', null, 'TEST', '2019-03-31', '2019-03-31 20:35:17', '0');
INSERT INTO `ci_financier` VALUES ('47', '1', '26', 'xiaotian', '21', '18', '合同款', '230.00', '1', '', '', '2019-03-31', null, 'TEST', '2019-03-31', '2019-03-31 20:35:23', '0');
INSERT INTO `ci_financier` VALUES ('48', '1', '26', 'xiaotian', '21', '18', '合同款', '306.00', '1', '', '', '2019-03-31', null, 'TEST', '2019-03-31', '2019-03-31 20:35:30', '1');
INSERT INTO `ci_financier` VALUES ('49', '1', '26', 'xiaotian', '21', '18', '合同款', '3.00', '1', '', '', '2019-03-31', null, 'TEST', '2019-03-31', '2019-03-31 20:35:37', '1');
INSERT INTO `ci_financier` VALUES ('50', '1', '26', 'xiaotian', '28', '19', '合同款', '1.00', '1', '', '', '2019-03-31', null, 'TEST', '2019-03-31', '2019-03-31 21:20:17', '0');
INSERT INTO `ci_financier` VALUES ('51', '1', '26', 'xiaotian', '28', '19', '合同款', '100.00', '1', '', '', '2019-03-31', null, 'TEST', '2019-03-31', '2019-03-31 21:20:24', '1');
INSERT INTO `ci_financier` VALUES ('52', '1', '26', 'xiaotian', '28', '19', '合同款', '900.00', '1', '', '', '2019-03-31', null, 'TEST', '2019-03-31', '2019-03-31 21:20:30', '0');
INSERT INTO `ci_financier` VALUES ('53', '1', '26', 'xiaotian', '28', '19', '合同款', '106.00', '1', '', '', '2019-03-31', null, 'TEST', '2019-03-31', '2019-03-31 21:20:35', '1');

-- ----------------------------
-- Table structure for `ci_linkman`
-- ----------------------------
DROP TABLE IF EXISTS `ci_linkman`;
CREATE TABLE `ci_linkman` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customerid` int(11) DEFAULT '0' COMMENT '客户ID',
  `customername` varchar(100) DEFAULT '',
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '0' COMMENT '任务链接',
  `sex` varchar(50) DEFAULT '' COMMENT '性别',
  `uid` int(11) DEFAULT '0',
  `adduser` varchar(50) DEFAULT '' COMMENT '税率',
  `email` varchar(50) DEFAULT '',
  `qq` varchar(50) DEFAULT '0' COMMENT '0启用   1禁用',
  `msn` varchar(50) DEFAULT '',
  `tel` varchar(50) DEFAULT NULL,
  `alww` varchar(100) DEFAULT '',
  `job` varchar(50) DEFAULT '' COMMENT '任务链接',
  `weixin` varchar(100) DEFAULT '',
  `birthday` date DEFAULT NULL,
  `mobile` varchar(50) DEFAULT '' COMMENT '手机号',
  `content` text COMMENT '备注',
  `adddate` date DEFAULT NULL,
  `isdel` tinyint(1) DEFAULT '0' COMMENT '0正常 1删除',
  `upddate` date DEFAULT NULL,
  `updtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COMMENT='任务链接';

-- ----------------------------
-- Records of ci_linkman
-- ----------------------------
INSERT INTO `ci_linkman` VALUES ('8', '14', '123幼儿园吗', '刘老师', '女士', '1', 'admin', '1102780011@qq.com', '12345', '', null, '', '董事长', '', '0000-00-00', '17777099906', '好', '2018-08-09', '0', null, null);
INSERT INTO `ci_linkman` VALUES ('23', '24', null, '王天霸', '', '1', 'admin', null, '74123', '', null, '', '董事长', '', null, '186523546', null, '2018-09-14', '0', null, null);
INSERT INTO `ci_linkman` VALUES ('24', '24', '小王', '张三丰', '女士', '1', 'admin', '', '963852', '', null, '', '董事长', 'liandong360', '0000-00-00', '96325896', '', '2018-09-14', '0', null, null);
INSERT INTO `ci_linkman` VALUES ('25', '25', null, 'xiaozhang', '', '10', 'ceshi2', null, '1236534', '', null, '', '总经理', '', null, '78952631', null, '2018-09-26', '0', null, null);
INSERT INTO `ci_linkman` VALUES ('26', '26', null, 'xiaotian', '', '9', 'ceshi', null, '745632', '', null, '', '董事长', '', null, '895623547', null, '2018-09-26', '0', null, null);
INSERT INTO `ci_linkman` VALUES ('27', '56', '342', 'xiaoming', '先生', '1', 'admin', '', '', '', null, '', '董事长', '', '0000-00-00', '', '', '2019-04-01', '0', null, null);
INSERT INTO `ci_linkman` VALUES ('28', '65', '薛十一', 'ss', '先生', '1', 'admin', '', '', '', null, '', '董事长', '', '0000-00-00', 'sss', '', '2019-05-05', '0', null, null);
INSERT INTO `ci_linkman` VALUES ('29', '66', null, '1', '', '1', 'admin', null, '1111', '', null, '', '', '', null, '13127290522', null, '2019-05-07', '0', null, null);

-- ----------------------------
-- Table structure for `ci_mail`
-- ----------------------------
DROP TABLE IF EXISTS `ci_mail`;
CREATE TABLE `ci_mail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) DEFAULT '',
  `uid` int(11) DEFAULT '0',
  `user` varchar(50) DEFAULT '',
  `receive` varchar(50) DEFAULT '' COMMENT '接收邮箱',
  `title` varchar(50) DEFAULT NULL,
  `content` text,
  `cdate` date DEFAULT NULL,
  `ctime` datetime DEFAULT NULL,
  `isdel` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COMMENT='邮件管理';

-- ----------------------------
-- Records of ci_mail
-- ----------------------------
INSERT INTO `ci_mail` VALUES ('29', '', '1', 'TEST', '1317155132@qq.com', '小李子', '小李子', '2018-10-11', '2018-10-11 11:41:59', '0');

-- ----------------------------
-- Table structure for `ci_mail_template`
-- ----------------------------
DROP TABLE IF EXISTS `ci_mail_template`;
CREATE TABLE `ci_mail_template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) DEFAULT '',
  `uid` int(11) DEFAULT '0',
  `user` varchar(50) DEFAULT '',
  `receive` varchar(50) DEFAULT '' COMMENT '接收邮箱',
  `title` varchar(50) DEFAULT NULL,
  `content` text,
  `cdate` date DEFAULT NULL,
  `ctime` datetime DEFAULT NULL,
  `isdel` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='邮件模板';

-- ----------------------------
-- Records of ci_mail_template
-- ----------------------------
INSERT INTO `ci_mail_template` VALUES ('1', '合同到期提醒', '1', 'TEST', '二是热水', '合同即将到期，您需要续费了！', '&lt;meta http-equiv=&quot;Content-Type&quot; content=&quot;text/html; charset=utf8&quot; /&gt;\r\n&lt;style&gt;\r\n* { padding: 0; margin: 0; }\r\n&lt;/style&gt;\r\n&lt;div style=&quot;max-width:1200px;width:100%;margin:0 auto;margin-top:5px;margin-bottom:5px;border:1px solid #ddd;font-family:微软雅黑,宋体;font-size:14px;line-height:25px;&quot;&gt;\r\n	&lt;div style=&quot;height:60px;background:#f8f8f8;border-bottom:1px solid #ddd;line-height:60px;&quot;&gt;\r\n		&lt;span style=&quot;float:right;padding-right:10px;color:red;&quot;&gt;服务热线：400-089-6780&lt;/span&gt; \r\n		&lt;h1 style=&quot;font-size:18px;padding-left:10px;&quot;&gt;\r\n			XXX信息技术有限公司\r\n		&lt;/h1&gt;\r\n	&lt;/div&gt;\r\n	&lt;div style=&quot;min-height:300px;width:80%;margin:0 auto;padding:20px 0 20px 0;&quot;&gt;\r\n		&lt;div style=&quot;font-weight:bold;&quot;&gt;\r\n			亲爱的客户：[Mail_任务名称]，感谢您与我们的合作！\r\n		&lt;/div&gt;\r\n		&lt;div&gt;\r\n			您在我司的合同/产品需要续费了！合同到期请及时联系我们&lt;span style=&quot;font-family:\\\'Microsoft YaHei\\\', 微软雅黑, 宋体, STHeiti, MingLiu, Verdana, Geneva, sans-serif;line-height:35px;white-space:normal;background-color:#FFFFFF;&quot;&gt;&lt;/span&gt; \r\n		&lt;/div&gt;\r\n	&lt;/div&gt;\r\n	&lt;div style=&quot;height:50px;background:#f8f8f8;border-top:1px solid #ddd;padding:5px;font-size:12px;&quot;&gt;\r\n		&lt;p&gt;\r\n			本邮件来自系统自动发送！\r\n		&lt;/p&gt;\r\n		&lt;p&gt;\r\n			手机：15888888888 &amp;nbsp;电话：010-88888888 &amp;nbsp;QQ：888888888 &amp;nbsp;网址：www.abc.com\r\n		&lt;/p&gt;\r\n	&lt;/div&gt;\r\n&lt;/div&gt;', '2016-08-31', '2016-08-31 12:49:37', '0');
INSERT INTO `ci_mail_template` VALUES ('2', '公司介绍', '1', 'TEST', '', 'XXX信息技术有限公司介绍', '&lt;meta http-equiv=&quot;Content-Type&quot; content=&quot;text/html; charset=utf-8&quot; /&gt;\r\n&lt;style&gt;\r\n* { padding: 0; margin: 0; }\r\n&lt;/style&gt;\r\n&lt;div style=&quot;max-width:1200px;width:100%;margin:0 auto;margin-top:5px;margin-bottom:5px;border:1px solid #ddd;font-family:微软雅黑,宋体;font-size:14px;line-height:25px;&quot;&gt;\r\n	&lt;div style=&quot;height:60px;background:#f8f8f8;border-bottom:1px solid #ddd;line-height:60px;&quot;&gt;\r\n		&lt;span style=&quot;float:right;padding-right:10px;color:red;&quot;&gt;服务热线：400-089-8888&lt;/span&gt; \r\n		&lt;h1 style=&quot;font-size:18px;padding-left:10px;&quot;&gt;\r\n			XXX信息技术有限公司\r\n		&lt;/h1&gt;\r\n	&lt;/div&gt;\r\n	&lt;div style=&quot;min-height:300px;width:80%;margin:0 auto;padding:20px 0 20px 0;&quot;&gt;\r\n		&lt;div style=&quot;font-weight:bold;&quot;&gt;\r\n			亲爱的客户：[Mail_任务名称]，感谢您对我们的关注！\r\n		&lt;/div&gt;\r\n		&lt;div&gt;\r\n			我们公司主要从事于......\r\n		&lt;/div&gt;\r\n	&lt;/div&gt;\r\n	&lt;div style=&quot;height:50px;background:#f8f8f8;border-top:1px solid #ddd;padding:5px;font-size:12px;&quot;&gt;\r\n		&lt;p&gt;\r\n			本邮件来自系统自动发送！\r\n		&lt;/p&gt;\r\n		&lt;p&gt;\r\n			手机：15888888888 &amp;nbsp;电话：010-88888888 &amp;nbsp;QQ：888888888 &amp;nbsp;网址：www.abc.com\r\n		&lt;/p&gt;\r\n	&lt;/div&gt;\r\n&lt;/div&gt;', '2016-08-31', '2016-08-31 17:10:44', '0');
INSERT INTO `ci_mail_template` VALUES ('3', '是是是', '1', 'TEST', '', '是是是', '萨达萨达萨达撒的萨达萨达萨达', '2017-01-02', '2017-01-02 17:35:26', '0');

-- ----------------------------
-- Table structure for `ci_menu`
-- ----------------------------
DROP TABLE IF EXISTS `ci_menu`;
CREATE TABLE `ci_menu` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT COMMENT '导航栏目',
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '栏目名称',
  `parentid` smallint(5) DEFAULT '0' COMMENT '上级栏目ID',
  `path` varchar(100) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '栏目路径',
  `depth` tinyint(2) DEFAULT '1' COMMENT '层次',
  `ordnum` smallint(6) DEFAULT '0' COMMENT '排序',
  `url` varchar(200) COLLATE utf8_unicode_ci DEFAULT '',
  `murl` varchar(200) COLLATE utf8_unicode_ci DEFAULT '',
  `target` varchar(50) COLLATE utf8_unicode_ci DEFAULT 'self',
  `class` int(11) DEFAULT '1' COMMENT '屏',
  `icon` varchar(50) COLLATE utf8_unicode_ci DEFAULT '',
  `appid` int(11) DEFAULT '0',
  `apptype` varchar(50) COLLATE utf8_unicode_ci DEFAULT '' COMMENT 'menu 桌面显示',
  `remark` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `type` varchar(50) COLLATE utf8_unicode_ci DEFAULT '',
  `mtype` varchar(50) COLLATE utf8_unicode_ci DEFAULT '',
  `uid` int(11) DEFAULT '0',
  `user` varchar(80) COLLATE utf8_unicode_ci DEFAULT '',
  `islock` tinyint(1) DEFAULT '0',
  `isdel` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `parentId` (`parentid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='菜单管理';

-- ----------------------------
-- Records of ci_menu
-- ----------------------------
INSERT INTO `ci_menu` VALUES ('1', '系统设置', '0', '1', '1', '0', '', '', 'self', '1', '', '0', '', '', 'system', '', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('2', '部门设置', '0', '2', '1', '0', '', '', 'self', '1', '', '0', '', '', 'system', '', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('3', '地区设置', '0', '3', '1', '8', 'area', '', 'self', '4', '408.png', '408', 'sapp', '', 'system', '', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('4', '文件管理', '0', '4', '1', '11', 'files', '', 'self', '1', '111.png', '111', 'app', '', 'system', '', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('5', '数据统计', '0', '5', '1', '14', 'summary', '', 'self', '1', '114.png', '114', 'app', '', 'system', '', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('6', '邮件管理', '0', '6', '1', '13', 'mail/add', '', 'self', '1', '113.png', '113', 'app', '', 'system', '', '0', '', '0', '1');
INSERT INTO `ci_menu` VALUES ('7', '选项值设置', '0', '7', '1', '0', '', '', 'self', '1', '', '0', '', '', 'system', '', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('8', '导出Excel', '0', '8', '1', '1', 'export', '', 'self', '4', '401.png', '401', 'sapp', '', 'system', '', '0', '', '0', '1');
INSERT INTO `ci_menu` VALUES ('9', '导入Excel', '0', '9', '1', '2', 'import', '', 'self', '4', '402.png', '402', 'sapp', '', 'system', '', '0', '', '0', '1');
INSERT INTO `ci_menu` VALUES ('10', '批量操作', '0', '10', '1', '0', '', '', 'self', '1', '', '0', '', '', 'system', '', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('11', '客户共享', '0', '11', '1', '0', '', '', 'self', '1', '1016.png', '1016', '', '', 'system', '', '0', '', '0', '1');
INSERT INTO `ci_menu` VALUES ('12', '订单处理', '0', '12', '1', '0', '', '', 'self', '1', '', '0', '', '', 'system', '', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('13', '客户转移', '0', '13', '1', '0', '', '', 'self', '1', '', '0', '', '', 'system', '', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('14', '售后处理', '0', '14', '1', '0', '', '', 'self', '1', '', '0', '', '', 'system', '', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('15', '合同审核', '0', '15', '1', '0', '', '', 'self', '1', '', '0', '', '', 'system', '', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('16', '回收站', '0', '16', '1', '7', 'recycle', '', 'self', '1', '107.png', '107', 'app', '', 'system', '', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('17', '邮件管理', '0', '17', '1', '13', 'mail', '', 'self', '1', '113.png', '113', 'app', '', 'system', '', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('18', '任务管理', '0', '18', '1', '1', 'customer', 'm/customer', 'self', '1', '101.png', '101', 'app', '', 'customer', 'm', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('19', '查看', '18', '18,19', '2', '0', '', '', 'self', '1', '', '0', '', '', 'customer', '', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('20', '新增', '18', '18,20', '2', '0', '', '', 'self', '1', '', '0', '', '', 'customer', '', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('21', '修改', '18', '18,21', '2', '0', '', '', 'self', '1', '', '0', '', '', 'customer', '', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('22', '删除', '18', '18,22', '2', '0', '', '', 'self', '1', '', '0', '', '', 'customer', '', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('23', '任务链接', '0', '23', '1', '0', '', '', 'self', '1', '', '0', '', '', 'customer', '', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('24', '查看', '23', '23,24', '2', '0', '', '', 'self', '1', '', '0', '', '', 'customer', '', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('25', '新增', '23', '23,25', '2', '0', '', '', 'self', '1', '', '0', '', '', 'customer', '', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('26', '修改', '23', '23,26', '2', '0', '', '', 'self', '1', '', '0', '', '', 'customer', '', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('27', '删除', '23', '23,27', '2', '0', '', '', 'self', '1', '', '0', '', '', 'customer', '', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('28', '跟单管理', '0', '28', '1', '2', 'single', 'm/single', 'self', '1', '102.png', '102', 'app', '', 'customer', 'm', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('29', '查看', '28', '28,29', '2', '0', '', '', 'self', '1', '', '0', '', '', 'customer', '', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('30', '新增', '28', '28,30', '2', '0', '', '', 'self', '1', '', '0', '', '', 'customer', '', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('31', '修改', '28', '28,31', '2', '0', '', '', 'self', '1', '', '0', '', '', 'customer', '', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('32', '删除', '28', '28,32', '2', '0', '', '', 'self', '1', '', '0', '', '', 'customer', '', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('33', '订单管理', '0', '33', '1', '3', 'order', 'm/order', 'self', '1', '103.png', '103', 'app', '', 'customer', 'm', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('34', '查看', '33', '33,34', '2', '0', '', '', 'self', '1', '', '0', '', '', 'customer', '', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('35', '新增', '33', '33,35', '2', '0', '', '', 'self', '1', '', '0', '', '', 'customer', '', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('36', '修改', '33', '33,36', '2', '0', '', '', 'self', '1', '', '0', '', '', 'customer', '', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('37', '删除', '33', '33,37', '2', '0', '', '', 'self', '1', '', '0', '', '', 'customer', '', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('38', '合同管理', '0', '38', '1', '4', 'contract', 'm/contract', 'self', '1', '104.png', '104', 'app', '', 'customer', 'm', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('39', '查询', '38', '38,39', '2', '0', '', '', 'self', '1', '', '0', '', '', 'customer', '', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('40', '新增', '38', '38,40', '2', '0', '', '', 'self', '1', '', '0', '', '', 'customer', '', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('41', '修改', '38', '38,41', '2', '0', '', '', 'self', '1', '', '0', '', '', 'customer', '', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('42', '删除', '38', '38,42', '2', '0', '', '', 'self', '1', '', '0', '', '', 'customer', '', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('43', '售后管理', '0', '43', '1', '5', 'service', 'm/service', 'self', '1', '105.png', '105', 'app', '', 'customer', 'm', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('44', '查询', '43', '43,44', '2', '0', '', '', 'self', '1', '', '0', '', '', 'customer', '', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('45', '新增', '43', '43,45', '2', '0', '', '', 'self', '1', '', '0', '', '', 'customer', '', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('46', '修改', '43', '43,46', '2', '0', '', '', 'self', '1', '', '0', '', '', 'customer', '', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('47', '删除', '43', '43,47', '2', '0', '', '', 'self', '1', '', '0', '', '', 'customer', '', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('48', '财务管理', '0', '48', '1', '8', 'financier', 'm/financier', 'self', '1', '108.png', '108', 'app', '', 'customer', 'm', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('49', '查看', '48', '48,49', '2', '0', '', '', 'self', '1', '', '0', '', '', 'customer', '', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('50', '新增', '48', '48,50', '2', '0', '', '', 'self', '1', '', '0', '', '', 'customer', '', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('51', '修改', '48', '48,51', '2', '0', '', '', 'self', '1', '', '0', '', '', 'customer', '', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('52', '删除', '48', '48,52', '2', '0', '', '', 'self', '1', '', '0', '', '', 'customer', '', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('53', '附件管理', '0', '53', '1', '0', 'files', '', 'self', '1', '111.png', '111', '', '', 'customer', '', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('54', '查看', '53', '53,54', '2', '0', '', '', 'self', '1', '', '0', '', '', 'customer', '', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('55', '新增', '53', '53,55', '2', '0', '', '', 'self', '1', '', '0', '', '', 'customer', '', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('56', '修改', '53', '53,56', '2', '0', '', '', 'self', '1', '', '0', '', '', 'customer', '', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('57', '删除', '53', '53,57', '2', '0', '', '', 'self', '1', '', '0', '', '', 'customer', '', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('58', '内部消息', '0', '58', '1', '9', 'message', 'm/message', 'self', '1', '109.png', '109', 'app', '', 'other', 'm', '0', '', '0', '1');
INSERT INTO `ci_menu` VALUES ('59', '查看', '58', '58,59', '2', '0', '', '', 'self', '1', '', '0', '', '', 'other', '', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('60', '新增', '58', '58,60', '2', '0', '', '', 'self', '1', '', '0', '', '', 'other', '', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('61', '回复', '58', '58,61', '2', '0', '', '', 'self', '1', '', '0', '', '', 'other', '', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('62', '删除', '58', '58,62', '2', '0', '', '', 'self', '1', '', '0', '', '', 'other', '', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('63', '工作报告', '0', '63', '1', '7', 'report', '', 'self', '4', '407.png', '407', 'sapp', '', 'other', '', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('64', '查看', '63', '63,64', '2', '0', '', '', 'self', '1', '', '0', '', '', 'other', '', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('65', '新增', '63', '63,65', '2', '0', '', '', 'self', '1', '', '0', '', '', 'other', '', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('66', '批注', '63', '63,66', '2', '0', '', '', 'self', '1', '', '0', '', '', 'other', '', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('67', '删除', '63', '63,67', '2', '0', '', '', 'self', '1', '', '0', '', '', 'other', '', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('68', '商品进销存 ', '0', '68', '1', '9', 'product', '', 'self', '1', '1081.png', '1081', 'app', '', 'system', '', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('69', '通 讯 录', '0', '69', '1', '10', 'contact', 'm/contact', 'self', '1', '110.png', '110', 'app', '', 'system', 'm', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('70', '日志记录', '0', '70', '1', '5', 'userloginlog', '', 'self', '4', '405.png', '405', 'sapp', '', 'system', '', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('71', '操作日志', '0', '71', '1', '0', '', '', 'self', '1', '', '0', '', '', 'system', '', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('72', '员工管理', '0', '72', '1', '6', 'user', '', 'self', '4', '406.png', '406', 'sapp', '', '', '', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('73', '计算器', '0', '73', '1', '1', 'app/jisuanqi/', '', 'blank', '2', '201.png', '201', 'app', '', '', '', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('74', '快递查询', '0', '74', '1', '2', 'http://www.kuaidi100.com/frame/hao123/new.html', '', 'blank', '2', '202.png', '202', 'app', '', '', '', '0', '', '0', '0');
INSERT INTO `ci_menu` VALUES ('75', '数据导入', '0', '75', '1', '1', 'import/index', 'm/import', 'self', '1', '01.png', '0', 'app', '', 'customer', 'm', '0', '', '0', '0');

-- ----------------------------
-- Table structure for `ci_order`
-- ----------------------------
DROP TABLE IF EXISTS `ci_order`;
CREATE TABLE `ci_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT '0',
  `number` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '' COMMENT '单据编号',
  `adduser` varchar(50) DEFAULT '' COMMENT '制单人',
  `customerid` int(11) DEFAULT '0' COMMENT '客户ID',
  `customername` varchar(100) DEFAULT '' COMMENT '客户姓名',
  `linkman` varchar(11) DEFAULT '' COMMENT '任务链接',
  `state` tinyint(1) DEFAULT '3' COMMENT '订单状态 3未处理 2处理中 1已完成',
  `deposit` decimal(8,2) DEFAULT '0.00' COMMENT '预付款',
  `content` text COMMENT '详情备注',
  `reason` varchar(150) DEFAULT '',
  `auditreason` varchar(255) DEFAULT '',
  `edate` date DEFAULT NULL COMMENT '交单日期',
  `sdate` date DEFAULT NULL COMMENT '下单日期',
  `adddate` date DEFAULT NULL COMMENT '新增日期',
  `addtime` datetime DEFAULT NULL,
  `isdel` tinyint(1) DEFAULT '0' COMMENT '1删除  0正常',
  `upddate` date DEFAULT NULL,
  `updtime` datetime DEFAULT NULL,
  `money` decimal(11,2) DEFAULT '0.00',
  `qkmoney` decimal(65,0) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='订单管理';

-- ----------------------------
-- Records of ci_order
-- ----------------------------
INSERT INTO `ci_order` VALUES ('1', '1', 'DD201905051713359', 'TEST', '65', '薛十一', '', '2', '0.00', '', '', '', '2019-05-31', '2019-05-05', '2019-05-05', '2019-05-05 17:13:43', '0', null, null, '0.00', null);

-- ----------------------------
-- Table structure for `ci_order_product`
-- ----------------------------
DROP TABLE IF EXISTS `ci_order_product`;
CREATE TABLE `ci_order_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderid` int(11) DEFAULT '0',
  `proid` int(11) DEFAULT '0',
  `protitle` varchar(50) DEFAULT '' COMMENT '产品名称',
  `pronum` int(11) DEFAULT '0' COMMENT '数量',
  `proprice` decimal(11,2) DEFAULT '0.00' COMMENT '单价',
  `discount` decimal(11,2) DEFAULT '0.00' COMMENT '折扣',
  `money` decimal(11,2) DEFAULT '0.00' COMMENT '总金额',
  `uid` int(11) DEFAULT '0',
  `adduser` varchar(50) DEFAULT '',
  `content` text COMMENT '详情备注',
  `adddate` date DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  `isdel` tinyint(1) DEFAULT '0' COMMENT '1删除  0正常',
  `qtys` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='订单产品';

-- ----------------------------
-- Records of ci_order_product
-- ----------------------------

-- ----------------------------
-- Table structure for `ci_product`
-- ----------------------------
DROP TABLE IF EXISTS `ci_product`;
CREATE TABLE `ci_product` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `trade` varchar(100) DEFAULT '',
  `strade` varchar(100) DEFAULT '',
  `title` varchar(100) DEFAULT '',
  `qtys` int(11) DEFAULT '0',
  `minqty` int(11) DEFAULT '0',
  `purprice` decimal(8,2) DEFAULT '0.00',
  `saleprice` decimal(8,2) DEFAULT '0.00',
  `property1` varchar(255) DEFAULT '',
  `property2` varchar(255) DEFAULT '',
  `reason` varchar(255) DEFAULT '',
  `uid` int(11) DEFAULT '0',
  `adduser` varchar(255) DEFAULT '',
  `isdel` tinyint(1) DEFAULT '0',
  `addtime` datetime DEFAULT NULL,
  `adddate` date DEFAULT NULL,
  `update` date DEFAULT NULL,
  `updtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `option_name` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COMMENT='产品管理';

-- ----------------------------
-- Records of ci_product
-- ----------------------------
INSERT INTO `ci_product` VALUES ('1', '产品分类', '产品子分类', 'CRM任务管理系统12345', '-1096', '10', '2.00', '20.00', '', '', '', '0', 'TEST', '1', null, null, null, null);
INSERT INTO `ci_product` VALUES ('2', '0', '0', '123', '5', '0', '2.00', '0.00', '', '', '', '0', 'TEST', '1', null, null, null, null);
INSERT INTO `ci_product` VALUES ('3', '产品分类', '产品子分类', '测试12345', '5', '10', '3.00', '10.00', '', '', '', '0', 'TEST', '1', null, null, null, null);
INSERT INTO `ci_product` VALUES ('4', '产品分类是', '产品子分类', '963', '5', '0', '96.00', '198.00', '32', '23', '', '1', 'TEST', '1', '2018-06-12 09:24:47', '2018-06-12', null, null);
INSERT INTO `ci_product` VALUES ('5', 'ttttttttttttt', 'kkkkkkkkkkkkkkkk', 'ghhhhhhhhhhhhhh', '5', '0', '0.00', '0.00', 'hhhhhhhhhh', 'hhhhhhhhhhh', '', '1', 'TEST', '1', '2018-07-05 09:42:53', '2018-07-05', null, '2018-07-05 09:45:50');
INSERT INTO `ci_product` VALUES ('6', 'hhhhhhhhhhhhh', 'kkkkkkkkkkkkkkkk', 'gggggggg', '5', '0', '222222.00', '999999.99', 'gggggggggggg', 'gggggggggg', '', '1', 'TEST', '1', '2018-07-05 09:45:35', '2018-07-05', null, null);
INSERT INTO `ci_product` VALUES ('7', '豪华套餐', '精致套餐', '公司年套餐', '1000', '10', '89.00', '300.00', '人/次', '', '', '1', 'TEST', '0', '2018-07-31 11:32:11', '2018-07-31', null, '2018-12-02 17:08:46');
INSERT INTO `ci_product` VALUES ('8', '园服', '夏装', 'BD123456', '400', '10', '40.00', '500.00', '', '', '', '1', 'TEST', '0', '2018-08-07 16:54:15', '2018-08-07', null, '2018-09-12 10:06:55');
INSERT INTO `ci_product` VALUES ('9', '地板', '悬浮地板', '悬浮地板', '700', '10', '100.00', '3000.00', '', '', '', '1', 'TEST', '0', '2018-08-09 17:28:13', '2018-08-09', null, '2018-09-12 14:50:32');
INSERT INTO `ci_product` VALUES ('10', '地板', 'PVC', 'PVC', '5', '0', '0.00', '0.00', '', '', '', '1', 'TEST', '1', '2018-08-09 17:28:34', '2018-08-09', null, null);
INSERT INTO `ci_product` VALUES ('11', '豪华套餐', '精致套餐', '产品1', '100', '10', '100.00', '199.00', '1', '1', '', '1', 'TEST', '0', '2018-12-02 17:09:58', '2018-12-02', null, null);
INSERT INTO `ci_product` VALUES ('12', '豪华套餐', '精致套餐', '产品2', '100', '10', '69.00', '169.00', '1', '1', '', '1', 'TEST', '0', '2018-12-02 17:10:21', '2018-12-02', null, null);
INSERT INTO `ci_product` VALUES ('13', '豪华套餐', '精致套餐', '产品3', '333', '10', '99.00', '269.00', '1', '1', '', '1', 'TEST', '0', '2018-12-02 17:10:45', '2018-12-02', null, null);
INSERT INTO `ci_product` VALUES ('14', '豪华套餐', '精致套餐', '产品4', '300', '10', '33.00', '136.00', '1', '1', '', '1', 'TEST', '0', '2018-12-02 17:11:13', '2018-12-02', null, null);
INSERT INTO `ci_product` VALUES ('15', '豪华套餐', '精致套餐', '产品5', '33', '10', '33.00', '69.00', '1', '1', '', '1', 'TEST', '0', '2018-12-02 17:11:35', '2018-12-02', null, null);
INSERT INTO `ci_product` VALUES ('16', '豪华套餐', '精致套餐', '产品6', '109', '10', '53.00', '179.00', '1', '1', '', '1', 'TEST', '0', '2018-12-02 17:11:58', '2018-12-02', null, null);
INSERT INTO `ci_product` VALUES ('17', '豪华套餐', '精致套餐', '产品7', '112', '10', '12.00', '46.00', '1', '1', '', '1', 'TEST', '0', '2018-12-02 17:12:19', '2018-12-02', null, null);
INSERT INTO `ci_product` VALUES ('18', '豪华套餐', '精致套餐', '产品8', '11', '10', '11.00', '111.00', '1', '1', '', '1', 'TEST', '0', '2018-12-02 17:12:36', '2018-12-02', null, null);
INSERT INTO `ci_product` VALUES ('19', '豪华套餐', '精致套餐', '产品9', '112', '10', '222.00', '3333.00', '1', '1', '', '1', 'TEST', '0', '2018-12-02 17:12:53', '2018-12-02', null, null);
INSERT INTO `ci_product` VALUES ('20', '豪华套餐', '精致套餐', '产品10', '26', '10', '12.00', '369.00', '33', '33', '', '1', 'TEST', '0', '2018-12-02 17:13:14', '2018-12-02', null, null);

-- ----------------------------
-- Table structure for `ci_product_class`
-- ----------------------------
DROP TABLE IF EXISTS `ci_product_class`;
CREATE TABLE `ci_product_class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parentid` int(11) DEFAULT '0',
  `name` varchar(50) DEFAULT NULL,
  `isdel` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='产品分类';

-- ----------------------------
-- Records of ci_product_class
-- ----------------------------
INSERT INTO `ci_product_class` VALUES ('1', '0', 'ttt', '0');
INSERT INTO `ci_product_class` VALUES ('2', '1', 'gg', '0');
INSERT INTO `ci_product_class` VALUES ('3', '0', 'hhh', '0');
INSERT INTO `ci_product_class` VALUES ('4', '3', 'kkkk', '0');
INSERT INTO `ci_product_class` VALUES ('5', '3', 'ddddddddddd', '1');
INSERT INTO `ci_product_class` VALUES ('6', '0', '豪华套餐', '0');
INSERT INTO `ci_product_class` VALUES ('7', '0', '园服', '0');
INSERT INTO `ci_product_class` VALUES ('8', '7', '夏装', '0');
INSERT INTO `ci_product_class` VALUES ('9', '7', '冬装', '0');
INSERT INTO `ci_product_class` VALUES ('10', '0', '地板', '0');
INSERT INTO `ci_product_class` VALUES ('11', '10', '悬浮地板', '0');
INSERT INTO `ci_product_class` VALUES ('12', '10', 'PVC', '0');
INSERT INTO `ci_product_class` VALUES ('13', '1', 'ss', '0');
INSERT INTO `ci_product_class` VALUES ('14', '6', '精致套餐', '0');

-- ----------------------------
-- Table structure for `ci_report`
-- ----------------------------
DROP TABLE IF EXISTS `ci_report`;
CREATE TABLE `ci_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT '',
  `uid` int(11) NOT NULL DEFAULT '0',
  `user` varchar(50) NOT NULL DEFAULT '' COMMENT '写报告人',
  `sendname` varchar(50) DEFAULT '',
  `class` varchar(50) DEFAULT '' COMMENT '分类',
  `fujian` varchar(100) DEFAULT '' COMMENT '工作总结',
  `report` text COMMENT '工作计划',
  `reply` text,
  `isread` tinyint(1) DEFAULT '1',
  `ctime` datetime DEFAULT NULL,
  `cdate` date DEFAULT NULL COMMENT '反馈日期',
  `isdel` tinyint(1) DEFAULT '0' COMMENT '1删除  0正常',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='报告管理 ';

-- ----------------------------
-- Records of ci_report
-- ----------------------------
INSERT INTO `ci_report` VALUES ('1', '20161007163857.jpg', '1', 'TEST', '', '日报', 'data/upfile/201612/9e24d41daef69427d1c79e386ced8995.jpg', '3123123213萨达是打算的', null, '1', '2016-12-26 17:07:45', '2016-12-26', '0');
INSERT INTO `ci_report` VALUES ('2', '434950614741054133.jpg', '7', '张英', '', '年报', 'data/upfile/7/201808/20180811123022.jpg', '6555555555555555555555555555555555', null, '1', '2018-08-11 12:30:22', '2018-08-11', '0');
INSERT INTO `ci_report` VALUES ('3', '', '7', '张英', '', '月报', '', '877777777777777777777777', null, '1', '2018-08-11 12:30:51', '2018-08-11', '0');
INSERT INTO `ci_report` VALUES ('4', '', '1', 'TEST', '', '日报', '', 'dgfdfghf', null, '1', '2018-08-29 20:51:29', '2018-08-29', '0');
INSERT INTO `ci_report` VALUES ('5', 'QoKYO1KdsO1FRwyycNcLl0Sf3i1FLy.jpg', '1', 'TEST', '', '日报', 'data/upfile/1/201808/20180830151713.jpg', '233333333333333', null, '1', '2018-08-30 15:17:13', '2018-08-30', '0');

-- ----------------------------
-- Table structure for `ci_role`
-- ----------------------------
DROP TABLE IF EXISTS `ci_role`;
CREATE TABLE `ci_role` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lever` text COLLATE utf8_unicode_ci,
  `right` int(11) DEFAULT '0' COMMENT '权限值',
  `isdel` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='用户角色';

-- ----------------------------
-- Records of ci_role
-- ----------------------------
INSERT INTO `ci_role` VALUES ('1', '总经理', '1,2,3,4,5,7,10,12,13,14,15,16,68,69,70,71,20,21,22,24,25,26,27,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,63,64,65,66,67', '9', '0');
INSERT INTO `ci_role` VALUES ('2', '业务主管', '12,13,14,70,18,19,20,21,23,24,25,26,28,29,30,31,33,34,35,36,38,39,40,41,43,44,45,46', '3', '0');
INSERT INTO `ci_role` VALUES ('3', '销售员', '13,18,19,20,21,23,24,25,26,28,29,30,31,33,34,35,36,38,39,40,41,43,44,45,46', '2', '0');
INSERT INTO `ci_role` VALUES ('4', '其他', '18,19,20,21,23,24,25,26,28,29,30,31,65', '1', '1');

-- ----------------------------
-- Table structure for `ci_service`
-- ----------------------------
DROP TABLE IF EXISTS `ci_service`;
CREATE TABLE `ci_service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT '0',
  `customerid` int(11) DEFAULT '0',
  `customername` varchar(100) DEFAULT '',
  `adduser` varchar(50) DEFAULT '' COMMENT '制单人',
  `linkman` varchar(11) DEFAULT '' COMMENT '任务链接',
  `sdate` date DEFAULT NULL COMMENT '反馈日期',
  `issolve` tinyint(1) DEFAULT '2' COMMENT '是否解决',
  `title` varchar(100) DEFAULT '' COMMENT '反馈主题',
  `type` varchar(50) DEFAULT '',
  `info` text COMMENT '详情备注',
  `content` text COMMENT '处理结果',
  `edate` date DEFAULT NULL,
  `adddate` date DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  `reason` varchar(255) DEFAULT '',
  `upddate` date DEFAULT NULL,
  `updtime` datetime DEFAULT NULL,
  `isdel` tinyint(1) DEFAULT '0' COMMENT '1删除  0正常',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='售后服务';

-- ----------------------------
-- Records of ci_service
-- ----------------------------

-- ----------------------------
-- Table structure for `ci_set_group`
-- ----------------------------
DROP TABLE IF EXISTS `ci_set_group`;
CREATE TABLE `ci_set_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '' COMMENT '栏目名称',
  `remark` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '',
  `isdel` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='分类管理';

-- ----------------------------
-- Records of ci_set_group
-- ----------------------------
INSERT INTO `ci_set_group` VALUES ('1', '总经办', '', '1');
INSERT INTO `ci_set_group` VALUES ('2', '人事部', '', '0');
INSERT INTO `ci_set_group` VALUES ('3', '销售部', '', '0');

-- ----------------------------
-- Table structure for `ci_set_select`
-- ----------------------------
DROP TABLE IF EXISTS `ci_set_select`;
CREATE TABLE `ci_set_select` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT COMMENT '导航栏目',
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '' COMMENT '栏目名称',
  `ordnum` int(11) DEFAULT '0' COMMENT '排序',
  `type` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '' COMMENT '区别',
  `remark` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '',
  `isdel` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8 COMMENT='分类管理';

-- ----------------------------
-- Records of ci_set_select
-- ----------------------------
INSERT INTO `ci_set_select` VALUES ('9', '已成交', '0', 'type', '', '0');
INSERT INTO `ci_set_select` VALUES ('10', '电话营销', '0', 'source', '', '0');
INSERT INTO `ci_set_select` VALUES ('11', '★★★★★', '0', 'star', '', '0');
INSERT INTO `ci_set_select` VALUES ('12', '董事长', '0', 'job', '', '0');
INSERT INTO `ci_set_select` VALUES ('13', '电话跟进', '0', 'records', '', '0');
INSERT INTO `ci_set_select` VALUES ('14', '买卖', '0', 'hetong', '', '0');
INSERT INTO `ci_set_select` VALUES ('17', '导出存档', '0', 'soft', '', '0');
INSERT INTO `ci_set_select` VALUES ('18', '公用文档', '0', 'soft', '', '0');
INSERT INTO `ci_set_select` VALUES ('19', '我的文档', '0', 'soft', '', '0');
INSERT INTO `ci_set_select` VALUES ('20', '产品质量', '0', 'service', '', '0');
INSERT INTO `ci_set_select` VALUES ('21', '合同款', '0', 'expensein', '', '0');
INSERT INTO `ci_set_select` VALUES ('22', '交通费', '0', 'expenseout', '', '0');
INSERT INTO `ci_set_select` VALUES ('23', '产品续费', '0', 'expensein', '', '0');
INSERT INTO `ci_set_select` VALUES ('24', '订单预付款', '0', 'expensein', '', '0');
INSERT INTO `ci_set_select` VALUES ('25', '维护费', '0', 'expensein', '', '0');
INSERT INTO `ci_set_select` VALUES ('26', '其它', '0', 'expensein', '', '0');
INSERT INTO `ci_set_select` VALUES ('29', '未成交', '0', 'type', '', '0');
INSERT INTO `ci_set_select` VALUES ('30', '跟进中', '0', 'type', '', '0');
INSERT INTO `ci_set_select` VALUES ('31', '搜索引擎', '0', 'source', '', '0');
INSERT INTO `ci_set_select` VALUES ('32', '朋友介绍', '0', 'source', '', '0');
INSERT INTO `ci_set_select` VALUES ('33', '其它来源', '0', 'source', '', '0');
INSERT INTO `ci_set_select` VALUES ('34', '★★★★', '0', 'star', '', '0');
INSERT INTO `ci_set_select` VALUES ('35', '★★★', '0', 'star', '', '0');
INSERT INTO `ci_set_select` VALUES ('36', '★★', '0', 'star', '', '0');
INSERT INTO `ci_set_select` VALUES ('37', '★', '0', 'star', '', '0');
INSERT INTO `ci_set_select` VALUES ('38', '互联网/IT', '0', 'trade', '', '1');
INSERT INTO `ci_set_select` VALUES ('39', '工业制造', '0', 'trade', '', '1');
INSERT INTO `ci_set_select` VALUES ('40', '总经理', '0', 'job', '', '0');
INSERT INTO `ci_set_select` VALUES ('41', '负责人', '0', 'job', '', '0');
INSERT INTO `ci_set_select` VALUES ('42', '业务员', '0', 'job', '', '0');
INSERT INTO `ci_set_select` VALUES ('43', '技术员', '0', 'job', '', '0');
INSERT INTO `ci_set_select` VALUES ('44', '上门拜访', '0', 'records', '', '0');
INSERT INTO `ci_set_select` VALUES ('45', 'QQ交谈', '0', 'records', '', '0');
INSERT INTO `ci_set_select` VALUES ('46', 'Email邮件', '0', 'records', '', '0');
INSERT INTO `ci_set_select` VALUES ('47', '买卖', '0', 'records', '', '0');
INSERT INTO `ci_set_select` VALUES ('48', '租赁', '0', 'hetong', '', '0');
INSERT INTO `ci_set_select` VALUES ('49', '工程', '0', 'hetong', '', '0');
INSERT INTO `ci_set_select` VALUES ('50', '技术', '0', 'hetong', '', '0');
INSERT INTO `ci_set_select` VALUES ('51', '委托', '0', 'hetong', '', '0');
INSERT INTO `ci_set_select` VALUES ('52', '其它', '0', 'hetong', '', '1');
INSERT INTO `ci_set_select` VALUES ('53', '操作问题', '0', 'service', '', '0');
INSERT INTO `ci_set_select` VALUES ('54', '其它问题', '0', 'service', '', '0');
INSERT INTO `ci_set_select` VALUES ('55', '通讯费', '0', 'expenseout', '', '0');
INSERT INTO `ci_set_select` VALUES ('56', '餐饮住宿', '0', 'expenseout', '', '0');
INSERT INTO `ci_set_select` VALUES ('57', '赠送礼品', '0', 'expenseout', '', '0');
INSERT INTO `ci_set_select` VALUES ('58', '硬件采购', '0', 'expenseout', '', '0');
INSERT INTO `ci_set_select` VALUES ('59', '服务', '0', 'hetong', '', '0');
INSERT INTO `ci_set_select` VALUES ('60', '东西很牛逼', '0', 'service', '', '0');
INSERT INTO `ci_set_select` VALUES ('61', '123', '0', 'source', '', '1');
INSERT INTO `ci_set_select` VALUES ('62', '有意向', '0', 'type', '', '0');
INSERT INTO `ci_set_select` VALUES ('63', '根据类型', '0', 'records', '', '0');
INSERT INTO `ci_set_select` VALUES ('64', '跟进类型', '0', 'records', '', '1');
INSERT INTO `ci_set_select` VALUES ('65', '金属', '0', 'trade', '', '0');
INSERT INTO `ci_set_select` VALUES ('66', 'IT', '0', 'trade', '', '0');

-- ----------------------------
-- Table structure for `ci_single`
-- ----------------------------
DROP TABLE IF EXISTS `ci_single`;
CREATE TABLE `ci_single` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '0' COMMENT '任务名称',
  `uid` int(11) DEFAULT '0' COMMENT '备注',
  `customerid` int(11) DEFAULT '0' COMMENT '客户ID',
  `customername` varchar(100) DEFAULT '' COMMENT '任务名称',
  `type` varchar(50) DEFAULT '' COMMENT '跟单类型',
  `state` varchar(50) DEFAULT '' COMMENT '跟单进度',
  `linkman` varchar(100) DEFAULT '',
  `remind` int(50) DEFAULT '0' COMMENT '提醒',
  `nexttime` datetime DEFAULT NULL COMMENT '下次提醒时间',
  `content` text COMMENT '营业项目',
  `adduser` varchar(50) DEFAULT '' COMMENT '税率',
  `adddate` date DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  `upddate` date DEFAULT NULL,
  `updtime` datetime DEFAULT NULL,
  `isdel` tinyint(1) DEFAULT '0' COMMENT '0正常 1删除',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='跟单管理';

-- ----------------------------
-- Records of ci_single
-- ----------------------------
INSERT INTO `ci_single` VALUES ('1', '0', '1', '56', '342', '电话跟进', '已成交', 'xiaoming', '1', '2019-05-04 13:00:00', '你你你你你你你你你你你你你你你你你你\r\n你你你你你你你你你你你你你你你你你你\r\n你你你你你你你你你你你你你你你你你你\r\n你你你你你你你你你你你你你你你你你你\r\n你你你你你你你你你你你你你你你你你你你你你你你你', 'TEST', '2019-04-01', '2019-04-01 13:01:31', null, null, '1');
INSERT INTO `ci_single` VALUES ('2', '0', '1', '65', '薛十一', '电话跟进', '未成交', 'ss', '168', '2019-05-07 17:00:00', '', 'TEST', '2019-05-05', '2019-05-05 17:16:30', null, null, '1');

-- ----------------------------
-- Table structure for `ci_theme`
-- ----------------------------
DROP TABLE IF EXISTS `ci_theme`;
CREATE TABLE `ci_theme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT '',
  `smallpic` varchar(255) DEFAULT '' COMMENT '缩略图',
  `bigpic` varchar(255) DEFAULT '' COMMENT '大图',
  `uid` int(11) DEFAULT '0',
  `user` varchar(255) DEFAULT '' COMMENT '上传者',
  `isdel` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='主题管理';

-- ----------------------------
-- Records of ci_theme
-- ----------------------------
INSERT INTO `ci_theme` VALUES ('1', '默认壁纸', '/theme/windows/bg/bg1_small.jpg', '/theme/windows/bg/bg1.jpg', '0', '', '0');
INSERT INTO `ci_theme` VALUES ('2', 'win7壁纸', '/theme/windows/bg/bg2_small.jpg', '/theme/windows/bg/bg2.jpg', '0', '', '0');
INSERT INTO `ci_theme` VALUES ('3', '自然能源', '/theme/windows/bg/bg3_small.jpg', '/theme/windows/bg/bg3.jpg', '0', '', '0');
INSERT INTO `ci_theme` VALUES ('4', '东方明珠', '/theme/windows/bg/bg4_small.jpg', '/theme/windows/bg/bg4.jpg', '0', '', '0');
INSERT INTO `ci_theme` VALUES ('5', '香格里拉', '/theme/windows/bg/bg5_small.jpg', '/theme/windows/bg/bg5.jpg', '0', '', '0');

-- ----------------------------
-- Table structure for `ci_user`
-- ----------------------------
DROP TABLE IF EXISTS `ci_user`;
CREATE TABLE `ci_user` (
  `uid` smallint(6) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '用户名称',
  `userpwd` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '密码',
  `name` varchar(25) COLLATE utf8_unicode_ci DEFAULT '',
  `mobile` varchar(20) COLLATE utf8_unicode_ci DEFAULT '',
  `roleid` tinyint(1) DEFAULT '1' COMMENT '角色ID',
  `lever` text COLLATE utf8_unicode_ci COMMENT '权限',
  `manage` text COLLATE utf8_unicode_ci COMMENT '跨部门权限',
  `right` int(11) DEFAULT '99',
  `birthday` date DEFAULT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci DEFAULT '',
  `email` varchar(60) COLLATE utf8_unicode_ci DEFAULT '',
  `groupid` int(11) DEFAULT '0',
  `adddate` date DEFAULT NULL,
  `sex` tinyint(120) DEFAULT '1',
  `icon` tinyint(1) DEFAULT '2',
  `info` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `sign` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `isdel` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='用户管理';

-- ----------------------------
-- Records of ci_user
-- ----------------------------
INSERT INTO `ci_user` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'TEST', '13616216627', '0', '18,19,20,21,23,24,25,26,28,29,30,31,33,34,35,36,38,39,40,41,43,44,45,46,48,49,50,51,53,54,55,56,63,64,65,66,67', '6,7', '99', '2018-08-17', '', '', '1', '0000-00-00', '1', '1', 'dfdsfdsfbbbbbbbbbbb', '我有我的个性', 'data/upfile/1/201612/ae7683110301dc641ad993e7738d3915.jpg', '0');
INSERT INTO `ci_user` VALUES ('9', 'ceshi', 'e10adc3949ba59abbe56e057f20f883e', 'ceshi', '123456', '3', '13,17,18,19,20,21,23,24,25,26,28,29,30,31,33,34,35,36,38,39,40,41,43,44,45,46', '10', '2', '2018-08-17', '', '96362qq.com', '0', '0000-00-00', '1', '2', '', '', 'data/upfile/1/201612/ae7683110301dc641ad993e7738d3915.jpg', '1');
INSERT INTO `ci_user` VALUES ('10', 'ceshi2', '71b3b26aaa319e0cdf6fdb8429c112b0', 'ceshi2', '15623698457', '3', '18,19,20,21,23,24,25,26,28,29,30,31,33,34,35,36,38,39,40,41,43,44,45,46', '9', '2', '2018-08-17', '', '12365232qq.com', '3', '0000-00-00', '1', '2', '', '', '', '1');
INSERT INTO `ci_user` VALUES ('11', 'liandong', 'e10adc3949ba59abbe56e057f20f883e', 'liandong', '', '2', '4,5,7,10,12,13,14,15,16,17,68,69,70,71,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,63,64,65,66', null, '99', '0000-00-00', '', '', '3', '0000-00-00', '1', '2', '', '', '', '1');

-- ----------------------------
-- Table structure for `ci_userchatlog`
-- ----------------------------
DROP TABLE IF EXISTS `ci_userchatlog`;
CREATE TABLE `ci_userchatlog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `touid` int(11) DEFAULT '0',
  `uid` int(11) DEFAULT '0',
  `sendtime` datetime DEFAULT NULL,
  `writetime` datetime DEFAULT NULL,
  `hasview` tinyint(1) DEFAULT '0',
  `content` text COLLATE utf8_unicode_ci,
  `id_hash` varchar(100) COLLATE utf8_unicode_ci DEFAULT '',
  `type` varchar(50) COLLATE utf8_unicode_ci DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='用户管理';

-- ----------------------------
-- Records of ci_userchatlog
-- ----------------------------
INSERT INTO `ci_userchatlog` VALUES ('59', '2', '1', '2016-10-07 16:05:09', '2016-10-07 16:05:09', '1', '从市场上', 'f9c340648e746ce4f8ea6dde4e3538f9', 'friend');
INSERT INTO `ci_userchatlog` VALUES ('60', '1', '2', '2016-10-07 16:05:29', '2016-10-07 16:05:29', '1', '哦', 'f9c340648e746ce4f8ea6dde4e3538f9', 'friend');
INSERT INTO `ci_userchatlog` VALUES ('61', '1', '2', '2016-10-07 16:10:23', '2016-10-07 16:10:23', '1', 'vvv', 'f9c340648e746ce4f8ea6dde4e3538f9', 'friend');
INSERT INTO `ci_userchatlog` VALUES ('62', '1', '2', '2016-10-07 16:28:35', '2016-10-07 16:28:35', '1', '电饭锅电饭锅放到', 'f9c340648e746ce4f8ea6dde4e3538f9', 'friend');
INSERT INTO `ci_userchatlog` VALUES ('63', '1', '2', '2016-10-07 16:28:52', '2016-10-07 16:28:52', '1', '非官方的', 'f9c340648e746ce4f8ea6dde4e3538f9', 'friend');
INSERT INTO `ci_userchatlog` VALUES ('64', '2', '1', '2016-10-07 16:29:03', '2016-10-07 16:29:03', '1', '多个地方', 'f9c340648e746ce4f8ea6dde4e3538f9', 'friend');
INSERT INTO `ci_userchatlog` VALUES ('65', '2', '1', '2016-10-07 16:29:13', '2016-10-07 16:29:13', '1', '风格的风格多个', 'f9c340648e746ce4f8ea6dde4e3538f9', 'friend');
INSERT INTO `ci_userchatlog` VALUES ('66', '2', '1', '2016-10-07 16:41:36', '2016-10-07 16:41:36', '1', '胜多负少', 'f9c340648e746ce4f8ea6dde4e3538f9', 'friend');
INSERT INTO `ci_userchatlog` VALUES ('67', '1', '2', '2016-10-07 16:41:50', '2016-10-07 16:41:50', '1', '的说法梵蒂冈', 'f9c340648e746ce4f8ea6dde4e3538f9', 'friend');
INSERT INTO `ci_userchatlog` VALUES ('68', '1', '2', '2016-10-08 14:18:23', '2016-10-08 14:18:23', '1', 'sadsada', 'f9c340648e746ce4f8ea6dde4e3538f9', 'friend');
INSERT INTO `ci_userchatlog` VALUES ('69', '2', '1', '2016-10-08 14:18:31', '2016-10-08 14:18:33', '1', '撒旦撒旦', 'f9c340648e746ce4f8ea6dde4e3538f9', 'friend');
INSERT INTO `ci_userchatlog` VALUES ('70', '3', '1', '2017-03-14 13:19:53', '2017-03-14 13:19:55', '1', 'sdfdsfdsfsdf', 'f860ba666ed657944d19ca051e58cd2c', 'friend');
INSERT INTO `ci_userchatlog` VALUES ('71', '3', '1', '2017-03-14 13:20:12', '2017-03-14 13:20:13', '1', 'sdfsdfsdfdsf', 'f860ba666ed657944d19ca051e58cd2c', 'friend');
INSERT INTO `ci_userchatlog` VALUES ('72', '1', '3', '2017-03-14 13:21:20', '2017-03-14 13:21:22', '1', 'face[伤心]', 'f860ba666ed657944d19ca051e58cd2c', 'friend');
INSERT INTO `ci_userchatlog` VALUES ('73', '3', '1', '2017-03-14 13:21:34', '2017-03-14 13:21:34', '1', 'face[弱]', 'f860ba666ed657944d19ca051e58cd2c', 'friend');
INSERT INTO `ci_userchatlog` VALUES ('74', '3', '1', '2017-03-14 15:03:15', '2017-03-14 15:03:17', '1', '嗨', 'f860ba666ed657944d19ca051e58cd2c', 'friend');
INSERT INTO `ci_userchatlog` VALUES ('75', '3', '2', '2017-03-14 15:04:45', '2017-03-14 15:04:47', '1', '大撒旦撒旦阿萨德', 'dfe3a334fc99f298ac5a6673baa44184', 'friend');
INSERT INTO `ci_userchatlog` VALUES ('76', '4', '1', '2018-07-31 11:26:13', '2018-07-31 11:26:13', '0', 'face[挤眼]', '50f56cf872d90aa1c22a50bfce629cb6', 'friend');
INSERT INTO `ci_userchatlog` VALUES ('77', '2', '1', '2018-07-31 11:26:30', '2018-08-01 14:33:42', '1', 'face[围观]', 'f9c340648e746ce4f8ea6dde4e3538f9', 'friend');
INSERT INTO `ci_userchatlog` VALUES ('78', '2', '1', '2018-08-07 16:34:07', '2018-08-07 16:34:07', '0', '12312', 'f9c340648e746ce4f8ea6dde4e3538f9', 'friend');
INSERT INTO `ci_userchatlog` VALUES ('79', '4', '1', '2018-08-07 16:34:11', '2018-08-07 16:34:11', '0', '123123', '50f56cf872d90aa1c22a50bfce629cb6', 'friend');
INSERT INTO `ci_userchatlog` VALUES ('80', '2', '1', '2018-08-07 16:40:56', '2018-08-07 16:40:56', '0', '123123', 'f9c340648e746ce4f8ea6dde4e3538f9', 'friend');
INSERT INTO `ci_userchatlog` VALUES ('81', '4', '1', '2018-08-08 13:19:55', '2018-08-08 13:19:55', '0', 'hi', '50f56cf872d90aa1c22a50bfce629cb6', 'friend');
INSERT INTO `ci_userchatlog` VALUES ('82', '3', '5', '2018-08-09 10:43:10', '2018-08-09 10:43:10', '0', '哈喽', '23d46eccad94705360da664186cd9cc2', 'friend');
INSERT INTO `ci_userchatlog` VALUES ('83', '3', '5', '2018-08-09 10:43:39', '2018-08-09 10:43:39', '0', '哈哈', '23d46eccad94705360da664186cd9cc2', 'friend');
INSERT INTO `ci_userchatlog` VALUES ('84', '1', '5', '2018-08-10 10:55:48', '2018-08-10 10:56:33', '1', '哈', 'da2544386071b1b9c40be5d42cba47e9', 'friend');
INSERT INTO `ci_userchatlog` VALUES ('85', '5', '1', '2018-08-10 10:57:39', '2018-08-10 10:57:40', '1', '哈哈', 'da2544386071b1b9c40be5d42cba47e9', 'friend');
INSERT INTO `ci_userchatlog` VALUES ('86', '1', '5', '2018-08-10 10:57:58', '2018-08-10 10:58:00', '1', '你是谁', 'da2544386071b1b9c40be5d42cba47e9', 'friend');
INSERT INTO `ci_userchatlog` VALUES ('87', '2', '1', '2018-08-11 14:44:29', '2018-08-11 14:44:29', '0', 'sfd', 'f9c340648e746ce4f8ea6dde4e3538f9', 'friend');
INSERT INTO `ci_userchatlog` VALUES ('88', '4', '1', '2018-08-12 10:28:10', '2018-08-12 10:28:10', '0', '早', '50f56cf872d90aa1c22a50bfce629cb6', 'friend');
INSERT INTO `ci_userchatlog` VALUES ('89', '4', '1', '2018-08-12 10:28:19', '2018-08-12 10:28:19', '0', 'face[阴险]', '50f56cf872d90aa1c22a50bfce629cb6', 'friend');
INSERT INTO `ci_userchatlog` VALUES ('90', '6', '1', '2018-08-12 10:33:23', '2018-08-12 10:33:23', '0', 'face[悲伤]', 'acdd163a762f841c6f8687b87dbb9592', 'friend');
INSERT INTO `ci_userchatlog` VALUES ('91', '7', '1', '2018-08-12 10:36:31', '2018-08-12 10:36:31', '0', 'face[鼓掌]', '83ee6b8d6b40d4680b0fef51b89952ed', 'friend');
INSERT INTO `ci_userchatlog` VALUES ('92', '2', '1', '2018-08-24 15:09:25', '2018-08-24 15:09:25', '0', '你好', 'f9c340648e746ce4f8ea6dde4e3538f9', 'friend');
INSERT INTO `ci_userchatlog` VALUES ('93', '2', '1', '2018-08-27 17:07:37', '2018-08-27 17:07:37', '0', 'nihao', 'f9c340648e746ce4f8ea6dde4e3538f9', 'friend');
INSERT INTO `ci_userchatlog` VALUES ('94', '3', '1', '2018-08-27 17:13:01', '2018-08-27 17:13:01', '0', 'nih', 'f860ba666ed657944d19ca051e58cd2c', 'friend');
INSERT INTO `ci_userchatlog` VALUES ('95', '4', '1', '2018-09-01 17:14:31', '2018-09-01 17:14:31', '0', '123', '50f56cf872d90aa1c22a50bfce629cb6', 'friend');
INSERT INTO `ci_userchatlog` VALUES ('96', '8', '1', '2018-09-02 12:52:15', '2018-09-02 12:59:24', '1', '11', '553cc46754a46fd2d678b94bbcf4121d', 'friend');
INSERT INTO `ci_userchatlog` VALUES ('97', '5', '1', '2018-09-03 07:56:20', '2018-09-03 07:56:20', '0', 'sdf sadf dsf', 'da2544386071b1b9c40be5d42cba47e9', 'friend');

-- ----------------------------
-- Table structure for `ci_userlog`
-- ----------------------------
DROP TABLE IF EXISTS `ci_userlog`;
CREATE TABLE `ci_userlog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT '0' COMMENT '用户ID',
  `ip` varchar(25) DEFAULT '',
  `reason` text COMMENT '原因',
  `action` varchar(50) DEFAULT '' COMMENT '行为',
  `module` varchar(50) DEFAULT '' COMMENT '数据表模块',
  `customerid` int(11) DEFAULT '0',
  `customername` varchar(100) DEFAULT '',
  `adduser` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '' COMMENT '企业名称',
  `addtime` datetime DEFAULT NULL COMMENT '写入日期',
  `adddate` date DEFAULT NULL,
  `isdel` tinyint(4) DEFAULT '0',
  `num` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `userId` (`uid`),
  KEY `adddate` (`adddate`)
) ENGINE=InnoDB AUTO_INCREMENT=364 DEFAULT CHARSET=utf8 COMMENT='操作日志';

-- ----------------------------
-- Records of ci_userlog
-- ----------------------------
INSERT INTO `ci_userlog` VALUES ('1', '1', '127.0.0.1', '', '新增', '客户列表', '1', null, 'TEST', '2016-08-26 18:11:46', '2016-08-26', '1', '1');
INSERT INTO `ci_userlog` VALUES ('2', '2', '127.0.0.1', '', '新增', '客户列表', '2', null, '小飞', '2016-08-26 18:29:36', '2016-08-26', '1', '1');
INSERT INTO `ci_userlog` VALUES ('3', '2', '127.0.0.1', '', '新增', '客户列表', '3', null, '小飞', '2016-08-26 18:32:04', '2016-08-26', '1', '1');
INSERT INTO `ci_userlog` VALUES ('4', '2', '127.0.0.1', '', '新增', '客户列表', '4', 'dsfdsfsdf', '小飞', '2016-08-26 18:39:44', '2016-08-26', '1', '1');
INSERT INTO `ci_userlog` VALUES ('5', '1', '127.0.0.1', '', '新增', '任务链接', '4', 'dsfdsfsdf', 'TEST', '2016-08-31 16:26:16', '2016-08-31', '1', '1');
INSERT INTO `ci_userlog` VALUES ('6', '1', '127.0.0.1', '', '新增', '跟单记录', '4', 'dsfdsfsdf', 'TEST', '2016-08-31 16:35:07', '2016-08-31', '1', '1');
INSERT INTO `ci_userlog` VALUES ('7', '1', '127.0.0.1', '', '新增', '跟单记录', '4', 'dsfdsfsdf', 'TEST', '2016-09-09 14:19:15', '2016-09-09', '1', '1');
INSERT INTO `ci_userlog` VALUES ('8', '1', '127.0.0.1', '', '新增', '跟单记录', '4', 'dsfdsfsdf', 'TEST', '2016-09-09 14:19:18', '2016-09-09', '1', '1');
INSERT INTO `ci_userlog` VALUES ('9', '1', '127.0.0.1', '', '新增', '跟单记录', '4', 'dsfdsfsdf', 'TEST', '2016-09-09 14:19:19', '2016-09-09', '1', '1');
INSERT INTO `ci_userlog` VALUES ('10', '1', '127.0.0.1', '1212', '删除', '跟单记录', '4', 'dsfdsfsdf', 'TEST', '2016-09-09 14:23:05', '2016-09-09', '1', '1');
INSERT INTO `ci_userlog` VALUES ('11', '1', '127.0.0.1', 'sdsdsd', '删除', '跟单记录', '4', 'dsfdsfsdf', 'TEST', '2016-09-09 14:24:41', '2016-09-09', '1', '1');
INSERT INTO `ci_userlog` VALUES ('12', '1', '127.0.0.1', '', '修改', '跟单记录', '4', 'dsfdsfsdf', 'TEST', '2016-09-09 14:28:10', '2016-09-09', '1', '1');
INSERT INTO `ci_userlog` VALUES ('13', '1', '127.0.0.1', '', '修改', '跟单记录', '4', 'dsfdsfsdf', 'TEST', '2016-09-09 14:28:31', '2016-09-09', '1', '1');
INSERT INTO `ci_userlog` VALUES ('14', '1', '127.0.0.1', '', '新增', '订单记录', '4', 'dsfdsfsdf', 'TEST', '2016-09-09 15:12:00', '2016-09-09', '1', '1');
INSERT INTO `ci_userlog` VALUES ('15', '1', '127.0.0.1', '', '新增', '合同记录', '1', 'dsfdsfsdf', 'TEST', '2016-09-09 16:17:40', '2016-09-09', '1', '1');
INSERT INTO `ci_userlog` VALUES ('16', '1', '127.0.0.1', '', '修改', '跟单记录', '4', 'dsfdsfsdf', 'TEST', '2016-12-06 13:56:08', '2016-12-06', '1', '1');
INSERT INTO `ci_userlog` VALUES ('17', '1', '127.0.0.1', '', '修改', '跟单记录', '4', 'dsfdsfsdf', 'TEST', '2016-12-06 13:56:14', '2016-12-06', '1', '1');
INSERT INTO `ci_userlog` VALUES ('18', '1', '127.0.0.1', '', '修改', '客户列表', '4', 'dsfdsfsdf', 'TEST', '2016-12-13 10:03:12', '2016-12-13', '1', '1');
INSERT INTO `ci_userlog` VALUES ('19', '1', '127.0.0.1', '', '修改', '客户列表', '4', 'dsfdsfsdf', 'TEST', '2016-12-13 10:50:25', '2016-12-13', '1', '1');
INSERT INTO `ci_userlog` VALUES ('20', '1', '127.0.0.1', '', '修改', '任务链接', '4', 'dsfdsfsdf', 'TEST', '2016-12-13 11:28:23', '2016-12-13', '1', '1');
INSERT INTO `ci_userlog` VALUES ('21', '1', '127.0.0.1', '', '修改', '任务链接', '4', 'dsfdsfsdf', 'TEST', '2016-12-13 12:16:50', '2016-12-13', '1', '1');
INSERT INTO `ci_userlog` VALUES ('22', '1', '127.0.0.1', '', '修改', '任务链接', '4', 'dsfdsfsdf', 'TEST', '2016-12-13 12:17:03', '2016-12-13', '1', '1');
INSERT INTO `ci_userlog` VALUES ('23', '1', '127.0.0.1', '', '修改', '客户列表', '4', 'dsfdsfsdf', 'TEST', '2016-12-13 12:28:24', '2016-12-13', '1', '1');
INSERT INTO `ci_userlog` VALUES ('24', '1', '127.0.0.1', '', '修改', '任务链接', '4', 'dsfdsfsdf', 'TEST', '2016-12-13 12:50:34', '2016-12-13', '1', '1');
INSERT INTO `ci_userlog` VALUES ('25', '1', '127.0.0.1', '', '修改', '客户列表', '4', 'dsfdsfsdf', 'TEST', '2016-12-13 12:50:45', '2016-12-13', '1', '1');
INSERT INTO `ci_userlog` VALUES ('26', '1', '127.0.0.1', '', '修改', '跟单记录', '4', 'dsfdsfsdf', 'TEST', '2016-12-14 10:47:32', '2016-12-14', '1', '1');
INSERT INTO `ci_userlog` VALUES ('27', '1', '127.0.0.1', '', '新增', '订单记录', '4', 'dsfdsfsdf', 'TEST', '2016-12-14 11:25:21', '2016-12-14', '1', '1');
INSERT INTO `ci_userlog` VALUES ('28', '1', '127.0.0.1', '', '新增', '合同记录', '2', 'dsfdsfsdf', 'TEST', '2016-12-14 11:31:21', '2016-12-14', '1', '1');
INSERT INTO `ci_userlog` VALUES ('29', '1', '127.0.0.1', '1111', '删除', '收支记录', '4', 'dsfdsfsdf', 'TEST', '2016-12-16 18:06:40', '2016-12-16', '1', '1');
INSERT INTO `ci_userlog` VALUES ('30', '1', '127.0.0.1', '232323', '删除', '收支记录', '4', 'dsfdsfsdf', 'TEST', '2016-12-16 18:06:44', '2016-12-16', '1', '1');
INSERT INTO `ci_userlog` VALUES ('31', '1', '127.0.0.1', '', '新增', '合同到款', '4', 'dsfdsfsdf', 'TEST', '2016-12-16 18:07:05', '2016-12-16', '1', '1');
INSERT INTO `ci_userlog` VALUES ('32', '1', '127.0.0.1', '', '新增', '任务链接', '4', 'dsfdsfsdf', 'TEST', '2016-12-16 18:21:50', '2016-12-16', '1', '1');
INSERT INTO `ci_userlog` VALUES ('33', '1', '127.0.0.1', '', '新增', '跟单记录', '4', 'dsfdsfsdf', 'TEST', '2016-12-19 15:34:50', '2016-12-19', '1', '1');
INSERT INTO `ci_userlog` VALUES ('34', '1', '127.0.0.1', '', '新增', '跟单记录', '4', 'dsfdsfsdf', 'TEST', '2016-12-19 15:35:23', '2016-12-19', '1', '1');
INSERT INTO `ci_userlog` VALUES ('35', '1', '127.0.0.1', '', '修改', '客户列表', '4', 'dsfdsfsdf', 'TEST', '2016-12-19 16:07:16', '2016-12-19', '1', '1');
INSERT INTO `ci_userlog` VALUES ('36', '1', '127.0.0.1', '', '修改', '客户列表', '3', 'FGHGFHGFH', 'TEST', '2016-12-19 16:07:19', '2016-12-19', '1', '1');
INSERT INTO `ci_userlog` VALUES ('37', '1', '127.0.0.1', '', '修改', '客户列表', '2', 'sadsad', 'TEST', '2016-12-19 16:07:21', '2016-12-19', '1', '1');
INSERT INTO `ci_userlog` VALUES ('38', '1', '127.0.0.1', '', '修改', '客户列表', '1', '的萨达', 'TEST', '2016-12-19 16:07:24', '2016-12-19', '1', '1');
INSERT INTO `ci_userlog` VALUES ('39', '1', '127.0.0.1', '', '修改', '客户列表', '1', '的萨达', 'TEST', '2016-12-19 16:14:51', '2016-12-19', '1', '1');
INSERT INTO `ci_userlog` VALUES ('43', '1', '127.0.0.1', '', '修改', '跟单记录', '4', 'dsfdsfsdf', 'TEST', '2016-12-19 16:47:34', '2016-12-19', '1', '1');
INSERT INTO `ci_userlog` VALUES ('44', '1', '127.0.0.1', '', '修改', '客户列表', '4', 'dsfdsfsdf', 'TEST', '2016-12-20 09:20:34', '2016-12-20', '1', '1');
INSERT INTO `ci_userlog` VALUES ('45', '1', '127.0.0.1', '', '修改', '跟单记录', '4', 'dsfdsfsdf', 'TEST', '2016-12-28 13:44:17', '2016-12-28', '1', '1');
INSERT INTO `ci_userlog` VALUES ('46', '1', '127.0.0.1', '', '修改', '跟单记录', '4', 'dsfdsfsdf', 'TEST', '2016-12-28 13:44:27', '2016-12-28', '1', '1');
INSERT INTO `ci_userlog` VALUES ('47', '1', '127.0.0.1', '', '新增', '客户列表', '5', null, 'TEST', '2017-03-29 16:51:33', '2017-03-29', '1', '1');
INSERT INTO `ci_userlog` VALUES ('48', '1', '127.0.0.1', '', '修改', '客户列表', '5', 'ASDSADASD', 'TEST', '2017-03-29 17:24:19', '2017-03-29', '1', '1');
INSERT INTO `ci_userlog` VALUES ('49', '1', '127.0.0.1', '', '修改', '客户列表', '5', 'ASDSADASD', 'TEST', '2017-03-29 17:24:37', '2017-03-29', '1', '1');
INSERT INTO `ci_userlog` VALUES ('50', '1', '127.0.0.1', '', '修改', '客户列表', '5', 'ASDSADASD', 'TEST', '2017-03-29 17:24:47', '2017-03-29', '1', '1');
INSERT INTO `ci_userlog` VALUES ('51', '1', '127.0.0.1', '', '修改', '客户列表', '5', 'ASDSADASD', 'TEST', '2017-03-29 20:16:35', '2017-03-29', '1', '1');
INSERT INTO `ci_userlog` VALUES ('52', '1', '127.0.0.1', '', '修改', '客户列表', '4', 'dsfdsfsdf', 'TEST', '2017-03-29 20:18:14', '2017-03-29', '1', '1');
INSERT INTO `ci_userlog` VALUES ('53', '1', '127.0.0.1', '', '修改', '跟单记录', null, null, 'TEST', '2017-03-30 09:49:20', '2017-03-30', '1', '1');
INSERT INTO `ci_userlog` VALUES ('54', '1', '127.0.0.1', '', '修改', '跟单记录', null, null, 'TEST', '2017-03-30 09:51:36', '2017-03-30', '1', '1');
INSERT INTO `ci_userlog` VALUES ('55', '1', '127.0.0.1', '', '新增', '跟单记录', null, null, 'TEST', '2017-03-30 09:52:55', '2017-03-30', '1', '1');
INSERT INTO `ci_userlog` VALUES ('56', '1', '127.0.0.1', '', '修改', '跟单记录', null, null, 'TEST', '2017-03-30 11:02:47', '2017-03-30', '1', '1');
INSERT INTO `ci_userlog` VALUES ('57', '1', '127.0.0.1', '', '新增', '跟单记录', '4', 'dsfdsfsdf', 'TEST', '2017-03-30 14:58:22', '2017-03-30', '1', '1');
INSERT INTO `ci_userlog` VALUES ('58', '1', '127.0.0.1', '', '新增', '订单记录', '4', 'dsfdsfsdf', 'TEST', '2017-03-30 15:02:13', '2017-03-30', '1', '1');
INSERT INTO `ci_userlog` VALUES ('59', '1', '127.0.0.1', '', '新增', '合同记录', '4', 'dsfdsfsdf', 'TEST', '2017-03-30 15:11:38', '2017-03-30', '1', '1');
INSERT INTO `ci_userlog` VALUES ('60', '1', '127.0.0.1', '', '修改', '任务链接', '4', 'dsfdsfsdf', 'TEST', '2017-03-30 15:21:13', '2017-03-30', '1', '1');
INSERT INTO `ci_userlog` VALUES ('61', '1', '127.0.0.1', '', '删除', '任务链接', '4', 'dsfdsfsdf', 'TEST', '2017-03-30 15:21:38', '2017-03-30', '1', '1');
INSERT INTO `ci_userlog` VALUES ('62', '1', '127.0.0.1', '', '修改', '任务链接', '4', 'dsfdsfsdf', 'TEST', '2017-03-30 15:22:27', '2017-03-30', '1', '1');
INSERT INTO `ci_userlog` VALUES ('63', '1', '127.0.0.1', null, '删除', '附件记录', '4', 'dsfdsfsdf', 'TEST', '2017-03-30 15:27:17', '2017-03-30', '1', '1');
INSERT INTO `ci_userlog` VALUES ('64', '1', '127.0.0.1', '', '修改', '客户列表', '5', 'ASDSADASD', 'TEST', '2017-03-30 17:42:42', '2017-03-30', '0', '0');
INSERT INTO `ci_userlog` VALUES ('65', '1', '127.0.0.1', '', '修改', '跟单记录', '0', '', 'TEST', '2017-03-30 19:03:10', '2017-03-30', '0', '0');
INSERT INTO `ci_userlog` VALUES ('66', '1', '127.0.0.1', '', '修改', '跟单记录', '0', '', 'TEST', '2017-03-30 19:03:32', '2017-03-30', '0', '0');
INSERT INTO `ci_userlog` VALUES ('67', '1', '127.0.0.1', '', '新增', '合同记录', '4', 'dsfdsfsdf', 'TEST', '2017-03-30 19:41:48', '2017-03-30', '0', '0');
INSERT INTO `ci_userlog` VALUES ('68', '1', '127.0.0.1', '', '修改', '跟单记录', '0', '', 'TEST', '2017-03-30 19:43:07', '2017-03-30', '0', '0');
INSERT INTO `ci_userlog` VALUES ('69', '2547', '127.0.0.1', '', '修改', '收支记录', '0', '', '阳洪灵', '2017-03-31 11:34:03', '2017-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('70', '1', '127.0.0.1', '', '新增', '合同到款', '4', 'dsfdsfsdf', 'TEST', '2017-04-05 14:29:20', '2017-04-05', '0', '0');
INSERT INTO `ci_userlog` VALUES ('71', '1', '127.0.0.1', '', '新增', '合同到款', '4', 'dsfdsfsdf', 'TEST', '2017-04-05 14:29:29', '2017-04-05', '0', '0');
INSERT INTO `ci_userlog` VALUES ('72', '1', '::1', '', '修改', '跟单记录', '0', '', 'TEST', '2018-03-12 14:04:19', '2018-03-12', '0', '0');
INSERT INTO `ci_userlog` VALUES ('73', '1', '::1', '', '新增', '收支记录', '0', '', 'TEST', '2018-03-13 10:13:24', '2018-03-13', '0', '0');
INSERT INTO `ci_userlog` VALUES ('74', '1', '::1', '', '修改', '收支记录', '0', '', 'TEST', '2018-03-13 10:17:01', '2018-03-13', '0', '0');
INSERT INTO `ci_userlog` VALUES ('75', '1', '127.0.0.1', null, '删除', '附件记录', '4', 'dsfdsfsdf', 'TEST', '2018-06-08 23:37:31', '2018-06-08', '0', '0');
INSERT INTO `ci_userlog` VALUES ('76', '1', '127.0.0.1', null, '删除', '附件记录', '4', 'dsfdsfsdf', 'TEST', '2018-06-08 23:37:34', '2018-06-08', '0', '0');
INSERT INTO `ci_userlog` VALUES ('77', '1', '127.0.0.1', null, '删除', '附件记录', '4', 'dsfdsfsdf', 'TEST', '2018-06-08 23:37:38', '2018-06-08', '0', '0');
INSERT INTO `ci_userlog` VALUES ('78', '1', '127.0.0.1', null, '删除', '附件记录', '4', 'dsfdsfsdf', 'TEST', '2018-06-08 23:37:42', '2018-06-08', '0', '0');
INSERT INTO `ci_userlog` VALUES ('79', '1', '127.0.0.1', null, '删除', '附件记录', '5', 'ASDSADASD', 'TEST', '2018-06-09 00:14:55', '2018-06-09', '0', '0');
INSERT INTO `ci_userlog` VALUES ('80', '1', '127.0.0.1', null, '删除', '附件记录', '5', 'ASDSADASD', 'TEST', '2018-06-09 00:14:59', '2018-06-09', '0', '0');
INSERT INTO `ci_userlog` VALUES ('81', '1', '127.0.0.1', null, '删除', '附件记录', '5', 'ASDSADASD', 'TEST', '2018-06-09 00:15:02', '2018-06-09', '0', '0');
INSERT INTO `ci_userlog` VALUES ('82', '1', '127.0.0.1', null, '删除', '附件记录', '5', 'ASDSADASD', 'TEST', '2018-06-09 00:15:05', '2018-06-09', '0', '0');
INSERT INTO `ci_userlog` VALUES ('83', '1', '127.0.0.1', null, '删除', '附件记录', '5', 'ASDSADASD', 'TEST', '2018-06-09 00:15:08', '2018-06-09', '0', '0');
INSERT INTO `ci_userlog` VALUES ('84', '1', '127.0.0.1', null, '删除', '附件记录', '5', 'ASDSADASD', 'TEST', '2018-06-09 00:15:11', '2018-06-09', '0', '0');
INSERT INTO `ci_userlog` VALUES ('85', '1', '127.0.0.1', null, '删除', '附件记录', '4', 'dsfdsfsdf', 'TEST', '2018-06-09 00:15:19', '2018-06-09', '0', '0');
INSERT INTO `ci_userlog` VALUES ('86', '1', '127.0.0.1', null, '删除', '附件记录', '4', 'dsfdsfsdf', 'TEST', '2018-06-09 00:15:23', '2018-06-09', '0', '0');
INSERT INTO `ci_userlog` VALUES ('87', '1', '127.0.0.1', null, '删除', '附件记录', '4', 'dsfdsfsdf', 'TEST', '2018-06-09 00:15:26', '2018-06-09', '0', '0');
INSERT INTO `ci_userlog` VALUES ('88', '1', '127.0.0.1', null, '删除', '附件记录', '4', 'dsfdsfsdf', 'TEST', '2018-06-09 00:15:30', '2018-06-09', '0', '0');
INSERT INTO `ci_userlog` VALUES ('89', '1', '127.0.0.1', null, '删除', '附件记录', '5', 'ASDSADASD', 'TEST', '2018-06-09 00:18:53', '2018-06-09', '0', '0');
INSERT INTO `ci_userlog` VALUES ('90', '1', '127.0.0.1', null, '删除', '附件记录', '5', 'ASDSADASD', 'TEST', '2018-06-09 00:18:58', '2018-06-09', '0', '0');
INSERT INTO `ci_userlog` VALUES ('91', '1', '127.0.0.1', null, '删除', '附件记录', '5', 'ASDSADASD', 'TEST', '2018-06-09 00:19:01', '2018-06-09', '0', '0');
INSERT INTO `ci_userlog` VALUES ('92', '1', '127.0.0.1', null, '删除', '附件记录', '5', 'ASDSADASD', 'TEST', '2018-06-09 00:19:03', '2018-06-09', '0', '0');
INSERT INTO `ci_userlog` VALUES ('93', '1', '127.0.0.1', null, '删除', '附件记录', '5', 'ASDSADASD', 'TEST', '2018-06-09 00:24:04', '2018-06-09', '0', '0');
INSERT INTO `ci_userlog` VALUES ('94', '1', '127.0.0.1', null, '删除', '附件记录', '5', 'ASDSADASD', 'TEST', '2018-06-09 00:24:27', '2018-06-09', '0', '0');
INSERT INTO `ci_userlog` VALUES ('95', '1', '127.0.0.1', null, '删除', '附件记录', '5', 'ASDSADASD', 'TEST', '2018-06-09 00:25:27', '2018-06-09', '0', '0');
INSERT INTO `ci_userlog` VALUES ('96', '1', '127.0.0.1', '', '修改', '客户列表', '5', 'ASDSADASD', 'TEST', '2018-06-11 17:54:40', '2018-06-11', '0', '0');
INSERT INTO `ci_userlog` VALUES ('97', '1', '127.0.0.1', '', '新增', '任务链接', '5', 'ASDSADASD', 'TEST', '2018-06-11 17:56:19', '2018-06-11', '0', '0');
INSERT INTO `ci_userlog` VALUES ('98', '1', '127.0.0.1', '', '新增', '跟单记录', '5', 'ASDSADASD', 'TEST', '2018-06-11 17:56:37', '2018-06-11', '0', '0');
INSERT INTO `ci_userlog` VALUES ('99', '1', '127.0.0.1', '', '新增', '订单记录', '5', 'ASDSADASD', 'TEST', '2018-06-11 17:58:44', '2018-06-11', '0', '0');
INSERT INTO `ci_userlog` VALUES ('100', '1', '127.0.0.1', '', '新增', '合同记录', '5', 'ASDSADASD', 'TEST', '2018-06-12 09:23:13', '2018-06-12', '0', '0');
INSERT INTO `ci_userlog` VALUES ('101', '1', '61.146.89.123', '', '新增', '客户列表', '6', '', 'TEST', '2018-06-21 14:07:13', '2018-06-21', '0', '0');
INSERT INTO `ci_userlog` VALUES ('102', '1', '116.231.158.197', '', '删除', '合同记录', '5', 'ASDSADASD', 'TEST', '2018-07-04 09:43:22', '2018-07-04', '0', '0');
INSERT INTO `ci_userlog` VALUES ('103', '1', '116.231.158.197', '', '删除', '合同记录', '4', 'dsfdsfsdf', 'TEST', '2018-07-04 09:43:25', '2018-07-04', '0', '0');
INSERT INTO `ci_userlog` VALUES ('104', '1', '116.231.158.197', '', '删除', '合同记录', '4', 'dsfdsfsdf', 'TEST', '2018-07-04 09:43:27', '2018-07-04', '0', '0');
INSERT INTO `ci_userlog` VALUES ('105', '1', '116.231.158.197', '', '删除', '合同记录', '4', 'dsfdsfsdf', 'TEST', '2018-07-04 09:43:29', '2018-07-04', '0', '0');
INSERT INTO `ci_userlog` VALUES ('106', '1', '116.231.158.197', '', '删除', '合同记录', '4', 'dsfdsfsdf', 'TEST', '2018-07-04 09:43:31', '2018-07-04', '0', '0');
INSERT INTO `ci_userlog` VALUES ('107', '1', '116.231.158.197', '', '删除', '订单记录', '5', 'ASDSADASD', 'TEST', '2018-07-04 09:43:42', '2018-07-04', '0', '0');
INSERT INTO `ci_userlog` VALUES ('108', '1', '116.231.158.197', '', '删除', '订单记录', '4', 'dsfdsfsdf', 'TEST', '2018-07-04 09:43:44', '2018-07-04', '0', '0');
INSERT INTO `ci_userlog` VALUES ('109', '1', '116.231.158.197', '', '删除', '订单记录', '4', 'dsfdsfsdf', 'TEST', '2018-07-04 09:43:46', '2018-07-04', '0', '0');
INSERT INTO `ci_userlog` VALUES ('110', '1', '116.231.158.197', '', '删除', '订单记录', '4', 'dsfdsfsdf', 'TEST', '2018-07-04 09:43:49', '2018-07-04', '0', '0');
INSERT INTO `ci_userlog` VALUES ('111', '1', '116.231.158.197', '', '删除', '跟单记录', '0', '', 'TEST', '2018-07-04 09:43:56', '2018-07-04', '0', '0');
INSERT INTO `ci_userlog` VALUES ('112', '1', '116.231.158.197', '', '删除', '跟单记录', '0', '', 'TEST', '2018-07-04 09:43:58', '2018-07-04', '0', '0');
INSERT INTO `ci_userlog` VALUES ('113', '1', '116.231.158.197', '', '删除', '跟单记录', '0', '', 'TEST', '2018-07-04 09:44:02', '2018-07-04', '0', '0');
INSERT INTO `ci_userlog` VALUES ('114', '1', '116.231.158.197', '', '删除', '跟单记录', '0', '', 'TEST', '2018-07-04 09:44:05', '2018-07-04', '0', '0');
INSERT INTO `ci_userlog` VALUES ('115', '1', '116.231.158.197', '', '删除', '跟单记录', '0', '', 'TEST', '2018-07-04 09:44:07', '2018-07-04', '0', '0');
INSERT INTO `ci_userlog` VALUES ('116', '1', '116.231.158.197', '', '删除', '跟单记录', '0', '', 'TEST', '2018-07-04 09:44:09', '2018-07-04', '0', '0');
INSERT INTO `ci_userlog` VALUES ('117', '1', '116.231.158.197', '', '删除', '跟单记录', '0', '', 'TEST', '2018-07-04 09:44:11', '2018-07-04', '0', '0');
INSERT INTO `ci_userlog` VALUES ('118', '1', '116.231.158.197', null, '删除', '收支记录', '0', '', 'TEST', '2018-07-04 10:17:13', '2018-07-04', '0', '0');
INSERT INTO `ci_userlog` VALUES ('119', '1', '116.231.158.197', null, '删除', '收支记录', '0', '', 'TEST', '2018-07-04 10:17:16', '2018-07-04', '0', '0');
INSERT INTO `ci_userlog` VALUES ('120', '1', '116.231.158.197', null, '删除', '收支记录', '0', '', 'TEST', '2018-07-04 10:17:18', '2018-07-04', '0', '0');
INSERT INTO `ci_userlog` VALUES ('121', '1', '116.231.158.197', null, '删除', '收支记录', '0', '', 'TEST', '2018-07-04 10:17:20', '2018-07-04', '0', '0');
INSERT INTO `ci_userlog` VALUES ('122', '1', '116.231.158.197', null, '删除', '收支记录', '0', '', 'TEST', '2018-07-04 10:17:22', '2018-07-04', '0', '0');
INSERT INTO `ci_userlog` VALUES ('123', '1', '116.231.158.197', '', '新增', '客户列表', '7', '', 'TEST', '2018-07-04 10:33:36', '2018-07-04', '0', '0');
INSERT INTO `ci_userlog` VALUES ('124', '1', '39.187.125.117', '', '新增', '任务链接', '7', '客户1', 'TEST', '2018-07-05 09:40:52', '2018-07-05', '0', '0');
INSERT INTO `ci_userlog` VALUES ('125', '1', '39.187.125.117', '', '修改', '任务链接', '7', '客户1', 'TEST', '2018-07-05 09:41:00', '2018-07-05', '0', '0');
INSERT INTO `ci_userlog` VALUES ('126', '1', '39.187.125.117', '', '新增', '跟单记录', '7', '客户1', 'TEST', '2018-07-05 09:41:16', '2018-07-05', '0', '0');
INSERT INTO `ci_userlog` VALUES ('127', '1', '39.187.125.117', '', '新增', '订单记录', '7', '客户1', 'TEST', '2018-07-05 09:41:25', '2018-07-05', '0', '0');
INSERT INTO `ci_userlog` VALUES ('128', '1', '39.187.125.117', '', '新增', '跟单记录', '7', '客户1', 'TEST', '2018-07-05 09:44:06', '2018-07-05', '0', '0');
INSERT INTO `ci_userlog` VALUES ('129', '1', '39.187.125.117', '', '新增', '订单记录', '7', '客户1', 'TEST', '2018-07-05 09:44:20', '2018-07-05', '0', '0');
INSERT INTO `ci_userlog` VALUES ('130', '1', '39.187.125.117', '', '修改', '订单记录', '0', '', 'TEST', '2018-07-05 09:45:06', '2018-07-05', '0', '0');
INSERT INTO `ci_userlog` VALUES ('131', '1', '183.253.144.46', '', '新增', '收支记录', '7', '客户1', 'TEST', '2018-07-12 23:54:01', '2018-07-12', '0', '0');
INSERT INTO `ci_userlog` VALUES ('132', '1', '183.253.144.46', '', '新增', '跟单记录', '7', '客户1', 'TEST', '2018-07-12 23:56:49', '2018-07-12', '0', '0');
INSERT INTO `ci_userlog` VALUES ('133', '1', '183.253.144.46', '', '新增', '收支记录', '0', '', 'TEST', '2018-07-12 23:59:58', '2018-07-12', '0', '0');
INSERT INTO `ci_userlog` VALUES ('134', '1', '116.1.6.23', '', '新增', '合同记录', '7', '客户1', 'TEST', '2018-07-19 10:49:17', '2018-07-19', '0', '0');
INSERT INTO `ci_userlog` VALUES ('135', '1', '116.1.6.23', '', '新增', '客户列表', '8', '', 'TEST', '2018-07-19 10:57:36', '2018-07-19', '0', '0');
INSERT INTO `ci_userlog` VALUES ('136', '1', '116.1.6.23', '', '新增', '任务链接', '8', '桂电', 'TEST', '2018-07-19 10:59:18', '2018-07-19', '0', '0');
INSERT INTO `ci_userlog` VALUES ('137', '1', '116.1.6.23', '', '新增', '订单记录', '8', '桂电', 'TEST', '2018-07-19 10:59:31', '2018-07-19', '0', '0');
INSERT INTO `ci_userlog` VALUES ('138', '1', '116.1.6.23', '', '新增', '合同记录', '8', '桂电', 'TEST', '2018-07-19 11:00:24', '2018-07-19', '0', '0');
INSERT INTO `ci_userlog` VALUES ('139', '1', '114.239.127.95', '', '修改', '跟单记录', '0', '', 'TEST', '2018-07-19 11:06:20', '2018-07-19', '0', '0');
INSERT INTO `ci_userlog` VALUES ('140', '1', '114.239.127.95', '', '新增', '合同记录', '8', '桂电', 'TEST', '2018-07-19 11:07:21', '2018-07-19', '0', '0');
INSERT INTO `ci_userlog` VALUES ('141', '1', '58.57.5.26', '', '新增', '客户列表', '9', '', 'TEST', '2018-07-31 11:24:23', '2018-07-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('142', '1', '58.57.5.26', '', '新增', '任务链接', '9', '小堂', 'TEST', '2018-07-31 11:29:00', '2018-07-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('143', '1', '58.57.5.26', '', '新增', '订单记录', '9', '小堂', 'TEST', '2018-07-31 11:29:13', '2018-07-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('144', '1', '58.57.5.26', '', '新增', '合同记录', '9', '小堂', 'TEST', '2018-07-31 11:34:10', '2018-07-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('145', '1', '58.57.5.26', '', '新增', '收支记录', '0', '', 'TEST', '2018-07-31 11:35:11', '2018-07-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('146', '1', '58.57.5.26', '', '删除', '合同记录', '9', '小堂', 'TEST', '2018-07-31 11:39:22', '2018-07-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('147', '1', '58.57.5.26', '', '新增', '合同记录', '9', '小堂', 'TEST', '2018-07-31 11:39:55', '2018-07-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('148', '1', '221.234.182.206', '', '新增', '客户列表', '10', '', 'TEST', '2018-08-01 12:24:15', '2018-08-01', '0', '0');
INSERT INTO `ci_userlog` VALUES ('149', '1', '223.74.123.188', '', '删除', '合同记录', '9', '小堂', 'TEST', '2018-08-06 18:49:49', '2018-08-06', '0', '0');
INSERT INTO `ci_userlog` VALUES ('150', '1', '116.8.33.155', '', '新增', '客户列表', '11', '', 'TEST', '2018-08-07 16:37:37', '2018-08-07', '0', '0');
INSERT INTO `ci_userlog` VALUES ('151', '1', '116.8.33.155', '', '新增', '客户列表', '12', '', 'TEST', '2018-08-07 16:38:32', '2018-08-07', '0', '0');
INSERT INTO `ci_userlog` VALUES ('152', '1', '116.8.33.155', '', '新增', '任务链接', '12', '尔尔幼儿园', 'TEST', '2018-08-07 16:40:15', '2018-08-07', '0', '0');
INSERT INTO `ci_userlog` VALUES ('153', '1', '116.8.33.155', '', '新增', '跟单记录', '12', '尔尔幼儿园', 'TEST', '2018-08-07 16:41:37', '2018-08-07', '0', '0');
INSERT INTO `ci_userlog` VALUES ('154', '1', '112.224.74.145', '', '新增', '订单记录', '7', '客户1', 'TEST', '2018-08-08 13:17:53', '2018-08-08', '0', '0');
INSERT INTO `ci_userlog` VALUES ('155', '1', '112.224.74.145', '', '新增', '客户列表', '13', '', 'TEST', '2018-08-08 13:25:10', '2018-08-08', '0', '0');
INSERT INTO `ci_userlog` VALUES ('156', '1', '116.8.33.155', '', '新增', '客户列表', '14', '', 'TEST', '2018-08-09 17:30:19', '2018-08-09', '0', '0');
INSERT INTO `ci_userlog` VALUES ('157', '1', '116.8.33.155', '', '新增', '任务链接', '14', '123幼儿园吗', 'TEST', '2018-08-09 17:32:26', '2018-08-09', '0', '0');
INSERT INTO `ci_userlog` VALUES ('158', '1', '116.8.33.155', '', '新增', '订单记录', '14', '123幼儿园吗', 'TEST', '2018-08-09 17:33:10', '2018-08-09', '0', '0');
INSERT INTO `ci_userlog` VALUES ('159', '1', '116.8.33.155', '', '新增', '合同记录', '14', '123幼儿园吗', 'TEST', '2018-08-09 17:36:11', '2018-08-09', '0', '0');
INSERT INTO `ci_userlog` VALUES ('160', '1', '219.151.231.163', '', '新增', '客户列表', '15', '', 'TEST', '2018-08-09 17:52:34', '2018-08-09', '0', '0');
INSERT INTO `ci_userlog` VALUES ('161', '1', '219.151.231.163', '', '新增', '任务链接', '15', '张三', 'TEST', '2018-08-09 17:53:16', '2018-08-09', '0', '0');
INSERT INTO `ci_userlog` VALUES ('162', '1', '219.151.231.163', '', '新增', '任务链接', '15', '张三', 'TEST', '2018-08-09 17:53:34', '2018-08-09', '0', '0');
INSERT INTO `ci_userlog` VALUES ('163', '1', '219.151.231.163', '', '新增', '任务链接', '15', '张三', 'TEST', '2018-08-09 17:54:05', '2018-08-09', '0', '0');
INSERT INTO `ci_userlog` VALUES ('164', '1', '219.151.231.163', '', '新增', '任务链接', '15', '张三', 'TEST', '2018-08-09 17:54:19', '2018-08-09', '0', '0');
INSERT INTO `ci_userlog` VALUES ('165', '1', '119.123.3.50', '', '新增', '订单记录', '15', '张三', 'TEST', '2018-08-10 10:01:49', '2018-08-10', '0', '0');
INSERT INTO `ci_userlog` VALUES ('166', '1', '219.151.231.163', '', '新增', '客户列表', '16', '', 'TEST', '2018-08-10 10:30:57', '2018-08-10', '0', '0');
INSERT INTO `ci_userlog` VALUES ('167', '1', '219.151.231.163', '', '删除', '客户列表', '15', '', 'TEST', '2018-08-10 10:31:41', '2018-08-10', '0', '0');
INSERT INTO `ci_userlog` VALUES ('168', '5', '219.151.231.163', '', '新增', '客户列表', '17', '', 'test', '2018-08-10 10:34:24', '2018-08-10', '0', '0');
INSERT INTO `ci_userlog` VALUES ('169', '5', '219.151.231.163', '', '新增', '任务链接', '16', '附一', 'test', '2018-08-10 10:39:52', '2018-08-10', '0', '0');
INSERT INTO `ci_userlog` VALUES ('170', '5', '219.151.231.163', '', '修改', '跟单记录', '0', '', 'test', '2018-08-10 10:40:54', '2018-08-10', '0', '0');
INSERT INTO `ci_userlog` VALUES ('171', '5', '219.151.231.163', '', '修改', '跟单记录', '0', '', 'test', '2018-08-10 10:41:03', '2018-08-10', '0', '0');
INSERT INTO `ci_userlog` VALUES ('172', '5', '219.151.231.163', '', '新增', '任务链接', '16', '附一', 'test', '2018-08-10 10:42:38', '2018-08-10', '0', '0');
INSERT INTO `ci_userlog` VALUES ('173', '5', '219.151.231.163', '', '新增', '跟单记录', '16', '附一', 'test', '2018-08-10 10:43:17', '2018-08-10', '0', '0');
INSERT INTO `ci_userlog` VALUES ('174', '5', '219.151.231.163', '', '修改', '跟单记录', '0', '', 'test', '2018-08-10 10:44:08', '2018-08-10', '0', '0');
INSERT INTO `ci_userlog` VALUES ('175', '5', '219.151.231.163', '', '新增', '任务链接', '17', '吴五', 'test', '2018-08-10 10:52:25', '2018-08-10', '0', '0');
INSERT INTO `ci_userlog` VALUES ('176', '5', '219.151.231.163', '', '新增', '任务链接', '17', '吴五', 'test', '2018-08-10 10:52:53', '2018-08-10', '0', '0');
INSERT INTO `ci_userlog` VALUES ('177', '5', '219.151.231.163', '', '新增', '任务链接', '17', '吴五', 'test', '2018-08-10 10:53:20', '2018-08-10', '0', '0');
INSERT INTO `ci_userlog` VALUES ('178', '5', '219.151.231.163', '', '新增', '订单记录', '16', '附一', 'test', '2018-08-10 11:05:52', '2018-08-10', '0', '0');
INSERT INTO `ci_userlog` VALUES ('179', '5', '219.151.231.163', '', '删除', '任务链接', '16', '附一', 'test', '2018-08-10 14:50:50', '2018-08-10', '0', '0');
INSERT INTO `ci_userlog` VALUES ('180', '7', '39.80.65.149', '', '新增', '客户列表', '18', '', '张英', '2018-08-11 12:26:16', '2018-08-11', '0', '0');
INSERT INTO `ci_userlog` VALUES ('181', '1', '183.160.44.204', '', '修改', '跟单记录', '0', '', 'TEST', '2018-08-11 14:51:30', '2018-08-11', '0', '0');
INSERT INTO `ci_userlog` VALUES ('182', '1', '113.65.211.173', '', '删除', '客户列表', '18', '', 'TEST', '2018-08-11 15:54:02', '2018-08-11', '0', '0');
INSERT INTO `ci_userlog` VALUES ('183', '1', '183.160.44.204', '', '新增', '合同记录', '14', '123幼儿园吗', 'TEST', '2018-08-11 16:06:08', '2018-08-11', '0', '0');
INSERT INTO `ci_userlog` VALUES ('184', '7', '113.65.211.173', '', '新增', '客户列表', '19', '', '张英', '2018-08-11 16:06:23', '2018-08-11', '0', '0');
INSERT INTO `ci_userlog` VALUES ('185', '1', '183.160.44.204', '', '修改', '跟单记录', '0', '', 'TEST', '2018-08-11 16:06:36', '2018-08-11', '0', '0');
INSERT INTO `ci_userlog` VALUES ('186', '1', '183.160.44.204', '', '删除', '合同记录', '14', '123幼儿园吗', 'TEST', '2018-08-11 16:06:44', '2018-08-11', '0', '0');
INSERT INTO `ci_userlog` VALUES ('187', '1', '183.160.44.204', '', '新增', '合同记录', '17', '吴五', 'TEST', '2018-08-11 16:08:37', '2018-08-11', '0', '0');
INSERT INTO `ci_userlog` VALUES ('188', '1', '116.8.39.94', '', '新增', '订单记录', '14', '123幼儿园吗', 'TEST', '2018-08-12 14:46:14', '2018-08-12', '0', '0');
INSERT INTO `ci_userlog` VALUES ('189', '1', '116.8.39.94', '', '新增', '跟单记录', '14', '123幼儿园吗', 'TEST', '2018-08-12 15:12:26', '2018-08-12', '0', '0');
INSERT INTO `ci_userlog` VALUES ('190', '1', '116.8.39.94', '', '新增', '客户列表', '20', '', 'TEST', '2018-08-13 09:31:20', '2018-08-13', '0', '0');
INSERT INTO `ci_userlog` VALUES ('191', '1', '114.240.224.193', '', '修改', '客户列表', '20', '幼儿园', 'TEST', '2018-08-18 10:38:08', '2018-08-18', '0', '0');
INSERT INTO `ci_userlog` VALUES ('192', '1', '175.0.225.58', '', '新增', '任务链接', '20', '幼儿园', 'TEST', '2018-08-21 11:45:54', '2018-08-21', '0', '0');
INSERT INTO `ci_userlog` VALUES ('193', '1', '175.0.225.58', '', '新增', '跟单记录', '20', '幼儿园', 'TEST', '2018-08-21 11:46:00', '2018-08-21', '0', '0');
INSERT INTO `ci_userlog` VALUES ('194', '1', '123.128.205.237', '', '新增', '任务链接', '19', '深圳市家鸿口腔医疗股份有限公司', 'TEST', '2018-08-23 18:00:07', '2018-08-23', '0', '0');
INSERT INTO `ci_userlog` VALUES ('195', '1', '123.128.205.237', '', '新增', '跟单记录', '19', '深圳市家鸿口腔医疗股份有限公司', 'TEST', '2018-08-23 18:00:20', '2018-08-23', '0', '0');
INSERT INTO `ci_userlog` VALUES ('196', '1', '123.128.205.237', '', '删除', '跟单记录', '0', '', 'TEST', '2018-08-23 18:07:45', '2018-08-23', '0', '0');
INSERT INTO `ci_userlog` VALUES ('197', '1', '123.128.205.237', '', '新增', '任务链接', '16', '附一', 'TEST', '2018-08-23 18:13:57', '2018-08-23', '0', '0');
INSERT INTO `ci_userlog` VALUES ('198', '1', '123.128.205.237', '', '新增', '跟单记录', '16', '附一', 'TEST', '2018-08-23 18:14:10', '2018-08-23', '0', '0');
INSERT INTO `ci_userlog` VALUES ('199', '1', '123.128.205.237', '', '删除', '跟单记录', '0', '', 'TEST', '2018-08-23 18:14:32', '2018-08-23', '0', '0');
INSERT INTO `ci_userlog` VALUES ('200', '1', '123.128.205.237', '', '删除', '跟单记录', '0', '', 'TEST', '2018-08-23 18:31:46', '2018-08-23', '0', '0');
INSERT INTO `ci_userlog` VALUES ('201', '1', '49.70.122.128', '', '删除', '跟单记录', '0', '', 'TEST', '2018-08-23 19:26:39', '2018-08-23', '0', '0');
INSERT INTO `ci_userlog` VALUES ('202', '1', '123.128.205.237', null, '删除', '收支记录', '0', '', 'TEST', '2018-08-23 19:36:05', '2018-08-23', '0', '0');
INSERT INTO `ci_userlog` VALUES ('203', '1', '122.238.71.175', '', '新增', '合同记录', '20', '幼儿园', 'TEST', '2018-08-24 15:05:45', '2018-08-24', '0', '0');
INSERT INTO `ci_userlog` VALUES ('204', '1', '61.140.86.170', '', '删除', '跟单记录', '0', '', 'TEST', '2018-08-29 09:21:39', '2018-08-29', '0', '0');
INSERT INTO `ci_userlog` VALUES ('205', '1', '61.140.86.170', '', '修改', '客户列表', '15', '张三', 'TEST', '2018-08-29 09:24:27', '2018-08-29', '0', '0');
INSERT INTO `ci_userlog` VALUES ('206', '1', '61.140.86.170', '', '新增', '跟单记录', '15', '张三', 'TEST', '2018-08-29 09:24:57', '2018-08-29', '0', '0');
INSERT INTO `ci_userlog` VALUES ('207', '1', '61.140.86.170', '', '修改', '客户列表', '15', '张三', 'TEST', '2018-08-29 09:29:12', '2018-08-29', '0', '0');
INSERT INTO `ci_userlog` VALUES ('208', '1', '61.140.86.170', '', '新增', '客户列表', '21', '', 'TEST', '2018-08-29 09:32:10', '2018-08-29', '0', '0');
INSERT INTO `ci_userlog` VALUES ('209', '1', '61.140.86.170', '', '修改', '客户列表', '21', '测试', 'TEST', '2018-08-29 09:32:41', '2018-08-29', '0', '0');
INSERT INTO `ci_userlog` VALUES ('210', '1', '61.140.86.170', '', '修改', '客户列表', '21', '测试', 'TEST', '2018-08-29 09:33:28', '2018-08-29', '0', '0');
INSERT INTO `ci_userlog` VALUES ('211', '1', '183.135.227.58', '', '新增', '客户列表', '22', '', 'TEST', '2018-08-30 16:17:01', '2018-08-30', '0', '0');
INSERT INTO `ci_userlog` VALUES ('212', '1', '183.135.227.58', '', '新增', '任务链接', '22', '深圳事情奢望有限公司呢', 'TEST', '2018-08-30 16:18:08', '2018-08-30', '0', '0');
INSERT INTO `ci_userlog` VALUES ('213', '1', '183.135.227.58', '', '新增', '跟单记录', '22', '深圳事情奢望有限公司呢', 'TEST', '2018-08-30 16:18:28', '2018-08-30', '0', '0');
INSERT INTO `ci_userlog` VALUES ('214', '1', '183.135.227.58', '', '新增', '订单记录', '22', '深圳事情奢望有限公司呢', 'TEST', '2018-08-30 16:20:14', '2018-08-30', '0', '0');
INSERT INTO `ci_userlog` VALUES ('215', '8', '180.104.28.120', '', '新增', '客户列表', '23', '', '威子', '2018-09-02 10:57:59', '2018-09-02', '0', '0');
INSERT INTO `ci_userlog` VALUES ('216', '8', '180.104.28.120', '', '修改', '跟单记录', '0', '', '威子', '2018-09-02 10:58:47', '2018-09-02', '0', '0');
INSERT INTO `ci_userlog` VALUES ('217', '8', '180.104.28.120', '', '删除', '订单记录', '14', '123幼儿园吗', '威子', '2018-09-02 10:59:37', '2018-09-02', '0', '0');
INSERT INTO `ci_userlog` VALUES ('218', '1', '117.136.52.201', '', '删除', '客户列表', '23', '', 'TEST', '2018-09-04 13:45:58', '2018-09-04', '0', '0');
INSERT INTO `ci_userlog` VALUES ('219', '1', '111.37.251.215', '', '修改', '客户列表', '18', '烟台刘先生', 'TEST', '2018-09-06 23:18:58', '2018-09-06', '0', '0');
INSERT INTO `ci_userlog` VALUES ('220', '1', '116.54.27.146', '', '新增', '订单记录', '16', '附一', 'TEST', '2018-09-08 16:21:23', '2018-09-08', '0', '0');
INSERT INTO `ci_userlog` VALUES ('221', '1', '127.0.0.1', '', '新增', '客户列表', '24', '', 'TEST', '2018-09-12 17:00:49', '2018-09-12', '0', '0');
INSERT INTO `ci_userlog` VALUES ('222', '1', '127.0.0.1', '', '修改', '客户列表', '24', 'liandong', 'TEST', '2018-09-12 17:29:17', '2018-09-12', '0', '0');
INSERT INTO `ci_userlog` VALUES ('223', '1', '127.0.0.1', '', '修改', '客户列表', '24', 'liandong', 'TEST', '2018-09-12 17:29:32', '2018-09-12', '0', '0');
INSERT INTO `ci_userlog` VALUES ('224', '1', '127.0.0.1', '', '修改', '客户列表', '24', 'liandong', 'TEST', '2018-09-12 17:30:07', '2018-09-12', '0', '0');
INSERT INTO `ci_userlog` VALUES ('225', '1', '127.0.0.1', '', '修改', '客户列表', '24', 'liandong', 'TEST', '2018-09-12 17:38:08', '2018-09-12', '0', '0');
INSERT INTO `ci_userlog` VALUES ('226', '1', '127.0.0.1', '', '修改', '客户列表', '24', 'liandong', 'TEST', '2018-09-12 17:39:49', '2018-09-12', '0', '0');
INSERT INTO `ci_userlog` VALUES ('227', '1', '127.0.0.1', '', '修改', '客户列表', '24', 'liandong', 'TEST', '2018-09-12 17:42:23', '2018-09-12', '0', '0');
INSERT INTO `ci_userlog` VALUES ('228', '1', '127.0.0.1', '', '修改', '客户列表', '24', 'liandong', 'TEST', '2018-09-12 17:42:42', '2018-09-12', '0', '0');
INSERT INTO `ci_userlog` VALUES ('229', '1', '127.0.0.1', '', '修改', '客户列表', '24', 'liandong', 'TEST', '2018-09-12 17:46:38', '2018-09-12', '0', '0');
INSERT INTO `ci_userlog` VALUES ('230', '1', '127.0.0.1', '', '删除', '客户列表', '24', '', 'TEST', '2018-09-12 17:51:51', '2018-09-12', '0', '0');
INSERT INTO `ci_userlog` VALUES ('231', '1', '127.0.0.1', '', '新增', '客户列表', '25', '', 'TEST', '2018-09-12 17:52:36', '2018-09-12', '0', '0');
INSERT INTO `ci_userlog` VALUES ('232', '1', '127.0.0.1', '', '修改', '客户列表', '25', 'zhangsan', 'TEST', '2018-09-12 17:53:31', '2018-09-12', '0', '0');
INSERT INTO `ci_userlog` VALUES ('233', '1', '127.0.0.1', '', '修改', '客户列表', '25', 'zhangsan', 'TEST', '2018-09-12 18:10:27', '2018-09-12', '0', '0');
INSERT INTO `ci_userlog` VALUES ('234', '1', '127.0.0.1', '', '新增', '客户列表', '26', '', 'TEST', '2018-09-12 18:12:35', '2018-09-12', '0', '0');
INSERT INTO `ci_userlog` VALUES ('235', '1', '127.0.0.1', '', '修改', '客户列表', '26', '王五', 'TEST', '2018-09-12 18:13:22', '2018-09-12', '0', '0');
INSERT INTO `ci_userlog` VALUES ('236', '1', '127.0.0.1', '', '修改', '客户列表', '26', '王五', 'TEST', '2018-09-12 18:13:40', '2018-09-12', '0', '0');
INSERT INTO `ci_userlog` VALUES ('237', '1', '127.0.0.1', '', '修改', '客户列表', '25', 'zhangsan', 'TEST', '2018-09-12 18:15:41', '2018-09-12', '0', '0');
INSERT INTO `ci_userlog` VALUES ('238', '1', '127.0.0.1', '', '删除', '客户列表', '26', '', 'TEST', '2018-09-12 18:16:04', '2018-09-12', '0', '0');
INSERT INTO `ci_userlog` VALUES ('239', '1', '127.0.0.1', '', '删除', '客户列表', '25', '', 'TEST', '2018-09-12 18:16:07', '2018-09-12', '0', '0');
INSERT INTO `ci_userlog` VALUES ('240', '1', '127.0.0.1', '', '修改', '任务链接', '22', '深圳事情奢望有限公司呢', 'TEST', '2018-09-12 18:52:50', '2018-09-12', '0', '0');
INSERT INTO `ci_userlog` VALUES ('241', '1', '127.0.0.1', '', '新增', '客户列表', '23', '', 'TEST', '2018-09-14 11:51:22', '2018-09-14', '0', '0');
INSERT INTO `ci_userlog` VALUES ('242', '1', '127.0.0.1', '', '新增', '客户列表', '24', '', 'TEST', '2018-09-14 11:55:42', '2018-09-14', '0', '0');
INSERT INTO `ci_userlog` VALUES ('243', '1', '127.0.0.1', '', '修改', '客户列表', '24', '小王', 'TEST', '2018-09-14 11:56:17', '2018-09-14', '0', '0');
INSERT INTO `ci_userlog` VALUES ('244', '1', '127.0.0.1', '', '新增', '任务链接', '24', '小王', 'TEST', '2018-09-14 11:57:11', '2018-09-14', '0', '0');
INSERT INTO `ci_userlog` VALUES ('245', '1', '127.0.0.1', '', '修改', '客户列表', '24', '小王', 'TEST', '2018-09-14 11:57:34', '2018-09-14', '0', '0');
INSERT INTO `ci_userlog` VALUES ('246', '1', '127.0.0.1', '', '修改', '客户列表', '22', '深圳事情奢望有限公司呢', 'TEST', '2018-09-14 12:17:29', '2018-09-14', '0', '0');
INSERT INTO `ci_userlog` VALUES ('247', '10', '127.0.0.1', '', '新增', '客户列表', '25', '', 'ceshi2', '2018-09-26 19:56:41', '2018-09-26', '0', '0');
INSERT INTO `ci_userlog` VALUES ('248', '10', '127.0.0.1', '', '新增', '跟单记录', '25', 'xiaozhang', 'ceshi2', '2018-09-26 19:57:20', '2018-09-26', '0', '0');
INSERT INTO `ci_userlog` VALUES ('249', '10', '127.0.0.1', '', '新增', '订单记录', '25', 'xiaozhang', 'ceshi2', '2018-09-26 20:03:48', '2018-09-26', '0', '0');
INSERT INTO `ci_userlog` VALUES ('250', '10', '127.0.0.1', '', '新增', '合同记录', '25', 'xiaozhang', 'ceshi2', '2018-09-26 20:05:59', '2018-09-26', '0', '0');
INSERT INTO `ci_userlog` VALUES ('251', '9', '127.0.0.1', '', '新增', '客户列表', '26', '', 'ceshi', '2018-09-26 20:21:42', '2018-09-26', '0', '0');
INSERT INTO `ci_userlog` VALUES ('252', '9', '127.0.0.1', '', '新增', '跟单记录', '26', 'xiaotian', 'ceshi', '2018-09-26 20:22:02', '2018-09-26', '0', '0');
INSERT INTO `ci_userlog` VALUES ('253', '9', '127.0.0.1', '', '修改', '客户列表', '25', 'xiaozhang', 'ceshi', '2018-09-26 21:08:43', '2018-09-26', '0', '0');
INSERT INTO `ci_userlog` VALUES ('254', '9', '127.0.0.1', '', '修改', '跟单记录', '0', '', 'ceshi', '2018-09-26 21:09:07', '2018-09-26', '0', '0');
INSERT INTO `ci_userlog` VALUES ('255', '1', '127.0.0.1', '', '删除', '客户列表', '55', '', 'TEST', '2018-09-29 20:30:09', '2018-09-29', '0', '0');
INSERT INTO `ci_userlog` VALUES ('256', '1', '127.0.0.1', '', '删除', '客户列表', '56', '', 'TEST', '2018-09-29 20:30:12', '2018-09-29', '0', '0');
INSERT INTO `ci_userlog` VALUES ('257', '1', '127.0.0.1', '', '删除', '客户列表', '57', '', 'TEST', '2018-09-29 20:30:15', '2018-09-29', '0', '0');
INSERT INTO `ci_userlog` VALUES ('258', '1', '127.0.0.1', '', '修改', '客户列表', '120', '342', 'TEST', '2018-09-29 20:42:31', '2018-09-29', '0', '0');
INSERT INTO `ci_userlog` VALUES ('259', '1', '127.0.0.1', '', '修改', '客户列表', '377', '342', 'TEST', '2018-10-05 17:25:39', '2018-10-05', '0', '0');
INSERT INTO `ci_userlog` VALUES ('260', '1', '127.0.0.1', '', '新增', '收支记录', '0', '', 'TEST', '2018-10-07 13:37:36', '2018-10-07', '0', '0');
INSERT INTO `ci_userlog` VALUES ('261', '1', '127.0.0.1', '', '新增', '收支记录', '26', 'xiaotian', 'TEST', '2018-10-07 13:38:09', '2018-10-07', '0', '0');
INSERT INTO `ci_userlog` VALUES ('262', '1', '127.0.0.1', '', '新增', '收支记录', '26', 'xiaotian', 'TEST', '2018-10-07 13:38:18', '2018-10-07', '0', '0');
INSERT INTO `ci_userlog` VALUES ('263', '1', '127.0.0.1', '', '新增', '收支记录', '22', '深圳事情奢望有限公司呢', 'TEST', '2018-10-07 13:38:33', '2018-10-07', '0', '0');
INSERT INTO `ci_userlog` VALUES ('264', '1', '127.0.0.1', '', '新增', '收支记录', '22', '深圳事情奢望有限公司呢', 'TEST', '2018-10-07 13:38:42', '2018-10-07', '0', '0');
INSERT INTO `ci_userlog` VALUES ('265', '1', '127.0.0.1', '', '修改', '跟单记录', '0', '', 'TEST', '2018-12-04 20:32:31', '2018-12-04', '0', '0');
INSERT INTO `ci_userlog` VALUES ('266', '1', '127.0.0.1', '', '新增', '合同到款', '20', '幼儿园', 'TEST', '2018-12-04 20:40:01', '2018-12-04', '0', '0');
INSERT INTO `ci_userlog` VALUES ('267', '1', '127.0.0.1', '', '新增', '合同到款', '25', 'xiaozhang', 'TEST', '2018-12-04 20:40:12', '2018-12-04', '0', '0');
INSERT INTO `ci_userlog` VALUES ('268', '1', '127.0.0.1', '', '新增', '合同到款', '17', '吴五', 'TEST', '2018-12-04 20:40:21', '2018-12-04', '0', '0');
INSERT INTO `ci_userlog` VALUES ('269', '1', '127.0.0.1', '', '新增', '合同到款', '17', '吴五', 'TEST', '2018-12-04 20:40:35', '2018-12-04', '0', '0');
INSERT INTO `ci_userlog` VALUES ('270', '1', '127.0.0.1', '', '新增', '合同到款', '14', '123幼儿园吗', 'TEST', '2018-12-04 20:40:41', '2018-12-04', '0', '0');
INSERT INTO `ci_userlog` VALUES ('271', '1', '127.0.0.1', '', '新增', '合同到款', '17', '吴五', 'TEST', '2018-12-04 20:43:45', '2018-12-04', '0', '0');
INSERT INTO `ci_userlog` VALUES ('272', '1', '127.0.0.1', '', '修改', '客户列表', '26', 'xiaotian', 'TEST', '2019-03-31 19:05:13', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('273', '1', '127.0.0.1', '', '新增', '订单记录', '26', 'xiaotian', 'TEST', '2019-03-31 19:25:24', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('274', '1', '127.0.0.1', '', '新增', '合同记录', '26', 'xiaotian', 'TEST', '2019-03-31 19:35:35', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('275', '1', '127.0.0.1', '', '新增', '合同到款', '26', 'xiaotian', 'TEST', '2019-03-31 19:35:51', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('276', '1', '127.0.0.1', '', '新增', '合同到款', '26', 'xiaotian', 'TEST', '2019-03-31 19:49:06', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('277', '1', '127.0.0.1', '', '新增', '合同到款', '26', 'xiaotian', 'TEST', '2019-03-31 19:49:17', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('278', '1', '127.0.0.1', '', '新增', '合同到款', '26', 'xiaotian', 'TEST', '2019-03-31 19:55:31', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('279', '1', '127.0.0.1', '', '删除', '合同记录', '26', 'xiaotian', 'TEST', '2019-03-31 19:55:44', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('280', '1', '127.0.0.1', '', '新增', '合同记录', '26', 'xiaotian', 'TEST', '2019-03-31 19:56:02', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('281', '1', '127.0.0.1', '', '新增', '合同到款', '26', 'xiaotian', 'TEST', '2019-03-31 19:56:11', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('282', '1', '127.0.0.1', '', '新增', '合同到款', '26', 'xiaotian', 'TEST', '2019-03-31 19:56:59', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('283', '1', '127.0.0.1', '', '新增', '合同到款', '26', 'xiaotian', 'TEST', '2019-03-31 19:57:05', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('284', '1', '127.0.0.1', '', '新增', '合同到款', '26', 'xiaotian', 'TEST', '2019-03-31 19:57:18', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('285', '1', '127.0.0.1', '', '新增', '合同到款', '26', 'xiaotian', 'TEST', '2019-03-31 19:57:25', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('286', '1', '127.0.0.1', '', '新增', '合同到款', '26', 'xiaotian', 'TEST', '2019-03-31 19:57:37', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('287', '1', '127.0.0.1', '', '新增', '合同到款', '26', 'xiaotian', 'TEST', '2019-03-31 20:00:23', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('288', '1', '127.0.0.1', '', '新增', '合同到款', '26', 'xiaotian', 'TEST', '2019-03-31 20:03:44', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('289', '1', '127.0.0.1', '', '删除', '合同记录', '14', '123幼儿园吗', 'TEST', '2019-03-31 20:04:42', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('290', '1', '127.0.0.1', '', '删除', '合同记录', '17', '吴五', 'TEST', '2019-03-31 20:04:45', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('291', '1', '127.0.0.1', '', '删除', '合同记录', '20', '幼儿园', 'TEST', '2019-03-31 20:04:47', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('292', '1', '127.0.0.1', '', '删除', '合同记录', '25', 'xiaozhang', 'TEST', '2019-03-31 20:04:50', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('293', '1', '127.0.0.1', '', '删除', '合同记录', '26', 'xiaotian', 'TEST', '2019-03-31 20:04:53', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('294', '1', '127.0.0.1', '', '新增', '合同记录', '26', 'xiaotian', 'TEST', '2019-03-31 20:06:37', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('295', '1', '127.0.0.1', '', '新增', '合同到款', '26', 'xiaotian', 'TEST', '2019-03-31 20:07:20', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('296', '1', '127.0.0.1', '', '新增', '合同到款', '26', 'xiaotian', 'TEST', '2019-03-31 20:07:57', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('297', '1', '127.0.0.1', '', '新增', '合同到款', '26', 'xiaotian', 'TEST', '2019-03-31 20:08:06', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('298', '1', '127.0.0.1', '', '新增', '合同到款', '26', 'xiaotian', 'TEST', '2019-03-31 20:08:15', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('299', '1', '127.0.0.1', '', '新增', '订单记录', '26', 'xiaotian', 'TEST', '2019-03-31 20:10:15', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('300', '1', '127.0.0.1', '', '新增', '合同记录', '26', 'xiaotian', 'TEST', '2019-03-31 20:11:41', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('301', '1', '127.0.0.1', '', '新增', '合同到款', '26', 'xiaotian', 'TEST', '2019-03-31 20:22:21', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('302', '1', '127.0.0.1', '', '新增', '合同到款', '26', 'xiaotian', 'TEST', '2019-03-31 20:22:28', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('303', '1', '127.0.0.1', '', '新增', '合同到款', '26', 'xiaotian', 'TEST', '2019-03-31 20:22:34', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('304', '1', '127.0.0.1', '', '新增', '合同到款', '26', 'xiaotian', 'TEST', '2019-03-31 20:22:40', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('305', '1', '127.0.0.1', '', '新增', '合同到款', '26', 'xiaotian', 'TEST', '2019-03-31 20:22:44', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('306', '1', '127.0.0.1', '', '删除', '合同记录', '26', 'xiaotian', 'TEST', '2019-03-31 20:24:50', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('307', '1', '127.0.0.1', '', '新增', '合同记录', '26', 'xiaotian', 'TEST', '2019-03-31 20:25:16', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('308', '1', '127.0.0.1', '', '新增', '合同到款', '26', 'xiaotian', 'TEST', '2019-03-31 20:27:32', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('309', '1', '127.0.0.1', '', '新增', '合同到款', '26', 'xiaotian', 'TEST', '2019-03-31 20:27:40', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('310', '1', '127.0.0.1', '', '新增', '合同到款', '26', 'xiaotian', 'TEST', '2019-03-31 20:30:36', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('311', '1', '127.0.0.1', '', '删除', '合同记录', '26', 'xiaotian', 'TEST', '2019-03-31 20:34:26', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('312', '1', '127.0.0.1', '', '删除', '合同记录', '26', 'xiaotian', 'TEST', '2019-03-31 20:34:29', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('313', '1', '127.0.0.1', '', '新增', '合同记录', '26', 'xiaotian', 'TEST', '2019-03-31 20:35:09', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('314', '1', '127.0.0.1', '', '新增', '合同到款', '26', 'xiaotian', 'TEST', '2019-03-31 20:35:17', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('315', '1', '127.0.0.1', '', '新增', '合同到款', '26', 'xiaotian', 'TEST', '2019-03-31 20:35:23', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('316', '1', '127.0.0.1', '', '新增', '合同到款', '26', 'xiaotian', 'TEST', '2019-03-31 20:35:30', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('317', '1', '127.0.0.1', '', '新增', '合同到款', '26', 'xiaotian', 'TEST', '2019-03-31 20:35:37', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('318', '1', '127.0.0.1', '', '新增', '合同记录', '26', 'xiaotian', 'TEST', '2019-03-31 20:43:02', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('319', '1', '127.0.0.1', '', '修改', '跟单记录', '0', '', 'TEST', '2019-03-31 20:43:35', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('320', '1', '127.0.0.1', '', '删除', '合同记录', '26', 'xiaotian', 'TEST', '2019-03-31 20:50:03', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('321', '1', '127.0.0.1', '', '删除', '合同记录', '26', 'xiaotian', 'TEST', '2019-03-31 20:50:06', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('322', '1', '127.0.0.1', '', '新增', '合同记录', '26', 'xiaotian', 'TEST', '2019-03-31 20:50:45', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('323', '1', '127.0.0.1', '', '删除', '合同记录', '26', 'xiaotian', 'TEST', '2019-03-31 20:53:05', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('324', '1', '127.0.0.1', '', '新增', '合同记录', '26', 'xiaotian', 'TEST', '2019-03-31 20:53:59', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('325', '1', '127.0.0.1', '', '删除', '合同记录', '26', 'xiaotian', 'TEST', '2019-03-31 20:54:09', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('326', '1', '127.0.0.1', '', '新增', '合同记录', '26', 'xiaotian', 'TEST', '2019-03-31 20:55:21', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('327', '1', '127.0.0.1', '', '删除', '合同记录', '26', 'xiaotian', 'TEST', '2019-03-31 20:57:05', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('328', '1', '127.0.0.1', '', '删除', '订单记录', '26', 'xiaotian', 'TEST', '2019-03-31 20:57:15', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('329', '1', '127.0.0.1', '', '删除', '订单记录', '26', 'xiaotian', 'TEST', '2019-03-31 20:57:17', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('330', '1', '127.0.0.1', '', '新增', '订单记录', '26', 'xiaotian', 'TEST', '2019-03-31 20:58:04', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('331', '1', '127.0.0.1', '', '新增', '合同记录', '26', 'xiaotian', 'TEST', '2019-03-31 21:00:15', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('332', '1', '127.0.0.1', '', '删除', '合同记录', '26', 'xiaotian', 'TEST', '2019-03-31 21:05:49', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('333', '1', '127.0.0.1', '', '新增', '合同记录', '26', 'xiaotian', 'TEST', '2019-03-31 21:06:41', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('334', '1', '127.0.0.1', '', '删除', '合同记录', '26', 'xiaotian', 'TEST', '2019-03-31 21:11:06', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('335', '1', '127.0.0.1', '', '新增', '合同记录', '26', 'xiaotian', 'TEST', '2019-03-31 21:17:20', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('336', '1', '127.0.0.1', '', '修改', '跟单记录', '0', '', 'TEST', '2019-03-31 21:17:32', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('337', '1', '127.0.0.1', '', '新增', '合同到款', '26', 'xiaotian', 'TEST', '2019-03-31 21:20:17', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('338', '1', '127.0.0.1', '', '新增', '合同到款', '26', 'xiaotian', 'TEST', '2019-03-31 21:20:24', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('339', '1', '127.0.0.1', '', '新增', '合同到款', '26', 'xiaotian', 'TEST', '2019-03-31 21:20:30', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('340', '1', '127.0.0.1', '', '新增', '合同到款', '26', 'xiaotian', 'TEST', '2019-03-31 21:20:35', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('341', '1', '127.0.0.1', '', '删除', '跟单记录', '0', '', 'TEST', '2019-03-31 21:25:27', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('342', '1', '127.0.0.1', '', '删除', '跟单记录', '0', '', 'TEST', '2019-03-31 21:25:29', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('343', '1', '127.0.0.1', '', '删除', '跟单记录', '0', '', 'TEST', '2019-03-31 21:25:32', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('344', '1', '127.0.0.1', '', '删除', '跟单记录', '0', '', 'TEST', '2019-03-31 21:25:34', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('345', '1', '127.0.0.1', '', '删除', '订单记录', '26', 'xiaotian', 'TEST', '2019-03-31 21:25:39', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('346', '1', '127.0.0.1', '', '删除', '合同记录', '26', 'xiaotian', 'TEST', '2019-03-31 21:25:44', '2019-03-31', '0', '0');
INSERT INTO `ci_userlog` VALUES ('347', '1', '121.234.245.173', '', '修改', '客户列表', '56', '342', 'TEST', '2019-04-01 10:59:40', '2019-04-01', '0', '0');
INSERT INTO `ci_userlog` VALUES ('348', '1', '49.89.108.13', '', '修改', '客户列表', '56', '342', 'TEST', '2019-04-01 11:52:39', '2019-04-01', '0', '0');
INSERT INTO `ci_userlog` VALUES ('349', '1', '49.89.108.13', '', '新增', '任务链接', '56', '342', 'TEST', '2019-04-01 13:00:57', '2019-04-01', '0', '0');
INSERT INTO `ci_userlog` VALUES ('350', '1', '49.89.108.13', '', '新增', '跟单记录', '56', '342', 'TEST', '2019-04-01 13:01:31', '2019-04-01', '0', '0');
INSERT INTO `ci_userlog` VALUES ('351', '1', '49.89.108.13', null, '删除', '收支记录', '0', '', 'TEST', '2019-04-01 14:37:31', '2019-04-01', '0', '0');
INSERT INTO `ci_userlog` VALUES ('352', '1', '49.89.108.13', null, '删除', '收支记录', '0', '', 'TEST', '2019-04-01 14:37:33', '2019-04-01', '0', '0');
INSERT INTO `ci_userlog` VALUES ('353', '1', '49.89.108.13', null, '删除', '收支记录', '0', '', 'TEST', '2019-04-01 14:37:35', '2019-04-01', '0', '0');
INSERT INTO `ci_userlog` VALUES ('354', '1', '49.89.108.13', null, '删除', '收支记录', '0', '', 'TEST', '2019-04-01 14:37:39', '2019-04-01', '0', '0');
INSERT INTO `ci_userlog` VALUES ('355', '1', '118.252.99.179', '', '新增', '订单记录', '65', '薛十一', 'TEST', '2019-05-05 17:13:43', '2019-05-05', '0', '0');
INSERT INTO `ci_userlog` VALUES ('356', '1', '118.252.99.179', '', '新增', '合同记录', '65', '薛十一', 'TEST', '2019-05-05 17:14:34', '2019-05-05', '0', '0');
INSERT INTO `ci_userlog` VALUES ('357', '1', '118.252.99.179', '', '新增', '任务链接', '65', '薛十一', 'TEST', '2019-05-05 17:16:16', '2019-05-05', '0', '0');
INSERT INTO `ci_userlog` VALUES ('358', '1', '118.252.99.179', '', '新增', '跟单记录', '65', '薛十一', 'TEST', '2019-05-05 17:16:30', '2019-05-05', '0', '0');
INSERT INTO `ci_userlog` VALUES ('359', '1', '112.9.221.146', '', '新增', '客户列表', '66', '', 'TEST', '2019-05-07 08:49:46', '2019-05-07', '0', '0');
INSERT INTO `ci_userlog` VALUES ('360', '1', '112.9.221.146', '', '删除', '跟单记录', '0', '', 'TEST', '2019-05-07 08:50:25', '2019-05-07', '0', '0');
INSERT INTO `ci_userlog` VALUES ('361', '1', '112.9.221.146', '', '删除', '跟单记录', '0', '', 'TEST', '2019-05-07 08:50:27', '2019-05-07', '0', '0');
INSERT INTO `ci_userlog` VALUES ('362', '1', '112.9.221.146', '', '修改', '客户列表', '66', '123', 'TEST', '2019-05-07 08:51:14', '2019-05-07', '0', '0');
INSERT INTO `ci_userlog` VALUES ('363', '1', '112.9.221.146', '', '删除', '合同记录', '65', '薛十一', 'TEST', '2019-05-07 08:51:40', '2019-05-07', '0', '0');

-- ----------------------------
-- Table structure for `ci_userloginlog`
-- ----------------------------
DROP TABLE IF EXISTS `ci_userloginlog`;
CREATE TABLE `ci_userloginlog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT '0' COMMENT '用户ID',
  `ip` varchar(25) DEFAULT '',
  `adduser` varchar(50) DEFAULT '' COMMENT '用户名',
  `adddate` date DEFAULT NULL,
  `addtime` datetime DEFAULT NULL COMMENT '写入日期',
  PRIMARY KEY (`id`),
  KEY `userId` (`uid`),
  KEY `adddate` (`adddate`)
) ENGINE=InnoDB AUTO_INCREMENT=442 DEFAULT CHARSET=utf8 COMMENT='登陆日志';

-- ----------------------------
-- Records of ci_userloginlog
-- ----------------------------
INSERT INTO `ci_userloginlog` VALUES ('1', '1', '127.0.0.1', 'TEST', '2016-08-26', '2016-08-26 14:12:18');
INSERT INTO `ci_userloginlog` VALUES ('2', '1', '127.0.0.1', 'TEST', '2016-08-26', '2016-08-26 14:57:28');
INSERT INTO `ci_userloginlog` VALUES ('3', '3', '127.0.0.1', '小名', '2016-08-26', '2016-08-26 18:24:50');
INSERT INTO `ci_userloginlog` VALUES ('4', '1', '127.0.0.1', 'TEST', '2016-08-26', '2016-08-26 18:25:11');
INSERT INTO `ci_userloginlog` VALUES ('5', '2', '127.0.0.1', '小飞', '2016-08-26', '2016-08-26 18:29:06');
INSERT INTO `ci_userloginlog` VALUES ('6', '2', '127.0.0.1', '小飞', '2016-08-26', '2016-08-26 18:47:09');
INSERT INTO `ci_userloginlog` VALUES ('7', '1', '127.0.0.1', 'TEST', '2016-08-27', '2016-08-27 09:32:57');
INSERT INTO `ci_userloginlog` VALUES ('8', '2', '127.0.0.1', '小飞', '2016-08-27', '2016-08-27 11:54:46');
INSERT INTO `ci_userloginlog` VALUES ('9', '1', '127.0.0.1', 'TEST', '2016-08-27', '2016-08-27 12:20:50');
INSERT INTO `ci_userloginlog` VALUES ('10', '1', '127.0.0.1', 'TEST', '2016-08-27', '2016-08-27 17:38:43');
INSERT INTO `ci_userloginlog` VALUES ('11', '1', '127.0.0.1', 'TEST', '2016-08-28', '2016-08-28 11:47:25');
INSERT INTO `ci_userloginlog` VALUES ('12', '1', '127.0.0.1', 'TEST', '2016-08-29', '2016-08-29 15:52:55');
INSERT INTO `ci_userloginlog` VALUES ('13', '1', '127.0.0.1', 'TEST', '2016-08-31', '2016-08-31 09:05:45');
INSERT INTO `ci_userloginlog` VALUES ('14', '1', '127.0.0.1', 'TEST', '2016-09-01', '2016-09-01 10:08:03');
INSERT INTO `ci_userloginlog` VALUES ('15', '1', '127.0.0.1', 'TEST', '2016-09-02', '2016-09-02 09:08:23');
INSERT INTO `ci_userloginlog` VALUES ('16', '2', '127.0.0.1', '小飞', '2016-09-02', '2016-09-02 17:06:15');
INSERT INTO `ci_userloginlog` VALUES ('17', '1', '127.0.0.1', 'TEST', '2016-09-02', '2016-09-02 17:16:42');
INSERT INTO `ci_userloginlog` VALUES ('18', '3', '127.0.0.1', '小名', '2016-09-02', '2016-09-02 17:17:52');
INSERT INTO `ci_userloginlog` VALUES ('19', '3', '127.0.0.1', '小名', '2016-09-02', '2016-09-02 17:52:41');
INSERT INTO `ci_userloginlog` VALUES ('20', '1', '127.0.0.1', 'TEST', '2016-09-02', '2016-09-02 17:58:44');
INSERT INTO `ci_userloginlog` VALUES ('21', '1', '127.0.0.1', 'TEST', '2016-09-06', '2016-09-06 10:30:06');
INSERT INTO `ci_userloginlog` VALUES ('22', '1', '127.0.0.1', 'TEST', '2016-09-07', '2016-09-07 11:06:53');
INSERT INTO `ci_userloginlog` VALUES ('23', '1', '127.0.0.1', 'TEST', '2016-09-07', '2016-09-07 11:23:34');
INSERT INTO `ci_userloginlog` VALUES ('24', '1', '127.0.0.1', 'TEST', '2016-09-07', '2016-09-07 11:24:21');
INSERT INTO `ci_userloginlog` VALUES ('25', '1', '127.0.0.1', 'TEST', '2016-09-08', '2016-09-08 08:55:13');
INSERT INTO `ci_userloginlog` VALUES ('26', '1', '127.0.0.1', 'TEST', '2016-09-08', '2016-09-08 11:16:51');
INSERT INTO `ci_userloginlog` VALUES ('27', '1', '127.0.0.1', 'TEST', '2016-09-09', '2016-09-09 11:46:16');
INSERT INTO `ci_userloginlog` VALUES ('28', '1', '127.0.0.1', 'TEST', '2016-09-09', '2016-09-09 13:14:21');
INSERT INTO `ci_userloginlog` VALUES ('29', '1', '127.0.0.1', 'TEST', '2016-09-09', '2016-09-09 13:15:55');
INSERT INTO `ci_userloginlog` VALUES ('30', '1', '127.0.0.1', 'TEST', '2016-09-12', '2016-09-12 14:24:01');
INSERT INTO `ci_userloginlog` VALUES ('31', '1', '127.0.0.1', 'TEST', '2016-09-22', '2016-09-22 15:41:28');
INSERT INTO `ci_userloginlog` VALUES ('32', '1', '127.0.0.1', 'TEST', '2016-10-06', '2016-10-06 11:21:03');
INSERT INTO `ci_userloginlog` VALUES ('33', '1', '127.0.0.1', 'TEST', '2016-10-06', '2016-10-06 13:44:00');
INSERT INTO `ci_userloginlog` VALUES ('34', '1', '127.0.0.1', 'TEST', '2016-10-06', '2016-10-06 14:34:33');
INSERT INTO `ci_userloginlog` VALUES ('35', '2', '127.0.0.1', '小飞', '2016-10-06', '2016-10-06 17:13:39');
INSERT INTO `ci_userloginlog` VALUES ('36', '1', '127.0.0.1', 'TEST', '2016-10-06', '2016-10-06 17:15:26');
INSERT INTO `ci_userloginlog` VALUES ('37', '2', '127.0.0.1', '小飞', '2016-10-06', '2016-10-06 17:16:03');
INSERT INTO `ci_userloginlog` VALUES ('38', '1', '127.0.0.1', 'TEST', '2016-10-06', '2016-10-06 17:23:22');
INSERT INTO `ci_userloginlog` VALUES ('39', '2', '127.0.0.1', '小飞', '2016-10-06', '2016-10-06 17:23:59');
INSERT INTO `ci_userloginlog` VALUES ('40', '1', '127.0.0.1', 'TEST', '2016-10-06', '2016-10-06 18:35:41');
INSERT INTO `ci_userloginlog` VALUES ('41', '2', '127.0.0.1', '小飞', '2016-10-06', '2016-10-06 18:36:14');
INSERT INTO `ci_userloginlog` VALUES ('42', '1', '127.0.0.1', 'TEST', '2016-10-07', '2016-10-07 08:59:14');
INSERT INTO `ci_userloginlog` VALUES ('43', '1', '127.0.0.1', 'TEST', '2016-10-07', '2016-10-07 11:05:25');
INSERT INTO `ci_userloginlog` VALUES ('44', '2', '127.0.0.1', '小飞', '2016-10-07', '2016-10-07 13:37:14');
INSERT INTO `ci_userloginlog` VALUES ('45', '1', '127.0.0.1', 'TEST', '2016-10-07', '2016-10-07 16:03:44');
INSERT INTO `ci_userloginlog` VALUES ('46', '2', '127.0.0.1', '小飞', '2016-10-07', '2016-10-07 16:04:57');
INSERT INTO `ci_userloginlog` VALUES ('47', '1', '127.0.0.1', 'TEST', '2016-10-08', '2016-10-08 10:18:24');
INSERT INTO `ci_userloginlog` VALUES ('48', '2', '127.0.0.1', '小飞', '2016-10-08', '2016-10-08 14:17:56');
INSERT INTO `ci_userloginlog` VALUES ('49', '1', '127.0.0.1', 'TEST', '2016-10-18', '2016-10-18 10:36:04');
INSERT INTO `ci_userloginlog` VALUES ('50', '1', '127.0.0.1', 'TEST', '2016-10-20', '2016-10-20 17:14:31');
INSERT INTO `ci_userloginlog` VALUES ('51', '1', '127.0.0.1', 'TEST', '2016-10-21', '2016-10-21 16:57:40');
INSERT INTO `ci_userloginlog` VALUES ('52', '1', '127.0.0.1', 'TEST', '2016-10-24', '2016-10-24 13:03:19');
INSERT INTO `ci_userloginlog` VALUES ('53', '1', '127.0.0.1', 'TEST', '2016-11-23', '2016-11-23 16:25:19');
INSERT INTO `ci_userloginlog` VALUES ('54', '1', '127.0.0.1', 'TEST', '2016-12-19', '2016-12-19 09:11:25');
INSERT INTO `ci_userloginlog` VALUES ('55', '1', '127.0.0.1', 'TEST', '2016-12-20', '2016-12-20 09:03:41');
INSERT INTO `ci_userloginlog` VALUES ('56', '1', '127.0.0.1', 'TEST', '2016-12-22', '2016-12-22 09:06:10');
INSERT INTO `ci_userloginlog` VALUES ('57', '1', '127.0.0.1', 'TEST', '2016-12-24', '2016-12-24 13:05:37');
INSERT INTO `ci_userloginlog` VALUES ('58', '1', '127.0.0.1', 'TEST', '2016-12-26', '2016-12-26 09:03:35');
INSERT INTO `ci_userloginlog` VALUES ('59', '1', '127.0.0.1', 'TEST', '2016-12-27', '2016-12-27 17:49:44');
INSERT INTO `ci_userloginlog` VALUES ('60', '1', '127.0.0.1', 'TEST', '2016-12-28', '2016-12-28 13:25:46');
INSERT INTO `ci_userloginlog` VALUES ('61', '1', '127.0.0.1', 'TEST', '2016-12-28', '2016-12-28 17:50:15');
INSERT INTO `ci_userloginlog` VALUES ('62', '1', '127.0.0.1', 'TEST', '2016-12-28', '2016-12-28 17:52:19');
INSERT INTO `ci_userloginlog` VALUES ('63', '1', '127.0.0.1', 'TEST', '2016-12-29', '2016-12-29 12:11:49');
INSERT INTO `ci_userloginlog` VALUES ('64', '4', '127.0.0.1', '小王', '2016-12-29', '2016-12-29 12:40:02');
INSERT INTO `ci_userloginlog` VALUES ('66', '4', '127.0.0.1', '小王', '2016-12-29', '2016-12-29 12:43:03');
INSERT INTO `ci_userloginlog` VALUES ('68', '1', '::1', 'TEST', '2017-01-01', '2017-01-01 09:56:23');
INSERT INTO `ci_userloginlog` VALUES ('69', '3', '::1', '小名', '2017-01-01', '2017-01-01 10:21:48');
INSERT INTO `ci_userloginlog` VALUES ('70', '1', '::1', 'TEST', '2017-01-01', '2017-01-01 10:23:14');
INSERT INTO `ci_userloginlog` VALUES ('71', '3', '::1', '小名', '2017-01-01', '2017-01-01 10:29:32');
INSERT INTO `ci_userloginlog` VALUES ('72', '1', '127.0.0.1', 'TEST', '2017-01-02', '2017-01-02 14:22:52');
INSERT INTO `ci_userloginlog` VALUES ('73', '1', '127.0.0.1', 'TEST', '2017-01-02', '2017-01-02 15:26:39');
INSERT INTO `ci_userloginlog` VALUES ('74', '1', '127.0.0.1', 'TEST', '2017-01-02', '2017-01-02 15:27:32');
INSERT INTO `ci_userloginlog` VALUES ('75', '1', '127.0.0.1', 'TEST', '2017-03-13', '2017-03-13 15:17:20');
INSERT INTO `ci_userloginlog` VALUES ('76', '3', '127.0.0.1', '小名', '2017-03-14', '2017-03-14 13:19:38');
INSERT INTO `ci_userloginlog` VALUES ('77', '2', '127.0.0.1', '小飞', '2017-03-14', '2017-03-14 15:04:32');
INSERT INTO `ci_userloginlog` VALUES ('78', '1', '127.0.0.1', 'TEST', '2017-03-30', '2017-03-30 18:40:16');
INSERT INTO `ci_userloginlog` VALUES ('79', '1', '127.0.0.1', 'TEST', '2017-03-31', '2017-03-31 09:03:41');
INSERT INTO `ci_userloginlog` VALUES ('80', '1', '127.0.0.1', 'TEST', '2017-03-31', '2017-03-31 10:43:01');
INSERT INTO `ci_userloginlog` VALUES ('81', '1', '127.0.0.1', 'TEST', '2017-03-31', '2017-03-31 10:53:00');
INSERT INTO `ci_userloginlog` VALUES ('82', '1', '127.0.0.1', 'TEST', '2017-03-31', '2017-03-31 10:54:35');
INSERT INTO `ci_userloginlog` VALUES ('83', '1', '127.0.0.1', 'TEST', '2017-03-31', '2017-03-31 10:55:02');
INSERT INTO `ci_userloginlog` VALUES ('84', '1', '127.0.0.1', 'TEST', '2017-03-31', '2017-03-31 10:59:58');
INSERT INTO `ci_userloginlog` VALUES ('85', '1', '127.0.0.1', 'TEST', '2017-03-31', '2017-03-31 11:01:51');
INSERT INTO `ci_userloginlog` VALUES ('86', '1', '127.0.0.1', 'TEST', '2017-04-03', '2017-04-03 17:41:18');
INSERT INTO `ci_userloginlog` VALUES ('87', '1', '127.0.0.1', 'TEST', '2017-04-03', '2017-04-03 17:52:25');
INSERT INTO `ci_userloginlog` VALUES ('88', '1', '127.0.0.1', 'TEST', '2017-04-05', '2017-04-05 14:13:52');
INSERT INTO `ci_userloginlog` VALUES ('89', '1', '127.0.0.1', 'TEST', '2017-04-06', '2017-04-06 17:34:56');
INSERT INTO `ci_userloginlog` VALUES ('90', '1', '127.0.0.1', 'TEST', '2017-05-06', '2017-05-06 12:09:04');
INSERT INTO `ci_userloginlog` VALUES ('91', '1', '127.0.0.1', 'TEST', '2017-05-06', '2017-05-06 15:55:40');
INSERT INTO `ci_userloginlog` VALUES ('92', '1', '::1', 'TEST', '2018-03-12', '2018-03-12 11:11:46');
INSERT INTO `ci_userloginlog` VALUES ('93', '2', '::1', '小飞', '2018-03-12', '2018-03-12 11:23:00');
INSERT INTO `ci_userloginlog` VALUES ('94', '1', '::1', 'TEST', '2018-03-12', '2018-03-12 11:23:26');
INSERT INTO `ci_userloginlog` VALUES ('95', '4', '::1', '小王', '2018-03-12', '2018-03-12 11:31:11');
INSERT INTO `ci_userloginlog` VALUES ('96', '1', '::1', 'TEST', '2018-03-12', '2018-03-12 11:40:43');
INSERT INTO `ci_userloginlog` VALUES ('97', '1', '::1', 'TEST', '2018-03-13', '2018-03-13 09:53:54');
INSERT INTO `ci_userloginlog` VALUES ('98', '1', '::1', 'TEST', '2018-03-13', '2018-03-13 09:55:31');
INSERT INTO `ci_userloginlog` VALUES ('99', '1', '::1', 'TEST', '2018-03-13', '2018-03-13 10:00:45');
INSERT INTO `ci_userloginlog` VALUES ('100', '1', '127.0.0.1', 'TEST', '2018-06-08', '2018-06-08 23:35:46');
INSERT INTO `ci_userloginlog` VALUES ('101', '1', '127.0.0.1', 'TEST', '2018-06-11', '2018-06-11 17:52:19');
INSERT INTO `ci_userloginlog` VALUES ('102', '1', '127.0.0.1', 'TEST', '2018-06-12', '2018-06-12 09:18:55');
INSERT INTO `ci_userloginlog` VALUES ('103', '1', '127.0.0.1', 'TEST', '2018-06-12', '2018-06-12 09:26:18');
INSERT INTO `ci_userloginlog` VALUES ('104', '1', '114.239.91.94', 'TEST', '2018-06-21', '2018-06-21 12:26:17');
INSERT INTO `ci_userloginlog` VALUES ('105', '1', '114.239.91.94', 'TEST', '2018-06-21', '2018-06-21 12:27:00');
INSERT INTO `ci_userloginlog` VALUES ('106', '1', '114.239.91.94', 'TEST', '2018-06-21', '2018-06-21 12:29:38');
INSERT INTO `ci_userloginlog` VALUES ('107', '1', '114.239.91.94', 'TEST', '2018-06-21', '2018-06-21 12:30:38');
INSERT INTO `ci_userloginlog` VALUES ('108', '1', '61.146.89.123', 'TEST', '2018-06-21', '2018-06-21 14:05:19');
INSERT INTO `ci_userloginlog` VALUES ('109', '1', '123.53.34.254', 'TEST', '2018-06-22', '2018-06-22 07:31:44');
INSERT INTO `ci_userloginlog` VALUES ('110', '1', '114.239.91.94', 'TEST', '2018-06-22', '2018-06-22 17:39:56');
INSERT INTO `ci_userloginlog` VALUES ('111', '1', '114.239.91.94', 'TEST', '2018-06-22', '2018-06-22 17:43:21');
INSERT INTO `ci_userloginlog` VALUES ('112', '1', '115.60.10.246', 'TEST', '2018-06-22', '2018-06-22 17:45:07');
INSERT INTO `ci_userloginlog` VALUES ('113', '1', '121.35.181.246', 'TEST', '2018-06-25', '2018-06-25 09:12:53');
INSERT INTO `ci_userloginlog` VALUES ('114', '1', '121.35.181.246', 'TEST', '2018-06-26', '2018-06-26 02:04:33');
INSERT INTO `ci_userloginlog` VALUES ('115', '1', '49.70.18.120', 'TEST', '2018-07-04', '2018-07-04 09:37:06');
INSERT INTO `ci_userloginlog` VALUES ('116', '1', '116.231.158.197', 'TEST', '2018-07-04', '2018-07-04 09:37:49');
INSERT INTO `ci_userloginlog` VALUES ('117', '1', '49.70.18.120', 'TEST', '2018-07-04', '2018-07-04 10:18:49');
INSERT INTO `ci_userloginlog` VALUES ('118', '1', '116.231.158.197', 'TEST', '2018-07-04', '2018-07-04 11:23:41');
INSERT INTO `ci_userloginlog` VALUES ('119', '1', '39.187.125.117', 'TEST', '2018-07-05', '2018-07-05 09:28:45');
INSERT INTO `ci_userloginlog` VALUES ('120', '1', '123.151.77.49', 'TEST', '2018-07-09', '2018-07-09 00:14:26');
INSERT INTO `ci_userloginlog` VALUES ('121', '1', '183.253.144.46', 'TEST', '2018-07-12', '2018-07-12 23:52:31');
INSERT INTO `ci_userloginlog` VALUES ('122', '1', '219.134.183.182', 'TEST', '2018-07-16', '2018-07-16 09:22:39');
INSERT INTO `ci_userloginlog` VALUES ('123', '1', '1.199.128.114', 'TEST', '2018-07-17', '2018-07-17 09:26:58');
INSERT INTO `ci_userloginlog` VALUES ('124', '1', '116.1.6.23', 'TEST', '2018-07-19', '2018-07-19 10:47:57');
INSERT INTO `ci_userloginlog` VALUES ('125', '1', '114.239.127.95', 'TEST', '2018-07-19', '2018-07-19 10:53:29');
INSERT INTO `ci_userloginlog` VALUES ('126', '1', '116.1.6.23', 'TEST', '2018-07-19', '2018-07-19 11:13:03');
INSERT INTO `ci_userloginlog` VALUES ('127', '1', '114.239.127.95', 'TEST', '2018-07-19', '2018-07-19 17:30:18');
INSERT INTO `ci_userloginlog` VALUES ('128', '1', '114.239.127.95', 'TEST', '2018-07-19', '2018-07-19 18:16:58');
INSERT INTO `ci_userloginlog` VALUES ('129', '1', '114.239.127.95', 'TEST', '2018-07-19', '2018-07-19 18:18:00');
INSERT INTO `ci_userloginlog` VALUES ('130', '1', '183.160.248.139', 'TEST', '2018-07-24', '2018-07-24 18:37:58');
INSERT INTO `ci_userloginlog` VALUES ('131', '1', '49.70.18.194', 'TEST', '2018-07-24', '2018-07-24 18:43:51');
INSERT INTO `ci_userloginlog` VALUES ('132', '1', '110.230.252.233', 'TEST', '2018-07-25', '2018-07-25 19:08:31');
INSERT INTO `ci_userloginlog` VALUES ('133', '1', '60.10.227.114', 'TEST', '2018-07-26', '2018-07-26 15:18:09');
INSERT INTO `ci_userloginlog` VALUES ('134', '1', '27.201.230.81', 'TEST', '2018-07-27', '2018-07-27 19:03:40');
INSERT INTO `ci_userloginlog` VALUES ('135', '1', '117.136.45.122', 'TEST', '2018-07-28', '2018-07-28 00:58:01');
INSERT INTO `ci_userloginlog` VALUES ('136', '1', '1.204.117.98', 'TEST', '2018-07-28', '2018-07-28 07:31:15');
INSERT INTO `ci_userloginlog` VALUES ('137', '1', '121.228.30.177', 'TEST', '2018-07-28', '2018-07-28 18:28:09');
INSERT INTO `ci_userloginlog` VALUES ('138', '1', '111.121.73.63', 'TEST', '2018-07-29', '2018-07-29 22:59:45');
INSERT INTO `ci_userloginlog` VALUES ('139', '1', '111.121.73.63', 'TEST', '2018-07-29', '2018-07-29 23:27:39');
INSERT INTO `ci_userloginlog` VALUES ('140', '1', '111.121.73.63', 'TEST', '2018-07-30', '2018-07-30 02:43:14');
INSERT INTO `ci_userloginlog` VALUES ('141', '1', '111.121.73.63', 'TEST', '2018-07-30', '2018-07-30 02:43:31');
INSERT INTO `ci_userloginlog` VALUES ('142', '1', '58.57.5.26', 'TEST', '2018-07-31', '2018-07-31 11:22:33');
INSERT INTO `ci_userloginlog` VALUES ('143', '1', '221.234.182.206', 'TEST', '2018-08-01', '2018-08-01 10:22:18');
INSERT INTO `ci_userloginlog` VALUES ('144', '1', '49.70.18.16', 'TEST', '2018-08-01', '2018-08-01 10:22:42');
INSERT INTO `ci_userloginlog` VALUES ('145', '1', '49.70.18.16', 'TEST', '2018-08-01', '2018-08-01 10:50:32');
INSERT INTO `ci_userloginlog` VALUES ('146', '1', '221.234.182.206', 'TEST', '2018-08-01', '2018-08-01 14:28:57');
INSERT INTO `ci_userloginlog` VALUES ('147', '1', '221.234.182.206', 'TEST', '2018-08-01', '2018-08-01 14:29:16');
INSERT INTO `ci_userloginlog` VALUES ('148', '3', '221.234.182.206', 'admin', '2018-08-01', '2018-08-01 14:30:40');
INSERT INTO `ci_userloginlog` VALUES ('149', '1', '221.234.182.206', 'TEST', '2018-08-01', '2018-08-01 14:32:08');
INSERT INTO `ci_userloginlog` VALUES ('150', '1', '221.234.182.206', 'TEST', '2018-08-01', '2018-08-01 14:32:38');
INSERT INTO `ci_userloginlog` VALUES ('151', '1', '221.234.182.206', 'TEST', '2018-08-01', '2018-08-01 14:32:56');
INSERT INTO `ci_userloginlog` VALUES ('152', '2', '221.234.182.206', 'admin123', '2018-08-01', '2018-08-01 14:33:38');
INSERT INTO `ci_userloginlog` VALUES ('153', '1', '49.70.18.16', 'TEST', '2018-08-02', '2018-08-02 08:50:33');
INSERT INTO `ci_userloginlog` VALUES ('154', '1', '49.70.18.16', 'TEST', '2018-08-02', '2018-08-02 10:28:26');
INSERT INTO `ci_userloginlog` VALUES ('155', '1', '223.72.87.187', 'TEST', '2018-08-02', '2018-08-02 17:17:02');
INSERT INTO `ci_userloginlog` VALUES ('156', '1', '223.72.87.187', 'TEST', '2018-08-02', '2018-08-02 17:24:55');
INSERT INTO `ci_userloginlog` VALUES ('157', '1', '113.246.105.95', 'TEST', '2018-08-05', '2018-08-05 16:07:49');
INSERT INTO `ci_userloginlog` VALUES ('158', '1', '223.74.123.188', 'TEST', '2018-08-06', '2018-08-06 18:31:52');
INSERT INTO `ci_userloginlog` VALUES ('159', '1', '49.89.111.164', 'TEST', '2018-08-06', '2018-08-06 18:41:17');
INSERT INTO `ci_userloginlog` VALUES ('160', '1', '60.181.187.167', 'TEST', '2018-08-07', '2018-08-07 14:27:08');
INSERT INTO `ci_userloginlog` VALUES ('161', '1', '119.108.219.128', 'TEST', '2018-08-07', '2018-08-07 16:32:54');
INSERT INTO `ci_userloginlog` VALUES ('162', '1', '116.8.33.155', 'TEST', '2018-08-07', '2018-08-07 16:36:01');
INSERT INTO `ci_userloginlog` VALUES ('163', '1', '119.108.219.128', 'TEST', '2018-08-07', '2018-08-07 17:04:41');
INSERT INTO `ci_userloginlog` VALUES ('164', '1', '123.151.77.123', 'TEST', '2018-08-07', '2018-08-07 17:05:17');
INSERT INTO `ci_userloginlog` VALUES ('165', '1', '119.108.219.128', 'TEST', '2018-08-07', '2018-08-07 17:06:31');
INSERT INTO `ci_userloginlog` VALUES ('166', '1', '219.155.136.144', 'TEST', '2018-08-07', '2018-08-07 23:11:41');
INSERT INTO `ci_userloginlog` VALUES ('167', '1', '171.34.100.10', 'TEST', '2018-08-08', '2018-08-08 11:33:57');
INSERT INTO `ci_userloginlog` VALUES ('168', '1', '112.224.74.145', 'TEST', '2018-08-08', '2018-08-08 13:15:39');
INSERT INTO `ci_userloginlog` VALUES ('169', '1', '112.224.74.145', 'TEST', '2018-08-08', '2018-08-08 13:23:53');
INSERT INTO `ci_userloginlog` VALUES ('170', '1', '113.233.143.220', 'TEST', '2018-08-08', '2018-08-08 15:36:15');
INSERT INTO `ci_userloginlog` VALUES ('171', '1', '113.233.143.220', 'TEST', '2018-08-08', '2018-08-08 15:38:13');
INSERT INTO `ci_userloginlog` VALUES ('172', '1', '113.233.143.220', 'TEST', '2018-08-08', '2018-08-08 15:39:27');
INSERT INTO `ci_userloginlog` VALUES ('173', '1', '49.89.108.242', 'TEST', '2018-08-08', '2018-08-08 15:42:48');
INSERT INTO `ci_userloginlog` VALUES ('174', '1', '49.89.108.242', 'TEST', '2018-08-08', '2018-08-08 15:42:58');
INSERT INTO `ci_userloginlog` VALUES ('175', '1', '113.233.143.220', 'TEST', '2018-08-08', '2018-08-08 15:49:11');
INSERT INTO `ci_userloginlog` VALUES ('176', '1', '49.89.108.242', 'TEST', '2018-08-09', '2018-08-09 09:25:48');
INSERT INTO `ci_userloginlog` VALUES ('177', '1', '119.98.168.126', 'TEST', '2018-08-09', '2018-08-09 09:26:29');
INSERT INTO `ci_userloginlog` VALUES ('178', '1', '219.151.231.163', 'TEST', '2018-08-09', '2018-08-09 10:34:41');
INSERT INTO `ci_userloginlog` VALUES ('179', '1', '219.151.231.163', 'TEST', '2018-08-09', '2018-08-09 10:42:14');
INSERT INTO `ci_userloginlog` VALUES ('180', '5', '219.151.231.163', 'test', '2018-08-09', '2018-08-09 10:42:38');
INSERT INTO `ci_userloginlog` VALUES ('181', '1', '219.151.231.163', 'TEST', '2018-08-09', '2018-08-09 14:07:53');
INSERT INTO `ci_userloginlog` VALUES ('182', '1', '219.151.231.163', 'TEST', '2018-08-09', '2018-08-09 14:53:34');
INSERT INTO `ci_userloginlog` VALUES ('183', '1', '219.151.231.163', 'TEST', '2018-08-09', '2018-08-09 17:16:11');
INSERT INTO `ci_userloginlog` VALUES ('184', '1', '116.8.33.155', 'TEST', '2018-08-09', '2018-08-09 17:24:24');
INSERT INTO `ci_userloginlog` VALUES ('185', '1', '220.173.200.197', 'TEST', '2018-08-09', '2018-08-09 17:48:48');
INSERT INTO `ci_userloginlog` VALUES ('186', '1', '61.186.23.76', 'TEST', '2018-08-09', '2018-08-09 23:18:37');
INSERT INTO `ci_userloginlog` VALUES ('187', '1', '119.123.3.50', 'TEST', '2018-08-10', '2018-08-10 09:59:16');
INSERT INTO `ci_userloginlog` VALUES ('188', '1', '219.151.231.163', 'TEST', '2018-08-10', '2018-08-10 10:28:56');
INSERT INTO `ci_userloginlog` VALUES ('189', '1', '219.151.231.163', 'TEST', '2018-08-10', '2018-08-10 10:33:02');
INSERT INTO `ci_userloginlog` VALUES ('190', '5', '219.151.231.163', 'test', '2018-08-10', '2018-08-10 10:33:43');
INSERT INTO `ci_userloginlog` VALUES ('191', '1', '219.151.231.163', 'TEST', '2018-08-10', '2018-08-10 10:56:25');
INSERT INTO `ci_userloginlog` VALUES ('192', '1', '101.81.233.95', 'TEST', '2018-08-10', '2018-08-10 11:21:52');
INSERT INTO `ci_userloginlog` VALUES ('193', '1', '39.80.65.149', 'TEST', '2018-08-11', '2018-08-11 11:19:20');
INSERT INTO `ci_userloginlog` VALUES ('194', '1', '39.80.58.1', 'TEST', '2018-08-11', '2018-08-11 11:39:27');
INSERT INTO `ci_userloginlog` VALUES ('195', '1', '39.80.65.149', 'TEST', '2018-08-11', '2018-08-11 11:42:18');
INSERT INTO `ci_userloginlog` VALUES ('196', '7', '39.80.65.149', '张英', '2018-08-11', '2018-08-11 11:56:10');
INSERT INTO `ci_userloginlog` VALUES ('197', '7', '39.80.65.149', '张英', '2018-08-11', '2018-08-11 12:15:15');
INSERT INTO `ci_userloginlog` VALUES ('198', '1', '39.80.65.149', 'TEST', '2018-08-11', '2018-08-11 12:15:42');
INSERT INTO `ci_userloginlog` VALUES ('199', '6', '39.80.65.149', '刘总监', '2018-08-11', '2018-08-11 12:18:03');
INSERT INTO `ci_userloginlog` VALUES ('200', '7', '39.80.65.149', '张英', '2018-08-11', '2018-08-11 12:25:10');
INSERT INTO `ci_userloginlog` VALUES ('201', '6', '39.80.65.149', '刘总监', '2018-08-11', '2018-08-11 12:26:27');
INSERT INTO `ci_userloginlog` VALUES ('202', '7', '39.80.65.149', '张英', '2018-08-11', '2018-08-11 12:29:11');
INSERT INTO `ci_userloginlog` VALUES ('203', '6', '39.80.65.149', '刘总监', '2018-08-11', '2018-08-11 12:31:25');
INSERT INTO `ci_userloginlog` VALUES ('204', '1', '183.160.44.204', 'TEST', '2018-08-11', '2018-08-11 14:24:58');
INSERT INTO `ci_userloginlog` VALUES ('205', '1', '113.65.211.173', 'TEST', '2018-08-11', '2018-08-11 15:51:37');
INSERT INTO `ci_userloginlog` VALUES ('206', '7', '113.65.211.173', '张英', '2018-08-11', '2018-08-11 16:01:59');
INSERT INTO `ci_userloginlog` VALUES ('207', '7', '113.65.211.173', '张英', '2018-08-11', '2018-08-11 16:03:36');
INSERT INTO `ci_userloginlog` VALUES ('208', '7', '113.65.211.173', '张英', '2018-08-11', '2018-08-11 16:03:38');
INSERT INTO `ci_userloginlog` VALUES ('209', '1', '113.65.211.173', 'TEST', '2018-08-11', '2018-08-11 16:07:51');
INSERT INTO `ci_userloginlog` VALUES ('210', '1', '119.122.247.227', 'TEST', '2018-08-12', '2018-08-12 10:26:36');
INSERT INTO `ci_userloginlog` VALUES ('211', '1', '116.8.39.94', 'TEST', '2018-08-12', '2018-08-12 14:45:29');
INSERT INTO `ci_userloginlog` VALUES ('212', '1', '116.8.39.94', 'TEST', '2018-08-13', '2018-08-13 09:20:34');
INSERT INTO `ci_userloginlog` VALUES ('213', '1', '116.8.39.94', 'TEST', '2018-08-13', '2018-08-13 09:38:45');
INSERT INTO `ci_userloginlog` VALUES ('214', '1', '49.70.92.157', 'TEST', '2018-08-13', '2018-08-13 09:43:40');
INSERT INTO `ci_userloginlog` VALUES ('215', '1', '117.63.114.130', 'TEST', '2018-08-13', '2018-08-13 09:44:00');
INSERT INTO `ci_userloginlog` VALUES ('216', '1', '49.70.92.157', 'TEST', '2018-08-13', '2018-08-13 15:04:12');
INSERT INTO `ci_userloginlog` VALUES ('217', '1', '118.117.89.185', 'TEST', '2018-08-15', '2018-08-15 12:02:50');
INSERT INTO `ci_userloginlog` VALUES ('218', '1', '118.117.89.185', 'TEST', '2018-08-15', '2018-08-15 12:03:48');
INSERT INTO `ci_userloginlog` VALUES ('219', '1', '39.166.107.43', 'TEST', '2018-08-15', '2018-08-15 16:46:45');
INSERT INTO `ci_userloginlog` VALUES ('220', '1', '49.89.72.4', 'TEST', '2018-08-16', '2018-08-16 11:03:15');
INSERT INTO `ci_userloginlog` VALUES ('221', '1', '49.89.72.4', 'TEST', '2018-08-16', '2018-08-16 11:42:37');
INSERT INTO `ci_userloginlog` VALUES ('222', '1', '49.70.82.13', 'TEST', '2018-08-16', '2018-08-16 15:04:51');
INSERT INTO `ci_userloginlog` VALUES ('223', '1', '49.70.82.13', 'TEST', '2018-08-16', '2018-08-16 19:48:50');
INSERT INTO `ci_userloginlog` VALUES ('224', '1', '49.70.82.13', 'TEST', '2018-08-18', '2018-08-18 10:26:02');
INSERT INTO `ci_userloginlog` VALUES ('225', '1', '114.240.224.193', 'TEST', '2018-08-18', '2018-08-18 10:30:41');
INSERT INTO `ci_userloginlog` VALUES ('226', '1', '49.70.82.13', 'TEST', '2018-08-18', '2018-08-18 10:38:52');
INSERT INTO `ci_userloginlog` VALUES ('227', '1', '125.39.240.139', 'TEST', '2018-08-18', '2018-08-18 11:07:02');
INSERT INTO `ci_userloginlog` VALUES ('228', '1', '49.70.82.13', 'TEST', '2018-08-18', '2018-08-18 11:10:44');
INSERT INTO `ci_userloginlog` VALUES ('229', '1', '49.70.82.13', 'TEST', '2018-08-18', '2018-08-18 11:10:44');
INSERT INTO `ci_userloginlog` VALUES ('230', '1', '116.233.90.210', 'TEST', '2018-08-18', '2018-08-18 15:26:00');
INSERT INTO `ci_userloginlog` VALUES ('231', '1', '175.9.188.124', 'TEST', '2018-08-19', '2018-08-19 21:40:16');
INSERT INTO `ci_userloginlog` VALUES ('232', '1', '110.229.127.141', 'TEST', '2018-08-20', '2018-08-20 18:32:39');
INSERT INTO `ci_userloginlog` VALUES ('233', '1', '122.200.91.181', 'TEST', '2018-08-20', '2018-08-20 18:57:06');
INSERT INTO `ci_userloginlog` VALUES ('234', '1', '220.197.208.251', 'TEST', '2018-08-21', '2018-08-21 08:36:10');
INSERT INTO `ci_userloginlog` VALUES ('235', '1', '175.0.225.58', 'TEST', '2018-08-21', '2018-08-21 11:45:31');
INSERT INTO `ci_userloginlog` VALUES ('236', '1', '113.249.214.201', 'TEST', '2018-08-21', '2018-08-21 17:53:46');
INSERT INTO `ci_userloginlog` VALUES ('237', '1', '123.128.205.237', 'TEST', '2018-08-23', '2018-08-23 17:58:33');
INSERT INTO `ci_userloginlog` VALUES ('238', '1', '123.128.205.237', 'TEST', '2018-08-23', '2018-08-23 18:07:38');
INSERT INTO `ci_userloginlog` VALUES ('239', '1', '123.128.205.237', 'TEST', '2018-08-23', '2018-08-23 18:31:36');
INSERT INTO `ci_userloginlog` VALUES ('240', '1', '49.70.122.128', 'TEST', '2018-08-23', '2018-08-23 19:23:45');
INSERT INTO `ci_userloginlog` VALUES ('241', '1', '123.128.205.237', 'TEST', '2018-08-23', '2018-08-23 19:35:55');
INSERT INTO `ci_userloginlog` VALUES ('242', '1', '114.239.122.150', 'TEST', '2018-08-24', '2018-08-24 12:55:30');
INSERT INTO `ci_userloginlog` VALUES ('243', '1', '218.73.100.168', 'TEST', '2018-08-24', '2018-08-24 13:13:57');
INSERT INTO `ci_userloginlog` VALUES ('244', '1', '122.238.71.175', 'TEST', '2018-08-24', '2018-08-24 15:03:01');
INSERT INTO `ci_userloginlog` VALUES ('245', '1', '222.161.143.242', 'TEST', '2018-08-25', '2018-08-25 17:31:02');
INSERT INTO `ci_userloginlog` VALUES ('246', '1', '49.92.80.59', 'TEST', '2018-08-25', '2018-08-25 23:51:38');
INSERT INTO `ci_userloginlog` VALUES ('247', '1', '110.254.163.91', 'TEST', '2018-08-27', '2018-08-27 17:07:23');
INSERT INTO `ci_userloginlog` VALUES ('248', '1', '61.140.86.170', 'TEST', '2018-08-29', '2018-08-29 09:18:31');
INSERT INTO `ci_userloginlog` VALUES ('249', '1', '183.13.204.239', 'TEST', '2018-08-29', '2018-08-29 15:36:20');
INSERT INTO `ci_userloginlog` VALUES ('250', '1', '114.239.119.44', 'TEST', '2018-08-29', '2018-08-29 15:39:33');
INSERT INTO `ci_userloginlog` VALUES ('251', '1', '114.239.119.44', 'TEST', '2018-08-29', '2018-08-29 15:41:30');
INSERT INTO `ci_userloginlog` VALUES ('252', '1', '114.239.119.44', 'TEST', '2018-08-29', '2018-08-29 19:48:51');
INSERT INTO `ci_userloginlog` VALUES ('253', '1', '114.239.119.44', 'TEST', '2018-08-29', '2018-08-29 20:50:41');
INSERT INTO `ci_userloginlog` VALUES ('254', '1', '121.225.72.248', 'TEST', '2018-08-30', '2018-08-30 11:33:30');
INSERT INTO `ci_userloginlog` VALUES ('255', '1', '49.74.122.61', 'TEST', '2018-08-30', '2018-08-30 11:38:17');
INSERT INTO `ci_userloginlog` VALUES ('256', '1', '49.74.122.61', 'TEST', '2018-08-30', '2018-08-30 11:49:47');
INSERT INTO `ci_userloginlog` VALUES ('257', '1', '39.80.58.1', 'TEST', '2018-08-30', '2018-08-30 15:16:22');
INSERT INTO `ci_userloginlog` VALUES ('258', '1', '183.135.227.58', 'TEST', '2018-08-30', '2018-08-30 16:11:37');
INSERT INTO `ci_userloginlog` VALUES ('259', '1', '183.135.227.58', 'TEST', '2018-08-30', '2018-08-30 16:11:59');
INSERT INTO `ci_userloginlog` VALUES ('260', '1', '61.140.240.72', 'TEST', '2018-08-31', '2018-08-31 15:04:57');
INSERT INTO `ci_userloginlog` VALUES ('261', '1', '60.220.61.211', 'TEST', '2018-09-01', '2018-09-01 16:52:27');
INSERT INTO `ci_userloginlog` VALUES ('262', '1', '124.160.213.234', 'TEST', '2018-09-01', '2018-09-01 17:08:45');
INSERT INTO `ci_userloginlog` VALUES ('263', '1', '122.224.154.114', 'TEST', '2018-09-01', '2018-09-01 17:09:14');
INSERT INTO `ci_userloginlog` VALUES ('264', '1', '60.220.61.211', 'TEST', '2018-09-01', '2018-09-01 17:12:49');
INSERT INTO `ci_userloginlog` VALUES ('265', '1', '180.104.28.120', 'TEST', '2018-09-02', '2018-09-02 10:50:10');
INSERT INTO `ci_userloginlog` VALUES ('266', '8', '180.104.28.120', '威子', '2018-09-02', '2018-09-02 10:53:36');
INSERT INTO `ci_userloginlog` VALUES ('267', '1', '180.104.28.120', 'TEST', '2018-09-02', '2018-09-02 10:54:34');
INSERT INTO `ci_userloginlog` VALUES ('268', '8', '180.104.28.120', '威子', '2018-09-02', '2018-09-02 10:56:54');
INSERT INTO `ci_userloginlog` VALUES ('269', '1', '180.104.28.120', 'TEST', '2018-09-02', '2018-09-02 10:59:47');
INSERT INTO `ci_userloginlog` VALUES ('270', '8', '180.104.28.120', '威子', '2018-09-02', '2018-09-02 11:01:12');
INSERT INTO `ci_userloginlog` VALUES ('271', '1', '180.104.28.120', 'TEST', '2018-09-02', '2018-09-02 12:43:00');
INSERT INTO `ci_userloginlog` VALUES ('272', '8', '180.104.28.120', '威子', '2018-09-02', '2018-09-02 12:59:21');
INSERT INTO `ci_userloginlog` VALUES ('273', '1', '49.95.117.144', 'TEST', '2018-09-02', '2018-09-02 13:18:18');
INSERT INTO `ci_userloginlog` VALUES ('274', '1', '49.95.117.144', 'TEST', '2018-09-02', '2018-09-02 13:18:49');
INSERT INTO `ci_userloginlog` VALUES ('275', '1', '49.92.161.208', 'TEST', '2018-09-02', '2018-09-02 15:54:43');
INSERT INTO `ci_userloginlog` VALUES ('276', '1', '121.226.251.134', 'TEST', '2018-09-02', '2018-09-02 18:30:42');
INSERT INTO `ci_userloginlog` VALUES ('277', '1', '183.208.2.108', 'TEST', '2018-09-02', '2018-09-02 22:09:07');
INSERT INTO `ci_userloginlog` VALUES ('278', '1', '60.220.61.211', 'TEST', '2018-09-03', '2018-09-03 07:50:07');
INSERT INTO `ci_userloginlog` VALUES ('279', '1', '122.224.154.114', 'TEST', '2018-09-04', '2018-09-04 09:24:24');
INSERT INTO `ci_userloginlog` VALUES ('280', '1', '117.136.52.201', 'TEST', '2018-09-04', '2018-09-04 13:44:27');
INSERT INTO `ci_userloginlog` VALUES ('281', '1', '113.118.212.89', 'TEST', '2018-09-04', '2018-09-04 14:33:47');
INSERT INTO `ci_userloginlog` VALUES ('282', '1', '49.89.111.114', 'TEST', '2018-09-04', '2018-09-04 14:37:22');
INSERT INTO `ci_userloginlog` VALUES ('283', '1', '36.5.100.165', 'TEST', '2018-09-04', '2018-09-04 17:50:19');
INSERT INTO `ci_userloginlog` VALUES ('284', '1', '1.180.15.229', 'TEST', '2018-09-04', '2018-09-04 20:13:45');
INSERT INTO `ci_userloginlog` VALUES ('285', '1', '1.180.15.229', 'TEST', '2018-09-04', '2018-09-04 20:14:22');
INSERT INTO `ci_userloginlog` VALUES ('286', '1', '36.57.128.164', 'TEST', '2018-09-04', '2018-09-04 21:09:42');
INSERT INTO `ci_userloginlog` VALUES ('287', '1', '171.44.186.114', 'TEST', '2018-09-04', '2018-09-04 21:23:50');
INSERT INTO `ci_userloginlog` VALUES ('288', '1', '125.42.220.26', 'TEST', '2018-09-04', '2018-09-04 22:44:30');
INSERT INTO `ci_userloginlog` VALUES ('289', '1', '61.49.230.138', 'TEST', '2018-09-05', '2018-09-05 10:15:48');
INSERT INTO `ci_userloginlog` VALUES ('290', '1', '113.111.83.99', 'TEST', '2018-09-05', '2018-09-05 14:07:06');
INSERT INTO `ci_userloginlog` VALUES ('291', '1', '60.24.14.236', 'TEST', '2018-09-05', '2018-09-05 20:26:32');
INSERT INTO `ci_userloginlog` VALUES ('292', '1', '111.37.251.215', 'TEST', '2018-09-06', '2018-09-06 23:16:34');
INSERT INTO `ci_userloginlog` VALUES ('293', '1', '122.96.43.62', 'TEST', '2018-09-08', '2018-09-08 11:56:00');
INSERT INTO `ci_userloginlog` VALUES ('294', '1', '116.54.27.146', 'TEST', '2018-09-08', '2018-09-08 16:07:34');
INSERT INTO `ci_userloginlog` VALUES ('295', '1', '117.176.125.56', 'TEST', '2018-09-08', '2018-09-08 20:28:11');
INSERT INTO `ci_userloginlog` VALUES ('296', '1', '116.249.101.87', 'TEST', '2018-09-09', '2018-09-09 11:01:02');
INSERT INTO `ci_userloginlog` VALUES ('297', '1', '127.0.0.1', 'TEST', '2018-09-12', '2018-09-12 09:55:14');
INSERT INTO `ci_userloginlog` VALUES ('298', '1', '127.0.0.1', 'TEST', '2018-09-12', '2018-09-12 11:07:59');
INSERT INTO `ci_userloginlog` VALUES ('299', '1', '127.0.0.1', 'TEST', '2018-09-12', '2018-09-12 14:29:57');
INSERT INTO `ci_userloginlog` VALUES ('300', '1', '127.0.0.1', 'TEST', '2018-09-12', '2018-09-12 14:36:07');
INSERT INTO `ci_userloginlog` VALUES ('301', '1', '127.0.0.1', 'TEST', '2018-09-12', '2018-09-12 14:47:41');
INSERT INTO `ci_userloginlog` VALUES ('302', '1', '127.0.0.1', 'TEST', '2018-09-12', '2018-09-12 16:23:21');
INSERT INTO `ci_userloginlog` VALUES ('303', '1', '127.0.0.1', 'TEST', '2018-09-12', '2018-09-12 17:45:37');
INSERT INTO `ci_userloginlog` VALUES ('304', '1', '127.0.0.1', 'TEST', '2018-09-12', '2018-09-12 17:49:38');
INSERT INTO `ci_userloginlog` VALUES ('305', '1', '127.0.0.1', 'TEST', '2018-09-14', '2018-09-14 11:49:45');
INSERT INTO `ci_userloginlog` VALUES ('306', '1', '127.0.0.1', 'TEST', '2018-09-14', '2018-09-14 11:54:26');
INSERT INTO `ci_userloginlog` VALUES ('307', '1', '127.0.0.1', 'TEST', '2018-09-14', '2018-09-14 13:45:00');
INSERT INTO `ci_userloginlog` VALUES ('308', '1', '127.0.0.1', 'TEST', '2018-09-17', '2018-09-17 10:04:53');
INSERT INTO `ci_userloginlog` VALUES ('309', '1', '127.0.0.1', 'TEST', '2018-09-25', '2018-09-25 09:54:45');
INSERT INTO `ci_userloginlog` VALUES ('310', '1', '127.0.0.1', 'TEST', '2018-09-25', '2018-09-25 11:40:41');
INSERT INTO `ci_userloginlog` VALUES ('311', '1', '127.0.0.1', 'TEST', '2018-09-26', '2018-09-26 17:54:46');
INSERT INTO `ci_userloginlog` VALUES ('312', '1', '127.0.0.1', 'TEST', '2018-09-26', '2018-09-26 18:45:37');
INSERT INTO `ci_userloginlog` VALUES ('313', '1', '127.0.0.1', 'TEST', '2018-09-26', '2018-09-26 19:35:45');
INSERT INTO `ci_userloginlog` VALUES ('314', '1', '127.0.0.1', 'TEST', '2018-09-26', '2018-09-26 19:48:36');
INSERT INTO `ci_userloginlog` VALUES ('315', '1', '127.0.0.1', 'TEST', '2018-09-26', '2018-09-26 19:49:33');
INSERT INTO `ci_userloginlog` VALUES ('316', '10', '127.0.0.1', 'ceshi2', '2018-09-26', '2018-09-26 19:52:02');
INSERT INTO `ci_userloginlog` VALUES ('317', '1', '127.0.0.1', 'TEST', '2018-09-26', '2018-09-26 19:52:13');
INSERT INTO `ci_userloginlog` VALUES ('318', '10', '127.0.0.1', 'ceshi2', '2018-09-26', '2018-09-26 19:55:28');
INSERT INTO `ci_userloginlog` VALUES ('319', '1', '127.0.0.1', 'TEST', '2018-09-26', '2018-09-26 20:06:53');
INSERT INTO `ci_userloginlog` VALUES ('320', '9', '127.0.0.1', 'ceshi', '2018-09-26', '2018-09-26 20:07:29');
INSERT INTO `ci_userloginlog` VALUES ('321', '1', '127.0.0.1', 'TEST', '2018-09-26', '2018-09-26 20:14:27');
INSERT INTO `ci_userloginlog` VALUES ('322', '9', '127.0.0.1', 'ceshi', '2018-09-26', '2018-09-26 20:17:35');
INSERT INTO `ci_userloginlog` VALUES ('323', '10', '127.0.0.1', 'ceshi2', '2018-09-26', '2018-09-26 20:23:46');
INSERT INTO `ci_userloginlog` VALUES ('324', '9', '127.0.0.1', 'ceshi', '2018-09-26', '2018-09-26 20:25:33');
INSERT INTO `ci_userloginlog` VALUES ('325', '10', '127.0.0.1', 'ceshi2', '2018-09-26', '2018-09-26 20:27:33');
INSERT INTO `ci_userloginlog` VALUES ('326', '9', '127.0.0.1', 'ceshi', '2018-09-26', '2018-09-26 20:30:56');
INSERT INTO `ci_userloginlog` VALUES ('327', '1', '127.0.0.1', 'TEST', '2018-09-26', '2018-09-26 20:31:11');
INSERT INTO `ci_userloginlog` VALUES ('328', '9', '127.0.0.1', 'ceshi', '2018-09-26', '2018-09-26 20:32:10');
INSERT INTO `ci_userloginlog` VALUES ('329', '10', '127.0.0.1', 'ceshi2', '2018-09-26', '2018-09-26 20:35:12');
INSERT INTO `ci_userloginlog` VALUES ('330', '1', '127.0.0.1', 'TEST', '2018-09-26', '2018-09-26 20:38:51');
INSERT INTO `ci_userloginlog` VALUES ('331', '9', '127.0.0.1', 'ceshi', '2018-09-26', '2018-09-26 20:39:27');
INSERT INTO `ci_userloginlog` VALUES ('332', '1', '127.0.0.1', 'TEST', '2018-09-26', '2018-09-26 20:39:44');
INSERT INTO `ci_userloginlog` VALUES ('333', '10', '127.0.0.1', 'ceshi2', '2018-09-26', '2018-09-26 20:40:26');
INSERT INTO `ci_userloginlog` VALUES ('334', '1', '127.0.0.1', 'TEST', '2018-09-26', '2018-09-26 20:43:46');
INSERT INTO `ci_userloginlog` VALUES ('335', '10', '127.0.0.1', 'ceshi2', '2018-09-26', '2018-09-26 20:44:17');
INSERT INTO `ci_userloginlog` VALUES ('336', '10', '127.0.0.1', 'ceshi2', '2018-09-26', '2018-09-26 20:54:41');
INSERT INTO `ci_userloginlog` VALUES ('337', '9', '127.0.0.1', 'ceshi', '2018-09-26', '2018-09-26 20:55:17');
INSERT INTO `ci_userloginlog` VALUES ('338', '9', '127.0.0.1', 'ceshi', '2018-09-26', '2018-09-26 20:55:53');
INSERT INTO `ci_userloginlog` VALUES ('339', '1', '127.0.0.1', 'TEST', '2018-09-26', '2018-09-26 20:56:06');
INSERT INTO `ci_userloginlog` VALUES ('340', '1', '127.0.0.1', 'TEST', '2018-09-26', '2018-09-26 20:56:40');
INSERT INTO `ci_userloginlog` VALUES ('341', '1', '127.0.0.1', 'TEST', '2018-09-26', '2018-09-26 20:57:05');
INSERT INTO `ci_userloginlog` VALUES ('342', '1', '127.0.0.1', 'TEST', '2018-09-26', '2018-09-26 20:57:23');
INSERT INTO `ci_userloginlog` VALUES ('343', '10', '127.0.0.1', 'ceshi2', '2018-09-26', '2018-09-26 20:58:15');
INSERT INTO `ci_userloginlog` VALUES ('344', '10', '127.0.0.1', 'ceshi2', '2018-09-26', '2018-09-26 20:58:46');
INSERT INTO `ci_userloginlog` VALUES ('345', '1', '127.0.0.1', 'TEST', '2018-09-26', '2018-09-26 20:58:54');
INSERT INTO `ci_userloginlog` VALUES ('346', '10', '127.0.0.1', 'ceshi2', '2018-09-26', '2018-09-26 20:59:17');
INSERT INTO `ci_userloginlog` VALUES ('347', '1', '127.0.0.1', 'TEST', '2018-09-26', '2018-09-26 20:59:36');
INSERT INTO `ci_userloginlog` VALUES ('348', '9', '127.0.0.1', 'ceshi', '2018-09-26', '2018-09-26 21:00:36');
INSERT INTO `ci_userloginlog` VALUES ('349', '9', '127.0.0.1', 'ceshi', '2018-09-26', '2018-09-26 21:01:50');
INSERT INTO `ci_userloginlog` VALUES ('350', '1', '127.0.0.1', 'TEST', '2018-09-26', '2018-09-26 21:02:10');
INSERT INTO `ci_userloginlog` VALUES ('351', '9', '127.0.0.1', 'ceshi', '2018-09-26', '2018-09-26 21:03:13');
INSERT INTO `ci_userloginlog` VALUES ('352', '1', '127.0.0.1', 'TEST', '2018-09-26', '2018-09-26 21:11:41');
INSERT INTO `ci_userloginlog` VALUES ('353', '9', '127.0.0.1', 'ceshi', '2018-09-26', '2018-09-26 21:12:33');
INSERT INTO `ci_userloginlog` VALUES ('354', '10', '127.0.0.1', 'ceshi2', '2018-09-26', '2018-09-26 21:13:23');
INSERT INTO `ci_userloginlog` VALUES ('355', '9', '127.0.0.1', 'ceshi', '2018-09-26', '2018-09-26 21:17:02');
INSERT INTO `ci_userloginlog` VALUES ('356', '10', '127.0.0.1', 'ceshi2', '2018-09-27', '2018-09-27 19:28:43');
INSERT INTO `ci_userloginlog` VALUES ('357', '1', '127.0.0.1', 'TEST', '2018-09-29', '2018-09-29 19:36:48');
INSERT INTO `ci_userloginlog` VALUES ('358', '1', '127.0.0.1', 'TEST', '2018-09-29', '2018-09-29 19:58:51');
INSERT INTO `ci_userloginlog` VALUES ('359', '1', '127.0.0.1', 'TEST', '2018-09-29', '2018-09-29 20:41:49');
INSERT INTO `ci_userloginlog` VALUES ('360', '1', '127.0.0.1', 'TEST', '2018-09-29', '2018-09-29 21:50:35');
INSERT INTO `ci_userloginlog` VALUES ('361', '1', '127.0.0.1', 'TEST', '2018-10-05', '2018-10-05 16:50:54');
INSERT INTO `ci_userloginlog` VALUES ('362', '1', '127.0.0.1', 'TEST', '2018-10-07', '2018-10-07 11:03:16');
INSERT INTO `ci_userloginlog` VALUES ('363', '1', '127.0.0.1', 'TEST', '2018-10-07', '2018-10-07 11:37:20');
INSERT INTO `ci_userloginlog` VALUES ('364', '1', '127.0.0.1', 'TEST', '2018-10-07', '2018-10-07 11:42:44');
INSERT INTO `ci_userloginlog` VALUES ('365', '1', '127.0.0.1', 'TEST', '2018-10-07', '2018-10-07 11:44:38');
INSERT INTO `ci_userloginlog` VALUES ('366', '1', '127.0.0.1', 'TEST', '2018-10-07', '2018-10-07 13:34:32');
INSERT INTO `ci_userloginlog` VALUES ('367', '1', '127.0.0.1', 'TEST', '2018-10-07', '2018-10-07 13:36:57');
INSERT INTO `ci_userloginlog` VALUES ('368', '1', '127.0.0.1', 'TEST', '2018-10-07', '2018-10-07 13:44:29');
INSERT INTO `ci_userloginlog` VALUES ('369', '1', '127.0.0.1', 'TEST', '2018-10-07', '2018-10-07 13:45:45');
INSERT INTO `ci_userloginlog` VALUES ('370', '1', '127.0.0.1', 'TEST', '2018-10-07', '2018-10-07 13:46:35');
INSERT INTO `ci_userloginlog` VALUES ('371', '1', '127.0.0.1', 'TEST', '2018-10-11', '2018-10-11 11:28:32');
INSERT INTO `ci_userloginlog` VALUES ('372', '1', '127.0.0.1', 'TEST', '2018-10-11', '2018-10-11 11:35:25');
INSERT INTO `ci_userloginlog` VALUES ('373', '1', '127.0.0.1', 'TEST', '2018-10-11', '2018-10-11 11:37:27');
INSERT INTO `ci_userloginlog` VALUES ('374', '1', '127.0.0.1', 'TEST', '2018-10-11', '2018-10-11 11:37:57');
INSERT INTO `ci_userloginlog` VALUES ('375', '1', '127.0.0.1', 'TEST', '2018-10-13', '2018-10-13 08:49:00');
INSERT INTO `ci_userloginlog` VALUES ('376', '1', '127.0.0.1', 'TEST', '2018-10-13', '2018-10-13 19:22:48');
INSERT INTO `ci_userloginlog` VALUES ('377', '9', '127.0.0.1', 'ceshi', '2018-10-13', '2018-10-13 19:27:05');
INSERT INTO `ci_userloginlog` VALUES ('378', '1', '127.0.0.1', 'TEST', '2018-10-13', '2018-10-13 19:27:48');
INSERT INTO `ci_userloginlog` VALUES ('379', '1', '127.0.0.1', 'TEST', '2018-10-13', '2018-10-13 19:36:25');
INSERT INTO `ci_userloginlog` VALUES ('380', '1', '127.0.0.1', 'TEST', '2018-10-13', '2018-10-13 19:38:12');
INSERT INTO `ci_userloginlog` VALUES ('381', '9', '127.0.0.1', 'ceshi', '2018-10-13', '2018-10-13 19:39:28');
INSERT INTO `ci_userloginlog` VALUES ('382', '1', '127.0.0.1', 'TEST', '2018-10-13', '2018-10-13 19:48:03');
INSERT INTO `ci_userloginlog` VALUES ('383', '1', '127.0.0.1', 'TEST', '2018-10-13', '2018-10-13 19:54:04');
INSERT INTO `ci_userloginlog` VALUES ('384', '1', '127.0.0.1', 'TEST', '2018-10-13', '2018-10-13 20:06:48');
INSERT INTO `ci_userloginlog` VALUES ('385', '1', '127.0.0.1', 'TEST', '2018-10-13', '2018-10-13 20:15:01');
INSERT INTO `ci_userloginlog` VALUES ('386', '1', '127.0.0.1', 'TEST', '2018-10-13', '2018-10-13 20:16:56');
INSERT INTO `ci_userloginlog` VALUES ('387', '1', '127.0.0.1', 'TEST', '2018-10-13', '2018-10-13 20:18:16');
INSERT INTO `ci_userloginlog` VALUES ('388', '1', '127.0.0.1', 'TEST', '2018-10-13', '2018-10-13 20:18:57');
INSERT INTO `ci_userloginlog` VALUES ('389', '1', '127.0.0.1', 'TEST', '2018-10-14', '2018-10-14 17:52:30');
INSERT INTO `ci_userloginlog` VALUES ('390', '1', '127.0.0.1', 'TEST', '2018-10-15', '2018-10-15 09:47:35');
INSERT INTO `ci_userloginlog` VALUES ('391', '1', '127.0.0.1', 'TEST', '2018-10-15', '2018-10-15 13:20:59');
INSERT INTO `ci_userloginlog` VALUES ('392', '1', '127.0.0.1', 'TEST', '2018-10-15', '2018-10-15 13:25:07');
INSERT INTO `ci_userloginlog` VALUES ('393', '1', '127.0.0.1', 'TEST', '2018-10-20', '2018-10-20 20:09:59');
INSERT INTO `ci_userloginlog` VALUES ('394', '9', '127.0.0.1', 'ceshi', '2018-10-20', '2018-10-20 20:10:25');
INSERT INTO `ci_userloginlog` VALUES ('395', '1', '127.0.0.1', 'TEST', '2018-10-20', '2018-10-20 20:10:33');
INSERT INTO `ci_userloginlog` VALUES ('396', '1', '127.0.0.1', 'TEST', '2018-11-14', '2018-11-14 15:58:14');
INSERT INTO `ci_userloginlog` VALUES ('397', '11', '127.0.0.1', 'liandong', '2018-11-14', '2018-11-14 16:01:33');
INSERT INTO `ci_userloginlog` VALUES ('398', '1', '127.0.0.1', 'TEST', '2018-11-14', '2018-11-14 16:09:04');
INSERT INTO `ci_userloginlog` VALUES ('399', '11', '127.0.0.1', 'liandong', '2018-11-14', '2018-11-14 16:11:17');
INSERT INTO `ci_userloginlog` VALUES ('400', '1', '127.0.0.1', 'TEST', '2018-11-14', '2018-11-14 16:26:01');
INSERT INTO `ci_userloginlog` VALUES ('401', '11', '127.0.0.1', 'liandong', '2018-11-14', '2018-11-14 16:32:57');
INSERT INTO `ci_userloginlog` VALUES ('402', '1', '127.0.0.1', 'TEST', '2018-11-17', '2018-11-17 10:19:01');
INSERT INTO `ci_userloginlog` VALUES ('403', '1', '127.0.0.1', 'TEST', '2018-11-19', '2018-11-19 17:32:56');
INSERT INTO `ci_userloginlog` VALUES ('404', '1', '127.0.0.1', 'TEST', '2018-11-19', '2018-11-19 17:38:25');
INSERT INTO `ci_userloginlog` VALUES ('405', '1', '127.0.0.1', 'TEST', '2018-11-19', '2018-11-19 17:43:36');
INSERT INTO `ci_userloginlog` VALUES ('406', '1', '127.0.0.1', 'TEST', '2018-11-19', '2018-11-19 17:44:24');
INSERT INTO `ci_userloginlog` VALUES ('407', '1', '127.0.0.1', 'TEST', '2018-11-19', '2018-11-19 17:46:09');
INSERT INTO `ci_userloginlog` VALUES ('408', '1', '127.0.0.1', 'TEST', '2018-11-19', '2018-11-19 18:08:53');
INSERT INTO `ci_userloginlog` VALUES ('409', '1', '127.0.0.1', 'TEST', '2018-11-19', '2018-11-19 19:34:17');
INSERT INTO `ci_userloginlog` VALUES ('410', '1', '127.0.0.1', 'TEST', '2018-11-28', '2018-11-28 16:46:36');
INSERT INTO `ci_userloginlog` VALUES ('411', '1', '127.0.0.1', 'TEST', '2018-11-28', '2018-11-28 18:24:50');
INSERT INTO `ci_userloginlog` VALUES ('412', '1', '127.0.0.1', 'TEST', '2018-11-28', '2018-11-28 18:25:28');
INSERT INTO `ci_userloginlog` VALUES ('413', '1', '127.0.0.1', 'TEST', '2018-11-28', '2018-11-28 18:30:26');
INSERT INTO `ci_userloginlog` VALUES ('414', '1', '127.0.0.1', 'TEST', '2018-11-28', '2018-11-28 19:07:05');
INSERT INTO `ci_userloginlog` VALUES ('415', '1', '127.0.0.1', 'TEST', '2018-11-28', '2018-11-28 19:08:34');
INSERT INTO `ci_userloginlog` VALUES ('416', '1', '127.0.0.1', 'TEST', '2018-11-28', '2018-11-28 19:14:28');
INSERT INTO `ci_userloginlog` VALUES ('417', '1', '127.0.0.1', 'TEST', '2018-11-28', '2018-11-28 19:30:34');
INSERT INTO `ci_userloginlog` VALUES ('418', '1', '127.0.0.1', 'TEST', '2018-11-28', '2018-11-28 19:44:36');
INSERT INTO `ci_userloginlog` VALUES ('419', '1', '127.0.0.1', 'TEST', '2018-11-28', '2018-11-28 19:50:35');
INSERT INTO `ci_userloginlog` VALUES ('420', '1', '127.0.0.1', 'TEST', '2018-11-28', '2018-11-28 19:57:06');
INSERT INTO `ci_userloginlog` VALUES ('421', '1', '127.0.0.1', 'TEST', '2018-11-28', '2018-11-28 20:03:02');
INSERT INTO `ci_userloginlog` VALUES ('422', '1', '127.0.0.1', 'TEST', '2018-11-30', '2018-11-30 11:08:06');
INSERT INTO `ci_userloginlog` VALUES ('423', '1', '127.0.0.1', 'TEST', '2018-12-02', '2018-12-02 13:46:33');
INSERT INTO `ci_userloginlog` VALUES ('424', '1', '127.0.0.1', 'TEST', '2018-12-02', '2018-12-02 14:53:29');
INSERT INTO `ci_userloginlog` VALUES ('425', '1', '127.0.0.1', 'TEST', '2018-12-02', '2018-12-02 16:36:17');
INSERT INTO `ci_userloginlog` VALUES ('426', '1', '127.0.0.1', 'TEST', '2018-12-04', '2018-12-04 20:31:27');
INSERT INTO `ci_userloginlog` VALUES ('427', '1', '127.0.0.1', 'TEST', '2019-03-31', '2019-03-31 18:46:52');
INSERT INTO `ci_userloginlog` VALUES ('428', '1', '127.0.0.1', 'TEST', '2019-03-31', '2019-03-31 21:30:39');
INSERT INTO `ci_userloginlog` VALUES ('429', '1', '127.0.0.1', 'TEST', '2019-03-31', '2019-03-31 21:31:38');
INSERT INTO `ci_userloginlog` VALUES ('430', '1', '127.0.0.1', 'TEST', '2019-03-31', '2019-03-31 21:32:48');
INSERT INTO `ci_userloginlog` VALUES ('431', '1', '121.234.245.173', 'TEST', '2019-04-01', '2019-04-01 10:08:46');
INSERT INTO `ci_userloginlog` VALUES ('432', '1', '49.89.108.13', 'TEST', '2019-04-01', '2019-04-01 14:36:38');
INSERT INTO `ci_userloginlog` VALUES ('433', '1', '49.89.108.13', 'TEST', '2019-04-01', '2019-04-01 15:05:32');
INSERT INTO `ci_userloginlog` VALUES ('434', '1', '49.89.108.13', 'TEST', '2019-04-01', '2019-04-01 15:19:27');
INSERT INTO `ci_userloginlog` VALUES ('435', '1', '112.65.141.102', 'TEST', '2019-04-02', '2019-04-02 16:02:00');
INSERT INTO `ci_userloginlog` VALUES ('436', '1', '121.16.9.97', 'TEST', '2019-04-28', '2019-04-28 11:53:09');
INSERT INTO `ci_userloginlog` VALUES ('437', '1', '106.6.81.30', 'TEST', '2019-04-28', '2019-04-28 17:13:23');
INSERT INTO `ci_userloginlog` VALUES ('438', '1', '118.252.99.179', 'TEST', '2019-05-05', '2019-05-05 17:11:49');
INSERT INTO `ci_userloginlog` VALUES ('439', '1', '112.9.221.146', 'TEST', '2019-05-07', '2019-05-07 08:48:02');
INSERT INTO `ci_userloginlog` VALUES ('440', '1', '183.31.101.14', 'TEST', '2019-05-07', '2019-05-07 10:06:55');
INSERT INTO `ci_userloginlog` VALUES ('441', '1', '49.89.72.139', 'TEST', '2019-05-07', '2019-05-07 10:14:57');

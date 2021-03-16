/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50726
Source Host           : localhost:3306
Source Database       : test11

Target Server Type    : MYSQL
Target Server Version : 50726
File Encoding         : 65001

Date: 2021-03-17 04:49:49
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` smallint(6) NOT NULL,
  `role_id` smallint(6) NOT NULL COMMENT '角色id',
  `unit_id` smallint(6) NOT NULL COMMENT '单位id',
  `admin_name` varchar(20) NOT NULL COMMENT '管理员姓名',
  `mobile` char(11) NOT NULL COMMENT '手机号,唯一键,用于登录',
  `password` char(60) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL COMMENT '记住我',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1启用 0禁用',
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mobile` (`mobile`),
  KEY `role_id` (`role_id`),
  KEY `unit_id` (`unit_id`),
  KEY `admin_name` (`admin_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='管理员表';

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', '1', '1', '1', '1234567890', '$2y$10$WLHA2B2fGknU6IRDrUGdh.VqKmjXMRYbpgF7OZjpla7.sGfpzky8W', null, null, null, null, '1', null);

-- ----------------------------
-- Table structure for `auth`
-- ----------------------------
DROP TABLE IF EXISTS `auth`;
CREATE TABLE `auth` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `pid` smallint(6) NOT NULL DEFAULT '0' COMMENT '父级权限id',
  `auth_name` varchar(20) NOT NULL COMMENT '权限名称',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1启用0禁用',
  `sort` smallint(6) NOT NULL DEFAULT '0' COMMENT '排序',
  `icon` varchar(20) DEFAULT NULL COMMENT '图标类名',
  `is_menu` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否为菜单',
  `path` varchar(100) NOT NULL DEFAULT '' COMMENT '允许访问的路径',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='权限表';

-- ----------------------------
-- Records of auth
-- ----------------------------
INSERT INTO `auth` VALUES ('1', '5', '添加权限', '1', '2', 'aa', '0', '/auth/add', null, null, null);
INSERT INTO `auth` VALUES ('2', '5', '删除权限', '1', '1', 'aa', '1', '/auth/del', null, null, null);
INSERT INTO `auth` VALUES ('3', '5', '权限列表', '1', '3', 'aa', '0', '/auth/index', null, null, null);
INSERT INTO `auth` VALUES ('4', '5', '更新权限', '1', '0', 'aa', '0', '/auth/update/{name}/{id?}', null, null, null);
INSERT INTO `auth` VALUES ('5', '0', '权限', '1', '0', 'a', '1', '', null, null, null);
INSERT INTO `auth` VALUES ('6', '0', '角色', '1', '0', 'a', '1', '', null, null, null);
INSERT INTO `auth` VALUES ('7', '6', '角色列表', '1', '0', 'aa', '1', '/role/index', null, null, null);

-- ----------------------------
-- Table structure for `config`
-- ----------------------------
DROP TABLE IF EXISTS `config`;
CREATE TABLE `config` (
  `id` smallint(6) NOT NULL,
  `config_name` varchar(20) NOT NULL COMMENT '配置项名',
  `value` varchar(100) NOT NULL COMMENT '配置项值',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='设置表';

-- ----------------------------
-- Records of config
-- ----------------------------

-- ----------------------------
-- Table structure for `job`
-- ----------------------------
DROP TABLE IF EXISTS `job`;
CREATE TABLE `job` (
  `id` smallint(6) NOT NULL,
  `job_name` varchar(20) NOT NULL COMMENT '职务名称',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='职务表';

-- ----------------------------
-- Records of job
-- ----------------------------

-- ----------------------------
-- Table structure for `leave_audit`
-- ----------------------------
DROP TABLE IF EXISTS `leave_audit`;
CREATE TABLE `leave_audit` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL COMMENT '成员id',
  `leave_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '离队时间',
  `return_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '归队时间',
  `type_out_id` tinyint(4) NOT NULL DEFAULT '0' COMMENT '外出类型id',
  `squadron` varchar(255) DEFAULT NULL COMMENT '中队凭证',
  `brigade` varchar(255) DEFAULT NULL COMMENT '大队凭证',
  `detachment` varchar(255) DEFAULT NULL COMMENT '支队凭证',
  `reason` varchar(255) DEFAULT NULL COMMENT '拒绝原因',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '审核状态 0-待大队审核 1-大队拒审 2-待支队审核 3-支队拒审 4-支队审核通过',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `leave_at` (`leave_at`),
  KEY `return_at` (`return_at`),
  KEY `member_id` (`member_id`),
  KEY `type_out_id` (`type_out_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='离队审核表';

-- ----------------------------
-- Records of leave_audit
-- ----------------------------

-- ----------------------------
-- Table structure for `leave_record`
-- ----------------------------
DROP TABLE IF EXISTS `leave_record`;
CREATE TABLE `leave_record` (
  `id` int(11) NOT NULL,
  `leave_audit_id` int(11) DEFAULT NULL COMMENT '离队审核记录id',
  `record_at` timestamp NULL DEFAULT NULL COMMENT '销假时间(记录时间)',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '销假状态 0待销假 1已超假 2已销假',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `leave_audit_id` (`leave_audit_id`),
  KEY `record_at` (`record_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='离队记录表(销假记录)';

-- ----------------------------
-- Records of leave_record
-- ----------------------------

-- ----------------------------
-- Table structure for `member`
-- ----------------------------
DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `unit_id` smallint(6) NOT NULL COMMENT '单位id',
  `job_id` smallint(6) DEFAULT NULL,
  `rank_id` smallint(6) NOT NULL COMMENT '警衔id',
  `member_name` varchar(255) NOT NULL COMMENT '人员姓名',
  `holiday_spent` tinyint(4) NOT NULL DEFAULT '0' COMMENT '已休探亲假天数',
  `holiday_remaining` tinyint(4) NOT NULL DEFAULT '0' COMMENT '剩余探亲假天数',
  `mobile` char(11) DEFAULT NULL COMMENT '手机号',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1启用0禁用',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `job_id` (`job_id`),
  KEY `unit_id` (`unit_id`),
  KEY `rank_id` (`rank_id`),
  KEY `mobile` (`mobile`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='人员表';

-- ----------------------------
-- Records of member
-- ----------------------------

-- ----------------------------
-- Table structure for `members_audit`
-- ----------------------------
DROP TABLE IF EXISTS `members_audit`;
CREATE TABLE `members_audit` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '审核类型 0删除 1添加',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '审核状态 0待审核 1未通过 2 已通过',
  `reason` varchar(255) DEFAULT NULL COMMENT '拒绝原因',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `member_id` (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='人员审核表';

-- ----------------------------
-- Records of members_audit
-- ----------------------------

-- ----------------------------
-- Table structure for `members_detail`
-- ----------------------------
DROP TABLE IF EXISTS `members_detail`;
CREATE TABLE `members_detail` (
  `id` int(11) NOT NULL,
  `gender` tinyint(4) DEFAULT '0' COMMENT '性别 0男 1女',
  `separation` tinyint(4) DEFAULT '0' COMMENT '分居状况 0未分居 1两地分居 2三地分居',
  `matrimony` tinyint(4) DEFAULT '0' COMMENT '婚姻状况 0未婚 1已婚',
  `photo` varchar(255) DEFAULT NULL,
  `join_at` timestamp NULL DEFAULT NULL COMMENT '入伍时间',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='人员详情表';

-- ----------------------------
-- Records of members_detail
-- ----------------------------

-- ----------------------------
-- Table structure for `rank`
-- ----------------------------
DROP TABLE IF EXISTS `rank`;
CREATE TABLE `rank` (
  `id` smallint(6) NOT NULL,
  `holiday_total` tinyint(4) NOT NULL DEFAULT '0' COMMENT '本年度探亲假总天数',
  `rank_name` varchar(20) NOT NULL COMMENT '单位名称',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='警衔表';

-- ----------------------------
-- Records of rank
-- ----------------------------

-- ----------------------------
-- Table structure for `role`
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id` smallint(6) NOT NULL,
  `role_name` varchar(20) NOT NULL DEFAULT '0' COMMENT '角色名',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='角色表';

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES ('1', 'admin', null, null, null);

-- ----------------------------
-- Table structure for `role_auth`
-- ----------------------------
DROP TABLE IF EXISTS `role_auth`;
CREATE TABLE `role_auth` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` smallint(6) NOT NULL,
  `auth_id` smallint(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='角色权限关系表';

-- ----------------------------
-- Records of role_auth
-- ----------------------------
INSERT INTO `role_auth` VALUES ('1', '1', '1');
INSERT INTO `role_auth` VALUES ('2', '1', '2');
INSERT INTO `role_auth` VALUES ('3', '1', '3');
INSERT INTO `role_auth` VALUES ('4', '1', '4');
INSERT INTO `role_auth` VALUES ('5', '1', '5');
INSERT INTO `role_auth` VALUES ('6', '1', '6');
INSERT INTO `role_auth` VALUES ('7', '1', '7');

-- ----------------------------
-- Table structure for `type_out`
-- ----------------------------
DROP TABLE IF EXISTS `type_out`;
CREATE TABLE `type_out` (
  `id` tinyint(4) NOT NULL,
  `type_out_name` varchar(20) NOT NULL COMMENT '外出类型名称',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='外出类型表';

-- ----------------------------
-- Records of type_out
-- ----------------------------

-- ----------------------------
-- Table structure for `unit`
-- ----------------------------
DROP TABLE IF EXISTS `unit`;
CREATE TABLE `unit` (
  `id` smallint(6) NOT NULL,
  `pid` smallint(6) NOT NULL DEFAULT '0' COMMENT '上级单位id',
  `unit_name` varchar(20) NOT NULL COMMENT '单位名称',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='单位表';

-- ----------------------------
-- Records of unit
-- ----------------------------

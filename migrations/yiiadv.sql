/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50547
Source Host           : localhost:3306
Source Database       : yiiadv

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2018-09-04 15:44:33
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for auth_assignment
-- ----------------------------
DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `auth_assignment_user_id_idx` (`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='权限表分配表';

-- ----------------------------
-- Records of auth_assignment
-- ----------------------------
INSERT INTO `auth_assignment` VALUES ('再建角色', '6', '1535375040');
INSERT INTO `auth_assignment` VALUES ('权限2', '6', '1535374731');
INSERT INTO `auth_assignment` VALUES ('测试权限', '6', '1535174784');
INSERT INTO `auth_assignment` VALUES ('测试角色', '6', '1535174782');

-- ----------------------------
-- Table structure for auth_item
-- ----------------------------
DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` smallint(6) NOT NULL COMMENT '1角色 2权限/路由',
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='权限/角色/路由表';

-- ----------------------------
-- Records of auth_item
-- ----------------------------
INSERT INTO `auth_item` VALUES ('/*', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/admin/*', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/admin/assignment/*', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/admin/assignment/assign', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/admin/assignment/index', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/admin/assignment/revoke', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/admin/assignment/view', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/admin/default/*', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/admin/default/index', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/admin/menu/*', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/admin/menu/create', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/admin/menu/delete', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/admin/menu/index', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/admin/menu/update', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/admin/menu/view', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/admin/permission/*', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/admin/permission/assign', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/admin/permission/create', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/admin/permission/delete', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/admin/permission/index', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/admin/permission/remove', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/admin/permission/update', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/admin/permission/view', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/admin/role/*', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/admin/role/assign', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/admin/role/create', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/admin/role/delete', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/admin/role/index', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/admin/role/remove', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/admin/role/update', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/admin/role/view', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/admin/route/*', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/admin/route/assign', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/admin/route/create', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/admin/route/index', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/admin/route/refresh', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/admin/route/remove', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/admin/rule/*', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/admin/rule/create', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/admin/rule/delete', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/admin/rule/index', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/admin/rule/update', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/admin/rule/view', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/admin/user/*', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/admin/user/activate', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/admin/user/change-password', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/admin/user/delete', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/admin/user/index', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/admin/user/login', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/admin/user/logout', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/admin/user/request-password-reset', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/admin/user/reset-password', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/admin/user/signup', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/admin/user/view', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/debug/*', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/debug/default/*', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/debug/default/db-explain', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/debug/default/download-mail', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/debug/default/index', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/debug/default/toolbar', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/debug/default/view', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/debug/user/*', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/debug/user/reset-identity', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/debug/user/set-identity', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/gii/*', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/gii/default/*', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/gii/default/action', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/gii/default/diff', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/gii/default/index', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/gii/default/preview', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/gii/default/view', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/site/*', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/site/error', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/site/index', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/site/login', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/site/logout', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/test/*', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/test/create', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/test/delete', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/test/index', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/test/update', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('/test/view', '2', null, null, null, '1535177584', '1535177584');
INSERT INTO `auth_item` VALUES ('再建角色', '1', null, null, null, '1535176755', '1535268535');
INSERT INTO `auth_item` VALUES ('权限2', '2', null, null, null, '1535175405', '1535175405');
INSERT INTO `auth_item` VALUES ('测试权限', '2', null, null, null, '1535174754', '1535174754');
INSERT INTO `auth_item` VALUES ('测试角色', '1', null, null, null, '1535174738', '1535174738');

-- ----------------------------
-- Table structure for auth_item_child
-- ----------------------------
DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='权限/角色对应 路由表';

-- ----------------------------
-- Records of auth_item_child
-- ----------------------------
INSERT INTO `auth_item_child` VALUES ('再建角色', '/*');
INSERT INTO `auth_item_child` VALUES ('再建角色', '/admin/*');
INSERT INTO `auth_item_child` VALUES ('再建角色', '/admin/assignment/*');
INSERT INTO `auth_item_child` VALUES ('再建角色', '/admin/assignment/assign');
INSERT INTO `auth_item_child` VALUES ('再建角色', '/admin/assignment/index');
INSERT INTO `auth_item_child` VALUES ('再建角色', '/admin/assignment/revoke');
INSERT INTO `auth_item_child` VALUES ('再建角色', '/admin/assignment/view');
INSERT INTO `auth_item_child` VALUES ('再建角色', '/admin/default/*');
INSERT INTO `auth_item_child` VALUES ('再建角色', '/admin/default/index');
INSERT INTO `auth_item_child` VALUES ('再建角色', '/admin/menu/*');
INSERT INTO `auth_item_child` VALUES ('再建角色', '/admin/menu/create');
INSERT INTO `auth_item_child` VALUES ('再建角色', '/admin/menu/delete');
INSERT INTO `auth_item_child` VALUES ('再建角色', '/admin/menu/index');
INSERT INTO `auth_item_child` VALUES ('再建角色', '/admin/menu/update');
INSERT INTO `auth_item_child` VALUES ('再建角色', '/admin/menu/view');
INSERT INTO `auth_item_child` VALUES ('再建角色', '/admin/permission/*');
INSERT INTO `auth_item_child` VALUES ('再建角色', '/admin/permission/assign');
INSERT INTO `auth_item_child` VALUES ('再建角色', '/admin/permission/create');
INSERT INTO `auth_item_child` VALUES ('再建角色', '/admin/permission/delete');
INSERT INTO `auth_item_child` VALUES ('再建角色', '/admin/permission/index');
INSERT INTO `auth_item_child` VALUES ('再建角色', '/admin/permission/remove');
INSERT INTO `auth_item_child` VALUES ('再建角色', '/admin/permission/update');
INSERT INTO `auth_item_child` VALUES ('再建角色', '/admin/permission/view');
INSERT INTO `auth_item_child` VALUES ('再建角色', '/admin/role/*');
INSERT INTO `auth_item_child` VALUES ('再建角色', '/admin/role/assign');
INSERT INTO `auth_item_child` VALUES ('再建角色', '/admin/role/create');
INSERT INTO `auth_item_child` VALUES ('再建角色', '/admin/role/delete');
INSERT INTO `auth_item_child` VALUES ('再建角色', '/admin/role/index');
INSERT INTO `auth_item_child` VALUES ('再建角色', '/admin/role/remove');
INSERT INTO `auth_item_child` VALUES ('再建角色', '/admin/role/update');
INSERT INTO `auth_item_child` VALUES ('再建角色', '/admin/role/view');
INSERT INTO `auth_item_child` VALUES ('再建角色', '/admin/route/*');
INSERT INTO `auth_item_child` VALUES ('再建角色', '/admin/route/assign');
INSERT INTO `auth_item_child` VALUES ('再建角色', '/admin/route/create');
INSERT INTO `auth_item_child` VALUES ('再建角色', '/admin/route/index');
INSERT INTO `auth_item_child` VALUES ('再建角色', '/admin/route/refresh');
INSERT INTO `auth_item_child` VALUES ('再建角色', '/admin/route/remove');
INSERT INTO `auth_item_child` VALUES ('再建角色', '/admin/rule/*');
INSERT INTO `auth_item_child` VALUES ('再建角色', '/admin/rule/create');
INSERT INTO `auth_item_child` VALUES ('再建角色', '/admin/rule/delete');
INSERT INTO `auth_item_child` VALUES ('再建角色', '/admin/rule/index');
INSERT INTO `auth_item_child` VALUES ('再建角色', '/admin/rule/update');
INSERT INTO `auth_item_child` VALUES ('再建角色', '/admin/rule/view');
INSERT INTO `auth_item_child` VALUES ('再建角色', '/admin/user/*');
INSERT INTO `auth_item_child` VALUES ('再建角色', '/admin/user/activate');
INSERT INTO `auth_item_child` VALUES ('再建角色', '/admin/user/change-password');
INSERT INTO `auth_item_child` VALUES ('再建角色', '/admin/user/delete');
INSERT INTO `auth_item_child` VALUES ('再建角色', '/admin/user/index');
INSERT INTO `auth_item_child` VALUES ('再建角色', '/admin/user/login');
INSERT INTO `auth_item_child` VALUES ('再建角色', '/admin/user/logout');
INSERT INTO `auth_item_child` VALUES ('再建角色', '/admin/user/request-password-reset');
INSERT INTO `auth_item_child` VALUES ('再建角色', '/admin/user/reset-password');
INSERT INTO `auth_item_child` VALUES ('再建角色', '/admin/user/signup');
INSERT INTO `auth_item_child` VALUES ('再建角色', '/admin/user/view');

-- ----------------------------
-- Table structure for auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='规则表';

-- ----------------------------
-- Records of auth_rule
-- ----------------------------

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(256) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` blob,
  PRIMARY KEY (`id`),
  KEY `parent` (`parent`),
  CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='系统菜单表';

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES ('1', '系统管理', null, null, null, 0x7B2269636F6E223A2022636F6773222C202276697369626C65223A20747275657D);
INSERT INTO `menu` VALUES ('2', '后台管理员', '1', '/admin/user/index', null, 0x7B2269636F6E223A202275736572222C202276697369626C65223A20747275657D);
INSERT INTO `menu` VALUES ('3', '权限控制', '1', null, null, 0x7B2269636F6E223A20226C6F636B222C202276697369626C65223A20747275657D);
INSERT INTO `menu` VALUES ('4', '路由', '3', '/admin/route/index', null, null);
INSERT INTO `menu` VALUES ('5', '权限', '3', '/admin/permission/index', null, null);
INSERT INTO `menu` VALUES ('6', '角色', '3', '/admin/role/index', null, null);
INSERT INTO `menu` VALUES ('7', '分配', '3', '/admin/assignment/index', null, null);
INSERT INTO `menu` VALUES ('8', '菜单', '3', '/admin/menu/index', null, null);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `username` varchar(50) NOT NULL COMMENT '用户名',
  `auth_key` varchar(32) NOT NULL COMMENT '自动登录key',
  `password_hash` varchar(100) NOT NULL COMMENT '加密密码',
  `password_reset_token` varchar(100) DEFAULT NULL COMMENT '重置密码token',
  `email` varchar(60) NOT NULL COMMENT '邮箱',
  `role` smallint(6) NOT NULL DEFAULT '10' COMMENT '角色等级',
  `status` smallint(6) NOT NULL DEFAULT '10' COMMENT '状态',
  `nickname` varchar(50) NOT NULL COMMENT '昵称',
  `created_at` int(11) NOT NULL COMMENT '创建时间',
  `updated_at` int(11) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='管理员用户表';

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('6', 'admin', 'PghV2KABo3vnW21qSJmYHF8naVeWTPMV', '$2y$13$6RAS1fGh0Ark9rNiQEYbROmNFzTUPeXltfsACtTARgbAnq6xQ2k72', null, '', '10', '10', '超级管理员', '0', '0');

# 创建数据库
CREATE DATABASE `studb`;

# 使用数据库
USE `studb`;                 

#创建数据表
CREATE TABLE `student` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) DEFAULT NULL COMMENT '姓名',
  `sex` char(2) DEFAULT NULL COMMENT '性别',
  `age` varchar(6) DEFAULT NULL COMMENT '年龄',
  `edu` varchar(12) DEFAULT NULL COMMENT '学历',
  `salary` decimal(10,2) DEFAULT NULL COMMENT '工资',
  `bonus` decimal(10,2) DEFAULT NULL COMMENT '奖金',
  `city` varchar(32) DEFAULT NULL COMMENT '籍贯',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#插入测试数据
INSERT INTO `student` VALUES ('1', '测试1', '男', '22', '专科', '4500.00', '1000.00', '广东韶关');
INSERT INTO `student` VALUES ('2', '测试2', '女', '20', '本科', '5000.00', '500.00', '湖南长沙');
INSERT INTO `student` VALUES ('3', '前端1', '女', '22', '专科', '5000.00', '700.00', '湖南郴州');
INSERT INTO `student` VALUES ('4', '前端2', '女', '25', '本科', '8000.00', '200.00', '湖南娄底');
INSERT INTO `student` VALUES ('5', '后台', '男', '22', '专科', '7000.00', '200.00', '湖南郴州');

# 清空数据表
TRUNCATE `student`;                                 




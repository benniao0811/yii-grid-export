/*
MySQL Backup
Database: yii_demo
Backup Time: 2022-04-08 14:11:47
*/

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `yii_demo`.`supplier`;
CREATE TABLE `supplier` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `code` char(3) CHARACTER SET ascii DEFAULT NULL,
  `t_status` enum('ok','hold') CHARACTER SET ascii NOT NULL DEFAULT 'ok',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
BEGIN;
LOCK TABLES `yii_demo`.`supplier` WRITE;
DELETE FROM `yii_demo`.`supplier`;
INSERT INTO `yii_demo`.`supplier` (`id`,`name`,`code`,`t_status`) VALUES (1, '宋江', '1', 'ok'),(2, '卢俊义', '2', 'ok'),(3, '吴用', '3', 'ok'),(4, '公孙胜', '4', 'ok'),(5, '关胜', '5', 'ok'),(6, '林冲', '6', 'ok'),(7, '秦明', '7', 'ok'),(8, '呼延灼', '8', 'hold'),(9, '花荣', '9', 'hold'),(10, '华歆', '10', 'hold'),(11, '柴进', '11', 'ok'),(12, '李应', '12', 'ok');
UNLOCK TABLES;
COMMIT;

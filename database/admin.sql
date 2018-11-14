-- MySQL dump 10.13  Distrib 5.7.22, for osx10.13 (x86_64)
--
-- Host: 127.0.0.1    Database: sq_vipmhxy
-- ------------------------------------------------------
-- Server version	5.7.22

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `vip_admin_menu`
--

LOCK TABLES `vip_admin_menu` WRITE;
/*!40000 ALTER TABLE `vip_admin_menu` DISABLE KEYS */;
INSERT INTO `vip_admin_menu` VALUES (1,0,1,'Index','fa-bar-chart','/',NULL,NULL,NULL),(2,0,10,'Admin','fa-tasks','',NULL,NULL,'2018-11-14 06:51:00'),(3,2,11,'Users','fa-users','auth/users',NULL,NULL,'2018-11-14 06:51:00'),(4,2,12,'Roles','fa-user','auth/roles',NULL,NULL,'2018-11-14 06:51:00'),(5,2,13,'Permission','fa-ban','auth/permissions',NULL,NULL,'2018-11-14 06:51:00'),(6,2,14,'Menu','fa-bars','auth/menu',NULL,NULL,'2018-11-14 06:51:00'),(7,2,15,'Operation log','fa-history','auth/logs',NULL,NULL,'2018-11-14 06:51:00'),(8,0,16,'Log viewer','fa-database','logs',NULL,'2018-11-14 05:36:51','2018-11-14 06:51:00'),(9,0,17,'Redis manager','fa-database','redis',NULL,'2018-11-14 05:39:19','2018-11-14 06:51:00'),(10,0,18,'Media manager','fa-file','media',NULL,'2018-11-14 05:48:20','2018-11-14 06:51:00'),(11,0,5,'友情链接','fa-bars','link',NULL,'2018-11-14 06:07:26','2018-11-14 06:50:13'),(12,0,7,'帐号','fa-bars','key',NULL,'2018-11-14 06:29:12','2018-11-14 06:49:53'),(13,0,4,'文档','fa-bars','document',NULL,'2018-11-14 06:37:12','2018-11-14 06:50:23'),(14,0,2,'相册','fa-bars','album',NULL,'2018-11-14 06:38:36','2018-11-14 06:50:37'),(15,0,8,'个人','fa-bars','profile',NULL,'2018-11-14 06:40:42','2018-11-14 06:49:41'),(16,0,3,'照片','fa-bars','photo',NULL,'2018-11-14 06:40:53','2018-11-14 06:50:49'),(17,0,6,'分类','fa-bars','category',NULL,'2018-11-14 06:42:29','2018-11-14 06:50:04'),(18,0,9,'轮播图','fa-bars','carousel',NULL,'2018-11-14 06:49:23','2018-11-14 06:51:00');
/*!40000 ALTER TABLE `vip_admin_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `vip_admin_permissions`
--

LOCK TABLES `vip_admin_permissions` WRITE;
/*!40000 ALTER TABLE `vip_admin_permissions` DISABLE KEYS */;
INSERT INTO `vip_admin_permissions` VALUES (1,'All permission','*','','*',NULL,NULL),(2,'Dashboard','dashboard','GET','/',NULL,NULL),(3,'Login','auth.login','','/auth/login\r\n/auth/logout',NULL,NULL),(4,'User setting','auth.setting','GET,PUT','/auth/setting',NULL,NULL),(5,'Auth management','auth.management','','/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs',NULL,NULL),(6,'Logs','ext.log-viewer',NULL,'/logs*','2018-11-14 05:36:51','2018-11-14 05:36:51'),(7,'Redis Manager','ext.redis-manager',NULL,'/redis*','2018-11-14 05:39:19','2018-11-14 05:39:19'),(8,'Media manager','ext.media-manager',NULL,'/media*','2018-11-14 05:48:20','2018-11-14 05:48:20');
/*!40000 ALTER TABLE `vip_admin_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `vip_admin_role_menu`
--

LOCK TABLES `vip_admin_role_menu` WRITE;
/*!40000 ALTER TABLE `vip_admin_role_menu` DISABLE KEYS */;
INSERT INTO `vip_admin_role_menu` VALUES (1,2,NULL,NULL),(1,11,NULL,NULL),(1,12,NULL,NULL),(1,13,NULL,NULL),(1,14,NULL,NULL),(1,15,NULL,NULL),(1,16,NULL,NULL),(1,17,NULL,NULL),(1,18,NULL,NULL);
/*!40000 ALTER TABLE `vip_admin_role_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `vip_admin_role_permissions`
--

LOCK TABLES `vip_admin_role_permissions` WRITE;
/*!40000 ALTER TABLE `vip_admin_role_permissions` DISABLE KEYS */;
INSERT INTO `vip_admin_role_permissions` VALUES (1,1,NULL,NULL);
/*!40000 ALTER TABLE `vip_admin_role_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `vip_admin_role_users`
--

LOCK TABLES `vip_admin_role_users` WRITE;
/*!40000 ALTER TABLE `vip_admin_role_users` DISABLE KEYS */;
INSERT INTO `vip_admin_role_users` VALUES (1,1,NULL,NULL);
/*!40000 ALTER TABLE `vip_admin_role_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `vip_admin_roles`
--

LOCK TABLES `vip_admin_roles` WRITE;
/*!40000 ALTER TABLE `vip_admin_roles` DISABLE KEYS */;
INSERT INTO `vip_admin_roles` VALUES (1,'Administrator','administrator','2018-11-13 19:27:33','2018-11-13 19:27:33');
/*!40000 ALTER TABLE `vip_admin_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `vip_admin_user_permissions`
--

LOCK TABLES `vip_admin_user_permissions` WRITE;
/*!40000 ALTER TABLE `vip_admin_user_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `vip_admin_user_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `vip_admin_users`
--

LOCK TABLES `vip_admin_users` WRITE;
/*!40000 ALTER TABLE `vip_admin_users` DISABLE KEYS */;
INSERT INTO `vip_admin_users` VALUES (1,'admin','$2y$10$RZM78lhsvIlVx6eGaTi5AeMYpUZ.w5E0YSROONMTIbvtV.z5CsGwe','Administrator',NULL,'69z7rbYk765K5Z5bfCAzUWOaTGrAT1QCUK11BZpcywrzSK6zT9lZ3W5ye5xd','2018-11-13 19:27:33','2018-11-14 05:56:49');
/*!40000 ALTER TABLE `vip_admin_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-14 14:51:16

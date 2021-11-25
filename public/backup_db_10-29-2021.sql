-- MariaDB dump 10.19  Distrib 10.4.21-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: budget_system_db
-- ------------------------------------------------------
-- Server version	10.4.21-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `budget_system_db`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `budget_system_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;

USE `budget_system_db`;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdby` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datecreated` datetime DEFAULT NULL,
  `updatedby` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateupdated` datetime DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Pesticides or pest Repellents','1','2021-08-20 05:35:15',NULL,NULL,1),(2,'Perfumes or Colognes or Fragrances','1','2021-08-20 05:35:15',NULL,NULL,1),(3,'Alcohol or Acetone Based Antiseptics','1','2021-08-20 05:35:15',NULL,NULL,1),(4,'Color Compounds and Dispersions','1','2021-08-20 05:35:15',NULL,NULL,1),(5,'Films','1','2021-08-20 05:35:15',NULL,NULL,1),(6,'Paper Materials and Products','1','2021-08-20 05:35:15',NULL,NULL,1),(7,'Batteries and Cells Accessories','1','2021-08-20 05:35:15',NULL,NULL,1),(8,'Manufacturing Components and Supplies','1','2021-08-20 05:35:15',NULL,NULL,1),(9,'Heating and Ventilation and Air Circulation','1','2021-08-20 05:35:15',NULL,NULL,1),(10,'Medical Thermometers and Accessories','1','2021-08-20 05:35:15',NULL,NULL,1),(11,'Lighting and Fixtures and Accessories','1','2021-08-20 05:35:15',NULL,NULL,1),(12,'Measuring and Observing and Testing Equipment','1','2021-08-20 05:35:15',NULL,NULL,1),(13,'Cleaning Equipment and Supplies','1','2021-08-20 05:35:15',NULL,NULL,1),(14,'Information and Communication Technology (ICT) Equipment and Devices and Accessories','1','2021-08-20 05:35:15',NULL,NULL,1),(15,'Office Equipment and Accessories and Supplies','1','2021-08-20 05:35:15',NULL,NULL,1),(16,'Printer or Facsimile or Photocopier Supplies','1','2021-08-20 05:35:15',NULL,NULL,1),(17,'Audio and Visual Equipment and Supplies','1','2021-08-20 05:35:15',NULL,NULL,1),(18,'Flag or Accessories','1','2021-08-20 05:35:15',NULL,NULL,1),(19,'Priner Publications','1','2021-08-20 05:35:15',NULL,NULL,1),(20,'Fire Fighting Equipment','1','2021-08-20 05:35:15',NULL,NULL,1),(21,'Consumer Electronics','1','2021-08-20 05:35:15',NULL,NULL,1),(22,'Furniture and Furnishings','1','2021-08-20 05:35:15',NULL,NULL,1),(23,'Arts and Crafts Equipment and Accessories and Supplies','1','2021-08-20 05:35:15',NULL,NULL,1),(24,'Software','1','2021-08-20 05:35:15',NULL,NULL,1);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dashboards`
--

DROP TABLE IF EXISTS `dashboards`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dashboards` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dashboards`
--

LOCK TABLES `dashboards` WRITE;
/*!40000 ALTER TABLE `dashboards` DISABLE KEYS */;
/*!40000 ALTER TABLE `dashboards` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `office_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `office_head` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_office` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_office_in_charge` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createdby` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datecreated` datetime DEFAULT NULL,
  `updatedby` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateupdated` datetime DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departments`
--

LOCK TABLES `departments` WRITE;
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` VALUES (1,'MO','Office of the Municipal Mayor','Judith R. Cajes','','',NULL,'1','2021-08-20 05:35:15',NULL,NULL,1),(2,'VMO','Office of the Municipal Vice-Mayor','Manuel Garcia','','',NULL,'1','2021-08-20 05:35:15',NULL,NULL,1),(3,'SB','Sangguniang Bayan','Manuel Garcia','','',NULL,'1','2021-08-20 05:35:15',NULL,NULL,1),(4,'SEC','Secretary to the Sanggunian','Warlita O. Orioque','','',NULL,'1','2021-08-20 05:35:15',NULL,NULL,1),(5,'MHRMDO','Municipal Human Resource Management and Development Office','Quirino T. Nugal Jr.','','',NULL,'1','2021-08-20 05:35:15',NULL,NULL,1),(6,'MBO','Municipal Budget Office','Medina B. Macua','','',NULL,'1','2021-08-20 05:35:15',NULL,NULL,1),(7,'MASSO','Municipal Assessor\'s Office','Reynante Magadia','','',NULL,'1','2021-08-20 05:35:15',NULL,NULL,1),(8,'MTO','Municipal Treasurer\'s Office','Evelyn E. Baradas','','',NULL,'1','2021-08-20 05:35:15',NULL,NULL,1),(9,'GSO','General Services Office','Elenita L. Sawan','','',NULL,'1','2021-08-20 05:35:15',NULL,NULL,1),(10,'OMA','Office of the Municipal Accountant','Sheryl D. Celo, CPA','','',NULL,'1','2021-08-20 05:35:15',NULL,NULL,1),(11,'MLCR','Municipal Local Civil Registrar','Leonila Tubo','','',NULL,'1','2021-08-20 05:35:15',NULL,NULL,1),(12,'MSWDO','Municipal Social Welfare and Development Office','Vicky E. Cajes','','',NULL,'1','2021-08-20 05:35:15',NULL,NULL,1),(13,'MAO','Municipal Agriculture Office','Avelina Lopiceros','','',NULL,'1','2021-08-20 05:35:15',NULL,NULL,1),(14,'MPDO','Municipal Planning and Development Office','Engr. Marvis G. Dellosa','','',NULL,'1','2021-08-20 05:35:15',NULL,NULL,1),(15,'MEO','Municipal Engineering Office','Engr. Teodomiro Balonga','','',NULL,'1','2021-08-20 05:35:15',NULL,NULL,1),(16,'MDRRMO','Municipal Disaster and Risk-Reduction Office','Diego V. Medina','','',NULL,'1','2021-08-20 05:35:15',NULL,NULL,1),(17,'BPLO','Business Permit and Licensing Office','Marcelo Empleo','','',NULL,'1','2021-08-20 05:35:15',NULL,NULL,1),(18,'TMC','Trinidad Municipal College','Atty. Roberto C. Cajes','College of Computer Studies','Clark Kevin V. Villamor','Instructor I','1','2021-08-20 05:35:15','1','2021-08-21 03:15:00',1),(19,'TMC','Trinidad Municipal College','Atty. Roberto C. Cajes','College of Teacher Education','Misael A. Salisid',NULL,'1','2021-08-20 05:35:15',NULL,NULL,1),(20,'TMC','Trinidad Municipal College','Atty. Roberto C. Cajes','College of Office Administration','Sr. Isabelita J. Bulala',NULL,'1','2021-08-20 05:35:15',NULL,NULL,1),(21,'TMC','Trinidad Municipal College','Atty. Roberto C. Cajes','College of Arts and Sciences','Selvino B. Naval',NULL,'1','2021-08-20 05:35:15',NULL,NULL,1),(22,'TMC','Trinidad Municipal College','Atty. Roberto C. Cajes','College of Criminal Justice Education','Cesar D. Cañete',NULL,'1','2021-08-20 05:35:15',NULL,NULL,1),(23,'TMC','Trinidad Municipal College','Atty. Roberto C. Cajes','Registrar\'s Office','Iris Mae R. Catanio',NULL,'1','2021-08-20 05:35:15',NULL,NULL,1),(24,'TMC','Trinidad Municipal College','Atty. Roberto C. Cajes','Electronic Data Processing Office','Marlon V. Macua',NULL,'1','2021-08-20 05:35:15',NULL,NULL,1),(25,'TMC','Trinidad Municipal College','Atty. Roberto C. Cajes','Guidance Office','Isabelita B. Aranas',NULL,'1','2021-08-20 05:35:15',NULL,NULL,1),(26,'TMC','Trinidad Municipal College','Atty. Roberto C. Cajes','Student Affair\'s Office','Selvino B. Naval',NULL,'1','2021-08-20 05:35:15',NULL,NULL,1),(27,'TMC','Trinidad Municipal College','Atty. Roberto C. Cajes','Library','Geoffrey Orevillo',NULL,'1','2021-08-20 05:35:15',NULL,NULL,1),(28,'TMC','Trinidad Municipal College','Atty. Roberto C. Cajes','Administrator\'s Office','Atty. Roberto C. Cajes',NULL,'1','2021-08-20 05:35:15',NULL,NULL,1),(29,'IAU','Internal Audit Unit','','','',NULL,'1','2021-08-20 05:35:15',NULL,NULL,1),(30,'COA','Commission on Audit','','','',NULL,'1','2021-08-20 05:35:15',NULL,NULL,1),(31,'MCTC','Municipal Circuit Trial Court','','','',NULL,'1','2021-08-20 05:35:15',NULL,NULL,1),(32,'PNP','Philippine National Police','','','',NULL,'1','2021-08-20 05:35:15',NULL,NULL,1),(33,'BFP','Bureau of Fire Protection','','','',NULL,'1','2021-08-20 05:35:15',NULL,NULL,1),(34,'COMELEC','Commission on Election','','','',NULL,'1','2021-08-20 05:35:15',NULL,NULL,1),(35,'BIR','Bureau of Internal Revenue','','','',NULL,'1','2021-08-20 05:35:15',NULL,NULL,1),(36,'MHU','Municipal Health Unit','','','',NULL,'1','2021-08-20 05:35:15',NULL,NULL,1),(37,'MLGOO','Municipal Local Government Operations','','','',NULL,'1','2021-08-20 05:35:15',NULL,NULL,1),(38,'MTC','Municipal Training Center','','','',NULL,'1','2021-08-20 05:35:15',NULL,NULL,1);
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `itemname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double NOT NULL,
  `uom` int(11) NOT NULL,
  `object_of_expenditure` int(11) NOT NULL,
  `category` int(11) DEFAULT NULL,
  `createdby` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datecreated` datetime DEFAULT NULL,
  `updatedby` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateupdated` datetime DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` VALUES (1,'Ballpen (Black)',NULL,150,3,1,15,'3','2021-08-21 07:00:56',NULL,NULL,1),(2,'Ballpen (Black)',NULL,150,3,1,15,'3','2021-08-21 07:01:17',NULL,NULL,1),(3,'Bond Paper (Long)',NULL,450,9,1,15,'3','2021-08-21 07:01:44',NULL,NULL,1),(4,'Bond Paper (Short)',NULL,430,9,1,15,'3','2021-08-21 07:01:53',NULL,NULL,1),(5,'Ballpen (Black)',NULL,200,3,1,15,'1','2021-08-21 08:26:00',NULL,NULL,1),(6,'Computer Set',NULL,35000,11,15,14,'1','2021-08-22 03:57:27',NULL,NULL,1),(7,'Whiteboard Marker',NULL,35,7,1,15,'1','2021-08-22 04:02:09','1','2021-08-22 04:02:31',1),(8,'Computer Keyboard',NULL,350,6,15,14,'1','2021-09-21 09:37:47',NULL,NULL,1);
/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2021_08_04_082223_create_settings_table',1),(2,'2021_08_04_091340_create_users_table',1),(3,'2021_08_05_022848_create_dashboards_table',1),(4,'2021_08_05_052247_create_procurements_table',1),(5,'2021_08_05_052331_create_reports_table',1),(6,'2021_08_05_072635_create_items_table',1),(7,'2021_08_14_140451_create_departments_table',1),(8,'2021_08_16_071447_create_object_expenditures_table',1),(9,'2021_08_18_083641_create_categories_table',1),(10,'2021_08_18_083718_create_units_table',1),(11,'2021_08_19_072826_create_roles_table',1),(12,'2021_08_19_072951_create_permissions_table',1),(13,'2021_08_19_073008_create_role_permissions_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `object_expenditures`
--

DROP TABLE IF EXISTS `object_expenditures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `object_expenditures` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `obj_exp_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createdby` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datecreated` datetime DEFAULT NULL,
  `updatedby` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateupdated` datetime DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `object_expenditures`
--

LOCK TABLES `object_expenditures` WRITE;
/*!40000 ALTER TABLE `object_expenditures` DISABLE KEYS */;
INSERT INTO `object_expenditures` VALUES (1,'Office Supplies','1','2021-08-20 05:35:15',NULL,NULL,1),(2,'Medical, Dental & Laboratory Supplies','1','2021-08-20 05:35:15',NULL,NULL,1),(3,'Fuel, Oil & Lubricants Expenses','1','2021-08-20 05:35:15',NULL,NULL,1),(4,'Other Supplies Expenses','1','2021-08-20 05:35:15',NULL,NULL,1),(5,'Telephone Expenses - Mobile','1','2021-08-20 05:35:15',NULL,NULL,1),(6,'Advertising Expenses (including Promotion of Tourism)','1','2021-08-20 05:35:15',NULL,NULL,1),(7,'Representation Expenses','1','2021-08-20 05:35:15',NULL,NULL,1),(8,'Subscription Expenses','1','2021-08-20 05:35:15',NULL,NULL,1),(9,'Chemical and Filtering Supplies Expenses','1','2021-08-20 05:35:15',NULL,NULL,1),(10,'Repair and Maintenance - Plumbing Equipments','1','2021-08-20 05:35:15',NULL,NULL,1),(11,'Advertising/Publication','1','2021-08-20 05:35:15',NULL,NULL,1),(12,'Repairs and Maintenance - Office Buildings','1','2021-08-20 05:35:15',NULL,NULL,1),(13,'Repair and Maintenance - Buildings & Other Structures (Public Market)','1','2021-08-20 05:35:15',NULL,NULL,1),(14,'Repair and Maintenance - Machinery & Equipment','1','2021-08-20 05:35:15',NULL,NULL,1),(15,'Repair and Maintenance - IT Equipment & Software','1','2021-08-20 05:35:15',NULL,NULL,1),(16,'Repair and Maintenance - Communication Equipment','1','2021-08-20 05:35:15',NULL,NULL,1),(17,'Repair and Maintenance - Construction & Heavy Equipment','1','2021-08-20 05:35:15',NULL,NULL,1),(18,'Repair and Maintenance - Motor Vehicles','1','2021-08-20 05:35:15',NULL,NULL,1),(19,'Office Equipment','1','2021-08-20 05:35:15',NULL,NULL,1),(20,'Information & Communication Technology Equipment','1','2021-08-20 05:35:15',NULL,NULL,1);
/*!40000 ALTER TABLE `object_expenditures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `permission_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdby` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datecreated` datetime DEFAULT NULL,
  `updatedby` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateupdated` datetime DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'sidebarDashboard','Dashboard','1','2021-08-20 05:35:15',NULL,NULL,1),(2,'sidebarMyProcurement','My Procurement','1','2021-08-20 05:35:15',NULL,NULL,1),(3,'sidebarManageProcurement','Manage Procurement','1','2021-08-20 05:35:15',NULL,NULL,1),(4,'sidebarReports','Reports','1','2021-08-20 05:35:15',NULL,NULL,1),(5,'sidebarSetup','Setup','1','2021-08-20 05:35:15',NULL,NULL,1),(6,'sidebarDepartments','Manage Departments','1','2021-08-20 05:35:15',NULL,NULL,1),(7,'sidebarItems','Manage Items','1','2021-08-20 05:35:15',NULL,NULL,1),(8,'sidebarObjectExpenditures','Manage Object of Expenditures','1','2021-08-20 05:35:15',NULL,NULL,1),(9,'sidebarCategories','Manage Categories','1','2021-08-20 05:35:15',NULL,NULL,1),(10,'sidebarUnits','ManageUnits','1','2021-08-20 05:35:15',NULL,NULL,1),(11,'sidebarSettings','Settings','1','2021-08-20 05:35:15',NULL,NULL,1),(12,'sidebarRoles','Manage Roles','1','2021-08-20 05:35:15',NULL,NULL,1),(13,'sidebarAccounts','Manage User Accounts','1','2021-08-20 05:35:15',NULL,NULL,1),(14,'sidebarSystemSettings','Manage System Settings','1','2021-08-20 05:35:15',NULL,NULL,1),(15,'pagePermission','Manage Permission','1','2021-08-20 00:00:00',NULL,NULL,1);
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `procurement_info`
--

DROP TABLE IF EXISTS `procurement_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `procurement_info` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `department` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `createdby` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datecreated` datetime DEFAULT NULL,
  `updatedby` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateupdated` datetime DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `procurement_info`
--

LOCK TABLES `procurement_info` WRITE;
/*!40000 ALTER TABLE `procurement_info` DISABLE KEYS */;
INSERT INTO `procurement_info` VALUES (1,18,2022,'3','2021-08-21 07:02:02',NULL,NULL,1),(2,19,2022,'6','2021-08-21 07:03:31',NULL,NULL,1),(3,22,2022,'7','2021-08-21 07:04:06',NULL,NULL,1),(4,21,2022,'8','2021-08-21 07:06:10',NULL,NULL,1),(5,23,2022,'9','2021-08-21 08:27:02',NULL,NULL,1),(6,6,2022,'2','2021-08-22 09:05:07',NULL,NULL,1),(7,1,2022,'1','2021-09-21 09:38:28',NULL,NULL,1);
/*!40000 ALTER TABLE `procurement_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `procurement_items`
--

DROP TABLE IF EXISTS `procurement_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `procurement_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `procurement_id` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  `itemname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `mode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `january` int(11) DEFAULT NULL,
  `february` int(11) DEFAULT NULL,
  `march` int(11) DEFAULT NULL,
  `april` int(11) DEFAULT NULL,
  `may` int(11) DEFAULT NULL,
  `june` int(11) DEFAULT NULL,
  `july` int(11) DEFAULT NULL,
  `august` int(11) DEFAULT NULL,
  `september` int(11) DEFAULT NULL,
  `october` int(11) DEFAULT NULL,
  `november` int(11) DEFAULT NULL,
  `december` int(11) DEFAULT NULL,
  `addedby` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateadded` datetime DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `procurement_items`
--

LOCK TABLES `procurement_items` WRITE;
/*!40000 ALTER TABLE `procurement_items` DISABLE KEYS */;
INSERT INTO `procurement_items` VALUES (1,1,2,'Ballpen (Black)',4,150,'Shopping',1,0,0,0,0,0,1,0,0,0,0,0,'3','2021-08-21 07:03:07',0),(2,2,3,'Bond Paper (Long)',6,450,'Shopping',1,0,0,0,0,0,1,0,0,0,0,0,'6','2021-08-21 07:03:31',1),(3,3,4,'Bond Paper (Short)',4,430,'Shopping',1,0,0,0,0,0,1,0,0,0,0,0,'7','2021-08-21 07:04:06',1),(4,4,2,'Ballpen (Black)',4,150,'Shopping',1,0,0,0,0,0,1,0,0,0,0,0,'8','2021-08-21 07:08:53',1),(5,5,5,'Ballpen (Black)',10,200,'Shopping',1,0,0,0,0,0,1,0,0,0,0,0,'9','2021-08-21 08:27:02',1),(6,1,6,'Computer Set',30,35000,'Public Bidding',0,0,0,0,0,0,0,1,0,0,0,0,'1','2021-08-22 03:57:44',0),(7,1,7,'Whiteboard Marker',5,35,'Shopping',1,0,0,0,0,0,1,0,0,0,0,0,'1','2021-08-22 04:05:22',1),(8,6,5,'Ballpen (Black)',5,200,'Shopping',1,0,0,0,0,0,1,0,0,0,0,0,'2','2021-08-22 09:05:07',1),(9,1,3,'Bond Paper (Long)',15,450,'Shopping',1,0,0,0,0,0,1,0,0,0,0,0,'1','2021-08-25 08:00:38',1),(10,1,4,'Bond Paper (Short)',15,430,'Shopping',1,0,0,0,0,0,1,0,0,0,0,0,'1','2021-08-25 08:10:21',1),(11,7,8,'Computer Keyboard',4,350,'Shopping',1,0,0,0,0,0,1,0,0,0,0,0,'1','2021-09-21 09:38:28',1);
/*!40000 ALTER TABLE `procurement_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `refregion`
--

DROP TABLE IF EXISTS `refregion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `refregion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `psgcCode` varchar(255) DEFAULT NULL,
  `regDesc` text DEFAULT NULL,
  `regCode` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `refregion`
--

LOCK TABLES `refregion` WRITE;
/*!40000 ALTER TABLE `refregion` DISABLE KEYS */;
/*!40000 ALTER TABLE `refregion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reports`
--

DROP TABLE IF EXISTS `reports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reports` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reports`
--

LOCK TABLES `reports` WRITE;
/*!40000 ALTER TABLE `reports` DISABLE KEYS */;
/*!40000 ALTER TABLE `reports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_permissions`
--

DROP TABLE IF EXISTS `role_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `createdby` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datecreated` datetime DEFAULT NULL,
  `updatedby` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateupdated` datetime DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_permissions`
--

LOCK TABLES `role_permissions` WRITE;
/*!40000 ALTER TABLE `role_permissions` DISABLE KEYS */;
INSERT INTO `role_permissions` VALUES (1,1,1,'1','2021-08-20 05:35:15',NULL,NULL,1),(2,1,2,'1','2021-08-20 05:35:15',NULL,NULL,1),(3,1,3,'1','2021-08-20 05:35:15',NULL,NULL,1),(4,1,4,'1','2021-08-20 05:35:15',NULL,NULL,1),(5,1,5,'1','2021-08-20 05:35:15',NULL,NULL,1),(6,1,6,'1','2021-08-20 05:35:15',NULL,NULL,1),(7,1,7,'1','2021-08-20 05:35:15',NULL,NULL,1),(8,1,8,'1','2021-08-20 05:35:15',NULL,NULL,1),(9,1,9,'1','2021-08-20 05:35:15',NULL,NULL,1),(10,1,10,'1','2021-08-20 05:35:15',NULL,NULL,1),(11,1,11,'1','2021-08-20 05:35:15',NULL,NULL,1),(12,1,12,'1','2021-08-20 05:35:15',NULL,NULL,1),(13,1,13,'1','2021-08-20 05:35:15',NULL,NULL,1),(14,1,14,'1','2021-08-20 05:35:15',NULL,NULL,1),(15,1,15,'1','2021-08-20 05:35:15',NULL,NULL,1),(16,2,1,'1','2021-08-20 07:30:49',NULL,NULL,1),(17,2,3,'1','2021-08-20 07:30:49',NULL,NULL,1),(18,2,4,'1','2021-08-20 07:30:49',NULL,NULL,1),(19,2,5,'1','2021-08-20 07:30:49',NULL,NULL,1),(20,2,6,'1','2021-08-20 07:48:19',NULL,NULL,1),(21,2,7,'1','2021-08-20 07:48:19',NULL,NULL,1),(22,2,8,'1','2021-08-20 07:48:19',NULL,NULL,1),(23,2,9,'1','2021-08-20 07:48:19',NULL,NULL,1),(24,2,10,'1','2021-08-20 07:48:19',NULL,NULL,1),(25,3,2,'1','2021-08-20 07:50:26',NULL,NULL,1),(26,3,4,'1','2021-08-20 07:50:26',NULL,NULL,1),(27,4,2,'1','2021-08-21 06:58:54',NULL,NULL,1),(28,4,4,'1','2021-08-21 06:58:54',NULL,NULL,1),(29,2,2,'1','2021-08-22 09:03:45',NULL,NULL,1),(30,2,14,'1','2021-08-22 09:13:26',NULL,NULL,1),(31,2,11,'1','2021-08-22 09:13:38',NULL,NULL,1);
/*!40000 ALTER TABLE `role_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdby` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datecreated` datetime DEFAULT NULL,
  `updatedby` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateupdated` datetime DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'System Administrator','1','2021-08-20 05:35:15',NULL,NULL,1),(2,'Budget Officer','1','2021-08-20 07:10:15',NULL,NULL,1),(3,'Department Head','1','2021-08-20 07:48:34',NULL,NULL,1),(4,'Sub-Office Head / Office-in-Charge','1','2021-08-21 06:58:48',NULL,NULL,1);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `setting_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `setting_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'Application Name','Project Procurement Management System',1),(2,'Procurement Year','2022',1),(3,'Procurement Status','0',1);
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `std_users`
--

DROP TABLE IF EXISTS `std_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `std_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(15) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `std_users`
--

LOCK TABLES `std_users` WRITE;
/*!40000 ALTER TABLE `std_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `std_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `studs`
--

DROP TABLE IF EXISTS `studs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `studs` (
  `studid` varchar(255) DEFAULT NULL,
  `id` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `studs`
--

LOCK TABLES `studs` WRITE;
/*!40000 ALTER TABLE `studs` DISABLE KEYS */;
/*!40000 ALTER TABLE `studs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_chart_account`
--

DROP TABLE IF EXISTS `sys_chart_account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_chart_account` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `accntcode` varchar(255) DEFAULT NULL,
  `accntname` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`sysid`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_chart_account`
--

LOCK TABLES `sys_chart_account` WRITE;
/*!40000 ALTER TABLE `sys_chart_account` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_chart_account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_data_brgy`
--

DROP TABLE IF EXISTS `sys_data_brgy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_data_brgy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brgyCode` varchar(255) DEFAULT NULL,
  `brgyDesc` text DEFAULT NULL,
  `regCode` varchar(255) DEFAULT NULL,
  `provCode` varchar(255) DEFAULT NULL,
  `citymunCode` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=42030 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_data_brgy`
--

LOCK TABLES `sys_data_brgy` WRITE;
/*!40000 ALTER TABLE `sys_data_brgy` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_data_brgy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_data_citizenship`
--

DROP TABLE IF EXISTS `sys_data_citizenship`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_data_citizenship` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `countrycode` varchar(255) DEFAULT NULL,
  `countrydesc` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`sysid`),
  UNIQUE KEY `countrycode` (`countrycode`)
) ENGINE=MyISAM AUTO_INCREMENT=194 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_data_citizenship`
--

LOCK TABLES `sys_data_citizenship` WRITE;
/*!40000 ALTER TABLE `sys_data_citizenship` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_data_citizenship` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_data_citymun`
--

DROP TABLE IF EXISTS `sys_data_citymun`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_data_citymun` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `psgcCode` varchar(255) DEFAULT NULL,
  `citymunDesc` text DEFAULT NULL,
  `regDesc` varchar(255) DEFAULT NULL,
  `provCode` varchar(255) DEFAULT NULL,
  `citymunCode` varchar(255) DEFAULT NULL,
  `zipcode` int(11) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1650 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_data_citymun`
--

LOCK TABLES `sys_data_citymun` WRITE;
/*!40000 ALTER TABLE `sys_data_citymun` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_data_citymun` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_data_countries`
--

DROP TABLE IF EXISTS `sys_data_countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_data_countries` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `countryname` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`sysid`)
) ENGINE=MyISAM AUTO_INCREMENT=253 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_data_countries`
--

LOCK TABLES `sys_data_countries` WRITE;
/*!40000 ALTER TABLE `sys_data_countries` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_data_countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_data_province`
--

DROP TABLE IF EXISTS `sys_data_province`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_data_province` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `psgcCode` varchar(255) DEFAULT NULL,
  `provDesc` text DEFAULT NULL,
  `regCode` varchar(255) DEFAULT NULL,
  `provCode` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=89 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_data_province`
--

LOCK TABLES `sys_data_province` WRITE;
/*!40000 ALTER TABLE `sys_data_province` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_data_province` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_data_region`
--

DROP TABLE IF EXISTS `sys_data_region`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_data_region` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `psgcCode` varchar(255) DEFAULT NULL,
  `regDesc` text DEFAULT NULL,
  `regCode` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_data_region`
--

LOCK TABLES `sys_data_region` WRITE;
/*!40000 ALTER TABLE `sys_data_region` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_data_region` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_main_nav`
--

DROP TABLE IF EXISTS `sys_main_nav`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_main_nav` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `descriptions` varchar(100) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`sysid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_main_nav`
--

LOCK TABLES `sys_main_nav` WRITE;
/*!40000 ALTER TABLE `sys_main_nav` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_main_nav` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_main_pages`
--

DROP TABLE IF EXISTS `sys_main_pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_main_pages` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `descriptions` varchar(100) DEFAULT NULL,
  `navsysid` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`sysid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_main_pages`
--

LOCK TABLES `sys_main_pages` WRITE;
/*!40000 ALTER TABLE `sys_main_pages` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_main_pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_main_pages_data`
--

DROP TABLE IF EXISTS `sys_main_pages_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_main_pages_data` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `pagedata` varchar(100) DEFAULT NULL,
  `pageid` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`sysid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_main_pages_data`
--

LOCK TABLES `sys_main_pages_data` WRITE;
/*!40000 ALTER TABLE `sys_main_pages_data` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_main_pages_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_settings`
--

DROP TABLE IF EXISTS `sys_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_settings` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `descriptions` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`sysid`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_settings`
--

LOCK TABLES `sys_settings` WRITE;
/*!40000 ALTER TABLE `sys_settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_signatories`
--

DROP TABLE IF EXISTS `sys_signatories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_signatories` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(16) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`sysid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_signatories`
--

LOCK TABLES `sys_signatories` WRITE;
/*!40000 ALTER TABLE `sys_signatories` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_signatories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_tf_setting`
--

DROP TABLE IF EXISTS `sys_tf_setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_tf_setting` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `year_from` year(4) DEFAULT NULL,
  `year_to` year(4) DEFAULT NULL,
  `per_unit_amount` double DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`sysid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_tf_setting`
--

LOCK TABLES `sys_tf_setting` WRITE;
/*!40000 ALTER TABLE `sys_tf_setting` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_tf_setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_users`
--

DROP TABLE IF EXISTS `sys_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_users` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(70) NOT NULL,
  `email` varchar(70) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) NOT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `location` int(11) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `unit` int(11) DEFAULT NULL,
  `perunit` decimal(10,2) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `telephone` varchar(100) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `suffix` varchar(50) DEFAULT NULL,
  `highest_educ_qual` varchar(255) DEFAULT NULL,
  `salary` decimal(10,2) DEFAULT NULL,
  `dept` int(11) DEFAULT NULL,
  `sex` varchar(50) DEFAULT NULL,
  `civil_status` varchar(50) DEFAULT NULL,
  `height` varchar(50) DEFAULT NULL,
  `blood_type` varchar(20) DEFAULT NULL,
  `pagibig_id_no` varchar(50) DEFAULT NULL,
  `tin_no` varchar(50) DEFAULT NULL,
  `philhealth_no` varchar(50) DEFAULT NULL,
  `lastactive` datetime DEFAULT NULL,
  `session_id` varchar(45) DEFAULT NULL,
  `date_approved` datetime DEFAULT NULL,
  `approval_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`sysid`)
) ENGINE=MyISAM AUTO_INCREMENT=615 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_users`
--

LOCK TABLES `sys_users` WRITE;
/*!40000 ALTER TABLE `sys_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_users_log`
--

DROP TABLE IF EXISTS `sys_users_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_users_log` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL,
  `userpc` varchar(255) DEFAULT NULL,
  `userip` varchar(255) DEFAULT NULL,
  `logintime` datetime DEFAULT NULL,
  `logouttime` datetime DEFAULT NULL,
  PRIMARY KEY (`sysid`)
) ENGINE=MyISAM AUTO_INCREMENT=190290 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_users_log`
--

LOCK TABLES `sys_users_log` WRITE;
/*!40000 ALTER TABLE `sys_users_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_users_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_users_messages`
--

DROP TABLE IF EXISTS `sys_users_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_users_messages` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `number` varchar(30) NOT NULL,
  `email` varchar(70) DEFAULT NULL,
  `fromname` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`sysid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_users_messages`
--

LOCK TABLES `sys_users_messages` WRITE;
/*!40000 ALTER TABLE `sys_users_messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_users_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_users_nav_access`
--

DROP TABLE IF EXISTS `sys_users_nav_access`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_users_nav_access` (
  `userrole` int(11) DEFAULT NULL,
  `navsysid` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_users_nav_access`
--

LOCK TABLES `sys_users_nav_access` WRITE;
/*!40000 ALTER TABLE `sys_users_nav_access` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_users_nav_access` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_users_page_access`
--

DROP TABLE IF EXISTS `sys_users_page_access`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_users_page_access` (
  `userrole` int(11) DEFAULT NULL,
  `pagesysid` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_users_page_access`
--

LOCK TABLES `sys_users_page_access` WRITE;
/*!40000 ALTER TABLE `sys_users_page_access` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_users_page_access` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_users_role`
--

DROP TABLE IF EXISTS `sys_users_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_users_role` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `role_color` varchar(255) DEFAULT NULL,
  `role_name` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`sysid`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_users_role`
--

LOCK TABLES `sys_users_role` WRITE;
/*!40000 ALTER TABLE `sys_users_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_users_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_users_role_accesscategory`
--

DROP TABLE IF EXISTS `sys_users_role_accesscategory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_users_role_accesscategory` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`sysid`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_users_role_accesscategory`
--

LOCK TABLES `sys_users_role_accesscategory` WRITE;
/*!40000 ALTER TABLE `sys_users_role_accesscategory` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_users_role_accesscategory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_users_role_accesscode`
--

DROP TABLE IF EXISTS `sys_users_role_accesscode`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_users_role_accesscode` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `accesscode` varchar(45) DEFAULT NULL,
  `category` varchar(45) DEFAULT NULL,
  `description` varchar(90) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`sysid`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_users_role_accesscode`
--

LOCK TABLES `sys_users_role_accesscode` WRITE;
/*!40000 ALTER TABLE `sys_users_role_accesscode` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_users_role_accesscode` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_users_role_accessusers`
--

DROP TABLE IF EXISTS `sys_users_role_accessusers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_users_role_accessusers` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `accesscodeid` int(11) DEFAULT NULL,
  `roleid` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`sysid`)
) ENGINE=InnoDB AUTO_INCREMENT=725 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_users_role_accessusers`
--

LOCK TABLES `sys_users_role_accessusers` WRITE;
/*!40000 ALTER TABLE `sys_users_role_accessusers` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_users_role_accessusers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_users_sys_color`
--

DROP TABLE IF EXISTS `sys_users_sys_color`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_users_sys_color` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`sysid`)
) ENGINE=MyISAM AUTO_INCREMENT=3947 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_users_sys_color`
--

LOCK TABLES `sys_users_sys_color` WRITE;
/*!40000 ALTER TABLE `sys_users_sys_color` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_users_sys_color` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_announcement_viewers`
--

DROP TABLE IF EXISTS `tbl_announcement_viewers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_announcement_viewers` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `postid` int(11) NOT NULL,
  `roleid` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`sysid`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_announcement_viewers`
--

LOCK TABLES `tbl_announcement_viewers` WRITE;
/*!40000 ALTER TABLE `tbl_announcement_viewers` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_announcement_viewers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_announcements`
--

DROP TABLE IF EXISTS `tbl_announcements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_announcements` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) NOT NULL,
  `content` varchar(500) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `sy_start` int(11) DEFAULT NULL,
  `sy_end` int(11) DEFAULT NULL,
  `sem` int(11) DEFAULT NULL,
  `posted_by` int(11) DEFAULT NULL,
  `date_posted` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`sysid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_announcements`
--

LOCK TABLES `tbl_announcements` WRITE;
/*!40000 ALTER TABLE `tbl_announcements` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_announcements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_course`
--

DROP TABLE IF EXISTS `tbl_course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_course` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `descriptions` varchar(100) NOT NULL,
  `coursedept` int(11) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`sysid`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_course`
--

LOCK TABLES `tbl_course` WRITE;
/*!40000 ALTER TABLE `tbl_course` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_course_curriculum`
--

DROP TABLE IF EXISTS `tbl_course_curriculum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_course_curriculum` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `curriculum_year` year(4) NOT NULL,
  `courseid` int(11) NOT NULL,
  `course_level` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `subjid` int(11) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`sysid`)
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_course_curriculum`
--

LOCK TABLES `tbl_course_curriculum` WRITE;
/*!40000 ALTER TABLE `tbl_course_curriculum` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_course_curriculum` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_course_prospectus`
--

DROP TABLE IF EXISTS `tbl_course_prospectus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_course_prospectus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `cur_num` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_course_prospectus`
--

LOCK TABLES `tbl_course_prospectus` WRITE;
/*!40000 ALTER TABLE `tbl_course_prospectus` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_course_prospectus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_course_subject_group`
--

DROP TABLE IF EXISTS `tbl_course_subject_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_course_subject_group` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `courseid` int(11) NOT NULL,
  `subjectgroupid` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`sysid`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_course_subject_group`
--

LOCK TABLES `tbl_course_subject_group` WRITE;
/*!40000 ALTER TABLE `tbl_course_subject_group` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_course_subject_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_department_head`
--

DROP TABLE IF EXISTS `tbl_department_head`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_department_head` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `dept_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`sysid`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_department_head`
--

LOCK TABLES `tbl_department_head` WRITE;
/*!40000 ALTER TABLE `tbl_department_head` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_department_head` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_departments`
--

DROP TABLE IF EXISTS `tbl_departments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_departments` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `descriptions` varchar(100) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`sysid`),
  UNIQUE KEY `code_unique` (`code`,`descriptions`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_departments`
--

LOCK TABLES `tbl_departments` WRITE;
/*!40000 ALTER TABLE `tbl_departments` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_departments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_discounts`
--

DROP TABLE IF EXISTS `tbl_discounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_discounts` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `percent` double DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`sysid`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_discounts`
--

LOCK TABLES `tbl_discounts` WRITE;
/*!40000 ALTER TABLE `tbl_discounts` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_discounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_fhe_payment`
--

DROP TABLE IF EXISTS `tbl_fhe_payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_fhe_payment` (
  `sysid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `receipt_id` varchar(255) DEFAULT NULL,
  `receipt_num` varchar(255) DEFAULT NULL,
  `check_no` varchar(50) DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `remaining_amount` double DEFAULT NULL,
  `ay_start` int(11) DEFAULT NULL,
  `ay_end` int(11) DEFAULT NULL,
  `sem` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`sysid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_fhe_payment`
--

LOCK TABLES `tbl_fhe_payment` WRITE;
/*!40000 ALTER TABLE `tbl_fhe_payment` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_fhe_payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_payment_receipt_items`
--

DROP TABLE IF EXISTS `tbl_payment_receipt_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_payment_receipt_items` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `receipt_id` int(11) DEFAULT NULL,
  `item_id` varchar(255) DEFAULT NULL,
  `acc_code` varchar(12) DEFAULT NULL,
  `trans_from_acc` varchar(12) DEFAULT NULL,
  `paid_amnt` double DEFAULT NULL,
  `sy_start` year(4) DEFAULT NULL,
  `sy_end` year(4) DEFAULT NULL,
  `sem` int(11) DEFAULT NULL,
  `sy_start_from` year(4) DEFAULT NULL,
  `sy_end_from` year(4) DEFAULT NULL,
  `sem_from` int(11) DEFAULT NULL,
  `payment_type` int(11) DEFAULT 0 COMMENT '0: normal payment, 1: forwarded, 2: refunded, ',
  `change` varchar(12) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`sysid`)
) ENGINE=InnoDB AUTO_INCREMENT=506289 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_payment_receipt_items`
--

LOCK TABLES `tbl_payment_receipt_items` WRITE;
/*!40000 ALTER TABLE `tbl_payment_receipt_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_payment_receipt_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_payment_receipts`
--

DROP TABLE IF EXISTS `tbl_payment_receipts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_payment_receipts` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `receipt_id` varchar(64) CHARACTER SET latin1 DEFAULT NULL,
  `receipt_num` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `payor_id` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `payor_name` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `received_date` datetime DEFAULT NULL,
  `sy_start` year(4) DEFAULT NULL,
  `sy_end` year(4) DEFAULT NULL,
  `sem` int(11) DEFAULT NULL,
  `sy_start_from` year(4) DEFAULT NULL,
  `sy_end_from` year(4) DEFAULT NULL,
  `sem_from` int(11) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `payment_type` int(11) DEFAULT 0 COMMENT '0: normal payment, 1: forwarded, 2: refunded, ',
  `added_by` int(11) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `voided` int(11) DEFAULT 0,
  `remarks` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`sysid`)
) ENGINE=InnoDB AUTO_INCREMENT=141445 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_payment_receipts`
--

LOCK TABLES `tbl_payment_receipts` WRITE;
/*!40000 ALTER TABLE `tbl_payment_receipts` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_payment_receipts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_privileges`
--

DROP TABLE IF EXISTS `tbl_privileges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_privileges` (
  `sysid` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `disc_code` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`sysid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_privileges`
--

LOCK TABLES `tbl_privileges` WRITE;
/*!40000 ALTER TABLE `tbl_privileges` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_privileges` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_requirement_template_codes`
--

DROP TABLE IF EXISTS `tbl_requirement_template_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_requirement_template_codes` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `template` int(11) DEFAULT NULL,
  `requirement` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`sysid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_requirement_template_codes`
--

LOCK TABLES `tbl_requirement_template_codes` WRITE;
/*!40000 ALTER TABLE `tbl_requirement_template_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_requirement_template_codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_requirement_templates`
--

DROP TABLE IF EXISTS `tbl_requirement_templates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_requirement_templates` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`sysid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_requirement_templates`
--

LOCK TABLES `tbl_requirement_templates` WRITE;
/*!40000 ALTER TABLE `tbl_requirement_templates` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_requirement_templates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_requirement_type`
--

DROP TABLE IF EXISTS `tbl_requirement_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_requirement_type` (
  `sysid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`sysid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_requirement_type`
--

LOCK TABLES `tbl_requirement_type` WRITE;
/*!40000 ALTER TABLE `tbl_requirement_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_requirement_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_requirements`
--

DROP TABLE IF EXISTS `tbl_requirements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_requirements` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(75) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `enrollment` int(11) DEFAULT 0,
  `graduation` int(11) DEFAULT 0,
  `transcript` int(11) DEFAULT 0,
  `updated_by` int(11) DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`sysid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_requirements`
--

LOCK TABLES `tbl_requirements` WRITE;
/*!40000 ALTER TABLE `tbl_requirements` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_requirements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_rooms`
--

DROP TABLE IF EXISTS `tbl_rooms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_rooms` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `descriptions` varchar(100) DEFAULT NULL,
  `department` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`sysid`)
) ENGINE=MyISAM AUTO_INCREMENT=153 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_rooms`
--

LOCK TABLES `tbl_rooms` WRITE;
/*!40000 ALTER TABLE `tbl_rooms` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_rooms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_schedule_main`
--

DROP TABLE IF EXISTS `tbl_schedule_main`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_schedule_main` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `subsysid` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`sysid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_schedule_main`
--

LOCK TABLES `tbl_schedule_main` WRITE;
/*!40000 ALTER TABLE `tbl_schedule_main` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_schedule_main` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_schol_payments`
--

DROP TABLE IF EXISTS `tbl_schol_payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_schol_payments` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `schol_id` int(11) DEFAULT NULL,
  `stud_id` int(11) DEFAULT NULL,
  `receipt_id` int(11) DEFAULT NULL,
  `sy_start` year(4) DEFAULT NULL,
  `sy_end` year(4) DEFAULT NULL,
  `sem` int(11) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`sysid`),
  KEY `SCHOL_FK` (`schol_id`),
  KEY `RECEIPT_FK` (`receipt_id`),
  CONSTRAINT `RECEIPT_FK` FOREIGN KEY (`receipt_id`) REFERENCES `tbl_payment_receipts` (`sysid`),
  CONSTRAINT `SCHOL_FK` FOREIGN KEY (`schol_id`) REFERENCES `tbl_scholarships` (`sysid`)
) ENGINE=InnoDB AUTO_INCREMENT=1876 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_schol_payments`
--

LOCK TABLES `tbl_schol_payments` WRITE;
/*!40000 ALTER TABLE `tbl_schol_payments` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_schol_payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_schol_stud_siblings`
--

DROP TABLE IF EXISTS `tbl_schol_stud_siblings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_schol_stud_siblings` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `schol_id` int(11) DEFAULT NULL,
  `stud_id` int(11) DEFAULT NULL,
  `sy_start` int(11) DEFAULT NULL,
  `sy_end` int(11) DEFAULT NULL,
  `sem` int(11) DEFAULT NULL,
  `sibling_stud_id` int(11) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`sysid`),
  KEY `SCHOL_ID_FK` (`schol_id`),
  KEY `STUD_ID_FK` (`stud_id`),
  KEY `SIBLING_ID_FK` (`sibling_stud_id`),
  CONSTRAINT `SCHOL_ID_FK` FOREIGN KEY (`schol_id`) REFERENCES `tbl_scholarships` (`sysid`),
  CONSTRAINT `SIBLING_ID_FK` FOREIGN KEY (`sibling_stud_id`) REFERENCES `tbl_students` (`sysid`),
  CONSTRAINT `STUD_ID_FK` FOREIGN KEY (`stud_id`) REFERENCES `tbl_students` (`sysid`)
) ENGINE=InnoDB AUTO_INCREMENT=271 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_schol_stud_siblings`
--

LOCK TABLES `tbl_schol_stud_siblings` WRITE;
/*!40000 ALTER TABLE `tbl_schol_stud_siblings` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_schol_stud_siblings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_scholarships`
--

DROP TABLE IF EXISTS `tbl_scholarships`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_scholarships` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `category` int(11) DEFAULT NULL COMMENT '1: academic, 2: non-academic',
  `max_units` int(11) DEFAULT NULL COMMENT 'number of units applied for deductions',
  `disc_id` int(11) DEFAULT NULL,
  `bypass_promissory` int(11) DEFAULT 0 COMMENT 'Determine if Admission slip requires promissory note',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`sysid`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_scholarships`
--

LOCK TABLES `tbl_scholarships` WRITE;
/*!40000 ALTER TABLE `tbl_scholarships` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_scholarships` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_school_student_subjects`
--

DROP TABLE IF EXISTS `tbl_school_student_subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_school_student_subjects` (
  `sysid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `studid` int(11) DEFAULT NULL,
  `subjid` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `sem` int(11) DEFAULT NULL,
  `grade` varchar(11) DEFAULT NULL,
  `reex` varchar(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`sysid`)
) ENGINE=InnoDB AUTO_INCREMENT=3341 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_school_student_subjects`
--

LOCK TABLES `tbl_school_student_subjects` WRITE;
/*!40000 ALTER TABLE `tbl_school_student_subjects` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_school_student_subjects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_school_subjects`
--

DROP TABLE IF EXISTS `tbl_school_subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_school_subjects` (
  `sysid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `school` int(11) DEFAULT NULL,
  `code` varchar(45) DEFAULT NULL,
  `description` varchar(90) DEFAULT NULL,
  `units` float(5,1) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`sysid`)
) ENGINE=InnoDB AUTO_INCREMENT=2487 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_school_subjects`
--

LOCK TABLES `tbl_school_subjects` WRITE;
/*!40000 ALTER TABLE `tbl_school_subjects` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_school_subjects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_schools`
--

DROP TABLE IF EXISTS `tbl_schools`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_schools` (
  `sysid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(45) DEFAULT NULL,
  `name` varchar(180) DEFAULT NULL,
  `address` varchar(450) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`sysid`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_schools`
--

LOCK TABLES `tbl_schools` WRITE;
/*!40000 ALTER TABLE `tbl_schools` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_schools` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_stud_balance_addons`
--

DROP TABLE IF EXISTS `tbl_stud_balance_addons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_stud_balance_addons` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `stud_id` int(11) DEFAULT NULL,
  `sy_start` year(4) DEFAULT NULL,
  `sy_end` year(4) DEFAULT NULL,
  `sem` int(11) DEFAULT NULL,
  `acct` int(11) DEFAULT NULL,
  `amnt` double DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`sysid`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_stud_balance_addons`
--

LOCK TABLES `tbl_stud_balance_addons` WRITE;
/*!40000 ALTER TABLE `tbl_stud_balance_addons` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_stud_balance_addons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_stud_balances`
--

DROP TABLE IF EXISTS `tbl_stud_balances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_stud_balances` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `stud_id` int(11) DEFAULT NULL,
  `sy_start` year(4) DEFAULT NULL,
  `sy_end` year(4) DEFAULT NULL,
  `sem` int(11) DEFAULT NULL,
  `sy_start_from` year(4) DEFAULT NULL,
  `sy_end_from` year(4) DEFAULT NULL,
  `sem_from` int(11) DEFAULT NULL,
  `acct` int(11) DEFAULT NULL,
  `amnt` double DEFAULT NULL,
  `edit_amnt` double DEFAULT NULL,
  `forwarded` int(11) NOT NULL DEFAULT 0,
  `mode` int(11) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`sysid`)
) ENGINE=InnoDB AUTO_INCREMENT=814694 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_stud_balances`
--

LOCK TABLES `tbl_stud_balances` WRITE;
/*!40000 ALTER TABLE `tbl_stud_balances` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_stud_balances` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_stud_discounts`
--

DROP TABLE IF EXISTS `tbl_stud_discounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_stud_discounts` (
  `discountid` int(11) NOT NULL,
  `studid` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_stud_discounts`
--

LOCK TABLES `tbl_stud_discounts` WRITE;
/*!40000 ALTER TABLE `tbl_stud_discounts` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_stud_discounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_stud_discounts_main`
--

DROP TABLE IF EXISTS `tbl_stud_discounts_main`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_stud_discounts_main` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `descriptions` varchar(255) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`sysid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_stud_discounts_main`
--

LOCK TABLES `tbl_stud_discounts_main` WRITE;
/*!40000 ALTER TABLE `tbl_stud_discounts_main` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_stud_discounts_main` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_stud_enrollment_blocking`
--

DROP TABLE IF EXISTS `tbl_stud_enrollment_blocking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_stud_enrollment_blocking` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `studid` int(11) NOT NULL,
  `startyear` int(11) NOT NULL,
  `endyear` int(11) NOT NULL,
  `sem` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`sysid`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_stud_enrollment_blocking`
--

LOCK TABLES `tbl_stud_enrollment_blocking` WRITE;
/*!40000 ALTER TABLE `tbl_stud_enrollment_blocking` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_stud_enrollment_blocking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_stud_misc`
--

DROP TABLE IF EXISTS `tbl_stud_misc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_stud_misc` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `courseid` int(11) NOT NULL,
  `acctcode` int(11) DEFAULT NULL,
  `misccode` varchar(255) DEFAULT NULL,
  `miscdesc` varchar(255) DEFAULT NULL,
  `miscunit` int(11) DEFAULT 0,
  `misccost` decimal(10,2) DEFAULT NULL,
  `miscpaytype` int(11) DEFAULT NULL,
  `ay_start` int(11) DEFAULT NULL,
  `ay_end` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`sysid`)
) ENGINE=MyISAM AUTO_INCREMENT=1523 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_stud_misc`
--

LOCK TABLES `tbl_stud_misc` WRITE;
/*!40000 ALTER TABLE `tbl_stud_misc` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_stud_misc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_stud_payment_ledger`
--

DROP TABLE IF EXISTS `tbl_stud_payment_ledger`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_stud_payment_ledger` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `studid` int(11) DEFAULT NULL,
  `receipt_id` varchar(64) DEFAULT NULL,
  `OR_num` varchar(32) DEFAULT NULL,
  `receipt_item_id` varchar(64) DEFAULT NULL,
  `receipt_item_code` varchar(32) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `balance` decimal(10,2) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `yearstart` year(4) DEFAULT NULL,
  `yearend` year(4) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `datecreated` datetime DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  PRIMARY KEY (`sysid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_stud_payment_ledger`
--

LOCK TABLES `tbl_stud_payment_ledger` WRITE;
/*!40000 ALTER TABLE `tbl_stud_payment_ledger` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_stud_payment_ledger` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_stud_payment_sum`
--

DROP TABLE IF EXISTS `tbl_stud_payment_sum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_stud_payment_sum` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `studid` int(11) DEFAULT NULL,
  `amountpaid` decimal(10,0) DEFAULT NULL,
  `amountbalance` decimal(10,0) DEFAULT NULL,
  `yearstart` year(4) DEFAULT NULL,
  `yearend` year(4) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `datecreated` datetime DEFAULT NULL,
  PRIMARY KEY (`sysid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_stud_payment_sum`
--

LOCK TABLES `tbl_stud_payment_sum` WRITE;
/*!40000 ALTER TABLE `tbl_stud_payment_sum` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_stud_payment_sum` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_stud_schedule_main`
--

DROP TABLE IF EXISTS `tbl_stud_schedule_main`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_stud_schedule_main` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `yearstart` year(4) DEFAULT NULL,
  `yearend` year(4) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `deptid` int(11) DEFAULT NULL,
  `subjid` int(11) DEFAULT NULL,
  `curval` int(11) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `schedtype` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `remarks` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`sysid`)
) ENGINE=MyISAM AUTO_INCREMENT=13213 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_stud_schedule_main`
--

LOCK TABLES `tbl_stud_schedule_main` WRITE;
/*!40000 ALTER TABLE `tbl_stud_schedule_main` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_stud_schedule_main` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_stud_schedule_time`
--

DROP TABLE IF EXISTS `tbl_stud_schedule_time`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_stud_schedule_time` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `schedmainsysid` int(11) DEFAULT NULL,
  `roomid` int(11) DEFAULT NULL,
  `timestart` varchar(20) DEFAULT NULL,
  `timeend` varchar(20) DEFAULT NULL,
  `schedday` varchar(255) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`sysid`)
) ENGINE=MyISAM AUTO_INCREMENT=76631 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_stud_schedule_time`
--

LOCK TABLES `tbl_stud_schedule_time` WRITE;
/*!40000 ALTER TABLE `tbl_stud_schedule_time` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_stud_schedule_time` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_stud_subjects_passed`
--

DROP TABLE IF EXISTS `tbl_stud_subjects_passed`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_stud_subjects_passed` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `subjid` int(11) DEFAULT NULL,
  `studid` int(11) DEFAULT NULL,
  `schedid` int(11) DEFAULT NULL,
  `courseid` int(11) DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `sem` int(11) DEFAULT NULL,
  `grade` varchar(45) DEFAULT NULL,
  `reex` varchar(45) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`sysid`)
) ENGINE=MyISAM AUTO_INCREMENT=516765 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_stud_subjects_passed`
--

LOCK TABLES `tbl_stud_subjects_passed` WRITE;
/*!40000 ALTER TABLE `tbl_stud_subjects_passed` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_stud_subjects_passed` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_stud_subjects_temp`
--

DROP TABLE IF EXISTS `tbl_stud_subjects_temp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_stud_subjects_temp` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `subjid` int(11) DEFAULT NULL,
  `studid` int(11) DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `sem` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`sysid`),
  UNIQUE KEY `subjid` (`subjid`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_stud_subjects_temp`
--

LOCK TABLES `tbl_stud_subjects_temp` WRITE;
/*!40000 ALTER TABLE `tbl_stud_subjects_temp` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_stud_subjects_temp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_stud_tracker`
--

DROP TABLE IF EXISTS `tbl_stud_tracker`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_stud_tracker` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `studid` varchar(20) NOT NULL,
  `yearstart` int(11) NOT NULL,
  `yearend` int(11) NOT NULL,
  `sem` varchar(1) NOT NULL,
  `courseid` int(11) DEFAULT NULL,
  `yearlevel` int(11) NOT NULL,
  `category` varchar(20) NOT NULL,
  `unifast` int(11) NOT NULL,
  `dategraduated` date DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `positioned` varchar(100) DEFAULT NULL,
  `datestarted` date DEFAULT NULL,
  `createdby` varchar(20) NOT NULL,
  `datecreated` datetime NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22430 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_stud_tracker`
--

LOCK TABLES `tbl_stud_tracker` WRITE;
/*!40000 ALTER TABLE `tbl_stud_tracker` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_stud_tracker` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_student_account`
--

DROP TABLE IF EXISTS `tbl_student_account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_student_account` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `studid` int(11) DEFAULT NULL,
  `sy_start` year(4) DEFAULT NULL,
  `sy_end` year(4) DEFAULT NULL,
  `sem` int(11) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `prelim_amount` double DEFAULT NULL,
  `midterm_amount` double DEFAULT NULL,
  `semi_amount` double DEFAULT NULL,
  `final_amount` double DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`sysid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_student_account`
--

LOCK TABLES `tbl_student_account` WRITE;
/*!40000 ALTER TABLE `tbl_student_account` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_student_account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_student_payments`
--

DROP TABLE IF EXISTS `tbl_student_payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_student_payments` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `stud_id` int(11) DEFAULT NULL,
  `sy_start` year(4) DEFAULT NULL,
  `sy_end` year(4) DEFAULT NULL,
  `sem` int(11) DEFAULT NULL,
  `sy_start_from` year(4) DEFAULT NULL,
  `sy_end_from` year(4) DEFAULT NULL,
  `sem_from` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `term` int(11) DEFAULT NULL,
  `receipt_id` int(11) DEFAULT NULL,
  `payment_type` int(11) DEFAULT 0 COMMENT '0: normal payment, 1: forwarded, 2: refunded, ',
  `details` varchar(255) CHARACTER SET latin1 NOT NULL,
  `added_by` int(11) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`sysid`)
) ENGINE=InnoDB AUTO_INCREMENT=142247 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_student_payments`
--

LOCK TABLES `tbl_student_payments` WRITE;
/*!40000 ALTER TABLE `tbl_student_payments` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_student_payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_student_scholarships`
--

DROP TABLE IF EXISTS `tbl_student_scholarships`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_student_scholarships` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `stud_id` int(11) DEFAULT NULL,
  `scholarship_id` int(11) DEFAULT NULL,
  `sy_start` year(4) DEFAULT NULL,
  `sy_end` year(4) DEFAULT NULL,
  `sem` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`sysid`)
) ENGINE=InnoDB AUTO_INCREMENT=40029 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_student_scholarships`
--

LOCK TABLES `tbl_student_scholarships` WRITE;
/*!40000 ALTER TABLE `tbl_student_scholarships` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_student_scholarships` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_students`
--

DROP TABLE IF EXISTS `tbl_students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_students` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `studid` varchar(100) DEFAULT NULL,
  `lrn` varchar(16) DEFAULT NULL,
  `cur` int(11) DEFAULT 1,
  `number` varchar(30) NOT NULL,
  `email` varchar(70) DEFAULT NULL,
  `fbid` varchar(100) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `middlename` varchar(100) DEFAULT NULL,
  `suffix` varchar(100) DEFAULT NULL,
  `birthright` varchar(100) DEFAULT NULL,
  `addrstreet` varchar(100) DEFAULT NULL,
  `addrbrgy` varchar(100) DEFAULT NULL,
  `addrmonic` varchar(100) DEFAULT NULL,
  `addrcity` varchar(100) DEFAULT NULL,
  `addrstate` int(11) DEFAULT NULL,
  `addrzip` varchar(4) DEFAULT NULL,
  `addrregion` varchar(100) DEFAULT NULL,
  `dswd_house_no` varchar(100) DEFAULT NULL,
  `per_capita_income` decimal(10,2) DEFAULT NULL,
  `member_fourps` smallint(6) DEFAULT NULL,
  `disability` varchar(100) DEFAULT NULL,
  `addrbirthplace` varchar(255) DEFAULT NULL,
  `birth` date DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `sex` varchar(50) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `citizenship` varchar(50) DEFAULT NULL,
  `marital` int(11) DEFAULT NULL,
  `exam_score` double DEFAULT NULL,
  `exam_date` date DEFAULT NULL,
  `enroll` int(11) DEFAULT 0,
  `yearlevel` int(11) DEFAULT 1,
  `category` varchar(50) DEFAULT NULL,
  `height` varchar(10) DEFAULT NULL,
  `weight` varchar(10) DEFAULT NULL,
  `bloodtype` varchar(10) DEFAULT NULL,
  `award_no` varchar(100) DEFAULT NULL,
  `unifast_app_no` varchar(100) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`sysid`),
  KEY `studid` (`studid`)
) ENGINE=InnoDB AUTO_INCREMENT=15228 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_students`
--

LOCK TABLES `tbl_students` WRITE;
/*!40000 ALTER TABLE `tbl_students` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_students_admission_slips`
--

DROP TABLE IF EXISTS `tbl_students_admission_slips`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_students_admission_slips` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `adm_no` varchar(32) CHARACTER SET latin1 DEFAULT NULL,
  `stud_id` int(11) DEFAULT NULL,
  `yr_start` year(4) DEFAULT NULL,
  `yr_end` year(4) DEFAULT NULL,
  `sem` int(11) DEFAULT NULL,
  `term` int(11) DEFAULT NULL,
  `is_promissory` int(11) DEFAULT NULL,
  `info` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`sysid`),
  KEY `FK_STUD_ID` (`stud_id`),
  CONSTRAINT `FK_STUD_ID` FOREIGN KEY (`stud_id`) REFERENCES `tbl_students` (`sysid`)
) ENGINE=InnoDB AUTO_INCREMENT=109729 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_students_admission_slips`
--

LOCK TABLES `tbl_students_admission_slips` WRITE;
/*!40000 ALTER TABLE `tbl_students_admission_slips` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_students_admission_slips` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_students_course`
--

DROP TABLE IF EXISTS `tbl_students_course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_students_course` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `studid` int(11) DEFAULT NULL,
  `courseid` int(11) DEFAULT NULL,
  `yearstart` int(11) DEFAULT NULL,
  `yearend` int(11) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`sysid`)
) ENGINE=InnoDB AUTO_INCREMENT=130324 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_students_course`
--

LOCK TABLES `tbl_students_course` WRITE;
/*!40000 ALTER TABLE `tbl_students_course` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_students_course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_students_education_bg`
--

DROP TABLE IF EXISTS `tbl_students_education_bg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_students_education_bg` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `studid` int(11) DEFAULT NULL,
  `yearstart` year(4) NOT NULL,
  `yearend` year(4) DEFAULT NULL,
  `schoolname` varchar(255) DEFAULT NULL,
  `schooladdr` varchar(255) DEFAULT NULL,
  `schoollvl` int(11) DEFAULT NULL,
  `schoolawd` varchar(255) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`sysid`)
) ENGINE=MyISAM AUTO_INCREMENT=45744 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_students_education_bg`
--

LOCK TABLES `tbl_students_education_bg` WRITE;
/*!40000 ALTER TABLE `tbl_students_education_bg` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_students_education_bg` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_students_family_main`
--

DROP TABLE IF EXISTS `tbl_students_family_main`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_students_family_main` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `occupation` varchar(70) DEFAULT NULL,
  `birth` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `contactno` varchar(255) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`sysid`)
) ENGINE=InnoDB AUTO_INCREMENT=24008 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_students_family_main`
--

LOCK TABLES `tbl_students_family_main` WRITE;
/*!40000 ALTER TABLE `tbl_students_family_main` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_students_family_main` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_students_family_rel`
--

DROP TABLE IF EXISTS `tbl_students_family_rel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_students_family_rel` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `studid` int(11) NOT NULL,
  `famid` int(11) DEFAULT NULL,
  `relid` int(11) DEFAULT NULL,
  `isguardian` int(11) DEFAULT 0,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`sysid`)
) ENGINE=InnoDB AUTO_INCREMENT=25919 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_students_family_rel`
--

LOCK TABLES `tbl_students_family_rel` WRITE;
/*!40000 ALTER TABLE `tbl_students_family_rel` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_students_family_rel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_students_pics`
--

DROP TABLE IF EXISTS `tbl_students_pics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_students_pics` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `studid` int(11) NOT NULL,
  `picurl` varchar(255) DEFAULT NULL,
  `picname` varchar(255) DEFAULT NULL,
  `type` int(11) DEFAULT 0,
  `page` int(11) DEFAULT 1,
  `photo_used` int(11) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`sysid`)
) ENGINE=MyISAM AUTO_INCREMENT=29168 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_students_pics`
--

LOCK TABLES `tbl_students_pics` WRITE;
/*!40000 ALTER TABLE `tbl_students_pics` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_students_pics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_subject_group`
--

DROP TABLE IF EXISTS `tbl_subject_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_subject_group` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `group_description` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`sysid`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_subject_group`
--

LOCK TABLES `tbl_subject_group` WRITE;
/*!40000 ALTER TABLE `tbl_subject_group` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_subject_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_subjects`
--

DROP TABLE IF EXISTS `tbl_subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_subjects` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `descriptions` varchar(100) NOT NULL,
  `subjectlevel` varchar(100) DEFAULT NULL,
  `subjectlimit` varchar(255) DEFAULT NULL,
  `subjunit` int(11) DEFAULT NULL,
  `labunit` int(11) DEFAULT NULL,
  `subjectcostperunit` decimal(11,2) DEFAULT NULL,
  `subjectprereq` int(11) DEFAULT 0,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`sysid`)
) ENGINE=MyISAM AUTO_INCREMENT=802 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_subjects`
--

LOCK TABLES `tbl_subjects` WRITE;
/*!40000 ALTER TABLE `tbl_subjects` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_subjects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_subjects_prereqs`
--

DROP TABLE IF EXISTS `tbl_subjects_prereqs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_subjects_prereqs` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `subjid` int(11) NOT NULL,
  `subjreqid` int(11) NOT NULL,
  `subjcourseid` int(11) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`sysid`)
) ENGINE=MyISAM AUTO_INCREMENT=6149 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_subjects_prereqs`
--

LOCK TABLES `tbl_subjects_prereqs` WRITE;
/*!40000 ALTER TABLE `tbl_subjects_prereqs` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_subjects_prereqs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_subjects_prospectus`
--

DROP TABLE IF EXISTS `tbl_subjects_prospectus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_subjects_prospectus` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `subjid` int(11) NOT NULL,
  `subjpreq` int(11) NOT NULL DEFAULT 0,
  `subjunit` int(11) NOT NULL,
  `labunit` int(11) DEFAULT 0,
  `subjcostperunit` decimal(11,2) NOT NULL,
  `miscid` int(11) NOT NULL DEFAULT 0,
  `courseid` int(11) NOT NULL,
  `courselevel` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `curval` int(11) DEFAULT 1,
  `subj_group` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`sysid`)
) ENGINE=MyISAM AUTO_INCREMENT=1934 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_subjects_prospectus`
--

LOCK TABLES `tbl_subjects_prospectus` WRITE;
/*!40000 ALTER TABLE `tbl_subjects_prospectus` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_subjects_prospectus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_subjects_terms`
--

DROP TABLE IF EXISTS `tbl_subjects_terms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_subjects_terms` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `subjid` int(11) DEFAULT NULL,
  `yearstart` year(4) DEFAULT NULL,
  `yearend` year(4) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`sysid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_subjects_terms`
--

LOCK TABLES `tbl_subjects_terms` WRITE;
/*!40000 ALTER TABLE `tbl_subjects_terms` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_subjects_terms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_subjects_transcript`
--

DROP TABLE IF EXISTS `tbl_subjects_transcript`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_subjects_transcript` (
  `sysid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `stud_id` int(11) DEFAULT NULL,
  `code` varchar(45) DEFAULT NULL,
  `description` varchar(180) DEFAULT NULL,
  `units` int(11) DEFAULT NULL,
  `grade` varchar(11) DEFAULT NULL,
  `reex` varchar(11) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `yr_end` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `refid` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`sysid`)
) ENGINE=InnoDB AUTO_INCREMENT=182306 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_subjects_transcript`
--

LOCK TABLES `tbl_subjects_transcript` WRITE;
/*!40000 ALTER TABLE `tbl_subjects_transcript` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_subjects_transcript` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_subjects_transcript_remarks`
--

DROP TABLE IF EXISTS `tbl_subjects_transcript_remarks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_subjects_transcript_remarks` (
  `sysid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `studid` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `sem` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `remarks` varchar(450) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`sysid`)
) ENGINE=InnoDB AUTO_INCREMENT=6783 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_subjects_transcript_remarks`
--

LOCK TABLES `tbl_subjects_transcript_remarks` WRITE;
/*!40000 ALTER TABLE `tbl_subjects_transcript_remarks` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_subjects_transcript_remarks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_subjects_transcript_remarks_template`
--

DROP TABLE IF EXISTS `tbl_subjects_transcript_remarks_template`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_subjects_transcript_remarks_template` (
  `sysid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `remarks` varchar(450) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`sysid`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_subjects_transcript_remarks_template`
--

LOCK TABLES `tbl_subjects_transcript_remarks_template` WRITE;
/*!40000 ALTER TABLE `tbl_subjects_transcript_remarks_template` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_subjects_transcript_remarks_template` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_submission_requirements`
--

DROP TABLE IF EXISTS `tbl_submission_requirements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_submission_requirements` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `descriptions` varchar(100) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`sysid`),
  UNIQUE KEY `bookid` (`code`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_submission_requirements`
--

LOCK TABLES `tbl_submission_requirements` WRITE;
/*!40000 ALTER TABLE `tbl_submission_requirements` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_submission_requirements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_teachers_pics`
--

DROP TABLE IF EXISTS `tbl_teachers_pics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_teachers_pics` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `ins_id` int(11) NOT NULL,
  `picurl` varchar(255) DEFAULT NULL,
  `picname` varchar(255) DEFAULT NULL,
  `photo_used` int(11) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`sysid`)
) ENGINE=MyISAM AUTO_INCREMENT=907 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_teachers_pics`
--

LOCK TABLES `tbl_teachers_pics` WRITE;
/*!40000 ALTER TABLE `tbl_teachers_pics` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_teachers_pics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_teachers_schedules`
--

DROP TABLE IF EXISTS `tbl_teachers_schedules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_teachers_schedules` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL,
  `schedid` int(11) DEFAULT NULL,
  `datecreated` datetime DEFAULT NULL,
  `dateupdated` datetime DEFAULT NULL,
  `createdby` tinyint(4) DEFAULT NULL,
  `updatedby` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  PRIMARY KEY (`sysid`)
) ENGINE=MyISAM AUTO_INCREMENT=13180 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_teachers_schedules`
--

LOCK TABLES `tbl_teachers_schedules` WRITE;
/*!40000 ALTER TABLE `tbl_teachers_schedules` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_teachers_schedules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_teachers_subjects`
--

DROP TABLE IF EXISTS `tbl_teachers_subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_teachers_subjects` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL,
  `subjid` int(11) DEFAULT NULL,
  `datecreated` datetime DEFAULT NULL,
  `dateupdated` datetime DEFAULT NULL,
  `createdby` tinyint(4) DEFAULT NULL,
  `updatedby` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  PRIMARY KEY (`sysid`)
) ENGINE=MyISAM AUTO_INCREMENT=4298 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_teachers_subjects`
--

LOCK TABLES `tbl_teachers_subjects` WRITE;
/*!40000 ALTER TABLE `tbl_teachers_subjects` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_teachers_subjects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_trn_stud_pictures`
--

DROP TABLE IF EXISTS `tbl_trn_stud_pictures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_trn_stud_pictures` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `picurl` varchar(255) DEFAULT NULL,
  `studid` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`sysid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_trn_stud_pictures`
--

LOCK TABLES `tbl_trn_stud_pictures` WRITE;
/*!40000 ALTER TABLE `tbl_trn_stud_pictures` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_trn_stud_pictures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_trn_stud_schedule`
--

DROP TABLE IF EXISTS `tbl_trn_stud_schedule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_trn_stud_schedule` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `schedid` int(11) DEFAULT NULL,
  `studid` int(11) NOT NULL DEFAULT 0,
  `gradeprelim` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `gradeprelimstat` int(11) DEFAULT 0,
  `grademidterm` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `grademidtermstat` int(11) DEFAULT 0,
  `gradeprefinals` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `gradeprefinalsstat` int(11) DEFAULT 0,
  `gradefinals` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `gradefinalsstat` int(11) DEFAULT 0,
  `grade` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `gradeoverride` int(11) DEFAULT 0,
  `reex` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `reexstat` int(11) DEFAULT 0,
  `remarks` varchar(512) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`sysid`,`studid`),
  KEY `studid` (`studid`),
  CONSTRAINT `trn_sched_stud_id` FOREIGN KEY (`studid`) REFERENCES `tbl_students` (`sysid`)
) ENGINE=InnoDB AUTO_INCREMENT=490598 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_trn_stud_schedule`
--

LOCK TABLES `tbl_trn_stud_schedule` WRITE;
/*!40000 ALTER TABLE `tbl_trn_stud_schedule` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_trn_stud_schedule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_trn_stud_schedule_enrolled`
--

DROP TABLE IF EXISTS `tbl_trn_stud_schedule_enrolled`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_trn_stud_schedule_enrolled` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `schedid` int(11) DEFAULT NULL,
  `studid` int(11) DEFAULT NULL,
  `subjunit` int(11) DEFAULT NULL,
  `labunit` int(11) DEFAULT NULL,
  `subjcostperunit` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`sysid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_trn_stud_schedule_enrolled`
--

LOCK TABLES `tbl_trn_stud_schedule_enrolled` WRITE;
/*!40000 ALTER TABLE `tbl_trn_stud_schedule_enrolled` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_trn_stud_schedule_enrolled` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_trn_stud_subject_evaluated`
--

DROP TABLE IF EXISTS `tbl_trn_stud_subject_evaluated`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_trn_stud_subject_evaluated` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `subjid` int(11) DEFAULT NULL,
  `studid` int(11) DEFAULT NULL,
  `yearstart` year(4) DEFAULT NULL,
  `yearend` year(4) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`sysid`)
) ENGINE=MyISAM AUTO_INCREMENT=493364 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_trn_stud_subject_evaluated`
--

LOCK TABLES `tbl_trn_stud_subject_evaluated` WRITE;
/*!40000 ALTER TABLE `tbl_trn_stud_subject_evaluated` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_trn_stud_subject_evaluated` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `units`
--

DROP TABLE IF EXISTS `units`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `units` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdby` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datecreated` datetime DEFAULT NULL,
  `updatedby` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateupdated` datetime DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `units`
--

LOCK TABLES `units` WRITE;
/*!40000 ALTER TABLE `units` DISABLE KEYS */;
INSERT INTO `units` VALUES (1,'m','meter','1','2021-08-20 05:35:15',NULL,NULL,1),(2,'km','kilometer','1','2021-08-20 05:35:15',NULL,NULL,1),(3,'box','box','1','2021-08-20 05:35:15',NULL,NULL,1),(4,'bot','bottle','1','2021-08-20 05:35:15',NULL,NULL,1),(5,'roll','roll','1','2021-08-20 05:35:15',NULL,NULL,1),(6,'unit','unit','1','2021-08-20 05:35:15',NULL,NULL,1),(7,'pc','piece','1','2021-08-20 05:35:15',NULL,NULL,1),(8,'pcs','pieces','1','2021-08-20 05:35:15',NULL,NULL,1),(9,'ream','ream','1','2021-08-20 05:35:15',NULL,NULL,1),(10,'doz','dozen','1','2021-08-20 05:35:15',NULL,NULL,1),(11,'set','set','1','2021-08-20 05:35:15',NULL,NULL,1),(12,'length','length','1','2021-08-20 05:35:15',NULL,NULL,1),(13,'pack','pack','1','2021-08-20 05:35:15',NULL,NULL,1);
/*!40000 ALTER TABLE `units` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middlename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extension` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` int(11) NOT NULL DEFAULT 1,
  `role` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createdby` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datecreated` datetime DEFAULT NULL,
  `updatedby` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateupdated` datetime DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `users_username_unique` (`username`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Super',NULL,'User',NULL,'super.user','$2y$10$0JkxBQkNpv2tsn.h.gcJY.CDglkBjxb/VMj3XTfIXalmFhz5QjkHy',1,1,'2021-08-19 21:35:15','2021-08-19 21:35:15',NULL,'1','2021-08-20 05:35:15',NULL,NULL,1),(2,'Medina','Balonga','Macua',NULL,'medina.macua','$2y$10$gWOYA5PXTici2HoHl5y5jOhe1o44De.ZtgXsdsvDqJCk5xNqCxr62',6,2,'2021-08-19 23:32:52','2021-08-22 01:02:58',NULL,'1','2021-08-20 07:32:52','1','2021-08-21 08:03:31',1),(3,'Clark Kevin','Valmoria','Villamor',NULL,'clark.villamor','$2y$10$Z5t56D.QJivcEm32I3NpDOD6jhol.6XRO4.G026.PMU9spNcwbpbq',18,4,'2021-08-19 23:51:20','2021-08-20 22:59:36',NULL,'1','2021-08-20 07:51:20','1','2021-08-21 06:59:36',1),(4,'Marlon','Valmoria','Macua',NULL,'marlon.macua','$2y$10$5.jUmLBdLC8YTlY.1OnqkuxSxFL3sfZH6jkOSPdvGJxOlW27bK8/e',24,1,'2021-08-19 23:54:16','2021-08-20 00:01:16',NULL,'1','2021-08-20 07:54:16','1','2021-08-20 08:01:16',1),(5,'Roberto','Castaño','Cajes',NULL,'roberto.cajes','$2y$10$ttHDVA8kp/yzNiBf.wIrluiE5Vdbu0hGX99NTUbT.32h2wsnK33Gy',28,3,'2021-08-20 00:00:57','2021-08-20 00:00:57',NULL,'1','2021-08-20 08:00:57',NULL,NULL,1),(6,'Misael','Adtoon','Salisid',NULL,'misael.salisid','$2y$10$AukEr.p1.O.an57SW/dV8.zYhxq2ulKqwrqRs3FC1H.MHwq2b7Kl2',19,4,'2021-08-20 22:59:56','2021-08-20 22:59:56',NULL,'1','2021-08-21 06:59:56',NULL,NULL,1),(7,'Cesar','Degamo','Cañete',NULL,'cesar.cañete','$2y$10$pcz0NiIhbGRQdv1aIcj5..0iaJrMIorAaLLfDbCyFSM.zYqkXeiwm',22,4,'2021-08-20 23:00:16','2021-08-20 23:00:16',NULL,'1','2021-08-21 07:00:16',NULL,NULL,1),(8,'Selvino','Bonior','Naval',NULL,'selvino.naval','$2y$10$YDT6Vn3.H3sUfQCgUC/FFe4TBd4mYae8U6L54C60pgBJBlvxmho8W',21,4,'2021-08-20 23:05:37','2021-08-20 23:05:37',NULL,'1','2021-08-21 07:05:37',NULL,NULL,1),(9,'Iris Mae','Rudes','Catanio',NULL,'irismae.catanio','$2y$10$7VYa.dEzCd8lcwdEbRnnp..mYYJv8IlIjbUE64xT9qejf6VcFO5em',23,4,'2021-08-21 00:26:32','2021-08-21 00:26:32',NULL,'1','2021-08-21 08:26:32',NULL,NULL,1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-10-29 15:38:46

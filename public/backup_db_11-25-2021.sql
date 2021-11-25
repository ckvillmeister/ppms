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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `procurement_info`
--

LOCK TABLES `procurement_info` WRITE;
/*!40000 ALTER TABLE `procurement_info` DISABLE KEYS */;
INSERT INTO `procurement_info` VALUES (1,18,2022,'3','2021-08-21 07:02:02',NULL,NULL,1),(2,19,2022,'6','2021-08-21 07:03:31',NULL,NULL,1),(3,22,2022,'7','2021-08-21 07:04:06',NULL,NULL,1),(4,21,2022,'8','2021-08-21 07:06:10',NULL,NULL,1),(5,23,2022,'9','2021-08-21 08:27:02',NULL,NULL,1),(6,6,2022,'2','2021-08-22 09:05:07',NULL,NULL,1),(7,1,2022,'1','2021-09-21 09:38:28',NULL,NULL,1),(8,1,2023,'1','2021-11-25 05:01:02',NULL,NULL,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `procurement_items`
--

LOCK TABLES `procurement_items` WRITE;
/*!40000 ALTER TABLE `procurement_items` DISABLE KEYS */;
INSERT INTO `procurement_items` VALUES (1,1,2,'Ballpen (Black)',4,150,'Shopping',1,0,0,0,0,0,1,0,0,0,0,0,'3','2021-08-21 07:03:07',0),(2,2,3,'Bond Paper (Long)',6,450,'Shopping',1,0,0,0,0,0,1,0,0,0,0,0,'6','2021-08-21 07:03:31',1),(3,3,4,'Bond Paper (Short)',4,430,'Shopping',1,0,0,0,0,0,1,0,0,0,0,0,'7','2021-08-21 07:04:06',1),(4,4,2,'Ballpen (Black)',4,150,'Shopping',1,0,0,0,0,0,1,0,0,0,0,0,'8','2021-08-21 07:08:53',1),(5,5,5,'Ballpen (Black)',10,200,'Shopping',1,0,0,0,0,0,1,0,0,0,0,0,'9','2021-08-21 08:27:02',1),(6,1,6,'Computer Set',30,35000,'Public Bidding',0,0,0,0,0,0,0,1,0,0,0,0,'1','2021-08-22 03:57:44',0),(7,1,7,'Whiteboard Marker',5,35,'Shopping',1,0,0,0,0,0,1,0,0,0,0,0,'1','2021-08-22 04:05:22',1),(8,6,5,'Ballpen (Black)',10,200,'Shopping',1,0,0,0,0,0,1,0,0,0,0,0,'2','2021-08-22 09:05:07',1),(9,1,3,'Bond Paper (Long)',15,450,'Shopping',1,0,0,0,0,0,1,0,0,0,0,0,'1','2021-08-25 08:00:38',1),(10,1,4,'Bond Paper (Short)',15,430,'Shopping',1,0,0,0,0,0,1,0,0,0,0,0,'1','2021-08-25 08:10:21',1),(11,7,8,'Computer Keyboard',8,350,'Shopping',1,0,0,0,0,0,1,0,0,0,0,0,'1','2021-09-21 09:38:28',1),(12,8,8,'Computer Keyboard',16,350,'Shopping',1,0,0,0,0,0,1,0,0,0,0,0,'1','2021-11-25 05:01:18',1),(13,7,1,'Ballpen (Black)',5,150,'Shopping',1,0,0,0,0,0,1,0,0,0,0,0,'1','2021-11-25 05:07:56',1),(14,7,2,'Ballpen (Black)',5,150,'Shopping',1,0,0,0,0,0,1,0,0,0,0,0,'1','2021-11-25 05:07:56',1),(15,8,1,'Ballpen (Black)',10,150,'Shopping',1,0,0,0,0,0,1,0,0,0,0,0,'1','2021-11-25 05:08:18',1),(16,8,2,'Ballpen (Black)',10,150,'Shopping',1,0,0,0,0,0,1,0,0,0,0,0,'1','2021-11-25 05:08:18',1);
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
INSERT INTO `settings` VALUES (1,'Application Name','Project Procurement Management System',1),(2,'Procurement Year','2023',1),(3,'Procurement Status','0',1);
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
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

-- Dump completed on 2021-11-25 17:29:19

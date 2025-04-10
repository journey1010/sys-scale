-- MySQL dump 10.13  Distrib 8.0.41, for Linux (x86_64)
--
-- Host: localhost    Database: escalafon
-- ------------------------------------------------------
-- Server version	8.0.41

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `aditional_carrerpath`
--

DROP TABLE IF EXISTS `aditional_carrerpath`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `aditional_carrerpath` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `tipo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `denominacion_cargo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `motivo_cese` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nivel` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cargo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dependencia` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_cese` date DEFAULT NULL,
  `dias_laborados` int DEFAULT NULL,
  `observaciones` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_resolution` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `aditional_carrerpath_id_resolution_foreign` (`id_resolution`),
  CONSTRAINT `aditional_carrerpath_id_resolution_foreign` FOREIGN KEY (`id_resolution`) REFERENCES `resolution` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aditional_carrerpath`
--

LOCK TABLES `aditional_carrerpath` WRITE;
/*!40000 ALTER TABLE `aditional_carrerpath` DISABLE KEYS */;
/*!40000 ALTER TABLE `aditional_carrerpath` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aditional_fields_displacement_of_personal`
--

DROP TABLE IF EXISTS `aditional_fields_displacement_of_personal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `aditional_fields_displacement_of_personal` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `tipo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `charge` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dependencia_origen` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dependencia_destino` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `displacement_time_years` int DEFAULT NULL,
  `displacement_time_months` int DEFAULT NULL,
  `displacement_time_days` int DEFAULT NULL,
  `id_resolution` int unsigned DEFAULT NULL,
  `id_user` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `aditional_fields_displacement_of_personal_id_resolution_foreign` (`id_resolution`),
  KEY `aditional_fields_displacement_of_personal_id_user_foreign` (`id_user`),
  CONSTRAINT `aditional_fields_displacement_of_personal_id_resolution_foreign` FOREIGN KEY (`id_resolution`) REFERENCES `resolution` (`id`),
  CONSTRAINT `aditional_fields_displacement_of_personal_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aditional_fields_displacement_of_personal`
--

LOCK TABLES `aditional_fields_displacement_of_personal` WRITE;
/*!40000 ALTER TABLE `aditional_fields_displacement_of_personal` DISABLE KEYS */;
/*!40000 ALTER TABLE `aditional_fields_displacement_of_personal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aditional_fields_entries`
--

DROP TABLE IF EXISTS `aditional_fields_entries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `aditional_fields_entries` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `tipo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contract_time_years` int DEFAULT NULL,
  `contract_time_months` int DEFAULT NULL,
  `contract_time_days` int DEFAULT NULL,
  `dependency` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `charge` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_resolution` int unsigned DEFAULT NULL,
  `id_user` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `aditional_fields_entries_id_resolution_foreign` (`id_resolution`),
  KEY `aditional_fields_entries_id_user_foreign` (`id_user`),
  CONSTRAINT `aditional_fields_entries_id_resolution_foreign` FOREIGN KEY (`id_resolution`) REFERENCES `resolution` (`id`),
  CONSTRAINT `aditional_fields_entries_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aditional_fields_entries`
--

LOCK TABLES `aditional_fields_entries` WRITE;
/*!40000 ALTER TABLE `aditional_fields_entries` DISABLE KEYS */;
/*!40000 ALTER TABLE `aditional_fields_entries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aditional_fields_permit_eco_benefit`
--

DROP TABLE IF EXISTS `aditional_fields_permit_eco_benefit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `aditional_fields_permit_eco_benefit` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `tipo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quinquenio` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_cumplimiento_quinquenio` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `beneficio_otorgado` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monto_otorgado` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_resolution` int unsigned DEFAULT NULL,
  `id_user` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `aditional_fields_permit_eco_benefit_id_resolution_foreign` (`id_resolution`),
  KEY `aditional_fields_permit_eco_benefit_id_user_foreign` (`id_user`),
  CONSTRAINT `aditional_fields_permit_eco_benefit_id_resolution_foreign` FOREIGN KEY (`id_resolution`) REFERENCES `resolution` (`id`),
  CONSTRAINT `aditional_fields_permit_eco_benefit_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aditional_fields_permit_eco_benefit`
--

LOCK TABLES `aditional_fields_permit_eco_benefit` WRITE;
/*!40000 ALTER TABLE `aditional_fields_permit_eco_benefit` DISABLE KEYS */;
/*!40000 ALTER TABLE `aditional_fields_permit_eco_benefit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aditional_fields_production_intelect`
--

DROP TABLE IF EXISTS `aditional_fields_production_intelect`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `aditional_fields_production_intelect` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `tipo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_trabajo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titulo_trabajo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` int NOT NULL,
  `id_resolution` int unsigned DEFAULT NULL,
  `id_user` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `aditional_fields_production_intelect_id_resolution_foreign` (`id_resolution`),
  KEY `aditional_fields_production_intelect_id_user_foreign` (`id_user`),
  CONSTRAINT `aditional_fields_production_intelect_id_resolution_foreign` FOREIGN KEY (`id_resolution`) REFERENCES `resolution` (`id`),
  CONSTRAINT `aditional_fields_production_intelect_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aditional_fields_production_intelect`
--

LOCK TABLES `aditional_fields_production_intelect` WRITE;
/*!40000 ALTER TABLE `aditional_fields_production_intelect` DISABLE KEYS */;
/*!40000 ALTER TABLE `aditional_fields_production_intelect` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aditional_fields_sanctions_and_merit`
--

DROP TABLE IF EXISTS `aditional_fields_sanctions_and_merit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `aditional_fields_sanctions_and_merit` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `tipo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion_demerito` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `motivo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dependencia_destino` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tiempo_sin_goce` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_termino` date DEFAULT NULL,
  `sacntion_time_year` int DEFAULT NULL,
  `sacntion_time_months` int DEFAULT NULL,
  `sacntion_time_days` int DEFAULT NULL,
  `id_resolution` int unsigned DEFAULT NULL,
  `id_user` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `aditional_fields_sanctions_and_merit_id_resolution_foreign` (`id_resolution`),
  KEY `aditional_fields_sanctions_and_merit_id_user_foreign` (`id_user`),
  CONSTRAINT `aditional_fields_sanctions_and_merit_id_resolution_foreign` FOREIGN KEY (`id_resolution`) REFERENCES `resolution` (`id`),
  CONSTRAINT `aditional_fields_sanctions_and_merit_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aditional_fields_sanctions_and_merit`
--

LOCK TABLES `aditional_fields_sanctions_and_merit` WRITE;
/*!40000 ALTER TABLE `aditional_fields_sanctions_and_merit` DISABLE KEYS */;
/*!40000 ALTER TABLE `aditional_fields_sanctions_and_merit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `affiliation_document`
--

DROP TABLE IF EXISTS `affiliation_document`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `affiliation_document` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `foto_size_carnet` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `path_foto_size_carnet` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `job_app` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `path_job_app` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `home_certificate` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `path_home_certificate` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `presentatio_document` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `path_presentatio_document` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `declaration_sworn_goods` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `path_declaration_sworn_goods` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `health_certificate` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `path_health_certificate` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `judicial_certificate` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `path_judicial_certificate` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `police_certificate` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `path_police_certificate` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `birth_certificate` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `path_birth_certificate` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `title_nationalized` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `path_title_nationalized` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `marriage_certificate_nationality` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `path_marriage_certificate_nationality` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `country_visa` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `path_country_visa` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `resolution_disability` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `path_resolution_disability` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `copy_essalud` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `path_copy_essalud` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `document_fap` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `path_document_fap` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cv` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `path_cv` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `dni_legalized` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `path_dni_legalized` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `marriage_certificate` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `path_marriage_certificate` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `notarial_of_coexistence` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `path_notarial_of_coexistence` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `children_document` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `path_children_document` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `nationality_document` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `path_nationality_document` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `affiliation_document`
--

LOCK TABLES `affiliation_document` WRITE;
/*!40000 ALTER TABLE `affiliation_document` DISABLE KEYS */;
/*!40000 ALTER TABLE `affiliation_document` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `department` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department`
--

LOCK TABLES `department` WRITE;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
/*!40000 ALTER TABLE `department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dependence`
--

DROP TABLE IF EXISTS `dependence`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dependence` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dependence`
--

LOCK TABLES `dependence` WRITE;
/*!40000 ALTER TABLE `dependence` DISABLE KEYS */;
/*!40000 ALTER TABLE `dependence` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `district`
--

DROP TABLE IF EXISTS `district`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `district` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `id_province` int unsigned DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `district_id_province_foreign` (`id_province`),
  CONSTRAINT `district_id_province_foreign` FOREIGN KEY (`id_province`) REFERENCES `province` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `district`
--

LOCK TABLES `district` WRITE;
/*!40000 ALTER TABLE `district` DISABLE KEYS */;
/*!40000 ALTER TABLE `district` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entries`
--

DROP TABLE IF EXISTS `entries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `entries` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `resolutionNumber` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `resolutionType` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `issueDate` date NOT NULL,
  `issuingOrgan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `description` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `constancyUrl` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `constancyPath` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` int NOT NULL,
  `id_user` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `entries_id_user_foreign` (`id_user`),
  CONSTRAINT `entries_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entries`
--

LOCK TABLES `entries` WRITE;
/*!40000 ALTER TABLE `entries` DISABLE KEYS */;
/*!40000 ALTER TABLE `entries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entryResolution`
--

DROP TABLE IF EXISTS `entryResolution`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `entryResolution` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `resolutionNumber` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `resolutionType` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `issueDate` date NOT NULL,
  `issuingOrgan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `description` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `constancyUrl` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `constancyPath` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` int NOT NULL,
  `id_user` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `entryresolution_id_user_foreign` (`id_user`),
  CONSTRAINT `entryresolution_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entryResolution`
--

LOCK TABLES `entryResolution` WRITE;
/*!40000 ALTER TABLE `entryResolution` DISABLE KEYS */;
/*!40000 ALTER TABLE `entryResolution` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evaluation_document`
--

DROP TABLE IF EXISTS `evaluation_document`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `evaluation_document` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `tipo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_emision` date DEFAULT NULL,
  `puntaje` int DEFAULT NULL,
  `calificacion` decimal(8,2) DEFAULT NULL,
  `observaciones` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `informepath` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `informeurl` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_resolution` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `evaluation_document_id_resolution_foreign` (`id_resolution`),
  CONSTRAINT `evaluation_document_id_resolution_foreign` FOREIGN KEY (`id_resolution`) REFERENCES `resolution` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evaluation_document`
--

LOCK TABLES `evaluation_document` WRITE;
/*!40000 ALTER TABLE `evaluation_document` DISABLE KEYS */;
/*!40000 ALTER TABLE `evaluation_document` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `labor_conditional`
--

DROP TABLE IF EXISTS `labor_conditional`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `labor_conditional` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `labor_conditional`
--

LOCK TABLES `labor_conditional` WRITE;
/*!40000 ALTER TABLE `labor_conditional` DISABLE KEYS */;
/*!40000 ALTER TABLE `labor_conditional` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `licence_type`
--

DROP TABLE IF EXISTS `licence_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `licence_type` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `licence_type`
--

LOCK TABLES `licence_type` WRITE;
/*!40000 ALTER TABLE `licence_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `licence_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `licences`
--

DROP TABLE IF EXISTS `licences`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `licences` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `date_end` date NOT NULL,
  `date_start` date NOT NULL,
  `doc_date` date NOT NULL,
  `doc_number` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_days` int NOT NULL,
  `comment` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_licence_type` int unsigned NOT NULL,
  `id_user` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `licences_id_licence_type_foreign` (`id_licence_type`),
  KEY `licences_id_user_foreign` (`id_user`),
  CONSTRAINT `licences_id_licence_type_foreign` FOREIGN KEY (`id_licence_type`) REFERENCES `licence_type` (`id`),
  CONSTRAINT `licences_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `licences`
--

LOCK TABLES `licences` WRITE;
/*!40000 ALTER TABLE `licences` DISABLE KEYS */;
/*!40000 ALTER TABLE `licences` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `licensing_authorization`
--

DROP TABLE IF EXISTS `licensing_authorization`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `licensing_authorization` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `date_start` date NOT NULL,
  `date_end` date DEFAULT NULL,
  `number_days` int NOT NULL,
  `comment` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_resolution` int unsigned NOT NULL,
  `with_remunerations` tinyint(1) NOT NULL,
  `license_resolution_type` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `licensing_authorization_id_resolution_foreign` (`id_resolution`),
  CONSTRAINT `licensing_authorization_id_resolution_foreign` FOREIGN KEY (`id_resolution`) REFERENCES `resolution` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `licensing_authorization`
--

LOCK TABLES `licensing_authorization` WRITE;
/*!40000 ALTER TABLE `licensing_authorization` DISABLE KEYS */;
/*!40000 ALTER TABLE `licensing_authorization` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `master_doctor_degree`
--

DROP TABLE IF EXISTS `master_doctor_degree`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `master_doctor_degree` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name_school` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `concentration` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_expedition` date DEFAULT NULL,
  `date_begin` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `years_diff` int DEFAULT NULL,
  `months_diff` int DEFAULT NULL,
  `days_diff` int DEFAULT NULL,
  `url_certificate` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path_certificate` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_validation` int DEFAULT NULL,
  `id_user` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `master_doctor_degree_id_user_foreign` (`id_user`),
  CONSTRAINT `master_doctor_degree_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `master_doctor_degree`
--

LOCK TABLES `master_doctor_degree` WRITE;
/*!40000 ALTER TABLE `master_doctor_degree` DISABLE KEYS */;
/*!40000 ALTER TABLE `master_doctor_degree` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `others_studies`
--

DROP TABLE IF EXISTS `others_studies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `others_studies` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name_school` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_studie` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_studie` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hours` int DEFAULT NULL,
  `date_begin` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `years_diff` int DEFAULT NULL,
  `months_diff` int DEFAULT NULL,
  `days_diff` int DEFAULT NULL,
  `url_certificate` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path_certificate` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_validation` int DEFAULT NULL,
  `id_user` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `others_studies_id_user_foreign` (`id_user`),
  CONSTRAINT `others_studies_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `others_studies`
--

LOCK TABLES `others_studies` WRITE;
/*!40000 ALTER TABLE `others_studies` DISABLE KEYS */;
/*!40000 ALTER TABLE `others_studies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permission_role` (
  `permission_id` int unsigned NOT NULL,
  `role_id` int unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permit_authorization`
--

DROP TABLE IF EXISTS `permit_authorization`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permit_authorization` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `date_start` date NOT NULL,
  `date_end` date DEFAULT NULL,
  `number_days` int NOT NULL,
  `comment` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_resolution` int unsigned NOT NULL,
  `with_remunerations` tinyint(1) NOT NULL,
  `permit_reason` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permit_authorization_id_resolution_foreign` (`id_resolution`),
  CONSTRAINT `permit_authorization_id_resolution_foreign` FOREIGN KEY (`id_resolution`) REFERENCES `resolution` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permit_authorization`
--

LOCK TABLES `permit_authorization` WRITE;
/*!40000 ALTER TABLE `permit_authorization` DISABLE KEYS */;
/*!40000 ALTER TABLE `permit_authorization` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_identification`
--

DROP TABLE IF EXISTS `personal_identification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_identification` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `photo_path` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo_url` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modular_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `birth_id_department` int unsigned DEFAULT NULL,
  `birth_id_province` int unsigned DEFAULT NULL,
  `birth_id_district` int unsigned DEFAULT NULL,
  `address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_id_department` int unsigned DEFAULT NULL,
  `home_id_province` int unsigned DEFAULT NULL,
  `home_id_district` int unsigned DEFAULT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cellphone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dni` char(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sex` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_type` char(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employment_regime` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pension_regime` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pension_system` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `affiliation_date` date DEFAULT NULL,
  `cuspp` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `essalud` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `civil_status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_surname` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_user` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_labor_conditional` int unsigned DEFAULT NULL,
  `id_dependence` int unsigned DEFAULT NULL,
  `id_affiliation_document` int unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `personal_identification_birth_id_department_foreign` (`birth_id_department`),
  KEY `personal_identification_birth_id_province_foreign` (`birth_id_province`),
  KEY `personal_identification_birth_id_district_foreign` (`birth_id_district`),
  KEY `personal_identification_home_id_department_foreign` (`home_id_department`),
  KEY `personal_identification_home_id_province_foreign` (`home_id_province`),
  KEY `personal_identification_home_id_district_foreign` (`home_id_district`),
  KEY `personal_identification_id_user_foreign` (`id_user`),
  KEY `personal_identification_id_labor_conditional_foreign` (`id_labor_conditional`),
  KEY `personal_identification_id_dependence_foreign` (`id_dependence`),
  KEY `personal_identification_id_affiliation_document_foreign` (`id_affiliation_document`),
  CONSTRAINT `personal_identification_birth_id_department_foreign` FOREIGN KEY (`birth_id_department`) REFERENCES `department` (`id`),
  CONSTRAINT `personal_identification_birth_id_district_foreign` FOREIGN KEY (`birth_id_district`) REFERENCES `district` (`id`),
  CONSTRAINT `personal_identification_birth_id_province_foreign` FOREIGN KEY (`birth_id_province`) REFERENCES `province` (`id`),
  CONSTRAINT `personal_identification_home_id_department_foreign` FOREIGN KEY (`home_id_department`) REFERENCES `department` (`id`),
  CONSTRAINT `personal_identification_home_id_district_foreign` FOREIGN KEY (`home_id_district`) REFERENCES `district` (`id`),
  CONSTRAINT `personal_identification_home_id_province_foreign` FOREIGN KEY (`home_id_province`) REFERENCES `province` (`id`),
  CONSTRAINT `personal_identification_id_affiliation_document_foreign` FOREIGN KEY (`id_affiliation_document`) REFERENCES `affiliation_document` (`id`),
  CONSTRAINT `personal_identification_id_dependence_foreign` FOREIGN KEY (`id_dependence`) REFERENCES `dependence` (`id`),
  CONSTRAINT `personal_identification_id_labor_conditional_foreign` FOREIGN KEY (`id_labor_conditional`) REFERENCES `labor_conditional` (`id`),
  CONSTRAINT `personal_identification_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_identification`
--

LOCK TABLES `personal_identification` WRITE;
/*!40000 ALTER TABLE `personal_identification` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_identification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_identification_parent`
--

DROP TABLE IF EXISTS `personal_identification_parent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_identification_parent` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `life_state` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `personal_identification_parent_id_user_foreign` (`id_user`),
  CONSTRAINT `personal_identification_parent_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_identification_parent`
--

LOCK TABLES `personal_identification_parent` WRITE;
/*!40000 ALTER TABLE `personal_identification_parent` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_identification_parent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_identification_sibling`
--

DROP TABLE IF EXISTS `personal_identification_sibling`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_identification_sibling` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `id_user` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `personal_identification_sibling_id_user_foreign` (`id_user`),
  CONSTRAINT `personal_identification_sibling_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_identification_sibling`
--

LOCK TABLES `personal_identification_sibling` WRITE;
/*!40000 ALTER TABLE `personal_identification_sibling` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_identification_sibling` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `postgraduate_information`
--

DROP TABLE IF EXISTS `postgraduate_information`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `postgraduate_information` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name_school` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `concentration` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_expedition` date DEFAULT NULL,
  `hours` int DEFAULT NULL,
  `date_begin` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `years_diff` int DEFAULT NULL,
  `months_diff` int DEFAULT NULL,
  `days_diff` int DEFAULT NULL,
  `url_certificate` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path_certificate` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_validation` int DEFAULT NULL,
  `id_user` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `postgraduate_information_id_user_foreign` (`id_user`),
  CONSTRAINT `postgraduate_information_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `postgraduate_information`
--

LOCK TABLES `postgraduate_information` WRITE;
/*!40000 ALTER TABLE `postgraduate_information` DISABLE KEYS */;
/*!40000 ALTER TABLE `postgraduate_information` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `primary_education`
--

DROP TABLE IF EXISTS `primary_education`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `primary_education` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name_school` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_begin` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `years_diff` int DEFAULT NULL,
  `months_diff` int DEFAULT NULL,
  `days_diff` int DEFAULT NULL,
  `url_certificate` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path_certificate` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_validation` int DEFAULT NULL,
  `id_user` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `id_country` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_department` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_province` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_district` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `primary_education_id_user_foreign` (`id_user`),
  CONSTRAINT `primary_education_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `primary_education`
--

LOCK TABLES `primary_education` WRITE;
/*!40000 ALTER TABLE `primary_education` DISABLE KEYS */;
/*!40000 ALTER TABLE `primary_education` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `professional_title`
--

DROP TABLE IF EXISTS `professional_title`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `professional_title` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `concentration` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_college` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_begin` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `years_diff` int DEFAULT NULL,
  `months_diff` int DEFAULT NULL,
  `days_diff` int DEFAULT NULL,
  `number_register_title` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mention` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_register_title` date DEFAULT NULL,
  `url_certificate` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path_certificate` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_validation` int DEFAULT NULL,
  `id_user` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `id_country` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_department` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_province` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_district` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `professional_title_id_user_foreign` (`id_user`),
  CONSTRAINT `professional_title_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `professional_title`
--

LOCK TABLES `professional_title` WRITE;
/*!40000 ALTER TABLE `professional_title` DISABLE KEYS */;
/*!40000 ALTER TABLE `professional_title` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `province`
--

DROP TABLE IF EXISTS `province`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `province` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `id_department` int unsigned DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `province_id_department_foreign` (`id_department`),
  CONSTRAINT `province_id_department_foreign` FOREIGN KEY (`id_department`) REFERENCES `department` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `province`
--

LOCK TABLES `province` WRITE;
/*!40000 ALTER TABLE `province` DISABLE KEYS */;
/*!40000 ALTER TABLE `province` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resolution`
--

DROP TABLE IF EXISTS `resolution`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `resolution` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `resolution_number` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_resolution_type` int unsigned DEFAULT NULL,
  `memorando_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_section` int unsigned DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  `issuing_organ` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `work_position` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `workplace` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `constancy_path` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `constancy_url` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_validation` int DEFAULT NULL,
  `id_user` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `resolution_id_resolution_type_foreign` (`id_resolution_type`),
  KEY `resolution_id_section_foreign` (`id_section`),
  KEY `resolution_id_user_foreign` (`id_user`),
  CONSTRAINT `resolution_id_resolution_type_foreign` FOREIGN KEY (`id_resolution_type`) REFERENCES `resolution_type` (`id`),
  CONSTRAINT `resolution_id_section_foreign` FOREIGN KEY (`id_section`) REFERENCES `section` (`id`),
  CONSTRAINT `resolution_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resolution`
--

LOCK TABLES `resolution` WRITE;
/*!40000 ALTER TABLE `resolution` DISABLE KEYS */;
/*!40000 ALTER TABLE `resolution` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resolution_type`
--

DROP TABLE IF EXISTS `resolution_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `resolution_type` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag_vacations` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resolution_type`
--

LOCK TABLES `resolution_type` WRITE;
/*!40000 ALTER TABLE `resolution_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `resolution_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_user` (
  `user_id` int unsigned NOT NULL,
  `role_id` int unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_user`
--

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `secondary_education`
--

DROP TABLE IF EXISTS `secondary_education`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `secondary_education` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name_university` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_begin` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `years_diff` int DEFAULT NULL,
  `months_diff` int DEFAULT NULL,
  `days_diff` int DEFAULT NULL,
  `url_certificate` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path_certificate` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_validation` int DEFAULT NULL,
  `id_user` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `id_country` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_department` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_province` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_district` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `secondary_education_id_user_foreign` (`id_user`),
  CONSTRAINT `secondary_education_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `secondary_education`
--

LOCK TABLES `secondary_education` WRITE;
/*!40000 ALTER TABLE `secondary_education` DISABLE KEYS */;
/*!40000 ALTER TABLE `secondary_education` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `section`
--

DROP TABLE IF EXISTS `section`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `section` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `section`
--

LOCK TABLES `section` WRITE;
/*!40000 ALTER TABLE `section` DISABLE KEYS */;
/*!40000 ALTER TABLE `section` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `section_annex`
--

DROP TABLE IF EXISTS `section_annex`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `section_annex` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_doc` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_path` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_url` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_section` int unsigned DEFAULT NULL,
  `id_user` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `section_annex_id_section_foreign` (`id_section`),
  KEY `section_annex_id_user_foreign` (`id_user`),
  CONSTRAINT `section_annex_id_section_foreign` FOREIGN KEY (`id_section`) REFERENCES `section` (`id`),
  CONSTRAINT `section_annex_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `section_annex`
--

LOCK TABLES `section_annex` WRITE;
/*!40000 ALTER TABLE `section_annex` DISABLE KEYS */;
/*!40000 ALTER TABLE `section_annex` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `section_resolution_type`
--

DROP TABLE IF EXISTS `section_resolution_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `section_resolution_type` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `id_section` int unsigned DEFAULT NULL,
  `id_resolution_type` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `section_resolution_type_id_section_foreign` (`id_section`),
  KEY `section_resolution_type_id_resolution_type_foreign` (`id_resolution_type`),
  CONSTRAINT `section_resolution_type_id_resolution_type_foreign` FOREIGN KEY (`id_resolution_type`) REFERENCES `resolution_type` (`id`) ON DELETE CASCADE,
  CONSTRAINT `section_resolution_type_id_section_foreign` FOREIGN KEY (`id_section`) REFERENCES `section` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `section_resolution_type`
--

LOCK TABLES `section_resolution_type` WRITE;
/*!40000 ALTER TABLE `section_resolution_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `section_resolution_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `special_license_authorization`
--

DROP TABLE IF EXISTS `special_license_authorization`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `special_license_authorization` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `date_start` date NOT NULL,
  `date_end` date DEFAULT NULL,
  `number_days` int NOT NULL,
  `comment` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_resolution` int unsigned NOT NULL,
  `with_remunerations` tinyint(1) NOT NULL,
  `license_resolution_type` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `special_license_authorization_id_resolution_foreign` (`id_resolution`),
  CONSTRAINT `special_license_authorization_id_resolution_foreign` FOREIGN KEY (`id_resolution`) REFERENCES `resolution` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `special_license_authorization`
--

LOCK TABLES `special_license_authorization` WRITE;
/*!40000 ALTER TABLE `special_license_authorization` DISABLE KEYS */;
/*!40000 ALTER TABLE `special_license_authorization` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suspension_vacation_authorization`
--

DROP TABLE IF EXISTS `suspension_vacation_authorization`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `suspension_vacation_authorization` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `date_start` date NOT NULL,
  `date_end` date DEFAULT NULL,
  `number_days` int NOT NULL,
  `anio` int NOT NULL,
  `comment` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_resolution` int unsigned NOT NULL,
  `license_resolution_type` int NOT NULL,
  `suspension_document_type` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `suspension_vacation_authorization_id_resolution_foreign` (`id_resolution`),
  CONSTRAINT `suspension_vacation_authorization_id_resolution_foreign` FOREIGN KEY (`id_resolution`) REFERENCES `resolution` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suspension_vacation_authorization`
--

LOCK TABLES `suspension_vacation_authorization` WRITE;
/*!40000 ALTER TABLE `suspension_vacation_authorization` DISABLE KEYS */;
/*!40000 ALTER TABLE `suspension_vacation_authorization` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tuition_information`
--

DROP TABLE IF EXISTS `tuition_information`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tuition_information` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `number_tuition` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_certificate` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path_certificate` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_validation` int DEFAULT NULL,
  `id_user` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tuition_information_id_user_foreign` (`id_user`),
  CONSTRAINT `tuition_information_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tuition_information`
--

LOCK TABLES `tuition_information` WRITE;
/*!40000 ALTER TABLE `tuition_information` DISABLE KEYS */;
/*!40000 ALTER TABLE `tuition_information` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `university_education`
--

DROP TABLE IF EXISTS `university_education`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `university_education` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `concentration` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_university` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_begin` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `years_diff` int DEFAULT NULL,
  `months_diff` int DEFAULT NULL,
  `days_diff` int DEFAULT NULL,
  `url_certificate` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path_certificate` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_validation` int DEFAULT NULL,
  `id_user` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `id_country` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_department` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_province` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_district` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `university_education_id_user_foreign` (`id_user`),
  CONSTRAINT `university_education_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `university_education`
--

LOCK TABLES `university_education` WRITE;
/*!40000 ALTER TABLE `university_education` DISABLE KEYS */;
/*!40000 ALTER TABLE `university_education` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `profileEnable` tinyint(1) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `first_surname` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `second_surname` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vacation_authorization`
--

DROP TABLE IF EXISTS `vacation_authorization`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vacation_authorization` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `date_start` date NOT NULL,
  `date_end` date DEFAULT NULL,
  `number_days` int NOT NULL,
  `anio` int NOT NULL,
  `comment` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_resolution` int unsigned NOT NULL,
  `memorando_type` int NOT NULL,
  `license_resolution_type` int NOT NULL,
  `suspension_document_type` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vacation_authorization_id_resolution_foreign` (`id_resolution`),
  CONSTRAINT `vacation_authorization_id_resolution_foreign` FOREIGN KEY (`id_resolution`) REFERENCES `resolution` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vacation_authorization`
--

LOCK TABLES `vacation_authorization` WRITE;
/*!40000 ALTER TABLE `vacation_authorization` DISABLE KEYS */;
/*!40000 ALTER TABLE `vacation_authorization` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'escalafon'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-04-10 10:34:44

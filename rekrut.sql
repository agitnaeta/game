-- MySQL dump 10.13  Distrib 5.7.22, for Linux (x86_64)
--
-- Host: localhost    Database: rekrut
-- ------------------------------------------------------
-- Server version	5.7.22-0ubuntu0.16.04.1-log

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
-- Current Database: `rekrut`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `rekrut` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `rekrut`;

--
-- Table structure for table `cv_pelamar`
--

DROP TABLE IF EXISTS `cv_pelamar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cv_pelamar` (
  `idcv` int(11) NOT NULL AUTO_INCREMENT,
  `no_telp` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `alamat` text,
  `jenis_kelamin` varchar(1) DEFAULT NULL,
  `tempat_lahir` varchar(45) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `foto` text,
  `cv` text,
  `kemampuan_ahli` text,
  `kemampuan_menengah` text,
  `kemampuan_dasar` text,
  `bahasa` text,
  `nama` text,
  `iduser` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idcv`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cv_pelamar`
--

LOCK TABLES `cv_pelamar` WRITE;
/*!40000 ALTER TABLE `cv_pelamar` DISABLE KEYS */;
INSERT INTO `cv_pelamar` VALUES (1,'087688226611','diana@gmail.com','Situraja utara no 10 babakan bandung','l','Sumedang','2018-05-24','186b4abb8672bb509e846baf3ea9faff.jpg','4b37d44d732a03c534358babeabfb5b8.jpg','Mencangkul sawah','Membicarakan orang','menunggangi kasir','Inggris(dasar)#Indonesia(dasar)#Chinese(dasar)','Diana Rosalinda','16');
/*!40000 ALTER TABLE `cv_pelamar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `file_pelamar`
--

DROP TABLE IF EXISTS `file_pelamar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `file_pelamar` (
  `idfile` int(11) NOT NULL AUTO_INCREMENT,
  `nama_file` text,
  `path` text,
  `idcv` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idfile`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `file_pelamar`
--

LOCK TABLES `file_pelamar` WRITE;
/*!40000 ALTER TABLE `file_pelamar` DISABLE KEYS */;
INSERT INTO `file_pelamar` VALUES (1,'KTP','6c4d68389b53314281c7dc46c8a65323.png','1'),(2,'KTP','6c4d68389b53314281c7dc46c8a65323.png','1');
/*!40000 ALTER TABLE `file_pelamar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jadwal_interview`
--

DROP TABLE IF EXISTS `jadwal_interview`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jadwal_interview` (
  `idjadwal` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` datetime DEFAULT NULL,
  `keterangan` text,
  `idlamaran` varchar(45) DEFAULT NULL,
  `hasil` varchar(45) DEFAULT NULL,
  `keterangan_hasil` text,
  PRIMARY KEY (`idjadwal`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jadwal_interview`
--

LOCK TABLES `jadwal_interview` WRITE;
/*!40000 ALTER TABLE `jadwal_interview` DISABLE KEYS */;
INSERT INTO `jadwal_interview` VALUES (1,'2018-05-14 09:09:00','Silahkan datang 30 menit sebelum  waktu panggilan di, jalan buana 1 no 10\r\n','1','diterima','Silahkan masuk hari senin tanggal 20 mei 2019');
/*!40000 ALTER TABLE `jadwal_interview` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lamaran`
--

DROP TABLE IF EXISTS `lamaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lamaran` (
  `idlamaran` int(11) NOT NULL AUTO_INCREMENT,
  `idrequest` varchar(45) DEFAULT NULL,
  `iduser` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT '0 = tidak ; 1= melamar;',
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`idlamaran`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lamaran`
--

LOCK TABLES `lamaran` WRITE;
/*!40000 ALTER TABLE `lamaran` DISABLE KEYS */;
INSERT INTO `lamaran` VALUES (1,'3','16','1','2018-05-12'),(2,NULL,NULL,'0 = tidak ; 1= melamar;','2018-05-11'),(3,NULL,NULL,'0 = tidak ; 1= melamar;','2018-05-11');
/*!40000 ALTER TABLE `lamaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pendidikan`
--

DROP TABLE IF EXISTS `pendidikan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pendidikan` (
  `idpendidikan` int(11) NOT NULL AUTO_INCREMENT,
  `idcv` varchar(45) DEFAULT NULL,
  `nama_institusi` text,
  `dari` year(4) DEFAULT NULL,
  `sampai` year(4) DEFAULT NULL,
  `jenjang_pendidikan` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idpendidikan`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pendidikan`
--

LOCK TABLES `pendidikan` WRITE;
/*!40000 ALTER TABLE `pendidikan` DISABLE KEYS */;
INSERT INTO `pendidikan` VALUES (2,'2','SD Neglasari',2019,2020,'sd'),(3,'2','SMP 2 Bandung',2039,2040,'S1'),(4,'2','SD Neglasari',2019,2020,'sd'),(5,'2','SMP 2 Bandung',2018,2018,'S1'),(6,'2','SD Neglasari',2019,2020,'sd'),(10,'1','SD Neglasari',2019,2020,'sd'),(11,'1','SMP 2 Bandung',2019,2019,'smp');
/*!40000 ALTER TABLE `pendidikan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengalaman`
--

DROP TABLE IF EXISTS `pengalaman`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pengalaman` (
  `idpengalaman` int(11) NOT NULL AUTO_INCREMENT,
  `idcv` varchar(45) DEFAULT NULL,
  `posisi` varchar(45) DEFAULT NULL,
  `dari` year(4) DEFAULT NULL,
  `sampai` year(4) DEFAULT NULL,
  `deskripsi_kerja` text,
  PRIMARY KEY (`idpengalaman`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengalaman`
--

LOCK TABLES `pengalaman` WRITE;
/*!40000 ALTER TABLE `pengalaman` DISABLE KEYS */;
INSERT INTO `pengalaman` VALUES (2,'2','Pertumbuhan Karyawan',2019,2018,'Facebookan sepanjang waktu'),(3,'2','Pertumbuhan Karyawan',2019,2018,'Facebookan sepanjang waktu'),(4,'2','Pertumbuhan Karyawan',2019,2018,'Facebookan sepanjang waktu'),(7,'1','Pertumbuhan Karyawan',2019,2018,'Facebookan sepanjang waktu'),(8,'1','Direktur',2019,2020,'Facebookan sepanjang waktu');
/*!40000 ALTER TABLE `pengalaman` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `request`
--

DROP TABLE IF EXISTS `request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `request` (
  `idreq` int(11) NOT NULL AUTO_INCREMENT,
  `kebutuhan` varchar(45) DEFAULT NULL,
  `jabatan` varchar(45) DEFAULT NULL,
  `level` varchar(45) DEFAULT NULL,
  `jumlah_kebutuhan` int(11) DEFAULT NULL,
  `usia` int(11) DEFAULT NULL,
  `agama` varchar(45) DEFAULT NULL,
  `etnis` varchar(45) DEFAULT NULL,
  `pendidikan` varchar(45) DEFAULT NULL,
  `status_perkawinan` varchar(45) DEFAULT NULL,
  `pengalaman` text,
  `deskripsi_jabatan` text,
  `alasan_kebutuhan` text,
  `request_by` varchar(45) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `jenis_kelamin` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`idreq`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `request`
--

LOCK TABLES `request` WRITE;
/*!40000 ALTER TABLE `request` DISABLE KEYS */;
INSERT INTO `request` VALUES (1,'penggantian','Developer','staff',1,26,'islam,protestan,katolik,budha,hindu','Sunda','d2,d3,s2','kawin','Pengalaman minimal jadi supir selama 5 tahun','suruh cat rumah','males kerja\r\n','1',NULL,3,'l'),(2,'penggantian','Developer','staff',3,26,'islam,protestan,katolik,budha,hindu','Sunda','d2,d3,s2','kawin','Pengalaman minimal jadi supir selama 5 tahun','suruh cat rumah','males kerja\r\n','1',NULL,2,'l'),(3,'penambahan','Admin Gudang','middle',2,24,'protestan,katolik','Sunda','d2,d3,s1','kawin','Jadi staff admin ','admin staff','kekurangan orang untuk input\r\n','4','2018-05-11',1,'l');
/*!40000 ALTER TABLE `request` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `role` varchar(45) DEFAULT NULL,
  `password` text,
  `username` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Administrator','0','admin','admin'),(2,'Hrdbaru','1','hrdbaru123','Hrdbaru'),(4,'Gudang','2','admingudang','admingudang'),(10,'Penerimaan','2','biarkanaku1','penerimaan'),(11,'Teknisi','2','something','teknisi'),(12,'Pengadaan','2','pengadaan','pengadaan'),(13,'Pengiriman','2','pengiriman','pengiriman'),(15,'pelamar','3','pelamarbaru','pelamar'),(16,'Diana Rosalina','3','dianarosalina','dianarosalina'),(17,'Rinaldi maulana','3','rinaldimaulana','rinaldimaulana'),(18,'rikardo','3','rikardosalamposo','rikardo'),(19,'management','4','management','management');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-14 21:20:11

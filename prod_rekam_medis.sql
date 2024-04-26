/*
SQLyog Professional v13.1.1 (64 bit)
MySQL - 8.0.30 : Database - prod_rekam_medis
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`prod_rekam_medis` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `prod_rekam_medis`;

/*Table structure for table `obat` */

DROP TABLE IF EXISTS `obat`;

CREATE TABLE `obat` (
  `id_data_obat` int NOT NULL AUTO_INCREMENT,
  `nama_obat` varchar(25) NOT NULL,
  `kategori` varchar(30) NOT NULL,
  `stok` varchar(15) NOT NULL,
  `harga` varchar(20) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_data_obat`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `obat` */

insert  into `obat`(`id_data_obat`,`nama_obat`,`kategori`,`stok`,`harga`,`keterangan`) values 
(1,'Paracetamol','Obat Sedang','82','6000','Obat penurun panas dan pereda nyeri'),
(3,'Promag','Obat Ringan','90','4000','Obat untuk meredakan sakit pada lambung/perut');

/*Table structure for table `pasien` */

DROP TABLE IF EXISTS `pasien`;

CREATE TABLE `pasien` (
  `id_pasien` int NOT NULL AUTO_INCREMENT,
  `no_kartu` varchar(255) DEFAULT NULL,
  `nama_pasien` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `umur` varchar(255) DEFAULT NULL,
  `no_telepon` varchar(255) DEFAULT NULL,
  `alamat` text,
  `pekerjaan` varchar(255) DEFAULT NULL,
  `data_state` int DEFAULT NULL,
  PRIMARY KEY (`id_pasien`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `pasien` */

insert  into `pasien`(`id_pasien`,`no_kartu`,`nama_pasien`,`jenis_kelamin`,`umur`,`no_telepon`,`alamat`,`pekerjaan`,`data_state`) values 
(1,'20230111-1','Risko','Laki-laki','18','08123456890','Karanganyar','Mahasiswa',0),
(2,'20230111-2','Nadia','Perempuan','17','08123456891','Surakarta','Mahasiswi',0),
(3,'20230111-3','Putri','Perempuan','18','081234567654','Sukoharjo','Pegawai Bank',0);

/*Table structure for table `pembayaran` */

DROP TABLE IF EXISTS `pembayaran`;

CREATE TABLE `pembayaran` (
  `id_pembayaran` bigint NOT NULL AUTO_INCREMENT,
  `id_rekam_medis` int DEFAULT NULL,
  `id_pasien` int DEFAULT NULL,
  `tanggal_pembayaran` date DEFAULT NULL,
  `subtotal` decimal(10,0) DEFAULT NULL,
  `bayar` decimal(10,0) DEFAULT NULL,
  `kembalian` decimal(10,0) DEFAULT NULL,
  `data_state` int DEFAULT '0',
  PRIMARY KEY (`id_pembayaran`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `pembayaran` */

insert  into `pembayaran`(`id_pembayaran`,`id_rekam_medis`,`id_pasien`,`tanggal_pembayaran`,`subtotal`,`bayar`,`kembalian`,`data_state`) values 
(1,3,1,'2024-02-05',110000,100000,10000,0),
(5,1,1,'2024-02-05',110000,110000,0,0);

/*Table structure for table `rekam_medis` */

DROP TABLE IF EXISTS `rekam_medis`;

CREATE TABLE `rekam_medis` (
  `id_rekam_medis` int NOT NULL AUTO_INCREMENT,
  `no_rm` varchar(255) DEFAULT NULL,
  `id_pasien` int DEFAULT NULL,
  `amnesa` text,
  `diagnosa` text,
  `tanggal_periksa` date DEFAULT NULL,
  `tindakan` varchar(255) DEFAULT NULL,
  `status_bayar` int DEFAULT NULL,
  `data_state` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_rekam_medis`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `rekam_medis` */

insert  into `rekam_medis`(`id_rekam_medis`,`no_rm`,`id_pasien`,`amnesa`,`diagnosa`,`tanggal_periksa`,`tindakan`,`status_bayar`,`data_state`,`created_at`) values 
(2,'RM0002',3,'sakit gigi','sakit gigi','2024-02-04','cabut',0,0,NULL),
(3,'RM0003',1,'sakit gigi','sakit ','2024-02-05','cabut gigi',1,0,NULL),
(4,'RM0004',2,'sakit gigi','sakit gigi','2024-02-07','cabut gigi',0,0,NULL);

/*Table structure for table `rekam_medis_obat` */

DROP TABLE IF EXISTS `rekam_medis_obat`;

CREATE TABLE `rekam_medis_obat` (
  `id_rekam_medis_obat` bigint NOT NULL AUTO_INCREMENT,
  `id_rekam_medis` int DEFAULT NULL,
  `id_data_obat` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_rekam_medis_obat`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `rekam_medis_obat` */

insert  into `rekam_medis_obat`(`id_rekam_medis_obat`,`id_rekam_medis`,`id_data_obat`,`quantity`,`created_at`) values 
(1,1,1,5,NULL),
(2,1,3,5,NULL),
(3,2,1,3,NULL),
(4,3,3,5,NULL),
(5,3,1,5,NULL),
(6,4,1,5,NULL);

/*Table structure for table `rekam_medis_tarif` */

DROP TABLE IF EXISTS `rekam_medis_tarif`;

CREATE TABLE `rekam_medis_tarif` (
  `id_rekam_medis_tarif` bigint NOT NULL AUTO_INCREMENT,
  `id_rekam_medis` int DEFAULT NULL,
  `id_data_tarif` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_rekam_medis_tarif`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `rekam_medis_tarif` */

insert  into `rekam_medis_tarif`(`id_rekam_medis_tarif`,`id_rekam_medis`,`id_data_tarif`,`created_at`) values 
(1,1,3,NULL),
(2,2,3,NULL),
(3,3,3,NULL),
(4,4,2,NULL);

/*Table structure for table `tarif` */

DROP TABLE IF EXISTS `tarif`;

CREATE TABLE `tarif` (
  `id_data_tarif` int NOT NULL AUTO_INCREMENT,
  `nama_jasa` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  PRIMARY KEY (`id_data_tarif`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `tarif` */

insert  into `tarif`(`id_data_tarif`,`nama_jasa`,`harga`,`keterangan`) values 
(2,'Operasi','500000','Sembuh dalam 7 hari'),
(3,'Cabut  Gigi','100000','plus suntik'),
(4,'Suntik','100000','suntik');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `level` enum('1','2','3') DEFAULT NULL,
  `data_state` int DEFAULT '0',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `user` */

insert  into `user`(`id_user`,`username`,`password`,`nama`,`level`,`data_state`) values 
(1,'Admin','25d55ad283aa400af464c76d713c07ad','Admin','1',0),
(3,'Dokter','e10adc3949ba59abbe56e057f20f883e','Dokter','2',0),
(4,'Apoteker','827ccb0eea8a706c4c34a16891f84e7b','Apoteker','3',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

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
(1,'Paracetamol','Obat Sedang','30','6000','Obat penurun panas dan pereda nyeri'),
(3,'Promag','Obat Ringan','13','4000','Obat untuk meredakan sakit pada lambung/perut');

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

/*Table structure for table `rekam_medis` */

DROP TABLE IF EXISTS `rekam_medis`;

CREATE TABLE `rekam_medis` (
  `id_rekam_medis` int NOT NULL AUTO_INCREMENT,
  `id_pasien` int DEFAULT NULL,
  `amnesa` text,
  `diagnosa` text,
  `tanggal_periksa` date DEFAULT NULL,
  `tindakan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_rekam_medis`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `rekam_medis` */

/*Table structure for table `rekam_medis_obat` */

DROP TABLE IF EXISTS `rekam_medis_obat`;

CREATE TABLE `rekam_medis_obat` (
  `id_obat_rekam_medis` bigint NOT NULL AUTO_INCREMENT,
  `id_rekam_medis` int DEFAULT NULL,
  `id_data_tarif` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_obat_rekam_medis`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `rekam_medis_obat` */

/*Table structure for table `rekam_medis_tarif` */

DROP TABLE IF EXISTS `rekam_medis_tarif`;

CREATE TABLE `rekam_medis_tarif` (
  `id_tarif_rekam_medis` bigint NOT NULL AUTO_INCREMENT,
  `id_rekam_medis` int DEFAULT NULL,
  `id_data_tarif` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_tarif_rekam_medis`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `rekam_medis_tarif` */

/*Table structure for table `tarif` */

DROP TABLE IF EXISTS `tarif`;

CREATE TABLE `tarif` (
  `id_data_tarif` int NOT NULL AUTO_INCREMENT,
  `nama_jasa` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  PRIMARY KEY (`id_data_tarif`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `tarif` */

insert  into `tarif`(`id_data_tarif`,`nama_jasa`,`harga`,`keterangan`) values 
(2,'Operasi','500000','Sembuh dalam 7 hari'),
(3,'Cabut  Gigi','100000','plus suntik');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `level` enum('1','2','3') DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `user` */

insert  into `user`(`id_user`,`username`,`password`,`nama`,`level`) values 
(1,'Sayyid','25d55ad283aa400af464c76d713c07ad','Sayyid','1');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

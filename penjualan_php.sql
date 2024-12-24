-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping data for table penjualan_php.buku: 11 rows
/*!40000 ALTER TABLE `buku` DISABLE KEYS */;
INSERT INTO `buku` (`id`, `id_penerbit`, `judul`, `pengarang`, `tahun_terbit`, `harga`, `stok`, `gambar`) VALUES
	(39, 2, 'Kata', 'Nadhifa Allya Tsana', '2018', 150000, 100, '303-Kata-Rintik-Sedu.jpg'),
	(38, 3, 'Rentang Kisah', 'Gita Savitri', '2017', 50000, 50, '734-Rentang-Kisah.jpg'),
	(37, 4, 'Dia Adalah Kakakku', 'Tere Liye', '2009', 100000, 100, '258-Dia-adalah-Kakakku-1.jpg'),
	(36, 5, 'Aroma Karsa', 'Dee Lestari', '2000', 100000, 200, '981-aroma-karsa-1.jpg'),
	(35, 6, 'Garis Waktu: Sebuah Perjalanan Menghapus Luka', 'Fiersa Besari', '2016', 215000, 10, '139-Garis-Waktu-Sebuah-Perjalanan-Menghapus-Luka.jpg'),
	(34, 6, '11:11', 'Fiersa Besari ', '2018', 140000, 100, '742-1111.jpg'),
	(33, 7, 'Kids Zaman Neo', ' Anodia Shula Neona Ayu', '2018', 180000, 192, '673-Kids-Zaman-Neo.jpg'),
	(45, 4, 'Bumi', 'Liye', '2019', 100000, 10, '193-bumi.png'),
	(44, 8, 'Sapiens', 'Yuval Noah Harari', '2011', 130000, 20, '554-sapiens.png'),
	(53, 4, 'Rembulan Tenggelam Di Wajahmu', 'Liye', '2021', 90000, 10, '731-rembulan.png'),
	(55, 9, 'Sejarah Dunia Yang Disembunyikan', 'Jonathan Black', '2015', 150000, 10, '202-sejarahdunia.jpg');
/*!40000 ALTER TABLE `buku` ENABLE KEYS */;

-- Dumping data for table penjualan_php.detail_transaksi: 11 rows
/*!40000 ALTER TABLE `detail_transaksi` DISABLE KEYS */;
INSERT INTO `detail_transaksi` (`ID`, `no_transaksi`, `ID_buku`, `harga`, `jumlah_beli`, `subtotal`) VALUES
	(137, 'TRS007', 39, 150000, 1, 150000),
	(138, 'TRS007', 35, 215000, 3, 645000),
	(139, 'TRS008', 45, 100000, 2, 200000),
	(140, 'TRS008', 44, 130000, 3, 390000),
	(94, 'TRS006', 44, 130000, 2, 260000),
	(93, 'TRS006', 45, 100000, 1, 100000),
	(92, 'TRS005', 36, 100000, 1, 100000),
	(91, 'TRS004', 44, 130000, 2, 260000),
	(89, 'TRS003', 34, 140000, 2, 280000),
	(88, 'TRS002', 36, 100000, 2, 200000),
	(87, 'TRS001', 36, 100000, 2, 200000);
/*!40000 ALTER TABLE `detail_transaksi` ENABLE KEYS */;

-- Dumping data for table penjualan_php.head_transaksi: 8 rows
/*!40000 ALTER TABLE `head_transaksi` DISABLE KEYS */;
INSERT INTO `head_transaksi` (`no_transaksi`, `tanggal`, `total`) VALUES
	('TRS001', '2024-12-02', 200000),
	('TRS002', '2024-12-02', 200000),
	('TRS008', '2024-12-17', 590000),
	('TRS007', '2024-12-11', 795000),
	('TRS006', '2024-12-04', 360000),
	('TRS005', '2024-12-04', 100000),
	('TRS004', '2024-12-03', 260000),
	('TRS003', '2024-12-02', 280000);
/*!40000 ALTER TABLE `head_transaksi` ENABLE KEYS */;

-- Dumping data for table penjualan_php.penerbit: ~9 rows (approximately)
INSERT INTO `penerbit` (`id`, `nama_penerbit`) VALUES
	(2, 'Nadhifa Allya Tsana'),
	(3, 'Gita Savitri'),
	(4, 'Tere Liye'),
	(5, 'Dee Lestari'),
	(6, 'Fiersa Besari'),
	(7, ' Anodia Shula Neona Ayu'),
	(8, 'Dvir Publishing House Ltd'),
	(9, 'Pustaka Alvabet'),
	(12, 'PT Kompas Media Nusantara');

-- Dumping data for table penjualan_php.user: 1 rows
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`username`, `password`, `hak_akses`, `nama`) VALUES
	('admin', 'admin', 'admin', 'Farrel');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

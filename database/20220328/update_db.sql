ALTER TABLE `rak`
	DROP COLUMN `id_buku`,
	DROP FOREIGN KEY `rak_ibfk_1`;

ALTER TABLE `buku`
	ADD COLUMN `id_rak` INT(11) NULL DEFAULT NULL AFTER `id_buku`;
	
INSERT INTO `rak` (`id_rak`, `nama_rak`, `lokasi_rak`) VALUES (1, 'General', 'Blok A');
INSERT INTO `rak` (`id_rak`, `nama_rak`, `lokasi_rak`) VALUES (2, 'Matematika', 'Blok A');
INSERT INTO `rak` (`id_rak`, `nama_rak`, `lokasi_rak`) VALUES (3, 'Hoby', 'Blok B');
INSERT INTO `rak` (`id_rak`, `nama_rak`, `lokasi_rak`) VALUES (4, 'Komputer', 'Blok B');
INSERT INTO `rak` (`id_rak`, `nama_rak`, `lokasi_rak`) VALUES (5, 'Sosial', 'Blok C');
INSERT INTO `rak` (`id_rak`, `nama_rak`, `lokasi_rak`) VALUES (6, 'Ekonomi', 'Blok C');
INSERT INTO `rak` (`id_rak`, `nama_rak`, `lokasi_rak`) VALUES (7, 'Sains', 'Blok C');

ALTER TABLE `buku`
	ADD COLUMN `harga_per_hari` INT(11) NOT NULL DEFAULT 0 AFTER `tahun_penerbit`;

ALTER TABLE `pengembalian`
	ADD COLUMN `total_pembayaran` INT(11) NOT NULL AFTER `tanggal_pengembalian`;
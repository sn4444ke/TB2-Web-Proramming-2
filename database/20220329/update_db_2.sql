ALTER TABLE `pengembalian`
	ADD COLUMN `id_peminjaman` INT(11) NULL DEFAULT NULL AFTER `id_pengembalian`,
	CHANGE COLUMN `total_pembayaran` `total_pembayaran` INT(11) NOT NULL AFTER `tanggal_pengembalian`;

RENAME TABLE `peminjam` TO `peminjaman`;

ALTER TABLE `pengembalian`
	ADD COLUMN `id_peminjaman` INT(11) NULL DEFAULT NULL AFTER `id_pengembalian`,
	CHANGE COLUMN `total_pembayaran` `total_pembayaran` INT(11) NOT NULL AFTER `tanggal_pengembalian`;
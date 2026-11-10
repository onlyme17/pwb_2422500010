-- Migrasi aman tabel pelanggan untuk tugas Front-End Pelanggan.
-- BACKUP database terlebih dahulu. Jalankan satu kali pada database pwb_2422500010.
-- Skrip ini memeriksa nama kolom sebelum mengubah; tidak menghapus baris pelanggan.
SET @db_name = DATABASE();

SET @sql = (
  SELECT IF(
    EXISTS(SELECT 1 FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA=@db_name AND TABLE_NAME='pelanggan' AND COLUMN_NAME='nama')
    AND NOT EXISTS(SELECT 1 FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA=@db_name AND TABLE_NAME='pelanggan' AND COLUMN_NAME='nama_pelanggan'),
    'ALTER TABLE pelanggan CHANGE COLUMN nama nama_pelanggan VARCHAR(100) NOT NULL',
    'SELECT ''Kolom nama_pelanggan sudah sesuai atau tabel belum tersedia'' AS info'
  )
);
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

SET @sql = (
  SELECT IF(
    EXISTS(SELECT 1 FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA=@db_name AND TABLE_NAME='pelanggan' AND COLUMN_NAME='telepon')
    AND NOT EXISTS(SELECT 1 FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA=@db_name AND TABLE_NAME='pelanggan' AND COLUMN_NAME='telp_pelanggan'),
    'ALTER TABLE pelanggan CHANGE COLUMN telepon telp_pelanggan VARCHAR(20) DEFAULT NULL',
    'SELECT ''Kolom telp_pelanggan sudah sesuai atau tabel belum tersedia'' AS info'
  )
);
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

SET @sql = (
  SELECT IF(
    NOT EXISTS(SELECT 1 FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA=@db_name AND TABLE_NAME='pelanggan' AND COLUMN_NAME='password'),
    'ALTER TABLE pelanggan ADD COLUMN password VARCHAR(255) DEFAULT NULL',
    'SELECT ''Kolom password sudah tersedia'' AS info'
  )
);
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

SET @sql = (
  SELECT IF(
    NOT EXISTS(SELECT 1 FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA=@db_name AND TABLE_NAME='pelanggan' AND COLUMN_NAME='kota'),
    'ALTER TABLE pelanggan ADD COLUMN kota VARCHAR(100) DEFAULT NULL',
    'SELECT ''Kolom kota sudah tersedia'' AS info'
  )
);
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

SET @sql = (
  SELECT IF(
    NOT EXISTS(SELECT 1 FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA=@db_name AND TABLE_NAME='pelanggan' AND COLUMN_NAME='kode_pos'),
    'ALTER TABLE pelanggan ADD COLUMN kode_pos VARCHAR(10) DEFAULT NULL',
    'SELECT ''Kolom kode_pos sudah tersedia'' AS info'
  )
);
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

SET @sql = (
  SELECT IF(
    NOT EXISTS(SELECT 1 FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA=@db_name AND TABLE_NAME='pelanggan' AND COLUMN_NAME='provinsi'),
    'ALTER TABLE pelanggan ADD COLUMN provinsi VARCHAR(100) DEFAULT NULL',
    'SELECT ''Kolom provinsi sudah tersedia'' AS info'
  )
);
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

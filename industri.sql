-- Import file ini lewat phpMyAdmin (tab Import) atau tempel di tab SQL
CREATE DATABASE IF NOT EXISTS latihan;
USE latihan;

DROP TABLE IF EXISTS industri;

CREATE TABLE industri (
    id INT AUTO_INCREMENT PRIMARY KEY,
    longitude DECIMAL(10,6) NOT NULL,
    latitude DECIMAL(10,6) NOT NULL,
    kelompok_usaha VARCHAR(100) NOT NULL,
    jenis_usaha VARCHAR(100) NOT NULL,
    jumlah_tenaga_kerja INT NOT NULL,
    jumlah_produksi VARCHAR(100) NOT NULL
);

INSERT INTO industri (longitude, latitude, kelompok_usaha, jenis_usaha, jumlah_tenaga_kerja, jumlah_produksi) VALUES
(110.222, -7.460, 'industri_tekstil', 'Batik',          1,  '10 Pcs Perbulan'),
(110.221, -7.461, 'industri_tekstil', 'Sarung Tenun',   30, '50 Pcs Perminggu'),
(110.226, -7.465, 'industri_tekstil', 'Batik',          4,  '10 pcs'),
(110.225, -7.457, 'industri_makanan', 'Industri Tempe', 3,  '400 kg'),
(110.224, -7.455, 'industri_makanan', 'Industri Tempe', 3,  '250 Kg');

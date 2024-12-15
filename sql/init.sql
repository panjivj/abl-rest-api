CREATE TABLE barang (
    Kode INT PRIMARY KEY AUTO_INCREMENT,
    Nama VARCHAR(100),
    Jenis VARCHAR(50),
    Harga INT,
    Stok INT
);

INSERT INTO barang (Nama, Jenis, Harga, Stok) VALUES
('Buku Komputer', 'Alat tulis', 15000, 1000),
('Pensil', 'Alat tulis', 5000, 5000),
('Tas Gendong', 'Tas', 250000, 30),
('Seragam', 'Pakaian', 200000, 500),
('Sepatu', 'Alas kaki', 100000, 100);

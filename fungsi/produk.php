<?php
    class Produk {
        //Member1 Variable
        private $koneksi;
        // Member2 Konstruktor
        public function __construct()
        {
            global $conn;
            $this->koneksi = $conn;    
        }
        //  Member3 Method CRUD
        public function dataProduk(){
            $sql = "SELECT produk.*, kategori_produk.nama AS kategori FROM produk
                    INNER JOIN kategori_produk ON kategori_produk.id = produk.kategori_produk_id";
            // Preprae Statement PDO
            $ps = $this->koneksi->prepare($sql);
            $ps->execute();
            $rs = $ps->fetchAll();
            return $rs; 
        }
        public function viewProduk($id){
            $sql = "SELECT produk.*, kategori_produk.nama AS kategori FROM produk
                    INNER JOIN kategori_produk ON kategori_produk.id = produk.kategori_produk_id
                    WHERE produk.id = ?;";
            // Preprae Statement PDO
            $ps = $this->koneksi->prepare($sql);
            $ps->execute([$id]);
            $rs = $ps->fetchAll();
            return $rs[0];
        }

        public function viewForm($id){
            $sql = "SELECT produk.*, kategori_produk.nama AS kategori FROM produk
                    INNER JOIN kategori_produk ON kategori_produk.id = produk.kategori_produk_id
                    WHERE produk.id = ?;";
            // Preprae Statement PDO
            $ps = $this->koneksi->prepare($sql);
            $ps->execute([$id]);
            $rs = $ps->fetch();
            return;
        }

        public function dataKategori_produk(){
            $sql = "SELECT * FROM kategori_produk";
            // Fungsi query eksekusi query serta mengambil datanya
            $rs = $this->koneksi->query($sql);
            return $rs; 
        }

        public function simpan($pesanan){
            $sql = "INSERT INTO pesanan(tanggal,nama_pemesan,alamat_pemesan,no_hp,email,jumlah_pesanan,deskripsi_text,produk_id)
                    VALUES (?,?,?,?,?,?,?,?)";
            // Preprae Statement PDO
            $ps = $this->koneksi->prepare($sql);
            $ps->execute($pesanan);

    }

}
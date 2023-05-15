<?php
 require_once '../fungsi/koneksi.php';

 $input_id = $_POST['input-id'];
 $input_tanggal = $_POST['input-tanggal'];
 $input_nama = $_POST['input-nama'];
 $input_alamat = $_POST['input-alamat'];
 $input_nohp = $_POST['input-nomorhp'];
 $input_email = $_POST['input-email'];
 $input_jumlahpesanan = $_POST['input-jumlahpesanan'];
 $input_deskripsi = $_POST['input-deskripsi'];


$_proses = $_POST['proses'];

$produk_id = $_GET['id'];

$ar_data[]=$input_id;
$ar_data[]=$input_tanggal;
$ar_data[]=$input_nama;
$ar_data[]=$input_nohp;
$ar_data[]=$input_email;
$ar_data[]=$input_jumlahpesanan;
$ar_data[]=$input_deskripsi;


if($_proses == "Simpan"){
    $sql ="INSERT INTO pesanan (tanggal,nama_pemesan,alamat_pemesan,no_hp,email,jumlah_pesanan,deskripsi_text) VALUES (?,?,?,?,?,?,?)";
    }else if($_proses == "update"){
        $ar_data[]=$_POST['id'];
        $sql = "UPDATE pesanan SET tanggal=?,nama=?,alamat_pemesan=?,no_hp=?,
        email=?,jumlah_pesanan=?,deskripsi_text=? WHERE id=?";
    }
    if(isset($sql)){
        $st = $conn ->prepare($sql);
        $st->execute($ar_data);
    }


    header('location:index.php')
?>
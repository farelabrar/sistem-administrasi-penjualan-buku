<?php
session_start();
include 'konfig.php';

if(isset($_GET['id']) && isset($_GET['no_transaksi']) && isset($_GET['qty'])) {
    $id = $_GET['id'];
    $no_transaksi = $_GET['no_transaksi'];
    $qty_to_reduce = (int)$_GET['qty'];

    // Ambil data detail transaksi saat ini
    $query_cek = "SELECT * FROM detail_transaksi WHERE ID = '$id'";
    $result_cek = mysqli_query($koneksi, $query_cek);
    $data = mysqli_fetch_assoc($result_cek);

    if($data['jumlah_beli'] > $qty_to_reduce) {
        // Kurangi sejumlah qty yang ditentukan
        $jumlah_baru = $data['jumlah_beli'] - $qty_to_reduce;
        
        // Hitung kembali subtotal berdasarkan jumlah baru
        $subtotal_baru = $jumlah_baru * ($data['subtotal'] / $data['jumlah_beli']);

        // Update detail transaksi
        $query_update = "UPDATE detail_transaksi 
                         SET jumlah_beli = '$jumlah_baru', 
                             subtotal = '$subtotal_baru' 
                         WHERE ID = '$id'";
        mysqli_query($koneksi, $query_update);
    } elseif($data['jumlah_beli'] <= $qty_to_reduce) {
        // Jika qty yang ingin dikurangi lebih besar atau sama dengan jumlah yang ada, hapus item tersebut
        $query_hapus = "DELETE FROM detail_transaksi WHERE ID = '$id'";
        mysqli_query($koneksi, $query_hapus);
    }

    // Redirect kembali ke halaman transaksi
    header("Location: transaksi.php");
    exit();
}
?>
<?php
require('fpdf/fpdf.php');

// Koneksi database
$conn = mysqli_connect("localhost", "root", "", "penjualan_php"); 

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Ambil no_transaksi dari URL
$no_transaksi = $_GET['no_transaksi'];

// Query untuk data transaksi utama
$query_trans = "SELECT * FROM head_transaksi WHERE no_transaksi = '$no_transaksi'";
$result_trans = mysqli_query($conn, $query_trans);
$data_trans = mysqli_fetch_assoc($result_trans);

if (!$data_trans) {
    die("Data transaksi tidak ditemukan");
}

// Query untuk detail transaksi
$query_detail = "SELECT dt.*, b.judul, b.harga 
                 FROM detail_transaksi dt
                 JOIN buku b ON dt.ID_buku = b.id
                 WHERE dt.no_transaksi = '$no_transaksi'";
$result_detail = mysqli_query($conn, $query_detail);

// Buat PDF
$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();

// Header struk
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(190, 10, 'STRUK PEMBELIAN BUKU', 0, 1, 'C');
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(190, 10, 'Toko Buku Suka Maju', 0, 1, 'C');
$pdf->Cell(190, 5, 'Jl. Ketintang No. 7', 0, 1, 'C');
$pdf->Ln(10);

// Info transaksi
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(30, 5, 'No Transaksi:', 0, 0);
$pdf->Cell(160, 5, $no_transaksi, 0, 1);
$pdf->Cell(30, 5, 'Tanggal:', 0, 0);
$pdf->Cell(160, 5, date('d-m-Y', strtotime($data_trans['tanggal'])), 0, 1);
$pdf->Ln(5);

// Header tabel
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(10, 7, 'No', 1, 0, 'C');
$pdf->Cell(80, 7, 'Judul Buku', 1, 0, 'C');
$pdf->Cell(25, 7, 'Jumlah', 1, 0, 'C');
$pdf->Cell(35, 7, 'Harga', 1, 0, 'C');
$pdf->Cell(40, 7, 'Subtotal', 1, 1, 'C');

// Isi tabel
$pdf->SetFont('Arial', '', 10);
$no = 1;
$total = 0;

while($row = mysqli_fetch_assoc($result_detail)) {
    $pdf->Cell(10, 7, $no, 1, 0, 'C');
    $pdf->Cell(80, 7, $row['judul'], 1, 0);
    $pdf->Cell(25, 7, $row['jumlah_beli'], 1, 0, 'C');
    $pdf->Cell(35, 7, 'Rp '.number_format($row['harga'],0,',','.'), 1, 0, 'R');
    $pdf->Cell(40, 7, 'Rp '.number_format($row['subtotal'],0,',','.'), 1, 1, 'R');
    $no++;
    $total += $row['subtotal'];
}

// Total
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(150, 7, 'Total', 1, 0, 'R');
$pdf->Cell(40, 7, 'Rp '.number_format($total,0,',','.'), 1, 1, 'R');

// Output PDF
$pdf->Output('D', 'Struk_'.$no_transaksi.'.pdf');
?>
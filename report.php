<?php
include('koneksi.php');  //me-load file lain
require_once("dompdf/autoload.inc.php");  //me-load file lain
use Dompdf\Dompdf;  //me-load file lain
$dompdf = new Dompdf(); //deklarasi var dompdf
$query = mysqli_query($koneksi, "SELECT * FROM tb_siswa"); //deklarasi var dengan query db
$html = '<center><h3>Daftar Nama Siswa</h3></center><hr/><br/>'; //menulis text
//menulis text pada var html
$html .= '<table border="1" width="100%">
  <tr>
  <th>No</th>
  <th>Nama</th>
  <th>Kelas</th>
  <th>Alamat</th>
  </tr>';
$no = 1; //deklarasi var no
while($row = mysqli_fetch_array($query)) //deklarasi sitkon terhadap var row dengan query db
{
  //menuliskan text dengan mengambil data dari query pada db
$html .= "<tr>
  <td>".$no."</td>
  <td>".$row['nama']."</td>
  <td>".$row['kelas']."</td>
  <td>".$row['alamat']."</td>
  </tr>";
  $no++; //deklarasi var no agar terus bertambah
}
$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf ->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf ->render();
// Melakukan output file Pdf
$dompdf->stream('Laporan_siswa.pdf');
?>

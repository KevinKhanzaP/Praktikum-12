<?php
include('koneksiform.php'); //me-load file lain
require_once("dompdf/autoload.inc.php"); //me-load file lain
use Dompdf\Dompdf; //me-load file lain
$dompdf = new Dompdf(); //deklarasi var dompdf
$query = mysqli_query($conn, "SELECT * FROM formpd"); //deklarasi var dengan query db
$html = '<center><h3>Formulir Peserta Didik</h3></center><hr/><br/>'; //menulis text
//menulis text pada var html
$html .= '<table border="1" width="100%">
  <tr>
  <th>No</th>
  <th>Nama Lengkap</th>
  <th>Kelas</th>
  <th>Jenis Pendaftaran</th>
  <th>Tanggal Masuk Sekolah</th>
  <th>NIS</th>
  <th>No Peserta Ujian</th>
  <th>PAUD</th>
  <th>TK</th>
  <th>SKHUN</th>
  <th>Ijazah</th>
  <th>Hobi</th>
  <th>Cita-cita</th>
  <th>Jenis Kelamin</th>
  <th>NISN</th>
  <th>NIK</th>
  <th>Tanggal Lahir</th>
  <th>Tempat Lahir</th>
  <th>Kebutuhan Khusus</th>
  <th>Alamat Jalan</th>
  <th>Tanggal Masuk Sekolah</th>
  <th>Dusun</th>
  <th>Kelurahan/Desa</th>
  <th>RT</th>
  <th>RW</th>
  <th>Kecamatan</th>
  <th>Tempat Tinggal</th>
  <th>Moda Transportasi</th>
  <th>No HP</th>
  <th>No Telepon</th>
  <th>Email</th>
  <th>Penerima KPS/PKH/KIP</th>
  <th>No KPS/PKH/KIP</th>
  <th>Kewarganegaraan</th>
  <th>Nama Negara</th>
  </tr>';
$no = 1; //deklarasi var no
while($row = mysqli_fetch_array($query)) //deklarasi sitkon terhadap var row dengan query db
{
  //menuliskan text dengan mengambil data dari query pada db
$html .= "<tr>
  <td>".$no."</td>
  <td>".$row['nama']."</td>
  <td>".$row['jpen']."</td>
  <td>".$row['tglmsk']."</td>
  <td>".$row['paud']."</td>
  <td>".$row['tk']."</td>
  <td>".$row['nis']."</td>
  <td>".$row['npu']."</td>
  <td>".$row['skhun']."</td>
  <td>".$row['ijazah']."</td>
  <td>".$row['hobi']."</td>
  <td>".$row['cita']."</td>
  <td>".$row['jk']."</td>
  <td>".$row['agama']."</td>
  <td>".$row['nisn']."</td>
  <td>".$row['nik']."</td>
  <td>".$row['tmptlhr']."</td>
  <td>".$row['tgllhr']."</td>
  <td>".$row['khusus']."</td>
  <td>".$row['almtjln']."</td>
  <td>".$row['tglmsk']."</td>
  <td>".$row['dsn']."</td>
  <td>".$row['keldes']."</td>
  <td>".$row['rt']."</td>
  <td>".$row['rw']."</td>
  <td>".$row['kec']."</td>
  <td>".$row['tmpttgl']."</td>
  <td>".$row['moda']."</td>
  <td>".$row['nmrhp']."</td>
  <td>".$row['nmrtlp']."</td>
  <td>".$row['email']."</td>
  <td>".$row['kps']."</td>
  <td>".$row['nokps']."</td>
  <td>".$row['kwn']."</td>
  <td>".$row['namangr']."</td>
  </tr>";
  $no++; //deklarasi var no agar bertambah terus
}
$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf ->setPaper('A4', 'landscape');
// Rendering dari HTML Ke PDF
$dompdf ->render();
// Melakukan output file Pdf
$dompdf->stream('Laporan_Formpd.pdf');
?>

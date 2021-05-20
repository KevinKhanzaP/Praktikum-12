<?php
  include('koneksi.php'); //me-load file lain
  require 'vendor/autoload.php'; //me-load file lain
  use PhpOffice\PhpSpreadsheet\Spreadsheet; //memanggil namespace
  use PhpOffice\PhpSpreadsheet\Writer\Xlsx; //memanggil namespace

  $spreadsheet = new Spreadsheet(); //deklarasi variabel
  $sheet = $spreadsheet->getActiveSheet(); //deklarasi membuat excel
  //deklarasi posisi cell pada setiap data
  $sheet->setCellValue('A1', 'No');
  $sheet->setCellValue('B1', 'Nama Lengkap');
  $sheet->setCellValue('C1', 'Jenis Pendaftaran');
  $sheet->setCellValue('D1', 'Tanggal Masuk Sekolah');
  $sheet->setCellValue('F1', 'NIS');
  $sheet->setCellValue('G1', 'No Peserta Ujian');
  $sheet->setCellValue('H1', 'PAUD');
  $sheet->setCellValue('I1', 'TK');
  $sheet->setCellValue('J1', 'SKHUN');
  $sheet->setCellValue('K1', 'Ijazah');
  $sheet->setCellValue('L1', 'Hobi');
  $sheet->setCellValue('M1', 'Cita-cita');
  $sheet->setCellValue('N1', 'Jenis Kelamin');
  $sheet->setCellValue('O1', 'NISN');
  $sheet->setCellValue('P1', 'NIK');
  $sheet->setCellValue('Q1', 'Tanggal Lahir');
  $sheet->setCellValue('R1', 'Tempat Lahir');
  $sheet->setCellValue('S1', 'Agama');
  $sheet->setCellValue('T1', 'Kebutuhan Khusus');
  $sheet->setCellValue('U1', 'Alamat Jalan');
  $sheet->setCellValue('V1', 'Tanggal Masuk Sekolah');
  $sheet->setCellValue('W1', 'Dusun');
  $sheet->setCellValue('X1', 'Kelurahan/Desa');
  $sheet->setCellValue('Y1', 'RT');
  $sheet->setCellValue('Z1', 'RW');
  $sheet->setCellValue('AA1', 'Kecamatan');
  $sheet->setCellValue('AB1', 'Tempat Tinggal');
  $sheet->setCellValue('AC1', 'Moda Transportasi');
  $sheet->setCellValue('AD1', 'No HP');
  $sheet->setCellValue('AE1', 'No Telepon');
  $sheet->setCellValue('AF1', 'Email');
  $sheet->setCellValue('AG1', 'Penerima KPS/PKH/KIP');
  $sheet->setCellValue('AH1', 'No KPS/PKH/KIP');
  $sheet->setCellValue('AI1', 'Kewarganegaraan');
  $sheet->setCellValue('AJ1', 'Nama Negara');


  //deklarasi koneksi dengan query db
  $query = mysqli_query($conn,"SELECT * FROM formpd");
  $i = 2; //deklarasi var i
  $no = 1; //deklarasi var no
  while($row = mysqli_fetch_array($query)) //deklarasi kondisi
  {
    //deklarasi posisi cell pada setiap data
    $sheet->setCellValue('A'.$i, $no++);
    $sheet->setCellValue('B'.$i, $row['nama']);
    $sheet->setCellValue('C'.$i, $row['jpen']);
    $sheet->setCellValue('D'.$i, $row['tglmsk']);
    $sheet->setCellValue('F'.$i, $row['paud']);
    $sheet->setCellValue('G'.$i, $row['tk']);
    $sheet->setCellValue('H'.$i, $row['nis']);
    $sheet->setCellValue('I'.$i, $row['npu']);
    $sheet->setCellValue('J'.$i, $row['skhun']);
    $sheet->setCellValue('K'.$i, $row['ijazah']);
    $sheet->setCellValue('L'.$i, $row['hobi']);
    $sheet->setCellValue('M'.$i, $row['cita']);
    $sheet->setCellValue('N'.$i, $row['jk']);
    $sheet->setCellValue('O'.$i, $row['agama']);
    $sheet->setCellValue('P'.$i, $row['nisn']);
    $sheet->setCellValue('Q'.$i, $row['nik']);
    $sheet->setCellValue('R'.$i, $row['tmptlhr']);
    $sheet->setCellValue('S'.$i, $row['tgllhr']);
    $sheet->setCellValue('T'.$i, $row['khusus']);
    $sheet->setCellValue('U'.$i, $row['almtjln']);
    $sheet->setCellValue('V'.$i, $row['tglmsk']);
    $sheet->setCellValue('W'.$i, $row['dsn']);
    $sheet->setCellValue('X'.$i, $row['keldes']);
    $sheet->setCellValue('Y'.$i, $row['rt']);
    $sheet->setCellValue('Z'.$i, $row['rw']);
    $sheet->setCellValue('AA'.$i, $row['kec']);
    $sheet->setCellValue('AB'.$i, $row['tmpttgl']);
    $sheet->setCellValue('AC'.$i, $row['moda']);
    $sheet->setCellValue('AD'.$i, $row['nmrhp']);
    $sheet->setCellValue('AE'.$i, $row['nmrtlp']);
    $sheet->setCellValue('AF'.$i, $row['email']);
    $sheet->setCellValue('AG'.$i, $row['kps']);
    $sheet->setCellValue('AH'.$i, $row['nokps']);
    $sheet->setCellValue('AI'.$i, $row['kwn']);
    $sheet->setCellValue('AJ'.$i, $row['namangr']);
    $i++; //deklarasi var i
  }

  //pengaturan style border pada excel
  $styleArray = [
              'borders' => [
                  'allBorders' => [
                      'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border:: BORDER_THIN,
                  ],
              ],
          ];
  $i = $i - 1; //deklarasi var i
  $sheet->getStyle('A1:AJ'.$i)->applyFromArray($styleArray);

  //deklarasi membuat excel
  $writer = new Xlsx($spreadsheet);
  $writer->save('Report Data Peserta Didik.xlsx');
 ?>

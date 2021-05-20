<!DOCTYPE html>
<!-- konfigurasi bahasa -->
<html lang="en">
<head>
    <title>Pendaftaran Peserta Didik Baru</title> <!-- judul -->
    <meta charset="utf-8">
    <!-- konfigurasi responsifitas halaman -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- menyertakan file lain untuk style halaman -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <!-- konfigurasi style internal untuk tampilan halaman -->
    <style media="screen">
      input::-webkit-outer-spin-button,
      input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
      }
    </style>
    <!-- menyertakan file lain untuk style halaman -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>

</head>
<body>
    <!-- deklarasi div class untuk pemberian style -->
    <div class="container p-3 my-3 border">
    <h1 class="text-center">Formulir Peserta Didik</h1>
    <?php
    //Include file koneksi, untuk koneksikan ke database
    $conn = mysqli_connect("localhost","root","","praktikum8");

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // deklarasi variabel error yang akan muncul ketika ada peringatan pada form
        $error_all = 0;

        $error_nama = "";
        $error_jpen = "";
        $error_tglmsk = "";
        $error_nis = "";
        $error_npu = "";
        $error_paud = "";
        $error_tk = "";
        $error_skhun = "";
        $error_ijazah = "";
        $error_hobi = "";
        $error_cita = "";
        $error_jk = "";
        $error_nisn = "";
        $error_nik = "";
        $error_tgllhr = "";
        $error_tmptlhr = "";
        $error_agama = "";
        $error_khusus = "";
        $error_almtjln = "";
        $error_rt = "";
        $error_rw = "";
        $error_dsn = "";
        $error_keldes = "";
        $error_kec = "";
        $error_kodepos = "";
        $error_tmpttgl = "";
        $error_moda = "";
        $error_nmrhp = "";
        $error_nmrtlp = "";
        $error_email = "";
        $error_kps = "";
        $error_nokps = "";
        $error_kwn = "";
        $error_namangr = "";

        // cek inputan data telah terisi atau tidak
        if (empty($_POST['nama'])) {
          $error_nama = "Nama tidak boleh kosong";
          $error_all = 1;
        }else {
          // pengecekan kesesuaian inputan
          if (!preg_match("/^[a-zA-Z ]*$/", $_POST['nama'])) {
            $error_nama = "Inputan Hanya boleh huruf dan spasi";
            $error_all = 1;
          }else {
            // menyimpan hasil inputan ketika benar
            $nama = input($_POST['nama']);
          }
        }

        // cek inputan data telah terisi atau tidak
        if ($_POST['jpen'] == "Pilih") {
          $error_jpen = "Mohon pilih jenis pendaftaran";
          $error_all = 1;
        }else {
          // menyimpan hasil inputan ketika benar
          $jpen=input($_POST["jpen"]);
        }

        // cek inputan data telah terisi atau tidak
        if (empty($_POST['tglmsk'])) {
          $error_tglmsk = "Mohon isi tanggal masuk sekolah";
          $error_all = 1;
        }else {
          // menyimpan hasil inputan ketika benar
          $tglmsk=input($_POST["tglmsk"]);
        }

        // cek inputan data telah terisi atau tidak
        if (empty($_POST['nis'])) {
          $error_nis = "Mohon isi NIS";
          $error_all = 1;
        }else {
          if (!is_numeric($_POST["nis"])) { // pengecekan kesesuaian inputan
            $error_nis = "NIS hanya boleh angka";
            $error_all = 1;
          }else {
            // menyimpan hasil inputan ketika benar
            $nis=input($_POST["nis"]);
          }
        }

        // cek inputan data telah terisi atau tidak
        if (empty($_POST['npu'])) {
          $error_npu = "Mohon isi Nomor Peserta Ujian";
          $error_all = 1;
        }else {
          if (!is_numeric($_POST["npu"])) { // pengecekan kesesuaian inputan
            $error_npu = "Nomor Peserta Ujian hanya boleh angka";
            $error_all = 1;
          }else {
            // menyimpan hasil inputan ketika benar
            $npu=input($_POST["npu"]);
          }
        }

        $paud=input($_POST["paud"]);

        $tk=input($_POST["tk"]);

        // cek inputan data telah terisi atau tidak
        if (empty($_POST['skhun'])) {
          $error_skhun = "Mohon isi Nomor Seri SKHUN";
          $error_all = 1;
        }else {
          if (!is_numeric($_POST["skhun"])) { // pengecekan kesesuaian inputan
            $error_skhun = "Nomor Seri SKHUN hanya boleh angka";
            $error_all = 1;
          }else {
            // menyimpan hasil inputan ketika benar
            $skhun=input($_POST["skhun"]);
          }
        }

        // cek inputan data telah terisi atau tidak
        if (empty($_POST['ijazah'])) {
          $error_ijazah = "Mohon isi Nomor Seri SKHUN";
          $error_all = 1;
        }else {
          if (!is_numeric($_POST["ijazah"])) { // pengecekan kesesuaian inputan
            $error_ijazah = "Nomor Seri SKHUN hanya boleh angka";
            $error_all = 1;
          }else {
            // menyimpan hasil inputan ketika benar
            $ijazah=input($_POST["ijazah"]);
          }
        }

        // cek inputan data telah terisi atau tidak
        if ($_POST['hobi'] == "Pilih") {
          $error_hobi = "Mohon pilih hobi";
          $error_all = 1;
        }else {
          // menyimpan hasil inputan ketika benar
          $hobi=input($_POST["hobi"]);
        }

        // cek inputan data telah terisi atau tidak
        if ($_POST['cita'] == "Pilih") {
          $error_cita = "Mohon pilih cita - cita";
          $error_all = 1;
        }else {
          // menyimpan hasil inputan ketika benar
          $cita=input($_POST["cita"]);
        }

        // cek inputan data telah terisi atau tidak
        if ($_POST['jk'] == "Pilih") {
          $error_jk = "Mohon pilih jenis kelamin";
          $error_all = 1;
        }else {
          // menyimpan hasil inputan ketika benar
          $jk=input($_POST["jk"]);
        }

        // cek inputan data telah terisi atau tidak
        if (empty($_POST['nisn'])) {
          $error_nisn = "Mohon isi NISN";
          $error_all = 1;
        }else {
          if (!is_numeric($_POST["nisn"])) { // pengecekan kesesuaian inputan
            $error_nisn = "NISN hanya boleh angka";
            $error_all = 1;
          }else {
            // menyimpan hasil inputan ketika benar
            $nisn=input($_POST["nisn"]);
          }
        }

        // cek inputan data telah terisi atau tidak
        if (empty($_POST['nik'])) {
          $error_nik = "Mohon isi NIK";
          $error_all = 1;
        }else {
          if (!is_numeric($_POST["nik"])) { // pengecekan kesesuaian inputan
            $error_nik = "NIK hanya boleh angka";
            $error_all = 1;
          }else {
            // menyimpan hasil inputan ketika benar
            $nik=input($_POST["nik"]);
          }
        }

        // cek inputan data telah terisi atau tidak
        if (empty($_POST['tgllhr'])) {
          $error_tgllhr = "Mohon isi tanggal lahir";
          $error_all = 1;
        }else {
          // menyimpan hasil inputan ketika benar
          $tgllhr=input($_POST["tgllhr"]);
        }

        // cek inputan data telah terisi atau tidak
        if (empty($_POST['tmptlhr'])) {
          $error_tmptlhr = "Mohon isi tempat lahir";
          $error_all = 1;
        }else {
          // menyimpan hasil inputan ketika benar
          $tmptlhr=input($_POST["tmptlhr"]);
        }

        // cek inputan data telah terisi atau tidak
        if ($_POST['agama'] == "Pilih") {
          $error_agama = "Mohon pilih Agama";
          $error_all = 1;
        }else {
          // menyimpan hasil inputan ketika benar
          $agama=input($_POST["agama"]);
        }

        // cek inputan data telah terisi atau tidak
        if ($_POST['khusus'] == "Pilih") {
          $error_khusus = "Mohon pilih kebutuhan khusus";
          $error_all = 1;
        }else {
          // menyimpan hasil inputan ketika benar
          $khusus=input($_POST["khusus"]);
        }

        // cek inputan data telah terisi atau tidak
        if (empty($_POST['almtjln'])) {
          $error_almtjln = "Mohon isi alamat";
          $error_all = 1;
        }else {
          // menyimpan hasil inputan ketika benar
          $almtjln=input($_POST["almtjln"]);
        }

        // cek inputan data telah terisi atau tidak
        if (empty($_POST['rt'])) {
          $error_rt = "Mohon isi RT";
          $error_all = 1;
        }else {
          if (!is_numeric($_POST["rt"])) { // pengecekan kesesuaian inputan
            $error_rt = "RT hanya boleh angka";
            $error_all = 1;
          }else {
            // menyimpan hasil inputan ketika benar
            $rt=input($_POST["rt"]);
          }
        }

        // cek inputan data telah terisi atau tidak
        if (empty($_POST['rw'])) {
          $error_rw = "Mohon isi RW";
          $error_all = 1;
        }else {
          if (!is_numeric($_POST["rw"])) { // pengecekan kesesuaian inputan
            $error_rw = "RW hanya boleh angka";
            $error_all = 1;
          }else {
            // menyimpan hasil inputan ketika benar
            $rw=input($_POST["rw"]);
          }
        }

        // cek inputan data telah terisi atau tidak
        if (empty($_POST['dsn'])) {
          $error_dsn = "Mohon isi Dusun";
          $error_all = 1;
        }else {
          // menyimpan hasil inputan ketika benar
          $dsn=input($_POST["dsn"]);
        }

        // cek inputan data telah terisi atau tidak
        if (empty($_POST['keldes'])) {
          $error_keldes = "Mohon isi Kelurahan/Desa";
          $error_all = 1;
        }else {
          // menyimpan hasil inputan ketika benar
          $keldes=input($_POST["keldes"]);
        }

        // cek inputan data telah terisi atau tidak
        if (empty($_POST['kec'])) {
          $error_kec = "Mohon isi Kecamatan";
          $error_all = 1;
        }else {
          // menyimpan hasil inputan ketika benar
          $kec=input($_POST["kec"]);
        }

        // cek inputan data telah terisi atau tidak
        if (empty($_POST['kodepos'])) {
          $error_kodepos = "Mohon isi Kodepos";
          $error_all = 1;
        }else {
          if (!is_numeric($_POST["kodepos"])) { // pengecekan kesesuaian inputan
            $error_kodepos = "Kodepos hanya boleh angka";
            $error_all = 1;
          }else {
            // menyimpan hasil inputan ketika benar
            $kodepos=input($_POST["kodepos"]);
          }
        }

        // cek inputan data telah terisi atau tidak
        if ($_POST['tmpttgl'] == "Pilih") {
          $error_tmpttgl = "Mohon pilih tempat tinggal";
          $error_all = 1;
        }else {
          // menyimpan hasil inputan ketika benar
          $tmpttgl=input($_POST["tmpttgl"]);
        }

        // cek inputan data telah terisi atau tidak
        if ($_POST['tmpttgl'] == "Pilih") {
          $error_tmpttgl = "Mohon pilih tempat tinggal";
          $error_all = 1;
        }else {
          // menyimpan hasil inputan ketika benar
          $tmpttgl=input($_POST["tmpttgl"]);
        }

        // cek inputan data telah terisi atau tidak
        if ($_POST['moda'] == "Pilih") {
          $error_moda = "Mohon pilih moda transportasi";
          $error_all = 1;
        }else {
          // menyimpan hasil inputan ketika benar
          $moda=input($_POST["moda"]);
        }

        // cek inputan data telah terisi atau tidak
        if (empty($_POST['nmrhp'])) {
          $error_nmrhp = "Mohon isi Nomor HP";
          $error_all = 1;
        }else {
          if (!is_numeric($_POST["nmrhp"])) { // pengecekan kesesuaian inputan
            $error_nmrhp = "Nomor HP hanya boleh angka";
            $error_all = 1;
          }else {
            // menyimpan hasil inputan ketika benar
            $nmrhp=input($_POST["nmrhp"]);
          }
        }

        // cek inputan data telah terisi atau tidak
        if (empty($_POST['nmrtlp'])) {
          $error_nmrtlp = "Mohon isi Nomor Telepon";
          $error_all = 1;
        }else {
          if (!is_numeric($_POST["nmrtlp"])) { // pengecekan kesesuaian inputan
            $error_nmrtlp = "Nomor Telepon hanya boleh angka";
            $error_all = 1;
          }else {
            // menyimpan hasil inputan ketika benar
            $nmrtlp=input($_POST["nmrtlp"]);
          }
        }

        // cek inputan data telah terisi atau tidak
        if (empty($_POST['email'])) {
          $error_email = "Mohon isi Email";
          $error_all = 1;
        }else {
          // menyimpan hasil inputan ketika benar
          $email=input($_POST["email"]);
        }

        // menyimpan hasil inputan ketika benar
        $kps=input($_POST["kps"]);

        // cek inputan data telah terisi atau tidak
        if (empty($_POST['nokps'])) {
          $error_nokps = "Mohon isi Nomor KPS";
          $error_all = 1;
        }else {
          if (!is_numeric($_POST["nokps"])) {
            $error_nokps = "Nomor KPS hanya boleh angka";
            $error_all = 1;
          }else {
            // menyimpan hasil inputan ketika benar
            $nokps=input($_POST["nokps"]);
          }
        }

        // cek inputan data telah terisi atau tidak
        $kwn=input($_POST["kwn"]);
        if ($kwn == "wni") {
          $namangr = "Indonesia";
        }else {
          // menyimpan hasil inputan ketika benar
          $namangr=input($_POST["namangr"]);
        }

        //Query input data kedalam tabel pendaftaraan jika tidak ada kesalahan
        if ($error_all == 0) {
          $sql="INSERT INTO formpd (nama,jpen,tglmsk,nis,npu,paud,tk,skhun,ijazah,
            hobi,cita,jk,nisn,nik,tgllhr,tmptlhr,agama,khusus,almtjln,rt,rw,dsn,keldes,kec,
            kodepos,tmpttgl,moda,nmrhp,nmrtlp,email,kps,nokps,kwn,namangr) VALUES
            ('$nama','$jpen','$tglmsk','$nis','$npu','$paud','$tk','$skhun','$ijazah','$hobi',
              '$cita','$jk','$nisn','$nik','$tgllhr','$tmptlhr','$agama','$khusus','$almtjln',
              '$rt','$rw','$dsn','$keldes','$kec','$kodepos','$tmpttgl','$moda','$nmrhp',
              '$nmrtlp','$email','$kps','$nokps','$kwn','$namangr')";

              //Mengeksekusi/menjalankan query diatas
              $hasil=mysqli_query($conn,$sql);

              //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
              if ($hasil) {
                echo "<div class='alert alert-success'> Selamat $nama anda telah berhasil mendaftar.</div>";
              }
              else {
                echo "<div class='alert alert-danger'> Pendaftaraan Gagal.</div>";
              }
        }
    }
    else {
      // deklarasi variabel error yang akan muncul ketika ada peringatan pada form
      $error_nama = "";
      $error_jpen = "";
      $error_tglmsk = "";
      $error_nis = "";
      $error_npu = "";
      $error_paud = "";
      $error_tk = "";
      $error_skhun = "";
      $error_ijazah = "";
      $error_hobi = "";
      $error_cita = "";
      $error_jk = "";
      $error_nisn = "";
      $error_nik = "";
      $error_tgllhr = "";
      $error_tmptlhr = "";
      $error_agama = "";
      $error_khusus = "";
      $error_almtjln = "";
      $error_rt = "";
      $error_rw = "";
      $error_dsn = "";
      $error_keldes = "";
      $error_kec = "";
      $error_kodepos = "";
      $error_tmpttgl = "";
      $error_moda = "";
      $error_nmrhp = "";
      $error_nmrtlp = "";
      $error_email = "";
      $error_kps = "";
      $error_nokps = "";
      $error_kwn = "";
      $error_namangr = "";
    }
    ?>
        <!-- membuat form dengan metode simpan POST -->
        <form id="form" method="post">
          <!-- deklarasi div class untuk pemberian style -->
          <div class="alert alert-primary">
              <strong>Registrasi Peserta Didik</strong>
          </div>

          <!-- deklarasi div class untuk pemberian style dan pembagian barisan -->
          <div class="row">

              <!-- deklarasi div class untuk pemberian style -->
              <div class="col-sm-3">
                <div class="form-group">
                  <label>Jenis Pendaftaran:</label>
                  <!-- membuat form option -->
                  <select class="form-control" name="jpen">
                      <option>Pilih</option>
                      <option value="baru">Siswa Baru</option>
                      <option value="pindah">Pindahan</option>
                  </select>
                  <span class="text-danger">*<?php echo $error_jpen; ?></span>
                </div>
              </div>

              <!-- deklarasi div class untuk pemberian style -->
              <div class="col-sm-3">
                  <div class="form-group">
                      <!-- membuat form inputan tanggal  -->
                      <label>Tanggal Masuk Sekolah:</label>
                      <input type="date" name="tglmsk" class="form-control">
                      <span class="text-danger">*<?php echo $error_tglmsk; ?></span>
                  </div>
              </div>

              <!-- deklarasi div class untuk pemberian style -->
              <div class="col-sm-3">
                  <div class="form-group">
                      <label>Apakah Pernah PAUD:</label>
                      <!-- membuat form radio button  -->
                      <br><input type="radio" name="paud" value="ya" checked> Ya
                      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="paud" value="tidak"> Tidak
                  </div>
              </div>

              <!-- deklarasi div class untuk pemberian style -->
              <div class="col-sm-3">
                  <div class="form-group">
                      <label>Apakah Pernah TK:</label>
                      <!-- membuat form radio button  -->
                      <br><input type="radio" name="tk" value="ya" checked> Ya
                      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="tk" value="tidak"> Tidak
                  </div>
              </div>

          </div>
          <div class="row">

              <!-- deklarasi div class untuk pemberian style -->
              <div class="col-sm-6">
                <div class="form-group">
                    <!-- membuat form inputan  -->
                    <label>Nomor Identitas Siswa (NIS):</label>
                    <input type="number" name="nis" class="form-control" placeholder="Masukan Nomor NIS">
                    <span class="text-danger">*<?php echo $error_nis; ?></span>
                </div>
              </div>

              <!-- deklarasi div class untuk pemberian style -->
              <div class="col-sm-6">
                <div class="form-group">
                    <!-- membuat form inputan  -->
                    <label>Nomor Peserta Ujian:</label>
                    <input type="number" name="npu" class="form-control" placeholder="Masukan Nomor Peserta Ujian">
                    <span class="text-danger">*<?php echo $error_npu; ?></span>
                </div>
              </div>

          </div>
          <div class="row">

              <!-- deklarasi div class untuk pemberian style -->
              <div class="col-sm-6">
                <div class="form-group">
                    <!-- membuat form inputan  -->
                    <label>No. Seri SKHUN Sebelumnya:</label>
                    <input type="number" name="skhun" class="form-control" placeholder="Masukan Nomor Seri SKHUN Sebelumnya">
                    <span class="text-danger">*<?php echo $error_skhun; ?></span>
                </div>
              </div>

              <!-- deklarasi div class untuk pemberian style -->
              <div class="col-sm-6">
                <div class="form-group">
                    <!-- membuat form inputan  -->
                    <label>No. Seri Ijazah Sebelumnya:</label>
                    <input type="number" name="ijazah" class="form-control" placeholder="Masukan Nomor Seri Ijazah Sebelumnya">
                    <span class="text-danger">*<?php echo $error_ijazah; ?></span>
                </div>
              </div>

          </div>
          <div class="row">

              <!-- deklarasi div class untuk pemberian style -->
              <div class="col-sm-3">
                <div class="form-group">
                    <!-- membuat form option  -->
                    <label>Hobi:</label>
                    <select class="form-control" name="hobi">
                        <option>Pilih</option>
                        <option value="or">Olah Raga</option>
                        <option value="seni">Kesenian</option>
                        <option value="baca">Membaca</option>
                        <option value="tulis">Menulis</option>
                        <option value="travel">Traveling</option>
                        <option value="lain">Lainnya</option>
                    </select>
                    <span class="text-danger">*<?php echo $error_hobi; ?></span>
                </div>
              </div>

              <!-- deklarasi div class untuk pemberian style -->
              <div class="col-sm-3">
                <div class="form-group">
                    <!-- membuat form option  -->
                    <label>Cita-cita:</label>
                    <select class="form-control" name="cita">
                        <option>Pilih</option>
                        <option value="pns">PNS</option>
                        <option value="tnipolri">TNI/POLRI</option>
                        <option value="gurudosen">Guru/Dosen</option>
                        <option value="dokter">Dokter</option>
                        <option value="politik">Politikus</option>
                        <option value="wira">Wiraswasta</option>
                        <option value="seni">Seni/Lukis/Artis/Sejenisnya</option>
                        <option value="lain">Lainnya</option>
                      </select>
                      <span class="text-danger">*<?php echo $error_cita; ?></span>
                </div>
              </div>

          </div>

          <div class="alert alert-primary">
              <strong>Data Diri</strong>
          </div>

          <div class="row">

              <!-- deklarasi div class untuk pemberian style -->
              <div class="col-sm-6">
                <div class="form-group">
                    <!-- membuat form inputan  -->
                    <label>Nama Lengkap:</label>
                    <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Lengkap">
                    <span class="text-danger">*<?php echo $error_nama; ?></span>
                </div>
              </div>

              <!-- deklarasi div class untuk pemberian style -->
              <div class="col-sm-3">
                <div class="form-group">
                    <!-- membuat form option  -->
                    <label>Jenis Kelamin:</label>
                    <select class="form-control" name="jk">
                          <option>Pilih</option>
                          <option value="laki-laki">Laki-laki</option>
                          <option value="perempuan">Perempuan</option>
                      </select>
                      <span class="text-danger">*<?php echo $error_jk; ?></span>
                  </div>
              </div>

              <!-- deklarasi div class untuk pemberian style -->
              <div class="col-sm-3">
                <div class="form-group">
                    <label>Agama:</label>
                    <select class="form-control" name="agama">
                        <!-- membuat form option  -->
                        <option>Pilih</option>
                        <option value="islam">Islam</option>
                        <option value="kristen">Kristen/Protestan</option>
                        <option value="katolik">Katolik</option>
                        <option value="hindu">Hindu</option>
                        <option value="budha">Budha</option>
                        <option value="konghucu">Kong Hu Chu</option>
                        <option value="lain">Lainnya</option>
                    </select>
                    <span class="text-danger">*<?php echo $error_agama; ?></span>
                </div>
              </div>

          </div>
          <div class="row">

              <!-- deklarasi div class untuk pemberian style -->
              <div class="col-sm-6">
                <div class="form-group">
                    <!-- membuat form inputan  -->
                    <label>NISN:</label>
                    <input type="number" name="nisn" class="form-control" placeholder="Masukan NISN">
                    <span class="text-danger">*<?php echo $error_nisn; ?></span>
                </div>
              </div>

              <!-- deklarasi div class untuk pemberian style -->
              <div class="col-sm-6">
                <div class="form-group">
                    <!-- membuat form inputan  -->
                    <label>NIK:</label>
                    <input type="number" name="nik" class="form-control" placeholder="Masukan NIK">
                    <span class="text-danger">*<?php echo $error_nik; ?></span>
                </div>
              </div>

          </div>
          <div class="row">

            <!-- deklarasi div class untuk pemberian style -->
            <div class="col-sm-6">
              <div class="form-group">
                  <!-- membuat form inputan  -->
                  <label>Tempat Lahir:</label>
                  <input type="text" name="tmptlhr" class="form-control" placeholder="Masukan Tempat Lahir">
                  <span class="text-danger">*<?php echo $error_tmptlhr; ?></span>
              </div>
            </div>

              <!-- deklarasi div class untuk pemberian style -->
              <div class="col-sm-3">
                <div class="form-group">
                    <!-- membuat form inputan  -->
                    <label>Tanggal Lahir:</label>
                    <input type="date" name="tgllhr" class="form-control">
                    <span class="text-danger">*<?php echo $error_tgllhr; ?></span>
                </div>
              </div>

              <!-- deklarasi div class untuk pemberian style -->
              <div class="col-sm-3">
                <div class="form-group">
                    <!-- membuat form option  -->
                    <label>Berkebutuhan Khusus:</label>
                    <select class="form-control" name="khusus">
                        <option>Pilih</option>
                        <option value="tidakada">Tidak Ada</option>
                        <option value="netra">Netra</option>
                        <option value="rungu">Rungu</option>
                        <option value="grahring">Grahita Ringan</option>
                        <option value="grahsed">Grahita Sedang</option>
                        <option value="dakring">Daksa Ringan</option>
                        <option value="daksed">Daksa Sedang</option>
                        <option value="laras">Laras</option>
                        <option value="wicara">Wicara</option>
                        <option value="tungan">Tuna Ganda</option>
                        <option value="hiper">Hiper Aktif</option>
                        <option value="cerdis">Cerdas Istimewa</option>
                        <option value="bakis">Bakat Istimewa</option>
                        <option value="sulitbljr">Kesulitan Belajar</option>
                        <option value="narkoba">Narkoba</option>
                        <option value="indigo">Indigo</option>
                        <option value="downsyn">Down Sindrome</option>
                        <option value="autis">Autis</option>
                    </select>
                    <span class="text-danger">*<?php echo $error_khusus; ?></span>
                  </div>
                </div>

            </div>
            <div class="row">

              <!-- deklarasi div class untuk pemberian style -->
              <div class="col-sm-6">
                <div class="form-group">
                    <!-- membuat form inputan  -->
                    <label>Alamat Jalan:</label>
                    <input type="text" name="almtjln" class="form-control" placeholder="Masukan Alamat Jalan">
                    <span class="text-danger">*<?php echo $error_almtjln; ?></span>
                </div>
              </div>

                <!-- deklarasi div class untuk pemberian style -->
                <div class="col-sm-3">
                    <div class="form-group">
                        <!-- membuat form inputan  -->
                        <label>Nama Dusun:</label>
                        <input type="text" name="dsn" class="form-control" placeholder="Masukan Nama Dusun">
                        <span class="text-danger">*<?php echo $error_dsn; ?></span>
                    </div>
                </div>

                <!-- deklarasi div class untuk pemberian style -->
                <div class="col-sm-3">
                    <div class="form-group">
                        <!-- membuat form inputan  -->
                        <label>Nama Kelurahan/Desa:</label>
                        <input type="text" name="keldes" class="form-control" placeholder="Masukan Nama Kelurahan/Desa">
                        <span class="text-danger">*<?php echo $error_keldes; ?></span>
                    </div>
                </div>

            </div>
            <div class="row">

                <!-- deklarasi div class untuk pemberian style -->
                <div class="col-sm-3">
                  <div class="form-group">
                      <!-- membuat form inputan  -->
                      <label>RT:</label>
                      <input type="number" name="rt" class="form-control" placeholder="Masukan RT">
                      <span class="text-danger">*<?php echo $error_rt; ?></span>
                  </div>
                </div>

                <!-- deklarasi div class untuk pemberian style -->
                <div class="col-sm-3">
                  <div class="form-group">
                      <!-- membuat form inputan  -->
                      <label>RW:</label>
                      <input type="number" name="rw" class="form-control" placeholder="Masukan RW">
                      <span class="text-danger">*<?php echo $error_rw; ?></span>
                  </div>
                </div>

                <!-- deklarasi div class untuk pemberian style -->
                <div class="col-sm-6">
                    <div class="form-group">
                        <!-- membuat form inputan  -->
                        <label>Nama Kecamatan:</label>
                        <input type="text" name="kec" class="form-control" placeholder="Masukan Nama Kecamatan">
                        <span class="text-danger">*<?php echo $error_kec; ?></span>
                    </div>
                </div>

            </div>
            <div class="row">

                <!-- deklarasi div class untuk pemberian style -->
                <div class="col-sm-3">
                  <div class="form-group">
                      <!-- membuat form inputan  -->
                      <label>Kode Pos:</label>
                      <input type="number" name="kodepos" class="form-control" placeholder="Masukan Kode Pos">
                      <span class="text-danger">*<?php echo $error_kodepos; ?></span>
                  </div>
                </div>

                <!-- deklarasi div class untuk pemberian style -->
                <div class="col-sm-3">
                  <div class="form-group">
                      <!-- membuat form option  -->
                      <label>Tempat Tinggal:</label>
                      <select class="form-control" name="tmpttgl">
                          <option>Pilih</option>
                          <option value="ortu">Bersama Orang Tua</option>
                          <option value="wali">Wali</option>
                          <option value="kos">Kos</option>
                          <option value="asrama">Asrama</option>
                          <option value="panti">Panti Asuhan</option>
                          <option value="lain">Lainnya</option>
                      </select>
                      <span class="text-danger">*<?php echo $error_tmpttgl; ?></span>
                  </div>
                </div>

                <!-- deklarasi div class untuk pemberian style -->
                <div class="col-sm-3">
                  <div class="form-group">
                      <label>Moda Transportasi:</label>
                      <select class="form-control" name="moda">
                          <!-- membuat form option  -->
                          <option>Pilih</option>
                          <option value="jalan">Jalan Kaki</option>
                          <option value="pribadi">Kendaraan Pribadi</option>
                          <option value="umum">Kendaraan Umum/Angkot</option>
                          <option value="jemputan">Jemputan Sekolah</option>
                          <option value="kereta">Kereta Api</option>
                          <option value="ojek">Ojek</option>
                          <option value="andong">Andong/Dokar/Delman/Becak</option>
                          <option value="perahu">Perahu Penyebrangan/Rakit</option>
                          <option value="lain">Lainnya</option>
                      </select>
                      <span class="text-danger">*<?php echo $error_moda; ?></span>
                  </div>
                </div>

                <!-- deklarasi div class untuk pemberian style -->
                <div class="col-sm-3">
                  <div class="form-group">
                      <label>No. HP:</label>
                      <!-- membuat form inputan  -->
                      <input type="number" name="nmrhp" class="form-control" placeholder="Masukan No. HP">
                      <span class="text-danger">*<?php echo $error_nmrhp; ?></span>
                  </div>
                </div>

            </div>
            <div class="row">

                <!-- deklarasi div class untuk pemberian style -->
                <div class="col-sm-3">
                  <div class="form-group">
                      <!-- membuat form inputan  -->
                      <label>No. Telepon:</label>
                      <input type="number" name="nmrtlp" class="form-control" placeholder="Masukan No. Telepon">
                      <span class="text-danger">*<?php echo $error_nmrtlp; ?></span>
                  </div>
                </div>

                <!-- deklarasi div class untuk pemberian style -->
                <div class="col-sm-3">
                  <div class="form-group">
                      <label>Email Pribadi:</label>
                      <!-- membuat form inputan  -->
                      <input type="email" name="email" class="form-control" placeholder="Masukan Email">
                      <span class="text-danger">*<?php echo $error_email; ?></span>
                  </div>
                </div>

                <!-- deklarasi div class untuk pemberian style -->
                <div class="col-sm-3">
                  <div class="form-group">
                      <!-- membuat form berupa radio button  -->
                      <label>Penerima KPS/PKH/KIP:</label>
                      <br><input type="radio" name="kps" value="ya" checked>Ya
                      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="kps" value="tidak">Tidak
                  </div>
                </div>

                <!-- deklarasi div class untuk pemberian style -->
                <div class="col-sm-3">
                  <div class="form-group">
                      <!-- membuat form inputan  -->
                      <label>No. KPS/PKH/KIP:</label>
                      <input type="number" name="nokps" class="form-control" placeholder="Masukan No. KPS/PKH/KIP">
                      <span class="text-danger">*<?php echo $error_nokps; ?></span>
                  </div>
                </div>

            </div>
            <div class="row">

                <!-- deklarasi div class untuk pemberian style -->
                <div class="col-sm-3">
                  <div class="form-group">
                      <!-- membuat form berupa radio button  -->
                      <label>Kewarganegaraan:</label>
                      <br><input type="radio" name="kwn" value="wni" checked> Indonesia (WNI)
                      &nbsp<input type="radio" name="kwn" value="wna"> Asing (WNA)
                  </div>
                </div>

                <!-- deklarasi div class untuk pemberian style -->
                <div class="col-sm-3">
                  <div class="form-group">
                      <!-- membuat form inputan  -->
                      <label>Nama Negara:</label>
                      <input type="text" name="namangr" class="form-control" placeholder="Masukan Nama Negara">
                      <span class="text-danger">*<?php echo $error_namangr; ?></span>
                  </div>
                </div>

            </div>
            <div class="row">

                <!-- deklarasi div class untuk pemberian style -->
                <div class="col-sm-4">
                    <!-- membuat button untuk submit, reset dan export data ke excel  -->
                    <button type="submit" name="Submit" id="Submit" class="btn btn-primary">Daftar</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>

            </div>

            <div class="row">

                <!-- deklarasi div class untuk pemberian style -->
                <div class="col-sm-4">
                    <!-- membuat button berupa text untuk export data ke excel dan pdf  -->
                    <p><a href=buttonreport.php>Export ke excel</a></p>
                    <p><a href=buttonpdf.php>Export ke PDF</a></p>
                </div>

            </div>

        </form>
    </div>
</body>
</html>

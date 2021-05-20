<?php
  // konfigurasi database
  $host="localhost";
  $user="root";
  $password="";
  $db="praktikum8";
  // perintah php untuk akses ke database
  $conn = mysqli_connect($host,$user,$password,$db);
      if (!$conn){ //pengecekan koneksi terhdapat database
        die("Koneksi gagal:".mysqli_connect_error()); //menuliskan text jika gagal
      }
?>

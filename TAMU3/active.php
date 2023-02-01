<?php
  include 'koneksi.php';

  $id = $_GET['id'];

  $query = mysqli_query($koneksi, "UPDATE `users` SET is_active='active' WHERE id=$id");

  if ($query) {
    header('Location: pages/admin/dashboard.php');
  }
?>
<!-- Pada code diatas merupakan proses untuk mengaktifkan akun user yang terdaftar pada database.
 Kode tersebut melakukan query untuk mengupdate data user yang memiliki id sesuai dengan parameter yang diterima di url. 
 Apabila query berhasil, maka browser akan redirect ke halaman dashboard.php. -->
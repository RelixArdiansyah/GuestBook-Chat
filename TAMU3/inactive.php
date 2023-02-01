<?php
  include 'koneksi.php';

  $id = $_GET['id'];

  $query = mysqli_query($koneksi, "UPDATE `users` SET is_active='inactive' WHERE id=$id");

  if ($query) {
    header('Location: pages/admin/dashboard.php');
  }
?>
<!-- Code diatas berfungsi untuk menonaktifkan akun user dengan mengupdate status is_active menjadi 
inactive dengan mengambil id dari URL.
 Jika query berhasil dijalankan, maka halaman akan dialihkan ke halaman dashboard. -->
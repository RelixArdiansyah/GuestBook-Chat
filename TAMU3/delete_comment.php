<?php
  include 'koneksi.php';

  $id = $_GET['id'];

  $query = mysqli_query($koneksi, "DELETE FROM `comment` WHERE id=$id");

  if ($query) {
    echo '<script language="javascript"> alert("Komentar dihapus!") </script>';
    header('Location: pages/user/dashboard.php');
  }
?>
<!-- Code di atas adalah kode php yang digunakan untuk menghapus data komentar yang telah dipilih 
oleh user dari database. pertama kode tersebut menyertakan file koneksi.php untuk melakukan koneksi 
ke database. Kemudian mendeklarasikan variabel $id yang berisi nilai dari parameter id yang dikirimkan
dari halaman sebelumnya. Selanjutnya dilakukan query DELETE untuk menghapus data komentar berdasarkan
id yang dipilih. Jika query berhasil dieksekusi akan menampilkan alert dan diarahkan ke halaman dashboard. -->
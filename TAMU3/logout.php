<?php
  session_start();

  session_destroy();

  header("Location: index.php");
?>
<!-- Code diatas berfungsi untuk menghapus session yang telah dibuat.
 Setelah proses logout, maka session akan dihapus dan user akan dialihkan ke halaman index.php. -->
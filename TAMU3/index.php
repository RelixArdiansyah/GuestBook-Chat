<?php

  session_start();

  if ($_SESSION['id'] == null) {
    header('Location: pages/login.php');
  } else {
    if ($_SESSION['role'] == 'admin') {
      header('Location: pages/admin/dashboard.php');
    } else if ($_SESSION['role'] == 'user') {
      header('Location: pages/user/dashboard.php');
    }
  }

?>
<!-- code diatas berfungsi untuk melakukan pengecekan session login pada website. 
jika id dari session kosong maka akan diarahkan ke halaman login. jika id dari session tidak kosong,
 maka akan dicek role dari session tersebut apakah bernilai admin atau user. 
 jika bernilai admin maka akan diarahkan ke halaman dashboard admin,
  dan jika bernilai user maka akan diarahkan ke halaman dashboard user. -->
<?php
  include "../koneksi.php";

  session_start();
  if ($_SESSION == null) {
      header('Location: ../login.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>
<body>

  <div class="container">
    <h1>Profil Pengguna</h1>
    <br/>
    <img src="../assets/photo/<?= $_SESSION['photo']; ?>" alt="" srcset="" class="profile-picture">
    <div class="input-control">
      <label class="label-field">Nama</label>
      <input type="text" name="name" class="input-field" readonly value="<?= $_SESSION['name']; ?>"/>
    </div>
    <div class="input-control">
      <label class="label-field">Username</label>
      <input type="text" name="name" class="input-field" readonly value="<?= $_SESSION['username']; ?>"/>
    </div>
    <div class="input-control">
      <label class="label-field">Peran</label>
      <input type="text" name="name" class="input-field" readonly value="<?= $_SESSION['role']; ?>"/>
    </div>
  </div>

</body>
</html>
<?php
  session_start();
  if ($_SESSION != null) {
    if ($_SESSION['role'] == 'admin') {
      header('Location: pages/admin/dashboard.php');
    } else if ($_SESSION['role'] == 'user') {
      header('Location: pages/user/dashboard.php');
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
  <title>Login | Tamu</title>
</head>
<body>
  <div class="title">
  </div>

  <div class="container">
    <h1>LOGIN</h1>
    <form action="" method="post" name="login_form" class="form">
      <div class="input-control">
        <label class="label-field">Username</label>
        <input type="text" name="username" placeholder="Masukkan Username" class="input-field" required/>
      </div>
      <div class="input-control">
        <label class="label-field">Password</label>
        <input type="password" name="password" placeholder="Masukkan Password" class="input-field" required/>
      </div>
      <div class="submit-control">
        <input type="submit" class="button-submit" name="submit" value="Masuk">
      </div>
    </form>
  
    <br/>
    <br/>

    <div class="account-option">
      <p>Belum punya akun? <a href="register.php">Register</a></p>
    </div>
    <a class="social-media-icon" href="https://link_social_mendia_anda"><span class="fab fa-instagram"></span></a>
    <a class="social-media-icon" href="https://link_social_mendia_anda"><span class="fab fa-facebook"></span></a>
    &copy; <?php echo date("Y"); ?>
    </div>
  
  <?php

    include "../koneksi.php";

    if (isset($_POST['submit'])) {
      $username = $_POST['username'];
      $password = md5($_POST['password']);
      $response = mysqli_query($koneksi, "SELECT * FROM users 
      WHERE `username`='$username' AND `password`='$password'");
      $response_length = mysqli_num_rows($response);
      if ($response_length > 0) {
        $data = mysqli_fetch_assoc($response);
        if ($data['is_active'] == "inactive") {
          echo '<script language="javascript"> alert("Pengguna dinonaktifkan! Tidak bisa masuk!") </script>';
        } else {
          session_start();
          // code ini digunakan untuk memanggil data dari database berdasarkan 
          // username dan password yang dimasukkan oleh user. Setelah data dipanggil, 
          // maka akan dihitung jumlah data yang didapatkan dan disimpan dalam variabel 
          // $response_length.

          $_SESSION['id'] = $data['id'];
          $_SESSION['name'] = $data['name'];
          $_SESSION['username'] = $data['username'];
          $_SESSION['photo'] = $data['photo'];
          $_SESSION['role'] = $data['role'];
          if ($data['role'] == "admin") {
            header('Location: admin/dashboard.php');
          } else if ($data['role'] == "user") {
            header('Location: user/dashboard.php');
          } else {
            echo '<script language="javascript"> alert("Pengguna tidak sesuai! Tidak bisa masuk!") </script>';
          }
        }
      } else {
        echo '<script language="javascript"> alert("Pengguna tidak ditemukan!") </script>';
      }
    }

  ?>
</body>
</html>

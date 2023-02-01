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
</head>
<body>
  <div class="title">

  </div>

  <div class="container">
    <h1>REGISTER</h1>
    <form action="" method="post" name="login_form" class="form" enctype="multipart/form-data">
      <div class="input-control">
        <label class="label-field">Nama</label>
        <input type="text" name="name" placeholder="Masukkan Nama Lengkap" class="input-field" maxlength="200" required/>
      </div>
      <div class="input-control">
        <label class="label-field">Username</label>
        <input type="text" name="username" placeholder="Masukkan Username" class="input-field" maxlength="50" required/>
      </div>
      <div class="input-control">
        <label class="label-field">Password</label>
        <input type="text" name="password" placeholder="Masukkan Password" class="input-field" required/>
      </div>
      <div class="input-control">
        <label class="label-field">Foto</label>
        <input type="file" name="photo" class="input-field" required/>
      </div>
      <div class="submit-control">
        <input type="submit" class="button-submit" name="submit" value="Daftar">
      </div>
    </form>

  <?php echo date("Y"); ?>
  
  <div class="account-option">
    <p>Sudah punya akun? <a href="login.php">login</a></p>
    </div>
    <a class="social-media-icon" href="https://link_social_mendia_anda"><span class="fab fa-instagram"></span></a>
    <a class="social-media-icon" href="https://link_social_mendia_anda"><span class="fab fa-facebook"></span></a>
    &copy; <?php echo date("Y"); ?>
    </div>
  <?php

    include "../koneksi.php";

    $target_dir = "../assets/photo/";

    if (isset($_POST['submit'])) {
      $name = $_POST['name'];
      $username = $_POST['username'];
      $password = md5($_POST['password']);
      $type_photo = basename($_FILES["photo"]["type"]);
      $file_name = $username."_".strval(time()).".".$type_photo;
      // code diatas merupakan code untuk mendefinisikan variabel name,
      // username, password, type_photo dan file_name. 
      // Variabel name dan username diambil dari isian form yang 
      // diinput oleh user dan variabel password di enkripsi menggunakan md5, 
      // type_photo diambil dari type file yang diupload dan variabel file_name 
      // adalah nama file yang diupload dengan format nama username_timestamp.
      // type_photo
      if ($type_photo == "jpg" || $type_photo == "png" || $type_photo == "jpeg") {
        $target_file = $target_dir.$file_name;
        $result = move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
        if ($result) {
          $response = mysqli_query($koneksi, "INSERT INTO users VALUES(NULL, '$name', '$username', '$password', '$file_name', 'user', 'active', NOW())");
          header('Location: register.php');
          echo '<script language="javascript"> alert("Registrasi sukses!") </script>';
        }
      } else {
        echo '<script language="javascript"> alert("Format tidak mendukung!") </script>';
      }

    }

  ?>
</body>
</html>
<!-- Code diatas digunakan untuk membuat form daftar user baru pada aplikasi Tamu. 
Pada bagian head melakukan pengecekan session, jika user sudah login maka akan diarahkan ke
 halaman dashboard sesuai dengan role-nya. Kemudian dibagian body terdapat form daftar, 
 form ini berisi nama, username, password, dan foto. Jika user menekan tombol daftar makan 
 akan melakukan pengecekan format foto jika format foto sesuai dengan ketentuan maka akan 
 melakukan penyimpanan data user baru dan foto yang diupload ke dalam database. Setelah data 
 berhasil disimpan maka akan menampilkan popup berhasil. -->
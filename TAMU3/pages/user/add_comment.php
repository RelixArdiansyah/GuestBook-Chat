<?php
  include "../../koneksi.php";

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
  <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
  <title>Komentar | Tamu</title>
</head>
<body>

  <div class="container">
    <h1>Komentar</h1>
    <form action="" method="post" name="comment_form" class="form">
      <div class="input-control">
        <textarea name="comment" id="comment" rows="10" class="input-field-textarea" placeholder="Masukkan Komentar Anda" required></textarea>
      </div>
      <div class="submit-control">
        <input type="submit" class="button-submit" name="submit" value="Kirim">
      </div>
    </form>
  </div>

  <?php
    if (isset($_POST['submit'])) {
      $comment = $_POST['comment'];
      $id_user = $_SESSION['id'];

      $query = mysqli_query($koneksi, "INSERT INTO `comment` VALUES(NULL, '$comment', '$id_user', NOW())");

      if ($query) {
        echo '<script language="javascript"> alert("Komentar dikirim!") </script>';
        header('location: dashboard.php');
      } else {
        echo '<script language="javascript"> alert("Terjadi masalah!") </script>';
      }
    }
  ?>
  <!-- ///Code diatas adalah sebuah script php yang berfungsi untuk memasukkan komentar yang dituliskan oleh user setelah login ke dalam database. Script ini akan berjalan ketika user mengklik tombol submit. Script ini akan mengambil data dari form comment dan melakukan query insert ke tabel comment di database. Jika berhasil maka user akan mendapatkan notifikasi bahwa komentar berhasil dikirim dan user akan dialihkan ke halaman dashboard. Namun jika gagal maka akan muncul notifikasi bahwa terjadi masalah. -->

</body>
</html>
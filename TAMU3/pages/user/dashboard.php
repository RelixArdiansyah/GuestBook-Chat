<?php
  include "../../koneksi.php";

  session_start();
  if ($_SESSION == null) {
      header('Location: ../login.php');
  }

  $result = mysqli_query($koneksi, "SELECT comment.id, comment.`content`,comment.`id_users`,comment.`comment_at`,users.`name`,users.`username`,users.`photo` FROM `comment` INNER JOIN `users` ON comment.`id_users` = users.`id` WHERE users.`is_active` = 'active' ORDER BY comment_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">

</head>
<body>
  <!-- header -->
  <header>
    <div class="title-dash">
      <h3>TAMU</h3>
    </div>
    <?php if ($_SESSION['role'] != 'admin') { ?>
    <div class="menu">
      <a href="add_comment.php">KOMENTAR</a>
      <a href="../profile.php">PROFIL</a>
      <a href="../../logout.php">KELUAR</a>
    </div>
    <?php } ?>
  </header>

  <!-- content -->
  <?php
    while ($data = mysqli_fetch_array($result)) {
  ?>
  <div class="content">
    <div class="comment-panel">
      <div class="user-account">
        <img src="../../assets/photo/<?= $data['photo']; ?>" alt="" srcset="" class="avatar">
        <div class="username"><?= $data['username']; ?></div>
      </div>
      <div class="comment">
        <p>
          <?= $data['content'] ?>
        </p>
      </div>
      <div class="info">
        <div class="date"><?= date_format(date_create($data['comment_at']), 'H:i d-M-Y') ?></div>
        <?php
          if ($data['id_users'] == $_SESSION['id']) {
        ?>
        <a href="../../delete_comment.php?id=<?= $data['id']; ?>" class="delete">Hapus</a>
        <?php
          }
        ?>
      </div>
    </div>

    </div>
  <?php
    }
  ?>

</body>
</html>
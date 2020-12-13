<?php

session_start();

if (!$_SESSION["login"]) {
	header("Location: ../form/login.php");
}
require 'function_php3.php';

$buku = query("SELECT * FROM buku");

if (isset($_POST["cari"])) {
	$buku = cari($_POST["keyword"]);
}
;
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Buku Manajemen</title>
    <style media="screen">
      .loader{
        width: 180px;
        position: absolute;
        z-index: -1;
        top: 170px;
        left: 490px;
        display: none;
      }
      table {
        border: solid 1px #DDEEEE;
        border-collapse: collapse;
        border-spacing: 0;
        width: 70%;
        margin: 0px auto 10px auto;
      }
      table thead th {
          background-color: #DDEFEF;
          border: solid 1px #DDEEEE;
          color: #336B6B;
          padding: 10px;
          text-align: left;
          text-shadow: 1px 1px 1px #fff;
          text-decoration: none;
      }
      table tbody td {
          border: solid 1px #DDEEEE;
          color: #333;
          padding: 10px;
          text-shadow: 1px 1px 1px #fff;
      }
      input[type=text] {
        width: 20rem;
        padding: 8px 20px;
        margin-left: 200px;
        box-sizing: border-box;
      }
      a{
        color: #fff;
        padding: 10px;
        text-decoration: none;
        font-size: 12px;
      }
      .ubah{
        background-color: orange;
      }
      .delete{
        background-color: red;
      }
      .add{
        background-color: DodgerBlue;
      }
      .head{
        display: flex;
        justify-content: space-between;
        width: 80vw;
      }
      .judul{
        margin: 20px auto;
        text-align: center;
      }
    </style>
  </head>
  <body>

    <div class="judul">
      <h1>Daftar Buku</h1>
      <p>Login sebagai <?= $_SESSION["login"]?></p>
      <p><a href="../form/logout.php" class="delete">logout</a> </p>
    </div>
    <br><br>

    <div class="head">
      <form  action="" method="post">
        <input type="text" name="keyword" size="35" autofocus placeholder="Masukan sesuatu..." autocomplete="off" id="keyword">
        <img src="img/loadergif.gif" class="loader">
      </form>
      <p><a class="add" href="tambahData.php">Tambah Data</a> </p></div>
    <br>
    <div class="container">

    <table border="1" cellpadding="10" cellspacing="0">
      <tr>
        <th>No.</th>
        <th>Judul</th>
        <th>Tahun</th>
        <th>Penerbit</th>
        <th>Halaman</th>
        <th>Gambar</th>
        <th>Ditambahkan Oleh</th>
        <th>Edit</th>
      </tr>
      <?php $i = 1?>
      <?php foreach ($buku as $bk): ?>
      <tr>
        <td><?=$i?></td>
        <td><?=$bk["judul"]?></td>
        <td><?=$bk["tahun"]?></td>
        <td><?=$bk["penerbit"]?></td>
        <td><?=$bk["halaman"]?></td>
        <td> <img src='img/<?=$bk["gambar"]?>' height="100px"></td>
        <td><?=$bk["dibuat-oleh"]?></td>
        <td> <a href="ubah.php?id=<?=$bk["id"]?>" class="ubah">Ubah</a> |
            <a href="hapus.php?id=<?=$bk["id"]?>" onclick= "return confirm ('Apakah anda yakin menghapus data tersebut?')" class="delete">Hapus</a> </td>
      </tr>
      <?php $i++?>
    <?php endforeach;?>
    </table>
  </div>
<?php ?>



  <script src="ajax/jquery.js" charset="utf-8"></script>
  <script src="ajax/ajaxJquery.js" charset="utf-8"></script>
  </body>
</html>

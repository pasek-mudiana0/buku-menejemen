<?php
session_start();

if (!$_SESSION["login"]) {
	header("Location: ../form/login.php");
}

require "function_php3.php";

if (isset($_POST["submit"])) {

	if (tambah($_POST) > 0) {
		echo "
          <script>
            alert('Data Berhasil Ditambahkan');
            document.location.href = 'index.php';
          </script>
          ";
	} else {
		echo "
          <script>
            alert('Data Gagal Ditambahkan');
            document.location.href = 'index.php';
          </script>
          ";
	}
}
;

?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Tambah Buku</title>
     <style>
      h1{
        text-align: center;
      }
      input[type=text] {
        width: 20rem;
        padding: 8px 20px;
        box-sizing: border-box;
      }
      form{
        display: flex;
        margin: auto;
      }
      ul{
        margin: auto;
      }
      li{
        display: flex;
        flex-direction: column;
        align-items: start;
        margin-top: 20px;
      }
      label{
        margin-bottom: 2px;
      }
      img{
        margin: 0 auto 20px;
      }
      a{
        color: black;
        background-color: Gainsboro;
        padding: 10px;
        text-decoration: none;
        font-size: 12px;
      }
      button {
        background-color: DodgerBlue;
        border: none;
        text-decoration: none;
        margin: 20px 2px;
        cursor: pointer;
        color: #fff;
        padding: 10px 15px;
        text-decoration: none;
        font-size: 12px;
      }
    </style>
   </head>
   <body>
     <h1>Tambah Data</h1>
     <br>
     <form action="" method="post" enctype="multipart/form-data">
       <ul>
         <li><label for="judul">Judul:</label>
             <input type="text" name="judul" id="judul" required>
         </li>
         <li><label for="tahun">Tahun:</label>
             <input type="text" name="tahun" id="tahun" required>
         </li>
         <li><label for="penerbit">Penerbit:</label>
             <input type="text" name="penerbit" id="penerbit" required>
         </li>
         <li><label for="halaman">Halaman:</label>
             <input type="text" name="halaman" id="halaman"required>
         </li>
         <li><label for="gambar">Gambar:</label>
              <input type="file" name="gambar" id="gambar">
         </li>

         <p><a href="../">Kembali</a> <button type="submit" name="submit">Tambah</button></p>
         
       </ul>


     </form>
   </body>
 </html>

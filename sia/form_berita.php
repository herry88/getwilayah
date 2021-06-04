<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>form berita</title>
</head>

<body>
  <?php
  session_start();
  // include "config/conn.php";
  //apabila user blm login
  if (empty($_SESSION['namauser']) and empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengisi berita, harap login";
    echo "<br><a href=\"index.php\"><b>LOGIN</b></a></center>";
  } else {
    echo "<h2>Tambah Berita</h2>
      <form action=\"input_berita.php\">
        <table>
            <tr>
              <td>Kategori</td>
              <td><input type=\"text\" name=\"kategori\" ></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><button type=\"submit\">Kirim</button></td>
            </tr>
        </tabel>
      </form>
    ";
  }
  ?>
</body>

</html>

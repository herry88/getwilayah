<?php
include "config/conn.php";

$username = $_POST['username'];
$password  = $_POST['password'];

$query = "SELECT * FROM users WHERE username = '$username'
          AND password='$password' ";
$login = mysqli_query($conn, $query);
$ketemu = mysqli_num_rows($login);
$data = mysqli_fetch_array($login);

//apabila username dan password valid
if ($ketemu > 0) {
  session_start();
  $_SESSION['namauser'] = $data['username'];
  $_SESSION['level'] = $data['level'];
  $_SESSION['passuser'] = $data['password'];
  header("location:media.php?module=beranda");
} else {
  echo "<center>Login Gagal username dan password tidak benar</center>";
  echo "Ulangi lagi";
}

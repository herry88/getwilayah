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
if($ketemu > 0){
  session_start();
  $_SESSION['namauser'] = $data['username'];
  $_SESSION['level'] = $data['level'];
// header("location:modul/mod_beranda/beranda.php");
echo "<h1>Berhasil LOGIn</h1>";
}
else{
  echo "<center>Login Gagal username dan password tidak benar</center>";
  echo "Ulangi lagi";
}
?>

<?php 
session_start();
if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
    echo "Anda harus login terlebih dahulu, <a href=\"../../index.php\">Login</a>";
}
else{
    //include file koneksi php ke database
    include "../../config/conn.php";
    $module = $_GET['module'];
    $act = $_GET['act'];
    //input tahun akademik
    if($module=='tahunakademik' AND $act =='input'){
        echo "Jika benar tulisan ini akan tampil";
    }

}
?>
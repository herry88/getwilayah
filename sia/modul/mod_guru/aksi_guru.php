<?php
//function untuk simpan data
session_start();
if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
    echo "Anda harus login terlebih dahulu, <a href=\"../../index.php\">Login</a>";
} else{
    include "../../config/conn.php";
    $module = $_GET['module'];
    $act = $_GET['act'];
    //function save input guru
    if($module == 'guru' AND $act=='input'){
        $nm_guru = $_POST['nm_guru'];
        $alamat = $_POST['alamat'];
        $status = $_POST['masaaktif'];
        $tahun_akademik = $_POST['id_tahun_akademik'];
     

        //save data
        $input = "INSERT INTO guru(nm_guru, alamat, id_tahun_akademik, status)VALUES('$nm_guru','$alamat','$tahun_akademik','$status')";
        $query = mysqli_query($conn, $input);
        header("location:../../media.php?module=".$module);
    } 
    //untuk delete data guru
    elseif($module == 'guru' AND $act=='hapus'){
        $hapus = mysqli_query($conn, "DELETE FROM guru WHERE id_guru = '$_GET[id]'");
        header("location:../../media.php?module=".$module);
    }
}
?>
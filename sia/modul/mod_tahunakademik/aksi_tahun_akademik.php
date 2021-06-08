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
        $tahun_akademik = $_POST['tahun_akademik'];
        $keterangan = $_POST['keterangan'];
        //function simpan data
        $input = mysqli_query($conn, "INSERT INTO tahun_akademik(tahun_akademik, keterangan)VALUES('$tahun_akademik','$keterangan')");
        header("location: ../../media.php?module=".$module);

    }
    //update data 
    elseif($module == 'tahunakademik' AND $act == 'update'){
        $id = $_POST['id'];
        $tahun_akademik = $_POST['tahun_akademik'];
        $keterangan = $_POST['keterangan'];
        //function untuk Edit data
        $update = mysqli_query($conn, "UPDATE tahun_akademik SET tahun_akademik = '$tahun_akademik',
                                                                 keterangan = '$keterangan'
                                        WHERE id_tahun_akademik ='$id'");
        header("location:../../media.php?module=".$module);

    }

}
?>
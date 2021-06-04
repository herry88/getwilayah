<?php 
//apabila user blm login 
if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
    echo "<center>
        <h3>Untuk Mengakses halaman ini anda harus login dahulu</h3>
        <br>
        <a href=\"index.php\"><h3>Halaman Login</h3></a>
    </center>";
  } 
  else{
      //memanggil file connection
    include "config/conn.php";
    
    //isi content disini
    //akses ke halaman tahun akademik 
    if($_GET['module']=='tahunakademik'){
        if($_SESSION['level']=='admin'){
            include "modul/mod_tahunakademik/tahun_akademik.php";
        }
    }

    //akses halaman guru
    else if($_GET['module']=='guru'){
        if($_SESSION['level']=='admin'){
            include "modul/mod_guru/guru.php";
        }

    }

    else{
        echo "
        <div class=\"content-wrapper\">
            <div class=\"content-header\">
                <div class=\"container-fluid\"> 
                    <div class=\"row mb-2\">
                        <div class=\"col-sm-6\">
                            <h1 class=\"m-0\">Modul Tidak Ada</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>";
    }


}
?>
<?php
//apabila user blm login 
if (empty($_SESSION['namauser']) and empty($_SESSION['passuser'])) {
    echo "<center>
        <h3>Untuk Mengakses halaman ini anda harus login dahulu</h3>
        <br>
        <a href=\"index.php\"><h3>Halaman Login</h3></a>
    </center>";
} else {
    $aksi = "modul/mod_guru/aksi_guru.php";
    $act = isset($_GET['act']) ? $_GET['act'] : '';
    switch ($act) {
            //tampil data guru
        default:
            echo "
       <div class=\"content-header\">
       <div class=\"container-flsudo uid\">
           <div class=\"row mb-2\">
               <div class=\"col-sm-6\">
                   <h1 class=\"m-0\">Halaman Guru</h1>
               </div><!-- /.col -->
               <div class=\"col-sm-6\">
                   <ol class=\"breadcrumb float-sm-right\">
                       <li class=\"breadcrumb-item\"><a href=\"#\">Home</a></li>
                       <li class=\"breadcrumb-item active\">Halaman Guru</li>
                   </ol>
               </div><!-- /.col -->
           </div><!-- /.row -->
       </div><!-- /.container-fluid -->
   </div>";
            echo "
        <div class=\"content\">
            <div class=\"container-fluid\">
                <div class=\"row\">
                    <div class=\"col-lg-8\">
                        <div class=\"card card-primary card-outline\">
                            <div class=\"card-header\">
                               <button type=\"button\" class=\"btn btn-primary\" onclick=window.location.href=\"?module=tahunakademik&act=tambahtahunakademik\">Add Page</button>
                            </div>
                            <div class=\"card-body\">
                                <div class=\"card-title\">
                                    <table class=\"table table-bordered\">
                                        <thead>
                                            <th>no</th>
                                            <th>Nama Guru</th>
                                            <th>Alamat</th>
                                            <th>Status</th>
                                            <th>Tools</th>
                                        </thead>";

            echo " <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>1</td>
                                                <td></td>
                                            </tr>";

            echo "
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>";

            break;
    }
}

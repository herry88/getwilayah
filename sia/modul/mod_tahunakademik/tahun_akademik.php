<?php
//apabila user blm login 
if (empty($_SESSION['namauser']) and empty($_SESSION['passuser'])) {
    echo "<center>
        <h3>Untuk Mengakses halaman ini anda harus login dahulu</h3>
        <br>
        <a href=\"index.php\"><h3>Halaman Login</h3></a>
    </center>";
} else {
    $aksi = "modul/mod_tahunakademik/aksi_tahun_akademik.php";
    //mengatasi variabel yang belum di definisikan 
    $act = isset($_GET['act']) ? $_GET['act'] : '';
    switch ($act) {
            //show tahun akademik page
        default:
            echo "
            <div class=\"content-header\">
            <div class=\"container-flsudo uid\">
                <div class=\"row mb-2\">
                    <div class=\"col-sm-6\">
                        <h1 class=\"m-0\">Halaman Tahun Akademik</h1>
                    </div><!-- /.col -->
                    <div class=\"col-sm-6\">
                        <ol class=\"breadcrumb float-sm-right\">
                            <li class=\"breadcrumb-item\"><a href=\"#\">Home</a></li>
                            <li class=\"breadcrumb-item active\">Halaman Tahun Akademik</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div> ";
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
                                            <th>Tahun Akademik</th>
                                            <th>Keterangan</th>
                                            <th>Tools</th>
                                        </thead>";
            $no = 1;
            $query = mysqli_query($conn, "SELECT * FROM tahun_akademik");
            while ($t = mysqli_fetch_array($query)) {
                echo "
                                            <tbody>
                                            <tr>
                                                <td>$no</td>
                                                <td>$t[tahun_akademik]</td>
                                                <td>$t[keterangan]</td>
                                                <td><a href=\"?module=tahunakademik&act=edittahunakademik&id=$t[id_tahun_akademik]\" class='btn btn-warning'><i class=\"fa fa-edit\"></i>Edit</a></td>
                                            </tr>";
                $no++;
            }
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
        case "tambahtahunakademik":
            echo "
        <div class=\"content-header\">
            <div class=\"container-flsudo uid\">
                <div class=\"row mb-2\">
                    <div class=\"col-sm-6\">
                        <h1 class=\"m-0\">Tambah Tahun Akademik</h1>
                    </div><!-- /.col -->
                    <div class=\"col-sm-6\">
                        <ol class=\"breadcrumb float-sm-right\">
                            <li class=\"breadcrumb-item\"><a href=\"#\">Home</a></li>
                            <li class=\"breadcrumb-item active\">Tambah Tahun Akademik</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class=\"content\">
                <div class=\"container-fluid\">
                    <div class=\"row\">
                        <div class=\"col-lg-8\">
                            <div class=\"card card-primary card-outline\">
                                <div class=\"card-header\">
                                <h2>Halaman Tambah Data</h2>
                                </div>
                                <div class=\"card-body\">
                                    <div class=\"card-title\">
                                        <form action='$aksi?module=tahunakademik&act=input' method=\"POST\">
                                            <table class='table table-bordered'>
                                                    <tr>
                                                        <td>Tahun Akademik :</td>
                                                        <td><input type=\"text\" class=\"form-control\" name=\"tahun_akademik\"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Keterangan</td>
                                                        <td><input type=\"text\" name=\"keterangan\" class='form-control'></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td><button class='btn btn-primary' type='submit'>Simpan Data</button> 
                                                            <button class='btn btn-danger' type='button' onclick=window.history.back()>Batal</button>
                                                        </td>
                                                    </tr>
                                            </table>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>";
            break;
        case "edittahunakademik":
            //munculkan data pada form edit 
            $query = "SELECT * FROM tahun_akademik WHERE id_tahun_akademik='$_GET[id]'";
            $hasil = mysqli_query($conn, $query);
            $r = mysqli_fetch_array($hasil);
            echo "
        <div class=\"content-header\">
            <div class=\"container-flsudo uid\">
                <div class=\"row mb-2\">
                    <div class=\"col-sm-6\">
                        <h1 class=\"m-0\">Edit Tahun Akademik</h1>
                    </div><!-- /.col -->
                    <div class=\"col-sm-6\">
                        <ol class=\"breadcrumb float-sm-right\">
                            <li class=\"breadcrumb-item\"><a href=\"#\">Home</a></li>
                            <li class=\"breadcrumb-item active\">Tambah Tahun Akademik</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class=\"content\">
                <div class=\"container-fluid\">
                    <div class=\"row\">
                        <div class=\"col-lg-8\">
                            <div class=\"card card-primary card-outline\">
                                <div class=\"card-header\">
                                <h2>Halaman Edit Data</h2>
                                </div>
                                <div class=\"card-body\">
                                    <div class=\"card-title\">
                                        <form action='$aksi?module=tahunakademik&act=update' method=\"POST\">
                                        <input type='hidden' name='id' value='$r[id_tahun_akademik]'>                                            
                                        <table class='table table-bordered'>
                                                    <tr>
                                                        <td>Tahun Akademik :</td>
                                                        <td><input type=\"text\" class=\"form-control\" name=\"tahun_akademik\" value=\"$r[tahun_akademik]\"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Keterangan</td>
                                                        <td><input type=\"text\" name=\"keterangan\" class='form-control' value=\"$r[keterangan]\"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td><button class='btn btn-primary' type='submit'>Simpan Data</button> 
                                                            <button class='btn btn-danger' type='button' onclick=window.history.back()>Batal</button>
                                                        </td>
                                                    </tr>
                                            </table>
                                        </form>
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

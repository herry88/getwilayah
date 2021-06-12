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
                               <button type=\"button\" class=\"btn btn-primary\" onclick=window.location.href=\"?module=guru&act=tambahguru\">Add Page</button>
                            </div>
                            <div class=\"card-body\">
                                <div class=\"card-title\">
                                    <table class=\"table table-bordered\">
                                        <thead>
                                            <th>no</th>
                                            <th>Nama Guru</th>
                                            <th>Alamat</th>
                                            <th>Tahun Akademik</th>
                                            <th>Status</th>
                                            <th>Tools</th>
                                        </thead>
                                        <tbody>";

            $query = "SELECT tahun_akademik.tahun_akademik, tahun_akademik.keterangan, guru.nm_guru, guru.alamat, guru.id_guru, guru.status FROM guru, tahun_akademik WHERE tahun_akademik.id_tahun_akademik = guru.id_tahun_akademik";
            $no = 1;
            $hasil = mysqli_query($conn, $query);
            while ($t = mysqli_fetch_array($hasil)) {
                echo "<tr>
                                                <td>$no</td>
                                                <td>$t[nm_guru]</td>
                                                <td>$t[alamat]</td>
                                                <td>$t[tahun_akademik]($t[keterangan])</td>";
                if ($t['status'] == 'Y') {
                    echo "<td>
                            <a href=\"#\" class='btn btn-success'>$t[status]</a>
                        </td>";
                } else {
                    echo "<td>
                            <a href=\"#\" class='btn btn-danger'>$t[status]</a>
                        </td>";
                }
                echo "
                        <td>
                            <a href='?module=guru&act=editguru&id=$t[id_guru]' class='btn btn-warning' title='Edit'><i class='fa fa-edit'></i></a>
                            <a href='$aksi?module=guru&act=hapus&id=$t[id_guru]' class='btn btn-danger' title='Delete'><i class='fa fa-trash'></i></a>
                        </td>
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
        case "tambahguru":
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
                            <h2>Tambah Guru</h2>
                        </div>
                        <div class=\"card-body\">
                            
                            <div class=\"card-title\">
                                <form action='$aksi?module=guru&act=input' method=\"POST\">
                                    <table class='table table-bordered'>
                                            <tr>
                                                <td>Nama Guru :</td>
                                                <td><input type=\"text\" class=\"form-control\" name=\"nm_guru\"></td>
                                            </tr>
                                            <tr>
                                                <td>Alamat</td>
                                                <td><input type=\"text\" name=\"alamat\" class='form-control'></td>
                                            </tr>
                                            <tr>
                                                <td>Tahun Akademik :</td>
                                                <td><select name=\"id_tahun_akademik\" class=\"form-control\">
                                                    <option value=\"0\">-Pilih Data Tahun Akademik</option>";
            $query = "SELECT * FROM tahun_akademik ORDER BY id_tahun_akademik";
            $tampil = mysqli_query($conn, $query);
            while ($d = mysqli_fetch_array($tampil)) {
                echo "<option value='$d[id_tahun_akademik]'>$d[tahun_akademik] - ($d[keterangan])</option>";
            }
            echo "
                                                </select></td>
                                            </tr>
                                            <tr>
                                                <td>Status:</td>
                                                <td>
                                                    <input type =\"radio\" value=\"Y\" name=\"masaaktif\" checked> Aktif <input type =\"radio\" value=\"N\" name=\"masaaktif\"> Tidak Aktif 
                                                </td>
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
        case "editguru":
        $query_guru = "SELECT * FROM guru WHERE id_guru='$_GET[id]'";
        $hasil = mysqli_query($conn, $query_guru);
        $r = mysqli_fetch_array($hasil);
            echo "
       <div class=\"content-header\">
       <div class=\"container-flsudo uid\">
           <div class=\"row mb-2\">
               <div class=\"col-sm-6\">
                   <h1 class=\"m-0\">Edit Guru</h1>
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
            //ui edit guru
            echo "
   <div class=\"content\">
        <div class=\"container-fluid\">
            <div class=\"row\">
                <div class=\"col-lg-8\">
                    <div class=\"card card-primary card-outline\">
                        <div class=\"card-header\">
                            <h2>Edit  Guru</h2>
                        </div>
                        <div class=\"card-body\">
                            
                            <div class=\"card-title\">
                                <form action='$aksi?module=guru&act=update' method=\"POST\">
                                <input type=\"hidden\" name=\"id\" value=\"$r[id_guru]\">
                                    <table class='table table-bordered'>
                                            <tr>
                                                <td>Nama Guru :</td>
                                                <td><input type=\"text\" class=\"form-control\" value=\"$r[nm_guru]\" name=\"nm_guru\"></td>
                                            </tr>
                                            <tr>
                                                <td>Alamat</td>
                                                <td><input type=\"text\" name=\"alamat\" value =\"$r[alamat]\" class='form-control'></td>
                                            </tr>
                                            <tr>
                                                <td>Tahun Akademik :</td>
                                                <td><select name=\"id_tahun_akademik\" class=\"form-control\">";
                                                if($r['id_tahun_akademik']==0){
                                                    echo "<option value=\"0\" selected>-Pilih Data Tahun Akademik</option>";
                                                }
                                                    
            $query = "SELECT * FROM tahun_akademik ORDER BY tahun_akademik";
            $tampil = mysqli_query($conn, $query);
            while ($d = mysqli_fetch_array($tampil)) {
               if($r['id_tahun_akademik'] == $d['id_tahun_akademik']){
                echo "<option value='$d[id_tahun_akademik]' selected>$d[tahun_akademik] - ($d[keterangan])</option>";
               } else{
                echo "<option value='$d[id_tahun_akademik]'>$d[tahun_akademik] - ($d[keterangan])</option>";
               }
            }
            echo "
                                                </select></td>
                                            </tr>
                                            <tr>
                                                <td>Status:</td>
                                                <td>
                                                    <input type =\"radio\" value=\"Y\" name=\"masaaktif\" checked> Aktif <input type =\"radio\" value=\"N\" name=\"masaaktif\"> Tidak Aktif 
                                                </td>
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

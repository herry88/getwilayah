<?php
function Hari($namahari){
    $hari = array("senin","selasa","rabu","kamis","jumat","sabtu","minggu");
    echo "<select name='$namahari'>";
        for($i = 0; $i <= 6; $i++){
            echo "<option value='$hari[$i]'>$hari[$i]</option>";
        }
    echo "</select>";

} 
Hari('hariultah');
?>
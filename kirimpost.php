<?php
include "form_2.php";
$angka1 = $_POST['angka1'];
$angka2 = $_POST['angka2'];
$operator = $_POST['operator'];
if($operator == "+"){
    echo $angka1 + $angka2;
}elseif($operator == "-"){
    echo $angka1 - $angka2;
}elseif($operator == "/"){
    echo $angka1 / $angka2;
}elseif($operator == "*"){
    echo $angka1  * $angka2;
}else{
    echo "Tidak ada pilihan";
}

<?php 
$a  = 5; 
$b = 5; 
$c = "kali"; 
if($c == "jumlah"){
    echo $a + $b; 
}elseif($c == 'bagi'){
    echo $a / $b;
}
elseif($c == 'kali'){
    echo $a * $b;
} else{
    echo 'Tidak ada yang cocok';
}

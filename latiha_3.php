<?php 
$angka_1 = array(29, 20, 2, 4,10, 5, 8, 15);
// echo $angka_1[2];
// for($i = 0; $i < count($angka_1); $i++){
//     // echo $angka_1[$i]. "<br>";
//     if($angka_1[$i] %  2 == 0){
//         echo $angka_1[$i]. "<br/>";
//     } 
// }
foreach($angka_1 as $value){
    // echo $value . "\n";
    if($value % 2 == 1):
        echo $value. "<br>";
    // elseif($value % 2 == 1):
    //     echo $value. "<br>";
    endif;
}
?>

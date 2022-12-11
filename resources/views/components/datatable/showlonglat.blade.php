<?php

$koneksi = mysqli_connect("localhost","root","","telkomselpwt");


$ceks = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM data2s WHERE id='$value'"));
$koordinats = $ceks['lat'].",".$ceks['long'];
if(empty($ceks['unik_krdnt'])){
    mysqli_query($koneksi,"UPDATE data2s SET unik_krdnt='$koordinats' WHERE id='$value'");
    echo $koordinats;
}else{
    echo $koordinats;
}

?>

<?php
// Konfigurasi database
$database_hostname = "localhost";       
$database_username = "root";            
$database_password = "";           
$database_name = "utb"; 


// Cek koneksi
try{
    $database_connetion = new PDO("mysql:host=$database_hostname;dbname=$database_name",$database_username,$database_password);
    $cek = "koneksi berhasil";
    echo $cek;

}catch(PDOException $x){
    die($x->getMessage());
}
?>

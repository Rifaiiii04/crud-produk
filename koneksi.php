<?php 
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'produk_db';
    
    // Create connection
    $koneksi = mysqli_connect($host, $username, $password, $dbname);
    
    // Check connection
    // if(!$koneksi){
    //     die('Koneksi Gagal'. mysqli_connect_error());
    // } else{
    //     echo 'Koneksi Berhasil';
    // }
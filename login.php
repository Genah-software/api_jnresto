<?php

header('Access-Control-Allow-Origin: *');
include 'koneksi.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $response = array();
    $nama = $_POST['nama'];
    $password = $_POST['password'];
    
    $cek ="SELECT * FROM pelanggan WHERE nama='$nama' and password='$password'";
    $result = mysqli_fetch_array(mysqli_query( $conn,$cek));

    if(isset($result)){
        $response['value'] = 1;
        $response['message'] = 'Login Berhasil';
        echo json_encode($response);

    } else{
            $response['value'] = 0;
            $response['message'] = "login gagal";
            echo json_encode($response);
        }
    }

header('Content-Type: application/json');
?>
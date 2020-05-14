<?php
require 'koneksi.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $fakultas = $_POST['fakultas'];
    $jurusan = $_POST['jurusan'];

    // cek nim terdaftar
    $query = "SELECT * FROM tb_mahasiswa WHERE nim = '$nim'";
    $result = mysqli_fetch_assoc(mysqli_query($conn, $query));
    if(isset($result)){
        $response['status'] = 'bad';
        $response['message'] = 'NIM Sudah terdaftar';
        echo json_encode($response);
    }else{
        $query = "INSERT INTO tb_mahasiswa (nim, nama, fakultas, jurusan, last_update) 
                    VALUES('$nim', '$nama', '$fakultas', '$jurusan', current_timestamp())";
        if(mysqli_query($conn, $query)){
            $response['status'] = 'ok';
            $response['message'] = 'Berhasil didaftarkan';
            echo json_encode($response);
        }else{
            $response['status'] = 'bad';
            $response['message'] = 'Gagal didaftarkan';
            echo json_encode($response);
        }
    }
    mysqli_close($conn);
}else{
    $response['status'] = 'bad';
    $response['message'] = 'Coba Lagi';
    echo json_encode($response);
}

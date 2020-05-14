<?php
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    
    $totalMahasiswa = "SELECT COUNT(id) FROM tb_mahasiswa";
    $mahasiswaTeknik = "SELECT COUNT(id) FROM tb_mahasiswa WHERE fakultas LIKE '%teknik%'";
    $mahasiswaInformatika = "SELECT COUNT(id) FROM tb_mahasiswa WHERE jurusan LIKE '%informatika%'";
    $lastUpdate = "SELECT MAX(last_update) FROM tb_mahasiswa";

    $rows = array("totalMahasiswa" => lihatData($totalMahasiswa), 
            "mahasiswaTeknik" => lihatData($mahasiswaTeknik),
            "mahasiswaInformatika" => lihatData($mahasiswaInformatika),
            "lastUpdate" => lihatData($lastUpdate));

    echo json_encode(array("status" => "ok", "result" => $rows));    
}

function lihatData($query)
{
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = array();
    while ($row = mysqli_fetch_array($result)) {
        $rows = $row;     
    }
    return $rows[0];
}

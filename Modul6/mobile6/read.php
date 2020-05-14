<?php
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $query = 'SELECT * FROM tb_mahasiswa';

    $result = mysqli_query($conn, $query);
    $rows = array();
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($rows, array(
            "id" => $row['id'], 'nim' => $row['nim'], 'nama' => $row['nama'],
            'fakultas' => $row['fakultas'], 'jurusan' => $row['jurusan']
        ));
    }
    echo json_encode(array("status"=>"ok", "result"=>$rows));
    mysqli_close($conn);
}

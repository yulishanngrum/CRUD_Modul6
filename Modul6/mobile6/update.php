<?php
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = (int) $_POST['id'];
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $fakultas = $_POST['fakultas'];
    $jurusan = $_POST['jurusan'];

    $query = "UPDATE tb_mahasiswa SET nim = '$nim', nama = '$nama', 
                    fakultas = '$fakultas', jurusan = '$jurusan', 
                    last_update = current_timestamp()
                    WHERE id = $id ";
    if (mysqli_query($conn, $query)) {
        $response['status'] = 'ok';
        $response['message'] = 'Berhasil diupdate';
        echo json_encode($response);
    } else {
        $response['status'] = 'bad';
        $response['message'] = 'Gagal diupdate';
        echo json_encode($response);
    }
    mysqli_close($conn);
} else {
    $response['status'] = 'bad';
    $response['message'] = 'Coba Lagi';
    echo json_encode($response);
}

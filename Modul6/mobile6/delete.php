<?php
require('koneksi.php');

if($_SERVER['REQUEST_METHOD']=='POST'){
    $id = (int)$_POST['id'];

    $query = "DELETE FROM tb_mahasiswa WHERE id = $id";
    if (mysqli_query($conn, $query)) {
        $response['status'] = 'ok';
        $response['message'] = 'Berhasil dihapus';
        echo json_encode($response);
    } else {
        $response['status'] = 'bad';
        $response['message'] = 'Gagal dihapus';
        echo json_encode($response);
    }
    mysqli_close($conn);
}


?>
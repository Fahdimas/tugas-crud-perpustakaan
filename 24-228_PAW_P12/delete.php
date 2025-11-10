<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];

    $sql_get_image = "SELECT cover_image FROM buku WHERE id = $id";
    $result = mysqli_query($conn, $sql_get_image);
    $data = mysqli_fetch_assoc($result);

    if ($data && file_exists('uploads/' . $data['cover_image'])) {
        unlink('uploads/' . $data['cover_image']);
    }

    $sql_delete = "DELETE FROM buku WHERE id = $id";
    if (mysqli_query($conn, $sql_delete)) {
        echo "<script>alert('Data berhasil dihapus!'); window.location='index.php';</script>";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    header('Location: index.php');
}
?>
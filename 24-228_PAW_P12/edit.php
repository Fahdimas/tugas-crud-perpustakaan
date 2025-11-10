<?php
include 'db.php';

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}
$id = (int)$_GET['id'];

$sql = "SELECT * FROM buku WHERE id = $id";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);
if (!$data) {
    die("Data tidak ditemukan.");
}

if (isset($_POST['update'])) {
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $pengarang = mysqli_real_escape_string($conn, $_POST['pengarang']);
    $tahun = (int)$_POST['tahun_terbit'];

    if (!empty($_FILES['cover_image']['name'])) {
        $cover = $_FILES['cover_image']['name'];
        $tmp_cover = $_FILES['cover_image']['tmp_name'];
        $cover_new_name = time() . '_' . $cover;
        $target = 'uploads/' . $cover_new_name;

        if (file_exists('uploads/' . $data['cover_image']) && $data['cover_image'] != '') {
            unlink('uploads/' . $data['cover_image']);
        }

        move_uploaded_file($tmp_cover, $target);
        $sql_update = "UPDATE buku SET judul='$judul', pengarang='$pengarang', 
                       tahun_terbit='$tahun', cover_image='$cover_new_name' WHERE id=$id";
    } else {
        $sql_update = "UPDATE buku SET judul='$judul', pengarang='$pengarang', 
                       tahun_terbit='$tahun' WHERE id=$id";
    }

    if (mysqli_query($conn, $sql_update)) {
        echo "<script>alert('Data berhasil diupdate!'); window.location='index.php';</script>";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
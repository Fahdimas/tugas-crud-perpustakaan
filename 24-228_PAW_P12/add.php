<?php
include 'db.php';

if (isset($_POST['submit'])) {
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $pengarang = mysqli_real_escape_string($conn, $_POST['pengarang']);
    $tahun = (int)$_POST['tahun_terbit'];

    $cover = $_FILES['cover_image']['name'];
    $tmp_cover = $_FILES['cover_image']['tmp_name'];
    $cover_new_name = time() . '_' . $cover; 
    $target = 'uploads/' . $cover_new_name;

    if (!empty($cover)) {
        if (!is_dir('uploads')) { mkdir('uploads', 0755, true); }
        
        if (move_uploaded_file($tmp_cover, $target)) {
            $sql = "INSERT INTO buku (judul, pengarang, tahun_terbit, cover_image) 
                    VALUES ('$judul', '$pengarang', '$tahun', '$cover_new_name')";
            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Buku berhasil ditambahkan!'); window.location='index.php';</script>";
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            echo "<script>alert('Gagal mengupload gambar.');</script>";
        }
    } else {
         echo "<script>alert('Harap pilih gambar cover.');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Buku</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="container" style="max-width: 500px;">
        <h2>Tambah Buku Baru</h2>
        <form method="POST" enctype="multipart/form-data">
            <label>Judul Buku:</label>
            <input type="text" name="judul" required placeholder="Contoh: Laskar Pelangi">
            
            <label>Pengarang:</label>
            <input type="text" name="pengarang" required placeholder="Contoh: Andrea Hirata">
            
            <label>Tahun Terbit:</label>
            <input type="number" name="tahun_terbit" required placeholder="Contoh: 2005">
            
            <label>Cover Image:</label>
            <input type="file" name="cover_image" required accept="image/*">
            
            <div class="form-actions">
                <button type="submit" name="submit">Simpan Buku</button>
                <a href="index.php" class="btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</body>
</html>
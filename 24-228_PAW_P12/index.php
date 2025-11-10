<?php
include 'db.php';

$search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';
$whereClause = "";
if ($search != '') {
    $whereClause = "WHERE judul LIKE '%$search%' OR pengarang LIKE '%$search%'";
}

$limit = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;

$countSql = "SELECT COUNT(*) AS total FROM buku $whereClause";
$countResult = mysqli_query($conn, $countSql);
$countRow = mysqli_fetch_assoc($countResult);
$total_records = $countRow['total'];
$total_pages = ceil($total_records / $limit);

$sql = "SELECT * FROM buku $whereClause LIMIT $start, $limit";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Buku</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="container">
        <h2>Daftar Buku Perpustakaan</h2>

        <form method="GET" action="" style="display: flex; gap: 10px;">
            <input type="text" name="search" placeholder="Cari judul atau pengarang..." value="<?php echo htmlspecialchars($search); ?>" style="margin-bottom: 0; flex: 1;">
            <button type="submit" style="width: auto;">Cari</button>
        </form>
        
        <a href="add.php" class="btn-add">+ Tambah Buku Baru</a>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Cover</th>
                    <th>Judul Buku</th>
                    <th>Pengarang</th>
                    <th>Tahun</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (mysqli_num_rows($result) > 0): ?>
                    <?php 
                    $no = 1 + $start; 
                    ?>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $no++; ?></td> 
                        <td>
                            <?php if (!empty($row['cover_image'])): ?>
                                <img src="uploads/<?php echo $row['cover_image']; ?>" class="table-img" alt="Cover">
                            <?php else: ?>
                                <span style="color: #999;">No Image</span>
                            <?php endif; ?>
                        </td>
                        <td><strong><?php echo htmlspecialchars($row['judul']); ?></strong></td>
                        <td><?php echo htmlspecialchars($row['pengarang']); ?></td>
                        <td><?php echo $row['tahun_terbit']; ?></td>
                        <td class="action-links">
                            <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                            <a href="delete.php?id=<?php echo $row['id']; ?>" class="delete-link" onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="6" style="text-align: center;">Tidak ada data buku ditemukan.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>

        <div class="pagination">
            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <a href="?page=<?php echo $i; ?>&search=<?php echo urlencode($search); ?>" 
                   class="<?php if ($page == $i) echo 'active'; ?>">
                    <?php echo $i; ?>
                </a>
            <?php endfor; ?>
        </div>
    </div>
</body>
</html>
<?php
require_once __DIR__ . '/../classes/Barang.php';

$barang = new Barang();
$data = $barang->all();
?>

<div class="content">
    <h2>Data Barang</h2>

    <a class="btn" href="index.php?page=barang_add">Tambah Barang</a>

    <table>
        <tr>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>

        <?php foreach ($data as $row): ?>
        <tr>
            <td><img src="<?= $row['gambar']; ?>" width="70"></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['kategori']; ?></td>
            <td><?= $row['harga_beli']; ?></td>
            <td><?= $row['harga_jual']; ?></td>
            <td><?= $row['stok']; ?></td>
            <td>
                <a href="index.php?page=barang_edit&id=<?= $row['id_barang']; ?>">Edit</a> |
                <a href="index.php?page=barang_delete&id=<?= $row['id_barang']; ?>" onclick="return confirm('Hapus data?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>

    </table>
</div>

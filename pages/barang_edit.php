<?php
require_once __DIR__ . '/../classes/Form.php';
require_once __DIR__ . '/../classes/Barang.php';

$db = new Barang();
$id = $_GET['id'];
$barang = $db->find($id);

if (!$barang) {
    echo "<p>Data tidak ditemukan!</p>";
    exit;
}

if (isset($_POST['submit'])) {

    $gambar = $barang['gambar'];
    if (!empty($_FILES['gambar']['name'])) {
        $file = $_FILES['gambar']['name'];
        $file = str_replace(" ", "_", $file);
        move_uploaded_file($_FILES['gambar']['tmp_name'], "gambar/" . $file);
        $gambar = "gambar/" . $file;
    }

    $db->update($id, [
        "nama" => $_POST['nama'],
        "kategori" => $_POST['kategori'],
        "harga_beli" => $_POST['harga_beli'],
        "harga_jual" => $_POST['harga_jual'],
        "stok" => $_POST['stok'],
        "gambar" => $gambar
    ]);

    header("Location: index.php?page=barang_list");
    exit();
}

$form = new Form("", "Update");
$form->addField("nama", "Nama Barang", "text", $barang['nama']);
$form->addField("kategori", "Kategori", "text", $barang['kategori']);
$form->addField("harga_beli", "Harga Beli", "text", $barang['harga_beli']);
$form->addField("harga_jual", "Harga Jual", "text", $barang['harga_jual']);
$form->addField("stok", "Stok", "text", $barang['stok']);
$form->addField("gambar", "Gambar", "file");
?>

<div class="content">
    <h2>Edit Barang</h2>
    <?php $form->render(); ?>
</div>

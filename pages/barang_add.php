<?php
require_once __DIR__ . '/../classes/Form.php';
require_once __DIR__ . '/../classes/Barang.php';

if (isset($_POST['submit'])) {

    $gambar = "";
    if (!empty($_FILES['gambar']['name'])) {
        $file = $_FILES['gambar']['name'];
        $file = str_replace(" ", "_", $file);
        move_uploaded_file($_FILES['gambar']['tmp_name'], "gambar/" . $file);
        $gambar = "gambar/" . $file;
    }

    $db = new Barang();
    $db->insert([
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

$form = new Form("", "Simpan");
$form->addField("nama", "Nama Barang");
$form->addField("kategori", "Kategori");
$form->addField("harga_beli", "Harga Beli");
$form->addField("harga_jual", "Harga Jual");
$form->addField("stok", "Stok");
$form->addField("gambar", "Gambar", "file");
?>

<div class="content">
    <h2>Tambah Barang</h2>
    <?php $form->render(); ?>
</div>

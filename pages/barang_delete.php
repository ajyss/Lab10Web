<?php
require_once __DIR__ . '/../classes/Barang.php';

$db = new Barang();
$id = $_GET['id'];
$db->delete($id);

header("Location: index.php?page=barang_list");
exit();
?>

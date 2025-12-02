<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'barang_list';

$allowed = [
    'barang_list',
    'barang_add',
    'barang_edit',
    'barang_delete'
];

if (!in_array($page, $allowed)) {
    $page = 'barang_list';
}

include "includes/header.php";
include "pages/{$page}.php";
include "includes/footer.php";
?>

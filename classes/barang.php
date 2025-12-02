<?php
require_once __DIR__ . '/Database.php';

class Barang {

    private $db;
    private $table = "data_barang";
    private $pk = "id_barang";

    public function __construct() {
        $this->db = new Database();
    }

    public function all() {
        return $this->db->getAll($this->table);
    }

    public function find($id) {
        return $this->db->getById($this->table, $this->pk, $id);
    }

    public function insert($data) {
        $cols = implode(",", array_keys($data));
        $vals = implode("','", array_map([$this->db, 'escape'], array_values($data)));

        $sql = "INSERT INTO {$this->table} ({$cols}) VALUES ('{$vals}')";
        return $this->db->query($sql);
    }

    public function update($id, $data) {
        $set = [];
        foreach ($data as $k => $v) {
            $v = $this->db->escape($v);
            $set[] = "{$k}='{$v}'";
        }
        $set = implode(",", $set);

        $sql = "UPDATE {$this->table} SET {$set} WHERE {$this->pk}='{$id}'";
        return $this->db->query($sql);
    }

    public function delete($id) {
        $sql = "DELETE FROM {$this->table} WHERE {$this->pk}='{$id}'";
        return $this->db->query($sql);
    }
}
?>

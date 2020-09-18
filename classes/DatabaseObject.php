<?php

class DatabaseObject {

    public $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function select_all($table)
    {
        $sql = "SELECT * FROM {$table}";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);

    }

    public function find_by_id($table, $id)
    {
        $sql = "SELECT * FROM {$table} WHERE id = ?";
        $query = $this->db->prepare($sql);
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);


    }

    public  function delete($table, $id)
    {
        $sql = "DELETE FROM $table WHERE id = ?";
        $query = $this->db->prepare($sql);
        $query->execute([$id]);
    }

    public function save($data)
    {
        $sql = "INSERT INTO accounts VALUES(NULL,?,?,?)";
        $query = $this->db->prepare($sql);
        $query->execute([$data->name, $data->deposit, $data->credit_card]);

        if($query) {
            return "success";
        } else {
            return "error";
        }
    }



}



<?php

class QueryBuilder {

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
        return $query->fetch(PDO::FETCH_ASSOC);


        $stmt = $pdo->prepare('SELECT * FROM {$table} WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);

    }

    public  function delete($id)
    {
        var_dump($id);
        $sql = "DELETE FROM posts2 WHERE id = ?";
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



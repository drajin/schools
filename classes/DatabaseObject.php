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
        return $query->fetch(PDO::FETCH_ASSOC);


        $stmt = $pdo->prepare('SELECT * FROM {$table} WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);

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

    public function create(){

        $title = $_POST['post_title'];
        $description = $_POST['post_description'];
        $user_id = $_SESSION['loggedUser']->id;
        $created_at = date('Y,m,d');

        $sql = 'INSERT INTO posts VALUE(NULL, ?, ?, ?, ?)';
        $query = $this->db->prepare($sql);
        $query->execute([$title, $description, $user_id, $created_at]);

        if($query){
            $this->new_post_status = true;
        } else {
            $this->new_post_status = false;
        }
    }



}



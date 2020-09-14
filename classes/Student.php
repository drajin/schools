<?php

class Student extends DatabaseObject {


    static protected $table_name = 'students';
    static protected $db_columns = ['id', 'name'];


    public $id;
    public $name;
    public $errors = [];

    public function create(){

        $this->name = $_POST['name'];
        $this->validate();
        if(!empty($this->errors)) { return false;}

        $sql = 'INSERT INTO students VALUE(NULL, ?)';
        $query = $this->db->prepare($sql);
        return $query->execute([$this->name]);
    }

    public function update($name, $id){

        $sql = 'UPDATE students SET name=? WHERE id=?';
        $query = $this->db->prepare($sql);
        $query->execute([$name, $id]);
    }

    protected function validate() {
        $this->errors = [];
        if(empty($this->name)) {
            $this->errors[] = "Name cannot be blank.";
        }
        return $this->errors;

    }

}

?>

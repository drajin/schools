<?php

class School extends DatabaseObject {


    static protected $table_name = 'schools';
    static protected $db_columns = ['id', 'school_name'];

    public $id;
    public $name;
    public $errors = [];


    public function create(){

        $this->name = $_POST['name'];
        $this->validate();
        if(!empty($this->errors)) { return false;}

        $sql = 'INSERT INTO schools VALUE(NULL, ?)';
        $query = $this->db->prepare($sql);
        return $query->execute([$this->name]);
    }

    public function update($name, $id){
        $this->name = $name;
        $this->validate();
        if(!empty($this->errors)) { return false;}

        $sql = 'UPDATE schools SET school_name=? WHERE id=?';
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

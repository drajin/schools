<?php

class School extends DatabaseObject {


    static protected $table_name = 'schools';
    static protected $db_columns = ['id', 'name'];


    public $id;
    public $name;
    public $new_school_added = NULL;

    public function create(){

        $name = $_POST['name'];

        $sql = 'INSERT INTO schools VALUE(NULL, ?)';
        $query = $this->db->prepare($sql);
        $query->execute([$name]);
    }

    public function update($name, $id){

        $sql = 'UPDATE schools SET name=? WHERE id=?';
        $query = $this->db->prepare($sql);
        $query->execute([$name, $id]);
    }

    protected function validate() {
        $this->errors = [];
        //Add custom validations
        return $this->errors;
    }

}

?>

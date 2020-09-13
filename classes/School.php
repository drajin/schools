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

        if($query){
            $this->new_school_added = true;
        } else {
            $this->new_school_added = false;
        }
    }

    public function update(){

    }

    protected function validate() {
        $this->errors = [];
        //Add custom validations
        return $this->errors;
    }

}

?>

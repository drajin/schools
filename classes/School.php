<?php

class School extends DatabaseObject {


    static protected $table_name = 'schools';
    static protected $db_columns = ['id', 'name'];


    public function __construct($args=[]) {
        $this->name = $args['name'] ?? '';


        // Caution: allows private/protected properties to be set
        // foreach($args as $k => $v) {
        //   if(property_exists($this, $k)) {
        //     $this->$k = $v;
        //   }
        // }
    }


    public $id;
    public $name;

    protected function validate() {
        $this->errors = [];
        //Add custom validations
        return $this->errors;
    }

}

?>

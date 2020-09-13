<?php

class DatabaseObject3 {
    
    static protected $database;
    static protected $table_name = "";
    public $errors = [];
    
    
    function set_database($database) {
      self::$database = $database;
  }

    public function find_by_id($id)
    {
        $sql = "SELECT * FROM " . static::$table_name . " WHERE id = ?";
        $query = static::$database->prepare($sql);
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_ASSOC);

    }



    protected function validate() {
        $this->errors = [];
        if(is_blank($this->name)) {
            $this->errors[] = "Name cannot be blank.";
        }
        
        return $this->errors;
        
    }


    
    // Properties withs have database columns, excluding ID
    public function attributes() {
      $attributes = [];
      foreach(static::$db_columns as $column) {
          if($column == 'id') { continue; } //if it is id then skip
          $attributes[$column] = $this->$column;
      }
      return $attributes;
    }
    
    protected function sanitized_attributes() {
        $sanitized = [];
        foreach($this->attributes() as $key => $value){
            $sanitized[$key] = self::$database->escape_string($value);
        }
        return $sanitized;
    }

    
    
}
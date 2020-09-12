<?php

class DatabaseObject {
    
    static protected $database;
    static protected $table_name = "";
    public $errors = [];
    
    
    function set_database($database) {
      self::$database = $database;
  }

    public function find_by_idpdo($id)
    {
        $sql = "SELECT * FROM " . static::$table_name . " WHERE id = ?";
        $query = static::$database->prepare($sql);
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_ASSOC);

    }

  // ---- START OF ACTIVE RECORD CODE ----   
  static public function find_by_sql($sql) {
      $result = self::$database->query($sql);
      if(!$result) {
          exit("Database query failed!");
      }
      //results into objects
      $object_array = [];     
      while ($record = $result->fetch_assoc()) {
          $object_array[] = static::instantiate($record);
      }
      $result->free();
      return $object_array;
  }
 
    static public function find_all() {
      $sql = "SELECT * FROM " . static::$table_name;
      return static::find_by_sql($sql);
      

  }
  
   static public function count_all() {
      $sql = "SELECT COUNT(*) FROM " . static::$table_name;
      $result_set = self::$database->query($sql);
      $row = $result_set->fetch_array();
      return array_shift($row); 
      

  }  
  
  
    static public function find_by_id($id) {
        $sql = "SELECT * FROM " . static::$table_name . " ";
        $sql .="WHERE id='" . static::$database->escape_string($id) . "'";
        $obj_array = static::find_by_sql($sql);
        if(!empty($obj_array)) {
            return array_shift($obj_array);
        } else {
            return false;
        }
    }
    
    static protected function instantiate($record) {
        $object = new static;
        //Dynamically assign values to properties
        foreach ($record as $property => $value) {
            if(property_exists($object, $property)) {
                $object->$property = $value;
            }
        }
        return $object;
        
    }
    
    protected function validate() {
        $this->errors = [];
        if(is_blank($this->name)) {
            $this->errors[] = "Name cannot be blank.";
        }
        
        return $this->errors;
        
    }


    protected function create() {
        $this->validate();
        if(!empty($this->errors)) { return false;}
        
        $attributes = $this->sanitized_attributes();
        $sql = "INSERT INTO " . static::$table_name . " (";
        $sql .= join(', ', array_keys($attributes));
        $sql .= ") VALUES ('";
        $sql .= join("', '", array_values($attributes));
//        $sql .= "'" . $this->brand . "', ";
//        $sql .= "'" . $this->model . "', ";
//        $sql .= "'" . $this->year . "', ";
//        $sql .= "'" . $this->category . "', ";
//        $sql .= "'" . $this->color . "', ";
//        $sql .= "'" . $this->gender . "', ";
//        $sql .= "'" . $this->price . "', ";
//        $sql .= "'" . $this->weight_kg . "', ";
//        $sql .= "'" . $this->condition_id . "', ";
//        $sql .= "'" . $this->description . "'";
        $sql .= "')";
    $result = self::$database->query($sql);
    if($result) {
      $this->id = self::$database->insert_id;
    }
    return $result;
    }

    
    //nauci active record
    protected function update() {
        $this->validate();
        if(!empty($this->errors)) { return false;}
        
        $attributes = $this->sanitized_attributes();
        $attribute_pairs = [];
        foreach ($attributes as $key => $value) {
            $attribute_pairs[] = "{$key}='{$value}'";
        }
        $sql = "UPDATE " . static::$table_name . " SET ";
        $sql .= join(', ', $attribute_pairs);
        $sql .= "  WHERE id='" . self::$database->escape_string($this->id) . "' ";
        $sql .= "LIMIT 1";
        $result = self::$database->query($sql);
        return $result;
        
    }
    
    public function save() {
        if(isset($this->id)) {
            return $this->update();
        } else {
            return $this->create();
        }
    }
    //nauci
    public function merge_attributes($args=[]) {
        foreach($args as $key => $value) {
            if(property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
            
        }
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
    
    public function delete() {
       $sql = "DELETE FROM " . static::$table_name . " ";
       $sql .= "WHERE id='" . self::$database->escape_string($this->id) . "' ";
       $sql .= "LIMIT 1";
       $result = self::$database->query($sql);
       return $result;
    }

     // ---- END OF ACTIVE RECORD CODE ----
    
    
}
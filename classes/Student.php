<?php

class Student extends DatabaseObject {


    static protected $table_name = 'students';
    static protected $db_columns = ['id', 'name', 'school_id'];




    public $id;
    public $name;
    public $school_id;
    public $errors = [];

    public function create(){

        $this->name = $_POST['name'];
        $this->school_id = $_POST['school_id'];
        $this->validate();
        if(!empty($this->errors)) { return false;}

        $sql = 'INSERT INTO students VALUE(NULL, ?, ?)';
        $query = $this->db->prepare($sql);
        return $query->execute([$this->school_id, $this->name]);


    }


    public function update($name, $school_id, $id){

        $sql = 'UPDATE students SET name=?, school_id=? WHERE id=?';
        $query = $this->db->prepare($sql);
        $query->execute([$name, $school_id, $id]);
    }

    protected function validate() {
        $this->errors = [];
        if(empty($this->name)) {
            $this->errors[] = "Name cannot be blank.";
        }
        return $this->errors;

    }

    public function find_all_students() {
        $sql = 'SELECT students.id, students.name, students.school_id, schools.school_name FROM students ';
        $sql .= ' INNER JOIN schools ON students.school_id = schools.id;';
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

//    public function find_student_by_id($id)
//    {
//        $sql = "SELECT students.id, students.name, students.school_id, schools.school_name  FROM  students ";
//        $sql .= " INNER JOIN schools ON students.school_id = schools.id WHERE students.id = ?";
//        $query = $this->db->prepare($sql);
//        $query->execute([$id]);
//        return $query->fetch(PDO::FETCH_OBJ);
//
//
//    }

    public function find_student_by_id($id)
    {
        $sql = 'SELECT students.id, students.name, students.school_id, schools.school_name ';
        $sql .= ' FROM  students ';
        $sql .= ' INNER JOIN schools ON students.school_id = schools.id ';
        $sql .=' WHERE students.id = ? ';
        $query = $this->db->prepare($sql);
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

}

?>

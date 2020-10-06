<?php

class Grade extends DatabaseObject {

    static protected $table_name = 'grades';
    static protected $db_columns = ['id', 'student_id', 'subject', 'grade'];
    const GRADES = [ '-', 6, 7, 8, 9, 10];

    public $id;
    public $student_id;
    public $subject;
    public $grade;
    public $errors = [];

    public function create(){

        $this->subject = $_POST['subject'];
        $this->grade = $_POST['grade'];
        $this->student_id = $_GET['id'];
//        $this->validate();
//        if(!empty($this->errors)) { return false;}

        $sql = 'INSERT INTO grades VALUE(NULL, ?, ?, ?)';
        $query = $this->db->prepare($sql);
        return $query->execute([$this->student_id, $this->subject, $this->grade]);
    }

    public function find_by_student_id($student_id) {
        $sql = "SELECT * FROM grades WHERE student_id = ?";
        $query = $this->db->prepare($sql);
        $query->execute([$student_id]);
        return $query->fetchAll(PDO::FETCH_OBJ);

    }




}
<?php
require_once 'model/Student.php';

class StudentViewModel {
    private $student;

    public function __construct() {
        $this->student = new Student();
    }

    public function getStudentList() {
        return $this->student->getAll();
    }

    public function getStudentById($id) {
        return $this->student->getById($id);
    }

    public function addStudent($id, $name, $phone, $join_date) {
        return $this->student->create($id, $name, $phone, $join_date);
    }

    public function updateStudent($id, $name, $phone, $join_date) {
        return $this->student->update($id, $name, $phone, $join_date);
    }

    public function deleteStudent($id) {
        return $this->student->delete($id);
    }
}
?>

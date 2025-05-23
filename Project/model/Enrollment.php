<?php
require_once 'config/database.php';

class Enrollment {
    private $conn;
    private $table = 'enrollment';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() {
        $query = "SELECT e.*, s.name as student_name FROM " . $this->table . " e LEFT JOIN students s ON e.student_id = s.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($enrollment_id) {
        $query = "SELECT e.*, s.name as student_name FROM " . $this->table . " e LEFT JOIN students s ON e.student_id = s.id WHERE e.enrollment_id = :enrollment_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':enrollment_id', $enrollment_id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($student_id, $course_code, $enrolled_date, $grade) {
        $query = "INSERT INTO " . $this->table . " (student_id, course_code, enrolled_date, grade) VALUES (:student_id, :course_code, :enrolled_date, :grade)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':student_id', $student_id);
        $stmt->bindParam(':course_code', $course_code);
        $stmt->bindParam(':enrolled_date', $enrolled_date);
        $stmt->bindParam(':grade', $grade);
        return $stmt->execute();
    }

    public function update($enrollment_id, $student_id, $course_code, $enrolled_date, $grade) {
        $query = "UPDATE " . $this->table . " SET student_id = :student_id, course_code = :course_code, enrolled_date = :enrolled_date, grade = :grade WHERE enrollment_id = :enrollment_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':student_id', $student_id);
        $stmt->bindParam(':course_code', $course_code);
        $stmt->bindParam(':enrolled_date', $enrolled_date);
        $stmt->bindParam(':grade', $grade);
        $stmt->bindParam(':enrollment_id', $enrollment_id);
        return $stmt->execute();
    }

    public function delete($enrollment_id) {
        $query = "DELETE FROM " . $this->table . " WHERE enrollment_id = :enrollment_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':enrollment_id', $enrollment_id);
        return $stmt->execute();
    }
}
?>

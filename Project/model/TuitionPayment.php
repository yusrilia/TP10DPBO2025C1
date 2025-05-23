<?php
require_once 'config/database.php';

class TuitionPayment {
    private $conn;
    private $table = 'tuition_payment';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() {
        $query = "SELECT t.*, s.name as student_name FROM " . $this->table . " t LEFT JOIN students s ON t.student_id = s.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($payment_id) {
        $query = "SELECT t.*, s.name as student_name FROM " . $this->table . " t LEFT JOIN students s ON t.student_id = s.id WHERE t.payment_id = :payment_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':payment_id', $payment_id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($student_id, $payment_date, $amount, $payment_method, $status) {
        $query = "INSERT INTO " . $this->table . " (student_id, payment_date, amount, payment_method, status) VALUES (:student_id, :payment_date, :amount, :payment_method, :status)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':student_id', $student_id);
        $stmt->bindParam(':payment_date', $payment_date);
        $stmt->bindParam(':amount', $amount);
        $stmt->bindParam(':payment_method', $payment_method);
        $stmt->bindParam(':status', $status);
        return $stmt->execute();
    }

    public function update($payment_id, $student_id, $payment_date, $amount, $payment_method, $status) {
        $query = "UPDATE " . $this->table . " SET student_id = :student_id, payment_date = :payment_date, amount = :amount, payment_method = :payment_method, status = :status WHERE payment_id = :payment_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':student_id', $student_id);
        $stmt->bindParam(':payment_date', $payment_date);
        $stmt->bindParam(':amount', $amount);
        $stmt->bindParam(':payment_method', $payment_method);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':payment_id', $payment_id);
        return $stmt->execute();
    }

    public function delete($payment_id) {
        $query = "DELETE FROM " . $this->table . " WHERE payment_id = :payment_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':payment_id', $payment_id);
        return $stmt->execute();
    }
}
?>

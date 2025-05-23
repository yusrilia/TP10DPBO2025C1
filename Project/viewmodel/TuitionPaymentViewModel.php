<?php
require_once 'model/TuitionPayment.php';
require_once 'model/Student.php';

class TuitionPaymentViewModel {
    private $tuitionPayment;
    private $student;

    public function __construct() {
        $this->tuitionPayment = new TuitionPayment();
        $this->student = new Student();
    }

    public function getTuitionPaymentList() {
        return $this->tuitionPayment->getAll();
    }

    public function getTuitionPaymentById($payment_id) {
        return $this->tuitionPayment->getById($payment_id);
    }

    public function getStudents() {
        return $this->student->getAll();
    }

    public function addTuitionPayment($student_id, $payment_date, $amount, $payment_method, $status) {
        return $this->tuitionPayment->create($student_id, $payment_date, $amount, $payment_method, $status);
    }

    public function updateTuitionPayment($payment_id, $student_id, $payment_date, $amount, $payment_method, $status) {
        return $this->tuitionPayment->update($payment_id, $student_id, $payment_date, $amount, $payment_method, $status);
    }

    public function deleteTuitionPayment($payment_id) {
        return $this->tuitionPayment->delete($payment_id);
    }
}
?>

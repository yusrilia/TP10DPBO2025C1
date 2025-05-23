<?php
require_once 'model/Enrollment.php';
require_once 'model/Student.php';

class EnrollmentViewModel {
    private $enrollment;
    private $student;

    public function __construct() {
        $this->enrollment = new Enrollment();
        $this->student = new Student();
    }

    public function getEnrollmentList() {
        return $this->enrollment->getAll();
    }

    public function getEnrollmentById($enrollment_id) {
        return $this->enrollment->getById($enrollment_id);
    }

    public function getStudents() {
        return $this->student->getAll();
    }

    public function addEnrollment($student_id, $course_code, $enrolled_date, $grade) {
        return $this->enrollment->create($student_id, $course_code, $enrolled_date, $grade);
    }

    public function updateEnrollment($enrollment_id, $student_id, $course_code, $enrolled_date, $grade) {
        return $this->enrollment->update($enrollment_id, $student_id, $course_code, $enrolled_date, $grade);
    }

    public function deleteEnrollment($enrollment_id) {
        return $this->enrollment->delete($enrollment_id);
    }
}
?>

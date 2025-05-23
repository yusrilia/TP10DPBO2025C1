<?php
require_once 'viewmodel/StudentViewModel.php';
require_once 'viewmodel/EnrollmentViewModel.php';
require_once 'viewmodel/TuitionPaymentViewModel.php';

$entity = isset($_GET['entity']) ? $_GET['entity'] : 'student';
$action = isset($_GET['action']) ? $_GET['action'] : 'list';

if ($entity == 'student') {
    $viewModel = new StudentViewModel();
    if ($action == 'list') {
        $studentList = $viewModel->getStudentList();
        require_once 'views/student_list.php';
    } elseif ($action == 'add') {
        require_once 'views/student_form.php';
    } elseif ($action == 'edit') {
        $student = $viewModel->getStudentById($_GET['id']);
        require_once 'views/student_form.php';
    } elseif ($action == 'save') {
        $viewModel->addStudent($_POST['id'], $_POST['name'], $_POST['phone'], $_POST['join_date']);
        header('Location: index.php?entity=student');
    } elseif ($action == 'update') {
        $viewModel->updateStudent($_GET['id'], $_POST['name'], $_POST['phone'], $_POST['join_date']);
        header('Location: index.php?entity=student');
    } elseif ($action == 'delete') {
        $viewModel->deleteStudent($_GET['id']);
        header('Location: index.php?entity=student');
    }
} elseif ($entity == 'enrollment') {
    $viewModel = new EnrollmentViewModel();
    if ($action == 'list') {
        $enrollmentList = $viewModel->getEnrollmentList();
        require_once 'views/enrollment_list.php';
    } elseif ($action == 'add') {
        $students = $viewModel->getStudents();
        require_once 'views/enrollment_form.php';
    } elseif ($action == 'edit') {
        $enrollment = $viewModel->getEnrollmentById($_GET['id']);
        $students = $viewModel->getStudents();
        require_once 'views/enrollment_form.php';
    } elseif ($action == 'save') {
        $viewModel->addEnrollment($_POST['student_id'], $_POST['course_code'], $_POST['enrolled_date'], $_POST['grade']);
        header('Location: index.php?entity=enrollment');
    } elseif ($action == 'update') {
        $viewModel->updateEnrollment($_GET['id'], $_POST['student_id'], $_POST['course_code'], $_POST['enrolled_date'], $_POST['grade']);
        header('Location: index.php?entity=enrollment');
    } elseif ($action == 'delete') {
        $viewModel->deleteEnrollment($_GET['id']);
        header('Location: index.php?entity=enrollment');
    }
} elseif ($entity == 'tuition_payment') {
    $viewModel = new TuitionPaymentViewModel();
    if ($action == 'list') {
        $tuitionPaymentList = $viewModel->getTuitionPaymentList();
        require_once 'views/tuition_payment_list.php';
    } elseif ($action == 'add') {
        $students = $viewModel->getStudents();
        require_once 'views/tuition_payment_form.php';
    } elseif ($action == 'edit') {
        $tuitionPayment = $viewModel->getTuitionPaymentById($_GET['id']);
        $students = $viewModel->getStudents();
        require_once 'views/tuition_payment_form.php';
    } elseif ($action == 'save') {
        $viewModel->addTuitionPayment($_POST['student_id'], $_POST['payment_date'], $_POST['amount'], $_POST['payment_method'], $_POST['status']);
        header('Location: index.php?entity=tuition_payment');
    } elseif ($action == 'update') {
        $viewModel->updateTuitionPayment($_GET['id'], $_POST['student_id'], $_POST['payment_date'], $_POST['amount'], $_POST['payment_method'], $_POST['status']);
        header('Location: index.php?entity=tuition_payment');
    } elseif ($action == 'delete') {
        $viewModel->deleteTuitionPayment($_GET['id']);
        header('Location: index.php?entity=tuition_payment');
    }
}
?>

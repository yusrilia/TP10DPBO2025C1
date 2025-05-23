<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4"><?php echo isset($enrollment) ? 'Edit Enrollment' : 'Add Enrollment'; ?></h2>
<form action="index.php?entity=enrollment&action=<?php echo isset($enrollment) ? 'update&id=' . $enrollment['enrollment_id'] : 'save'; ?>" method="POST" class="space-y-4">
    <div>
        <label class="block">Student:</label>
        <select name="student_id" class="border p-2 w-full" required>
            <?php foreach ($students as $student): ?>
            <option value="<?php echo $student['id']; ?>" <?php echo isset($enrollment) && $enrollment['student_id'] == $student['id'] ? 'selected' : ''; ?>><?php echo $student['name']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label class="block">Course Code:</label>
        <input type="text" name="course_code" value="<?php echo isset($enrollment) ? $enrollment['course_code'] : ''; ?>" class="border p-2 w-full" required>
    </div>
    <div>
        <label class="block">Enrolled Date:</label>
        <input type="date" name="enrolled_date" value="<?php echo isset($enrollment) ? $enrollment['enrolled_date'] : ''; ?>" class="border p-2 w-full" required>
    </div>
    <div>
        <label class="block">Grade:</label>
        <input type="text" name="grade" value="<?php echo isset($enrollment) ? $enrollment['grade'] : ''; ?>" class="border p-2 w-full">
    </div>
    <button type="submit" class="bg-rose-400 text-white px-4 py-2 rounded">Save</button>
</form>

<?php
require_once 'views/template/footer.php';
?>

<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4">Enrollment List</h2>
<a href="index.php?entity=enrollment&action=add" class="bg-rose-400 text-white px-4 py-2 rounded mb-4 inline-block">Add Enrollment</a>
<table class="w-full border">
    <tr class="bg-gray-200">
        <th class="border p-2">Enrollment ID</th>
        <th class="border p-2">Student</th>
        <th class="border p-2">Course Code</th>
        <th class="border p-2">Enrolled Date</th>
        <th class="border p-2">Grade</th>
        <th class="border p-2">Actions</th>
    </tr>
    <?php foreach ($enrollmentList as $enrollment): ?>
    <tr>
        <td class="border p-2"><?php echo $enrollment['enrollment_id']; ?></td>
        <td class="border p-2"><?php echo $enrollment['student_name']; ?></td>
        <td class="border p-2"><?php echo $enrollment['course_code']; ?></td>
        <td class="border p-2"><?php echo $enrollment['enrolled_date']; ?></td>
        <td class="border p-2"><?php echo $enrollment['grade']; ?></td>
        <td class="border p-2">
            <a href="index.php?entity=enrollment&action=edit&id=<?php echo $enrollment['enrollment_id']; ?>" class="text-rose-500">Edit</a>
            <a href="index.php?entity=enrollment&action=delete&id=<?php echo $enrollment['enrollment_id']; ?>" class="text-rose-700 ml-2" onclick="return confirm('Are you sure?');">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php
require_once 'views/template/footer.php';
?>

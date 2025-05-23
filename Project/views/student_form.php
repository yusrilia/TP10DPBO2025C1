<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4"><?php echo isset($student) ? 'Edit Student' : 'Add Student'; ?></h2>
<form action="index.php?entity=student&action=<?php echo isset($student) ? 'update&id=' . $student['id'] : 'save'; ?>" method="POST" class="space-y-4">
    <div>
        <label class="block">ID:</label>
        <input type="text" name="id" value="<?php echo isset($student) ? $student['id'] : ''; ?>" class="border p-2 w-full" required <?php echo isset($student) ? 'readonly' : ''; ?>>
    </div>
    <div>
        <label class="block">Name:</label>
        <input type="text" name="name" value="<?php echo isset($student) ? $student['name'] : ''; ?>" class="border p-2 w-full" required>
    </div>
    <div>
        <label class="block">Phone:</label>
        <input type="text" name="phone" value="<?php echo isset($student) ? $student['phone'] : ''; ?>" class="border p-2 w-full" required>
    </div>
    <div>
        <label class="block">Join Date:</label>
        <input type="date" name="join_date" value="<?php echo isset($student) ? $student['join_date'] : ''; ?>" class="border p-2 w-full" required>
    </div>
    <button type="submit" class="bg-rose-400 text-white px-4 py-2 rounded">Save</button>
</form>

<?php
require_once 'views/template/footer.php';
?>

<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4"><?php echo isset($tuitionPayment) ? 'Edit Tuition Payment' : 'Add Tuition Payment'; ?></h2>
<form action="index.php?entity=tuition_payment&action=<?php echo isset($tuitionPayment) ? 'update&id=' . $tuitionPayment['payment_id'] : 'save'; ?>" method="POST" class="space-y-4">
    <div>
        <label class="block">Student:</label>
        <select name="student_id" class="border p-2 w-full" required>
            <?php foreach ($students as $student): ?>
            <option value="<?php echo $student['id']; ?>" <?php echo isset($tuitionPayment) && $tuitionPayment['student_id'] == $student['id'] ? 'selected' : ''; ?>><?php echo $student['name']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label class="block">Payment Date:</label>
        <input type="date" name="payment_date" value="<?php echo isset($tuitionPayment) ? $tuitionPayment['payment_date'] : ''; ?>" class="border p-2 w-full" required>
    </div>
    <div>
        <label class="block">Amount:</label>
        <input type="number" step="0.01" name="amount" value="<?php echo isset($tuitionPayment) ? $tuitionPayment['amount'] : ''; ?>" class="border p-2 w-full" required>
    </div>
    <div>
        <label class="block">Payment Method:</label>
        <select name="payment_method" class="border p-2 w-full" required>
            <option value="transfer" <?php echo (isset($tuitionPayment) && $tuitionPayment['payment_method'] == 'transfer') ? 'selected' : ''; ?>>Transfer</option>
            <option value="cash" <?php echo (isset($tuitionPayment) && $tuitionPayment['payment_method'] == 'cash') ? 'selected' : ''; ?>>Cash</option>
            <option value="e-wallet" <?php echo (isset($tuitionPayment) && $tuitionPayment['payment_method'] == 'e-wallet') ? 'selected' : ''; ?>>E-Wallet</option>
            <option value="other" <?php echo (isset($tuitionPayment) && $tuitionPayment['payment_method'] == 'other') ? 'selected' : ''; ?>>Other</option>
        </select>
    </div>
    <div>
        <label class="block">Status:</label>
        <select name="status" class="border p-2 w-full" required>
            <option value="PAID" <?php echo isset($tuitionPayment) && $tuitionPayment['status'] == 'PAID' ? 'selected' : ''; ?>>PAID</option>
            <option value="PENDING" <?php echo isset($tuitionPayment) && $tuitionPayment['status'] == 'PENDING' ? 'selected' : ''; ?>>PENDING</option>
            <option value="FAILED" <?php echo isset($tuitionPayment) && $tuitionPayment['status'] == 'FAILED' ? 'selected' : ''; ?>>FAILED</option>
        </select>
    </div>
    <button type="submit" class="bg-rose-400 text-white px-4 py-2 rounded">Save</button>
</form>

<?php
require_once 'views/template/footer.php';
?>

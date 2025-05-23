<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4">Tuition Payment List</h2>
<a href="index.php?entity=tuition_payment&action=add" class="bg-rose-400 text-white px-4 py-2 rounded mb-4 inline-block">Add Payment</a>
<table class="w-full border">
    <tr class="bg-gray-200">
        <th class="border p-2">Payment ID</th>
        <th class="border p-2">Student</th>
        <th class="border p-2">Payment Date</th>
        <th class="border p-2">Amount</th>
        <th class="border p-2">Method</th>
        <th class="border p-2">Status</th>
        <th class="border p-2">Actions</th>
    </tr>
    <?php foreach ($tuitionPaymentList as $payment): ?>
    <tr>
        <td class="border p-2"><?php echo $payment['payment_id']; ?></td>
        <td class="border p-2"><?php echo $payment['student_name']; ?></td>
        <td class="border p-2"><?php echo $payment['payment_date']; ?></td>
        <td class="border p-2"><?php echo $payment['amount']; ?></td>
        <td class="border p-2"><?php echo $payment['payment_method']; ?></td>
        <td class="border p-2"><?php echo $payment['status']; ?></td>
        <td class="border p-2">
            <a href="index.php?entity=tuition_payment&action=edit&id=<?php echo $payment['payment_id']; ?>" class="text-blue-500">Edit</a>
            <a href="index.php?entity=tuition_payment&action=delete&id=<?php echo $payment['payment_id']; ?>" class="text-red-500 ml-2" onclick="return confirm('Are you sure?');">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php
require_once 'views/template/footer.php';
?>

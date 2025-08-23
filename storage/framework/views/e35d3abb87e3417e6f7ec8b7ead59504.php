

<?php $__env->startSection('content'); ?>
<div class="max-w-5xl mx-auto p-6">
  <h1 class="text-2xl font-bold mb-4">My Bills</h1>
  <table class="w-full border">
    <thead>
      <tr class="bg-gray-100">
        <th class="p-3 text-left">ID</th>
        <th class="p-3 text-left">Booking</th>
        <th class="p-3 text-left">Amount</th>
        <th class="p-3 text-left">Status</th>
        <th class="p-3 text-left">Date</th>
      </tr>
    </thead>
    <tbody>
      <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr class="border-t">
          <td class="p-3"><?php echo e($r->id); ?></td>
          <td class="p-3"><?php echo e($r->booking_id ? '#'.$r->booking_id : '—'); ?></td>
          <td class="p-3"><?php echo e($r->amount ?? '—'); ?></td>
          <td class="p-3"><?php echo e($r->status ?? '—'); ?></td>
          <td class="p-3"><?php echo e($r->created_at); ?></td>
        </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>
  <div class="mt-4"><?php echo e($rows->links()); ?></div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\user\Desktop\new_sky_wings_project\resources\views/billing/index.blade.php ENDPATH**/ ?>
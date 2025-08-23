

<?php $__env->startSection('content'); ?>
<div class="auth-wrapper" style="max-width:800px;margin:3rem auto;padding:0 1rem">
  <div class="auth-card" style="background:#fff;border-radius:18px;box-shadow:0 10px 30px rgba(0,0,0,.08);padding:2rem">
    <h2 style="font-size:1.4rem;font-weight:800;margin:0 0 1rem">Create an account</h2>

    <?php if($errors->any()): ?>
      <div style="background:#fff4f4;border:1px solid #fbcaca;color:#b91c1c;border-radius:12px;padding:.75rem 1rem;margin-bottom:1rem">
        <ul style="margin:0;padding-left:1rem">
          <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($e); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </div>
    <?php endif; ?>

    <form method="POST" action="<?php echo e(route('register')); ?>">
      <?php echo csrf_field(); ?>
      <div class="form-row"><label class="label">Name</label>
        <input class="input" name="name" value="<?php echo e(old('name')); ?>" required>
      </div>
      <div class="form-row"><label class="label">Email</label>
        <input class="input" type="email" name="email" value="<?php echo e(old('email')); ?>" required>
      </div>
      <div class="form-row"><label class="label">Password</label>
        <input class="input" type="password" name="password" required>
      </div>
      <div class="form-row"><label class="label">Confirm Password</label>
        <input class="input" type="password" name="password_confirmation" required>
      </div>
      <button class="btn-primary" style="background:#ff7a00;border:none;color:#fff;padding:.9rem 1.2rem;border-radius:12px;font-weight:700;width:100%">
        Create Account
      </button>
    </form>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\user\Desktop\new_sky_wings_project\resources\views/auth/register.blade.php ENDPATH**/ ?>
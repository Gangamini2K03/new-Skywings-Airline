

<?php $__env->startSection('content'); ?>
<style>
  .auth-wrapper{display:grid;grid-template-columns:1fr 1fr;gap:2rem;max-width:1000px;margin:3rem auto;padding:0 1rem}
  .auth-card{background:#fff;border-radius:18px;box-shadow:0 10px 30px rgba(0,0,0,.08);padding:2rem}
  .auth-hero{background:linear-gradient(135deg,#0a2b6b,#0f6aa6);border-radius:18px;color:#fff;padding:2rem;display:flex;flex-direction:column;justify-content:center}
  .auth-title{font-size:2rem;font-weight:800;margin:0 0 .5rem}
  .auth-sub{opacity:.9}
  .form-row{margin-bottom:1rem}
  .label{font-weight:600;margin-bottom:.35rem;display:block}
  .input{width:100%;border:1px solid #e4e6ef;border-radius:12px;padding:.85rem 1rem;font-size:1rem}
  .input:focus{outline:none;border-color:#0f6aa6;box-shadow:0 0 0 3px rgba(15,106,166,.15)}
  .btn-primary{background:#ff7a00;border:none;color:#fff;padding:.9rem 1.2rem;border-radius:12px;font-weight:700;cursor:pointer;width:100%}
  .btn-primary:hover{filter:brightness(1.05)}
  .muted{color:#6b7280}
  @media(max-width:900px){.auth-wrapper{grid-template-columns:1fr}}
</style>

<div class="auth-wrapper">
  <div class="auth-hero">
    <h1 class="auth-title">Welcome back ✈️</h1>
    <p class="auth-sub">Sign in to book flights, reserve hotels, choose seats and manage payments.</p>
    <ul style="margin-top:1.25rem;line-height:1.7">
      <li>• Secure access to your bookings</li>
      <li>• Save passenger details</li>
      <li>• View & download your bills</li>
    </ul>
  </div>

  <div class="auth-card">
    <h2 style="font-size:1.4rem;font-weight:800;margin:0 0 1rem">Login</h2>

    <?php if($errors->any()): ?>
      <div style="background:#fff4f4;border:1px solid #fbcaca;color:#b91c1c;border-radius:12px;padding:.75rem 1rem;margin-bottom:1rem">
        <ul style="margin:0;padding-left:1rem">
          <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </div>
    <?php endif; ?>

    <form method="POST" action="<?php echo e(route('login')); ?>">
      <?php echo csrf_field(); ?>
      <div class="form-row">
        <label class="label">Email</label>
        <input class="input" type="email" name="email" value="<?php echo e(old('email')); ?>" required autofocus placeholder="you@example.com">
      </div>

      <div class="form-row">
        <label class="label">Password</label>
        <input class="input" type="password" name="password" required placeholder="••••••••">
      </div>

      <div class="form-row" style="display:flex;align-items:center;gap:.5rem">
        <input type="checkbox" id="remember" name="remember" value="1">
        <label for="remember" class="muted">Remember me</label>
      </div>

      <button class="btn-primary" type="submit">Sign In</button>

      <p class="muted" style="margin-top:1rem">
        New here? <a href="<?php echo e(route('register')); ?>">Create an account</a>
      </p>
    </form>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\user\Desktop\new_sky_wings_project\resources\views/auth/login.blade.php ENDPATH**/ ?>
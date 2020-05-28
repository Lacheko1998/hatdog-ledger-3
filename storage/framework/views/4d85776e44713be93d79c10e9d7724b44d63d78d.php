
<?php $__env->startSection('content'); ?>
<title>User Management</title>
<?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
<span class=”invalid-feedback” role=”alert”>
<strong><?php echo e($message); ?></strong>
</span>
<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
<?php if(Auth::User()->is_admin==1): ?>
<div class="px-2">
<!-- BUTTON TRIGGER -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ingoing">
  Add User
</button>
</div>
<?php endif; ?>
<!-- Modal -->
<div class="modal fade" id="ingoing" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="<?php echo e(route('register')); ?>">
      <div class="modal-body">
      <?php echo csrf_field(); ?>

        <div class="form-group">
            <label for="fname">First Name</label>                             
            <input id="fname" type="text" class="form-control <?php $__errorArgs = ['fname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="fname" value="<?php echo e(old('fname')); ?>" required autocomplete="fname" autofocus>                                
        </div>

        <div class="form-group">
        <label for="lname">Last Name</label>                                        
        <input id="lname" type="text" class="form-control <?php $__errorArgs = ['lname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="lname" value="<?php echo e(old('lname')); ?>" required autocomplete="lname" autofocus>                                           
        </div>

        <div class="form-group">
        <label for="email"><?php echo e(__('E-Mail Address')); ?></label>                                       
        <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email">
        </div>

        <div class="form-group">
        <label for="password"><?php echo e(__('Password')); ?></label>
        <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="new-password">
        </div>

        <div class="form-group">
        <label for="dob">Date of Birth</label>
        <input id="dob" type="date" class="form-control <?php $__errorArgs = ['dob'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="dob" value="<?php echo e(old('dob')); ?>" required autocomplete="dob" autofocus>
        </div>

        <div class="modal-footer">
        <input type="submit" class="btn btn-primary" value="Register">
        </div>
        </div>
        </form>
    </div>
  </div>
</div>
<br>
<table class="table">
         <thead>
         <tr>
            <th>Date Created</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Date of Birth</th>
            <th>Account Type</th>
            <?php if(Auth::User()->is_admin==1): ?>
            <th></th>
            <?php endif; ?>
         </tr>
         </thead>
         <tbody>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
               <td><?php echo e($user->created_at); ?></td>
               <td><?php echo e($user->fname); ?></td>
               <td><?php echo e($user->lname); ?></td>
               <td><?php echo e($user->email); ?></td>
               <td><?php echo e($user->dob); ?></td>
               <?php if($user->is_admin == 1): ?>
                <td>Admin</td>
               <?php endif; ?>
               <?php if($user->is_admin == 0): ?>
                <td>User</td>
               <?php endif; ?>
               <?php if(Auth::User()->is_admin==1): ?>
               <?php if($user->is_admin == 1): ?>
               <?php endif; ?>
               <?php if($user->is_admin == 0): ?>
               <td><form action="/users/<?php echo e($user->id); ?>" method="POST">
                <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button>Delete User</button>
                    </form>
               </td>
               <?php endif; ?>
               <?php endif; ?>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </tbody>
      </table>
      <?php echo e($users->links()); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\border_ledger_03\resources\views/usermanage.blade.php ENDPATH**/ ?>
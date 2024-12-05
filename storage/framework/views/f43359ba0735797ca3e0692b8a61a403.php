
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.list-js'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet" type="text/css" />




<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="row">
     <?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



$userId = Auth::user()->id;



?>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Edit Salary </h4>
            </div>

            <div class="card-body">
                <!-- Your existing form container -->
               <form class="leave-form" autocomplete="off" action="<?php echo e(route('updatesalary' , $salary->id )); ?>" method="post" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    
      <div class="row mb-3">
<!--    <div class="col-md-4">-->
<!--        <label for="state" class="form-label">State</label>-->
<!--        <select id="state" name="state" class="form-control">-->
<!--            <option value="">Select State</option>-->
<!--            <?php $__currentLoopData = $statesData['states']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
<!--                <option value="<?php echo e($state['state']); ?>" <?php echo e($user->state === $state['state'] ? 'selected' : ''); ?>>-->
<!--                    <?php echo e($state['state']); ?>-->
<!--                </option>-->
<!--            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
<!--        </select>-->
<!--        <?php $__errorArgs = ['state'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>-->
<!--            <div class="invalid-feedback text-red"><?php echo e($message); ?></div>-->
<!--        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>-->
<!--    </div>-->
<!--    <div class="col-md-4">-->
<!--        <label for="district" class="form-label">District</label>-->
<!--        <select id="district" name="district" class="form-control">-->
<!--            <option value="<?php echo e($user->district); ?>"> <?php echo e($user->district); ?></option>-->
            <!-- Districts will be loaded here -->
<!--        </select>-->
<!--        <?php $__errorArgs = ['district'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>-->
<!--            <div class="invalid-feedback text-red"><?php echo e($message); ?></div>-->
<!--        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>-->
<!--    </div>-->
<!--   <div class="col-md-4">-->
<!--    <label for="organisation" class="form-label">Select Organization</label>-->
<!--    <select id="organisation" name="org_id" class="form-select mb-3">-->

<!--    </select>-->
<!--</div>-->

<!--</div>-->

<!--<div class="row">-->
<!--    <div class="col-md-4">-->
<!--    <label for="department_name" class="form-label">Select Department</label>-->
<!--    <select name="depart_id" id="department_name" class="form-select mb-3">-->

<!--    </select>-->
<!--    <?php $__errorArgs = ['department_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>-->
<!--        <div class="invalid-feedback" style="color: red;">-->
<!--            <?php echo e($message); ?>-->
<!--        </div>-->
<!--    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>-->
<!--</div>-->

<!--    <div class="col-md-4">-->
<!--        <label for="taluka-field" class="form-label">Taluka</label>-->
<!--        <select id="taluka-field" name="taluka" class="form-control" >-->
<!--            <option value="<?php echo e($user->taluka); ?>"><?php echo e($user->taluka); ?></option>-->
            <!-- Talukas will be loaded here -->
<!--        </select>-->
<!--        <?php $__errorArgs = ['taluka'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>-->
<!--            <div class="invalid-feedback text-red"><?php echo e($message); ?></div>-->
<!--        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>-->
<!--    </div>-->
<!--    <div class="col-md-4">-->
<!--        <label for="designation" class="form-label">Select Designation</label>-->
<!--        <select name="design_id" id="designation" class="form-select mb-3">-->
            <!-- Designations will be loaded here -->
<!--        </select>-->
<!--        <?php $__errorArgs = ['designation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>-->
<!--            <div class="invalid-feedback" style="color: red;">-->
<!--                <?php echo e($message); ?>-->
<!--            </div>-->
<!--        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>-->
<!--    </div>-->
<!--</div>-->


<!--    <div class="row mb-3">-->
        
<!--<div class="col-md-4">-->
<!--    <label for="name" class="form-label">Profile Name</label>-->
<!--    <input type="text" id="name" name="user_id" class="form-control" value="<?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?>" readonly>-->
<!--</div>-->



                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="state" class="form-label">State</label>
                        <input type="text" id="state" name="state" class="form-control" value="<?php echo e($user->state); ?>" readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="district" class="form-label">District</label>
                        <input type="text" id="district" name="district" class="form-control" value="<?php echo e($user->district); ?>" readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="organisation" class="form-label">Organization</label>
                        <input type="text" id="organisation" name="org_id" class="form-control" value="<?php echo e($user->org_name); ?> " readonly>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="department_name" class="form-label">Department</label>
                        <input type="text" id="department_name" name="department_name" class="form-control" value="<?php echo e($user->name); ?> " readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="taluka" class="form-label">Taluka</label>
                        <input type="text" id="taluka" name="taluka" class="form-control" value="<?php echo e($user->taluka); ?>" readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="designation" class="form-label">Designation</label>
                        <input type="text" id="designation" name="designation" class="form-control" value="<?php echo e($user->designation_name); ?>" readonly>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="name" class="form-label">Profile Name</label>
                        <input type="text" id="name" name="name" class="form-control" value="<?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?>" readonly>
                    </div>

   <div class="col-md-4">
    <label for="joining_date" class="form-label">Job Joining Date</label>
    <input type="date" id="joining_date" name="joining_date"value="<?php echo e($salary->joining_date); ?>" class="form-control <?php $__errorArgs = ['joining_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
    <?php $__errorArgs = ['joining_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="invalid-feedback text-red"><?php echo e($message); ?></div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>


    <div class="col-md-4">
        <label for="caste" class="form-label">Caste</label>
<select id="caste" name="caste" class="form-control <?php $__errorArgs = ['caste'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
    <option value="">Select Caste</option>
    <option value="SC" <?php echo e($salary->caste == 'SC' ? 'selected' : ''); ?>>SC</option>
    <option value="ST" <?php echo e($salary->caste == 'ST' ? 'selected' : ''); ?>>ST</option>
    <option value="OBC" <?php echo e($salary->caste == 'OBC' ? 'selected' : ''); ?>>OBC</option>
    <option value="General" <?php echo e($salary->caste == 'General' ? 'selected' : ''); ?>>General</option>
</select>
        <?php $__errorArgs = ['cast'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="invalid-feedback text-red"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
</div>
<!---->
<div class="row mb-3">
    <div class="col-md-4">
        <label for="last_approved_salary" class="form-label">Last Approved Salary</label>
        <input type="number" id="last_approved_salary" name="last_salary" value="<?php echo e($salary->last_salary); ?>" class="form-control <?php $__errorArgs = ['last_salary'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Enter Last Approved Salary">
        <?php $__errorArgs = ['last_salary'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="invalid-feedback text-red"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <div class="col-md-4 position-relative">
        <label for="slap_amount" class="form-label">Slap Amount</label>
<select id="slap_amount" name="slap_amount" class="form-control <?php $__errorArgs = ['slap_amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
    <option value="">Select SLAP Amount</option>
    <?php $__currentLoopData = $slapAmounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slapAmount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($slapAmount->id); ?>" 
            <?php echo e($salary->slap_amount == $slapAmount->slap_amount ? 'selected' : ''); ?>>
            <?php echo e($slapAmount->slap_amount); ?>

        </option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
             <input type="hidden" id="hidden_slap_amount" name="slap_amount" value="">

        <i class="fas fa-chevron-down position-absolute" style="right: 10px; top: 40%; transform: translateY(-50%);"></i>
        <?php $__errorArgs = ['slap_amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="invalid-feedback text-red"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <div class="col-md-4 position-relative">
        <label for="grade_amount" class="form-label">Grade Amount</label>
        <select id="grade_amount" name="" class="form-control <?php $__errorArgs = ['grade_amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
    <option value="">Select Grade Amount</option>

        </select>
        <i class="fas fa-chevron-down position-absolute" style="right: 10px; top: 40%; transform: translateY(-50%);"></i>
        <?php $__errorArgs = ['grade_amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="invalid-feedback text-red"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
        <input type="hidden" id="hidden_grade_amount" name="grade_amount" value="<?php echo e($salary->grade_amount); ?>">

</div>

<!---->
<div class="row mb-3">
    <div class="col-md-4 position-relative">
        <label for="direct_added_amount" class="form-label">Direct Add Salary</label>
<input type="text" id="direct_added_amount" name="direct_added_amount" class="form-control <?php $__errorArgs = ['direct_added_amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Enter Direct Added Amount"  / readonly>
        <i class="fas fa-chevron-down position-absolute" style="right: 10px; top: 40%; transform: translateY(-50%);"></i>
        <?php $__errorArgs = ['direct_added_amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="invalid-feedback text-red"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
    <div class="col-md-4 position-relative">
    <label for="merged_amount" class="form-label">Merged Amount</label>
    <input type="text" id="merged_amount" name="merge_amount" class="form-control <?php $__errorArgs = ['merged_amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Enter Merged Amount" readonly />
    <i class="fas fa-chevron-down position-absolute" style="right: 10px; top: 40%; transform: translateY(-50%);"></i>
    <?php $__errorArgs = ['merged_amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="invalid-feedback text-red"><?php echo e($message); ?></div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>

<div class="col-md-4 position-relative">
    <label for="direct_total_salary" class="form-label">Direct Add Total Salary</label>
    <input type="text" id="direct_total_salary" name="direct_total_salary" class="form-control <?php $__errorArgs = ['direct_total_salary'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Enter Direct Total Salary" readonly />
    <i class="fas fa-chevron-down position-absolute" style="right: 10px; top: 40%; transform: translateY(-50%);"></i>
    <?php $__errorArgs = ['direct_total_salary'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="invalid-feedback text-red"><?php echo e($message); ?></div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>



<div class="col-md-4 position-relative">
    <label for="label" class="form-label">Level</label>
    <input type="text" id="label" name="label" class="form-control <?php $__errorArgs = ['label'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Enter Level" readonly data-id="" />
 <i class="fas fa-chevron-down position-absolute" style="right: 10px; top: 40%; transform: translateY(-50%);"></i>
    <?php $__errorArgs = ['label'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="invalid-feedback text-red"><?php echo e($message); ?></div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>


  <div class="col-md-4">
    <label for="salary_amount" class="form-label">Salary Amount</label>
    <select id="salary_amount" name="" class="form-control <?php $__errorArgs = ['salary_amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
        <option value="">Select Salary Amount</option>
        <!-- Option values will be dynamically added here -->
    </select>
        <input type="hidden" id="hidden_salary_amount" name="salary_amount" value="">

    <?php $__errorArgs = ['salary_amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="invalid-feedback text-red"><?php echo e($message); ?></div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>

</div>

<div class="row mb-3">
   <div class="col-md-4 position-relative">
    <label for="reference_document" class="form-label">Add Reference Document (PDF)</label>

    <!-- Display the existing reference document if available -->
    <?php if(!empty($salary->reference_document)): ?>
        <div class="mb-2">
            <a href="<?php echo e(asset('uploads/' . $salary->reference_document)); ?>" target="_blank">
                View Current Document
            </a>
        </div>
    <?php endif; ?>

    <!-- File input for uploading a new document -->
    <input type="file" id="reference_document" name="reference_document" class="form-control <?php $__errorArgs = ['reference_document'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" accept=".pdf">
    
    <?php $__errorArgs = ['reference_document'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="invalid-feedback text-red"><?php echo e($message); ?></div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>

</div>




<?php
$isAdmin = auth()->user()->is_admin === 'admin';
?>

<?php if(!$isAdmin): ?>
    <input type="hidden" name="state" value="<?php echo e(old('state', $user->state)); ?>">
    <input type="hidden" name="district" value="<?php echo e(old('district', $user->district)); ?>">
    <input type="hidden" name="taluka" value="<?php echo e(old('taluka', $user->taluka)); ?>">
    <input type="hidden" name="designation" value="<?php echo e(old('designation', $user->design_id)); ?>">
    <input type="hidden" name="department_name" value="<?php echo e(old('department_name', $user->depart_id)); ?>">
    <input type="hidden" name="organisation" value="<?php echo e(old('organisation', $user->org_id)); ?>">
<?php endif; ?>


 <div style="display: flex; justify-content: flex-end; gap: 10px;">
    <div class="hstack gap-2">
        <button type="submit" class="btn btn-success">update</button>
    </div>

    <div class="hstack gap-2">
    <a href="javascript:history.back()" class="btn btn-primary">Back</a>
    </div>
</div>
</form>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
 <script src="<?php echo e(URL::asset('build/libs/prismjs/prism.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/list.js/list.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/list.pagination.js/list.pagination.min.js')); ?>"></script>

    <!-- listjs init -->
    <script src="<?php echo e(URL::asset('build/js/pages/listjs.init.js')); ?>"></script>

    <script src="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.js')); ?>"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    
    
    
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

        
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="<?php echo e(URL::asset('build/js/pages/select2.init.js')); ?>"></script>

<script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
<script>
    $(document).ready(function() {
    var initialGradeAmount = '<?php echo e(old('grade_amount', $salary->grade_amount)); ?>';
    var initialDirectAddedAmount = '<?php echo e(old('direct_added_amount', $salary->direct_added_amount)); ?>';
    var initialMergedAmount = '<?php echo e(old('merge_amount', $salary->merge_amount)); ?>';
    var initialDirectTotalSalary = '<?php echo e(old('direct_total_salary', $salary->direct_total_salary)); ?>';
    var initialLevel = '<?php echo e(old('label', $salary->label)); ?>';
    var initialSalaryAmount = '<?php echo e(old('salary_amount', $salary->salary_amount)); ?>';

   
    $('#direct_added_amount').val(initialDirectAddedAmount);
    $('#merged_amount').val(initialMergedAmount);
    $('#direct_total_salary').val(initialDirectTotalSalary);
    $('#label').val(initialLevel);
});

</script>
<script>
$(document).ready(function() {
    
    $('#label').on('input', function() {
        var labelId = $(this).data('id'); // Get the value from data-id attribute
        console.log('Captured labelId:', labelId); // Log the labelId after capturing it
        if (labelId) {
            loadSalaryAmount(labelId);
        } else {
            console.warn('labelId is empty or undefined.');
        }
    });

    var initialLabelId = $('#label').data('id');
    console.log('Initial labelId on page load:', initialLabelId);
    if (initialLabelId) {
        loadSalaryAmount(initialLabelId);
    }
});
</script>



<script>

    $(document).ready(function() {
        $('#grade_amount').change(function() {
            var gradeId = $(this).val();
            $('#merged_amount').val('').prop('disabled', true);
            
            if (gradeId) {
                $.ajax({
                    url: '<?php echo e(url("salary/get-merge-amount")); ?>/' + gradeId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data); // Log the returned data
                        if (data.length > 0) {
                            // Assuming data is an array, set the first salary amount to the inpu
                            $('#merged_amount').val(data[0]); // Set the value of the input field
                            $('#merged_amount').prop('disabled', false); // Enable the input field
                        } else {
                            $('#merged_amount').val('').prop('disabled', true); // Reset input if no data
                        }
                    },
                    error: function() {
                        console.error('Could not fetch data.');
                    }
                });
            }
        });
    });
</script>
<script>
$(document).ready(function() {
  function loadSalaryAmount(labelId) {
    console.log('Function loadSalaryAmount called with labelId:', labelId);
    
    $('#salary_amount').empty().append('<option value="">Select Salary Amount</option>').prop('disabled', true);
    var initialSalaryAmount = '<?php echo e(old('salary_amount', $salary->salary_amount)); ?>';

    if (labelId) {
        console.log('Making AJAX request for labelId:', labelId);
        
        $.ajax({
            url: '<?php echo e(url("salary/get-gradesalary")); ?>/' + labelId,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                console.log('Initial Salary Amount inside success callback:', initialSalaryAmount);
                
                $.each(data, function(index, salary_amount) {
                    var selected = (salary_amount == initialSalaryAmount) ? 'selected' : '';
                    $('#salary_amount').append('<option value="' + index + '" ' + selected + '>' + salary_amount + '</option>');
                    if (selected) {
                        $('#hidden_salary_amount').val(initialSalaryAmount);
                    }
                });
                
                $('#salary_amount').prop('disabled', false);
            },
            error: function() {
                console.error('Could not fetch salary data.');
            }
        });
    } else {
        console.warn('No labelId provided.');
    }

    $('#salary_amount').on('change', function() {
    var selectedText = $(this).find("option:selected").text();
    $('#hidden_salary_amount').val(selectedText);
        console.log('Selected salary_amount is ' + selectedValue);
    });
}

    // Function to get label ID from the label name
    function getLabelIdFromName(labelName, callback) {
        $.ajax({
            url: '<?php echo e(url("salary/get-label-id")); ?>', // Endpoint to fetch label ID based on label name
            type: 'GET',
            data: { label: labelName },
            dataType: 'json',
            success: function(response) {
                if (response && response.id) {
                    callback(response.id); // Call the callback with the label ID
                } else {
                    console.error('Label ID not found for label:', labelName);
                }
            },
            error: function() {
                console.error('Error fetching label ID.');
            }
        });
    }

    $('#grade_amount').change(function() {
        var gradeId = $(this).val();
        $('#label').val('').prop('disabled', true); // Clear input and disable it initially
        
        if (gradeId) {
            $.ajax({
                url: '<?php echo e(url("salary/get-label")); ?>/' + gradeId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    console.log(data); // Log the returned data
                    if (data.length > 0) { // Check if data array has elements
                        $('#label').val(data[0].label); // Set the value of the input field
                        $('#label').prop('disabled', false); // Enable the input field

                        // Call to get the label ID and load salary amounts
                        getLabelIdFromName(data[0].label, function(labelId) {
                            loadSalaryAmount(labelId); // Load salary based on the label ID
                        });
                    } else {
                        $('#label').val('').prop('disabled', true); // Reset input if no valid data
                    }
                },
                error: function() {
                    console.error('Could not fetch data for label.');
                }
            });
        } else {
            $('#label').val('').prop('disabled', true); // Reset input if no gradeId
        }
    });

    // If the label already has a value on page load, populate the salary_amount options
    var initialLabelName = $('#label').val(); // Get the label name from the input field
    if (initialLabelName) {
        // Call to get the label ID and load salary amounts
        getLabelIdFromName(initialLabelName, function(labelId) {
            loadSalaryAmount(labelId); // Load salary based on the label ID
        });
    }

    // When the label value changes, update the salary_amount options
    $('#label').change(function() {
        var labelName = $(this).val(); // Get the label name from the input field
        if (labelName) {
            // Call to get the label ID and load salary amounts
            getLabelIdFromName(labelName, function(labelId) {
                loadSalaryAmount(labelId); // Load salary based on the label ID
            });
        }
    });
});

</script>
<script>
$(document).ready(function() {
  
    $('#grade_amount').change(function() {
        var gradeId = $(this).val();
        $('#label').val('').prop('disabled', true); // Clear input and disable it initially
        
        if (gradeId) {
            $.ajax({
                url: '<?php echo e(url("salary/get-label")); ?>/' + gradeId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    console.log(data); // Log the returned data
                    if (data.length > 0) { // Check if data array has elements
                        $('#label').val(data[0].label); // Set the value of the input field
                        $('#label').prop('disabled', false); // Enable the input field
                        loadSalaryAmount(data[0].id); // Call to load salary based on the first label's id
                    } else {
                        $('#label').val('').prop('disabled', true); // Reset input if no valid data
                    }
                },
                error: function() {
                    console.error('Could not fetch data for label.');
                }
            });
        } else {
            $('#label').val('').prop('disabled', true); // Reset input if no gradeId
        }
    });

    // If the label already has a value on page load, populate the salary_amount options
    var initialLabelId = $('#label').val();
    console.log('initialLabelId' + initialLabelId)
    if (initialLabelId) {
        loadSalaryAmount(initialLabelId); // Call the function with the initial label value
    }

    // When the label value changes, update the salary_amount options
    $('#label').change(function() {
        var labelId = $(this).val();
        loadSalaryAmount(labelId); // Refresh the salary amounts based on the new label
    });
});
</script>


<script>
    $(document).ready(function() {
        $('#grade_amount').change(function() {
            var gradeId = $(this).val();
            $('#direct_total_salary').val('').prop('disabled', true); // Clear input and disable it initially
            
            if (gradeId) {
                $.ajax({
                    url: '<?php echo e(url("salary/get-total-amount")); ?>/' + gradeId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data); // Log the returned data
                        if (data.length > 0) {
                            $('#direct_total_salary').val(data[0]); // Set the value of the input field
                            $('#direct_total_salary').prop('disabled', false); // Enable the input field
                        } else {
                            $('#direct_total_salary').val('').prop('disabled', true); // Reset input if no data
                        }
                    },
                    error: function() {
                        console.error('Could not fetch data.');
                    }
                });
            }
        });
    });
</script>


<script>
    $(document).ready(function() {
        $('#grade_amount').change(function() {
            var gradeId = $(this).val();
                var initialDirectAddedAmount = '<?php echo e(old('direct_added_amount', $salary->direct_added_amount)); ?>';

            $('#direct_added_amount').val('').prop('disabled', true); // Clear input and disable it initially
            
    if (initialDirectAddedAmount) {
        $('#direct_added_amount').val(initialDirectAddedAmount).prop('disabled', false);
    } else if (gradeId) {
        $.ajax({
            url: '<?php echo e(url("salary/get-salary-amount")); ?>/' + gradeId,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                console.log(data);
                if (data.length > 0) {
                    $('#direct_added_amount').val(data[0]);
                    $('#direct_added_amount').prop('disabled', false);
                } else {
                    $('#direct_added_amount').val('').prop('disabled', true);
                }
            },
            error: function() {
                console.error('Could not fetch data.');
            }
        });
    });
</script>
<script>
$(document).ready(function() {
        var initialGradeAmount = '<?php echo e(old('grade_amount', $salary->grade_amount)); ?>';

console.log('initialGradeAmount' +  initialGradeAmount);
    // Trigger the change event when the page loads to populate grade_amount
    var initialSlapId = $('#slap_amount').val();
    if (initialSlapId) {
        var slapAmountText = $('#slap_amount option:selected').text();
        $('#hidden_slap_amount').val(slapAmountText);
        fetchGradeAmounts(initialSlapId, initialGradeAmount);
    }

    $('#slap_amount').change(function() {
        var slapId = $(this).val();
        var slapAmountText = $('#slap_amount option:selected').text(); // Get the actual slap_amount text
        $('#hidden_slap_amount').val(slapAmountText);
        
        // Save the old grade_amount value before updating the options
        var initialGradeAmount = '<?php echo e(old('grade_amount', $salary->grade_amount)); ?>';
        
        $('#grade_amount').empty().append('<option value="">Select Grade Amount</option>').prop('disabled', true);
        
        if (slapId) {
            fetchGradeAmounts(slapId, initialGradeAmount);
        }
    });

    function fetchGradeAmounts(slapId, initialGradeAmount) {
        $.ajax({
            url: '<?php echo e(url("salary/get-grade-amounts")); ?>/' + slapId,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                console.log(data);
                var oldSelected = initialGradeAmount || '';  // Default to empty if no old value
                console.log('old grade amount : ' + oldSelected)
                $.each(data, function(id, grade_amount) {
                    var selected = (grade_amount == oldSelected) ? 'selected' : '';  // If the current id matches the old value, select it
                    $('#grade_amount').append('<option value="' + id + '" ' + selected + '>' + grade_amount + '</option>');
                });
                
                $('#grade_amount').prop('disabled', false);
            },
            error: function() {
                console.error('Could not fetch data.');
            }
        });
    }
});
    
    
        $('#grade_amount').change(function() {
        var gradeId = $(this).val();
        var gradeAmountText = $('#grade_amount option:selected').text(); // Get the actual grade amount text

        // Store the actual grade_amount in the hidden field
        $('#hidden_grade_amount').val(gradeAmountText);
    });

</script>













<!--<script>-->

<!--$(document).ready(function() {-->
<!--    $('#state').select2({ placeholder: 'Select State', allowClear: true });-->
<!--    $('#district').select2({ placeholder: 'Select District', allowClear: true });-->
<!--    $('#taluka-field').select2({ placeholder: 'Select Taluka', allowClear: true });-->
<!--    $('#designation').select2({ placeholder: 'Select Designation', allowClear: true });-->
<!--    $('#department_name').select2({ placeholder: 'Select Department', allowClear: true });-->
<!--    $('#organisation').select2({ placeholder: 'Select Organisation', allowClear: true });-->

<!--    var initialState = '<?php echo e($user->state); ?>';-->
<!--    var initialDistrict = '<?php echo e($user->district); ?>';-->
<!--    var initialTaluka = '<?php echo e($user->taluka); ?>';-->
<!--    var initialDesignation = '<?php echo e($user->design_id); ?>';-->
<!--    var initialDepartment = '<?php echo e($user->depart_id); ?>';-->
<!--    var initialOrganisation = '<?php echo e($user->org_id); ?>';-->
<!--     var isAdmin = <?php echo e(auth()->user()->is_admin === 'admin' ? 'true' : 'false'); ?>;-->
<!--        if (!isAdmin) {-->
            
<!--        $('#state, #district, #taluka-field, #designation, #department_name, #organisation').each(function() {-->
<!--            $(this).select2('enable', false); -->
<!--            $(this).css({-->
<!--                'pointer-events': 'none', -->
<!--                'background-color': '#f5f5f5',-->
<!--                'color': '#999'-->
<!--            });-->
<!--        });-->
<!--    }-->



<!--    function loadDropdowns() {-->
<!--        loadInitialDistricts();-->
<!--        loadInitialTalukas();-->
<!--        loadOrganisations();-->
<!--        loadDepartments();-->
<!--        loadDesignations();-->
<!--    }-->

<!--    function loadInitialDistricts() {-->
<!--        var state = $('#state').val();-->
<!--        if (state) {-->
<!--            var statesData = <?php echo json_encode($statesData['states'], 15, 512) ?>;-->
<!--            var selectedState = statesData.find(item => item.state === state);-->
<!--            var districtDropdown = $('#district');-->

<!--            districtDropdown.empty().append('<option value="">Select District</option>');-->

<!--            if (selectedState) {-->
<!--                selectedState.districts.forEach(district => {-->
<!--                    districtDropdown.append($('<option>', { value: district, text: district }));-->
<!--                });-->
<!--                $('#district').val(initialDistrict).trigger('change');-->
<!--            }-->
<!--        }-->
<!--    }-->

<!--    function loadInitialTalukas() {-->
<!--        var state = $('#state').val();-->
<!--        var district = $('#district').val();-->
<!--        if (state && district) {-->
<!--            $.ajax({-->
<!--                url: '<?php echo e(route('tehsils.get')); ?>',-->
<!--                type: 'GET',-->
<!--                data: { state: state, district: district },-->
<!--                success: function(response) {-->
<!--                    var talukaDropdown = $('#taluka-field');-->
<!--                    talukaDropdown.empty().append('<option value="">Select Taluka</option>');-->
<!--                    response.forEach(taluka => {-->
<!--                        talukaDropdown.append($('<option>', { value: taluka, text: taluka }));-->
<!--                    });-->
<!--                    $('#taluka-field').val(initialTaluka).trigger('change');-->
<!--                },-->
<!--                error: function(xhr) {-->
<!--                    console.error('Error fetching talukas:', xhr.responseText);-->
<!--                }-->
<!--            });-->
<!--        }-->
<!--    }-->

<!--    function loadOrganisations() {-->
<!--        var state = $('#state').val();-->
<!--        var district = $('#district').val();-->
<!--        if (state && district) {-->
<!--            $.ajax({-->
<!--                url: '<?php echo e(route('organisations.get')); ?>',-->
<!--                type: 'GET',-->
<!--                data: { state: state, district: district },-->
<!--                success: function(response) {-->
<!--                    var organisationDropdown = $('#organisation');-->
<!--                    organisationDropdown.empty().append('<option value="">Select Organisation</option>');-->
<!--                    response.forEach(org => {-->
<!--                        organisationDropdown.append($('<option>', { value: org.id, text: org.org_name }));-->
<!--                    });-->
<!--                    $('#organisation').val('<?php echo e($user->org_id); ?>').trigger('change');-->
<!--                },-->
<!--                error: function(xhr) {-->
<!--                    console.error('Error fetching organisations:', xhr.responseText);-->
<!--                }-->
<!--            });-->
<!--        }-->
<!--    }-->

<!--function loadDepartments() {-->
<!--    console.trace('Function loadDepartments called');-->
<!--    var state = $('#state').val();-->
<!--    var district = $('#district').val();-->
<!--    var organisation = $('#organisation').val();-->

<!--    console.log('State:', state, 'District:', district, 'Organisation:', organisation);-->
<!--    console.log('Initial Department ID:', '<?php echo e($user->depart_id); ?>');-->

<!--    if (state && district && organisation) {-->
<!--        console.log('hello');-->
<!--        $.ajax({-->
<!--            url: '<?php echo e(route('departments.get')); ?>',-->
<!--            type: 'GET',-->
<!--            data: { state: state, district: district, organisation: organisation },-->
<!--            success: function(response) {-->
                console.log('Raw Response:', response); // Log the raw response

<!--                if (Array.isArray(response)) {-->
<!--                    var departmentDropdown = $('#department_name');-->
<!--                    departmentDropdown.empty().append('<option value="">Select Department</option>');-->

<!--                    response.forEach(dept => {-->
<!--                        departmentDropdown.append($('<option>', { value: dept.id, text: dept.name }));-->
<!--                    });-->

<!--                    console.log('Available Departments:', response);-->

<!--                    if (response.some(dept => dept.id == '<?php echo e($user->depart_id); ?>')) {-->
<!--                        departmentDropdown.val('<?php echo e($user->depart_id); ?>').trigger('change');-->
<!--                        console.log('Department value set:', '<?php echo e($user->depart_id); ?>');-->
<!--                    } else {-->
<!--                        console.warn('Initial Department ID not found in options');-->
<!--                    }-->
<!--                } else {-->
<!--                    console.error('Response is not an array:', response);-->
<!--                }-->
<!--            },-->
<!--            error: function(xhr) {-->
<!--                console.error('Error fetching departments:', xhr.responseText);-->
<!--            }-->
<!--        });-->
<!--    } else {-->
<!--        $('#department_name').empty().append('<option value="">Select Department</option>');-->
<!--    }-->
<!--}-->
   

<!--    function loadDesignations() {-->
<!--        var department = $('#department_name').val();-->
<!--        var taluka = $('#taluka-field').val();-->
<!--            var organisation = $('#organisation').val();-->

<!--    if (taluka && organisation) {-->
<!--            $.ajax({-->
<!--                url: '<?php echo e(route('designations.getByTaluka')); ?>',-->
<!--                type: 'GET',-->
<!--            data: { taluka_id: taluka, organisation_id: organisation },-->
<!--                success: function(response) {-->
<!--                    var designationDropdown = $('#designation');-->
<!--                    designationDropdown.empty().append('<option value="">-- Select Designation --</option>');-->
<!--                    response.forEach(designation => {-->
<!--                        designationDropdown.append($('<option>', { value: designation.id, text: designation.designation_name }));-->
<!--                    });-->
<!--                    $('#designation').val('<?php echo e($user->design_id); ?>').trigger('change');-->
<!--                },-->
<!--                error: function(xhr) {-->
<!--                    console.error('Error fetching designations by taluka:', xhr.responseText);-->
<!--                }-->
<!--            });-->
<!--        } else if (department) {-->
<!--            $.ajax({-->
<!--                url: '<?php echo e(route('designations.get')); ?>',-->
<!--                type: 'GET',-->
<!--                data: { department_id: department },-->
<!--                success: function(response) {-->
<!--                    var designationDropdown = $('#designation');-->
<!--                    designationDropdown.empty().append('<option value="">-- Select Designation --</option>');-->
<!--                    response.forEach(designation => {-->
<!--                        designationDropdown.append($('<option>', { value: designation.id, text: designation.designation_name }));-->
<!--                    });-->
<!--                    $('#designation').val('<?php echo e($user->design_id); ?>').trigger('change');-->
<!--                },-->
<!--                error: function(xhr) {-->
<!--                    console.error('Error fetching designations:', xhr.responseText);-->
<!--                }-->
<!--            });-->
<!--        }-->
<!--    }-->
    // Initialize dropdowns on page load
<!--    loadDropdowns();-->

    // Attach change handlers
<!--    $('#state').change(function() {-->
<!--        loadInitialDistricts();-->
<!--        loadOrganisations();-->
<!--    });-->

<!--    $('#district').change(function() {-->
<!--        loadInitialTalukas();-->
<!--        loadOrganisations();-->
<!--    });-->

<!--    $('#organisation').change(function() {-->
<!--        loadDepartments();-->
<!--    });-->

<!--    $('#department_name, #taluka-field').change(loadDesignations);-->
<!--});-->

<!--    </script>    -->


    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u532655452/domains/eofficess.com/public_html/resources/views/salary/edit.blade.php ENDPATH**/ ?>
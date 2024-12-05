<!DOCTYPE html>
<html>
<head>
    <title>Nomination Report</title>
    <style>
        /* Add some styling */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        
         .signature-section {
    white-space: nowrap; /* Prevent wrapping to a new line */
    text-align: left; /* Align content to the left */ 
}

.signature {
     display: inline-block; /* Makes div elements behave like inline elements */
    vertical-align: top; /* Aligns divs to the top */
    padding: 20px; /* Adds some space inside the div */
    margin-top:30px;
    margin-left:20px;
    margin-right: 10px; /* Adds spacing between divs */ 
}

.signature-image {
    position: relative;
    text-align: center;
    display: inline-block;
}

.signature-img {
    width: 102px; /* Adjust image size as needed */
    height: 49px; /* Adjust image size as needed */
    object-fit: contain;
}

.signature-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    color: black; /* Text color */
    font-size: 13px;
    font-weight: bold;
}
.signature h6 {
   margin-left: -12px;
    font-size: 12px;
    line-height: 0.2;
}


.signature-overlay p {
    margin: 1px -18px;
    font-size: 9px;
}
    </style>
</head>
<body>
    <h2 style="text-align:center">NOMINATION REPORT </h2>
    <table>
        <thead>
            <tr>
                <th>Nomination Type</th>
                 <th>Position</th>
                
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $nominations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nomination): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
            <?php $rowNumber = 1;
   $clerk = DB::table('users')
    ->leftJoin('organizations', 'users.org_id', '=', 'organizations.id')
    ->leftJoin('departments', 'users.depart_id', '=', 'departments.id')
    ->leftJoin('designations', 'users.design_id', '=', 'designations.id')
    ->where('users.id', $nomination->clerk_verify_staff) 
    ->orwhere('users.id' , $nomination->rejected_by)
    ->select(
        'users.*',
        'organizations.org_name',
        'departments.name as department_name',
        'designations.designation_name'
    )
    ->first();
    
    
    
      $rejector = DB::table('users')
    ->leftJoin('organizations', 'users.org_id', '=', 'organizations.id')
    ->leftJoin('departments', 'users.depart_id', '=', 'departments.id')
    ->leftJoin('designations', 'users.design_id', '=', 'designations.id')
    ->where('users.id' , $nomination->rejected_by)
    ->select(
        'users.*',
        'organizations.org_name',
        'departments.name as department_name',
        'designations.designation_name'
    )
    ->first();




  $hod = DB::table('users')
    ->leftJoin('organizations', 'users.org_id', '=', 'organizations.id')
    ->leftJoin('departments', 'users.depart_id', '=', 'departments.id')
    ->leftJoin('designations', 'users.design_id', '=', 'designations.id')
    ->where('users.id', $nomination->hod_verify_staff) 
        ->orwhere('users.id' , $nomination->rejected_by)

    ->select(
        'users.*',
        'organizations.org_name',
        'departments.name as department_name',
        'designations.designation_name'
    )
    ->first();


    $user_verify = DB::table('users')
    ->leftJoin('organizations', 'users.org_id', '=', 'organizations.id')
    ->leftJoin('departments', 'users.depart_id', '=', 'departments.id')
    ->leftJoin('designations', 'users.design_id', '=', 'designations.id')
    ->where('users.id', $nomination->user_id) 
    ->select(
        'users.*',
        'organizations.org_name',
        'departments.name as department_name',
        'designations.designation_name'
    )
    ->first();




    
    ?> 

                <tr>
                    <td><?php echo e($nomination->nomination_type); ?></td>
                    <td><?php echo e($nomination->position); ?></td>
<td class="table-cell">
        
        
        

          <?php if($nomination->status == 'approved_clerk'): ?>
    <span class="status approved_clerk" style=" background-color: #e4e48a !important;
    color: #7a160e;">Pending from HOD</span>
<?php elseif($nomination->status == 'pending'): ?>
    <span class="status pending" style=" background-color: yellow !important; color:orange">PENDING</span>
<?php elseif($nomination->status == 'approved'): ?>
    <span class="status approved" style=" background-color: #a3e1a3 !important;
    color:green; font-size:15px">APPROVED</span>
<?php elseif($nomination->status == 'rejected'): ?>
    <span class="status rejected" style=" background-color: #e6c4c4 !important;
    color: #e63434;">REJECTED</span>
<?php endif; ?>
 
        
        
        
        </td>  
                  </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
                <!--<?php $__currentLoopData = $nominations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nomination): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->

<!--    <div class="signature-section" style="margin-top:70px">-->

<!--        <div class="signature">-->
<!--            <h6>Witness first Signature</h6>-->
<!--            <div class="signature-image">-->
<!--<img src="<?php echo e(public_path('checkmark.png')); ?>" alt="Rejected Signature" class="signature-img">-->
<!--                <div class="signature-overlay">-->
<!--                    <p><?php echo e($nomination->witness_first_name); ?></p>-->
<!--                    <p><?php echo e($nomination->witness_first_create); ?></p>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->


<!-- <div class="signature">-->
<!--            <h6>Witness Second Signature</h6>-->
<!--            <div class="signature-image">-->
<!--<img src="<?php echo e(public_path('checkmark.png')); ?>" alt="Rejected Signature" class="signature-img">-->
<!--                <div class="signature-overlay">-->
<!--                    <p><?php echo e($nomination->witness_second_name); ?></p>-->
<!--                    <p><?php echo e($nomination->witness_second_create); ?></p>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->

<!--                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->

<!-- <?php if(isset($clerk)): ?>-->
<!--        <div class="signature-two">-->
<!--            <h6>Clerk Digital Signature</h6>-->
<!--            <div class="signature-image-two">-->
<!--                <?php if($user->clerk_verify_staff): ?>-->
<!--<img src="<?php echo e(public_path('checkmark.png')); ?>" alt="Rejected Signature" class="signature-img">-->
<!--                <?php elseif($user->rejected_by): ?>-->
<!--<img src="<?php echo e(public_path('checkmark.png')); ?>" alt="Rejected Signature" class="signature-img">-->
<!--                <?php endif; ?>-->
<!--                <div class="signature-overlay-two">-->
<!--                    <p><?php echo e($clerk->first_name); ?> <?php echo e($clerk->middle_name); ?> <?php echo e($clerk->last_name); ?></p>-->
<!--                    <p>-->
<!--                        <?php echo e($clerk->district); ?> - <?php echo e($clerk->org_name); ?>-->
<!--                        <?php echo e($clerk->taluka ? '- ' . $clerk->taluka : ''); ?>-->
<!--                    </p>-->
<!--                    <p><?php echo e($clerk->department_name); ?> - <?php echo e($clerk->designation_name); ?></p>-->
<!--                    <p><?php echo e($user->clerk_create); ?></p>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    <?php endif; ?>-->

<!--   <?php if(isset($hod) && $user->clerk_verify_staff): ?> -->
<!--        <div class="signature-two hod-digital-signature" style="margin-left: -190px;">-->

<!--            <h6>HOD Digital Signature</h6>-->
<!--            <div class="signature-image-two">-->
<!--                <?php if($user->hod_verify_staff): ?>-->
<!--<img src="<?php echo e(public_path('checkmark.png')); ?>" alt="Rejected Signature" class="signature-img">-->
<!--                <?php else: ?>-->
<!--<img src="<?php echo e(public_path('checkmark.png')); ?>" alt="Rejected Signature" class="signature-img">-->
<!--                <?php endif; ?>-->

<!--                <div class="signature-overlay-two  hod-digital-signature" style="margin-left: -20px;">-->

<!--                    <p><?php echo e($hod->first_name); ?> <?php echo e($hod->middle_name); ?> <?php echo e($hod->last_name); ?></p>-->
<!--                    <p>-->
<!--                        <?php echo e($hod->district); ?> - <?php echo e($hod->org_name); ?>-->
<!--                        <?php echo e($hod->taluka ? '- ' . $hod->taluka : ''); ?>-->
<!--                    </p>-->
<!--                    <p><?php echo e($hod->department_name); ?> - <?php echo e($hod->designation_name); ?></p>-->
<!--                    <p><?php echo e($user->hod_create); ?></p>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    <?php endif; ?>-->
<!--    </div>-->

</body>
</html>
<?php /**PATH /home/u532655452/domains/eofficess.com/public_html/resources/views/nomination/pdf_template_for_nomination.blade.php ENDPATH**/ ?>
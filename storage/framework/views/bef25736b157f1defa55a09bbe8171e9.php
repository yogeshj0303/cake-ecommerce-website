<!DOCTYPE html>
<html>
<head>
    <title>Leave Report</title>
    <style>
        /* Add some styling */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
.tabletag {
    width: 100%;
    border-collapse: collapse;
}

.tabletag th, 
.tabletag td {
    border: 1px solid black;
    padding: 8px;
    text-align: left;
}
        
  .logo {
    display: flex;
    margin-top: 1px;
    justify-content: center; /* Centers the content horizontally */
    align-items: center; /* Centers the content vertically */
    height: 1%; /* Ensures full height of the container is used */
}

.logo img {
    height: 30px; /* Keep the logo size as desired */
        margin-left: 17px;

}

.firm-details {
    text-align: right;
    line-height: 1.8;
}

.row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
}

.row div {
    padding:9px;
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
    width: 90px; /* Adjust image size as needed */
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
    <?php
    $leavess = $leaves->first(); // Get the first item from the collection
?>

    <h2 style="text-align:center">LEAVE REPORT </h2>
<div class="header-info" style="border: 1px solid black; padding: 10px; width: 97%;">
    <!-- Logo Section -->
    <table style="width: 100%; border-collapse: collapse;">
        <tr>
            <!-- Logo -->
            <td style="width: 20%; text-align: center; vertical-align: middle;">
                <?php if(isset($leavess) && isset($leavess->org_logo)): ?>
                    <img src="<?php echo e(public_path('images/' . $leavess->org_logo)); ?>" alt="Logo" style="height: 70px; max-width: 100%; object-fit: contain;">
                <?php endif; ?>
            </td>

            <!-- Firm Details -->
            <td style="border-left: 2px solid black; vertical-align: top; padding-left: 5px; padding-right: 5px;">
                <table style="width: 100%;">
                    <tr>
                        <td colspan="3" style="font-weight: bold; text-align: center;">
                            <?php if(isset($leavess) && isset($leavess->org_name)): ?>
                                Firm Name: <?php echo e($leavess->org_name); ?>

                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="height: 10px;"></td>
                    </tr>
                    <tr>
                        <td>
                            <?php if(isset($leavess) && isset($leavess->state)): ?>
                                <strong>State:</strong> <?php echo e($leavess->state); ?>

                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if(isset($leavess) && isset($leavess->district)): ?>
                                <strong>District:</strong> <?php echo e($leavess->district); ?>

                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if(isset($leavess) && isset($leavess->department_name)): ?>
                                <strong>Department:</strong> <?php echo e($leavess->department_name); ?>

                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php if(isset($leavess) && isset($leavess->taluka)): ?>
                                <strong>Taluka:</strong> <?php echo e($leavess->taluka); ?>

                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if(isset($leavess) && isset($leavess->designation_name)): ?>
                                <strong>Designation:</strong> <?php echo e($leavess->designation_name); ?>

                            <?php endif; ?>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>

      
    <table class="tabletag">
        <thead>
            <tr>
                <th>Leave Type</th>
                 <th>Available Leaves</th>
                <th>Total Leave Days</th>
                <th>Reduse from available Leave</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Leave Apply Start Date</th>
                <th> Leave Apply End Date</th>

                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $leaves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leave): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
            
              <?php $rowNumber = 1;
   $clerk = DB::table('users')
    ->leftJoin('organizations', 'users.org_id', '=', 'organizations.id')
    ->leftJoin('departments', 'users.depart_id', '=', 'departments.id')
    ->leftJoin('designations', 'users.design_id', '=', 'designations.id')
    ->where('users.id', $leave->clerk_verify_staff) 
    ->orwhere('users.id' , $leave->rejected_by)
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
    ->where('users.id' , $leave->rejected_by)
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
    ->where('users.id', $leave->hod_verify_staff) 
        ->orwhere('users.id' , $leave->rejected_by)

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
    ->where('users.id', $user->user_id) 
    ->select(
        'users.*',
        'organizations.org_name',
        'departments.name as department_name',
        'designations.designation_name'
    )
    ->first();


    
    ?> 

                <tr>
                    <td><?php echo e($leave->leave_category); ?></td>
                    <td><?php echo e($leave->available_leave); ?></td>
                    <td><?php echo e($leave->leave_days); ?></td>
                    <td><?php echo e($leave->reduce_available_leave); ?></td>
                    <td><?php echo e($leave->start_date); ?></td>
                    <td><?php echo e($leave->end_date); ?></td>
                                        <td><?php echo e($leave->apply_start_date); ?></td>
                    <td><?php echo e($leave->apply_end_date); ?></td>

  <td class="table-cell">
        
        
        

          <?php if($leave->status == 'approved_clerk'): ?>
    <span class="status approved_clerk" style=" background-color: #e4e48a !important;
    color: #7a160e;">Pending from HOD</span>
<?php elseif($leave->status == 'pending'): ?>
    <span class="status pending" style=" background-color: yellow !important; color:orange">PENDING</span>
<?php elseif($leave->status == 'approved'): ?>
    <span class="status approved" style=" background-color: #a3e1a3 !important;
    color:green; font-size:15px">APPROVED</span>
<?php elseif($leave->status == 'rejected'): ?>
    <span class="status rejected" style=" background-color: #e6c4c4 !important;
    color: #e63434;">REJECTED</span>
<?php endif; ?>
 
        
        
        
        </td>  
        
        
        </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    
<!--    <div class="signature-section">-->

<!--   <?php if(isset($clerk)): ?>-->
<!--    <div class="signature">-->
<!--        <div class="signature-image">-->
<!--            <?php if($user->clerk_verify_staff): ?>-->
<!--<img src="<?php echo e(public_path('checkmark.png')); ?>" alt="Rejected Signature" class="signature-img">-->
<!--            <?php elseif($user->rejected_by): ?>-->
<!--            <img src="<?php echo e(public_path('crossred2.png')); ?>" alt="Rejected Signature" class="signature-img">-->

<!--            <?php endif; ?>-->

<!--            <div class="signature-overlay">-->
<!--                <p><?php echo e($clerk->first_name); ?> <?php echo e($clerk->middle_name); ?> <?php echo e($clerk->last_name); ?></p>-->
<!--                <p>-->
<!--                    <?php echo e($clerk->district); ?> - <?php echo e($clerk->org_name); ?>-->
<!--                    <?php echo e($clerk->taluka ? '- ' . $clerk->taluka : ''); ?>-->
<!--                </p>-->
<!--                <p><?php echo e($clerk->department_name); ?> - <?php echo e($clerk->designation_name); ?></p>-->
<!--                <p><?php echo e($user->clerk_create); ?></p>-->
<!--            </div>-->
<!--        </div>-->
<!--                <h6>Clerk Digital Signature</h6>-->

<!--    </div>-->
<!--<?php endif; ?>-->

<!--    <?php if(isset($hod) && $user->clerk_verify_staff): ?>-->
<!--        <div class="signature">-->
<!--            <div class="signature-image">-->
<!--            <?php if($user->hod_verify_staff): ?>-->
<!--<img src="<?php echo e(public_path('checkmark.png')); ?>" alt="Rejected Signature" class="signature-img">-->
<!--            <?php else: ?>-->
<!--            <img src="<?php echo e(public_path('crossred2.png')); ?>" alt="Rejected Signature" class="signature-img">-->
<!--                                <?php endif; ?>-->

<!--                            <div class="signature-overlay">-->
<!--                    <p><?php echo e($hod->first_name); ?> <?php echo e($hod->middle_name); ?> <?php echo e($hod->last_name); ?></p>-->
<!--                    <p>-->
<!--                        <?php echo e($hod->district); ?> - <?php echo e($hod->org_name); ?>-->
<!--                        <?php echo e($hod->taluka ? '- ' . $hod->taluka : ''); ?>-->
<!--                    </p>-->
<!--                    <p><?php echo e($hod->department_name); ?> - <?php echo e($hod->designation_name); ?></p>-->
<!--                    <p><?php echo e($user->hod_create); ?></p>-->
<!--                </div>-->
<!--            </div>-->
<!--                        <h6>HOD Digital Signature</h6>-->

<!--        </div>-->
<!--    <?php endif; ?>-->

<!--</div>-->

</body>
</html>
<?php /**PATH /home/u532655452/domains/eofficess.com/public_html/resources/views/user-leaves/pdf_template_for_leaves.blade.php ENDPATH**/ ?>
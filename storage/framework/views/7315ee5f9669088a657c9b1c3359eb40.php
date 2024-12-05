<!DOCTYPE html>
<html>
<head>
    <title>Salary Report</title>
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

    </style>
</head>
<body>
    <h2 style="text-align:center">SALARY REPORT </h2>
    
       <?php
    $salaryy = $salaries->first(); 
?>

<div class="header-info" style="border: 1px solid black; padding: 10px; width: 97%;">
    <!-- Logo Section -->
    <table style="width: 100%; border-collapse: collapse;">
        <tr>
            <!-- Logo -->
            <td style="width: 20%; text-align: center; vertical-align: middle;">
                <?php if(isset($salaryy) && isset($salaryy->org_logo)): ?>
                    <img src="<?php echo e(public_path('images/' . $salaryy->org_logo)); ?>" alt="Logo" style="height: 70px; max-width: 100%; object-fit: contain;">
                <?php endif; ?>
            </td>

            <!-- Firm Details -->
            <td style="border-left: 2px solid black; padding-left: 5px; padding-right: 5px; vertical-align: top;">
                <table style="width: 100%;">
                    <tr>
                        <td colspan="3" style="font-weight: bold; text-align: center;">
                            <?php if(isset($salaryy) && isset($salaryy->org_name)): ?>
                                Firm Name: <?php echo e($salaryy->org_name); ?>

                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="height: 10px;"></td>
                    </tr>
                    <tr>
                        <td>
                            <?php if(isset($salaryy) && isset($salaryy->state)): ?>
                                <strong>State:</strong> <?php echo e($salaryy->state); ?>

                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if(isset($salaryy) && isset($salaryy->district)): ?>
                                <strong>District:</strong> <?php echo e($salaryy->district); ?>

                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if(isset($salaryy) && isset($salaryy->department_name)): ?>
                                <strong>Department:</strong> <?php echo e($salaryy->department_name); ?>

                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php if(isset($salaryy) && isset($salaryy->taluka)): ?>
                                <strong>Taluka:</strong> <?php echo e($salaryy->taluka); ?>

                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if(isset($salaryy) && isset($salaryy->designation_name)): ?>
                                <strong>Designation:</strong> <?php echo e($salaryy->designation_name); ?>

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
                  <th>Last Salary</th>
                <th>Slap Amount</th>
                <th>Direct Amount</th>
                 <th>Grade Total Salary</th>
                 
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $salaries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $salary): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
                <tr>
                     <td><?php echo e($salary->last_salary); ?></td>
                    <td><?php echo e(str_replace('₹', '', $salary->slap_amount) ?? ''); ?></td>
                     <td><?php echo e(str_replace('₹', ' ', $salary->grade_amount) ?? ''); ?></td>
                    <td><?php echo e($user->direct_total_salary ? str_replace('₹', '', $salary->direct_total_salary) : '- -'); ?></td>
                <td class="table-cell">
        
        
        

          <?php if($salary->status == 'approved_clerk'): ?>
    <span class="status approved_clerk" style=" background-color: #e4e48a !important;
    color: #7a160e;">Pending from HOD</span>
<?php elseif($salary->status == 'pending'): ?>
    <span class="status pending" style=" background-color: yellow !important; color:orange">PENDING</span>
<?php elseif($salary->status == 'approved'): ?>
    <span class="status approved" style=" background-color: #a3e1a3 !important;
    color:green; font-size:15px">APPROVED</span>
<?php elseif($salary->status == 'rejected'): ?>
    <span class="status rejected" style=" background-color: #e6c4c4 !important;
    color: #e63434;">REJECTED</span>
<?php endif; ?>
 
        
        
        
        </td>  
  
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</body>
</html>
<?php /**PATH /home/u532655452/domains/eofficess.com/public_html/resources/views/salary/pdf_template_for_salary.blade.php ENDPATH**/ ?>
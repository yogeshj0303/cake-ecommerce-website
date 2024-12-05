<!DOCTYPE html>
<html>
<head>
    <title>Checklist Report</title>
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
    <h2 style="text-align:center">CHECKLIST REPORT </h2>
    
  <?php
    $checklistss = $checklists->first();
?>

<div class="header-info" style="border: 1px solid black; padding: 10px; width: 97%;">
    <!-- Logo Section -->
    <table style="width: 100%; border-collapse: collapse;">
        <tr>
            <!-- Logo -->
            <td style="width: 20%; text-align: center; vertical-align: middle;">
                <?php if(isset($checklistss) && isset($checklistss->org_logo)): ?>
                    <img src="<?php echo e(public_path('images/' . $checklistss->org_logo)); ?>" alt="Logo" style="height: 70px; max-width: 100%; object-fit: contain;">
                <?php endif; ?>
            </td>

            <!-- Firm Details -->
            <td style="border-left: 2px solid black; padding-left: 5px; padding-right: 5px; vertical-align: top;">
                <table style="width: 100%;">
                    <tr>
                        <td colspan="3" style="font-weight: bold; text-align: center;">
                            <?php if(isset($checklistss) && isset($checklistss->org_name)): ?>
                                Firm Name: <?php echo e($checklistss->org_name); ?>

                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="height: 10px;"></td>
                    </tr>
                    <tr>
                        <td>
                            <?php if(isset($checklistss) && isset($checklistss->state)): ?>
                                <strong>State:</strong> <?php echo e($checklistss->state); ?>

                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if(isset($checklistss) && isset($checklistss->district)): ?>
                                <strong>District:</strong> <?php echo e($checklistss->district); ?>

                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if(isset($checklistss) && isset($checklistss->department_name)): ?>
                                <strong>Department:</strong> <?php echo e($checklistss->department_name); ?>

                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php if(isset($checklistss) && isset($checklistss->taluka)): ?>
                                <strong>Taluka:</strong> <?php echo e($checklistss->taluka); ?>

                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if(isset($checklistss) && isset($checklistss->designation_name)): ?>
                                <strong>Designation:</strong> <?php echo e($checklistss->designation_name); ?>

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
                  <th>Checklist Name</th>
                <th>Process Status</th>
                <th>Receipt No</th>
                 <th>Receipt Process Status</th>
                 
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $checklists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $checklist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td><?php echo e($checklist->checklist_name); ?></td>
        <td><?php echo e($checklist->process_status); ?></td>
        <td><?php echo e($checklist->receipt_no ? $checklist->receipt_no : '--'); ?></td>
        <td><?php echo e($checklist->receipt_process_status); ?></td>
          <td class="">
        
        
        

<?php if($checklist->Status == 'pending'): ?>
    <span class="status pending" style="background-color: yellow !important; color:orange ; font-size:14px">PENDING</span>
<?php elseif($checklist->Status == 'Approved'): ?>
    <span class="status approved" style=" background-color: #a3e1a3 !important;
    color:green; font-size:15px">APPROVED</span>
<?php elseif($checklist->Status == 'Rejected'): ?>
    <span class="status rejected" style=" background-color: #e6c4c4 !important;
    color: #e63434; font-size:14px">REJECTED</span>
<?php endif; ?>
 
        
        
        
        </td>
        
        
        
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>
    </table>
</body>
</html>
<?php /**PATH /home/u532655452/domains/eofficess.com/public_html/resources/views/checklist-master/pdf_template_for_checklists.blade.php ENDPATH**/ ?>
<!DOCTYPE html>
<html>
<head>
    <title>Affidavit Report</title>
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
    <h2 style="text-align:center">AFFIDAVIT REPORT </h2>
 <?php
    $affidavitss = $affidavits->first();
?>

<div class="header-info" style="border: 1px solid black; padding: 10px; width: 97%;">
    <!-- Logo Section -->
    <table style="width: 100%; border-collapse: collapse;">
        <tr>
            <!-- Logo -->
            <td style="width: 20%; text-align: center; vertical-align: middle;">
                <?php if(isset($affidavitss) && isset($affidavitss->org_logo)): ?>
                    <img src="<?php echo e(public_path('images/' . $affidavitss->org_logo)); ?>" alt="Logo" style="height: 70px; max-width: 100%; object-fit: contain;">
                <?php endif; ?>
            </td>

            <!-- Firm Details -->
            <td style="border-left: 2px solid black; vertical-align: top; padding-left: 5px; padding-right: 5px;">
                <table style="width: 100%;">
                    <tr>
                        <td colspan="3" style="font-weight: bold; text-align: center;">
                            <?php if(isset($affidavitss) && isset($affidavitss->org_name)): ?>
                                Firm Name: <?php echo e($affidavitss->org_name); ?>

                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="height: 10px;"></td>
                    </tr>
                    <tr>
                        <td>
                            <?php if(isset($affidavitss) && isset($affidavitss->state)): ?>
                                <strong>State:</strong> <?php echo e($affidavitss->state); ?>

                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if(isset($affidavitss) && isset($affidavitss->district)): ?>
                                <strong>District:</strong> <?php echo e($affidavitss->district); ?>

                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if(isset($affidavitss) && isset($affidavitss->department_name)): ?>
                                <strong>Department:</strong> <?php echo e($affidavitss->department_name); ?>

                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php if(isset($affidavitss) && isset($affidavitss->taluka)): ?>
                                <strong>Taluka:</strong> <?php echo e($affidavitss->taluka); ?>

                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if(isset($affidavitss) && isset($affidavitss->designation_name)): ?>
                                <strong>Designation:</strong> <?php echo e($affidavitss->designation_name); ?>

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
                  <th>Affidavit Type</th>
                 
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $affidavits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $affidavit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td><?php echo e($affidavit->affidavit_type_name); ?></td>
        <td>
            
            
          <?php if($affidavit->status == 'approved_clerk'): ?>
    <span class="status approved_clerk" style=" background-color: #e4e48a !important;
    color: #7a160e;">Pending from HOD</span>
<?php elseif($affidavit->status == 'pending'): ?>
    <span class="status pending" style=" background-color: yellow !important; color:orange">PENDING</span>
<?php elseif($affidavit->status == 'approved'): ?>
    <span class="status approved" style=" background-color: #a3e1a3 !important;
    color:green; font-size:15px">APPROVED</span>
<?php elseif($affidavit->status == 'rejected'): ?>
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
<?php /**PATH /home/u532655452/domains/eofficess.com/public_html/resources/views/affidavit/pdf_template_for_affidavit.blade.php ENDPATH**/ ?>
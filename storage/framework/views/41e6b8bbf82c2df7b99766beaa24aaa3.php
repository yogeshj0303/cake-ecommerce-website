<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>USER DOCUMENT REPORT</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 90%;
            margin: 20px auto;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            font-size: 12px;
        }
        .page-title {
            text-align: center;
            margin-bottom: 15px;
            font-size: 22px;
            font-weight: bold;
        }
        .info-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
            margin: 0 auto;
        }
        .info-table, .info-table th, .info-table td {
            border: 1px solid black;
        }
        .info-table th, .info-table td {
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
    margin-left:77px;
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



 .approved_clerk {
    background-color: #dbdb54 !important;
    color:#7a7a0e;
    -webkit-print-color-adjust: exact; /* For printing */
    print-color-adjust: exact; /* For printing */
}


  .footer {
            margin-top: 20px;
            border-top: 1px dotted black;
            padding-top: 5px;
            text-align: center;
            font-size: 15px;
        }

        /* Print styles */
  @media print {
    body, .container {
        width: 100%;
        margin: 0;
        padding: 0;
        box-shadow: none;
        font-size: 12px;
    }
      iframe {
            width: 100% !important;
            height: 500px !important;
        }

        .no-print {
            display: none !important;
        }

      
     
      .approved_clerk {
   background-color: #e4e48a !important;
    color: #7a160e;
    -webkit-print-color-adjust: exact; /* For printing */
    print-color-adjust: exact; /* For printing */
}

.pending {
    background-color: orange !important;
    -webkit-print-color-adjust: exact; /* For printing */
    print-color-adjust: exact; /* For printing */
}

.approved {
 background-color: #a3e1a3 !important;
    color:green;
       -webkit-print-color-adjust: exact; /* For printing */
    print-color-adjust: exact; /* For printing */
}

.rejected {
    background-color: #e6c4c4 !important;
    color: #e63434;
    -webkit-print-color-adjust: exact; /* For printing */
    print-color-adjust: exact; /* For printing */
}


    .container {
        page-break-inside: avoid; /* Prevents page break inside the container */
    }

    .info-table {
        width: 100%; /* Full width for printing */
    }

  .signature-section {
    display: flex;
    justify-content: space-between;
    padding: 10px;
    
}

 .signature-section {
    display: flex;
    justify-content: space-between;
    padding: 10px;
    
}

.signature {
    flex: 1;
    padding-left: 86px;
    padding-top: 20px;
    
}

.signature-image {
    position: relative;
    text-align: center;
    display: inline-block;
}

.signature-img {
    width: 70px; /* Adjust image size as needed */
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
   margin-left: -12x;
    font-size: 12px;
    line-height: 0.2;
}


.signature-overlay p {
    margin: 1px -18px;
    font-size: 9px;
}

  .footer {
            margin-top: 20px;
            border-top: 1px dotted black;
            padding-top: 5px;
            text-align: center;
            font-size: 15px;
        }

  
}

    </style>
</head>
<body>
  
    <div class="container">
        <h1 class="page-title">USER DOCUMENT REPORT</h1>
<div class="header-info" style="border: 1px solid black; padding: 10px; width: 97%;">
    <!-- Logo Section -->
    <table style="width: 100%; border-collapse: collapse;">
        <tr>
            <!-- Logo -->
            <td style="width: 20%; text-align: center; vertical-align: middle;">
                <img src="<?php echo e(public_path('images/' . $user->org_logo)); ?>" alt="Logo" style="height: 70px; max-width: 100%; object-fit: contain;">
            </td>

            <!-- Firm Details -->
            <td style="border-left: 2px solid black; padding-left: 20px; vertical-align: top;">
                <table style="width: 100%;">
<tr>
    <td colspan="3" style="font-weight: bold; text-align: center;">
        Firm Name: <?php echo e($user->org_name); ?>

    </td>
</tr>
<tr>
    <td colspan="3" style="height: 10px;"></td>
</tr>
                    <tr>
                        <td><strong>State:</strong> <?php echo e($user->state); ?></td>
                        <td><strong>District:</strong> <?php echo e($user->district); ?></td>
                        <td><strong>Department:</strong> <?php echo e($user->department_name); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Taluka:</strong> <?php echo e($user->taluka); ?></td>
                        <td><strong>Designation:</strong> <?php echo e($user->designation_name); ?></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>

<table class="info-table">
    <?php $rowNumber = 1;
   $clerk = DB::table('users')
    ->leftJoin('organizations', 'users.org_id', '=', 'organizations.id')
    ->leftJoin('departments', 'users.depart_id', '=', 'departments.id')
    ->leftJoin('designations', 'users.design_id', '=', 'designations.id')
    ->where('users.id', $user->clerk_verify_staff) 
    ->orwhere('users.id' , $user->rejected_by)
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
    ->where('users.id', $user->hod_verify_staff) 
        ->orwhere('users.id' , $user->rejected_by)

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
    ->where('users.id', $user->id) 
    ->select(
        'users.*',
        'organizations.org_name',
        'departments.name as department_name',
        'designations.designation_name'
    )
    ->first();


    
    ?> 

<tr class="table-row">
    <td class="table-cell"><?php echo e($rowNumber++); ?></td>
    <td class="table-cell" style="font-weight: bold;">Profile Name</td>
    <td class="table-cell"><?php echo e($user->first_name); ?> <?php echo e($user->middle_name); ?> <?php echo e($user->last_name); ?></td>
</tr>

  

<tr class="table-row">
    <td class="table-cell"><?php echo e($rowNumber++); ?></td>
    <td class="table-cell" style="font-weight: bold;">Status</td>
    <td class="table-cell ">
       <?php if($user->status == 'approved_clerk'): ?>
    <span class="status approved_clerk" style=" background-color: #e4e48a !important;
    color: #7a160e;">Pending from HOD</span>
<?php elseif($user->status == 'pending'): ?>
    <span class="status pending" style=" background-color: orange !important;">PENDING</span>
<?php elseif($user->status == 'approved'): ?>
    <span class="status approved" style=" background-color: #a3e1a3 !important;
    color:green;">APPROVED</span>
<?php elseif($user->status == 'rejected'): ?>
    <span class="status rejected" style=" background-color: #e6c4c4 !important;
    color: #e63434;">REJECTED</span>
<?php endif; ?>
    </td>
</tr>

<?php if($user->status == 'rejected'): ?>
<tr class="table-row">
    <td class="table-cell"><?php echo e($rowNumber++); ?></td>
    <td class="table-cell" style="font-weight: bold;">Reject description</td>
    <td class="table-cell"><?php echo e($user->reject_description ?? '- -'); ?></td>
</tr>
<?php endif; ?>



</table>

    <!-- Document Info Table -->
<!--    <?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->

<!--    <table class="info-table" style="width: 100%; border-collapse: collapse; font-family: Arial, sans-serif;">-->
<!--        <tbody>-->
<!--            <tr style="background-color: #f5f5f5;">-->
<!--                <td style="font-weight: bold; padding: 10px; border: 1px solid #ddd;">Document Name</td>-->
<!--                <td style="padding: 10px; border: 1px solid #ddd;"><?php echo e($detail->doc_name ?? '- -'); ?></td>-->
<!--            </tr>-->
<!--            <?php if(pathinfo($detail->document ?? '', PATHINFO_EXTENSION) === 'pdf'): ?>-->
<!--                <tr>-->
<!--                    <td colspan="2" style="padding: 10px; border: 1px solid #ddd;">-->
<!--                        <iframe src="<?php echo e(asset('images/' . $detail->document)); ?>" style="width: 100%; height: 500px; border: none;" title="Document Viewer"></iframe>-->
<!--                    </td>-->
<!--                </tr>-->
<!--            <?php else: ?>-->
<!--                <tr>-->
<!--                    <td colspan="2" style="padding: 10px; border: 1px solid #ddd;">-->
<!--                        <div style="margin: 10px; padding-top: 10px;">-->
<!--                            <img src="<?php echo e(asset('images/' . $detail->document)); ?>" alt="Document Image" style="width: 30%; max-height: 200px; object-fit: contain;">-->
<!--                        </div>-->
<!--                    </td>-->
<!--                </tr>-->
<!--            <?php endif; ?>-->
<!--        </tbody>-->
<!--    </table>-->

<!--<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->


<div class="signature-section">

  
    <?php if(isset($clerk)): ?>
        <div class="signature">
            <div class="signature-image">
                <?php if($user->clerk_verify_staff): ?>
                    <img src="<?php echo e(public_path('checkmark.png')); ?>" alt="Approved Signature" class="signature-img">
                <?php elseif($user->rejected_by): ?>
                    <img src="<?php echo e(public_path('crossred2.png')); ?>" alt="Rejected Signature" class="signature-img">
                <?php endif; ?>
                <div class="signature-overlay">
                    <p><?php echo e($clerk->first_name); ?> <?php echo e($clerk->middle_name); ?> <?php echo e($clerk->last_name); ?></p>
                    <p>
                        <?php echo e($clerk->district); ?> - <?php echo e($clerk->org_name); ?>

                        <?php echo e($clerk->taluka ? '- ' . $clerk->taluka : ''); ?>

                    </p>
                    <p><?php echo e($clerk->department_name); ?> - <?php echo e($clerk->designation_name); ?></p>
                    <p><?php echo e($user->clerk_create); ?></p>
                </div>
                                        <h6 style=" margin-top:5px;
    margin-bottom:0px;">Clerk Digital Signature</h6>

            </div>

        </div>
    <?php endif; ?>

   <?php if(isset($hod) && $user->clerk_verify_staff): ?> 
        <div class="signature">
            <div class="signature-image">
                <?php if($user->hod_verify_staff): ?>
<img src="<?php echo e(public_path('checkmark.png')); ?>" alt="Rejected Signature" class="signature-img">
                <?php else: ?>
                    <img src="<?php echo e(public_path('crossred2.png')); ?>" alt="Rejected Signature" class="signature-img">
                <?php endif; ?>

                <div class="signature-overlay">
                    <p><?php echo e($hod->first_name); ?> <?php echo e($hod->middle_name); ?> <?php echo e($hod->last_name); ?></p>
                    <p>
                        <?php echo e($hod->district); ?> - <?php echo e($hod->org_name); ?>

                        <?php echo e($hod->taluka ? '- ' . $hod->taluka : ''); ?>

                    </p>
                    <p><?php echo e($hod->department_name); ?> - <?php echo e($hod->designation_name); ?></p>
                    <p><?php echo e($user->hod_create); ?></p>
                </div>
                                        <h6 style=" margin-top:5px;
    margin-bottom:0px;">HOD Digital Signature</h6>

            </div>

        </div>
    <?php endif; ?>

</div>

      
    </div>

</body>
</html><?php /**PATH /home/u532655452/domains/eofficess.com/public_html/resources/views/document/Document-print.blade.php ENDPATH**/ ?>
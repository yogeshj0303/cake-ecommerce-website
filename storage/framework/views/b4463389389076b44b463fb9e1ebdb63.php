<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>USER PROFILE REPORT</title>
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
    display: flex;
    justify-content: space-between;
    padding: 10px;
    
}

.signature {
    flex: 1;
    padding-left: 82px;
    padding-top: 20px;
    
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



    .page-title {
        text-align: center;
        margin-bottom: 20px;
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

  .approved_clerk {
    background-color: yellow !important;
    color:green;
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


  .footer {
            margin-top: 20px;
            border-top: 1px dotted black;
            padding-top: 5px;
            text-align: center;
            font-size: 15px;
        }

        /* Print styles */
  @media print {
      
          .approved_clerk {
    background-color: #a3e1a3 !important;
    color:green;
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




    body, .container {
        width: 100%;
        margin: 0;
        padding: 0;
        box-shadow: none;
        font-size: 12px;
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
    padding-left: 82px;
    padding-top: 20px;
    
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
   margin-left: -12x;
    font-size: 12px;
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
        <h1 class="page-title">USER PROFILE REPORT</h1>
        
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

<!-- Table -->
<table class="info-table" style="width: 100%; border-collapse: collapse; margin-top: 0;">
    <!-- Table content here -->
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
    <td class="table-cell" style="font-weight: bold;">Email</td>
    <td class="table-cell"><?php echo e($user->email ?? '- -'); ?></td>
</tr>

<tr class="table-row">
    <td class="table-cell"><?php echo e($rowNumber++); ?></td>
    <td class="table-cell" style="font-weight: bold;">Contact Number</td>
    <td class="table-cell"><?php echo e(ucfirst($user->number ?? '- -')); ?></td>
</tr>

<tr class="table-row">
    <td class="table-cell"><?php echo e($rowNumber++); ?></td>
    <td class="table-cell" style="font-weight: bold;">Address</td>
    
    <td class="table-cell"><?php echo e($user->address ?? '- -'); ?></td>
</tr>


<tr class="table-row">
    <td class="table-cell"><?php echo e($rowNumber++); ?></td>
    <td class="table-cell" style="font-weight: bold;">Birth Date</td>
    <td class="table-cell"><?php echo e($user->birth_date ?? '- -'); ?></td>
</tr>

<tr class="table-row">
    <td class="table-cell"><?php echo e($rowNumber++); ?></td>
    <td class="table-cell" style="font-weight: bold;">Birth Date in Text</td>
    <td class="table-cell"><?php echo e($user->birth_text ?? '- -'); ?></td>
</tr>


<tr class="table-row">
    <td class="table-cell"><?php echo e($rowNumber++); ?></td>
    <td class="table-cell" style="font-weight: bold;">Total Leaves</td>
    <td class="table-cell"><?php echo e($user->leaves ?? '- -'); ?></td>
</tr>
<tr class="table-row">
    <td class="table-cell"><?php echo e($rowNumber++); ?></td>
    <td class="table-cell" style="font-weight: bold;">Total Available Leaves</td>
    <td class="table-cell"><?php echo e($user->available_leave ?? '- -'); ?></td>
</tr>




<!--<tr class="table-row">-->
<!--    <td class="table-cell"><?php echo e($rowNumber++); ?></td>-->
<!--    <td class="table-cell" style="font-weight: bold;">Status</td>-->
<!--    <td class="table-cell ">-->
<!--       <?php if($user->status == 'approved_clerk'): ?>-->
<!--    <span class="status approved_clerk">PENDING FROM HOD</span>-->
<!--<?php elseif($user->status == 'pending'): ?>-->
<!--    <span class="status pending">PENDING</span>-->
<!--<?php elseif($user->status == 'approved'): ?>-->
<!--    <span class="status approved">APPROVED</span>-->
<!--<?php elseif($user->status == 'rejected'): ?>-->
<!--    <span class="status rejected">REJECTED</span>-->
<!--<?php endif; ?>-->
 
<!--        </td>-->
<!--</tr>-->




</table>

<!--<div style="margin-top: 20px;">-->
<!--    <h3>Old Book </h3>-->
<!--    <iframe -->
<!--        src="<?php echo e(asset('images/' . $user->old_book)); ?>" -->
<!--        width="100%" -->
<!--        height="600px" -->
<!--        style="border: 1px solid #ddd;">-->
<!--    </iframe>-->
<!--</div>-->








<!--<div class="signature-section">-->

<!--    <?php if(isset($user_verify)): ?>-->
<!--        <div class="signature">-->
<!--            <div class="signature-image">-->
<!--                <img src="<?php echo e(asset('checkmark.png')); ?>" alt="User Signature" class="signature-img">-->
<!--                <div class="signature-overlay">-->
<!--                    <p><?php echo e($user_verify->first_name); ?> <?php echo e($user_verify->middle_name); ?> <?php echo e($user_verify->last_name); ?></p>-->
<!--                    <p>-->
<!--                        <?php echo e($user_verify->district); ?> - <?php echo e($user_verify->org_name); ?>-->
<!--                        <?php echo e($user_verify->taluka ? '- ' . $user_verify->taluka : ''); ?>-->
<!--                    </p>-->
<!--                    <p><?php echo e($user_verify->department_name); ?> - <?php echo e($user_verify->designation_name); ?></p>-->
<!--                    <p><?php echo e($user_verify->user_create); ?></p>-->
<!--                </div>-->
<!--            </div>-->
            
<!--                        <h6>User Digital Signature</h6>-->

<!--        </div>-->
<!--    <?php endif; ?>-->

<!-- <?php if(isset($clerk)): ?>-->
<!--    <div class="signature">-->
<!--        <div class="signature-image">-->
<!--            <?php if($user->clerk_verify_staff): ?>-->
<!--                <img src="<?php echo e(asset('checkmark.png')); ?>" alt="Approved Signature" class="signature-img">-->
<!--            <?php elseif($user->rejected_by): ?>-->
<!--                <img src="<?php echo e(asset('crossred2.png')); ?>" alt="Rejected Signature" class="signature-img">-->
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
<!--                <img src="<?php echo e(asset('checkmark.png')); ?>" alt="Approved Signature" class="signature-img">-->
<!--            <?php else: ?>-->
<!--                <img src="<?php echo e(asset('crossred2.png')); ?>" alt="Rejected Signature" class="signature-img">-->
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

        <div class="footer">
            Note - The entries in this page should be renewed or re-attested at least every five years.
        </div>
    </div>

</body>
</html><?php /**PATH /home/u532655452/domains/eofficess.com/public_html/resources/views/user-profile/user-profile-print.blade.php ENDPATH**/ ?>
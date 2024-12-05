<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>User Details Report</title>
    <style>
        body {
            
            font-family: Arial, Helvetica, sans-serif, NotoSansDevanagari, DejaVu Sans;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .page-title {
            text-align: center;
            text-decoration: underline;
            margin-bottom: 15px;
            font-size: 22px;
            font-weight: bold;
        }
        .info-table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto;
            font-size: 14px;
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
    align-items: center;
    margin-top: 20px; /* Space between the table and the signature section */
    page-break-before: always; /* Prevent the section from breaking across pages */
}

.signature {
    flex: 1; /* Each signature section will take equal width */
    margin-right: 20px; /* Space between signature sections */
}

.signature-image {
    position: relative;
}

.signature-img {
    width: 100px;
    height: 50px;
}

.signature-overlay {
    position: absolute;
    bottom: 10px;
    left: 10px;
    background: rgba(0, 0, 0, 0.6);
    color: white;
    padding: 5px;
    font-size: 12px;
}

        .footer {
            margin-top: 20px;
            border-top: 1px dotted black;
            padding-top: 5px;
            text-align: center;
            font-size: 15px;
        }
    </style>
</head>
<body>
  
    <div class="container">
        <h1 class="page-title">Employee Details</h1>

<table class="info-table">
    <?php $rowNumber = 1;
   $clerk = DB::table('users')
    ->leftJoin('organizations', 'users.org_id', '=', 'organizations.id')
    ->leftJoin('departments', 'users.depart_id', '=', 'departments.id')
    ->leftJoin('designations', 'users.design_id', '=', 'designations.id')
    ->where('users.id', $user->clerk_verify_staff) 
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
        <td class="table-cell" style="font-weight: bold;">Changed Name</td>
<td class="table-cell">
    <?php if(!empty($user->after_mar_first_name)): ?>
        <?php echo e($user->after_mar_first_name); ?> <?php echo e($user->after_mar_mid_name); ?> <?php echo e($user->after_mar_last_name); ?>

    <?php else: ?>
        - -
    <?php endif; ?>
</td>

    </tr>


<tr class="table-row">
    <td class="table-cell"><?php echo e($rowNumber++); ?></td>
    <td class="table-cell" style="font-weight: bold;">Caste</td>
    <td class="table-cell"><?php echo e($user->caste ?? '- -'); ?></td>
</tr>

<tr class="table-row">
    <td class="table-cell"><?php echo e($rowNumber++); ?></td>
    <td class="table-cell" style="font-weight: bold;">Gender</td>
    <td class="table-cell"><?php echo e(ucfirst($user->gender ?? '- -')); ?></td>
</tr>

<tr class="table-row">
    <td class="table-cell"><?php echo e($rowNumber++); ?></td>
    <td class="table-cell" style="font-weight: bold;">Address A (Current Address)</td>
    <td class="table-cell"><?php echo e($user->address ?? '- -'); ?></td>
</tr>

<tr class="table-row">
    <td class="table-cell"><?php echo e($rowNumber++); ?></td>
    <td class="table-cell" style="font-weight: bold;">Address B (Swgram Address)</td>
    <td class="table-cell"><?php echo e($user->address_B ?? '- -'); ?></td>
</tr>

<tr class="table-row">
    <td class="table-cell"><?php echo e($rowNumber++); ?></td>
    <td class="table-cell" style="font-weight: bold;">Father's Name</td>
    <td class="table-cell"><?php echo e($user->father_name ?? '- -'); ?></td>
</tr>

<tr class="table-row">
    <td class="table-cell"><?php echo e($rowNumber++); ?></td>
    <td class="table-cell" style="font-weight: bold;">Father's Address</td>
    <td class="table-cell"><?php echo e($user->father_address ?? '- -'); ?></td>
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
    <td class="table-cell" style="font-weight: bold;">Height</td>
    <td class="table-cell"><?php echo e($user->height ?? '- -'); ?></td>
</tr>

<tr class="table-row">
    <td class="table-cell"><?php echo e($rowNumber++); ?></td>
    <td class="table-cell" style="font-weight: bold;">Birth Mark</td>
    <td class="table-cell"><?php echo e($user->birth_mark ?? '- -'); ?></td>
</tr>

<tr class="table-row">
    <td class="table-cell"><?php echo e($rowNumber++); ?></td>
    <td class="table-cell" style="font-weight: bold;">Joining Time Education Qualification</td>
    <td class="table-cell"><?php echo e($user->qualification ?? '- -'); ?></td>
</tr>

<tr class="table-row">
    <td class="table-cell"><?php echo e($rowNumber++); ?></td>
    <td class="table-cell" style="font-weight: bold;">After Joining Education Qualification</td>
    <td class="table-cell"><?php echo e($user->another_qualification ?? '- -'); ?></td>
</tr>

<tr class="table-row">
    <td class="table-cell"><?php echo e($rowNumber++); ?></td>
    <td class="table-cell" style="font-weight: bold;">Joining Date</td>
    <td class="table-cell"><?php echo e($user->joining_date ?? '- -'); ?></td>
</tr>

<tr class="table-row">
    <td class="table-cell"><?php echo e($rowNumber++); ?></td>
    <td class="table-cell" style="font-weight: bold;">Medical Certificate Number</td>
    <td class="table-cell"><?php echo e($user->certificate_no ?? '- -'); ?></td>
</tr>

<tr class="table-row">
    <td class="table-cell"><?php echo e($rowNumber++); ?></td>
    <td class="table-cell" style="font-weight: bold;">Status</td>
    <td class="table-cell"><?php echo e($user->status ?? '- -'); ?></td>
</tr>




</table>





    </div>

</body>
</html><?php /**PATH C:\Users\User\Downloads\eoffice(25-11-2024)\public_html\resources\views/user-profile/app-report.blade.php ENDPATH**/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>USER LEAVE REPORT</title>
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
    margin-left:85px;
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



.signature-overlay p {
    margin: 1px -18px;
    font-size: 9px;
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
    line-height: 0.2;
    margin-top:0px;
    margin-bottom:0px;
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
        <h1 class="page-title">USER LEAVE REPORT</h1>
<div class="header-info" style="border: 1px solid black; padding: 10px; width: 97%;">
    <!-- Logo Section -->
    <table style="width: 100%; border-collapse: collapse;">
        <tr>
            <!-- Logo -->
            <td style="width: 20%; text-align: center; vertical-align: middle;">
                <img src="{{ public_path('images/' . $user->org_logo) }}" alt="Logo" style="height: 70px; max-width: 100%; object-fit: contain;">
            </td>

            <!-- Firm Details -->
            <td style="border-left: 2px solid black; padding-left: 20px; vertical-align: top;">
                <table style="width: 100%;">
<tr>
    <td colspan="3" style="font-weight: bold; text-align: center;">
        Firm Name: {{ $user->org_name }}
    </td>
</tr>
<tr>
    <td colspan="3" style="height: 10px;"></td>
</tr>
                    <tr>
                        <td><strong>State:</strong> {{ $user->state }}</td>
                        <td><strong>District:</strong> {{ $user->district }}</td>
                        <td><strong>Department:</strong> {{ $user->department_name }}</td>
                    </tr>
                    <tr>
                        <td><strong>Taluka:</strong> {{ $user->taluka }}</td>
                        <td><strong>Designation:</strong> {{ $user->designation_name }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>

<table class="info-table">
    @php $rowNumber = 1;
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
    
    
    
      $rejector = DB::table('users')
    ->leftJoin('organizations', 'users.org_id', '=', 'organizations.id')
    ->leftJoin('departments', 'users.depart_id', '=', 'departments.id')
    ->leftJoin('designations', 'users.design_id', '=', 'designations.id')
    ->where('users.id' , $user->rejected_by)
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
    ->where('users.id', $user->user_id) 
    ->select(
        'users.*',
        'organizations.org_name',
        'departments.name as department_name',
        'designations.designation_name'
    )
    ->first();


    
    @endphp 

<tr class="table-row">
    <td class="table-cell">{{ $rowNumber++ }}</td>
    <td class="table-cell" style="font-weight: bold;">User Name</td>
    <td class="table-cell">{{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}</td>
</tr>

    <tr class="table-row">
        <td class="table-cell">{{ $rowNumber++ }}</td>
        <td class="table-cell" style="font-weight: bold;">Leave Starting Date</td>
<td class="table-cell">
    @if (!empty($user->start_date))
        {{ $user->start_date }}
    @else
        - -
    @endif
</td>

    </tr>


<tr class="table-row">
    <td class="table-cell">{{ $rowNumber++ }}</td>
    <td class="table-cell" style="font-weight: bold;">Leave Ending Date</td>
    <td class="table-cell">{{ $user->end_date ?? '- -' }}</td>
</tr>

<tr class="table-row">
    <td class="table-cell">{{ $rowNumber++ }}</td>
    <td class="table-cell" style="font-weight: bold;">Leave Days</td>
    <td class="table-cell">{{ ucfirst($user->leave_days ?? '- -') }}</td>
</tr>

<tr class="table-row">
    <td class="table-cell">{{ $rowNumber++ }}</td>
    <td class="table-cell" style="font-weight: bold;">Do you want to reduce days from available leave?</td>
    <td class="table-cell">{{ $user->reduce_available_leave ?? '- -' }}</td>
</tr>

<tr class="table-row">
    <td class="table-cell">{{ $rowNumber++ }}</td>
    <td class="table-cell" style="font-weight: bold;">Leave category</td>
    <td class="table-cell">{{ $user->leave_category ?? '- -' }}</td>
</tr>

<tr class="table-row">
    <td class="table-cell">{{ $rowNumber++ }}</td>
    <td class="table-cell" style="font-weight: bold;">Leave Description</td>
    <td class="table-cell">{{ $user->description ?? '- -' }}</td>
</tr>

<tr class="table-row">
    <td class="table-cell">{{ $rowNumber++ }}</td>
    <td class="table-cell" style="font-weight: bold;">Available Leaves</td>
    <td class="table-cell">{{ $user->available_leave ?? '- -' }}</td>
</tr>

<tr class="table-row">
    <td class="table-cell">{{ $rowNumber++ }}</td>
    <td class="table-cell" style="font-weight: bold;">Leave applied startind date</td>
    <td class="table-cell">{{ $user->apply_start_date ?? '- -' }}</td>
</tr>

<tr class="table-row">
    <td class="table-cell">{{ $rowNumber++ }}</td>
    <td class="table-cell" style="font-weight: bold;">Leave applied ending date</td>
    <td class="table-cell">{{ $user->apply_end_date ?? '- -' }}</td>
</tr>

<?php
$staff_name = DB::table('users')
    ->where('users.id', $user->hod_verify_staff) // Specify 'users.id' to avoid ambiguity
    ->leftJoin('departments', 'users.depart_id', '=', 'departments.id')
    ->leftJoin('designations', 'users.design_id', '=', 'designations.id')
    ->select(
        'users.*',
        'departments.name as department_name',
        'designations.designation_name'
    )
    ->first();
?>


@if($user->leavestatus == 'approved' && isset($user->hod_verify_staff))
<tr class="table-row">
    <td class="table-cell">{{ $rowNumber++ }}</td>
    <td class="table-cell" style="font-weight: bold;">Leave approved by</td>
    <td class="table-cell">{{ $staff_name->first_name }} {{ $staff_name->middle_name }} {{ $staff_name->last_name }} - 
    {{ $staff_name->department_name }}- 
    {{ $staff_name->designation_name }} </td>
</tr>
@endif

<tr class="table-row">
    <td class="table-cell">{{ $rowNumber++ }}</td>
    <td class="table-cell" style="font-weight: bold;">Leave status</td>
    <td class="table-cell">
        
        
        

          @if ($user->leavestatus == 'approved_clerk')
    <span class="status approved_clerk" style=" background-color: #e4e48a !important;
    color: #7a160e;">Pending from HOD</span>
@elseif ($user->leavestatus == 'pending')
    <span class="status pending" style=" background-color: orange !important;">PENDING</span>
@elseif ($user->leavestatus == 'approved')
    <span class="status approved" style=" background-color: #a3e1a3 !important;
    color:green;">APPROVED</span>
@elseif ($user->leavestatus == 'rejected')
    <span class="status rejected" style=" background-color: #e6c4c4 !important;
    color: #e63434;">REJECTED</span>
@endif
 
        
        
        
        </td>
</tr>




@if(
    $user->leavestatus == 'rejected' && $user->rejected_by
)
<tr class="table-row">
    <td class="table-cell">{{ $rowNumber++ }}</td>
    <td class="table-cell" style="font-weight: bold;">Leave rejected by</td>
    <td class="table-cell">
            {{ $rejector->first_name }} {{ $rejector->middle_name }} {{ $rejector->last_name }}
    </td>
</tr>


<tr class="table-row">
    <td class="table-cell">{{ $rowNumber++ }}</td>
    <td class="table-cell" style="font-weight: bold;">Leave rejected  description</td>
    <td class="table-cell"> {{ $user->reject_description }}</td>
</tr>


@endif





@if(
    $user->leavestatus == 'approved'
)
<tr class="table-row">
    <td class="table-cell">
    </td>
    <td class="table-cell" colspan="2" style="padding: 10px 0 10px 10px;">
        <div style="font-weight: bold; font-size: 14px; margin-bottom: 5px;">
            Leave Note
        </div>
        <div style="font-size: 14px; color: #333; line-height: 1.6;">
            {!! strip_tags($user->leavenote, '<b><i><u><strong><em><br>') !!}
        </div>
    </td>
</tr>




@endif




<!--<tr class="table-row">-->
<!--    <td class="table-cell">{{ $rowNumber++ }}</td>-->
<!--    <td class="table-cell" style="font-weight: bold;">Birth Mark</td>-->
<!--    <td class="table-cell">{{ $user->birth_mark ?? '- -' }}</td>-->
<!--</tr>-->

<!--<tr class="table-row">-->
<!--    <td class="table-cell">{{ $rowNumber++ }}</td>-->
<!--    <td class="table-cell" style="font-weight: bold;">Joining Time Education Qualification</td>-->
<!--    <td class="table-cell">{{ $user->qualification ?? '- -' }}</td>-->
<!--</tr>-->

<!--<tr class="table-row">-->
<!--    <td class="table-cell">{{ $rowNumber++ }}</td>-->
<!--    <td class="table-cell" style="font-weight: bold;">After Joining Education Qualification</td>-->
<!--    <td class="table-cell">{{ $user->another_qualification ?? '- -' }}</td>-->
<!--</tr>-->

<!--<tr class="table-row">-->
<!--    <td class="table-cell">{{ $rowNumber++ }}</td>-->
<!--    <td class="table-cell" style="font-weight: bold;">Joining Date</td>-->
<!--    <td class="table-cell">{{ $user->joining_date ?? '- -' }}</td>-->
<!--</tr>-->

<!--<tr class="table-row">-->
<!--    <td class="table-cell">{{ $rowNumber++ }}</td>-->
<!--    <td class="table-cell" style="font-weight: bold;">Medical Certificate Number</td>-->
<!--    <td class="table-cell">{{ $user->certificate_no ?? '- -' }}</td>-->
<!--</tr>-->

<!--<tr class="table-row">-->
<!--    <td class="table-cell">{{ $rowNumber++ }}</td>-->
<!--    <td class="table-cell" style="font-weight: bold;">Status</td>-->
<!--    <td class="table-cell">{{ $user->status ?? '- -' }}</td>-->
<!--</tr>-->




</table>


<div class="signature-section">

  
    @if(isset($clerk))
        <div class="signature">
            <div class="signature-image">
                @if($user->clerk_verify_staff)
<img src="{{ public_path('checkmark.png') }}" alt="Rejected Signature" class="signature-img">
                @elseif($user->rejected_by)
            <img src="{{ public_path('crossred2.png') }}" alt="Rejected Signature" class="signature-img">
                @endif
                <div class="signature-overlay">
                    <p>{{ $clerk->first_name }} {{ $clerk->middle_name }} {{ $clerk->last_name }}</p>
                    <p>
                        {{ $clerk->district }} - {{ $clerk->org_name }}
                        {{ $clerk->taluka ? '- ' . $clerk->taluka : '' }}
                    </p>
                    <p>{{ $clerk->department_name }} - {{ $clerk->designation_name }}</p>
                    <p>{{ $user->clerk_create }}</p>
                </div>
            </div>
                        <h6 style=" margin-top:5px;
    margin-bottom:0px;">Clerk Digital Signature</h6>

        </div>
    @endif

   @if(isset($hod) && $user->clerk_verify_staff) 
        <div class="signature">
            <div class="signature-image">
                @if($user->hod_verify_staff)
<img src="{{ public_path('checkmark.png') }}" alt="Rejected Signature" class="signature-img">
                @else
            <img src="{{ public_path('crossred2.png') }}" alt="Rejected Signature" class="signature-img">
                @endif

                <div class="signature-overlay">
                    <p>{{ $hod->first_name }} {{ $hod->middle_name }} {{ $hod->last_name }}</p>
                    <p>
                        {{ $hod->district }} - {{ $hod->org_name }}
                        {{ $hod->taluka ? '- ' . $hod->taluka : '' }}
                    </p>
                    <p>{{ $hod->department_name }} - {{ $hod->designation_name }}</p>
                    <p>{{ $user->hod_create }}</p>
                </div>
                                        <h6 style=" margin-top:5px;
    margin-bottom:0px;">HOD Digital Signature</h6>

            </div>

        </div>
    @endif

</div>

       
    </div>

</body>
</html>
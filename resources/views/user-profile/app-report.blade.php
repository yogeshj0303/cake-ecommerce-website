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


  .footer {
            margin-top: 20px;
            border-top: 1px dotted black;
            padding-top: 5px;
            text-align: center;
            font-size: 15px;
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
  
    <div class="container">
        <h1 class="page-title">User Details</h1>

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


    
    @endphp 

<tr class="table-row">
    <td class="table-cell">{{ $rowNumber++ }}</td>
    <td class="table-cell" style="font-weight: bold;">Profile Name</td>
    <td class="table-cell">{{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}</td>
</tr>

    <tr class="table-row">
        <td class="table-cell">{{ $rowNumber++ }}</td>
        <td class="table-cell" style="font-weight: bold;">Changed Name</td>
<td class="table-cell">
    @if (!empty($user->after_mar_first_name))
        {{ $user->after_mar_first_name }} {{ $user->after_mar_mid_name }} {{ $user->after_mar_last_name }}
    @else
        - -
    @endif
</td>

    </tr>


<tr class="table-row">
    <td class="table-cell">{{ $rowNumber++ }}</td>
    <td class="table-cell" style="font-weight: bold;">Caste</td>
    <td class="table-cell">{{ $user->caste ?? '- -' }}</td>
</tr>

<tr class="table-row">
    <td class="table-cell">{{ $rowNumber++ }}</td>
    <td class="table-cell" style="font-weight: bold;">Gender</td>
    <td class="table-cell">{{ ucfirst($user->gender ?? '- -') }}</td>
</tr>

<tr class="table-row">
    <td class="table-cell">{{ $rowNumber++ }}</td>
    <td class="table-cell" style="font-weight: bold;">Address A (Current Address)</td>
    <td class="table-cell">{{ $user->address ?? '- -' }}</td>
</tr>

<tr class="table-row">
    <td class="table-cell">{{ $rowNumber++ }}</td>
    <td class="table-cell" style="font-weight: bold;">Address B (Swgram Address)</td>
    <td class="table-cell">{{ $user->address_B ?? '- -' }}</td>
</tr>

<tr class="table-row">
    <td class="table-cell">{{ $rowNumber++ }}</td>
    <td class="table-cell" style="font-weight: bold;">Father's Name</td>
    <td class="table-cell">{{ $user->father_name ?? '- -' }}</td>
</tr>

<tr class="table-row">
    <td class="table-cell">{{ $rowNumber++ }}</td>
    <td class="table-cell" style="font-weight: bold;">Father's Address</td>
    <td class="table-cell">{{ $user->father_address ?? '- -' }}</td>
</tr>

<tr class="table-row">
    <td class="table-cell">{{ $rowNumber++ }}</td>
    <td class="table-cell" style="font-weight: bold;">Birth Date</td>
    <td class="table-cell">{{ $user->birth_date ?? '- -' }}</td>
</tr>

<tr class="table-row">
    <td class="table-cell">{{ $rowNumber++ }}</td>
    <td class="table-cell" style="font-weight: bold;">Birth Date in Text</td>
    <td class="table-cell">{{ $user->birth_text ?? '- -' }}</td>
</tr>

<tr class="table-row">
    <td class="table-cell">{{ $rowNumber++ }}</td>
    <td class="table-cell" style="font-weight: bold;">Height</td>
    <td class="table-cell">{{ $user->height ?? '- -' }}</td>
</tr>

<tr class="table-row">
    <td class="table-cell">{{ $rowNumber++ }}</td>
    <td class="table-cell" style="font-weight: bold;">Birth Mark</td>
    <td class="table-cell">{{ $user->birth_mark ?? '- -' }}</td>
</tr>

<tr class="table-row">
    <td class="table-cell">{{ $rowNumber++ }}</td>
    <td class="table-cell" style="font-weight: bold;">Joining Time Education Qualification</td>
    <td class="table-cell">{{ $user->qualification ?? '- -' }}</td>
</tr>

<tr class="table-row">
    <td class="table-cell">{{ $rowNumber++ }}</td>
    <td class="table-cell" style="font-weight: bold;">After Joining Education Qualification</td>
    <td class="table-cell">{{ $user->another_qualification ?? '- -' }}</td>
</tr>

<tr class="table-row">
    <td class="table-cell">{{ $rowNumber++ }}</td>
    <td class="table-cell" style="font-weight: bold;">Joining Date</td>
    <td class="table-cell">{{ $user->joining_date ?? '- -' }}</td>
</tr>

<tr class="table-row">
    <td class="table-cell">{{ $rowNumber++ }}</td>
    <td class="table-cell" style="font-weight: bold;">Medical Certificate Number</td>
    <td class="table-cell">{{ $user->certificate_no ?? '- -' }}</td>
</tr>

<tr class="table-row">
    <td class="table-cell">{{ $rowNumber++ }}</td>
    <td class="table-cell" style="font-weight: bold;">Status</td>
    <td class="table-cell">
   @if ($user->status == 'approved_clerk')
    <span class="status approved_clerk" style=" background-color: #e4e48a !important;
    color: #7a160e;">Pending from HOD</span>
@elseif ($user->status == 'pending')
    <span class="status pending" style=" background-color: yellow !important; color:orange">PENDING</span>
@elseif ($user->status == 'approved')
    <span class="status approved" style=" background-color: #a3e1a3 !important;
    color:green;">APPROVED</span>
@elseif ($user->status == 'rejected')
    <span class="status rejected" style=" background-color: #e6c4c4 !important;
    color: #e63434;">REJECTED</span>
@endif
       </td>
</tr>




</table>

    
<!--<div class="signature-section">-->

<!--    @if(isset($user_verify))-->
<!--        <div class="signature">-->
<!--            <div class="signature-image">-->
<!--<img src="{{ public_path('checkmark.png') }}" alt="Rejected Signature" class="signature-img">-->
<!--                <div class="signature-overlay">-->
<!--                    <p>{{ $user_verify->first_name }} {{ $user_verify->middle_name }} {{ $user_verify->last_name }}</p>-->
<!--                    <p>-->
<!--                        {{ $user_verify->district }} - {{ $user_verify->org_name }}-->
<!--                        {{ $user_verify->taluka ? '- ' . $user_verify->taluka : '' }}-->
<!--                    </p>-->
<!--                    <p>{{ $user_verify->department_name }} - {{ $user_verify->designation_name }}</p>-->
<!--                    <p>{{ $user_verify->user_create }}</p>-->
<!--                </div>-->
<!--            </div>-->
            
<!--                        <h6>User Digital Signature</h6>-->

<!--        </div>-->
<!--    @endif-->

<!-- @if(isset($clerk))-->
<!--    <div class="signature">-->
<!--        <div class="signature-image">-->
<!--            @if($user->clerk_verify_staff)-->
<!--<img src="{{ public_path('checkmark.png') }}" alt="Rejected Signature" class="signature-img">-->
<!--            @elseif($user->rejected_by)-->
<!--            <img src="{{ public_path('crossred2.png') }}" alt="Rejected Signature" class="signature-img">-->

<!--            @endif-->

<!--            <div class="signature-overlay">-->
<!--                <p>{{ $clerk->first_name }} {{ $clerk->middle_name }} {{ $clerk->last_name }}</p>-->
<!--                <p>-->
<!--                    {{ $clerk->district }} - {{ $clerk->org_name }}-->
<!--                    {{ $clerk->taluka ? '- ' . $clerk->taluka : '' }}-->
<!--                </p>-->
<!--                <p>{{ $clerk->department_name }} - {{ $clerk->designation_name }}</p>-->
<!--                <p>{{ $user->clerk_create }}</p>-->
<!--            </div>-->
<!--        </div>-->
<!--                <h6>Clerk Digital Signature</h6>-->

<!--    </div>-->
<!--@endif-->

<!--    @if(isset($hod) && $user->clerk_verify_staff)-->
<!--        <div class="signature">-->
<!--            <div class="signature-image">-->
<!--            @if($user->hod_verify_staff)-->
<!--<img src="{{ public_path('checkmark.png') }}" alt="Rejected Signature" class="signature-img">-->
<!--            @else($user->rejected_by)-->
<!--            <img src="{{ public_path('crossred2.png') }}" alt="Rejected Signature" class="signature-img">-->
<!--                                @endif-->

<!--                            <div class="signature-overlay">-->
<!--                    <p>{{ $hod->first_name }} {{ $hod->middle_name }} {{ $hod->last_name }}</p>-->
<!--                    <p>-->
<!--                        {{ $hod->district }} - {{ $hod->org_name }}-->
<!--                        {{ $hod->taluka ? '- ' . $hod->taluka : '' }}-->
<!--                    </p>-->
<!--                    <p>{{ $hod->department_name }} - {{ $hod->designation_name }}</p>-->
<!--                    <p>{{ $user->hod_create }}</p>-->
<!--                </div>-->
<!--            </div>-->
<!--                        <h6>HOD Digital Signature</h6>-->

<!--        </div>-->
<!--    @endif-->


<!--</div>-->

<div class="signature-section">

    @if(isset($user_verify))
        <div class="signature">
            <div class="signature-image">
<img src="{{ public_path('checkmark.png') }}" alt="Rejected Signature" class="signature-img">
                <div class="signature-overlay">
                    <p>{{ $user_verify->first_name }} {{ $user_verify->middle_name }} {{ $user_verify->last_name }}</p>
                    <p>
                        {{ $user_verify->district }} - {{ $user_verify->org_name }}
                        {{ $user_verify->taluka ? '- ' . $user_verify->taluka : '' }}
                    </p>
                    <p>{{ $user_verify->department_name }} - {{ $user_verify->designation_name }}</p>
                    <p>{{ $user_verify->user_create }}</p>
                </div>
            </div>
            
                        <h6>User Digital Signature</h6>

        </div>
    @endif

 @if(isset($clerk))
    <div class="signature">
        <div class="signature-image">
            @if($user->clerk_verify_staff)
<img src="{{ public_path('checkmark.png') }}" alt="Rejected Signature" class="signature-img">
            @elseif($user->rejected_by)
<img src="{{ public_path('checkmark.png') }}" alt="Rejected Signature" class="signature-img">

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
                <h6>Clerk Digital Signature</h6>

    </div>
@endif

    @if(isset($hod) && $user->clerk_verify_staff)
        <div class="signature">
            <div class="signature-image">
            @if($user->hod_verify_staff)
<img src="{{ public_path('checkmark.png') }}" alt="Rejected Signature" class="signature-img">
            @else($user->rejected_by)
<img src="{{ public_path('checkmark.png') }}" alt="Rejected Signature" class="signature-img">
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
            </div>
                        <h6>HOD Digital Signature</h6>

        </div>
    @endif


</div>


{{-- 
        <div class="footer">
            टीप - या पृष्ठावरील नोंदीस निवडीन प्रत्येक पाच वर्षानंतर पुन्हा नव्याने करणे आवश्यक.<br>
            Note - The entries in this page should be renewed or re-attested at least every five years.
        </div> --}}
    </div>

</body>
</html>
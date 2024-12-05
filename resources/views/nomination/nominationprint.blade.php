<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>USER NOMINATION REPORT</title>
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
    margin-left:5px;
    margin-right: 5px; /* Adds spacing between divs */ 
}

.signature-image {
    position: relative;
    text-align: center;
    display: inline-block;
}

.signature-img {
    width: 80px; /* Adjust image size as needed */
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



 .signature-section {
    display: flex;
    justify-content: space-between;
    padding: 10px;
            flex-wrap: wrap

    
}



.signature-two {
    flex: 1;
    padding-left: 52px;
    padding-top: 20px;

    
}

.signature-image-two {
    position: relative;
    text-align: center;
    display: inline-block;
}

.signature-img-two {
    width: 80px; /* Adjust image size as needed */
    height: 49px; /* Adjust image size as needed */
    object-fit: contain;
}

.signature-overlay-two {
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
.signature-two h6 {
   margin-left: -12px;
    font-size: 12px;
    line-height: 0.2;
}

.signature-section-two{
    display:flex;
}



.signature-overlay-two p {
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


.logo {
    display: flex;
    margin-top: 25px;
    justify-content: center; /* Centers the content horizontally */
    align-items: center; /* Centers the content vertically */
    height: 100%; /* Ensures full height of the container is used */
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

.row div {
    padding:9px;
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
            flex-wrap: wrap

    
}

 .logo {
    display: flex;
    margin-top: 25px;
    justify-content: center; /* Centers the content horizontally */
    align-items: center; /* Centers the content vertically */
    height: 100%; /* Ensures full height of the container is used */
}

.logo img {
    height: 30px; /* Keep the logo size as desired */
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
    width: 80px; /* Adjust image size as needed */
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



 .signature-section {
    display: flex;
    justify-content: space-between;
    padding: 10px;
            flex-wrap: wrap

    
}



.signature-two {
    flex: 1;
    padding-left: 52px;
    padding-top: 20px;

    
}

.signature-image-two {
    position: relative;
    text-align: center;
    display: inline-block;
}

.signature-img-two {
    width: 102px; /* Adjust image size as needed */
    height: 49px; /* Adjust image size as needed */
    object-fit: contain;
}

.signature-overlay-two {
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
.signature-two h6 {
   margin-left: -12px;
    font-size: 12px;
    line-height: 0.2;
}

.signature-section-two{
    display:flex;
}



.signature-overlay-two p {
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
        <h1 class="page-title">USER NOMINATION REPORT</h1>
        

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
    
<table class="info-table">
    

<tr class="table-row">
    <td class="table-cell">{{ $rowNumber++ }}</td>
    <td class="table-cell" style="font-weight: bold;">User Name</td>
    <td class="table-cell">{{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}</td>
</tr>

  
<tr class="table-row">
    <td class="table-cell">{{ $rowNumber++ }}</td>
    <td class="table-cell" style="font-weight: bold;">position</td>
    <td class="table-cell">{{ $user->position ?? '- -' }}</td>
</tr>

<tr class="table-row">
    <td class="table-cell">{{ $rowNumber++ }}</td>
    <td class="table-cell" style="font-weight: bold;">Birth Date</td>
    <td class="table-cell">{{ ucfirst($user->birth_date ?? '- -') }}</td>
</tr>

<tr class="table-row">
    <td class="table-cell">{{ $rowNumber++ }}</td>
    <td class="table-cell" style="font-weight: bold;">Joining Date</td>
    <td class="table-cell">{{ $user->join_date ?? '- -' }}</td>
</tr>


<tr class="table-row">
    <td class="table-cell">{{ $rowNumber++ }}</td>
    <td class="table-cell" style="font-weight: bold;">Nomination Status</td>
    <td class="table-cell">
        
        

            @if ($user->nominationstatus == 'approved_clerk')
    <span class="status approved_clerk" style=" background-color: #e4e48a !important;
    color: #7a160e;">Pending from HOD</span>
@elseif ($user->nominationstatus == 'pending')
    <span class="status pending" style=" background-color: orange !important;">PENDING</span>
@elseif ($user->nominationstatus == 'approved')
    <span class="status approved" style=" background-color: #a3e1a3 !important;
    color:green;">APPROVED</span>
@elseif ($user->nominationstatus == 'rejected')
    <span class="status rejected" style=" background-color: #e6c4c4 !important;
    color: #e63434;">REJECTED</span>
@endif
    

        
        </td>
</tr>


@if ($user->nominationstatus == 'rejected')
<tr class="table-row">
    <td class="table-cell">{{ $rowNumber++ }}</td>
    <td class="table-cell" style="font-weight: bold;">Reject description</td>
    <td class="table-cell">{{ $user->reject_description ?? '- -' }}</td>
</tr>
@endif








</table>
<h1 style="margin-top:20px"></h1>

<div style="margin-top: 10px; padding: 10px; font-size: 14px; color: black; border: 1px solid #ddd; border-radius: 5px; background-color: #f9f9f9;">
        Each nominee listed below has been recognized for their exceptional contributions and dedication. 
    This summary highlights their achievements and the impact they've made in their respective areas. 
    Explore the details to learn more about their roles and relationships.
</div>


@foreach ($nominee as $index => $detail)
<table class="info-table" style="margin-bottom: 10px; width: 100%; border-collapse: collapse; table-layout: fixed;">
    <thead>
        <tr>
            <th colspan="2" style="text-align: left; background-color: #f4f4f4; border: 1px solid black;">
                {{ $detail->nominee_type }} Nominee
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="table-cell" style="font-weight: bold; border: 1px solid black; width: 50%;">Nominee Name</td>
            <td class="table-cell" style="border: 1px solid black; width: 50%;">{{ $detail->nominee_name ?? '- -' }}</td>
        </tr>
        <tr>
            <td class="table-cell" style="font-weight: bold; border: 1px solid black;">Date of Birth</td>
            <td class="table-cell" style="border: 1px solid black;">{{ $detail->nominee_dob ?? '- -' }}</td>
        </tr>
        <tr>
            <td class="table-cell" style="font-weight: bold; border: 1px solid black;">Age</td>
            <td class="table-cell" style="border: 1px solid black;">{{ $detail->nominee_age ?? '- -' }}</td>
        </tr>
        <tr>
            <td class="table-cell" style="font-weight: bold; border: 1px solid black;">Atypical Event</td>
            <td class="table-cell" style="border: 1px solid black;">{{ $detail->atypical_event ?? '- -' }}</td>
        </tr>
        <tr>
            <td class="table-cell" style="font-weight: bold; border: 1px solid black;">Relationship</td>
            <td class="table-cell" style="border: 1px solid black;">{{ $detail->relationship_nominee ?? '- -' }}</td>
        </tr>
    </tbody>
</table>
@endforeach

<div class="signature-section" style="margin-top:70px">

        <div class="signature">
            <div class="signature-image">
                <img src="{{ public_path('checkmark.png') }}" alt="User Signature" class="signature-img">
                <div class="signature-overlay">
                    <p>{{ $user->witness_first_name }}</p>
                    <p>{{ $user->witness_first_create }}</p>
                </div>
            </div>
                        <h6 style=" margin-top:5px;
    margin-bottom:0px;">Witness first Signature</h6>

        </div>


 <div class="signature">
            <div class="signature-image">
                <img src="{{ public_path('checkmark.png') }}" alt="User Signature" class="signature-img">
                <div class="signature-overlay">
                    <p>{{ $user->witness_second_name }}</p>
                    <p>{{ $user->witness_second_create }}</p>
                </div>
            </div>
                        <h6 style=" margin-top:5px;
    margin-bottom:0px;">Witness Second Signature</h6>

        </div>

    
    <!--@if(isset($user_verify))-->
    <!--    <div class="signature">-->
    <!--        <div class="signature-image">-->
    <!--            <img src="{{ public_path('checkmark.png') }}" alt="User Signature" class="signature-img">-->
    <!--            <div class="signature-overlay">-->
    <!--                <p>{{ $user_verify->first_name }} {{ $user_verify->middle_name }} {{ $user_verify->last_name }}</p>-->
    <!--                <p>-->
    <!--                    {{ $user_verify->district }} - {{ $user_verify->org_name }}-->
    <!--                    {{ $user_verify->taluka ? '- ' . $user_verify->taluka : '' }}-->
    <!--                </p>-->
    <!--                <p>{{ $user_verify->department_name }} - {{ $user_verify->designation_name }}</p>-->
    <!--                <p>{{ $user_verify->user_create }}</p>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--                    <h6>User Digital Signature</h6>-->

    <!--    </div>-->
    <!--@endif-->
    



  @if(isset($clerk))
        <div class="signature">
            <div class="signature-image">
                @if($user->clerk_verify_staff)
                    <img src="{{ public_path('checkmark.png') }}" alt="Approved Signature" class="signature-img">
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
                                        <h6 style=" margin-top:5px;
    margin-bottom:0px;">Clerk Digital Signature</h6>

            </div>

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
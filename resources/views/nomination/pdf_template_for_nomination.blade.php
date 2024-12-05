<!DOCTYPE html>
<html>
<head>
    <title>Nomination Report</title>
    <style>
        /* Add some styling */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
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
    <h2 style="text-align:center">NOMINATION REPORT </h2>
    <table>
        <thead>
            <tr>
                <th>Nomination Type</th>
                 <th>Position</th>
                
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($nominations as $nomination)
            
            @php $rowNumber = 1;
   $clerk = DB::table('users')
    ->leftJoin('organizations', 'users.org_id', '=', 'organizations.id')
    ->leftJoin('departments', 'users.depart_id', '=', 'departments.id')
    ->leftJoin('designations', 'users.design_id', '=', 'designations.id')
    ->where('users.id', $nomination->clerk_verify_staff) 
    ->orwhere('users.id' , $nomination->rejected_by)
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
    ->where('users.id' , $nomination->rejected_by)
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
    ->where('users.id', $nomination->hod_verify_staff) 
        ->orwhere('users.id' , $nomination->rejected_by)

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
    ->where('users.id', $nomination->user_id) 
    ->select(
        'users.*',
        'organizations.org_name',
        'departments.name as department_name',
        'designations.designation_name'
    )
    ->first();




    
    @endphp 

                <tr>
                    <td>{{ $nomination->nomination_type }}</td>
                    <td>{{ $nomination->position }}</td>
<td class="table-cell">
        
        
        

          @if ($nomination->status == 'approved_clerk')
    <span class="status approved_clerk" style=" background-color: #e4e48a !important;
    color: #7a160e;">Pending from HOD</span>
@elseif ($nomination->status == 'pending')
    <span class="status pending" style=" background-color: yellow !important; color:orange">PENDING</span>
@elseif ($nomination->status == 'approved')
    <span class="status approved" style=" background-color: #a3e1a3 !important;
    color:green; font-size:15px">APPROVED</span>
@elseif ($nomination->status == 'rejected')
    <span class="status rejected" style=" background-color: #e6c4c4 !important;
    color: #e63434;">REJECTED</span>
@endif
 
        
        
        
        </td>  
                  </tr>
            @endforeach
        </tbody>
    </table>
                <!--@foreach($nominations as $nomination)-->

<!--    <div class="signature-section" style="margin-top:70px">-->

<!--        <div class="signature">-->
<!--            <h6>Witness first Signature</h6>-->
<!--            <div class="signature-image">-->
<!--<img src="{{ public_path('checkmark.png') }}" alt="Rejected Signature" class="signature-img">-->
<!--                <div class="signature-overlay">-->
<!--                    <p>{{ $nomination->witness_first_name }}</p>-->
<!--                    <p>{{ $nomination->witness_first_create }}</p>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->


<!-- <div class="signature">-->
<!--            <h6>Witness Second Signature</h6>-->
<!--            <div class="signature-image">-->
<!--<img src="{{ public_path('checkmark.png') }}" alt="Rejected Signature" class="signature-img">-->
<!--                <div class="signature-overlay">-->
<!--                    <p>{{ $nomination->witness_second_name }}</p>-->
<!--                    <p>{{ $nomination->witness_second_create }}</p>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->

<!--                @endforeach-->

<!-- @if(isset($clerk))-->
<!--        <div class="signature-two">-->
<!--            <h6>Clerk Digital Signature</h6>-->
<!--            <div class="signature-image-two">-->
<!--                @if($user->clerk_verify_staff)-->
<!--<img src="{{ public_path('checkmark.png') }}" alt="Rejected Signature" class="signature-img">-->
<!--                @elseif($user->rejected_by)-->
<!--<img src="{{ public_path('checkmark.png') }}" alt="Rejected Signature" class="signature-img">-->
<!--                @endif-->
<!--                <div class="signature-overlay-two">-->
<!--                    <p>{{ $clerk->first_name }} {{ $clerk->middle_name }} {{ $clerk->last_name }}</p>-->
<!--                    <p>-->
<!--                        {{ $clerk->district }} - {{ $clerk->org_name }}-->
<!--                        {{ $clerk->taluka ? '- ' . $clerk->taluka : '' }}-->
<!--                    </p>-->
<!--                    <p>{{ $clerk->department_name }} - {{ $clerk->designation_name }}</p>-->
<!--                    <p>{{ $user->clerk_create }}</p>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    @endif-->

<!--   @if(isset($hod) && $user->clerk_verify_staff) -->
<!--        <div class="signature-two hod-digital-signature" style="margin-left: -190px;">-->

<!--            <h6>HOD Digital Signature</h6>-->
<!--            <div class="signature-image-two">-->
<!--                @if($user->hod_verify_staff)-->
<!--<img src="{{ public_path('checkmark.png') }}" alt="Rejected Signature" class="signature-img">-->
<!--                @else-->
<!--<img src="{{ public_path('checkmark.png') }}" alt="Rejected Signature" class="signature-img">-->
<!--                @endif-->

<!--                <div class="signature-overlay-two  hod-digital-signature" style="margin-left: -20px;">-->

<!--                    <p>{{ $hod->first_name }} {{ $hod->middle_name }} {{ $hod->last_name }}</p>-->
<!--                    <p>-->
<!--                        {{ $hod->district }} - {{ $hod->org_name }}-->
<!--                        {{ $hod->taluka ? '- ' . $hod->taluka : '' }}-->
<!--                    </p>-->
<!--                    <p>{{ $hod->department_name }} - {{ $hod->designation_name }}</p>-->
<!--                    <p>{{ $user->hod_create }}</p>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    @endif-->
<!--    </div>-->

</body>
</html>

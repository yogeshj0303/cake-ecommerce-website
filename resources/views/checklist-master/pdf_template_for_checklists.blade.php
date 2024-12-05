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
    
  @php
    $checklistss = $checklists->first();
@endphp

<div class="header-info" style="border: 1px solid black; padding: 10px; width: 97%;">
    <!-- Logo Section -->
    <table style="width: 100%; border-collapse: collapse;">
        <tr>
            <!-- Logo -->
            <td style="width: 20%; text-align: center; vertical-align: middle;">
                @if(isset($checklistss) && isset($checklistss->org_logo))
                    <img src="{{ public_path('images/' . $checklistss->org_logo) }}" alt="Logo" style="height: 70px; max-width: 100%; object-fit: contain;">
                @endif
            </td>

            <!-- Firm Details -->
            <td style="border-left: 2px solid black; padding-left: 5px; padding-right: 5px; vertical-align: top;">
                <table style="width: 100%;">
                    <tr>
                        <td colspan="3" style="font-weight: bold; text-align: center;">
                            @if(isset($checklistss) && isset($checklistss->org_name))
                                Firm Name: {{ $checklistss->org_name }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="height: 10px;"></td>
                    </tr>
                    <tr>
                        <td>
                            @if(isset($checklistss) && isset($checklistss->state))
                                <strong>State:</strong> {{ $checklistss->state }}
                            @endif
                        </td>
                        <td>
                            @if(isset($checklistss) && isset($checklistss->district))
                                <strong>District:</strong> {{ $checklistss->district }}
                            @endif
                        </td>
                        <td>
                            @if(isset($checklistss) && isset($checklistss->department_name))
                                <strong>Department:</strong> {{ $checklistss->department_name }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>
                            @if(isset($checklistss) && isset($checklistss->taluka))
                                <strong>Taluka:</strong> {{ $checklistss->taluka }}
                            @endif
                        </td>
                        <td>
                            @if(isset($checklistss) && isset($checklistss->designation_name))
                                <strong>Designation:</strong> {{ $checklistss->designation_name }}
                            @endif
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
        @foreach($checklists as $checklist)
    <tr>
        <td>{{ $checklist->checklist_name }}</td>
        <td>{{ $checklist->process_status }}</td>
        <td>{{ $checklist->receipt_no ? $checklist->receipt_no : '--' }}</td>
        <td>{{ $checklist->receipt_process_status }}</td>
          <td class="">
        
        
        

@if ($checklist->Status == 'pending')
    <span class="status pending" style="background-color: yellow !important; color:orange ; font-size:14px">PENDING</span>
@elseif ($checklist->Status == 'Approved')
    <span class="status approved" style=" background-color: #a3e1a3 !important;
    color:green; font-size:15px">APPROVED</span>
@elseif ($checklist->Status == 'Rejected')
    <span class="status rejected" style=" background-color: #e6c4c4 !important;
    color: #e63434; font-size:14px">REJECTED</span>
@endif
 
        
        
        
        </td>
        
        
        
    </tr>
@endforeach

        </tbody>
    </table>
</body>
</html>

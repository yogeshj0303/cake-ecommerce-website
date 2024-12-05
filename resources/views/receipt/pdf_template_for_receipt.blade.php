<!DOCTYPE html>
<html>
<head>
    <title>Receipt Report</title>
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
    <h2 style="text-align:center">RECEIPT REPORT </h2>
    
  @php
    $receiptss = $receipts->first(); 
@endphp

<div class="header-info" style="border: 1px solid black; padding: 10px; width: 97%;">
    <!-- Logo Section -->
    <table style="width: 100%; border-collapse: collapse;">
        <tr>
            <!-- Logo -->
            <td style="width: 20%; text-align: center; vertical-align: middle;">
                @if(isset($receiptss) && isset($receiptss->org_logo))
                    <img src="{{ public_path('images/' . $receiptss->org_logo) }}" alt="Logo" style="height: 70px; max-width: 100%; object-fit: contain;">
                @endif
            </td>

            <!-- Firm Details -->
            <td style="border-left: 2px solid black; vertical-align: top; padding-left: 5px; padding-right: 5px;">
                <table style="width: 100%;">
                    <tr>
                        <td colspan="3" style="font-weight: bold; text-align: center;">
                            @if(isset($receiptss) && isset($receiptss->org_name))
                                Firm Name: {{ $receiptss->org_name }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="height: 10px;"></td>
                    </tr>
                    <tr>
                        <td>
                            @if(isset($receiptss) && isset($receiptss->state_name))
                                <strong>State:</strong> {{ $receiptss->state_name }}
                            @endif
                        </td>
                        <td>
                            @if(isset($receiptss) && isset($receiptss->district_name))
                                <strong>District:</strong> {{ $receiptss->district_name }}
                            @endif
                        </td>
                        <td>
                            @if(isset($receiptss) && isset($receiptss->department_name))
                                <strong>Department:</strong> {{ $receiptss->department_name }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>
                            @if(isset($receiptss) && isset($receiptss->usertaluka))
                                <strong>Taluka:</strong> {{ $receiptss->usertaluka }}
                            @endif
                        </td>
                        <td>
                            @if(isset($receiptss) && isset($receiptss->designation_name))
                                <strong>Designation:</strong> {{ $receiptss->designation_name }}
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
                  <th>Receipt Name</th>
                <th>Receipt No</th>
                 <th>Receipt Subject</th>
                 
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
        @foreach($receipts as $receipt)
    <tr>
        <td>{{ $receipt->receipt_checklist_id }}</td>
        <td>{{ $receipt->receipt_no }}</td>
        <td>{{ $receipt->subject}}</td>
        <td>


          @if ($receipt->status == 'approved_clerk')
    <span class="status approved_clerk" style=" background-color: #e4e48a !important;
    color: #7a160e;">Pending from HOD</span>
@elseif ($receipt->status == 'pending')
    <span class="status pending" style=" background-color: yellow !important; color:orange">PENDING</span>
@elseif ($receipt->status == 'approved')
    <span class="status approved" style=" background-color: #a3e1a3 !important;
    color:green; font-size:15px">APPROVED</span>
@elseif ($receipt->status == 'rejected')
    <span class="status rejected" style=" background-color: #e6c4c4 !important;
    color: #e63434;">REJECTED</span>
@endif
 
        
     
            
            
            
            
            
            
        </td>
    </tr>
@endforeach

        </tbody>
    </table>
</body>
</html>

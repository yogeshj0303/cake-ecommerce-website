<!DOCTYPE html>
<html>
<head>
    <title>Achievement Report</title>
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
    <h2 style="text-align:center">ACHIEVEMENT REPORT </h2>
    

    
   @php
    $achivementss = $achivements->first(); 
@endphp
<div class="header-info" style="border: 1px solid black; padding: 10px; width: 97%;">
    <!-- Logo Section -->
    <table style="width: 100%; border-collapse: collapse;">
        <tr>
            <!-- Logo -->
            <td style="width: 20%; text-align: center; vertical-align: middle;">
                @if(isset($achivementss) && isset($achivementss->org_logo))
                    <img src="{{ public_path('images/' . $achivementss->org_logo) }}" alt="Logo" style="height: 70px; max-width: 100%; object-fit: contain;">
                @endif
            </td>

            <!-- Firm Details -->
            <td style="border-left: 2px solid black; vertical-align: top; padding-left: 5px; padding-right: 5px;">
                <table style="width: 100%;">
                    <tr>
                        <td colspan="3" style="font-weight: bold; text-align: center;">
                            @if(isset($achivementss) && isset($achivementss->org_name))
                                Firm Name: {{ $achivementss->org_name }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="height: 10px;"></td>
                    </tr>
                    <tr>
                        <td>
                            @if(isset($achivementss) && isset($achivementss->state))
                                <strong>State:</strong> {{ $achivementss->state }}
                            @endif
                        </td>
                        <td>
                            @if(isset($achivementss) && isset($achivementss->district))
                                <strong>District:</strong> {{ $achivementss->district }}
                            @endif
                        </td>
                        <td>
                            @if(isset($achivementss) && isset($achivementss->department_name))
                                <strong>Department:</strong> {{ $achivementss->department_name }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>
                            @if(isset($achivementss) && isset($achivementss->taluka))
                                <strong>Taluka:</strong> {{ $achivementss->taluka }}
                            @endif
                        </td>
                        <td>
                            @if(isset($achivementss) && isset($achivementss->designation_name))
                                <strong>Designation:</strong> {{ $achivementss->designation_name }}
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
                  <th>Achievement Type</th>
                 
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
        @foreach($achivements as $achivement)
    <tr>
        <td>{{ $achivement->achivment_type_name }}</td>
        <td>

          @if ($achivement->status == 'approved_clerk')
    <span class="status approved_clerk" style=" background-color: #e4e48a !important;
    color: #7a160e;">Pending from HOD</span>
@elseif ($achivement->status == 'pending')
    <span class="status pending" style=" background-color: yellow !important; color:orange">PENDING</span>
@elseif ($achivement->status == 'approved')
    <span class="status approved" style=" background-color: #a3e1a3 !important;
    color:green; font-size:15px">APPROVED</span>
@elseif ($achivement->status == 'rejected')
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

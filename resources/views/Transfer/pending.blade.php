@extends('layouts.master')
@section('title')
    @lang('translation.list-js')
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    
    <style>
       .checkmark-container {
            position: relative;
    /*background-color: #fff;*/
    padding: 20px;
    border-radius: 8px;
    max-width: 228px;
    margin: 0 auto;
    /*box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);*/
    text-align: center;
        }
        
        .signed-info {
            font-size: 8px;
    color: black;
    font-weight: bold;
        }

        .checkmark {
            position: absolute;
    top: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 50px;
    height: 50px;
    /*opacity: 0.5;*/
        }
      .table-responsive {
    overflow-x: auto;
    width: 100%;
    padding-right: 1px;
}

.table {
    width: 100%;
    border-collapse: collapse;
}

.table th, .table td {
    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    white-space: nowrap;
    padding: 10px;
    vertical-align: middle;
}

.table th {
    background-color: #f8f9fa;
    font-weight: bold;
    width: 20%;
    cursor: pointer;
}

.table tbody tr td {
    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
}

#designationsTable {
    box-sizing: border-box;
    width: 100%;
}

        @media (prefers-color-scheme: dark) {
            .table th {
                background-color: #1c1e21;
                color: #e1e1e1;
            }

            .table td {
                color: #d1d1d1;
            }
        }

        .table tbody tr:hover {
            background-color: rgba(0, 0, 0, 0.05);
        }

        .table tbody tr:last-child td {
            border-bottom: none; 
        }

        /* Make the table scrollable on smaller screens */
        @media screen and (max-width: 768px) {
            .table-responsive {
                display: block;
                overflow-x: auto;
            }
        }

        .dataTables_wrapper {
            overflow-x: auto;
        }
        
        
       .table .sort:after {
          right:0px !important;
          
          
      }
            .table .sort:before {
          right:0px !important;
          
          
      }


     table.dataTable>thead .sorting:after, table.dataTable>thead .sorting_asc:after, table.dataTable>thead .sorting_desc:after, table.dataTable>thead .sorting_asc_disabled:after, table.dataTable>thead .sorting_desc_disabled:after{
    
     content:"" !important;
    
    
}


table.dataTable>thead .sorting:before, table.dataTable>thead .sorting_asc:before, table.dataTable>thead .sorting_desc:before, table.dataTable>thead .sorting_asc_disabled:before, table.dataTable>thead .sorting_desc_disabled:before{
    
    
    content:"" !important;
}

    </style>
@endsection

@section('content')
 <?php

if (Auth::user()->is_admin == 'staff' || Auth::user()->is_admin == 'organization') {
    // Fetch permissions for 'staff' from the database as an array
    $permission = DB::table('role_permissions')
        ->where('role_name', Auth::user()->role_name)
        ->first();

    // Check if permissions are found
    if ($permission) {
        // Convert the object to an associative array
        $permissions = (array) $permission;
    } else {
        // Create an array to hold the modified permissions
        $permissions = [];

        // List of modules and permission suffixes
        $modules = [
            'dashborad', 'department', 'designation', 'organization', 'staff', 'role',
            'permission', 'report', 'userprofile', 'userdetail', 'document', 'leave',
            'nomination', 'salary', 'checklist', 'trans_join', 'other_receipt', 'affidavit',
            'achievement', 'receipt_master', 'checklist_master', 'tehsils', 'document_master',
            'organizations_master', 'leave_category', 'nomination_type', 'affidavit_type',
            'achievement_type'
        ];
        $permissionSuffixes = ['view', 'create', 'edit', 'delete'];

        // Set permissions for the allowed actions to 0 (default)
        foreach ($modules as $module) {
            foreach ($permissionSuffixes as $suffix) {
                $permissions["{$module}_{$suffix}"] = 1;
            }
        }
    }
} else if (Auth::user()->is_admin == 'admin') {
    // Create an array to hold the modified permissions
    $permissions = [];

    // List of modules and permission suffixes
    $modules = [
        'dashborad', 'department', 'designation', 'organization', 'staff', 'role',
        'permission', 'report', 'userprofile', 'userdetail', 'document', 'leave',
        'nomination', 'salary', 'checklist', 'trans_join', 'other_receipt', 'affidavit',
        'achievement', 'receipt_master', 'checklist_master', 'tehsils', 'document_master',
        'organizations_master', 'leave_category', 'nomination_type', 'affidavit_type',
        'achievement_type'
    ];
    $permissionSuffixes = ['view', 'create', 'edit', 'delete'];

    // Set permissions for the allowed actions to 2 (admin level)
    foreach ($modules as $module) {
        foreach ($permissionSuffixes as $suffix) {
            $permissions["{$module}_{$suffix}"] = 2;
        }
    }
} else {
    // Create an array to hold the modified permissions
    $permissions = [];

    // List of modules and permission suffixes
    $modules = [
        'dashborad', 'department', 'designation', 'organization', 'staff', 'role',
        'permission', 'report', 'userprofile', 'userdetail', 'document', 'leave',
        'nomination', 'salary', 'checklist', 'trans_join', 'other_receipt', 'affidavit',
        'achievement', 'receipt_master', 'checklist_master', 'tehsils', 'document_master',
        'organizations_master', 'leave_category', 'nomination_type', 'affidavit_type',
        'achievement_type'
    ];
    $permissionSuffixes = ['view', 'create', 'edit', 'delete'];

    // Set permissions for the allowed actions to 0 (default)
    foreach ($modules as $module) {
        foreach ($permissionSuffixes as $suffix) {
            $permissions["{$module}_{$suffix}"] = 1;
        }
    }
}


?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Transfer & Joining Request</h4>
                </div>

                <div class="card-body">
                    <div class="row g-4 mb-3">
                            <div class="col-sm-auto">
                                <div>

                 <button type="button" class="btn btn-primary" onclick="window.location.href='{{ route('transfer.index') }}'">
    Back
</button>
                            </div>
                        </div>
                        </div>
                    <div class="table-responsive mt-3 mb-1">
                        <table class="table table-bordered" id="">
    <thead class="table-light">
        <tr>
                                                           <th class="sort" scope="col">ID</th>
                                   <th scope="col">User Name</th>
                                    <th scope="col">Organization</th>
                                    <th scope="col">Department</th>
                                    <th scope="col">Designation</th>
                                    <th scope="col">Last Working Date</th>
                                    <th scope="col">Transfer Location</th>
                                                                                                                                             <th>Forwarded to</th>

                                 <th scope="col">Status</th>

                                  <th scope="col">User Digital Signature</th>
                                  <th scope="col">Clerk Digital Signature</th>
                                   <th scope="col">HOD Digital Signature</th>
                                  <th scope="col">Reject Description</th>
@if((isset($permissions)) && (
    ($permissions['trans_join_view'] == 2) || 
     
    ($permissions['trans_join_edit'] == 2) || 
    ($permissions['trans_join_delete'] == 2)
))
                                    <th scope="col">Action</th>
                                    @endif

        </tr>
    </thead>
    <tbody class="form-check-all">
                                                                        <!--@php $sno = 1; @endphp -->
@if((isset($permissions)) && (
    ($permissions['trans_join_view'] == 2) || 
     
    ($permissions['trans_join_edit'] == 2) || 
    ($permissions['trans_join_delete'] == 2)
))
                                     @foreach($transfers as $transfer)
                                 
                
                                <tr id="transferRow{{ $transfer->id }}">
                                     <td>{{ $transfer->id }}</td>

                                    <td>{{ $transfer->first_name }}  {{ $transfer->middle_name }}  {{ $transfer->last_name }} </td>
                                    <td>{{ $transfer->org_name }}</td>
                                    <td>{{ $transfer->department_name }}</td>
                                    <td>{{ $transfer->designation_name }}</td>
                                    <td>{{ $transfer->last_working_date }}</td>
                                    <td>{{ $transfer->transfer_state }}, {{ $transfer->transfer_district }}, {{ $transfer->transfer_taluka }}</td>
                                    
                                    
                                        <?php $usernameFrwd = 
                 
$usernameFrwd = DB::table('users')
    ->leftJoin('departments', 'users.depart_id', '=', 'departments.id')
    ->leftJoin('designations', 'users.design_id', '=', 'designations.id')
    ->select(
        'users.*',
        'departments.name as department_name',
        'designations.designation_name'
    )
    ->where('users.id', $transfer->frwd_hod_id) 
    ->first();
                 
                 ?>
<td>
    {{ $usernameFrwd ? $usernameFrwd->first_name . ' ' . $usernameFrwd->middle_name . ' ' . $usernameFrwd->last_name . '-' . $usernameFrwd->department_name . '-' . $usernameFrwd->designation_name : 'N/A' }}
</td>
                                    
<td class="leave_status">
                                                 @if ($transfer->Status == 'pending')
                                                <span class="badge bg-warning-subtle text-warning text-uppercase">Pending</span>
                                                 @elseif ($transfer->Status == 'approved_clerk')
                                                <span class="badge bg-warning-subtle text-warning text-uppercase">Pending from HOD</span>
                                                @elseif ($transfer->Status == 'approved')
                                                <span class="badge bg-success-subtle text-success text-uppercase">Approved</span>
                                                @elseif ($transfer->Status == 'rejected')
                                                 <span class="badge bg-danger-subtle text-danger text-uppercase">Rejected</span>
                                                   @elseif ($transfer->Status == 'forward')
                                                 <span class="badge bg-danger-subtle text-danger text-uppercase">forward</span>

                                                @endif
                                            </td>
                                            
                                               
                                         
                
                                             <td>@if($transfer->user_status == 'approved' ) <div class="checkmark-container">
                                  
                                
                                    <!-- Image placed over the text -->
                                     <div class="checkmark-container">
                                    <!-- Signed info text -->
                                   
                                    
                                                <span class="badge bg-success-subtle text-success text-uppercase">Approved</span>
                                </div> 
                               
                                </div>   @else
 <div class="checkmark-container">
                                    <!-- Signed info text -->
                                   
                                    
                                                <span class="badge bg-warning-subtle text-warning text-uppercase">Pending</span>
                                </div> 
                                                               @endif 
                                </td>
                                              <td>@if($transfer->clerk_otp_status == 1)  <div class="checkmark-container">
                                  
                                
                                    <!-- Image placed over the text -->
                                                <span class="badge bg-success-subtle text-success text-uppercase">Approved</span>
                                </div>@else @if($transfer->Status == 'rejected')  <div class="checkmark-container">
                                    <!-- Signed info text -->
                                    
                                                 <span class="badge bg-danger-subtle text-danger text-uppercase">Rejected</span>
                                </div> @else
 <div class="checkmark-container">
                                    <!-- Signed info text -->
                                   
                                    
                                                <span class="badge bg-warning-subtle text-warning text-uppercase">Pending</span>
                                </div> 
                                                               @endif @endif</td>
                                
                                
                                
                                
                                
                                
                                
                                
                                 <td>@if($transfer->hod_otp_status == 1)  <div class="checkmark-container">
                                  
                                
                                    <!-- Image placed over the text -->
                                                <span class="badge bg-success-subtle text-success text-uppercase">Approved</span>
                                </div>@else @if($transfer->Status == 'rejected') 
                                
                                <div class="checkmark-container">
                                    <!-- Signed info text -->
                                   
                                    
                                                 <span class="badge bg-danger-subtle text-danger text-uppercase">Rejected</span>
                                </div> 
                                
                                @else
                                
                                
                                  
                                <div class="checkmark-container">
                                    <!-- Signed info text -->
                                   
                                    
                                                <span class="badge bg-warning-subtle text-warning text-uppercase">Pending</span>
                                </div> 
                                
                              
                                @endif @endif</td>
                                
                                
                                
                                
                                
<td>{{ $transfer->reject_description ?? 'N/A' }}</td>
                                                               @if((isset($permissions)) && (
    ($permissions['trans_join_view'] == 2) || 
     
    ($permissions['trans_join_edit'] == 2) || 
    ($permissions['trans_join_delete'] == 2)
))
                                    <td>
    <div class="d-flex align-items-center">
        <div class="remove me-2"> 
                   
                            @if((isset($permissions)) && ( ($permissions['trans_join_view'] == 2)))
                        <button type="button" class="btn btn-sm btn-success " onclick="window.location.href='{{ route('transfer.show' ,  $transfer->id) }}'">
                          View
                         </button>
                        @endif
                                        </div>
                                                
</div>
                                        
                                
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                                @endif

    </tbody>
</table>

                        <!-- Modal placed outside the loop -->
                        <div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Delete Record</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                                        <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                            <h4>Are you Sure?</h4>
                                            <p class="text-muted mx-4 mb-0">Are you sure you want to remove this record?</p>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-center">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                        <form id="deleteForm" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-light">Yes, delete it</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="noresult" style="display: none">
                            <div class="text-center">
                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
                                <h5 class="mt-2">Sorry! No Result Found</h5>
                                <p class="text-muted mb-0">We've searched more than 150+ Orders We did not find any orders for your search.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="pagination-container" style="text-align: right; margin-right: 30px;">
    {{ $transfers->links() }}  
</div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
 <script src="{{ URL::asset('build/libs/prismjs/prism.js') }}"></script>
  <script src="{{ URL::asset('build/libs/list.js/list.min.js') }}"></script>
  <script src="{{ URL::asset('build/libs/list.pagination.js/list.pagination.min.js') }}"></script>
  <script src="{{ URL::asset('build/js/pages/listjs.init.js') }}"></script>
  <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
  <script src="{{ URL::asset('build/js/app.js') }}"></script>
  <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
  <script src="{{ URL::asset('build/js/pages/sweet-alert.init.js') }}"></script>
 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    
    
     <script>
    $(document).ready(function () {
        $('.sort').on('click', function () {
            const table = $(this).closest('table');
            const rows = table.find('tbody tr').toArray();
            const column = $(this).index();
            const isAscending = $(this).hasClass('asc');
            table.find('.sort').removeClass('asc desc');
            $(this).toggleClass('asc', !isAscending).toggleClass('desc', isAscending);

            rows.sort((rowA, rowB) => {
                const cellA = $(rowA).children('td').eq(column).text().trim();
                const cellB = $(rowB).children('td').eq(column).text().trim();
                if ($.isNumeric(cellA) && $.isNumeric(cellB)) {
                    return isAscending ? cellB - cellA : cellA - cellB;
                } else {
                    return isAscending ? cellB.localeCompare(cellA) : cellA.localeCompare(cellB);
                }
            });

            $.each(rows, function (index, row) {
                table.children('tbody').append(row);
            });
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Function to check the Status and hide/show the dropdown
        function checkStatusAndHide(dropdown, Status) {
            if (Status === 'approved' || Status === 'rejected') {
                dropdown.style.display = 'none'; // Hide the dropdown
            } else {
                dropdown.style.display = 'block'; // Show the dropdown
            }
        }

        // Loop through each document to check initial Status
        @foreach($transfers as $transfer) // Assuming you have $documents variable containing all documents
            const dropdown{{ $transfer->id }} = document.getElementById(`dropdown-{{ $transfer->id }}`);
            checkStatusAndHide(dropdown{{ $transfer->id }}, '{{ $transfer->Status }}');
        @endforeach

        window.updateStatus = function(documentId, newStatus) {
            // Update the hidden input with the new Status
            document.getElementById(`Status-select-${documentId}`).value = newStatus;

            // Call the function to check Status and hide dropdown
            const dropdown = document.getElementById(`dropdown-${documentId}`);
            checkStatusAndHide(dropdown, newStatus);
        };
    });

    function showRejectModal(documentId) {
        document.getElementById('Status-select-' + documentId).value = 'rejected';
        var rejectModal = new bootstrap.Modal(document.getElementById('rejectModal-' + documentId));
        rejectModal.show();
    }

    function showApprovedWarning(documentId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You are about to approve this document.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: 'rgb(85 87 90 / 68%)',
            cancelButtonColor: 'rgb(220 88 44)',
            confirmButtonText: 'Yes, approve it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('Status-select-' + documentId).value = 'approved';
                document.getElementById('StatusForm-' + documentId).submit();
            }
        });
    }

    function showForwardModal(documentId) {
        document.getElementById('Status-select-' + documentId).value = 'forward';
        var forwardModal = new bootstrap.Modal(document.getElementById('forwardModal-' + documentId));
        forwardModal.show();
    }

   function submitRejectForm(documentId) {
    var rejectDescription = document.getElementById('reject-description-textarea-' + documentId).value;

    if (rejectDescription.trim() === "") {
        alert('Please provide a reason for rejection.');
        return;
    }

    // Set the Status to 'rejected'
    document.getElementById('Status-select-' + documentId).value = 'rejected';
    // Set the reason description
    document.getElementById('reason-description-field-' + documentId).value = rejectDescription;

    // Submit the form
    document.getElementById('StatusForm-' + documentId).submit();
}
</script>


   <script>
    $(document).ready(function() {
        var table = $('#customerTable').DataTable({
            scrollY: '400px', 
            scrollX: true, 
            scrollCollapse: true,
            paging: true,
            searching: true,
            order: [[0, 'asc']],
            lengthMenu: [10, 25, 50, 100],
            buttons: ['copy', 'excel', 'pdf', 'print'],
            responsive: true,
            dom: 'Bfrtip',
                                  "order": [[0, 'desc']], 

        });

        // Position the buttons correctly
        table.buttons().container()
            .appendTo('#customerTable_wrapper .col-md-6:eq(0)');

            });
</script>

  <script>

   $(document).ready(function() {
    $('.remove-item-btn').click(function() {
        var id = $(this).data('id');
        var action = '/transfer/' + id; 
        $('#deleteForm').attr('action', action);
    });

    // AJAX for deleting record
    $('#deleteForm').submit(function(event) {
        event.preventDefault();
        var form = $(this);
        $.ajax({
            url: form.attr('action'),
            type: 'POST', // Use POST because we spoof DELETE
            data: form.serialize(),
            success: function(response) {
                $('#deleteRecordModal').modal('hide');
                $('#transferRow' + response.id).remove(); // Remove deleted row
            },
            error: function(response) {
                alert('Error occurred while deleting.');
            }
        });
    });
});



      
  </script>


@endsection

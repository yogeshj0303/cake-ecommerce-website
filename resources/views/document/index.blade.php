@extends('layouts.master')
@section('title')
    @lang('translation.list-js')
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
      .table {
            border-collapse: collapse;
            width: 100%;
        }

        .table th, .table td {
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            padding: 10px;
            vertical-align: middle;
        }

        .table th {
            background-color: #f8f9fa;
            font-weight: bold;
                        width: 20%;
                            cursor: pointer; /* Show sorting cursor */


        }
        .table tbody tr  td {
    border-bottom: 1px solid rgba(0, 0, 0, 0.1); /* Light border between rows */
}




    table.dataTable tbody tr {
        background-color: transparent !important;
    }

.table-responsive {
    overflow-x: auto; /* Enable horizontal scrolling */

}

.table {
    width: 100%; /* Ensure table takes full width */
}

.table th, .table td {
    white-space: nowrap; /* Prevent text from wrapping */
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
       

      table.dataTable thead th, table.dataTable thead td{
          
          border-bottom:none;
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
                <h4 class="card-title mb-0">Document List</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="listjs-table" id="documentList">
                    <div class="row g-4 mb-3">
                        <div class="col-sm-auto">
                            <div>
                                @if((isset($permissions)) && (($permissions['document_create'] == 2) ))
                                <button type="button" class="btn btn-success add-btn" onclick="window.location.href='{{ route('documents.create') }}'">Add</button>
                            @endif
                               <button type="button" class="btn btn-warning add-btn" onclick="window.location.href='{{ route('pending.document') }}'">Request</button>
                              <button type="button" class="btn btn-primary" onclick="window.location.href='{{ route('documents-profile-history') }}'">History</button>
                           
                            </div>
                        </div>
                        <div class="col-sm">
                            
                        </div>
                    </div>

                    <div class="table-responsive  mt-3 mb-1">
                        <table class="table table-bordered" id="designationsTable">
                            <thead class="table-light">
                                <tr>
                                <th class="sort" data-sort="ID">ID</th>

                                  <th class="" data-sort="state">User Name</th>

                                    <th class="" data-sort="state">State</th>
                                    <th class="" data-sort="district">District</th>
                                    <th class="" data-sort="taluka">Taluka</th>
                                                                                                               <th>Forwarded to</th>

                                    <th class="" data-sort="taluka">Status</th>

                                     <th class="" data-sort="taluka">Clerk Signature Status</th>
                                      <th class="" data-sort="taluka">HOD Signature Status</th>
                                       
                                    @if((isset($permissions)) && (
    ($permissions['document_view'] == 2) || ($permissions['document_edit'] == 2) || 
    ($permissions['document_delete'] == 2)
))
                                    <th class="" data-sort="action">Action</th>
                                    @endif
                                </tr>
                            </thead>
                              <!--@php $sno = 1; @endphp -->

                            <tbody class="list form-check-all">
                                                       @if((isset($permissions)) && (($permissions['document_view'] == 2) || 
 ($permissions['document_edit'] == 2) || 
    ($permissions['document_delete'] == 2)))
                                @foreach($documents as $document)
                                @if($document->status != 'pending')
                                <tr id="documentRow{{ $document->id }}">
                                   <td>{{$document->id }}</td>

                                    <td class="name">{{ $document->name }} {{ $document->middle_name }} {{ $document->last_name }}</td>

                                    <td class="state">{{ $document->state }}</td>
                                    <td class="district">{{ $document->district }}</td>
                                    <td class="taluka">{{ $document->taluka }}</td>
                                        <?php $usernameFrwd = 
                 
$usernameFrwd = DB::table('users')
    ->leftJoin('departments', 'users.depart_id', '=', 'departments.id')
    ->leftJoin('designations', 'users.design_id', '=', 'designations.id')
    ->select(
        'users.*',
        'departments.name as department_name',
        'designations.designation_name'
    )
    ->where('users.id', $document->frwd_hod_id) 
    ->first();
                 
                 ?>
<td>
    {{ $usernameFrwd ? $usernameFrwd->first_name . ' ' . $usernameFrwd->middle_name . ' ' . $usernameFrwd->last_name . '-' . $usernameFrwd->department_name . '-' . $usernameFrwd->designation_name : 'N/A' }}
</td>
                                      <td class="status">
                                           
                                          
                                            @if ($document->status == 'pending')
                                                <span class="badge bg-warning-subtle text-warning text-uppercase">Pending</span>
                                                 @elseif ($document->status == 'approved_clerk')
                                                <span class="badge bg-warning-subtle text-warning text-uppercase">Pending from HOD</span>
                                                @elseif ($document->status == 'approved')
                                                <span class="badge bg-success-subtle text-success text-uppercase">Approved</span>
                                                @elseif ($document->status == 'rejected')
                                                 <span class="badge bg-danger-subtle text-danger text-uppercase">Rejected</span>
                                                   @elseif ($document->status == 'forward')
                                                 <span class="badge bg-danger-subtle text-danger text-uppercase">forward</span>

                                                @endif
                                      </td>
                                      
                                      
                                    
                                       <td>@if($document->clerk_otp_status == 1)  <div class="checkmark-container">
                                  
                                
                                    <!-- Image placed over the text -->
                                                <span class="badge bg-success-subtle text-success text-uppercase">Approved</span>
                                </div>@else @if($document->status == 'rejected')  <div class="checkmark-container">
                                    <!-- Signed info text -->

                                                 <span class="badge bg-danger-subtle text-danger text-uppercase">Rejected</span>
                                </div> @else
                                                <span class="badge bg-warning-subtle text-warning text-uppercase">Pending</span>
                                
                                @endif @endif</td>
                               <td>@if($document->hod_otp_status == 1 ) 
                               
                               <div class="checkmark-container">
                                  
                                
                                    <!-- Image placed over the text -->
                                                <span class="badge bg-success-subtle text-success text-uppercase">Approved</span>
                                </div>  
                                
                                
                                @else @if($document->status == 'rejected')  <div class="checkmark-container">
                                    <!-- Signed info text -->
                                  
                                    <!-- Image placed over the text -->
                                                 <span class="badge bg-danger-subtle text-danger text-uppercase">Rejected</span>
                                </div> @else 
                                  <div class="checkmark-container">
                                  
                                
                                    <!-- Image placed over the text -->
                                                                                <span class="badge bg-warning-subtle text-warning text-uppercase">Pending</span>
                                </div>  
                                
                                
                             
                                
                                

                                @endif  @endif
                                </td>
                                      @if((isset($permissions)) && (($permissions['document_view'] == 2) || 
 ($permissions['document_edit'] == 2) || 
    ($permissions['document_delete'] == 2)))
                                        <td>
                                        
<!--                                         <div class="remove">-->
<!--     @if((isset($permissions)) && (($permissions['document_edit'] == 2)))-->
<!--   <button class="btn edit-item-btn btn-sm btn-primary" onclick="window.location.href='{{ route('documents.edit', $document->user_id ) }}'">-->
<!--       Edit-->
<!--</button>-->
<!--@endif-->
     @if((isset($permissions)) && (($permissions['document_delete'] == 2)))
 <button class="btn  remove-item-btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteRecordModal" data-id="{{ $document->id }}">
        Remove
    </button>
    @endif
    @if((isset($permissions)) && (($permissions['document_view'] == 2)))
   <button class="btn remove-item-btn btn-sm btn-success" onclick="window.location.href='{{ route('viewalldocument', $document->user_id) }}'">
    View
</button>
@endif


<button class="btn btn-sm btn-warning remove-item-btn" onclick="printAffidavit({{ $document->id }})">
    Print
</button>

<script>
    function printAffidavit(userId) {
        var printWindow = window.open('/documentprint/' + userId, '_blank');
     
    }
</script>

</div>

        
        
                                    </td>  
                                    @endif
                                    </tr>
                                    @endif
                                @endforeach
                                @endif
                            </tbody>
                        </table>

                        <!-- Modal -->
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
    {{ $documents->links() }}  
</div>


                </div>
            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end col -->
</div>
<!-- end row -->
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/prismjs/prism.js') }}"></script>
    <script src="{{ URL::asset('build/libs/list.js/list.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/list.pagination.js/list.pagination.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/listjs.init.js') }}"></script>
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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
        $(document).ready(function() {
            $('.remove-item-btn').click(function() {
                var id = $(this).data('id');
                var action = '/documents/' + id; 
                $('#deleteForm').attr('action', action);
            });

            $('#deleteForm').submit(function(event) {
                event.preventDefault();
                var form = $(this);
                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    data: form.serialize(),
                    success: function(response) {
                        $('#deleteRecordModal').modal('hide');
                        $('#documentRow' + response.id).remove();
                        alert('Document deleted successfully.');
                    },
                    error: function(response) {
                        alert('An error occurred while trying to delete the document.');
                    }
                });
            });
        });
    </script>
@endsection
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
      
     table.dataTable>thead .sorting:after, table.dataTable>thead .sorting_asc:after, table.dataTable>thead .sorting_desc:after, table.dataTable>thead .sorting_asc_disabled:after, table.dataTable>thead .sorting_desc_disabled:after{
    
     content:"" !important;
    
    
}
   .table .sort:after {
          right:0px !important;
          
          
      }
            .table .sort:before {
          right:0px !important;
          
          
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
                    <h4 class="card-title mb-0">Nomination</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="" id="">
                        <div class="row g-4 mb-3">
                            <div class="col-sm-auto">
                                <div>
                                    @if((isset($permissions)) && ( ($permissions['nomination_create'] == 2) ))
                                   <button type="button" class="btn btn-success add-btn" onclick="window.location.href='{{ route('nomination-add') }}'">
    Add
</button>
@endif
                                            <a href="{{route('nomination_pending')}}">  <button type="button" class="btn btn-warning " >
Request
</button></a>

      <a href="{{route('nomination-history')}}">  <button type="button" class="btn btn-primary " >
History
</button></a>
                                </div>
                            </div>
                            <!--<div class="col-sm">-->
                            <!--    <div class="d-flex justify-content-sm-end">-->
                            <!--        <div class="search-box ms-2">-->
                            <!--            <input type="text" class="form-control search" placeholder="Search...">-->
                            <!--            <i class="ri-search-line search-icon"></i>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->
                        </div>

                        <div class="table-responsive  mt-3 mb-1">
                        <table class="table table-bordered" id="designationsTable">
    <thead class="table-light">
        <tr>   
        

                                            <th class="sort">ID</th>
                                <th>User Name</th>

                                <th>State</th>
                                <th>District</th>
                                <th>Taluka</th>
                                <th>Position</th>
                                <th>Birth Date</th>
                                <th>Joining Date</th>
                                <th>Nomination Type</th>
                                <th>Forwarded to</th>
                                <th>Status</th>
                                <th>First Witness Signature</th>
                                <th>Second Witness Signature</th>
                                <th>Clerk Signature Status</th> 
                                <th>HOD Signature Status</th>
                                @if((isset($permissions)) && (
    ($permissions['nomination_view'] == 2) || ($permissions['nomination_edit'] == 2) || ($permissions['nomination_delete'] == 2)
))
                                <th>Action</th>
                                @endif

                                <!--<th>Nominee Name</th>-->
                                <!--<th>Nominee DOB</th>-->
                                <!--<th>Nominee Age</th>-->
                                <!--<th>Atypical Event</th>-->
                                <!--<th>Relationship to Nominee</th>-->
                                <!--<th>Nominee Type</th>-->
                                <!--<th>Nominee Amount</th>-->
                                <!--                                <th>action</th>-->

                            </tr>

    </thead>
                                   <!--@php $sno = 1; @endphp -->

    <tbody class=" list form-check-all">
          @if((isset($permissions)) && (
    ($permissions['nomination_view'] == 2) || ($permissions['nomination_edit'] == 2) || ($permissions['nomination_delete'] == 2)
))
                                    @foreach($nominationsWithDetails as $item)
                                    
    <tr id="userRow{{ $item->id }}">
            
                                   <td>{{ $item->id }}</td>
                                    <td class="name">{{ $item->name }} {{ $item->middle_name }} {{ $item->last_name }}</td>

                                    <td>{{ $item->state }}</td>
                                    <td>{{ $item->district }}</td>
                                    <td>{{ $item->taluka }}</td>
                                    <td>{{ $item->position }}</td>
                                    <td>{{ $item->birth_date }}</td>
                                    <td>{{ $item->join_date }}</td>
                                    <td>{{ $item->nomination_type }}</td>
  <?php $usernameFrwd = 
                 
$usernameFrwd = DB::table('users')
    ->leftJoin('departments', 'users.depart_id', '=', 'departments.id')
    ->leftJoin('designations', 'users.design_id', '=', 'designations.id')
    ->select(
        'users.*',
        'departments.name as department_name',
        'designations.designation_name'
    )
    ->where('users.id', $item->frwd_hod_id) 
    ->first();
                 
                 ?>
<td>
    {{ $usernameFrwd ? $usernameFrwd->first_name . ' ' . $usernameFrwd->middle_name . ' ' . $usernameFrwd->last_name . '-' . $usernameFrwd->department_name . '-' . $usernameFrwd->designation_name : 'N/A' }}
</td>                                                                        <td class="status">
                                           
                                          
                                            @if ($item->status == 'pending')
                                                <span class="badge bg-warning-subtle text-warning text-uppercase">Pending</span>
                                                 @elseif ($item->status == 'approved_clerk')
                                                <span class="badge bg-warning-subtle text-warning text-uppercase">Pending from HOD</span>
                                                @elseif ($item->status == 'approved')
                                                <span class="badge bg-success-subtle text-success text-uppercase">Approved</span>
                                                @elseif ($item->status == 'rejected')
                                                 <span class="badge bg-danger-subtle text-danger text-uppercase">Rejected</span>
                                                   @elseif ($item->status == 'forward')
                                                 <span class="badge bg-danger-subtle text-danger text-uppercase">forward</span>

                                                @endif
                                      </td>
                                        <td>@if($item->witness_first_status === 'approved')  <div class="checkmark-container">
                                  
                                
                                    <!-- Image placed over the text -->
                                                <span class="badge bg-success-subtle text-success text-uppercase">Approved</span>
                                </div> @else
 <div class="checkmark-container">
                                  
                                
                                    <!-- Image placed over the text -->
                                <span class="badge bg-warning-subtle text-warning text-uppercase">Pending</span>
                                </div> 
                                
                                @endif
                                </td>
                                
                                
                                
                                   <td>@if($item->witness_second_status === 'approved') 
                                   <div class="checkmark-container">
                                  
                                
                                    <!-- Image placed over the text -->
                                                <span class="badge bg-success-subtle text-success text-uppercase">Approved</span>
                                </div> 
                                
                                @else
                                 <div class="checkmark-container">
                                  
                                
                                    <!-- Image placed over the text -->
                                <span class="badge bg-warning-subtle text-warning text-uppercase">Pending</span>
                                </div> 
                                

                                @endif
                                </td>
                                       <td>@if($item->clerk_otp_status == 1)  <div class="checkmark-container">
                                  
                                
                                    <!-- Image placed over the text -->
                                                <span class="badge bg-success-subtle text-success text-uppercase">Approved</span>
                                </div>@else @if($item->status == 'rejected')  <div class="checkmark-container">
                                    <!-- Signed info text -->
                                    
                                    
                                                 <span class="badge bg-danger-subtle text-danger text-uppercase">Rejected</span>
                                </div> @else 
                                
                                  <div class="checkmark-container">
                                  
                                
                                    <!-- Image placed over the text -->
                                                <span class="badge bg-warning-subtle text-warning text-uppercase">Pending</span>
                                </div>  
                                
                             
                                
                                
                                
                                @endif @endif</td>
                               <td>@if($item->hod_otp_status == 1 )
                               
                               <div class="checkmark-container">
                                  
                                
                                    <!-- Image placed over the text -->
                                                <span class="badge bg-success-subtle text-success text-uppercase">Approved</span>
                                </div>  
                                
                                
                                @else @if($item->status == 'rejected')  <div class="checkmark-container">
                                    <!-- Image placed over the text -->
                                                 <span class="badge bg-danger-subtle text-danger text-uppercase">Rejected</span>
                                </div> @else
  <div class="checkmark-container">
                                  
                                
                                    <!-- Image placed over the text -->
                                                <span class="badge bg-warning-subtle text-warning text-uppercase">Pending</span>
                                </div>  
                                
                                                             @endif  @endif
                                </td>
<!--                                   <td>-->
<!--    @if($item->digital_sig_user)-->
<!--        <img src="{{ asset($item->digital_sig_user) }}" alt="User Signature" style="width: 100px; height: auto;">-->
<!--    @else-->
<!--        No Signature-->
<!--    @endif-->
<!--</td>-->
<!--<td>-->
<!--    @if($item->digital_sig_clerk)-->
<!--        <img src="{{ asset($item->digital_sig_clerk) }}" alt="Clerk Signature" style="width: 100px; height: auto;">-->
<!--    @else-->
<!--        No Signature-->
<!--    @endif-->
<!--</td>-->
<!--<td>-->
<!--    @if($item->digital_sig_head)-->
<!--        <img src="{{ asset($item->digital_sig_head) }}" alt="Head Signature" style="width: 100px; height: auto;">-->
<!--    @else-->
<!--        No Signature-->
<!--    @endif-->
<!--</td>-->
<!--<td>-->
<!--    @if($item->witness_sig_one)-->
<!--        <img src="{{ asset($item->witness_sig_one) }}" alt="Witness One Signature" style="width: 100px; height: auto;">-->
<!--    @else-->
<!--        No Signature-->
<!--    @endif-->
<!--</td>-->
<!--<td>-->
<!--    @if($item->witness_sig_two)-->
<!--        <img src="{{ asset($item->witness_sig_two) }}" alt="Witness Two Signature" style="width: 100px; height: auto;">-->
<!--    @else-->
<!--        No Signature-->
<!--    @endif-->
<!--</td>-->
                     @if((isset($permissions)) && (
    ($permissions['nomination_view'] == 2) || ($permissions['nomination_edit'] == 2) || ($permissions['nomination_delete'] == 2)
))                 <td>
                                        
                                        
                                         <div class="remove">
                                               @if((isset($permissions)) && (($permissions['nomination_edit'] == 2)))
                                                  @if ($item->status != 'approved'&& $item->status != 'approved_clerk' && $item->status != 'approved_clerk' && $item->status != 'rejected' )
                                              <button class="btn  edit-item-btn btn-sm btn-primary" onclick="window.location.href='{{ route('nomination.edit', $item->id) }}'">Edit</button>
                                      @endif
                                      @endif
    
<!--    <button class="btn  remove-item-btn btn-sm btn-success" onclick="window.location.href='{{ route('nomination-show' , $item->id) }}'">-->
<!--show-->
<!--    </button>-->
  @if((isset($permissions)) && (($permissions['nomination_delete'] == 2)))
    <button class="btn  remove-item-btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteRecordModal" data-id="{{ $item->id }}">
        Remove
    </button>
@endif
@if((isset($permissions)) && (($permissions['nomination_view'] == 2)))
<button class="btn  remove-item-btn btn-sm btn-success" onclick="window.location.href='{{ route('viewnomination' , $item->id) }}'">
View
</button>
@endif
    
   
                                                                    <button class="btn btn-sm btn-warning remove-item-btn" onclick="printAffidavit({{ $item->id }})">
    Print
</button>


                                                </div>
                                                
                                                

<script>
    function printAffidavit(userId) {
        var printWindow = window.open('/nominationprint/' + userId, '_blank');
        
    }
</script>

        
        
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
                                    <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                        colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
                                    </lord-icon>
                                    <h5 class="mt-2">Sorry! No Result Found</h5>
                                    <p class="text-muted mb-0">We've searched more than 150+ Orders We did not find any
                                        orders for you search.</p>
                                </div>
                            </div>
                        </div>
                        
                         <div class="pagination-container" style="text-align: right; margin-right: 30px;">
    {{ $nominationsWithDetails->links() }}  
</div>



                        <!--<div class="d-flex justify-content-end">-->
                        <!--    <div class="pagination-wrap hstack gap-2">-->
                        <!--        <a class="page-item pagination-prev disabled" href="javascript:void(0);">-->
                        <!--            Previous-->
                        <!--        </a>-->
                        <!--        <ul class="pagination listjs-pagination mb-0"></ul>-->
                        <!--        <a class="page-item pagination-next" href="javascript:void(0);">-->
                        <!--            Next-->
                        <!--        </a>-->
                        <!--    </div>-->
                        <!--</div>-->
                    </div>
                </div><!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    <!-- end row -->


   
    <!-- Modal -->
    
<!--end modal -->
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/prismjs/prism.js') }}"></script>
    <script src="{{ URL::asset('build/libs/list.js/list.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/list.pagination.js/list.pagination.min.js') }}"></script>

    <!-- listjs init -->
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
            var action = '/nominationdelete/' + id; 
            $('#deleteForm').attr('action', action);
        });

        // Handle the form submission
        $('#deleteForm').submit(function(event) {
            event.preventDefault(); // Prevent default form submission
            var form = $(this);
            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: form.serialize(),
                success: function(response) {
                    $('#deleteRecordModal').modal('hide');
                    // Remove the deleted user row from the table
                $('#userRow' + response.id).fadeOut(500, function() {
                    $(this).remove();
                });
                    alert('Nomination deleted successfully.');
                },
                error: function(response) {
                    alert('An error occurred while trying to delete the user.');
                }
            });
        });
    });



</script>


@endsection




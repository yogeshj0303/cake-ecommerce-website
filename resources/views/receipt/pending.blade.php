@extends('layouts.master')
@section('title')
    @lang('translation.list-js')
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
    /*transform: translateX(-50%);*/
    width: 50px;
    height: auto;
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
                                    <h4 class="card-title">Receipt List</h4>

            </div><!-- end card header -->

            <div class="card-body">
                <div class="listjs-table" id="customerList">
                    <div class="row g-4 mb-3">
                            <div class="col-sm-auto">
                     <a href="{{route('receipts.index')}}"><button type="button" class="btn btn-primary ">Back </button></a>
                         
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

                    <div class="table-responsive mt-3 mb-1">
                        <table class="table table-bordered" id="designationsTable">
                           <thead>
                            <tr>
 <!--<th scope="col" style="width: 50px;">-->
 <!--                                       <div class="form-check">-->
 <!--                                           <input class="form-check-input" type="checkbox" id="checkAll" value="option">-->
 <!--                                       </div>-->
 <!--                                   </th>
 -->                                  
 
                                                           <th  class="sort" scope="col">ID</th>
                                                                     <th>User Name</th>

                                   <th>Receipt No</th>
                                <th>Receipt Category</th>
                                <th>Subject</th>
                                <th>Description</th>
                                 <th>Forwarded to</th>
                                <th>Status</th>
                              
                                  <th >Clerk Digital Signature</th>
                                   <th >HOD Digital Signature</th>
                                <th>Document</th>
                                @if((isset($permissions)) && (
    ($permissions['other_receipt_view'] == 2) || 
   ($permissions['other_receipt_create'] == 2)
))

                                <th>Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                                                       <!--@php $sno = 1; @endphp -->
  @if((isset($permissions)) && (
    ($permissions['other_receipt_view'] == 2) || 
   ($permissions['other_receipt_create'] == 2)
)) 

                            @foreach ($receipts as $receipt)
                           
                                 
                            <tr>
                                <td>{{ $receipt->id }}</td>

                                <td>{{ $receipt->first_name }}  {{ $receipt->middle_name }} {{ $receipt->last_name }}</td>

                                <td>{{ $receipt->receipt_no }}</td>
                                <td>{{ $receipt->receipt_checklist_id }}</td>
                                <td>{{ $receipt->subject }}</td>
                                <td>
                                 <!-- Eye Button -->
                <button class="btn btn-info btn-sm view-description" 
                        data-description="{{ $receipt->description }}" 
                        data-bs-toggle="modal" 
                        data-bs-target="#descriptionModal">
                    <i class="fas fa-eye"></i>
                </button>
                </td>
                
                 <?php $usernameFrwd = 
                 
$usernameFrwd = DB::table('users')
    ->leftJoin('departments', 'users.depart_id', '=', 'departments.id')
    ->leftJoin('designations', 'users.design_id', '=', 'designations.id')
    ->select(
        'users.*',
        'departments.name as department_name',
        'designations.designation_name'
    )
    ->where('users.id', $receipt->frwd_hod_id) 
    ->first();
                 
                 ?>
<td>
    {{ $usernameFrwd ? $usernameFrwd->first_name . ' ' . $usernameFrwd->middle_name . ' ' . $usernameFrwd->last_name . '-' . $usernameFrwd->department_name . '-' . $usernameFrwd->designation_name : 'N/A' }}
</td>
                
                
                
                                                                        <td class="status">
                                           
                                          
                                            @if ($receipt->status == 'pending')
                                                <span class="badge bg-warning-subtle text-warning text-uppercase">Pending</span>
                                                 @elseif ($receipt->status == 'approved_clerk')
                                                <span class="badge bg-warning-subtle text-warning text-uppercase">Pending from HOD</span>
                                                @elseif ($receipt->status == 'approved')
                                                <span class="badge bg-success-subtle text-success text-uppercase">Approved</span>
                                                @elseif ($receipt->status == 'rejected')
                                                 <span class="badge bg-danger-subtle text-danger text-uppercase">Rejected</span>
                                                   @elseif ($receipt->status == 'forward')
                                                 <span class="badge bg-danger-subtle text-danger text-uppercase">forward</span>

                                                @endif
                                      </td>
                                     
                                       <td>@if($receipt->clerk_otp_status == 1 || ($receipt->status != 'rejected' && $receipt->status != 'pending'))  <div class="checkmark-container">
                                  
                                
                                    <!-- Image placed over the text -->
                                                <span class="badge bg-success-subtle text-success text-uppercase">Approved</span>
                                </div>@elseif($receipt->status == 'rejected')  <div class="checkmark-container">
                                    <!-- Signed info text -->
                                   
                                    
                                                 <span class="badge bg-danger-subtle text-danger text-uppercase">Rejected</span>
                                </div> @else 
 <div class="checkmark-container">
                                    <!-- Signed info text -->
                                   
                                    <!-- Image placed over the text -->
                                                <span class="badge bg-warning-subtle text-warning text-uppercase">Pending</span>
                                </div> 
                                                              @endif</td>
                               <td>@if($receipt->hod_otp_status == 1 ) <div class="checkmark-container">
                                  
                                
                                    <!-- Image placed over the text -->
                                                <span class="badge bg-success-subtle text-success text-uppercase">Approved</span>
                                </div>  @elseif($receipt->status == 'rejected')
                                
                                <div class="checkmark-container">
                                    <!-- Signed info text -->
                                   
                                    <!-- Image placed over the text -->
                                                 <span class="badge bg-danger-subtle text-danger text-uppercase">Rejected</span>
                                </div> 
                                
                                @else
                                
                                  <div class="checkmark-container">
                                    <!-- Signed info text -->
                                   
                                    <!-- Image placed over the text -->
                                                <span class="badge bg-warning-subtle text-warning text-uppercase">Pending</span>
                                </div> 
                              
                                @endif
                                </td>
                               
                                <td><a href="{{ asset('uploads/document/'.$receipt->receipt_pdf) }}" target="_blank">View PDF</a></td>
                                <!--<td><a href="{{ asset('images/'.$receipt->receipt_pdf) }}" target="_blank">View PDF</a></td>-->
                                  @if((isset($permissions)) && (
   ($permissions['other_receipt_view'] == 2)
))

                                <td>
                                    <a href="{{route('receipts.edit' ,$receipt->id )}}" class="btn btn-success btn-sm">View</a>
                                   
                                </td>
                                @endif
                            </tr>
                          
                            @endforeach
                            @endif
                        </tbody>
                        </table>
                    </div>

                    <!--<div class="d-flex justify-content-end">-->
                    <!--    <div class="pagination-wrap hstack gap-2">-->
                    <!--        <a class="page-item pagination-prev disabled" href="javascript:void(0);">Previous</a>-->
                    <!--        <ul class="pagination listjs-pagination mb-0"></ul>-->
                    <!--        <a class="page-item pagination-next" href="javascript:void(0);">Next</a>-->
                    <!--    </div>-->
                    <!--</div>-->
                </div>
                
                     <div class="pagination-container" style="text-align: right; margin-right: 30px;">
    {{ $receipts->links() }}  
</div>

                               
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->

<!-- Delete Record Modal -->
<!--<div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-hidden="true">-->
<!--    <div class="modal-dialog modal-dialog-centered">-->
<!--        <div class="modal-content">-->
<!--            <div class="modal-header">-->
<!--                <h5 class="modal-title">Delete Record</h5>-->
<!--                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>-->
<!--            </div>-->
<!--            <div class="modal-body text-center">-->
<!--                <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>-->
<!--                <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">-->
<!--                    <h4>Are you Sure?</h4>-->
<!--                    <p class="text-muted mx-4 mb-0">Are you sure you want to remove this record?</p>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="modal-footer justify-content-center">-->
<!--                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>-->
<!--                <form id="deleteForm" method="POST" style="display:inline;">-->
<!--                    @csrf-->
<!--                    @method('DELETE')-->
<!--                    <button type="submit" class="btn btn-sm btn-light">Yes, delete it</button>-->
<!--                </form>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->


@endsection
@section('script')


    <script src="{{ URL::asset('build/libs/prismjs/prism.js') }}"></script>
    <script src="{{ URL::asset('build/libs/list.js/list.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/list.pagination.js/list.pagination.min.js') }}"></script>

    <!-- listjs init -->
    <script src="{{ URL::asset('build/js/pages/listjs.init.js') }}"></script>

    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>


    
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="{{ URL::asset('build/js/pages/select2.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>

      <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<!-- Description Modal -->
<div class="modal fade" id="descriptionModal" tabindex="-1" aria-labelledby="descriptionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="descriptionModalLabel">Receipt Description</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalDescription">
                <!-- Description will be populated here -->
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const viewButtons = document.querySelectorAll('.view-description');
    const modalDescription = document.getElementById('modalDescription');

    viewButtons.forEach(button => {
        button.addEventListener('click', function () {
            const description = this.getAttribute('data-description');
            modalDescription.textContent = description;
        });
    });
});

</script>
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


<!--<script>-->
<!--    $(document).ready(function() {-->
<!--        $('.remove-item-btn').click(function() {-->
<!--            var id = $(this).data('id');-->
<!--            var action = '/salary/' + id; -->
<!--            $('#deleteForm').attr('action', action);-->
<!--        });-->

<!--        $('#deleteForm').submit(function(event) {-->
<!--            event.preventDefault(); -->
<!--            var form = $(this);-->
<!--            $.ajax({-->
<!--                url: form.attr('action'),-->
<!--                type: 'POST',-->
<!--                data: form.serialize(),-->
<!--                success: function(response) {-->
<!--                    $('#deleteRecordModal').modal('hide');-->
<!--                    $('#userRow' + response.id).remove();-->
<!--                    alert('Salary record deleted successfully.');-->
<!--                },-->
<!--                error: function(response) {-->
<!--                    alert('An error occurred while trying to delete the record.');-->
<!--                }-->
<!--            });-->
<!--        });-->
<!--    });-->
<!--</script>-->

@endsection

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
      
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Checklist</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="listjs-table" id="customerList">
                        <div class="row g-4 mb-3">
                            <div class="col-sm-auto">
                                <div>
                                    @if((isset($permissions)) && (
    ($permissions['checklist_create'] == 2) 
    
))
                                    <a href="{{ route('checklist-new.create')}}">
                                        <button type="button" class="btn btn-success add-btn"><i
                                                class=""></i> Add</button>
                                    </a>
                                    @endif
                                    <a href="{{ route('pending.checklist')}}">
                                        <button type="button" class="btn btn-warning "> Request</button>
                                    </a>
                                    <a href="{{ route('checklist-new.history')}}">
                                        <button type="button" class="btn btn-primary "> History</button>
                                    </a>
                                </div>
                            </div>
                           
                        </div>

                        <div class="table-responsive mt-3 mb-1">
                        <table class="table table-bordered" id="designationsTable">
        <thead class="table-light">
            <tr>
                                <th class="sort" data-sort="ID">ID</th>
                <th class="" data-sort="state">User Name</th>

                <th class="" data-sort="state">State</th>
                <th class="" data-sort="district">District</th>
                <th class="" data-sort="taluka">Taluka</th>
                <th class="" data-sort="org_id">Organization</th>
                <th class="" data-sort="depart_id">Department</th>
                <th class="" data-sort="design_id">Designation</th>
                <th class="" data-sort="checklist_name">Checklist Name</th>
                <th class="" data-sort="page_no">Page No</th>
                <th class="" data-sort="Status">Status</th>
                <th class="" data-sort="reject_description">Reject Description</th>
                <th class="" data-sort="receipt_no">Receipt No</th>
                <th class="" data-sort="receipt_status">Receipt Status</th>
                @if((isset($permissions)) && (
    ($permissions['checklist_view'] == 2) || 
    
    ($permissions['checklist_edit'] == 2) || 
    ($permissions['checklist_delete'] == 2)
))
                <th class="" data-sort="action">Action</th>
                @endif
            </tr>
        </thead>
                                

        <tbody class=" form-check-all">
             @if((isset($permissions)) && (
    ($permissions['checklist_view'] == 2) || 
    
    ($permissions['checklist_edit'] == 2) || 
    ($permissions['checklist_delete'] == 2)
))
            @foreach ($checklists as $checklist)
                <tr id="checklistRow{{ $checklist->id}}">
                     <td class="state">{{ $checklist->id }}</td>
                     <td class="name">{{ $checklist->first_name }} {{ $checklist->middle_name }} {{ $checklist->last_name }}</td>

                    <td class="state">{{ $checklist->state }}</td>
                    <td class="district">{{ $checklist->district }}</td>
                    <td class="taluka">{{ $checklist->taluka }}</td>
                    <td class="org_id">{{ $checklist->org_name }}</td>
                    <td class="depart_id">{{ $checklist->name }}</td>
                    <td class="design_id">{{ $checklist->designation_name }}</td>
                    <td class="checklist_name">{{ $checklist->checklist_name }}</td>
                    <td class="page_no">{{ $checklist->page_no }}</td>
                    <td class="status">                                            @if ($checklist->Status == 'pending')
                                                <span class="badge bg-warning-subtle text-warning text-uppercase">Pending</span>
                                                @elseif ($checklist->Status == 'Approved')
                                                <span class="badge bg-success-subtle text-success text-uppercase">Approved</span>
                                                @elseif ($checklist->Status == 'Rejected')
                                                 <span class="badge bg-danger-subtle text-danger text-uppercase">Rejected</span>

                                                @endif
</td>

                    <td>
                        {{ $checklist->reject_description }}         <!-- Eye Button -->
                </td>
                    <td class="receipt_no">{{ $checklist->receipt_no }}</td>
                    <td class="receipt_status">
                    
                  @if (strtolower($checklist->receipt_status) == 'in-progress')
    <span class="badge bg-warning-subtle text-warning text-uppercase">In-Progress</span>
@elseif (strtolower($checklist->receipt_status) == 'completed')
    <span class="badge bg-success-subtle text-success text-uppercase">Completed</span>
@elseif (strtolower($checklist->receipt_status) == 'rejected')
    <span class="badge bg-danger-subtle text-danger text-uppercase">Rejected</span>
@endif
  
                    </td>
                    
                    
                    
                      @if((isset($permissions)) && (
    ($permissions['checklist_view'] == 2) || 
    
    ($permissions['checklist_edit'] == 2) || 
    ($permissions['checklist_delete'] == 2)
))
                    <td>
                        <div class="d-flex gap-2">
                            <!--@if((isset($permissions)) && (($permissions['checklist_edit'] == 2) ))-->
                            <!--<button type="button" class="btn btn-sm btn-primary edit-item-btn" onclick="window.location.href='{{ route('checklist-new.edit', $checklist->id) }}'">-->
                            <!--    Edit-->
                            <!--</button>-->
                            <!--@endif-->
                             @if((isset($permissions)) && (($permissions['checklist_delete'] == 2) ))
                            <button class="btn btn-sm btn-danger remove-item-btn" data-bs-toggle="modal" data-bs-target="#deleteRecordModal" data-id="{{ $checklist->id }}">
                                Remove
                            </button>
                            @endif
                             @if((isset($permissions)) && (($permissions['checklist_view'] == 2) ))
                             <button type="button" class="btn btn-sm btn-success edit-item-btn" onclick="window.location.href='{{ route('checklist-new.show', $checklist->id) }}'">
                                View
                            </button>
                            
                           @endif
                                                                                               <button class="btn btn-sm btn-warning remove-item-btn" onclick="printAffidavit({{ $checklist->id }})">
    Print
</button>

                        </div>
                    </td>
                    @endif
                    
                    
                    <script>
    function printAffidavit(userId) {
        var printWindow = window.open('/newchecklistprint/' + userId, '_blank');
        
    }
</script>


                </tr>
            @endforeach
            @endif
        </tbody>
    </table>
    
     
  

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
    {{ $checklists->links() }}  
</div>

                    </div>
                </div><!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    <!-- end row -->

    <!-- Modal for Add Leave -->
    <!-- Modal for Edit Leave -->
<!-- Modal for Edit Leave -->


    <!-- Modal for Delete Confirmation -->
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

<!-- Description Modal -->


      <script>
$(document).ready(function() {
    $('.remove-item-btn').click(function() {
        var id = $(this).data('id');
        var action = '/checklist-new/' + id; 
        $('#deleteForm').attr('action', action);
    });

    // Handle the form submission
    $('#deleteForm').submit(function(event) {
        event.preventDefault(); // Prevent default form submission

        var form = $(this);
        
        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: form.serialize() + '&_method=DELETE', // Add the DELETE method
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Include the CSRF token
            },
            success: function(response) {
                if (response.success) {
                                        alert('checklist delete successfully')

                    $('#deleteRecordModal').modal('hide');
                    $('#checklistRow' + response.id).remove(); // Remove the deleted row
                    
                } else {
                    Swal.fire('Failed!', 'An error occurred while trying to delete the record.', 'error');
                }
            },
            error: function(response) {
                Swal.fire('Error!', 'An error occurred while trying to delete the record.', 'error');
            }
        });
    });
});



</script>
<meta name="csrf-token" content="{{ csrf_token() }}">

@endsection

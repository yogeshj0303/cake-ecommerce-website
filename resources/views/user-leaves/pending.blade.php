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
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">User Leaves</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="table" id="customerList">
                        <div class="row g-4 mb-3">
                            <div class="col-sm-auto">
                                <div>
                                    <a href="{{route('leaves.index')}}"><button type="button" class="btn btn-primary ">Back </button></a>
                                </div>
                            </div>
                           
                        </div>

                        <div class="table-responsive mt-3 mb-1">
                            <table class="table table-bordered" id="designationsTable">
                                <thead class="table-light">
                                    <tr   >
                                        <!--<th scope="col" style="width: 50px;">-->
                                        <!--    <div class="form-check">-->
                                        <!--        <input class="form-check-input" type="checkbox" id="checkAll" value="option">-->
                                        <!--    </div>-->
                                        <!--</th>-->
                                                                                  <th class="sort" data-sort="sno">ID</th>

                                        <th class="" data-sort="customer_name">User Name</th>
                                        <th class="" data-sort="state">State</th>
                                        <th class="" data-sort="dist">District</th>
                                        <th class="" data-sort="taluka">Taluka</th>
                                        <th class="" data-sort="leave_starting_date">Leave Starting Date</th>
                                        <th class="" data-sort="leave_ending_date">Leave Ending Date</th>
                                                                                <th class="" data-sort="leave_applied_ending_date">Leave days</th>
                                        <th class="" data-sort="leave_applied_ending_date">Do you want to reduce days from available leave?
                                        </th>
                                  <th class="" data-sort="leave_applied_ending_date">Leave category</th>
                                                                    <th class="" data-sort="leave_applied_ending_date">Leave Description</th>
                                        <th class="" data-sort="leave_applied_ending_date">Leave available</th>
                                                                                <th class="" data-sort="leave_applied_starting_date">Leave Applied Starting Date</th>
                                        <th class="" data-sort="leave_applied_ending_date">Leave Applied Ending Date</th>
                                        

                                        <!--<th class="sort" data-sort="leave_approved_by">Leave Approved By</th>-->
                                        <!--<th class="sort" data-sort="leave_rejecter">Leave Rejecter</th>-->
                                        <!--<th class="sort" data-sort="leave_reject_desc">Leave Rejecter's Description</th>-->
                                        <th class="" data-sort="leave_status">Leave Status</th>
                                        <th class="" data-sort="action">Action</th>
                                    </tr>
                                </thead>
                                @php $sno = 1; @endphp 

                                <tbody class="form-check-all">
                                    @foreach ($leaves as $leave)
                                    
                              <tr id="userRow{{ $leave->id }}">
                                            <!--<th scope="row">-->
                                            <!--    <div class="form-check">-->
                                            <!--        <input class="form-check-input" type="checkbox" name="chk_child" value="{{ $leave->id }}">-->
                                            <!--    </div>-->
                                            <!--</th>-->
                                                   <td>{{ $leave->id }}</td>

                                            <td class="customer_name">{{ $leave->name }} {{ $leave->middle_name }} {{ $leave->last_name }}</td>
                                            <td class="state">{{ $leave->state }}</td>
                                            <td class="dist">{{ $leave->district }}</td>
                                            <td class="taluka">{{ $leave->taluka }}</td>
                                            <td class="leave_starting_date">{{ $leave->start_date }}</td>
                                            <td class="leave_ending_date">{{ $leave->end_date }}</td>
                                                                                        <td class="leave_days">{{ $leave->leave_days }}</td>
                                                                                                                                    <td class="available_leave">{{ $leave->reduce_available_leave }}</td>
                                                                                         <td class="leave_category">{{ $leave->leave_category }}</td>
                                                                                                                                                                                  <td class="leave_category">{{ $leave->description }}</td>

                                            <td class="available_leave">{{ $leave->available_leave }}</td>

                                            <td class="leave_applied_starting_date">{{ $leave->apply_start_date }}</td>
                                            <td class="leave_applied_ending_date">{{ $leave->apply_end_date }}</td>
                                          
                                        
                                               <td   class="leave-status">
                                           
                                          
                                            @if ($leave->status == 'pending')
                                                <span class="badge bg-warning-subtle text-warning text-uppercase">Pending</span>
                                                 @elseif ($leave->status == 'approved_clerk')
                                                <span class="badge bg-warning-subtle text-warning text-uppercase">Pending from HOD</span>
                                                @elseif ($leave->status == 'approved')
                                                <span class="badge bg-success-subtle text-success text-uppercase">Approved</span>
                                                @elseif ($leave->status == 'rejected')
                                                 <span class="badge bg-danger-subtle text-danger text-uppercase">Rejected</span>
                                                   @elseif ($leave->status == 'forward')
                                                 <span class="badge bg-danger-subtle text-danger text-uppercase">forward</span>

                                                @endif
                                      </td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    
<!--                                                   <div class="dropdown">-->
<!--                                                     <div class="dropdown">-->
<!--  <form action="{{ route('leaves.updateStatus', $leave->id) }}" method="POST" id="statusForm" style="display: inline;">-->
<!--    @csrf-->
<!--    @method('PATCH')-->
<!--    <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">-->
<!--        {{ ucfirst($leave->status) }}-->
<!--    </button>-->
<!--    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">-->
<!--        <li><a class="dropdown-item" href="#" id="sa-warning" onclick="event.preventDefault(); showpendingWarning();">Pending</a></li>-->
<!--        <li><a class="dropdown-item" href="#" id="sa-warning" onclick="event.preventDefault(); showApprovedWarning();">Approved</a></li>-->
<!--        <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); showRejectModal();">Rejected</a></li>-->
<!--    </ul>-->
<!--    <select name="status" style="display: none;" id="status-select">-->
<!--        <option value="pending" {{ $leave->status == 'pending' ? 'selected' : '' }}>pending</option>-->
<!--        <option value="approved" {{ $leave->status == 'approved' ? 'selected' : '' }}>approved</option>-->
<!--        <option value="rejected" {{ $leave->status == 'rejected' ? 'selected' : '' }}>rejected</option>-->
<!--    </select>-->
<!--    <input type="hidden" name="reject_description" id="reject-description-field" value="">-->

<!--</div>-->
<!--           </form>-->




<!--<div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">-->
<!--    <div class="modal-dialog">-->
<!--        <div class="modal-content">-->
<!--            <div class="modal-header">-->
<!--                <h5 class="modal-title" id="rejectModalLabel">Reject Leave</h5>-->
<!--                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
<!--            </div>-->
<!--            <div class="modal-body">-->
<!--                <label for="reject-description-field" class="form-label">Leave Rejecter's Description</label>-->
<!--                <textarea id="reject-description-textarea" class="form-control" placeholder="Enter Reason for Rejection"></textarea>-->
<!--            </div>-->
<!--            <div class="modal-footer">-->
<!--                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>-->
<!--                <button type="button" class="btn btn-primary" onclick="submitRejectForm()">Save changes</button>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->


<!--</div>-->

                            
                            
                            
                    <!--        <div class="edit">-->

                    <!--<button type="button" class="btn btn-sm btn-primary edit-item-btn" onclick="window.location.href='{{ route('leaves.edit' ,  $leave->id) }}'">-->
                    <!--      Edit-->
                    <!--  </button>-->

                    <!--</div>-->
                    
                        <div class="edit">
                    <button type="button" class="btn btn-sm btn-success edit-item-btn" onclick="window.location.href='{{ route('leaves.show' ,  $leave->id) }}'">
                         view
                      </button>

                    </div>
                    
                    
                    
<!--                                                    <div class="remove">-->
<!--<button class="btn btn-sm btn-danger remove-item-btn" data-bs-toggle="modal" data-bs-target="#deleteRecordModal" data-id="{{ $leave->id }}">-->
<!--    Remove-->
<!--                                                    </div>-->
                                                </div>
                                            </td>
                                        </tr>
                                  
                                    @endforeach
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
    {{ $leaves->links() }}  
</div>


                        <div class="d-flex justify-content-end">
                            <!--<div class="pagination-wrap hstack gap-2">-->
                            <!--    <a class="page-item pagination-prev disabled" href="javascript:void(0);">-->
                            <!--        Previous-->
                            <!--    </a>-->
                            <!--    <ul class="pagination listjs-pagination mb-0"></ul>-->
                            <!--    <a class="page-item pagination-next" href="javascript:void(0);">-->
                            <!--        Next-->
                            <!--    </a>-->
                            <!--</div>-->
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

 <script>
    let statusToChange = '';

    function showRejectModal() {
        document.getElementById('status-select').value = 'rejected';
        var rejectModal = new bootstrap.Modal(document.getElementById('rejectModal'));
        rejectModal.show();
    }
    
    
        function showApprovedWarning() {
        Swal.fire({
            title: 'Are you sure?',
            text: "You are about to approve this leave.",
            icon: 'warning',
            showCancelButton: true,
    confirmButtonColor: 'rgb(85 87 90 / 68%)', 
    cancelButtonColor: 'rgb(220 88 44)',  
            confirmButtonText: 'Yes, approve it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('status-select').value = 'approved';
                document.getElementById('statusForm').submit();
            }
        });
    }
    
    
    
     function showpendingWarning() {
        Swal.fire({
            title: 'Are you sure?',
            text: "You are about to pending this leave.",
            icon: 'warning',
            showCancelButton: true,
    confirmButtonColor: 'rgb(85 87 90 / 68%)',  
    cancelButtonColor: 'rgb(220 88 44)',   
            confirmButtonText: 'Yes, pending it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('status-select').value = 'pending';
                document.getElementById('statusForm').submit();
            }
        });
    }



    function submitRejectForm() {
                document.getElementById('status-select').value = 'rejected';

        var rejectDescription = document.getElementById('reject-description-textarea').value;

        document.getElementById('reject-description-field').value = rejectDescription;

        document.getElementById('statusForm').submit();
    }

    function submitStatusForm() {
        document.getElementById('status-select').value = statusToChange;
        document.getElementById('statusForm').submit();
    }
</script>

    
      <script>
$(document).ready(function() {
    $('.remove-item-btn').click(function() {
        var id = $(this).data('id');
        var action = '/leaves/' + id; 
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
                if (response.success) {
                    $('#deleteRecordModal').modal('hide');
                    // Remove the deleted user row from the table
                    $('#userRow' + response.id).remove();
                    Swal.fire('Deleted!', 'The record has been deleted.', 'success');
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

@endsection

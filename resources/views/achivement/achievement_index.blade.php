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
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

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
   
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Achievement list</h4></h4>
            </div>

            <div class="card-body">
                <div class="listjs-table" id="documentList">
                    <div class="row g-4 mb-3">
                        <div class="col-sm-auto">
                            <div>
                                @if((isset($permissions)) && (  ($permissions['achievement_create'] == 2)))
                                <button type="button" class="btn btn-success add-btn" onclick="window.location.href='{{ route('achievements-add') }}'">Add</button>
                            @endif
                            <button type="button" class="btn btn-warning" onclick="window.location.href='{{ route('achievement-pending') }}'">Request</button>
                         
                             <button type="button" class="btn btn-primary" onclick="window.location.href='{{ route('getahievement.history') }}'">History</button>
                         
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
                        <th class="" data-sort="user_id">User Name</th>

            <th class="" data-sort="affidavit_name">Achievement Name</th>
            <th class="" data-sort="state">State</th>
            <th class="" data-sort="district">District</th>
            <th class="" data-sort="taluka">Taluka</th>
            <th class="" data-sort="org_id">Organization Name</th>
            <th class="" data-sort="depart_id">Department Name</th>
            <th class="" data-sort="design_id">Designation Name</th>
            <th class="" data-sort="affidavit_memo">Achievement Memo</th>
            <th class="" data-sort="reference_docs">Reference Documents</th>
           
            
             <th class="" data-sort="Reject_discription">Reject discription</th>
                                                    <th>Forwarded to</th>

            <th class="" data-sort="status">Status</th>
            <th class="" data-sort="clerk_signature">Clerk Signature</th>
             <th class="" data-sort="hod_signature">HOD Signature</th>

            @if((isset($permissions)) && ( 
    ($permissions['achievement_view'] == 2) ||
    ($permissions['achievement_edit'] == 2) || 
    ($permissions['achievement_delete'] == 2)
))
            <th class="" data-sort="action">Action</th>
            @endif
        </tr>
    </thead>
    <tbody class="list form-check-all">
        @if((isset($permissions)) && (
    ($permissions['achievement_view'] == 2) || 
    
    ($permissions['achievement_edit'] == 2) || 
    ($permissions['achievement_delete'] == 2)
))
        @foreach($achivement as $document)
        
        <tr id="documentRow{{ $document->id }}">
            <td>{{ $document->id }}</td>
                        <td>{{ $document->first_name }} {{ $document->middle_name }} {{ $document->last_name }}</td>

            <td>{{ $document->name }}</td>
            <td>{{ $document->state }}</td>
            <td>{{ $document->district }}</td>
            <td>{{ $document->taluka }}</td>
            <td>{{ $document->org_name }}</td>
            <td>{{ $document->department_name }}</td>
            <td>{{ $document->designation_name }}</td>
            <td>
                                 <!-- Eye Button -->
                <button class="btn btn-info btn-sm view-description" 
        data-description="{{ $document->achivement_memo }}" 
                        data-bs-toggle="modal" 
                        data-bs-target="#descriptionModal">
                    <i class="fas fa-eye"></i>
                </button>
                </td>


            <td>
                @if($document->refrence_docs)
                    <a href="{{ asset('images/' . $document->refrence_docs) }}" target="_blank">View Document</a>
                @else
                    N/A
                @endif
            </td>
           
            
            <td class="leave_reject_desc">{{ $document->reject_description }}</td>
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
               
                                             <td   class="status">
                                           
                                          
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
<div class="checkmark-container">
                                 
                                    <!-- Image placed over the text -->
                                                <span class="badge bg-warning-subtle text-warning text-uppercase">Pending</span>
                                </div>
                                                            
                                @endif @endif</td>
                               <td>@if($document->hod_otp_status == 1 ) <div class="checkmark-container">
                                  
                                
                                    <!-- Image placed over the text -->
                                                <span class="badge bg-success-subtle text-success text-uppercase">Approved</span>
                                </div>  @else @if($document->status == 'rejected')
                                
                                <div class="checkmark-container">
                                 
                                    <!-- Image placed over the text -->
                                                 <span class="badge bg-danger-subtle text-danger text-uppercase">Rejected</span>
                                </div>
                                
                                @else
                                    <div class="checkmark-container">
                                 
                                    <!-- Image placed over the text -->
                                                <span class="badge bg-warning-subtle text-warning text-uppercase">Pending</span>
                                </div>
                            
                                
                                
                                
                                
                                @endif  @endif
                                </td>
            
            
            @if((isset($permissions)) && (
    ($permissions['achievement_view'] == 2) ||
    ($permissions['achievement_edit'] == 2) || 
    ($permissions['achievement_delete'] == 2)
))
           <td>
    <div class="d-flex align-items-center">
        <!-- Edit Button -->
        @if((isset($permissions)) && (($permissions['achievement_edit'] == 2)))
        @if ($document->status != 'rejected'&& $document->status != 'approved_clerk' && $document->status != 'approved' )
        <button class="btn edit-item-btn btn-sm btn-primary me-2" onclick="window.location.href='{{ route('editachievement', $document->id) }}'">
            Edit
        </button>
        @endif
        @endif

        <!-- Remove Button -->
        @if((isset($permissions)) && (($permissions['achievement_delete'] == 2)))
        <button class="btn remove-item-btn btn-sm btn-danger me-2" data-bs-toggle="modal" data-bs-target="#deleteRecordModal" data-id="{{ $document->id }}">
            Remove
        </button>
        @endif

        <!-- View Button -->
        @if((isset($permissions)) && (($permissions['achievement_view'] == 2)))
        <button class="btn edit-item-btn btn-sm btn-success me-2" onclick="window.location.href='{{ route('showachivement', $document->id) }}'">
            View
        </button>
        @endif
        
                                                                                                                               <button class="btn btn-sm btn-warning remove-item-btn" onclick="printAffidavit({{ $document->id }})">
    Print
</button>


        <!-- Status Dropdown -->
        
    </div>
    
          <script>
    function printAffidavit(userId) {
        var printWindow = window.open('/achivementprint/' + userId, '_blank');
        
    }
</script>
</td>
 @endif
        </tr>
      <div class="modal fade" id="descriptionModal" tabindex="-1" aria-labelledby="descriptionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="descriptionModalLabel">Achievement Memo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalDescription">
                <!-- Description will be populated here -->
            </div>
        </div>
    </div>
</div>

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
    {{ $achivement->links() }}  
</div>


                </div>
            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end col -->
</div>
<!-- end row -->
<div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rejectModalLabel">Reject Description</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label for="reject-description-field" class="form-label">Description</label>
                <textarea id="reject-description-textarea" class="form-control" placeholder="Enter Reason for Rejection"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="submitRejectForm()">Save changes</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="forwardModal" tabindex="-1" aria-labelledby="forwardModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="forwardModalLabel">Forward</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label for="forward-select-field" class="form-label">To</label>
                <select id="forward-select-field" class="form-select">
                    <option value="">Select Staff</option>
                    <option value="person1">Person 1</option>
                    <option value="person2">Person 2</option>
                    <option value="person3">Person 3</option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="submitForwardForm()">Save changes</button>
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
document.addEventListener('DOMContentLoaded', function () {
    const viewButtons = document.querySelectorAll('.view-description');
    const modalDescription = document.getElementById('modalDescription');

    viewButtons.forEach(button => {
        button.addEventListener('click', function () {
            const description = this.getAttribute('data-description');
            modalDescription.innerHTML = description; // Insert raw HTML into the modal
        });
    });
});
</script>
 <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Function to check the status and hide/show the dropdown
        function checkStatusAndHide(dropdown, status) {
            if (status === 'approved' || status === 'rejected') {
                dropdown.style.display = 'none'; // Hide the dropdown
            } else {
                dropdown.style.display = 'block'; // Show the dropdown
            }
        }

        // Loop through each document to check initial status
        @foreach($achivement as $document) // Assuming you have $documents variable containing all documents
            const dropdown{{ $document->id }} = document.getElementById(`dropdown-{{ $document->id }}`);
            checkStatusAndHide(dropdown{{ $document->id }}, '{{ $document->status }}');
        @endforeach

        window.updateStatus = function(documentId, newStatus) {
            // Update the hidden input with the new status
            document.getElementById(`status-select-${documentId}`).value = newStatus;

            // Call the function to check status and hide dropdown
            const dropdown = document.getElementById(`dropdown-${documentId}`);
            checkStatusAndHide(dropdown, newStatus);
        };
    });

    function showRejectModal(documentId) {
        document.getElementById('status-select-' + documentId).value = 'rejected';
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
                document.getElementById('status-select-' + documentId).value = 'approved';
                document.getElementById('statusForm-' + documentId).submit();
            }
        });
    }

    function showForwardModal(documentId) {
        document.getElementById('status-select-' + documentId).value = 'forward';
        var forwardModal = new bootstrap.Modal(document.getElementById('forwardModal-' + documentId));
        forwardModal.show();
    }

   function submitRejectForm(documentId) {
    var rejectDescription = document.getElementById('reject-description-textarea-' + documentId).value;

    if (rejectDescription.trim() === "") {
        alert('Please provide a reason for rejection.');
        return;
    }

    // Set the status to 'rejected'
    document.getElementById('status-select-' + documentId).value = 'rejected';
    // Set the reason description
    document.getElementById('reason-description-field-' + documentId).value = rejectDescription;

    // Submit the form
    document.getElementById('statusForm-' + documentId).submit();
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
                var action = '/achievmentdestroy/' + id; 
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
                        console.log(response);
                        $('#deleteRecordModal').modal('hide');
                        $('#documentRow' + response.id).remove();
                        alert('Achivement deleted successfully.');
                    },
                    error: function(response) {
                        console.log(response);
                        alert('An error occurred while trying to delete the affidavit.');
                    }
                });
            });
        });
    </script>

@endsection

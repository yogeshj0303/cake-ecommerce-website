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
    
     table.dataTable thead th, table.dataTable thead td {
         border-bottom:none;
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
                    <h4 class="card-title mb-0">User Details</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="listjs-table" id="customerList">
                        <div class="row g-4 mb-3">
                            <div class="col-sm-auto">
                                <div>

                                              <button type="button" class="btn btn-primary" onclick="window.location.href='{{ route('user-details-view') }}'">
Back
</button>
                                </div>
                            </div>
                            
                        </div>

                        <div class="table-responsive  mt-3 mb-1">
                    <table class="table table-bordered align-middle table-nowrap" id="designationsTable">
    <thead class="table-light">
        <tr>
                        <th class="sort" data-sort="ID">ID</th>

            <th class="" data-sort="first_name">User Name</th>
            <th class="" data-sort="caste">Caste</th>
            <th class="" data-sort="address_B">Address B</th>
            <th class="" data-sort="father_name">Father's Name</th>
            <th class="" data-sort="father_address">Father's Address</th>
            <th class="" data-sort="birth_date">Birth Date</th>
            <th class="" data-sort="birth_text">Birth Text</th>
            <th class="" data-sort="birth_mark">Birth Mark</th>
            <th class="" data-sort="height">Height</th>
            <th class="" data-sort="qualification">Qualification</th>
            <th class="" data-sort="another_qualification">Another Qualification</th>
                        <th class="" data-sort="certificate_no">Certificate Number</th>
      <th>Forwarded to</th>
                                <th>Status</th>
                               <th >User Digital Signature</th>
                                  <th>Clerk Digital Signature</th>
                                   <th >HOD Digital Signature</th>
            <th class="" data-sort="action">Action</th>
        </tr>
    </thead>
    <tbody class="  form-check-all">
        @foreach($users as $user)
        @if($user->digital_sig == NULL)
           <tr id="userRow{{ $user->id }}">
           <td class="id">{{ $user->id ?? 'No data available' }}</td>

<td class="first_name">{{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}</td>
<td class="caste">{{ $user->caste ?? 'No data available' }}</td>
<td class="address_B">{{ $user->address_B ?? 'No data available' }}</td>
<td class="father_name">{{ $user->father_name ?? 'No data available' }}</td>
<td class="father_address">{{ $user->father_address ?? 'No data available' }}</td>
<td class="birth_date">{{ $user->birth_date ?? 'No data available' }}</td>
<td class="birth_text">{{ $user->birth_text ?? 'No data available' }}</td>
<td class="birth_mark">{{ $user->birth_mark ?? 'No data available' }}</td>
<td class="height">{{ $user->height ?? 'No data available' }}</td>
<td class="qualification">{{ $user->qualification ?? 'No data available' }}</td>
<td class="another_qualification">{{ $user->another_qualification ?? 'No data available' }}</td>
<td class="certificate_no">{{ $user->certificate_no ?? 'No data available' }}</td>
  <?php $usernameFrwd = 
                 
$usernameFrwd = DB::table('users')
    ->leftJoin('departments', 'users.depart_id', '=', 'departments.id')
    ->leftJoin('designations', 'users.design_id', '=', 'designations.id')
    ->select(
        'users.*',
        'departments.name as department_name',
        'designations.designation_name'
    )
    ->where('users.id', $user->frwd_hod_id) 
    ->first();
                 
                 ?>
<td>
    {{ $usernameFrwd ? $usernameFrwd->first_name . ' ' . $usernameFrwd->middle_name . ' ' . $usernameFrwd->last_name . '-' . $usernameFrwd->department_name . '-' . $usernameFrwd->designation_name : 'N/A' }}
</td>                                                                        <td class="status">
                                           
                                          
                                            @if ($user->status == 'pending')
                                                <span class="badge bg-warning-subtle text-warning text-uppercase">Pending</span>
                                                 @elseif ($user->status == 'approved_clerk')
                                                <span class="badge bg-warning-subtle text-warning text-uppercase">Pending from HOD</span>
                                                @elseif ($user->status == 'approved')
                                                <span class="badge bg-success-subtle text-success text-uppercase">Approved</span>
                                                @elseif ($user->status == 'rejected')
                                                 <span class="badge bg-danger-subtle text-danger text-uppercase">Rejected</span>
                                                   @elseif ($user->status == 'forward')
                                                 <span class="badge bg-danger-subtle text-danger text-uppercase">forward</span>

                                                @endif
                                      </td>
                                      <td>@if($user->user_status == 'approved' ) <div class="checkmark-container">
                                  
                                
                                    <!-- Image placed over the text -->
                                                <span class="badge bg-success-subtle text-success text-uppercase">Approved</span>
                                </div>   @else 
 <div class="checkmark-container">
                                    <!-- Signed info text -->
                                    <!-- Image placed over the text -->
                                                <span class="badge bg-warning-subtle text-warning text-uppercase">Pending</span>
                                </div>
                                                                @endif 
                                </td>
                                       <td>@if($user->clerk_otp_status == 1)  <div class="checkmark-container">
                                  
                                
                                    <!-- Image placed over the text -->
                                                <span class="badge bg-success-subtle text-success text-uppercase">Approved</span>
                                </div>@else @if($user->status == 'rejected')  <div class="checkmark-container">
                                    <!-- Signed info text -->

                                    
                                                 <span class="badge bg-danger-subtle text-danger text-uppercase">Rejected</span>
                                </div> @else 
                                
 <div class="checkmark-container">
                                    <!-- Signed info text -->
                                    <!-- Image placed over the text -->
                                                <span class="badge bg-warning-subtle text-warning text-uppercase">Pending</span>
                                </div>
                                                                @endif @endif</td>
                               <td>@if($user->hod_otp_status == 1 ) <div class="checkmark-container">
                                  
                                
                                    <!-- Image placed over the text -->
                                                <span class="badge bg-success-subtle text-success text-uppercase">Approved</span>
                                </div>  @else @if($user->status == 'rejected')  
                                
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
                                
                               
                                
                                @endif  @endif
                                </td>
<!-- Digital Signature -->
<!--<td class="digital_sig">-->
<!--    @if($user->digital_sig && in_array(pathinfo($user->digital_sig, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif' , 'pdf']))-->
<!--        <img src="{{ asset($user->digital_sig) }}" alt="Digital Signature" width="100" height="100">-->
<!--            <button class="btn btn-sm " onclick="window.open('{{ asset( $user->digital_sig) }}', '_blank')">-->
<!--                <i class="fas fa-eye"></i> -->
<!--            </button>-->

<!--    @elseif($user->digital_sig && pathinfo($user->digital_sig, PATHINFO_EXTENSION) == 'pdf')-->
<!--        <a href="{{ asset($user->digital_sig) }}" target="_blank">View PDF</a>-->
<!--            <button class="btn btn-sm" onclick="window.open('{{ asset($user->digital_sig) }}', '_blank')">-->
<!--                <i class="fas fa-eye"></i> -->
<!--            </button>-->

<!--    @else-->
<!--        No file available-->
<!--    @endif-->
<!--</td>-->

<!-- Digital Signature Verify -->
<!--<td class="digital_sig_verify">-->
<!--    @if($user->digital_sig_verify && in_array(pathinfo($user->digital_sig_verify, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif' , 'pdf']))-->
<!--        <img src="{{ asset($user->digital_sig_verify) }}" alt="Digital Signature Verify" width="100" height="100">-->
<!--                    <button class="btn btn-sm" onclick="window.open('{{ asset( $user->digital_sig) }}', '_blank')">-->
<!--                <i class="fas fa-eye"></i> -->
<!--            </button>-->

<!--    @elseif($user->digital_sig_verify && pathinfo($user->digital_sig_verify, PATHINFO_EXTENSION) == 'pdf')-->
<!--        <a href="{{ asset($user->digital_sig_verify) }}" target="_blank">View PDF</a>-->
<!--    @else-->
<!--        No file available-->
<!--    @endif-->
<!--</td>-->

<!-- Post Name (if it's a document like an image or PDF) -->
<!--<td class="post_name">-->
<!--    @if($user->post_name && in_array(pathinfo($user->post_name, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif' , 'pdf']))-->
<!--        <img src="{{ asset($user->post_name) }}" alt="Post Name Document" width="100" height="100">-->
<!--                    <button class="btn btn-sm " onclick="window.open('{{ asset($user->digital_sig) }}', '_blank')">-->
<!--                <i class="fas fa-eye"></i> -->
<!--            </button>-->

<!--    @elseif($user->post_name && pathinfo($user->post_name, PATHINFO_EXTENSION) == 'pdf')-->
<!--        <a href="{{ asset($user->post_name) }}" target="_blank">View PDF</a>-->
<!--    @else-->
<!--        No file available-->
<!--    @endif-->
<!--</td>-->

<td>
    <div class="d-flex gap-2">
        
        <!--<div class="edit">-->
            
        <!--    <button type="button" class="btn btn-sm btn-success edit-item-btn" onclick="window.location.href='{{ route('usersdetails.edit' ,  $user->id) }}'">-->
        <!--        Edit-->
        <!--    </button>-->
        <!--</div>-->

        <!--<div class="remove">-->
        <!--    <button class="btn btn-sm btn-danger remove-item-btn" data-bs-toggle="modal" data-bs-target="#deleteRecordModal" data-id="{{ $user->id }}">-->
        <!--        Remove-->
        <!--    </button>-->
        <!--</div>-->
                                                            <div class="edit">
                                                        <button type="button" class="btn btn-sm btn-success edit-item-btn" onclick="window.location.href='{{ route('usersdetailshow', $user->id) }}'">view</button>
                                                 
                                                    </div>
    </div>
</td>
        </tr>
        @endif
        @endforeach
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
    {{ $users->links() }}  
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
            var action = '/users/' + id; 
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
                    $('#userRow' + response.id).remove();
                    alert('User deleted successfully.');
                },
                error: function(response) {
                    alert('An error occurred while trying to delete the user.');
                }
            });
        });
    });


      
  </script>


@endsection




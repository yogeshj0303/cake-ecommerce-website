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
                    <h4 class="card-title mb-0">User Profile</h4>
                </div>

                <div class="card-body">
                    <div class="listjs-table" id="customerList">
                        <div class="row g-4 mb-3">
                            <div class="col-sm-auto">
                                @if((isset($permissions)) && (
    ($permissions['userprofile_create'] == 2) 
))
                                <button type="button" class="btn btn-success add-btn" onclick="window.location.href='{{ route('users.create') }}'">Add</button>
                                @endif
                                  <button type="button" class="btn btn-primary " onclick="window.location.href='{{ route('usersdetail-history') }}'">History</button>
                              
                            </div>
                        </div>

                        <div class="table-responsive  mt-3 mb-1">
                         <table class="table table-bordered" id="designationsTable">
                                <thead class="table-light">
                                    <tr>
                                        <!--<th scope="col" style="width: 50px;">-->
                                            <!--<div class="form-check">-->
                                            <!--    <input class="form-check-input" type="checkbox" id="checkAll" value="option">-->
                                            <!--</div>-->
                                        <!--</th>-->
                                        <th class="sort" data-sort="id">ID</th>

                                        <th class="" data-sort="customer_name">User Name</th>
                                        <th class="" data-sort="state">State</th>
                                        <th class="" data-sort="dist">District</th>
                                        <th class="" data-sort="taluka">Taluka</th>
                                        <th class="" data-sort="contact">Contact</th>
                                                                                <th class="sort" data-sort="contact">Email</th>

                                        <th class="" data-sort="address">Address</th>
                                          
                                             <!--<th class="" data-sort="reject_description">Reject description</th>-->
                                        <th class="" data-sort="total_leaves">Total Yearly Leaves</th>
                                        @if((isset($permissions)) && (
    ($permissions['userprofile_view'] == 2) || 
    
    ($permissions['userprofile_edit'] == 2) || 
    ($permissions['userprofile_delete'] == 2)
))
                                        <th class="" data-sort="action">Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody class="form-check-all">
                                     @if((isset($permissions)) && (
    ($permissions['userprofile_view'] == 2) || 
    
    ($permissions['userprofile_edit'] == 2) || 
    ($permissions['userprofile_delete'] == 2)
))
                                    @foreach($users as $user)
                                        <tr id="userRow{{ $user->id }}">
                                            <!--<th scope="row">-->
                                            <!--    <div class="form-check">-->
                                            <!--        <input class="form-check-input" type="checkbox" name="" value="option{{ $loop->index + 1 }}">-->
                                            <!--    </div>-->
                                            <!--</th>-->
                                            <td class="id">{{ $user->id }}</td>

                                            <td class="first_name">{{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}</td>
                                            <td class="state">{{ $user->state }}</td>
                                            <td class="dist">{{ $user->district }}</td>
                                            <td class="taluka">{{ $user->taluka }}</td>
                                            <td class="contact">{{ $user->number }}</td>
                                                                                        <td class="contact">{{ $user->email }}</td>

                                            <td class="address">{{ $user->address }}</td>
                                                                                                                            
                <!--<td class="reject_description">{{ $user->reject_description ?? 'No data available' }}</td>-->

                                            <td class="total_leaves">{{ $user->leaves }}</td>
                                             @if((isset($permissions)) && (
    ($permissions['userprofile_view'] == 2) || 
    
    ($permissions['userprofile_edit'] == 2) || 
    ($permissions['userprofile_delete'] == 2)
))
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <div class="edit">
                                                         @if((isset($permissions)) && (($permissions['userprofile_edit'] == 2)))
                                                        <button type="button" class="btn btn-sm btn-primary edit-item-btn" onclick="window.location.href='{{ route('users.edit', $user->id) }}'">Edit</button>
                                                          @endif
                                                    </div>
                                                    <div class="remove">
                                                         @if((isset($permissions)) && (($permissions['userprofile_delete'] == 2)))
                                                        <button class="btn btn-sm btn-danger remove-item-btn" data-bs-toggle="modal" data-bs-target="#deleteRecordModal" data-id="{{ $user->id }}">Remove</button>
                                                    @endif
                                                    </div>
                                                    <div class="edit">
                                                         @if((isset($permissions)) && (($permissions['userprofile_view'] == 2)))
                                                        <button type="button" class="btn btn-sm btn-success edit-item-btn" onclick="window.location.href='{{ route('users.show', $user->id) }}'">View</button>
                                                    @endif
                                                    </div>
                                                    
                                                    
                                                    <button class="btn btn-sm btn-warning remove-item-btn" onclick="printAffidavit({{ $user->id }})">
    Print
</button>

<script>
    function printAffidavit(userId) {
        var printWindow = window.open('/user-profile-print/' + userId, '_blank');
        

    }
</script>

                                                    
                                                </div>
                                            </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                            
<div class="pagination-container" style="text-align: right; margin-right: 30px;">
    {{ $users->links() }}  
</div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
          $(document).ready(function() {
              
              
        //               $('#designationsTable').DataTable({
        //     paging: false, // Disable pagination
        //     searching: false, // Disable the search bar
        //     info: false, 
        //     ordering: true, // Enable column sorting
        //                             order: [[0, 'desc']],

        // });


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

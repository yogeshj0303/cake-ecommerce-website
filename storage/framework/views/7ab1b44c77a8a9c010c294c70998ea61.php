
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.list-js'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet" type="text/css" />
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
      
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0"> Pending Salary Details</h4>
                </div>

                <div class="card-body">
                    <div class="listjs-table" id="customerList">
                        <div class="row g-4 mb-3">
                            <div class="col-sm-auto">
                                <div>
            <a href="<?php echo e(route('salary.index')); ?>"><button type="button" class="btn btn-primary ">Back </button></a>
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
                                    <th>Organization Name</th>
                                    <th>Department Name</th>
                                    <th>Designation Name</th>
                                    <th>Caste</th>
                                    <th>Joining Date</th>
                                      <th>Slap Amount</th>
                                     <th>Grade Amount</th>
                                                                          <th>Merge Amount</th>
                                     <th>Direct Add Salary</th>

                                      <th>Direct Add Total Salary </th>
                                    <th>Last Approved Salary</th>
                                                                        <th>Level</th>
                                    <th>Salary Amount</th>
                                                                        <th>Document</th>
                                                                        <th>Forwarded To</th>
                                                                       <th>Status</th>
                                      <th>Reject Description</th>
                                      <th class="sort" data-sort="taluka">Clerk Status</th>
                                      <th class="sort" data-sort="taluka">HOD Status</th>


                                    <?php if((isset($permissions)) && (($permissions['salary_view'] == 2) ||($permissions['salary_edit'] == 2) || 
                                        ($permissions['salary_delete'] == 2))): ?>
                                    <th>Actions</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                                                                                                    <?php $sno = 1; ?> 

                            <tbody class="form-check-all">
                                   <?php if((isset($permissions)) && (($permissions['salary_view'] == 2) ||($permissions['salary_edit'] == 2) || ($permissions['salary_delete'] == 2))): ?>
                                <?php $__currentLoopData = $salaries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $salary): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               
                                <tr id="userRow<?php echo e($salary->id); ?>">
                                                                         <td><?php echo e($salary->id); ?></td>

                                    <td><?php echo e($salary->first_name); ?> <?php echo e($salary->middle_name); ?> <?php echo e($salary->last_name); ?></td>
                                    <td><?php echo e($salary->state); ?></td>
                                    <td><?php echo e($salary->district); ?></td>
                                    <td><?php echo e($salary->taluka); ?></td>
                                    <td><?php echo e($salary->org_name); ?></td>
                                    <td><?php echo e($salary->department_name); ?></td>
                                    <td><?php echo e($salary->designation_name); ?></td>
                                                <td><?php echo e($salary->caste); ?></td>
            <td><?php echo e($salary->joining_date); ?></td>
            <td><?php echo e($salary->slap_amount); ?></td>
            <td><?php echo e($salary->grade_amount); ?></td>
<td><?php echo e($salary->merge_amount ?? 'N/A'); ?></td>

<td><?php echo e($salary->direct_added_amount ?? 'N/A'); ?></td>

<td><?php echo e($salary->direct_total_salary ?? 'N/A'); ?></td>

            <td><?php echo e($salary->last_salary); ?></td>
            <td><?php echo e($salary->label); ?></td>
            <td><?php echo e($salary->salary_amount); ?></td>
            <td>
                <?php if($salary->reference_document): ?>
                    <a href="<?php echo e(asset('uploads/' . $salary->reference_document)); ?>" target="_blank">View Document</a>
                <?php else: ?>
                    No Document
                <?php endif; ?>
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
    ->where('users.id', $salary->frwd_hod_id) 
    ->first();
                 
                 ?>
<td>
    <?php echo e($usernameFrwd ? $usernameFrwd->first_name . ' ' . $usernameFrwd->middle_name . ' ' . $usernameFrwd->last_name . '-' . $usernameFrwd->department_name . '-' . $usernameFrwd->designation_name : 'N/A'); ?>

</td>           

            <td>
            
                                                         <?php if($salary->status == 'pending'): ?>
                                                <span class="badge bg-warning-subtle text-warning text-uppercase">Pending</span>
                                                 <?php elseif($salary->status == 'approved_clerk'): ?>
                                                <span class="badge bg-warning-subtle text-warning text-uppercase">Pending from HOD</span>
                                                <?php elseif($salary->status == 'approved'): ?>
                                                <span class="badge bg-success-subtle text-success text-uppercase">Approved</span>
                                                <?php elseif($salary->status == 'rejected'): ?>
                                                 <span class="badge bg-danger-subtle text-danger text-uppercase">Rejected</span>
                                                   <?php elseif($salary->status == 'forward'): ?>
                                                 <span class="badge bg-danger-subtle text-danger text-uppercase">forward</span>

                                                <?php endif; ?>

                                                </td>
                                                 <td>
                                 <!-- Eye Button -->
                <button class="btn btn-info btn-sm view-description" 
                        data-description="<?php echo e($salary->reject_description); ?>" 
                        data-bs-toggle="modal" 
                        data-bs-target="#descriptionModal">
                    <i class="fas fa-eye"></i>
                </button>
                </td>
                                     <td><?php if($salary->clerk_otp_status == 1): ?>  <div class="checkmark-container">
                                  
                                
                                    <!-- Image placed over the text -->
                                                <span class="badge bg-success-subtle text-success text-uppercase">Approved</span>
                                </div><?php else: ?> <?php if($salary->status == 'rejected'): ?>  <div class="checkmark-container">
                                    <!-- Signed info text -->
                                  
                                    
                                                 <span class="badge bg-danger-subtle text-danger text-uppercase">Rejected</span>
                                </div> <?php else: ?>
 <div class="checkmark-container">
                                    <!-- Signed info text -->
                                    
                                    <!-- Image placed over the text -->
                                                                                <span class="badge bg-warning-subtle text-warning text-uppercase">Pending</span>
                                </div>
                             
                                
                                <?php endif; ?> <?php endif; ?></td>
                               <td><?php if($salary->hod_otp_status == 1 ): ?> <div class="checkmark-container">
                                  
                                
                                    <!-- Image placed over the text -->
                                                <span class="badge bg-success-subtle text-success text-uppercase">Approved</span>
                                </div>  <?php else: ?> <?php if($salary->status == 'rejected'): ?> 
                                
                                <div class="checkmark-container">
                                    <!-- Signed info text -->
                                    
                                    <!-- Image placed over the text -->
                                                 <span class="badge bg-danger-subtle text-danger text-uppercase">Rejected</span>
                                </div>
                                
                                <?php else: ?>
                                   <div class="checkmark-container">
                                    <!-- Signed info text -->
                                    
                                    <!-- Image placed over the text -->
                                                                                <span class="badge bg-warning-subtle text-warning text-uppercase">Pending</span>
                                </div>
                             

                                
                                <?php endif; ?>  <?php endif; ?>
                                </td>

            
            <td>
                
                

                                                                                               <button class="btn btn-sm btn-success" onclick="window.location.href='<?php echo e(route('viewsalary', $salary->id)); ?>'">
    View
</button>

     
            </td>

                                 
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
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
    <?php echo e($salaries->links()); ?>  
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
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-sm btn-light">Yes, delete it</button>
                </form>
            </div>
        </div>
    </div>
</div>





<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>


    <script src="<?php echo e(URL::asset('build/libs/prismjs/prism.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/list.js/list.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/list.pagination.js/list.pagination.min.js')); ?>"></script>

    <!-- listjs init -->
    <script src="<?php echo e(URL::asset('build/js/pages/listjs.init.js')); ?>"></script>

    <script src="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
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
<div class="modal fade" id="descriptionModal" tabindex="-1" aria-labelledby="descriptionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="descriptionModalLabel"> Reject Description</h5>
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
$(document).ready(function() {
    $('.remove-item-btn').click(function() {
        var id = $(this).data('id');
        var action = '/salary/' + id; 
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
                    $('#deleteRecordModal').modal('hide');
                    $('#userRow' + response.id).remove(); // Remove the deleted row
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
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u532655452/domains/eofficess.com/public_html/resources/views/salary/pending.blade.php ENDPATH**/ ?>
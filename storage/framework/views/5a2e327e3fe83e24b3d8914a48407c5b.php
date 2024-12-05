
<?php $__env->startSection('title'); ?> Tehshils <?php $__env->stopSection(); ?>




<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />


<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
                        <?php



?>
<div class="row">
   

   <div class="col-xxl-6">
    <div class="card">
        <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">Update Tehsil</h4>
        </div>
        <div class="card-body">
            <div class="live-preview">
                <!-- Update the form action to point to the tehsil.update route with the tehsil ID -->
                <form action="<?php echo e(route('tehsil.update', $tehsil->id)); ?>" method="POST" class="row g-3">
                    <?php echo csrf_field(); ?>
                    <!-- Add hidden method field for PUT request -->
                    <?php echo method_field('PUT'); ?>

                    <div class="col-md-12">
                        <input type="hidden" name="owner_id" value="<?php echo e(Auth::user()->id); ?>">
                        
                        <label for="state" class="form-label">State Name</label>
                        <select id="state" name="state" class="form-select mb-3" required>
                            <option value="">Select state</option>
                            <?php $__currentLoopData = $statesData['states']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($state['state']); ?>" <?php echo e($state['state'] == $tehsil->state_name ? 'selected' : ''); ?>>
                                    <?php echo e($state['state']); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['state'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback" style="color: red;">
                                <?php echo e($message); ?>

                            </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="col-md-12">
                        <label for="district" class="form-label">District Name</label>
                        <select id="district" name="dist" class="form-select mb-3" required>
                            <option value="">Select District</option>
                            <option value="<?php echo e($tehsil->district_name); ?>" selected><?php echo e($tehsil->district_name); ?></option>
                            <!-- Add other district options dynamically if necessary -->
                        </select>
                    </div>

                    <div class="col-md-12">
                        <label for="tehshil_name" class="form-label">Tehsil Name</label>
                        <input type="text" name="tehshil_name" class="form-control <?php $__errorArgs = ['tehshil_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                               id="tehshil_name" placeholder="Enter tehsil name" value="<?php echo e($tehsil->th_name); ?>">
                        <?php $__errorArgs = ['tehshil_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback" style="color: red;">
                                <?php echo e($message); ?>

                            </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="col-12">
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
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
          
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="<?php echo e(URL::asset('build/js/pages/select2.init.js')); ?>"></script>


        
        
<script>
    $(document).ready(function() {
        $('#district').select2({
            placeholder: 'Select District',
            allowClear: true
        });
    });
    
    
    
     $(document).ready(function() {
        $('#state').select2({
            placeholder: 'Select state',
            allowClear: true
        });
    });
    

</script>

<script>
    
    
    
    
        $(document).ready(function() {
            // Handle state selection change
            $('#state').change(function() {
                var state = $(this).val();
                var statesData = <?php echo json_encode($statesData['states'], 15, 512) ?>; // Pass states data to JavaScript

                var districtDropdown = $('#district');
                districtDropdown.empty().append('<option value="">Select District</option>'); // Clear existing options

                var selectedState = statesData.find(function(item) {
                    return item.state === state;
                });

                if (selectedState) {
                    selectedState.districts.forEach(function(district) {
                        districtDropdown.append($('<option>', {
                            value: district,
                            text: district
                        }));
                    });
                }

                $('#taluka-field').empty().append('<option value="">Select Taluka</option>');
                $('#name').empty().append('<option value="">Select Profile Name</option>'); // Clear existing options
            });

            // Handle district selection change
            $('#district').change(function() {
                var state = $('#state').val();
                var district = $(this).val();

                if (state && district) {
                    $.ajax({
                        url: '<?php echo e(route('tehsils.get')); ?>', // Ensure this matches your route
                        type: 'GET',
                        data: { state: state, district: district },
                        success: function(response) {
                            var talukaDropdown = $('#taluka-field');
                            talukaDropdown.empty().append('<option value="">Select Taluka</option>'); 

                            response.forEach(function(taluka) {
                                talukaDropdown.append($('<option>', {
                                    value: taluka,
                                    text: taluka
                                }));
                            });
                        },
                        error: function(xhr) {
                            console.error('Error fetching talukas:', xhr.responseText);
                        }
                        
                        
                    });
                
                    
                    
                    
                }
                
                
                
                
                
                
                        
                
                
            });

            // Handle taluka selection change
            $('#taluka-field').change(function() {
                var state = $('#state').val();
                var district = $('#district').val();
                var taluka = $(this).val(); 

                if (state && district && taluka) {
                    $.ajax({
                        url: '<?php echo e(route('fetch.profiles')); ?>',
                        type: 'GET',
                        data: { state: state, district: district, taluka: taluka },
                        success: function(response) {
                            var profileDropdown = $('#name');
                            profileDropdown.empty().append('<option value="">Select Profile Name</option>');

                            response.forEach(function(user) {
                                profileDropdown.append($('<option>', {
                                    value: user.id,
                                    text: `${user.first_name} ${user.last_name}`
                                }));
                            });
                        },
                        error: function(xhr) {
                            console.error('Error fetching profiles:', xhr.responseText);
                        }
                    });
                }
            });
        });
        
        
        
        
        
        
        
        
        
        
        $('#district').change(function() {
    var state = $('#state').val();
    var district = $(this).val();

    if (state && district) {
        // AJAX request to fetch organisations
        $.ajax({
            url: '<?php echo e(route('organisations.get')); ?>',
            type: 'GET',
            data: { state: state, district: district },
            success: function(response) {
                var organisationDropdown = $('#organisation');
                organisationDropdown.empty().append('<option value="">Select Organisation</option>');

                if (response.length === 0) {
                    console.warn('No organisations found for the selected district.');
                } else {
                    response.forEach(function(org) {
                        organisationDropdown.append($('<option>', {
                            value: org.id,
                            text: org.org_name
                        }));
                    });
                }
            },
            error: function(xhr) {
                console.error('Error fetching organisations:', xhr.responseText);
            }
        });
    } else {
        console.warn('State or district is missing.');
    }
});


        
        
        
        
        
</script>



<script>
    $(document).ready(function() {
    // Handle Remove Tehsil Modal and form submission
    $('.remove-item-btn').click(function() {
        var id = $(this).data('id');
        $('#deleteForm').attr('action', '/tehshil/' + id); // Update the form action to tehsils
    });

    // Handle Delete Tehsil Form Submission
    $('#deleteForm').submit(function(event) {
        event.preventDefault();

        var form = $(this);
        var actionUrl = form.attr('action');
        var id = actionUrl.split('/').pop(); // Extract ID from URL

        $.ajax({
            url: actionUrl,
            type: 'DELETE',
            data: form.serialize(),
            success: function(response) {
                $('#tehsilRow' + id).remove(); // Updated to reflect tehsil row
                $('#deleteRecordModal').modal('hide');
                alert('Tehsil deleted successfully.');
            },
            error: function(response) {
                alert('An error occurred while trying to delete the tehsil.');
            }
        });
    });
});

</script>


<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u532655452/domains/eofficess.com/public_html/resources/views/checklist-master/tehsil_edit.blade.php ENDPATH**/ ?>
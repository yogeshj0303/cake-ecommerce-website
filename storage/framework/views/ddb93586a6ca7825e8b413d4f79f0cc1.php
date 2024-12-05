
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.new-page-title'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <style>
    
      .button-container {
            display: flex;
            justify-content: center; /* Center the buttons horizontally */
            margin-top: 20px; /* Add space at the top of the button section */
        }

        .btn {
            margin: 0 10px; /* Space between the buttons */
        }
    .checkmark-container {
    position: relative;
    padding: 20px 86px;
    border-radius: 8px;
    max-width: 228px;
    margin: 0 auto;
    text-align: center;
    height: 100px; /* Adjust as per your image size */
}

.signed-info {
    position: absolute;
    top: 65%;
    left: 50%;
    transform: translate(-50%, -50%); /* Center the text over the image */
    font-size: 10px; /* Adjust text size */
    color: black;
    font-weight: bold;
    text-align: center;
    z-index: 1; /* Ensure text is above the image */
}

.checkmark {
    position: absolute;
    top: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 110px; /* Adjust size of the image */
    height: auto;
    z-index: 0; /* Image stays behind the text */
    opacity: 0.4; /* Lighten the checkmark to make text more visible */
}

    
        /*body {*/
        /*    font-family: Arial, sans-serif;*/
        /*    margin: 0;*/
        /*    padding: 0;*/
        /*    display: flex;*/
        /*    justify-content: center;*/
        /*    align-items: flex-start;*/
        /*    height: 100vh;*/
        /*    background-color: #f4f4f4;*/
        /*}*/

        /*.row {*/
        /*    display: flex !important;*/
        /*    width: 100% !important;*/
        /*    height: 90% !important;*/
        /*    background-color: white !important;*/
        /*    border: 1px solid #ccc !important;*/
        /*    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.5) !important;*/
        /*    margin-top: 30px !important;*/
        /*}*/

        .ele-left-div {
            width: 50%;
            padding: 0px 1px;
            position: relative;
            border-right: 1px solid #ccc;
        }

        .ele-left-div button {
            padding: 2px 15px;
            border: none;
            background-color: #0056ac;
            color: white;
            font-size: 14px;
            margin-right: 10px;
            cursor: pointer;
            border-radius: 3px;
        }

        .ele-left-div button.remove {
            background-color: #d2d0d0;
        }

        .ele-watermark {
            position: absolute;
    left: 100px;
    font-size: 70px;
    color: rgba(0, 0, 0, 0.05);
    transform: rotate(-30deg);
    user-select: none;
    margin-top: 200px;
}
        

.ele-right-div {
    width: 50%;
    padding: 20px;
    display: flex;
    flex-direction: column;
    position: relative;
     overflow-y: auto; /* Scrollable form content */
    /*margin-bottom: 20px;*/
    overflow-x: hidden;
    height:600px;
}

.ele-form-section {
    flex-grow: 1; /* Makes the form content take up remaining space */
    overflow-y: auto; /* Scrollable form content */
    margin-bottom: 20px;
    overflow-x: hidden;
}



        .ele-right-div h3 {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 18px;
        }

        .ele-form-section {
            margin-bottom: 20px;
           
        }

        .ele-form-section h4 {
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .ele-form-section h4 .radio {
            display: flex;
            align-items: center;
        }

        .ele-form-section h4 .radio label {
            margin-right: 10px;
             margin-top: 10px;
        }

        .ele-form-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            margin-right: 10px;
            gap:5px;
        }

        .ele-form-row .form-group {
            /*width: 42% !important;*/
            margin: 0 10px;
        }

        .ele-form-group label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
        }

        .ele-form-group input {
            width: 100%;
            padding: 8px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        .ele-form-group select{
            width: 107% !important;
            padding: 8px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        .ele-right-div h3{
            /*background-color: #d2d0d0;*/
            color: #000;
            font-size: 12px;
            padding: 5px;
        }
        .ele-form-section h4{
            /*background-color: #d2d0d0;*/
            /*color: #000;*/
            font-size: 18px;
            padding: 5px;
        }
        #minDeptother{
            width: 500px !important;
        }
   .ele-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background-color: white; /* Set the background color to white */
    padding: 10px;
    position: sticky; /* Keeps the footer visible at the bottom */
    bottom: 0;
    left: 0;
    width: 100%;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.6);
    z-index: 1000; /* Ensure the footer is above other content */
}

    .card-footer button{
        background-color: #0056ac;
        color: #fff;
        padding: 5px 15px;
        border: none;
        border-radius: 5px;
    }
    #fileInput {
            display: none;
        }
         .file-name {
            margin-top: 10px;
            font-size: 14px;
            color: #555;
        }
       
 
.elebtn{
    /*background-color:#FFF;*/
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.4);
      padding:5px;
display:flex;
      
}
.elesec1{
    border:1px solid #ddd;
    padding:10px;
     /*box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.4);*/
}
.live-preview {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
}

.progress-container {
    display: flex;
    justify-content: space-between;
    width: 100%;
}

.progress-step-arrow {
    flex: 1; /* Allows the progress bar to take up available space */
    margin: 0 10px; /* Optional: Adds space between progress bars */
}

.progress-bar {
   margin:0 10px;
}
.progress-step-arrow {
    height: 1.78rem !important;
}
.progress-step-arrow .progress-bar:after {
    
     bottom: 5px !important; 
    
}
.progress-info .progress-bar {
   background-color: #70769b !important;
    color:#fff !important;
}
.progress-info .progress-bar:after {
    border-left-color:  #70769b  !important;
     color:#fff !important;
    
}
.progress-barr {
    display: flex;
    flex-direction: column;
    justify-content: center;
    font-size: .875rem;
    
}

.ql-toolbar.ql-snow{
    background-color:white;
}
.ql-editor {
    background-color:#ecffec;
}


#memo-editors .ql-editor {
    background-color:white;
}

.custom-btn {
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 105px; /* Adjust the width as needed */
    padding:0px;
    background-color: #fff; /* Button background color */
    color: black;
    border: 1px sloid black;
    /*border-radius: 5px;*/
    position: relative;
    text-align: center;
    margin:5px 10px;
    
}

.custom-btn i {
    font-size: 15px;
    margin-right: 5px; /* Space between icon and border */
    background: #3F51B5;
    /*padding:5px;*/
    color:#fff;
}

.custom-btn span {
    flex-grow: 1;
    text-align: center;
    /*border-left: 1px solid #000;  */
    padding-left: 5px;
   
}
/**/
       
    </style>


    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

            <a href="<?php echo e(url()->previous()); ?>"><button type="button" style="margin: -49px 33px; float:right "  class="btn btn-primary ">Back </button></a>

<div class="row" style="display:flex; 
    border: 1px solid #ccc !important;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.5) !important; margin-top:40px;">
 
    <div class="card" style=" width: 50%;
        padding: 0px 1px;
        position: relative;
        border-right: 1px solid #ccc;
           background-color:#white;
            overflow-y: auto;
              overflow-x: hidden;
    height: 600px;
        ">
    <div class="card-header  text-white" style="background-color:#b6e8b6">
        <h5 class="mb-0">Add Green-Note</h5>
    </div>
    <?php
$leaveNotes = DB::table('salarynotes')
    
    ->where('leave_id', $salary->id)
    ->get();
?>
<?php if($leaveNotes->count() > 0): ?>
    <div class="row">
        <div>
            <div>
                <?php $__currentLoopData = $leaveNotes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leaveNote): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
$note_user_data = DB::table('users')
    ->leftJoin('departments', 'users.depart_id', '=', 'departments.id')
    ->leftJoin('designations', 'users.design_id', '=', 'designations.id')
    ->where('users.id', $leaveNote->user_id)
    ->select(
        'users.*',
        'departments.name as department_name',
        'designations.designation_name'
    )
    ->first();
                    $designation = isset($note_user_data) ? DB::table('designations')->where('id', $note_user_data->design_id)->first() : null;
                    ?>
                    
                    <?php if(isset($leaveNote->note) && !empty($leaveNote->note)): ?>
                        <div style="padding: 5px;">
                            <h6 style="color:000;"><u>Note#<?php echo e($loop->iteration); ?></u></h6>
                            
                            <?php echo strip_tags($leaveNote->note, '<p><strong><em><ul><ol><li><br>'); ?>

                        </div>
                        <div style="display: flex; justify-content: space-between; border-bottom: 2px solid #acddac;padding: 10px 5px;align-items: center;">
                           
<div></div>
                            <?php if(isset($note_user_data) && !empty($note_user_data->first_name)): ?>
                                <span>
                                    
                                 <div class="checkmark-container">
    <?php if($leaveNote->verify == 1): ?>
        <img src="<?php echo e(asset('checkmark-new.png')); ?>" alt="Checkmark" class="checkmark">
    <?php endif; ?> <!-- Checkmark image -->
    
      <?php if($leaveNote->verify == 2): ?>
        <img src="<?php echo e(asset('crossred2.png')); ?>" alt="Checkmark" class="checkmark">
    <?php endif; ?> <!-- Checkmark image -->
   
    
    <div class="signed-info">
        <p style="margin: 0px; font-size:13px;"><?php echo e($note_user_data->first_name); ?> <?php echo e($note_user_data->middle_name); ?> <?php echo e($note_user_data->last_name); ?> - <?php echo e($note_user_data->department_name); ?> - <?php echo e($note_user_data->designation_name); ?></p>

        <?php if(isset($designation) && !empty($designation->designation_name)): ?>
        <?php endif; ?>
 <?php if(isset($leaveNote->add_date) && !empty($leaveNote->add_date)): ?>
                               <?php echo e(\Carbon\Carbon::parse($leaveNote->add_date)->format('d-m-y h:i A')); ?>


                            <?php endif; ?>
        <?php if($leaveNote->verify == 1): ?>
            <button class="custom-btn">
                <i class="fa fa-check"></i>
                <span>Digital Signed</span>
            </button>
        <?php endif; ?>
        
    </div>
</div>


                                    
                                </span>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php
                                   $role = DB::table('roles')->where('id', Auth::user()->role_name)->first();

?>
<?php if(Auth::user()->is_admin != 'admin'): ?>
<?php if($salary->status == 'pending' || ($salary->status == 'approved_clerk' &&  $role->role_name == 'HOD' )): ?>
<div class="row" id="greenNoteField" style="margin-top: 0px;">
    <div class="form-group col-md-12">
        <div id="memo-editor" class="memo-editor" contenteditable="true" 
             style="border: 1px solid #ccc; height: 200px; background-color: #cfd2cc; 
             overflow-y: auto; padding: 10px; overflow-x: hidden;">
        </div>
        <textarea id="memo" name="salary_green_note_dis" style="display: none; background-color: #ecffec;"></textarea>
    </div>
</div>
<?php endif; ?>
<?php endif; ?>



<?php 
    $letter = DB::table('salaryletters')->where('leave_id', $salary->id)->latest()->first();
?>

 <div class="card-header  text-white" style="background-color:#e1bf5080">
        <h5 class="mb-0">Add Letters</h5>
    </div>
   <div class="row" id="greenNoteField_letter" style="margin-top: 0px;">
    <div class="form-group col-md-12">
        <div id="memo-editors" class="memo-editors" contenteditable="true" 
             style="border: 1px solid #ccc; height: 250px; background-color: white !important; 
             overflow-y: auto; padding: 10px; overflow-x: hidden;">
            <?php echo isset($letter) && $letter->note ? $letter->note : ''; ?>

        </div>
        
        <textarea id="salary_letter_note_dis" name="salary_letter_note_dis" style="display: none; background-color: white;">
            <?php echo e(isset($letter) && $letter->note ? $letter->note : ''); ?>

        </textarea>
    </div>
</div>



<!--<h3 class="latters-heading" style="margin-top: 15px; font-size:18px;" >Add Green-Note</h3>-->
<!--<div class="row" id="greenNoteField" style="margin-top: 0px;">-->
<!--    <div class="form-group col-md-12">-->
<!--        <div id="memo-editor" class="editor" contenteditable="true" -->
<!--             style="border: 1px solid #ccc; height: 250px; background-color: #ecffec;-->
<!--; -->
<!--             overflow-y: auto; padding: 10px; overflow-x: hidden;">-->
         
<!--        </div>-->
<!--        <textarea id="memo" name="green_note_dis" style="display: none; background-color: #ecffec;"></textarea>-->
<!--    </div>-->
<!--</div>-->
<!-- Add Letters Section with white background -->
<!--<h3 class="latters-heading" style="margin-top: 15px;font-size:18px;">Add Letters</h3>-->
<!--<div class="row" id="lettersField" style="margin-top: 0px;">-->
<!--    <div class="form-group col-md-12">-->
<!--        <div id="letters-editor" class="editor" contenteditable="true" -->
<!--             style="border: 1px solid #ccc; height: 250px; background-color: white !important; -->
<!--             overflow-y: auto; padding: 10px; overflow-x: hidden;">-->

<!--        </div>-->
<!--        <textarea id="letters-textarea" name="letters_dis" style="display: none; background-color: white;"></textarea>-->
<!--    </div>-->
<!--</div>-->



    </div>
    
    
    <!-- Right Div (Form Details) -->
    <div class="card" style="  width: 50%;
        padding: 20px;
        display: flex;
        flex-direction: column;
        position: relative;
        overflow-y: auto;
        height:600px;">
        
        <h3 style="font-size: 17px;">
            <span><i class="fa-solid fa-book"></i> Salary Details</span>
        </h3>

         
        <div class="row mb-3">
        <div class="col-md-4">
            <label for="state" class="form-label">State</label>
            <input type="text" id="state" name="state" class="form-control" value="<?php echo e($salary->state); ?>" readonly>
        </div>
        <div class="col-md-4">
            <label for="district" class="form-label">District</label>
            <input type="text" id="district" name="district" class="form-control" value="<?php echo e($salary->district); ?>" readonly>
        </div>
        <div class="col-md-4">
            <label for="organisation" class="form-label">Organization</label>
            <input type="text" id="organisation" name="organisation" class="form-control" value="<?php echo e($salary->org_name); ?>" readonly>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-4">
            <label for="department_name" class="form-label">Department</label>
            <input type="text" id="department_name" name="department_name" class="form-control" value="<?php echo e($salary->name); ?>" readonly>
        </div>
        <div class="col-md-4">
            <label for="taluka-field" class="form-label">Taluka</label>
            <input type="text" id="taluka-field" name="taluka" class="form-control" value="<?php echo e($salary->taluka); ?>" readonly>
        </div>
        <div class="col-md-4">
            <label for="designation" class="form-label">Designation</label>
            <input type="text" id="designation" name="designation" class="form-control" value="<?php echo e($salary->designation_name); ?>" readonly>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="name" class="form-label">Profile Name</label>
            <input type="text" id="name" name="user_id" class="form-control" value="<?php echo e($salary->first_name); ?>" readonly>
        </div>
        <div class="col-md-6">
            <label for="joining_date" class="form-label">Job Joining Date</label>
            <input type="" id="joining_date" name="joining_date" class="form-control" value="<?php echo e($salary->joining_date); ?>" readonly>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="cast" class="form-label">Caste</label>
            <input type="text" id="cast" name="cast" class="form-control" value="<?php echo e($salary->caste); ?>" readonly>
        </div>
        <div class="col-md-6">
            <label for="last_approved_salary" class="form-label">Last Approved Salary</label>
            <input type="text" id="last_approved_salary" name="last_approved_salary" class="form-control" value="<?php echo e($salary->last_salary); ?>" readonly>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="slap_amount" class="form-label">Slap Amount</label>
            <input type="text" id="slap_amount" name="slap_amount" class="form-control" value="<?php echo e($salary->slap_amount); ?>" readonly>
        </div>
        <div class="col-md-6">
            <label for="grade_amount" class="form-label">Grade Amount</label>
            <input type="text" id="grade_amount" name="grade_amount" class="form-control" value="<?php echo e($salary->grade_amount); ?>" readonly>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-4">
            <label for="direct_added_amount" class="form-label">Direct Add Salary</label>
            <input type="text" id="direct_added_amount" name="direct_added_amount" class="form-control" value="<?php echo e($salary->direct_added_amount); ?>" readonly>
        </div>
         <div class="col-md-4">
            <label for="direct_added_amount" class="form-label">Merged Amount</label>
            <input type="text" id="merge_amount" name="merge_amount" class="form-control" value="<?php echo e($salary->merge_amount); ?>" readonly>
        </div>
                <div class="col-md-4">
            <label for="direct_added_amount" class="form-label">Direct Add Total Salary</label>
            <input type="text" id="direct_total_salary" name="direct_total_salary" class="form-control" value="<?php echo e($salary->direct_total_salary); ?>" readonly>
        </div>

    </div>

    <div class="row mb-3">
                    <div class="col-md-6">
            <label for="label" class="form-label">Level</label>
            <input type="text" id="label" name="label" class="form-control" value="<?php echo e($salary->label); ?>" readonly>
        </div>
                            <div class="col-md-6">


            <label for="salary_amount" class="form-label">Salary Amount</label>
            <input type="text" id="salary_amount" name="salary_amount" class="form-control" value="<?php echo e($salary->salary_amount); ?>" readonly>
            </div>
    </div>

  <div class="row mb-3">
    <div class="col-md-12">
        <label for="reference_document" class="form-label">Reference Document : </label>
        <a href="<?php echo e($salary->reference_document ? asset('uploads/'.$salary->reference_document) : '#'); ?>" 
           target="_blank" 
           id="reference_document" 
           name="reference_document">
            <?php echo e($salary->reference_document ? 'View Document' : 'No Document Uploaded'); ?>

        </a>
    </div>
</div>



          <div class="row mb-3">
               
               
            <div class="col-md-12 mb-3">
               
                <form action="<?php echo e(route('salary-update-status', $salary->id)); ?>" id="achievement-form" method="POST">
 
    <?php echo csrf_field(); ?>
    <?php echo method_field('PATCH'); ?>

    <div class="row">
        <div class="col-md-12 mb-3">
            <?php if(($salary->status =='pending' || ($salary->status == 'approved_clerk' && $salary->frwd_hod_id == Auth::user()->id )) && Auth::user()->is_admin == 'staff' ): ?>
          
            <!-- Approve Button -->
              <button type="button" id="send-button" class="btn btn-primary me-2" data-docuser="<?php echo e($salary->id); ?>" >Send</button>

              
            <button type="button" id="approve-button" class="btn btn-success me-2" data-docuser ="<?php echo e($salary->id); ?>" >Send & Sign</button>

            <!-- Reject Button -->
            <button type="button" id="reject-button" class="btn btn-danger">Reject</button>
            <?php elseif(($salary->status == 'pending' || $salary->status == 'approved_clerk') && Auth::user()->is_admin != 'staff'): ?>
                   <button type="button"  class="btn btn-warning me-2"  >Pending</button>
            <?php elseif($salary->status == 'approved'): ?>
              <button type="button"  class="btn btn-success me-2">Approved</button>
            <?php elseif($salary->status == 'rejected'): ?>
            <button type="button"  class="btn btn-danger">Rejected</button>
              <?php endif; ?>
        </div>
    </div>

    <!-- Hidden input field for status -->
    <input type="hidden" name="status" id="status-field" value="">
        <input type="hidden" name="green_not_reject" id="green_not_reject" value="" >
        
        <input type="hidden" name="letter_note" id="letter_note" value="" >


    <!-- Hidden input field for rejection description -->
    <input type="hidden" name="reject_description" id="reject-description-field" value="">

    <!-- Rejection Modal (Ensure this modal is included in your HTML) -->
    <div class="modal fade" id="rejectionModal" tabindex="-1" aria-labelledby="rejectionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="rejectionModalLabel">Rejection Reason</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <textarea id="reject-description-field-modal" class="form-control" placeholder="Enter rejection reason"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="submit-reject" class="btn btn-danger">Submit Rejection</button>
                </div>
            </div>
        </div>
    </div>
</form>
 <?php
                                   $role = DB::table('roles')->where('id', Auth::user()->role_name)->first();
$letter_user = DB::table('users')->where('id', $salary->user_id)->first();
$staffs = DB::table('users')
    ->join('departments', 'users.depart_id', '=', 'departments.id') 
    ->join('designations', 'users.design_id', '=', 'designations.id')
    ->where('users.id', '!=', Auth::user()->id)
    ->where('users.is_admin', 'staff')  
    ->where('users.state', $letter_user->state)  // Match state
    ->where('users.district', $letter_user->district)  // Match district
    ->where('users.org_id', $letter_user->org_id)  // Match organization ID
    ->where(function($query) use ($letter_user) {
        // Match taluka if it exists, or if the staff taluka is null
        $query->whereNull('users.taluka')
              ->orWhere('users.taluka', $letter_user->taluka);
    })
    ->where('users.depart_id', $letter_user->depart_id)  // Match department ID
    ->where('users.design_id', $letter_user->design_id)  // Match designation ID
    ->select('users.*', 'departments.name as department_name', 'designations.designation_name')  
    ->get();



                                    ?>   
<div class="modal fade" id="VerifyClerk" tabindex="-1" aria-labelledby="VerifyClerkLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="VerifyClerkLabel">Verify Otp</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                           <div class="form-group" id="frwd_hod" style="display:none">
                                    <label for="hod">Forward To Staff</label>
                                    <select name="hod" class="form-control select2" id="hod_id"  >
                                       
                                      <?php $__currentLoopData = $staffs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $staff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <option value="<?php echo e($staff->id); ?>" <?php if($salary->frwd_hod_id ==$staff->id ): ?> selected <?php endif; ?> ><?php echo e($staff->first_name); ?> <?php echo e($staff->middle_name); ?> <?php echo e($staff->last_name); ?>-<?php echo e($staff->department_name); ?>-<?php echo e($staff->designation_name); ?></option>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                     
                                    </select>
                                </div>
                                  <div class="form-group" >
                                      <label for="hod">Otp</label>
                                  <input type="text" name="otp" class="form-control" placeholder="Enter otp" />
                                  </div>
                </div>
              
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="submitverify" class="btn btn-danger">Submit </button>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="modal fade" id="ForwardModel" tabindex="-1" aria-labelledby="ForwardModelLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ForwardModelLabel">Forward </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="frwd_to_staff_Form"> 
                    <div class="form-group">
                        <input type="hidden" name="frwd_user_id" value="<?php echo e(Auth::user()->id); ?>" id="frwd_user_id">
                        <input type="hidden" name="frwd_leave_id" value="<?php echo e($salary->id); ?>" id="frwd_leave_id">
                        <label for="frwd_hod_id">Forward To Staff</label>
                        <select name="frwd_hod_id" class="form-control select2" id="frwd_hod_id">
                            <?php $__currentLoopData = $staffs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $staff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <option value="<?php echo e($staff->id); ?>" value="<?php echo e($staff->id); ?>" <?php if($salary->frwd_hod_id ==$staff->id ): ?> selected <?php endif; ?>><?php echo e($staff->first_name); ?> <?php echo e($staff->middle_name); ?> <?php echo e($staff->last_name); ?>-<?php echo e($staff->department_name); ?>-<?php echo e($staff->designation_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </form> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="submitfrwd" class="btn btn-danger">Submit</button>
            </div>
        </div>
    </div>
</div>
                <!-- Approve and Reject buttons -->
                
              <!--   <div class="hstack gap-2" style="display: flex;">-->
              <!--      <?php if( $salary->status == 'approved'): ?>-->
              <!--      <button type="button" class="btn btn-success" id="approveButton" <?php echo e($salary->status != 'pending' ? 'disabled' : ''); ?> name="status">-->
              <!--          Approve-->
              <!--      </button>-->
              <!--      <?php elseif( $salary->status == 'rejected'): ?>-->
              <!--      <button type="button" class="btn btn-danger" id="rejectButton" <?php echo e($salary->status != 'pending' ? 'disabled' : ''); ?> name="status">-->
              <!--          Reject-->
              <!--      </button>-->
              <!--      <?php else: ?>-->
              <!--       <button type="button" class="btn btn-success" id="approveButton" <?php echo e($salary->status != 'pending' ? 'disabled' : ''); ?> name="status" value="approved">-->
              <!--          Approve-->
              <!--      </button>-->
                   
              <!--      <button type="button" class="btn btn-danger" id="rejectButton" <?php echo e($salary->status != 'pending' ? 'disabled' : ''); ?> name="status" value="rejected">-->
              <!--          Reject-->
              <!--      </button>-->
              <!--      <?php endif; ?>-->
              <!--</div>-->

               
            </div>
        </div>

                    
                    
       
       
       

    </div>
</div>








<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

    <script src="<?php echo e(URL::asset('build/libs/prismjs/prism.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/list.js/list.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/list.pagination.js/list.pagination.min.js')); ?>"></script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- listjs init -->
    <script src="<?php echo e(URL::asset('build/js/pages/listjs.init.js')); ?>"></script>

    <script src="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
        <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

        
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="<?php echo e(URL::asset('build/js/pages/select2.init.js')); ?>"></script>


<script>
$(document).ready(function() {
    $('#ForwardModel').on('shown.bs.modal', function () {
        $('#frwd_hod_id').select2({
            placeholder: "Select a staff member",
            allowClear: true,
            dropdownParent: $('#ForwardModel')  // Ensures dropdown is within the modal
        });
        $('#hod_id').select2({
            placeholder: "Select a staff member",
            allowClear: true,
            dropdownParent: $('#ForwardModel')  // Ensures dropdown is within the modal
        });
    });
});
</script>

<script>
$(document).ready(function() {
    $('#VerifyClerk').on('shown.bs.modal', function () {
        $('#frwd_hod_id').select2({
            placeholder: "Select a staff member",
            allowClear: true,
            dropdownParent: $('#VerifyClerk') 
        });
        $('#hod_id').select2({
            placeholder: "Select a staff member",
            allowClear: true,
            dropdownParent: $('#VerifyClerk')  // Ensures dropdown is within the modal
        });
    });
});
</script>

<script>
//  document.addEventListener('DOMContentLoaded', function () {
//     // Approve button functionality
//     document.getElementById('approveButton').addEventListener('click', function () {
//         // Set status to 'approved'
//         document.getElementById('status-field').value = 'approved';
//         // Hide reject description
//         document.getElementById('reject-description-row').style.display = 'none';
//         // Submit the form directly
//         document.getElementById('greenNoteForm').submit();
//     });

//     // Reject button functionality
//     document.getElementById('rejectButton').addEventListener('click', function () {
//         // Show reject description modal
//         var rejectModal = new bootstrap.Modal(document.getElementById('rejectModal'));
//         rejectModal.show();
//     });

//     // Confirm reject button functionality
//     document.getElementById('confirmRejectButton').addEventListener('click', function () {
//         // Set status to 'rejected'
//         document.getElementById('status-field').value = 'rejected';
//         // Get the rejection description
//         var rejectDescription = document.getElementById('reject-description-field').value;
        
//         // Optionally, validate rejection description here

//         // Hide the modal
//         var rejectModal = bootstrap.Modal.getInstance(document.getElementById('rejectModal'));
//         rejectModal.hide();

//         // Show reject description row and submit button
//         document.getElementById('reject-description-row').style.display = 'block';
//         document.getElementById('submit-button-row').style.display = 'block';

//         // Submit the form directly after setting the rejection description
//         document.getElementById('greenNoteForm').submit();
//     });
// });


</script>
// <script>
// $(document).ready(function() {
//     var quill = new Quill('#memo-editor', {
//         theme: 'snow',
//         modules: {
//             toolbar: [
//                 [{ 'font': [] }],
//                 [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
//                 ['bold', 'italic', 'underline', 'strike'],
//                 [{ 'script': 'sub' }, { 'script': 'super' }],
//                 [{ 'color': [] }, { 'background': [] }],
//                 [{ 'list': 'ordered' }, { 'list': 'bullet' }],
//                 [{ 'align': [] }],
//                 ['blockquote', 'code-block'],
//                 ['link', 'image', 'video'],
//                 ['clean']
//             ]
//         }
//     });

//     // Force manual handling of paste event
//     quill.root.addEventListener('paste', function(e) {
//         e.preventDefault();
//         var clipboardData = e.clipboardData || window.clipboardData;
//         var text = clipboardData.getData('text/plain');
//         var html = clipboardData.getData('text/html');

//         if (html) {
//             quill.clipboard.dangerouslyPasteHTML(quill.getSelection().index, html);
//         } else if (text) {
//             quill.insertText(quill.getSelection().index, text);
//         }
//     });

//     $('#greenNoteForm').submit(function(e) {
//         e.preventDefault();
        
//         var memoContent = quill.root.innerHTML;
//         $('#memo').val(memoContent);
        
//         this.submit();
//     });
// });
// </script>
<script>
$(document).ready(function() {
    var quill = new Quill('#memo-editors', {
        theme: 'snow',
        modules: {
            toolbar: [
                [{ 'font': [] }],
                [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                ['bold', 'italic', 'underline', 'strike'],
                [{ 'script': 'sub' }, { 'script': 'super' }],
                [{ 'color': [] }, { 'background': [] }],
                [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                [{ 'align': [] }],
                ['blockquote', 'code-block'],
                ['link', 'image', 'video'],
                ['clean']
            ]
        }
    });
    <?php if(Auth::user()->is_admin != 'admin' ||  Auth::user()->is_admin == 'admin'): ?>
  <?php    if (isset($letter)) :  ?>
        quill.enable(false);  // Disable the editor
    <?php   endif; ?>

    
    
    <?php endif; ?>
    // Force manual handling of paste event
                var status = '<?php echo $salary->status; ?>';  
    if (status === 'approved' || status === 'rejected') {
        quill.disable();  // Disable the editor if status is approved or reject
        $('#memo-editors').css('background-color', '#f1f1f1');  // Optional: Change background to show disabled state
    }

    
    
    quill.root.addEventListener('paste', function(e) {
        e.preventDefault();
        var clipboardData = e.clipboardData || window.clipboardData;
        var text = clipboardData.getData('text/plain');
        var html = clipboardData.getData('text/html');

        if (html) {
            quill.clipboard.dangerouslyPasteHTML(quill.getSelection().index, html);
        } else if (text) {
            quill.insertText(quill.getSelection().index, text);
        }
    });

    $('#greenNoteForm').submit(function(e) {
        e.preventDefault();
        
        var memoContent = quill.root.innerHTML;
        $('#memo').val(memoContent);
        
        this.submit();
    });
});
</script>



<script>


$(document).ready(function() {
    var quill = new Quill('#memo-editor', {
        theme: 'snow',
        modules: {
            toolbar: [
                [{ 'font': [] }],
                [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                ['bold', 'italic', 'underline', 'strike'],
                [{ 'script': 'sub' }, { 'script': 'super' }],
                [{ 'color': [] }, { 'background': [] }],
                [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                [{ 'align': [] }],
                ['blockquote', 'code-block'],
                ['link', 'image', 'video'],
                ['clean']
            ]
        }
    });
    
            var status = '<?php echo $salary->status; ?>';  
    if (status === 'approved' || status === 'rejected') {
        $('#greenNoteField').hide(); 
    }



    quill.root.addEventListener('paste', function(e) {
        e.preventDefault();
        var clipboardData = e.clipboardData || window.clipboardData;
        var html = clipboardData.getData('text/html');
        var text = clipboardData.getData('text/plain');
        
        if (html) {
            quill.clipboard.dangerouslyPasteHTML(quill.getSelection().index, html);
        } else if (text) {
            quill.insertText(quill.getSelection().index, text);
        }
    });

    function isEditorEmpty() {
        var content = quill.root.innerHTML.trim();ForwardModel
        
        console.log('content' + content);
        return content === "" || content === "<p><br></p>";
    }

  $('#send-button').click(function(e) {
    if (isEditorEmpty()) {
        alert('Green note is required.');
        $('#ForwardModel').modal('hide');
        e.preventDefault();
    } else {

        $('#ForwardModel').modal('show');
                            
    }
});

$('#approve-button').click(function(e) {
    if (isEditorEmpty()) {
        $('#VerifyClerk').modal('hide'); // Close the modal before showing the alert
        e.preventDefault();  // Prevent the modal from opening
        alert('Green note is required.');
    } else {
                if (!isEditorEmpty()) {
                    Swal.fire({
            text: "Do you want to send Otp ?",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Cancel',
                        confirmButtonText: 'Yes, proceed',
                            reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
        $('#VerifyClerk').modal('show'); // Close the modal before showing the alert
                        }
                    });
                }
    }
});

$('#reject-button').click(function(e) {
    if (isEditorEmpty()) {
        $('#rejectionModal').modal('hide'); // Close the modal before showing the alert
        e.preventDefault();  // Prevent the modal from opening
        alert('Green note is required.');
    } else {
        $('#rejectionModal').modal('show');
    }
});

});

    document.addEventListener('DOMContentLoaded', function () {
    const approveButton = document.getElementById('approve-button');
    const rejectButton = document.getElementById('reject-button');
    const rejectionModal = new bootstrap.Modal(document.getElementById('rejectionModal'));
    const verifyClerkModal = new bootstrap.Modal(document.getElementById('VerifyClerk'));
    const userId = approveButton.getAttribute('data-docuser'); // Get the document user ID from the button attribute
  let modalOpened = false;

    function isEditorEmpty() {
        const memoEditorContent = document.getElementById('memo-editor').innerHTML.trim();
        return memoEditorContent === '';
    }

    // Approve Button Click Event with AJAX
    approveButton.addEventListener('click', function () {
        const apiUrl = '/api/send-otp-digital'; // Route for sending OTP
        const statusField = document.getElementById('status-field');
        statusField.value = 'approved'; // Set the status field to 'approved'

        // Perform the AJAX request
        fetch(apiUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Include CSRF token for security
            },
            body: JSON.stringify({
                user_id: '<?php echo e(Auth::user()->id); ?>',
                page_id: userId,
                page: 'salary_page'
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // If 'data' is "OTHER", show the OTP modal and manage the select field
                if (data.data === 'OTHER') {
                    if (isEditorEmpty() && !modalOpened) {
                        verifyClerkModal.show();
                        modalOpened = true;
                    }

                    // Check if the role is HOD
                    const hodField = document.getElementById('frwd_hod');
                    
                    // If the data contains 'HOD', do not show the select
                    if (data.data === 'HOD') {
                        hodField.style.display = 'none'; 
                       
                        // Keep the select hidden
                    } else {
                        hodField.style.display = 'block'; // Show the select field for non-HOD users
                    }
                }else{
                    if (isEditorEmpty() && !modalOpened) {
                        verifyClerkModal.show();
                        modalOpened = true;
                    }

                    // Check if the role is HOD
                    const hodField = document.getElementById('frwd_hod');
                    
                    // If the data contains 'HOD', do not show the select
                    if (data.data === 'HOD') {
                        hodField.style.display = 'none'; 
                       
                        // Keep the select hidden
                    } else {
                        hodField.style.display = 'block'; // Show the select field for non-HOD users
                    }
                }

            } else {
                alert('Failed to send OTP. Please try again.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while sending OTP.');
        });
    });

    // Submit OTP for Verification
    document.getElementById('submitverify').addEventListener('click', function () {
    const otpValue = document.querySelector('input[name="otp"]').value;
    const hodId = document.querySelector('select[name="hod"]').value; // Only used if hod field is visible
    const memoEditorContent = document.getElementById('memo-editor').innerHTML.trim(); // Get and trim the content from memo-editor
  const memoEditorContentLetter = document.getElementById('memo-editors').innerHTML.trim();
    // Determine if memo content should be included (only if not empty)
     const letterNoteDis = memoEditorContentLetter !== '' ? memoEditorContentLetter : null;
    const greenNoteDis = memoEditorContent !== '' ? memoEditorContent : null;

    if (otpValue) {
        fetch('/api/verify-otp-digital', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                user_id: '<?php echo e(Auth::user()->id); ?>',
                page_id: userId,
                page: 'salary_page',
                verify_otp: otpValue,
                hod_id: hodId, // Pass the selected hod_id if needed
                salary_green_note_dis: greenNoteDis ,
                salary_letter_note_dis: letterNoteDis
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('OTP verified successfully.');
                if (data.data === 'approved_clerk' || data.data === 'approved') {
                    const statusField = document.getElementById('status-field');
                    statusField.value = data.data; // Set status field value

                    // Submit the form after setting the status
                    document.getElementById('achievement-form').submit();
                }
                verifyClerkModal.hide(); // Close the modal on success
            } else {
                alert('OTP verification failed: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while verifying OTP.');
        });
    } else {
        alert('Please enter the OTP.');
    }
});


    // Reject Button Click Event
    rejectButton.addEventListener('click', function () {
        // Show the rejection modal
        if (isEditorEmpty() && !modalOpened) {
            rejectionModal.show();
            modalOpened = true;
        }
    });

    // Submit Rejection Button Click Event
    document.getElementById('submit-reject').addEventListener('click', function () {
        const rejectDescription = document.getElementById('reject-description-field-modal').value;

        if (rejectDescription) {
            // Set the reject description in the form
            const rejectDescriptionField = document.getElementById('reject-description-field');
            rejectDescriptionField.value = rejectDescription;

            // Set the status to rejected in the hidden input field
            const statusField = document.getElementById('status-field');
            statusField.value = 'rejected';
  var memoContent = $('#memo-editor').html().trim();
        if (memoContent.length > 0) {
            // Set the content of memo-editor to the textarea for submission
            $('#memo').val(memoContent);
        } else {
            $('#memo').val(null); // Set memo value to null if empty
        }
        
                   

document.getElementById('salary_letter_note_dis').value = document.getElementById('memo-editors').innerHTML;

// Update the hidden input field
document.getElementById('letter_note').value = document.getElementById('salary_letter_note_dis').value;

                  

         
          
            const GreenNote =document.getElementById('green_not_reject');
            GreenNote.value=$('#memo').val();


            // Close the modal and submit the form
            rejectionModal.hide();
            document.getElementById('achievement-form').submit();
            
            

        } else {
            alert("Please enter a reason for rejection.");
        }
    });
});

</script>
<script>
    $(document).ready(function() {
    // Click event for submit button in the modal
    $('#submitfrwd').on('click', function(e) {
        e.preventDefault(); // Prevent the default form submission
        
        // Check if the memo field has any content
        var memoContent = $('#memo-editor').html().trim();
        var memoContent1 = $('#memo-editors').html().trim();
        if (memoContent.length > 0) {
            // Set the content of memo-editor to the textarea for submission
            $('#memo').val(memoContent);
        } else {
            $('#memo').val(null); // Set memo value to null if empty
        }
       


        // Collect form data
        var formData = {
            frwd_user_id: $('#frwd_user_id').val(),
            frwd_leave_id:"<?php echo e($salary->id); ?>",
            frwd_hod_id: $('#frwd_hod_id').val(),
            salary_green_note_dis: $('#memo').val(),
         salary_letter_note_dis: $('#salary_letter_note_dis').val()
        };

        // Send AJAX request to the API
        $.ajax({
            url: '/api/forward-user-salary',
            type: 'POST',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // If CSRF token is needed
            },
            success: function(response) {
                if (response.success) {
                    alert('Salary data forwarded successfully');
                    
                    $('#ForwardModel').modal('hide'); // Close the modal
                        window.location.href = "<?php echo e(route('salary.index')); ?>";
                } else {
                    alert('Error: ' + response.message);
                }
            },
            error: function(xhr, status, error) {
                alert('An error occurred: ' + error);
            }
        });
    });
});

</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u532655452/domains/eofficess.com/public_html/resources/views/salary/viewsection-salary.blade.php ENDPATH**/ ?>
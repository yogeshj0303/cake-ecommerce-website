@extends('layouts.master')
@section('title')
    @lang('translation.view-nomination')
@endsection
 <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />

   
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Nomination Details</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <!--<form class="leave-form" autocomplete="off">-->

                    <!-- State, District, Taluka -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="state" class="form-label">State</label>
                            <input type="text" id="state" name="state" class="form-control" value="{{ $nomination->state }}" readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="district" class="form-label">District</label>
                            <input type="text" id="district" name="district" class="form-control" value="{{ $nomination->district }}" readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="organisation" class="form-label">Organization</label>
                            <input type="text" id="organisation" name="organisation" class="form-control" value="{{ $nomination->org_name ?? '' }}" readonly>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="department_name" class="form-label">Department</label>
                            <input type="text" id="department_name" name="depart_id" class="form-control" value="{{ $nomination->name ?? '' }}" readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="taluka-field" class="form-label">Taluka</label>
                            <input type="text" id="taluka-field" name="taluka" class="form-control" value="{{ $nomination->taluka }}" readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="designation" class="form-label">Designation</label>
                            <input type="text" id="designation" name="design_id" class="form-control" value="{{ $nomination->designation_name ?? '' }}" readonly>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Profile Name</label>
                            <input type="text" id="name" name="user_id" class="form-control" value="{{ $nomination->first_name }} {{ $nomination->last_name }}" readonly>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="position-field" class="form-label">Position</label>
                            <input type="text" id="position-field" name="position" class="form-control" value="{{ $nomination->position }}" readonly>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="dob-field" class="form-label">Date of Birth</label>
                            <input type="date" id="birth_date" name="birth_date" class="form-control" value="{{ \Carbon\Carbon::parse($nomination->birth_date)->format('Y-m-d') }}" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="join-date-field" class="form-label">Joining Date</label>
                            <input type="date" id="join-date-field" name="join_date" class="form-control" value="{{ \Carbon\Carbon::parse($nomination->join_date)->format('Y-m-d') }}" readonly>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="nomination_type" class="form-label">Nomination Type</label>
                            <input type="text" id="nomination_type" name="nomination_type" class="form-control" value="{{ $nomination->nomination_type }}" readonly>
                        </div>
                    </div>

                    <div id="nominee-sections">
                        @foreach($nominationDetails as $index => $detail)
                        <div class="nominee-section mb-4">
                            <h5>Nominee {{ $index + 1 }}</h5>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="nominee-name-field-{{ $index }}" class="form-label">Nominee Name</label>
                                    <input type="text" id="nominee-name-field-{{ $index }}" name="nominee_name[]" class="form-control" value="{{ $detail->nominee_name }}" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label for="nominee_dob-field-{{ $index }}" class="form-label">Nominee Date of Birth</label>
                                    <input type="date" id="nominee_dob-field-{{ $index }}" name="nominee_dob[]" class="form-control" value="{{ $detail->nominee_dob }}" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label for="nominee-age-field-{{ $index }}" class="form-label">Nominee Age</label>
                                    <input type="number" id="nominee-age-field-{{ $index }}" name="nominee_age[]" class="form-control" value="{{ $detail->nominee_age }}" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="atypical_event-field-{{ $index }}" class="form-label">Atypical Event</label>
                                    <input type="text" id="atypical_event-field-{{ $index }}" name="atypical_event[]" class="form-control" value="{{ $detail->atypical_event }}" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label for="relationship_nominee-field-{{ $index }}" class="form-label">Relationship with Nominee</label>
                                    <input type="text" id="relationship_nominee-field-{{ $index }}" name="relationship_nominee[]" class="form-control" value="{{ $detail->relationship_nominee }}" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label for="nominee_type-{{ $index }}" class="form-label">Nominee Type</label>
                                    <input type="text" id="nominee_type-{{ $index }}" name="nominee_type[]" class="form-control" value="{{ $detail->nominee_type }}" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="nominee-amount-field-{{ $index }}" class="form-label">Nominee Amount</label>
                                    <input type="text" id="nominee-amount-field-{{ $index }}" name="nominee_amount[]" class="form-control" value="{{ $detail->nominee_amount }}" readonly>
                                </div>
                            </div>

                            <input type="hidden" name="nominee_id[]" value="{{ $detail->id }}">
                        </div>
                        @endforeach
                    </div>

  <form action="{{ route('nomination.updateStatus', $nomination->nid) }}" id="nomination-status-form" method="POST">
 
    @csrf
    @method('PATCH')

    <div class="row">
        <div class="col-md-12 mb-3">
              
        
            @if(($nomination->sstatus == 'pending' || ($nomination->sstatus == 'approved_clerk' && $nomination->frwd_hod_id == Auth::user()->id )) && Auth::user()->is_admin == 'staff' )
          
            <!-- Approve Button -->
              <button type="button" id="send-button" class="btn btn-primary me-2" data-docuser="{{$nomination->nid}}" data-bs-toggle="modal" data-bs-target="#ForwardModel" @if($nomination->witness_first_status === 'pending' || $nomination->witness_second_status === 'pending') disabled @endif>Send</button>

              
            <button type="button" id="approve-button" class="btn btn-success me-2" data-docuser ="{{$nomination->nid}}" @if($nomination->witness_first_status === 'pending' || $nomination->witness_second_status === 'pending') disabled @endif >Send & Sign</button>

            <!-- Reject Button -->
            <button type="button" id="reject-button" class="btn btn-danger" @if($nomination->witness_first_status === 'pending' || $nomination->witness_second_status === 'pending') disabled @endif>Reject</button>
             @elseif(($nomination->sstatus === 'pending' || $nomination->sstatus === 'approved_clerk') && Auth::user()->is_admin != 'staff' )
                   <button type="button"  class="btn btn-warning me-2"   >Pending</button>
            @elseif ($nomination->sstatus == 'approved')
              <button type="button"  class="btn btn-success me-2"  >Approved</button>
            @elseif ($nomination->sstatus == 'rejected')
            <button type="button"  class="btn btn-danger"  >Rejected </button>
              @endif
               @if($nomination->witness_first_status == 'pending' && ($nomination->sstatus === 'pending') && $nomination->witness_second_status === 'pending')
              <button type="button" id="sendWitnessOtp-button" class="btn btn-primary me-2" data-docuser="{{ $nomination->nid }}"  data-bs-toggle="modal" data-bs-target="#sendWitnessOtp">Verify First Witness Digital Signature</button>
               <button type="button" class="btn btn-primary me-2" disabled>Verify Second Witness Digital Signature</button>
              @elseif($nomination->witness_first_status === 'approved' && ($nomination->sstatus ==='pending') && $nomination->witness_second_status === 'pending' )
          <button type="button" class="btn btn-success me-2" disabled>Witness First (verified)</button>
              <button type="button" id="sendWitnessOtp-button" class="btn btn-primary me-2" data-docuser="{{ $nomination->nid }}" data-bs-toggle="modal" data-bs-target="#sendWitnessOtp">Verify Second Witness Digital Signature</button>
               @elseif($nomination->witness_first_status === 'approved' &&  $nomination->witness_second_status === 'approved'  )
          <button type="button" class="btn btn-success me-2" disabled>Witness First (verified)</button>
            <button type="button" class="btn btn-success me-2" disabled>Witness Second (verified)</button>
           
               @endif
        </div>
    </div>

    <input type="hidden" name="status_type" id="status-field-type" value="">
    <!-- Hidden input field for status -->
    <input type="hidden" name="status" id="status-field" value="">

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

             <div class="modal fade" id="sendWitnessOtp" tabindex="-1" aria-labelledby="sendWitnessOtpLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sendWitnessOtpLabel">Send OTP</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="hod">Name</label>
                    <input type="text" name="witness_name" class="form-control" placeholder="Enter Name" />
                </div>
                <div class="form-group">
                    <label for="hod">Witness Mobile Number</label>
                    <input type="text" name="witness_no" class="form-control" placeholder="Enter number" />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="verify-button" class="btn btn-danger"  data-docuser="{{ $nomination->nid }}" 
                 @if($nomination->witness_first_status === 'pending'  ) data-witness_type="first" @else data-witness_type="second" @endif >Send</button>
            </div>
        </div>
    </div>
</div>       

   <div class="modal fade" id="VerifyUserClerk" tabindex="-1" aria-labelledby="VerifyUserClerkLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="VerifyUserClerkLabel">Verify Otp</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                           
                                  <div class="form-group" >
                                      <label for="hod">Otp</label>
                                  <input type="text" name="user_otp" class="form-control" placeholder="Enter otp" />
                                  </div>
                </div>
              
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="submituserverify" class="btn btn-danger">Submit </button>
                </div>
            </div>
        </div>
    </div>
 @php
$role = DB::table('roles')->where('id', Auth::user()->role_name)->first();
$letter_user = DB::table('users')->where('id', $nomination->user_id)->first();

// Proceed only if $letter_user is not null
if ($letter_user) {
    $staffs = DB::table('users')
        ->join('departments', 'users.depart_id', '=', 'departments.id')
        ->join('designations', 'users.design_id', '=', 'designations.id')
        ->where('users.id', '!=', Auth::user()->id)
        ->where('users.is_admin', 'staff')
        ->where('users.state', $letter_user->state)
        ->where('users.district', $letter_user->district)
        ->where('users.org_id', $letter_user->org_id)
        ->where(function ($query) use ($letter_user) {
            // Match taluka if it exists, or if the staff taluka is null
            $query->whereNull('users.taluka')
                  ->orWhere('users.taluka', $letter_user->taluka);
        })
        ->where('users.depart_id', $letter_user->depart_id)
        ->where('users.design_id', $letter_user->design_id)
        ->select('users.*', 'departments.name as department_name', 'designations.designation_name')
        ->get();
} else {
    // Handle the case where $letter_user is null
    $staffs = collect(); // Empty collection
}


       


                                    @endphp   
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
                                       
                                      @foreach($staffs as $staff)
                                       <option value="{{$staff->id}}">{{$staff->first_name}} {{$staff->middle_name}} {{$staff->last_name}}-{{$staff->department_name}}-{{$staff->designation_name}}</option>
                                      @endforeach
                                     
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
                <!--<form id="frwd_to_staff_Form"> -->
                    <div class="form-group">
                        <input type="hidden" name="frwd_user_id" value="{{ Auth::user()->id }}" id="frwd_user_id">
                        <input type="hidden" name="frwd_leave_id" value="{{ $nomination->nid }}" id="frwd_leave_id">
                        <label for="frwd_hod_id">Forward To Staff</label>
                        <select name="frwd_hod_id" class="form-control select2" id="frwd_hod_id">
                            @foreach($staffs as $staff)
                         <?php
                         
    $role_staff = DB::table('roles')->where('id', $staff->role_name)->first();
    
?>
@if(isset($role_staff))
                                       <option value="{{$staff->id}}">{{$staff->first_name}} {{$staff->middle_name}} {{$staff->last_name}}-{{$staff->department_name}}-{{$staff->designation_name}}</option>
@endif
                            @endforeach
                        </select>
                    </div>
                <!--</form> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="submitfrwd" class="btn btn-danger">Submit</button>
            </div>
        </div>
    </div>
</div>
                    <div style="display: flex; justify-content: flex-end; gap: 10px;">
                        <div class="hstack gap-2">
            <a href="{{ url()->previous() }}"><button type="button" class="btn btn-primary ">Back </button></a>
                        </div>
                    </div>

                <!--</form>-->

            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->

@endsection
@section('script')

    <script src="{{ URL::asset('build/libs/prismjs/prism.js') }}"></script>
    <script src="{{ URL::asset('build/libs/list.js/list.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/list.pagination.js/list.pagination.min.js') }}"></script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- listjs init -->
    <script src="{{ URL::asset('build/js/pages/listjs.init.js') }}"></script>

    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
        <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

        
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="{{ URL::asset('build/js/pages/select2.init.js') }}"></script>

 @if($nomination->witness_first_status == 'pending' || $nomination->witness_second_status == 'pending')
<script>

    document.addEventListener('DOMContentLoaded', function () {
    const verifyButton = document.getElementById('verify-button');
    const sendWitnessOtpModal = new bootstrap.Modal(document.getElementById('sendWitnessOtp'));
    const verifyUserClerkModal = new bootstrap.Modal(document.getElementById('VerifyUserClerk'));
    const userId = verifyButton.getAttribute('data-docuser'); // Get the document user ID from the button attribute
    const witness_type = verifyButton.getAttribute('data-witness_type');
 
    // Approve Button Click Event with AJAX
    verifyButton.addEventListener('click', function () {
        const apiUrl = '/api/send-otp-digital'; // Route for sending OTP
        const statusField = document.getElementById('status-field');
         const witnessNo = document.querySelector('input[name="witness_no"]').value;
         const witnessName = document.querySelector('input[name="witness_name"]').value;
        statusField.value = 'approved'; // Set the status field to 'approved'
         const statusFieldType = document.getElementById('status-field-type');
        
        statusFieldType.value = 'user';

        // Perform the AJAX request
        fetch(apiUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Include CSRF token for security
            },
            body: JSON.stringify({
                user_id: '{{Auth::user()->id}}',
                page_id: userId,
                page: 'witness_nomination',
                witnessNo :witnessNo ,
                witnessName :witnessName ,
                witnessType :witness_type ,
            })
        })
        .then(response => response.json())
        .then(data => {
            
            if (data.success) {
               sendWitnessOtpModal.hide();
                    verifyUserClerkModal.show();

            } else {
                console.log(data.message);
                alert('Failed to send OTP: ' + data.message);
            }
        })
        .catch(error => {
    console.error('Error Response:', error); // Log the error details
    alert(`An error occurred while sending OTP: ${error.message}`);
});
    });

    // Submit OTP for Verification
    document.getElementById('submituserverify').addEventListener('click', function () {
    const otpValue = document.querySelector('input[name="user_otp"]').value;
   
    

    if (otpValue) {
        fetch('/api/verify-otp-digital', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                user_id: '{{Auth::user()->id}}',
                page_id: userId,
                page: 'witness_nomination',
                verify_otp: otpValue,
                 witnessType :witness_type ,
              
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('OTP verified successfully.');
                console.log(data);
              
                verifyUserClerkModal.hide(); // Close the modal on success
                    window.location.href = "{{ route('nomination_pending') }}";
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


});

</script>
@endif

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

document.addEventListener('DOMContentLoaded', function () {
    const approveButton = document.getElementById('approve-button');
    const rejectButton = document.getElementById('reject-button');
    const rejectionModal = new bootstrap.Modal(document.getElementById('rejectionModal'));
    const verifyClerkModal = new bootstrap.Modal(document.getElementById('VerifyClerk'));
    const userId = approveButton.getAttribute('data-docuser'); // Get the document user ID from the button attribute

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
                user_id: '{{Auth::user()->id}}',
                page_id: userId,
                page: 'nomination'
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Show SweetAlert before opening the modal
        Swal.fire({
            text: "Do you want to send Otp ?",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Cancel',
                        confirmButtonText: 'Yes, proceed',
                            reverseButtons: true

        }).then((result) => {
                    if (result.isConfirmed) {
                        verifyClerkModal.show(); // Open the verifyClerkModal

                        // Check if the role is HOD
                        const hodField = document.getElementById('frwd_hod');
                        if (data.data === 'HOD') {
                            hodField.style.display = 'none'; // Hide the select for HOD
                        } else {
                            hodField.style.display = 'block'; // Show the select for non-HOD
                        }
                    }
                });
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

        if (otpValue) {
            fetch('/api/verify-otp-digital', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    user_id: '{{Auth::user()->id}}',
                    page_id: userId,
                    page: 'nomination',
                    verify_otp: otpValue,
                    hod_id: hodId
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('OTP verified successfully.');
                    console.log(data);
                    if (data.data === 'approved_clerk' || data.data === 'approved') {
                        const statusField = document.getElementById('status-field');
                        statusField.value = data.data; // Set status field value

                        // Submit the form after setting the status
                        document.getElementById('nomination-status-form').submit();
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
        rejectionModal.show();
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

            // Close the modal and submit the form
            rejectionModal.hide();
            document.getElementById('nomination-status-form').submit();
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
      

        // Collect form data
        var formData = {
            frwd_user_id: $('#frwd_user_id').val(),
            frwd_leave_id: $('#frwd_leave_id').val(),
            frwd_hod_id: $('#frwd_hod_id').val(),
           
        };

        // Send AJAX request to the API
        $.ajax({
            url: '/api/forward-user-nomination',
            type: 'POST',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // If CSRF token is needed
            },
            success: function(response) {
                if (response.success) {
                    $('#ForwardModel').modal('hide'); // Close the modal
                            window.location.href = "{{ route('nomination-index') }}";

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
@endsection
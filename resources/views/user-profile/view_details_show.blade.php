@extends('layouts.master')
@section('title')
    @lang('translation.list-js')
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">View User Details</h4>
            </div>

            <div class="card">
                <div class="card-body">
                        <!-- State, District, Taluka -->
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="state" class="form-label">State</label>
                                <input type="text" name="state" class="form-control" value="{{ $user->state }}" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="district" class="form-label">District</label>
                                <input type="text" name="district" class="form-control" value="{{ $user->district }}" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="organisation" class="form-label">Organization</label>
                                <input type="text" name="org_name" class="form-control" value="{{ $user->org_name }}" readonly>
                            </div>
                        </div>

                        <!-- Organisation, Department -->
                        <div class="row mb-3">

                            <div class="col-md-4">
                                <label for="department" class="form-label">Department</label>
                                <input type="text" name="department" class="form-control" value="{{ $user->name }}" readonly>
                            </div>
                            
                                                        <div class="col-md-4">
                                <label for="taluka" class="form-label">Taluka</label>
                                <input type="text" name="taluka" class="form-control" value="{{ $user->taluka }}" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="designation" class="form-label">Designation</label>
                                <input type="text" name="designation" class="form-control" value="{{ $user->designation_name }}" readonly>
                            </div>
                        </div>

                        <!-- Profile Name -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Profile Name</label>
                                <input type="text" name="profile_name" class="form-control" value="{{ $user->first_name }} {{ $user->last_name }}" readonly>
                            </div>
                        </div>

                        <!-- Caste, Address A, Address B -->
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="caste" class="form-label">Caste</label>
                                <input type="text" name="caste" class="form-control" value="{{ $user->caste }}" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="address_a" class="form-label">Address A</label>
                                <input type="text" name="address_a" class="form-control" value="{{ $user->address }}" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="address_b" class="form-label">Address B</label>
                                <input type="text" name="address_b" class="form-control" value="{{ $user->address_B }}" readonly>
                            </div>
                        </div>

                        <!-- Father's Name, Father's Address -->
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="father_name" class="form-label">Father's Name</label>
                                <input type="text" name="father_name" class="form-control" value="{{ $user->father_name }}" readonly>
                            </div>
                             <div class="col-md-4">
                                <label for="father_address" class="form-label">Father's Address</label>
                                <input type="text" name="father_address" class="form-control" value="{{ $user->father_address }}" readonly>
                            </div>
                        </div>

                        <!-- Birth Date, Height, Birth Mark -->
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="birth_date" class="form-label">Birth Date</label>
                                <input type="" name="birth_date" class="form-control" value="{{ $user->birth_date }}" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="height" class="form-label">Height</label>
                                <input type="text" name="height" class="form-control" value="{{ $user->height }}" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="birth_mark" class="form-label">Birth Mark</label>
                                <input type="text" name="birth_mark" class="form-control" value="{{ $user->birth_mark }}" readonly>
                            </div>
                        </div>

                        <!-- Qualification, Additional Qualification -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="qualification" class="form-label">Qualification</label>
                                <input type="text" name="qualification" class="form-control" value="{{ $user->qualification }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="another_qualification" class="form-label">Additional Qualification</label>
                                <input type="text" name="another_qualification" class="form-control" value="{{ $user->another_qualification }}" readonly>
                            </div>
                        </div>

                        <!-- Digital Signature -->
                        <!--<div class="row mb-3">-->
                        <!--    <div class="col-md-6">-->
                        <!--        <label for="digital_sig" class="form-label">Digital Signature</label>-->
                        <!--        <input type="file" name="digital_sig" class="form-control">-->
                        <!--        <img src="{{ asset('/' . $user->digital_sig) }}" alt="Digital Signature" style="max-width: 200px;">-->
                        <!--    </div>-->
                        <!--    <div class="col-md-6">-->
                        <!--        <label for="digital_sig_verify" class="form-label">Verified Digital Signature</label>-->
                        <!--        <input type="file" name="digital_sig_verify" class="form-control">-->
                        <!--        <img src="{{ asset('/' . $user->digital_sig_verify) }}" alt="Verified Signature" style="max-width: 200px;">-->
                        <!--    </div>-->
                        <!--</div>-->

                        <!-- Last Information Check -->
                        <div class="row mb-3">
                                                        <div class="col-md-4">
                                <label for="address_b" class="form-label">Joining Time Education Qualification</label >
                                <input type="text" name="address_b" class="form-control" value="{{ $user->qualification }}" readonly>
                            </div>                            <div class="col-md-4">
                                <label for="address_b" class="form-label">After Joining Education Qualification</label>
                                <input type="text" name="address_b" class="form-control" value="{{ $user->another_qualification }}" readonly>
                            </div>

                            <div class="col-md-4">
                                <label for="certificate_no" class="form-label">Certificate Number</label>
                                <input type="text" name="certificate_no" class="form-control" value="{{ $user->certificate_no }}" readonly>
                            </div>
                        </div>
                        
        
        <!---->
        <!---->
        
     <form action="{{ route('user-details-status', $user->id) }}" id="detailuserForm" method="POST">
 
    @csrf
    @method('PATCH')

    <div class="row">
        <div class="col-md-12 mb-3">
            @if($user->user_status != 'pending')
            @if((($user->status =='pending' || ($user->status == 'approved_clerk' && $user->frwd_hod_id == Auth::user()->id )) && Auth::user()->is_admin == 'staff' ))
          
            <!-- Approve Button -->
           
              <button type="button" id="send-button" class="btn btn-primary me-2" data-docuser="{{$user->id}}" data-bs-toggle="modal" data-bs-target="#ForwardModel">Send</button>

              
            <button type="button" id="approve-button" class="btn btn-success me-2" data-docuser ="{{$user->id}}" >Send & Sign</button>

            <!-- Reject Button -->
            <button type="button" id="reject-button" class="btn btn-danger">Reject</button>
            
             @elseif(($user->status == 'pending' || $user->status == 'approved_clerk') && Auth::user()->is_admin != 'staff')
                   <button type="button"  class="btn btn-warning me-2"  >Pending</button>
            @elseif ($user->status == 'approved')
              <button type="button"  class="btn btn-success me-2">Approved</button>
            @elseif ($user->status == 'rejected')
            <button type="button"  class="btn btn-danger">Rejected</button>
              @endif
              @else
                <button type="button" class="btn btn-primary me-2" disabled>Send</button>

              
            <button type="button"  class="btn btn-success me-2" disabled >Send & Sign</button>

            <!-- Reject Button -->
            <button type="button" class="btn btn-danger" disabled>Reject</button>
              <button type="button" id="verify-button" class="btn btn-primary me-2" data-docuser ="{{$user->id}}" >Verify User Digital Signature </button>
              @endif
        </div>
    </div>

    <!-- Hidden input field for status -->
    <input type="hidden" name="status" id="status-field" value="">
    <input type="hidden" name="status_type" id="status-field-type" value="">

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
 @php
 
                          $role = DB::table('roles')->where('id', Auth::user()->role_name)->first();

$letter_user = DB::table('users')->where('id', $user->id)->first();
$staffs = DB::table('users')
    ->where('users.id', '!=', Auth::user()->id)  // Specify table name for id
    ->join('departments', 'users.depart_id', '=', 'departments.id')
    ->join('designations', 'users.design_id', '=', 'designations.id')
    ->where('users.is_admin', 'staff')
    ->where('users.state', $user->state)
    ->where('users.district', $user->district)
    ->where('users.org_id', $user->org_id)
    ->where(function($query) use ($letter_user) {
        $query->whereNull('users.taluka')
              ->orWhere('users.taluka', $letter_user->taluka);
    })
    ->where('users.depart_id', $letter_user->depart_id)
    ->where('users.design_id', $letter_user->design_id)
    ->select('users.*', 'departments.name as department_name', 'designations.designation_name')
    ->get();


        
       


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

                        <input type="hidden" name="frwd_leave_id" value="{{ $user->id }}" id="frwd_leave_id">
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
        
        
        <!---->
        <!---->

                                     <div style="display: flex; justify-content: flex-end; gap: 10px;">
                        <div class="hstack gap-2">
            <a href="{{ url()->previous() }}"><button type="button" class="btn btn-primary ">Back </button></a>
                        </div>
                    </div>




                </div>
            </div>
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->

@endsection

@section('script')
    <script src="{{ URL::asset('build/libs/prismjs/prism.js') }}"></script>
    <script src="{{ URL::asset('build/libs/list.js/list.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/list.pagination.js/list.pagination.min.js') }}"></script>

    <!-- listjs init -->
    <script src="{{ URL::asset('build/js/pages/listjs.init.js') }}"></script>

    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ URL::asset('build/js/pages/select2.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
    
    
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


    @if($user->user_status =='pending')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const approveButton = document.getElementById('verify-button');
    const verifyUserClerkModal = new bootstrap.Modal(document.getElementById('VerifyUserClerk'));
    const userId = approveButton.getAttribute('data-docuser');

    approveButton.addEventListener('click', function () {
        Swal.fire({
            title: 'Do you want to send the OTP?',
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Cancel',
            confirmButtonText: 'Yes, proceed',
                            reverseButtons: true


        }).then((result) => {
            if (result.isConfirmed) {
                const apiUrl = '/api/send-otp-digital';
                const statusField = document.getElementById('status-field');
                statusField.value = 'approved';
                const statusFieldType = document.getElementById('status-field-type');
                statusFieldType.value = 'user';

                fetch(apiUrl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        user_id: '{{Auth::user()->id}}',
                        page_id: userId,
                        page: 'detail_user'
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        verifyUserClerkModal.show();
                    } else {
                        alert('Failed to send OTP. Please try again.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while sending OTP.');
                });
            }
        });
    });

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
                    page: 'detail_user',
                    verify_otp: otpValue,
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('OTP verified successfully.');
                    verifyUserClerkModal.hide();
                    window.location.href = "{{route('user-details-view')}}";
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
@else
<script>
document.addEventListener('DOMContentLoaded', function () {
    const approveButton = document.getElementById('approve-button');
    const rejectButton = document.getElementById('reject-button');
    const rejectionModal = new bootstrap.Modal(document.getElementById('rejectionModal'));
    const verifyClerkModal = new bootstrap.Modal(document.getElementById('VerifyClerk'));
    const userId = approveButton.getAttribute('data-docuser'); // Get the document user ID from the button attribute

    // Approve Button Click Event with AJAX
    approveButton.addEventListener('click', function () {
        // Show SweetAlert confirmation before opening the OTP modal
        Swal.fire({
            title: 'Do you want to send the OTP?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, proceed',
            cancelButtonText: 'Cancel',
                                        reverseButtons: true

        }).then((result) => {
            if (result.isConfirmed) {
                // If confirmed, proceed with the AJAX request to send OTP
                const apiUrl = '/api/send-otp-digital';
                const statusField = document.getElementById('status-field');
                statusField.value = 'approved';
                const statusFieldType = document.getElementById('status-field-type');
                statusFieldType.value = 'other';

                fetch(apiUrl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        user_id: '{{Auth::user()->id}}',
                        page_id: userId,
                        page: 'detailuser'
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Show the OTP modal based on the response
                        const hodField = document.getElementById('frwd_hod');
                        if (data.data === 'HOD') {
                            hodField.style.display = 'none';
                        } else {
                            hodField.style.display = 'block';
                        }
                        verifyClerkModal.show();
                    } else {
                        alert('Failed to send OTP. Please try again.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while sending OTP.');
                });
            }
        });
    });

    // Submit OTP for Verification
    document.getElementById('submitverify').addEventListener('click', function () {
        const otpValue = document.querySelector('input[name="otp"]').value;
        const hodId = document.querySelector('select[name="hod"]').value;

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
                    page: 'detailuser',
                    verify_otp: otpValue,
                    hod_id: hodId
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('OTP verified successfully.');
                    if (data.data === 'approved_clerk' || data.data === 'approved') {
                        const statusField = document.getElementById('status-field');
                        statusField.value = data.data;
                        const statusFieldType = document.getElementById('status-field-type');
                        statusFieldType.value = 'other';
                        document.getElementById('detailuserForm').submit();
                    }
                    verifyClerkModal.hide();
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
        rejectionModal.show();
    });

    // Submit Rejection Button Click Event
    document.getElementById('submit-reject').addEventListener('click', function () {
        const rejectDescription = document.getElementById('reject-description-field-modal').value;

        if (rejectDescription) {
            const rejectDescriptionField = document.getElementById('reject-description-field');
            rejectDescriptionField.value = rejectDescription;

            const statusField = document.getElementById('status-field');
            statusField.value = 'rejected';

            rejectionModal.hide();
            document.getElementById('detailuserForm').submit();
        } else {
            alert("Please enter a reason for rejection.");
        }
    });
});
</script>
@endif
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
            url: '/api/forward-user-detailuser',
            type: 'POST',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // If CSRF token is needed
            },
            success: function(response) {
                if (response.success) {
                    alert('User forwarded successfully');
                    $('#ForwardModel').modal('hide'); // Close the modal
                            window.location.href = "{{ route('user-details-view') }}";

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

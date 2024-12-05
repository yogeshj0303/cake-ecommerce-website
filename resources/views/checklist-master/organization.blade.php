
@extends('layouts.master')
@section('title')
    @lang('translation.list-js')
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
<style>
    .modal-dialog {
    position: absolute;  /* Use absolute positioning */
    top: 30px;           /* Set the top position to whatever you prefer */
    left: 0%;
    transform: translateX(-50%); /* Center horizontally */
}

.modal-content {
    margin-top: 0; /* Override any margin */
}

</style>

@endsection
@section('content')
                      <?php



?>
<div class="row">
    <div class="col-xxl-6">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Organization</h4>
                <a href="{{route('organization.history')}}">
                      <button class="btn btn-sm btn-primary">
                                                History
                                            </button>
                </a>
            </div>
            <div class="card-body">
                <div class="live-preview">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="designationsTable">
                           <thead>
    <tr>
        <th>ID</th>
        <th>State </th>
        <th>District </th>
        <th>Organization </th>
        <th>Organization Logo</th> <!-- Added column for logo -->
        @if((isset($permissions)) && ($permissions['organizations_master_delete'] == 2))
            <th>Action</th>
        @endif
    </tr>
</thead>
<tbody>
    @if((isset($permissions)) && ($permissions['organizations_master_view'] == 2 || $permissions['organizations_master_delete'] == 2))
        @foreach($organizations as $key => $org) 
            <tr id="tehsilRow{{ $org->id }}">
                <td>{{ $org->id }}</td>
                <td>{{ $org->state_name }}</td>
                <td>{{ $org->district_name }}</td>
                <td>{{ $org->org_name }}</td>
                
                <!-- Display the organization logo -->
                <td>
                    @if($org->org_logo)
<a href="{{ asset('/images/' . $org->org_logo) }}" target="_blank">
    <img src="{{ asset('/images/' . $org->org_logo) }}" alt="Organization Logo" style="max-height: 60px;">
</a>
                    @else
                        <span>No Logo</span>
                    @endif
                </td>
                
                
                @if((isset($permissions)) && ($permissions['organizations_master_delete'] == 2))
                    <td>
                        <div class="d-flex align-items-center">
                            <button class="btn btn-sm btn-primary edit-item-btn me-2" data-bs-toggle="modal" data-bs-target="#editRecordModal" data-id="{{ $org->id }}" data-state="{{ $org->state_name }}" data-district="{{ $org->district_name }}" data-orgname="{{ $org->org_name }}"
        data-orglogo="{{ asset('/images/' . $org->org_logo) }}"> 
                                Edit
                            </button>
                            <button class="btn btn-sm btn-danger remove-item-btn" data-bs-toggle="modal" data-bs-target="#deleteRecordModal" data-id="{{ $org->id }}">
                                Remove
                            </button>
                        </div>
                    </td>
                @endif
            </tr>
        @endforeach
    @endif
</tbody>

                        </table>
                                             @if($organizations->isNotEmpty())
                    <div class="d-flex justify-content-center">
                        {!! $organizations->links() !!}
                    </div>
                    @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@if((isset($permissions)) && (($permissions['organizations_master_create'] == 2) ))
    <div class="col-xxl-6">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Add Organization</h4>
            </div>
            <div class="card-body">
                <div class="live-preview">
<form action="{{ route('store-organization') }}" method="POST" class="row g-3" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <input type="hidden" name="owner_id" value="{{Auth::user()->id}}">
                            <label for="state" class="form-label">State </label>
                            <select id="state" name="state" class="form-select mb-3" required>
                                <option value="">Select state</option>
                                @foreach($statesData['states'] as $state)
                                    <option value="{{ $state['state'] }}">{{ $state['state'] }}</option>
                                @endforeach
                            </select>
                            @error('state')
                                <div class="invalid-feedback" style="color: red;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="district" class="form-label">District </label>
                            <select id="district" name="district" class="form-select mb-3" required>
                                <option value="">Select District</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="tehshil_name" class="form-label">Organization </label>
                            <input type="text" name="org_name" class="form-control @error('org_name') is-invalid @enderror" id="org_name" placeholder="Enter organization name">
                            @error('org_name')
                                <div class="invalid-feedback" style="color: red;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        
                       <div class="mb-3">
    <label for="edit-org_logo" class="form-label">Organization Logo</label>
    <input type="file" name="org_logo" class="form-control @error('org_logo') is-invalid @enderror" id="edit-org_logo" accept="image/*" onchange="previewImage()">
    
    <!-- Image Preview -->
    <div class="mt-3">
        <img id="org_logo_preview" src="#" alt="Organization Logo Preview" style="display: none; max-height: 150px; border: 1px solid #ddd; padding: 5px;">
    </div>
    
    @error('org_logo')
        <div class="invalid-feedback" style="color: red;">
            {{ $message }}
        </div>
    @enderror
</div>

<script>
    function previewImage() {
        var file = document.getElementById('edit-org_logo').files[0];
        var reader = new FileReader();

        reader.onload = function(e) {
            var preview = document.getElementById('org_logo_preview');
            preview.src = e.target.result;
            preview.style.display = 'block'; // Show the preview
        };

        // Read the image file as a data URL
        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>

                        <div class="col-12">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

<!-- Modal for Deleting Record -->
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
<!-- Modal for Editing Record -->
<div class="modal fade zoomIn" id="editRecordModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" style="margin-top: 50px;"> <!-- Adjust this value to control how far down from the top the modal opens -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Organization</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close-edit"></button>
            </div>
            <div class="modal-body">
<form id="editForm" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" id="edit-id">
    <div class="mb-3">
        <label for="edit-state" class="form-label">State </label>
        <select id="edit-state" name="state" class="form-select mb-3" required>
            <option value="">Select state</option>
            @foreach($statesData['states'] as $state)
                <option value="{{ $state['state'] }}">{{ $state['state'] }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="edit-district" class="form-label">District </label>
        <select id="edit-district" name="district" class="form-select mb-3" required>
            <option value="">Select District</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="edit-org_name" class="form-label">Organization </label>
        <input type="text" name="org_name" class="form-control" id="edit-org_name" required>
    </div>
  <div class="mb-3">
    <label for="edit-org_logo" class="form-label">Organization Logo</label>
    <input type="file" name="org_logo" class="form-control" id="edit-org_logo" accept="image/*">
</div>
<div class="mb-3">
    <label for="current-org_logo" class="form-label">Current Organization Logo</label>
    <div id="current-org_logo">
        <img src="" alt="Current Logo" id="currentLogoImg" style="max-height: 60px; display: none;">
        <span id="noLogoMessage" style="display: none;">No Logo</span>
    </div>
</div>

    
    <div class="text-end">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    
    
    
    
    
    
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="{{ URL::asset('build/js/pages/select2.init.js') }}"></script>

<script src="{{ URL::asset('build/js/app.js') }}"></script>

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
    
    
    
     $(document).ready(function() {
        $('#taluka-field').select2({
            placeholder: 'Select taluka',
            allowClear: true
        });
    });
    
    
</script>
<script>
    $(document).ready(function() {
    $('#editRecordModal').on('shown.bs.modal', function () {
        $('#edit-state').select2({
            placeholder: 'Select state',
            allowClear: true,
            dropdownParent: $('#editRecordModal') // Ensure the dropdown is appended to the modal
        });

        $('#edit-district').select2({
            placeholder: 'Select district',
            allowClear: true,
            dropdownParent: $('#editRecordModal')
        });


    });
});
</script>

<script>
// Handle edit button click to populate the modal
document.querySelectorAll('.edit-item-btn').forEach(button => {
    button.addEventListener('click', function () {
        var id = this.getAttribute('data-id');
        var state = this.getAttribute('data-state');
        var district = this.getAttribute('data-district');
        var orgName = this.getAttribute('data-orgname');
        var orgLogo = this.getAttribute('data-orglogo'); // Add this line to retrieve the logo

        // Set values in the modal
        document.getElementById('edit-id').value = id;
        document.getElementById('edit-org_name').value = orgName;

        // Set state
        var editStateSelect = document.getElementById('edit-state');
        editStateSelect.value = state;

        // Populate districts based on the selected state
        populateDistricts(state, district);

        var currentLogoImg = document.getElementById('currentLogoImg');
        var noLogoMessage = document.getElementById('noLogoMessage');

        if (orgLogo) {
            currentLogoImg.src = orgLogo; // Set the image source
            currentLogoImg.style.display = 'block'; // Show the image
            noLogoMessage.style.display = 'none'; // Hide the "No Logo" message
        } else {
            currentLogoImg.style.display = 'none'; // Hide the image
            noLogoMessage.style.display = 'block'; // Show the "No Logo" message
        }
    });
});

// Function to populate districts based on the selected state
function populateDistricts(state, selectedDistrict) {
    var statesData = @json($statesData['states']); // Retrieve states data from PHP
    var selectedState = statesData.find(item => item.state === state);
    var editDistrictDropdown = $('#edit-district');
    editDistrictDropdown.empty().append('<option value="">Select District</option>'); // Clear existing options

    if (selectedState) {
        selectedState.districts.forEach(function(district) {
            editDistrictDropdown.append($('<option>', {
                value: district,
                text: district
            }));
        });
    }

    // Set the selected district if applicable
    editDistrictDropdown.val(selectedDistrict);
}

// Handle state selection change in edit modal
document.getElementById('edit-state').addEventListener('change', function() {
    var newState = this.value;
    populateDistricts(newState, ''); // Clear the district selection when state changes
});

// Handle form submission

</script>

<script>
    
    $(document).ready(function() {
    // Submit the form via AJAX
    $('#editForm').on('submit', function(e) {
        e.preventDefault(); // Prevent default form submission
        
        // Create FormData object to handle file uploads
        var formData = new FormData(this);
        
        var id = $('#edit-id').val(); // Get the ID of the organization being edited
        var url = '/organizationss/' + id; // Use the route with the ID

        $.ajax({
            url: url,
            type: 'POST', // Use POST for the update (with _method PUT in FormData)
            data: formData,
            contentType: false, // Important for file upload
            processData: false, // Important for file upload
            success: function(response) {
                if(response.success) {
        $('#editRecordModal').modal('hide');
        
        // Show a success message using SweetAlert
        Swal.fire({
            title: 'Success!',
            text: 'Organization updated successfully!',
            icon: 'success',
            confirmButtonText: 'OK'
        });

        // Dynamically update the specific row
                } else {
                    // If there are validation errors, show them
                    console.log(response.errors);
                    $.each(response.errors, function(key, error) {
                        // Show the error (you can also display them in the modal)
                        alert(error);
                    });
                }
            },
            error: function(xhr) {
                console.log(xhr.responseText); // Log any errors for debugging
            }
        });
    });
});

</script>


<script>
    
        $(document).ready(function() {
            // Handle state selection change
            $('#state').change(function() {
                var state = $(this).val();
                var statesData = @json($statesData['states']); // Pass states data to JavaScript

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


    // Handle delete button click to set form action
    document.querySelectorAll('.remove-item-btn').forEach(button => {
        button.addEventListener('click', function () {
            var id = this.getAttribute('data-id');
            var deleteForm = document.getElementById('deleteForm');
            deleteForm.action = `/organization/${id}`;
            deleteForm.dataset.id = id; // Store ID for later use
        });
    });

    // Handle form submission for deletion
    document.getElementById('deleteForm').addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent the default form submission

        var form = this;
        var formData = new FormData(form);

        fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest', // To signal it's an AJAX request
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Remove the row from the table
                var row = document.getElementById(`tehsilRow${form.dataset.id}`);
                if (row) row.remove();

                // Hide the modal
                var modal = bootstrap.Modal.getInstance(document.getElementById('deleteRecordModal'));
                if (modal) {
                                    alert('Organization delete successfully');

                    modal.hide();
                }
            } else {
                alert('Failed to delete the record.');
            }
        })
        .catch(error => console.error('Error:', error));
    });
});

</script>
<meta name="csrf-token" content="{{ csrf_token() }}">


@endsection

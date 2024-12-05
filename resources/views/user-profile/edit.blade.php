@extends('layouts.master')
@section('title')
    @lang('translation.edit-user')
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
            <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />

@endsection
@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Edit User</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <!-- Your existing form container -->
                <form class="leave-form" autocomplete="off" action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data" >

                    @csrf
                    @method('PUT')
                    
       <div class="row mb-3">
    <div class="col-md-4">
        <label for="state" class="form-label">State</label>
        <select id="state" name="state" class="form-control">
            <option value="">Select State</option>
            @foreach($statesData['states'] as $state)
                <option value="{{ $state['state'] }}" {{ $user->state === $state['state'] ? 'selected' : '' }}>
                    {{ $state['state'] }}
                </option>
            @endforeach
        </select>
        @error('state')
            <div class="invalid-feedback text-red">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="district" class="form-label">District</label>
        <select id="district" name="district" class="form-control">
            <option value="{{ $user->district}}"> {{ $user->district}}</option>
            <!-- Districts will be loaded here -->
        </select>
        @error('district')
            <div class="invalid-feedback text-red">{{ $message }}</div>
        @enderror
    </div>
   <div class="col-md-4">
    <label for="organisation" class="form-label">Select Organization</label>
    <select id="organisation" name="organisation" class="form-select mb-3">

    </select>
</div>

</div>

<div class="row">
    <div class="col-md-4">
    <label for="department_name" class="form-label">Select Department</label>
    <select name="department_name" id="department_name" class="form-select mb-3">

    </select>
    @error('department_name')
        <div class="invalid-feedback" style="color: red;">
            {{ $message }}
        </div>
    @enderror
</div>

    <div class="col-md-4">
        <label for="taluka-field" class="form-label">Taluka</label>
        <select id="taluka-field" name="taluka" class="form-control" >
            <option value="{{ $user->taluka}}">{{ $user->taluka}}</option>
            <!-- Talukas will be loaded here -->
        </select>
        @error('taluka')
            <div class="invalid-feedback text-red">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="designation" class="form-label">Select Designation</label>
        <select name="designation" id="designation" class="form-select mb-3">
            <!-- Designations will be loaded here -->
        </select>
        @error('designation')
            <div class="invalid-feedback" style="color: red;">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>



                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="first-name-field" class="form-label">First Name</label>
                            <input type="text" id="first-name-field" name="first_name" class="form-control @error('first_name') is-invalid @enderror" placeholder="Enter First Name" value="{{ old('first_name', $user->first_name) }}" />
                            @error('first_name')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="middle-name-field" class="form-label">Middle Name</label>
                            <input type="text" id="middle-name-field" name="middle_name" class="form-control @error('middle_name') is-invalid @enderror" placeholder="Enter Middle Name" value="{{ old('middle_name', $user->middle_name) }}" />
                            @error('middle_name')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="last-name-field" class="form-label">Last Name</label>
                            <input type="text" id="last-name-field" name="last_name" class="form-control @error('last_name') is-invalid @enderror" placeholder="Enter Last Name" value="{{ old('last_name', $user->last_name) }}" />
                            @error('last_name')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email-field" class="form-label">Email</label>
                        <input type="email" id="email-field" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email" value="{{ old('email', $user->email) }}" />
                        @error('email')
                            <div class="invalid-feedback text-red">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password-field" class="form-label">Password</label>
                        <input type="password" id="password-field" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Password" />
                        @error('password')
                            <div class="invalid-feedback text-red">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password-confirm-field" class="form-label">Confirm Password</label>
                        <input type="password" id="password-confirm-field" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Confirm Password" />
                        @error('password_confirmation')
                            <div class="invalid-feedback text-red">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="contact-field" class="form-label">Contact</label>
                        <input type="tel" id="contact-field" name="number" class="form-control @error('number') is-invalid @enderror" placeholder="Enter Contact Number" value="{{ old('number', $user->number) }}" />
                        @error('number')
                            <div class="invalid-feedback text-red">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="address-field" class="form-label">Address</label>
                        <input type="text" id="address-field" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Enter Address" value="{{ old('address', $user->address) }}" />
                        @error('address')
                            <div class="invalid-feedback text-red">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="total-leaves-field" class="form-label">Total Yearly Leaves</label>
                        <input type="number" id="total-leaves" name="leaves" class="form-control @error('leaves') is-invalid @enderror" placeholder="Enter Total Yearly Leaves" value="{{ old('leaves', $user->leaves) }}" />
                        @error('leaves')
                            <div class="invalid-feedback text-red">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
    <label for="available-leaves" class="form-label">Available Leaves</label>
    <input type="number" id="available-leaves" name="available_leave" class="form-control" placeholder="Available Leaves" value="{{ old('available_leave', $user->available_leave ?? '') }}" readonly />
</div>

                    
                    
                                             <div class="mb-3">
                    <label for="file1" class="form-label">Upload Old Book</label>
<input type="file" name="old_book" id="file1" value="{{  old('old_book', $user->old_book)}}" class="form-control" accept=".pdf,.doc,.docx,.jpeg,.png,.jpg,.gif" onchange="uploadFile()" />
                    <small class="form-text text-muted">Choose a file to upload.</small>
                @if($user->old_book)
        <div class="mt-0">
            <a href="{{ asset('images/' . $user->old_book) }}" target="_blank" class="">
                View Old Book
            </a>
        </div>
    @endif
                    <div class="mt-2">
                        <progress id="progressBar" value="0" max="100" style="width: 100%; height: 25px;"></progress>
                    </div>
                
                    <div class="mt-2">
                        
                        <p id="Uploadstatus" class="small text-muted"></p>
                        <p id="loaded_n_total" class="small text-muted" style="display: inline-block;"></p>
                    </div>
                    
                    @error('old_book')
                        <div class="invalid-feedback text-red">{{ $message }}</div>
                    @enderror
                    
                        

                </div>

                      @php
$isAdmin = auth()->user()->is_admin === 'admin';
@endphp

@if (!$isAdmin)
    <input type="hidden" name="state" value="{{ old('state', $user->state) }}">
    <input type="hidden" name="district" value="{{ old('district', $user->district) }}">
    <input type="hidden" name="taluka" value="{{ old('taluka', $user->taluka) }}">
    <input type="hidden" name="designation" value="{{ old('designation', $user->design_id) }}">
    <input type="hidden" name="department_name" value="{{ old('department_name', $user->depart_id) }}">
    <input type="hidden" name="organisation" value="{{ old('organisation', $user->org_id) }}">
@endif

                        <div style="display: flex; justify-content: flex-end; gap: 10px;">
    <div class="hstack gap-2">
        <button type="submit" class="btn btn-success">update</button>
    </div>

    <div class="hstack gap-2">
        <button type="button" class="btn btn-primary" onclick="window.location.href='{{ route('users.index')}}'">Back</button>
    </div>
</div>

            </form>
            </div><!-- end card body -->
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
    
    
    
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

        
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="{{ URL::asset('build/js/pages/select2.init.js') }}"></script>

<script src="{{ URL::asset('build/js/app.js') }}"></script>
<script>
    document.getElementById('total-leaves').addEventListener('input', function() {
        var totalLeaves = this.value;
        document.getElementById('available-leaves').value = totalLeaves;
    });
</script>

<script>
        $('#district').select2({
            placeholder: 'Select District',
            allowClear: true
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
    // Initialize select2
    $('#state').select2({ placeholder: 'Select State', allowClear: true });
    $('#district').select2({ placeholder: 'Select District', allowClear: true });
    $('#taluka-field').select2({ placeholder: 'Select Taluka', allowClear: true });
    $('#designation').select2({ placeholder: 'Select Designation', allowClear: true });
    $('#department_name').select2({ placeholder: 'Select Department', allowClear: true });
    $('#organisation').select2({ placeholder: 'Select Organisation', allowClear: true });

    // Set initial values
    var initialState = '{{ $user->state }}';
    var initialDistrict = '{{ $user->district }}';
    var initialTaluka = '{{ $user->taluka }}';
    var initialDesignation = '{{ $user->designation_name }}';
    var initialDepartment = '{{ $user->name }}';
    var initialOrganisation = '{{ $user->org_name }}';
  var isAdmin = {{ auth()->user()->is_admin === 'admin' ? 'true' : 'false' }};
        if (!isAdmin) {
            
        $('#state, #district, #taluka-field, #designation, #department_name, #organisation').each(function() {
            $(this).select2('enable', false); 
            $(this).css({
                'pointer-events': 'none', 
                'background-color': '#f5f5f5',
                'color': '#999'
            });
        });
    }


    function loadDropdowns() {
        loadInitialDistricts();
        loadInitialTalukas();
        loadOrganisations();
        loadDepartments();
        loadDesignations();
    }

    function loadInitialDistricts() {
        var state = $('#state').val();
        if (state) {
            var statesData = @json($statesData['states']);
            var selectedState = statesData.find(item => item.state === state);
            var districtDropdown = $('#district');

            districtDropdown.empty().append('<option value="">Select District</option>');

            if (selectedState) {
                selectedState.districts.forEach(district => {
                    districtDropdown.append($('<option>', { value: district, text: district }));
                });
                $('#district').val(initialDistrict).trigger('change');
            }
        }
    }

    function loadInitialTalukas() {
        var state = $('#state').val();
        var district = $('#district').val();
        if (state && district) {
            $.ajax({
                url: '{{ route('tehsils.get') }}',
                type: 'GET',
                data: { state: state, district: district },
                success: function(response) {
                    var talukaDropdown = $('#taluka-field');
                    talukaDropdown.empty().append('<option value="">Select Taluka</option>');
                    response.forEach(taluka => {
                        talukaDropdown.append($('<option>', { value: taluka, text: taluka }));
                    });
                    $('#taluka-field').val(initialTaluka).trigger('change');
                },
                error: function(xhr) {
                    console.error('Error fetching talukas:', xhr.responseText);
                }
            });
        }
    }

    function loadOrganisations() {
        var state = $('#state').val();
        var district = $('#district').val();
        if (state && district) {
            $.ajax({
                url: '{{ route('organisations.get') }}',
                type: 'GET',
                data: { state: state, district: district },
                success: function(response) {
                    var organisationDropdown = $('#organisation');
                    organisationDropdown.empty().append('<option value="">Select Organisation</option>');
                    response.forEach(org => {
                        organisationDropdown.append($('<option>', { value: org.id, text: org.org_name }));
                    });
                    $('#organisation').val('{{ $user->org_id }}').trigger('change');
                },
                error: function(xhr) {
                    console.error('Error fetching organisations:', xhr.responseText);
                }
            });
        }
    }

function loadDepartments() {
    console.trace('Function loadDepartments called');
    var state = $('#state').val();
    var district = $('#district').val();
    var organisation = $('#organisation').val();

    console.log('State:', state, 'District:', district, 'Organisation:', organisation);
    console.log('Initial Department ID:', '{{ $user->depart_id }}');

    if (state && district && organisation) {
        console.log('hello');
        $.ajax({
            url: '{{ route('departments.get') }}',
            type: 'GET',
            data: { state: state, district: district, organisation: organisation },
            success: function(response) {
                console.log('Raw Response:', response); // Log the raw response

                if (Array.isArray(response)) {
                    var departmentDropdown = $('#department_name');
                    departmentDropdown.empty().append('<option value="">Select Department</option>');

                    response.forEach(dept => {
                        departmentDropdown.append($('<option>', { value: dept.id, text: dept.name }));
                    });

                    console.log('Available Departments:', response);

                    if (response.some(dept => dept.id == '{{ $user->depart_id }}')) {
                        departmentDropdown.val('{{ $user->depart_id }}').trigger('change');
                        console.log('Department value set:', '{{ $user->depart_id }}');
                    } else {
                        console.warn('Initial Department ID not found in options');
                    }
                } else {
                    console.error('Response is not an array:', response);
                }
            },
            error: function(xhr) {
                console.error('Error fetching departments:', xhr.responseText);
            }
        });
    } else {
        $('#department_name').empty().append('<option value="">Select Department</option>');
    }
}
   
function loadDesignations() {
        var department = $('#department_name').val();
        var taluka = $('#taluka-field').val();
            var organisation = $('#organisation').val();

    if (taluka && organisation) {
            $.ajax({
                url: '{{ route('designations.getByTaluka') }}',
                type: 'GET',
            data: { taluka_id: taluka, organisation_id: organisation },
                success: function(response) {
                    var designationDropdown = $('#designation');
                    designationDropdown.empty().append('<option value="">-- Select Designation --</option>');
                    response.forEach(designation => {
                        designationDropdown.append($('<option>', { value: designation.id, text: designation.designation_name }));
                    });
                    $('#designation').val('{{ $user->design_id }}').trigger('change');
                },
                error: function(xhr) {
                    console.error('Error fetching designations by taluka:', xhr.responseText);
                }
            });
        } else if (department) {
            $.ajax({
                url: '{{ route('designations.get') }}',
                type: 'GET',
                data: { department_id: department },
                success: function(response) {
                    var designationDropdown = $('#designation');
                    designationDropdown.empty().append('<option value="">-- Select Designation --</option>');
                    response.forEach(designation => {
                        designationDropdown.append($('<option>', { value: designation.id, text: designation.designation_name }));
                    });
                    $('#designation').val('{{ $user->design_id }}').trigger('change');
                },
                error: function(xhr) {
                    console.error('Error fetching designations:', xhr.responseText);
                }
            });
        }
    }
    
    // Initialize dropdowns on page load
    loadDropdowns();

    // Attach change handlers
    $('#state').change(function() {
        loadInitialDistricts();
        loadOrganisations();
    });

    $('#district').change(function() {
        loadInitialTalukas();
        loadOrganisations();
    });

    $('#organisation').change(function() {
        loadDepartments();
    });

$('#department_name, #taluka-field, #organisation').change(loadDesignations);
});

    </script>    

<script>
function _(el) {
    return document.getElementById(el);
}

function uploadFile() {
    var file = _("file1").files[0];
    if (!file) {
        _("Uploadstatus").innerHTML = "No file selected";
        return;
    }

    var formdata = new FormData();
    formdata.append("file1", file);

    var ajax = new XMLHttpRequest();
    ajax.upload.addEventListener("progress", progressHandler, false);
    ajax.addEventListener("load", completeHandler, false);
    ajax.addEventListener("error", errorHandler, false);
    ajax.addEventListener("abort", abortHandler, false);

    ajax.open("POST", "file_upload_parser.php"); // Modify this with your actual file upload route.
    ajax.send(formdata);
}

function progressHandler(event) {
    var totalMB = (event.total / (1024 * 1024)).toFixed(2);
    var loadedMB = (event.loaded / (1024 * 1024)).toFixed(2);

    _("loaded_n_total").innerHTML = `Uploaded ${loadedMB} MB of ${totalMB} MB`;

    var percent = (event.loaded / event.total) * 100;
    _("progressBar").value = Math.round(percent);
    _("Uploadstatus").innerHTML = `Uploading... ${Math.round(percent)}% completed`;
    
    // Reset color on progress
    _("progressBar").style.backgroundColor = "#d3d3d3"; // Light gray by default
}

function completeHandler(event) {
    _("Uploadstatus").innerHTML = "Upload completed successfully!";
    _("progressBar").style.backgroundColor = "blue"; // Change progress bar color to blue
    _("progressBar").value = 100; // Ensure it's filled to 100%
}

function errorHandler(event) {
    _("Uploadstatus").innerHTML = "Upload failed";
}

function abortHandler(event) {
    _("Uploadstatus").innerHTML = "Upload aborted";
}

</script>

    
  @endsection

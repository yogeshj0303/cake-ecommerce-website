@extends('layouts.master')
@section('title')
    @lang('translation.list-js')
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet" type="text/css" />


@endsection
@section('content')

<div class="row">
     @php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

$userId = Auth::user()->id;

// First, fetch the user details
$user = DB::table('users')->where('id', $userId)->first();

// If the user is not an admin, perform the joins
if ($user && $user->is_admin != 'admin') {
    $user = DB::table('users')
        ->join('designations', 'users.design_id', '=', 'designations.id')
        ->join('departments', 'users.depart_id', '=', 'departments.id')
        ->join('organizations', 'users.org_id', '=', 'organizations.id')
        ->select('users.*', 
                 'designations.designation_name', 
                 'departments.name as department_name', 
                 'organizations.org_name as organisation_name')
        ->where('users.id', $userId)
        ->first();
}

@endphp

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Add staff</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <!-- Your existing form container -->
               <form class="leave-form" autocomplete="off" action="{{ route('staff-add.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-4">
            <label for="state" class="form-label">State</label>
            <select id="state" name="state" class="form-control" >
                <option value="">Select State</option>
                @foreach($statesData['states'] as $state)
                <option value="{{ $state['state'] }}" {{ $user->state === $state['state'] ? 'selected' : '' }}>
                    {{ $state['state'] }}
                </option>
                @endforeach
            </select>
            @error('state')
        <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="district" class="form-label">District</label>
            <select id="district" name="district" class="form-control" >
                <option value="">Select District</option>
                <!-- Districts will be loaded dynamically -->
            </select>
            @error('district')
        <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="organisation" class="form-label">Select Organization</label>
            <select id="organisation" name="organisation" class="form-select" >
                <option value="">Select organisation</option>
                <!-- Organizations will be loaded dynamically -->
            </select>
            @error('organisation')
        <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <label for="department_name" class="form-label">Select Department</label>
            <select name="department_name" id="department_name" class="form-select" >
                <option value="">-- Select Department --</option>
                <!-- Departments will be loaded dynamically -->
            </select>
            @error('department_name')
        <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="taluka-field" class="form-label">Taluka</label>
            <select id="taluka-field" name="taluka" class="form-control" >
                <option value="">Select Taluka</option>
                <!-- Talukas will be loaded here -->
            </select>
            @error('taluka')
        <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="designation" class="form-label">Select Designation</label>
            <select name="designation" id="designation" class="form-select" >
                <option value="">-- Select Designation --</option>
                <!-- Designations will be loaded dynamically -->
            </select>
            @error('designation')
        <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-4">
            <label for="first-name-field" class="form-label">First Name</label>
            <input type="text" id="first-name-field" name="first_name" class="form-control @error('first_name') is-invalid @enderror" placeholder="Enter First Name" value="{{ old('first_name') }}" />
            @error('first_name')
                <div class="invalid-feedback text-red">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="middle-name-field" class="form-label">Middle Name</label>
            <input type="text" id="middle-name-field" name="middle_name" class="form-control @error('middle_name') is-invalid @enderror" placeholder="Enter Middle Name" value="{{ old('middle_name') }}" />
            @error('middle_name')
                <div class="invalid-feedback text-red">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="last-name-field" class="form-label">Last Name</label>
            <input type="text" id="last-name-field" name="last_name" class="form-control @error('last_name') is-invalid @enderror" placeholder="Enter Last Name" value="{{ old('last_name') }}" />
            @error('last_name')
                <div class="invalid-feedback text-red">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-4">
            <label for="email-field" class="form-label">Email</label>
            <input type="" id="email-field" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email" value="{{ old('email') }}" />
            @error('email')
                <div class="invalid-feedback text-red">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="phone_number-field" class="form-label">Phone Number</label>
            <input type="number" id="phone_number-field" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" placeholder="Phone Number" value="{{ old('phone_number') }}" />
            @error('phone_number')
                <div class="invalid-feedback text-red">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="birth_date" class="form-label">Birth Date</label>
            <input type="text" id="birth_date" name="birth_date" data-provider="flatpickr" data-date-format="d M, Y" class="form-control @error('birth_date') is-invalid @enderror" value="{{ old('birth_date') }}" />
            @error('birth_date')
                <div class="invalid-feedback text-red">{{ $message }}</div>
            @enderror
        </div>

    </div>

    <div class="row mb-3">
        <div class="col-md-4">
            <label for="address-field" class="form-label">Address</label>
            <input type="text" id="address-field" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Enter Address" value="{{ old('address') }}" />
            @error('address')
                <div class="invalid-feedback text-red">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="role_name" class="form-label">Select Role</label>
<select name="role_name" id="role_name" class="form-select mb-2 @error('role_name') is-invalid @enderror">
                <option value="">-- Select Role --</option>
                <!-- Roles will be loaded dynamically -->
            </select>
            @error('role_name')
                <div class="invalid-feedback text-red">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="password-field" class="form-label">Password</label>
            <input type="password" id="password-field" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Password" />
            @error('password')
                <div class="invalid-feedback text-red">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="password_confirmation-field" class="form-label">Confirm Password</label>
            <input type="password" id="password_confirmation-field" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Enter Confirm Password" />
            @error('password_confirmation')
                <div class="invalid-feedback text-red">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @php
    $isAdmin = $user->is_admin === 'admin'; // This will be a boolean
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
        <button type="submit" class="btn btn-success">submit</button>
    </div>

    <div class="hstack gap-2">
        <button  type="button" class="btn btn-primary" onclick="window.location.href='{{ route('staff-add.index')}}'">Back</button>
    </div>
</div>

</form>
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
    // Initialize flatpickr with options
    flatpickr("#birth_date", {
        dateFormat: "d M, Y",  // Custom date format
        onKeyDown: function(selectedDates, dateStr, instance, e) {
            if (e.key === "Enter") {
                e.preventDefault();  // Prevent form submission on Enter key
                instance.setDate(new Date(), true);  // Set today's date
                instance.close();  // Close the calendar
            }
        }
    });
</script>
<script>
$(document).ready(function() {
    // Initialize select2 for better dropdown styling
    $('#state').select2({ placeholder: 'Select State', allowClear: true });
    $('#district').select2({ placeholder: 'Select District', allowClear: true });
    $('#taluka-field').select2({ placeholder: 'Select Taluka', allowClear: true });
    $('#designation').select2({ placeholder: 'Select Designation', allowClear: true });
    $('#department_name').select2({ placeholder: 'Select Department', allowClear: true });
    $('#organisation').select2({ placeholder: 'Select Organization', allowClear: true });
            $('#role_name').select2({ placeholder: 'Select role', allowClear: true });


    // Set initial values using user details
    var initialState = '{{ old('state', $user->state) }}';
    var initialDistrict = '{{ old('district', $user->district) }}';
    var initialTaluka = '{{ old('taluka', $user->taluka) }}';
    var initialDesignation = '{{ old('designation', $user->design_id) }}';
    var initialDepartment = '{{ old('department_name', $user->depart_id) }}';
    var initialOrganisation = '{{ old('organisation', $user->org_id) }}';
        var initialRoles = '{{ old('role_name', '') }}'; // Pass old value from 

    // Initialize dropdowns with initial values
    $('#state').val(initialState).trigger('change');
    $('#district').val(initialDistrict).trigger('change');
    $('#taluka-field').val(initialTaluka).trigger('change');
    $('#designation').val(initialDesignation).trigger('change');
    $('#department_name').val(initialDepartment).trigger('change');
    $('#organisation').val(initialOrganisation).trigger('change');
     var isAdmin = {{ $user->is_admin === 'admin' ? 'true' : 'false' }};
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
                // Set selected value to the initial district
                districtDropdown.val(initialDistrict).trigger('change');
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
                    // Set selected value to the initial taluka
                    talukaDropdown.val(initialTaluka).trigger('change');
                },
                error: function(xhr) {
                    console.error('Error fetching talukas:', xhr.responseText);
                }
            });
        } else {
            $('#taluka-field').empty().append('<option value="">Select Taluka</option>');
        }
    }

    function loadOrganisations() {
        var state = $('#state').val() || initialState; // Use selected state or initial
        var district = $('#district').val() || initialDistrict; // Use selected district or initial
        var organisationDropdown = $('#organisation');


        organisationDropdown.empty().append('<option value="">Select Organisation</option>');

        if (state && district) {
            $.ajax({
                url: '{{ route('organisations.get') }}',
                type: 'GET',
                data: { state: state, district: district },
                success: function(response) {
                    response.forEach(org => {
                        if (!organisationDropdown.find('option[value="' + org.id + '"]').length) { // Prevent duplicates
                            organisationDropdown.append($('<option>', { value: org.id, text: org.org_name }));
                        }
                    });
                    // Set selected value to the initial organisation
                    organisationDropdown.val(initialOrganisation).trigger('change');
                },
                error: function(xhr) {
                    console.error('Error fetching organisations:', xhr.responseText);
                }
            });
        }
    }

    function loadDepartments() {
        var state = $('#state').val();
        var district = $('#district').val();
        var organisation = $('#organisation').val();
        var departmentDropdown = $('#department_name');

        departmentDropdown.empty().append('<option value="">Select Department</option>');

        if (state && district && organisation) {
            $.ajax({
                url: '{{ route('departments.get') }}',
                type: 'GET',
                data: { state: state, district: district, organisation: organisation },
                success: function(response) {
                    response.forEach(dept => {
                        if (!departmentDropdown.find('option[value="' + dept.id + '"]').length) { // Prevent duplicates
                            departmentDropdown.append($('<option>', { value: dept.id, text: dept.name }));
                        }
                    });
                    // Set selected value to the initial department
                    departmentDropdown.val(initialDepartment).trigger('change');
                },
                error: function(xhr) {
                    console.error('Error fetching departments:', xhr.responseText);
                }
            });
        }
    }

    function loadDesignations() {
        var department = $('#department_name').val();
        var taluka = $('#taluka-field').val();
        var organisation = $('#organisation').val();
        var designationDropdown = $('#designation');

        designationDropdown.empty().append('<option value="">-- Select Designation --</option>');

        if (taluka && organisation) {
            $.ajax({
                url: '{{ route('designations.getByTaluka') }}',
                type: 'GET',
                data: { taluka_id: taluka, organisation_id: organisation },
                success: function(response) {
                    response.forEach(designation => {
                        if (!designationDropdown.find('option[value="' + designation.id + '"]').length) { // Prevent duplicates
                            designationDropdown.append($('<option>', { value: designation.id, text: designation.designation_name }));
                        }
                    });
                    // Set selected value to the initial designation
                    designationDropdown.val(initialDesignation).trigger('change');
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
                    response.forEach(designation => {
                        if (!designationDropdown.find('option[value="' + designation.id + '"]').length) { // Prevent duplicates
                            designationDropdown.append($('<option>', { value: designation.id, text: designation.designation_name }));
                        }
                    });
                    // Set selected value to the initial designation
                    designationDropdown.val(initialDesignation).trigger('change');
                },
                error: function(xhr) {
                    console.error('Error fetching designations:', xhr.responseText);
                }
            });
        }
    }
    
           $('#designation').change(function() {
            loadRoles();
        });

        function loadRoles() {
    // Get the values of the required fields
    var state = $('#state').val();
    var district = $('#district').val();
    var department = $('#department_name').val();
    var taluka = $('#taluka-field').val();
    var organisation = $('#organisation').val();
    var designation = $('#designation').val();
    var data = { 
        state: state,
        district: district,
        department: department,
        organisation: organisation,
        designation: designation
    };

    if (taluka) {
        data.taluka = taluka;
    }


    if (state && district && department && organisation && designation) {
        $.ajax({
            url: '{{ route('fetchrolesstaff') }}',
            type: 'GET',
            data: data,
            success: function(response) {
                console.log(response);
                var rolesDropdown = $('#role_name');
                rolesDropdown.empty().append('<option value="">Select Role</option>'); // Set default option

                // Populate roles dropdown with response
                response.forEach(role => {
                    
                    rolesDropdown.append($('<option>', { value: role.id, text: role.role_name }));
                });

                // Set the initial value after the options are loaded
                if (initialRoles) {
                    rolesDropdown.val(initialRoles).trigger('change'); // Set initial value
                }
            },
            error: function(xhr) {
                console.error('Error fetching roles:', xhr.responseText);
            }
        });
    } else {
        // Clear the roles dropdown if any field is empty
        $('#role_name').empty().append('<option value="">Select Role</option>');
    }
}

    // Attach change handlers to reload dependent dropdowns
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

    $('#department_name, #taluka-field, #organisation').change(function() {
        loadDesignations();
    });

    // Initialize dropdowns on page load
    loadDropdowns();
});
</script>

    
@endsection

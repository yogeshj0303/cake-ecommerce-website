@extends('layouts.master')
@section('title')
    @lang('translation.list-js')
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">


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
                <h4 class="card-title mb-0">Add affidavit</h4>
                
            </div>
                                                        
            <div class="card-body">
<form class="leave-form" method="POST" action="{{ route('affidavits-store') }}" id="addaffidavitForm" autocomplete="off" enctype="multipart/form-data">
                    @csrf

                         <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="state" class="form-label">State</label>
                            <select id="state" name="state" class="form-control" >
                                <option value="">Select State</option>
                                @foreach($statesData['states'] as $state)
                <option value="{{ $state['state'] }}" 
                        {{ old('state', $user->state) === $state['state'] ? 'selected' : '' }}>
                    {{ $state['state'] }}
                </option>                                @endforeach
                            </select>
                            @error('state')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="district" class="form-label">District</label>
                            <select id="district" name="district" class="form-control" >
                                <option value="">Select District</option>
                                <!-- Districts will be loaded here -->
                            </select>
                            @error('district')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        
                        
                                                
                                                                          <div class="col-md-4">
                            <label for="organisation" class="form-label">select organization</label>
                            <select id="organisation" name="organisation" class="form-select mb-3" >
                                <option value="">Select organization</option>
                            </select>
                        </div>


                        
                                            <div class="row">
                                                
                                                
                                                <div class="col-md-4">
                            <label for="department_name" class="form-label">Select Department</label>
                           <select name="department_name"  id ="department_name" class="form-select mb-3" >
                            <option value="">-- Select Department --</option>
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
                                <option value="">Select Taluka</option>
                                <!-- Talukas will be loaded here -->
                            </select>
                            @error('taluka')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        
                        
                        
                        
                        
                        
                        
                        
                                        <div class="col-md-4">
    <label for="designation" class="form-label">Select Designation</label>
    <select name="designation" id="designation" class="form-select mb-3">
        <option value="">-- Select Designation --</option>
    </select>
    @error('designation')
    <div class="invalid-feedback" style="color: red;">
        {{ $message }}
    </div>
    @enderror
</div>   
                        
                        
                                     
                                                





</div>
                     
<div class="row">
    <div class="col-md-6 mb-3">
        <label for="name" class="form-label">Profile Name</label>
        <select id="name" name="name" class="form-control  @error('name') is-invalid @enderror">
            <option value="">Select Profile Name</option>
        </select>
        @error('name')
            <div class="invalid-feedback text-red">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6">
        <label for="affidavit_name" class="form-label">Select Affidavit Name</label>
        <select name="affidavit_name" id="affidavitName" class="form-select mb-3">
            <option value="">-- Select Affidavit --</option>
            @foreach($AffidavitType as $AffidavitTypes)
                <option value="{{ $AffidavitTypes->id }}">{{ $AffidavitTypes->name }}</option>
            @endforeach
        </select>
        @error('affidavit_name')
            <div class="invalid-feedback" style="color: red;">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>

<div class="row" id="memoField" style="display: none;">
    <div class="form-group col-md-12">
        <label for="memo">Memo:</label>
    <div id="memo-editor" contenteditable="true" style="border: 1px solid #ccc; height: 200px; overflow-y: auto; padding: 10px;"></div>
        <textarea id="memo" name="affidavit_memo" style="display:none;"></textarea>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-12">
        <label for="reference_docs" class="form-label">Reference Documents (PDF only)</label>
        <input type="file" id="reference_docs" name="reference_docs" class="form-control @error('reference_docs') is-invalid @enderror" />
        @error('reference_docs')
            <div class="invalid-feedback text-red">{{ $message }}</div>
        @enderror
        <img id="reference-docs-preview" src="" alt="Reference Documents Preview" style="display: none; max-width: 200px; margin-top: 10px;" />
    </div>
</div>

<!--<div class="row mb-3">-->
<!--    <div class="col-md-12">-->
<!--        <label for="witness_signature" class="form-label">Witness Signature</label>-->
<!--        <input type="file" id="witness_signature" name="witness_signature" class="form-control @error('witness_signature') is-invalid @enderror" />-->
<!--        @error('witness_signature')-->
<!--            <div class="invalid-feedback text-red">{{ $message }}</div>-->
<!--        @enderror-->
<!--        <img id="witness-signature-preview" src="" alt="Witness Signature Preview" style="display: none; max-width: 200px; margin-top: 10px;" />-->
<!--    </div>-->
<!--</div>-->
<!-- end row -->

<!--<div class="row mb-3">-->
<!--    <div class="col-md-12">-->
<!--        <label for="hod_signature" class="form-label">HOD Signature</label>-->
<!--        <input type="file" id="hod_signature" name="hod_signature" class="form-control @error('hod_signature') is-invalid @enderror" />-->
<!--        @error('hod_signature')-->
<!--            <div class="invalid-feedback text-red">{{ $message }}</div>-->
<!--        @enderror-->
<!--        <img id="hod-signature-preview" src="" alt="HOD Signature Preview" style="display: none; max-width: 200px; margin-top: 10px;" />-->
<!--    </div>-->
<!--</div>-->
<!-- end row -->

<!--<div class="row mb-3">-->
<!--    <div class="col-md-12">-->
<!--        <label for="clerk_signature" class="form-label">Clerk Signature</label>-->
<!--        <input type="file" id="clerk_signature" name="clerk_signature" class="form-control @error('clerk_signature') is-invalid @enderror" />-->
<!--        @error('clerk_signature')-->
<!--            <div class="invalid-feedback text-red">{{ $message }}</div>-->
<!--        @enderror-->
<!--        <img id="clerk-signature-preview" src="" alt="Clerk Signature Preview" style="display: none; max-width: 200px; margin-top: 10px;" />-->
<!--    </div>-->
<!--</div>-->
<!-- end row -->


                                   

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
        <button type="submit" class="btn btn-success">submit</button>
    </div>

    <div class="hstack gap-2">
<button type="button" class="btn btn-primary" onclick="window.history.back()">Back</button>
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
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
    
    
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      
      

      
      <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="{{ URL::asset('build/js/pages/select2.init.js') }}"></script>


<script>
$(document).ready(function() {
    // Initialize select2 for better dropdown styling
    $('#state').select2({ placeholder: 'Select State', allowClear: true });
    $('#district').select2({ placeholder: 'Select District', allowClear: true });
    $('#taluka-field').select2({ placeholder: 'Select Taluka', allowClear: true });
    $('#designation').select2({ placeholder: 'Select Designation', allowClear: true });
    $('#department_name').select2({ placeholder: 'Select Department', allowClear: true });
    $('#organisation').select2({ placeholder: 'Select Organization', allowClear: true });

    // Set initial values using user details
    var initialState = '{{ old('state', $user->state) }}';
    var initialDistrict = '{{ old('district', $user->district) }}';
    var initialTaluka = '{{ old('taluka', $user->taluka) }}';
    var initialDesignation = '{{ old('designation', $user->design_id) }}';
    var initialDepartment = '{{ old('department_name', $user->depart_id) }}';
    var initialOrganisation = '{{ old('organisation', $user->org_id) }}';

    // Initialize dropdowns with initial values
    $('#state').val(initialState).trigger('change');
    $('#district').val(initialDistrict).trigger('change');
    $('#taluka-field').val(initialTaluka).trigger('change');
    $('#designation').val(initialDesignation).trigger('change');
    $('#department_name').val(initialDepartment).trigger('change');
    $('#organisation').val(initialOrganisation).trigger('change');
 
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
    
function fetchProfileName() {
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
            url: '{{ route('fetch.profiles') }}',  // Ensure this route returns profiles based on designation
            type: 'GET',
            data: data,
            success: function(response) {
                console.log(response);
                var profileDropdown = $('#name'); // The profile dropdown
                profileDropdown.empty().append('<option value="">Select Profile Name</option>');

                response.forEach(function(user) {
                    profileDropdown.append($('<option>', {
                        value: user.id,
                        text: [user.first_name, user.middle_name, user.last_name].filter(Boolean).join(' '), 
                        'data-gender': user.gender,
                        'data-caste': user.caste, // Add caste data
                        'data-joining-date': user.joining_date,
                        'data-joining_start_salary': user.joining_start_salary
                    }));
                });

                // Custom initialization of Select2 after populating the options
                profileDropdown.select2({
                    placeholder: "Select Profile Name",
                    allowClear: true,
                });

                // Set the selected profile based on old value
                var selectedProfile = '{{ old('name', $user->profile_id ?? '') }}'; // Get the old value or the existing profile id
                profileDropdown.val(selectedProfile).trigger('change'); // Set the old or pre-filled value and refresh Select2
            },
            error: function(xhr) {
                console.error('Error fetching profiles:', xhr.responseText);
            }
        });
    } else {
        $('#name').empty().append('<option value="">Select Profile Name</option>'); // Reset if no designation is selected
        $('#name').trigger('change'); // Refresh Select2 if no data
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
                    $('#designation').empty().append('<option value="">-- Select Designation --</option>');

    });

    $('#organisation').change(function() {
        loadDepartments();
    });

    $('#department_name, #taluka-field, #organisation').change(function() {
        loadDesignations();
    });
    
     $('#designation').change(function() {
        fetchProfileName();
    });

    // Initialize dropdowns on page load
    loadDropdowns();
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

    // Handle form submission
    $('#addaffidavitForm').submit(function(e) {
        e.preventDefault();
        var memoContent = quill.root.innerHTML;
        $('#memo').val(memoContent); 
        this.submit(); 
    });

    // Handle affidavit selection
    $('#affidavitName').on('change', function() {
        var affidavitId = $(this).val();

        if (affidavitId == "") {
            $('#memoField').hide();
            quill.setContents([]); // Clear the Quill editor
            return;
        }

        $.ajax({
            url: '/get-affidavit-memo/' + affidavitId,
            type: 'GET',
            success: function(response) {
                if (response && response.memo) {
                    $('#memoField').show();
                    quill.root.innerHTML = response.memo; // Populate the Quill editor with memo
                } else {
                    alert('No memo found for the selected affidavit.');
                    $('#memoField').hide();
                }
            },
            error: function(xhr, status, error) {
                alert('Failed to fetch memo. Please try again.');
                console.error('Error:', error);
            }
        });
    });
});
</script>

    
    
    
    
@endsection

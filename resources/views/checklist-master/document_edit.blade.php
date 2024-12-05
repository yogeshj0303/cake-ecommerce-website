@extends('layouts.master')
@section('title')
    @lang('translation.list-js')
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />

@endsection
@section('content')
                       <?php



?>
<div class="row">
 

 <div class="col-xxl-6">
    <div class="card">
        <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">Update Document</h4>
        </div>
        <div class="card-body">
            <div class="live-preview">
                <!-- Use the 'document.updatedata' route and pass the document ID -->
                <form action="{{ route('document.updatedata', $document->id) }}" method="POST" class="row g-3">
                    @csrf
                    @method('PUT') <!-- Use PUT method for updating -->
                    
                    <input type="hidden" name="owner_id" value="{{ Auth::user()->id }}">
                    
                    <div class="col-md-12">
                        <label for="doc_name" class="form-label">Document Name</label>
                        <input type="text" name="doc_name" 
                               class="form-control @error('doc_name') is-invalid @enderror" 
                               id="doc_name" 
                               placeholder="Enter Document Name" 
                               value="{{ old('doc_name', $document->doc_name) }}"> <!-- Populate with existing name -->
                        @error('doc_name')
                            <div class="invalid-feedback" style="color: red;">
                                {{ $message }}
                            </div>
                        @enderror
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


@endsection
@section('script')

<script src="{{ URL::asset('build/libs/prismjs/prism.js') }}"></script>
    <script src="{{ URL::asset('build/libs/list.js/list.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/list.pagination.js/list.pagination.min.js') }}"></script>

    <!-- listjs init -->
    <script src="{{ URL::asset('build/js/pages/listjs.init.js') }}"></script>

    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
   document.addEventListener('DOMContentLoaded', function() {
    // Handle state change to populate districts
  
    // Handle delete button click to set form action
    document.querySelectorAll('.remove-item-btn').forEach(button => {
        button.addEventListener('click', function () {
            var id = this.getAttribute('data-id');
            var deleteForm = document.getElementById('deleteForm');
            deleteForm.action = `/document/${id}`;
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

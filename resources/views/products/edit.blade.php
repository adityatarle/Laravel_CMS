@extends('layouts.layout')

@section('content')

@include('layouts.success-message')
  <div class="container">
    
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-6">
      <div class="card bg-white shadow-lg border-0 rounded-lg">
  <div class="card-header bg-primary text-white text-center py-4 rounded-top">
    <h4 class="mb-0">Edit Item</h4>
  </div>
  <div class="card-body p-4">
    <form id="update-form" action="/product/{{ $product->id }}/update" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      
      <div class="form-group mb-4">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control form-control-lg border-secondary" id="name" name="name" value="{{ old('name', $product->name) }}" placeholder="Enter name" required>
      </div>

      <div class="form-group mb-3">
                <label for="description" class="form-label">Heading</label>
                <textarea class="form-control" id="heading" name="heading" value="{{ old('heading', $product->heading) }}" placeholder="Enter Heading" required></textarea>
              </div>
      
      <div class="form-group mb-4">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control form-control-lg border-secondary" id="description" name="description" rows="4" placeholder="Enter description" required>{{ old('description', $product->description) }}</textarea>
      </div>

      <div class="form-group mb-4">
        <label for="image" class="form-label">Image</label>
        <input type="file" class="form-control form-control-lg border-secondary" id="image" name="image">
        @if($product->image)
          <div class="mt-3 text-center">
            <img src="{{ asset('storage/' . $product->image) }}" alt="Current Image" class="img-fluid rounded" style="max-width: 200px;">
          </div>
        @endif
      </div>
      
      <div class="text-end">
      
        <button type="button" class="btn btn-primary btn-lg rounded-pill px-4" id="btn-update">Update</button>
      </div>
    </form>
  </div>
</div>

      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    document.getElementById('btn-update').addEventListener('click', function () {
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to update this item?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#4CAF50',  // Custom button color
            cancelButtonColor: '#f44336',   // Custom cancel button color
            confirmButtonText: 'Yes, update it!',
            background: '#f0f8ff',          // Custom background color
            customClass: {
                popup: 'swal-popup-class',  // Custom popup class
                title: 'swal-title-class',  // Custom title class
                icon: 'swal-icon-class',    // Custom icon class
                confirmButton: 'swal-confirm-btn-class',  // Custom confirm button class
                cancelButton: 'swal-cancel-btn-class'     // Custom cancel button class
            }
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('update-form').submit();
            }
        });
    });
  </script>

  <style>
    /* Custom SweetAlert styles */
    .swal-popup-class {
        border-radius: 20px;
        padding: 20px;
    }

    .swal-title-class {
        font-size: 24px;
        color: #333;
    }

    .swal-icon-class {
        color: #FFD700;
    }

    .swal-confirm-btn-class {
        background-color: #4CAF50 !important;
        color: white !important;
        border-radius: 5px;
    }

    .swal-cancel-btn-class {
        background-color: #f44336 !important;
        color: white !important;
        border-radius: 5px;
    }
  </style>
@endsection

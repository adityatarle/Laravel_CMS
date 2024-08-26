@extends('layouts.layout')

@section('content')
<div class="container mt-5">
  @include('layouts.success-message')

  <!-- New Product and Edit Banner Buttons -->
  

  <!-- Page Title -->
  <div class="row mb-4">
    <div class="col-md-12">
      <h1 class="text-center text-primary">Product List</h1>
    </div>
  </div>

  <div class="row">
  <div class="col-md-12 text-end">
    <a href="{{ url('product/create') }}" class="btn btn-dark btn-sm me-2">Add New Product</a>
    <a href="{{ url('banner/edit') }}" class="btn btn-primary btn-sm">Edit Banner</a>
  </div>
</div>


  <!-- Products Table -->
  <div class="row">
    <div class="col-md-12">
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
          <thead class="thead-light">
            <tr>
              <th scope="col" class="text-center">#</th>
              <th scope="col" class="text-center">Product Name</th>
              <th scope="col" class="text-center">Heading</th>
              <th scope="col" class="text-center">Image</th>
              <th scope="col" class="text-center">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($products as $product)
            <tr>
              <td class="text-center" style="font-weight: 500;">{{ $loop->index + 1 }}</td>
              <td class="text-center" style="font-weight: 500;">{{ $product->name }}</td>
              <td class="text-center" style="font-weight: 500;">{{ $product->heading }}</td>
              <td class="text-center">
                <img src="{{ asset('products/' . $product->image) }}" alt="Product Image" class="img-fluid rounded" width="100">
              </td>
              <td class="text-center">
                <a href="product/{{ $product->id }}/show" class="btn btn-info btn-lg btn-custom-width" title="View">
                  <i class="bi bi-eye"></i>
                </a>
                <a href="product/{{ $product->id }}/edit" class="btn btn-warning btn-lg btn-custom-width" title="Edit">
                  <i class="bi bi-pencil"></i>
                </a>

                <!-- Delete Form with SweetAlert Confirmation -->
                <form method="POST" class="d-inline delete-form" action="product/{{ $product->id }}/delete">
                  @csrf
                  @method('DELETE')
                  <button type="button" class="btn btn-danger btn-lg btn-custom-width btn-delete" title="Delete">
                    <i class="bi bi-trash"></i>
                  </button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <!-- Pagination Links -->
      <div class="d-flex justify-content-center mt-8 text-center">
        {{ $products->links() }}
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  document.querySelectorAll('.btn-delete').forEach(button => {
    button.addEventListener('click', function() {
      let form = this.closest('form');
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel'
      }).then((result) => {
        if (result.isConfirmed) {
          form.submit();
        }
      });
    });
  });
</script>

<style>
  /* Hover effect for table rows */
  .table-hover tbody tr:hover {
    background-color: #f8f9fa; /* Light gray background */
    cursor: pointer; /* Change cursor to pointer */
  }
  
  /* Optional: Customize table row color when selected */
  .table-hover tbody tr.selected {
    background-color: #e2e6ea; /* Slightly darker gray */
  }
  
  /* Custom width for buttons */
  .btn-custom-width {
    width: 60px; /* Adjust as needed */
  }

  /* Add margin-right for spacing between buttons */
  .me-2 {
    margin-right: .5rem;
  }
</style>
@endsection

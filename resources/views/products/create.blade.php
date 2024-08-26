@extends('layouts.layout')

@section('content')

@include('layouts.success-message')
  <div class="container">
    <h1 class="text-center mb-4">Add New Item</h1>
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-4">
        <div class="card bg-light shadow-sm border-0 rounded-lg">
          <div class="card-body">
            <form action="{{ url('product/store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              
              <div class="form-group mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required>
                
              </div>

              <div class="form-group mb-3">
                <label for="description" class="form-label">Heading</label>
                <textarea class="form-control" id="heading" name="heading" placeholder="Enter Heading" required></textarea>
              </div>
              
              <div class="form-group mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description" required></textarea>
              </div>

              <div class="form-group mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image" required>
              </div>
              
              <div class="text-end">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@extends('layouts.layout')

@section('content')

@include('layouts.success-message')

<div class="container mt-4" style="max-width: 900px;">
    @if($banners->isEmpty())
        <div class="alert alert-warning" style="text-align: center;">
            No banners available to edit.
        </div>
    @else
        <div style="padding: 1rem; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <h3 style="font-size: 1.5rem; margin-bottom: 1rem; color: #007bff;">Edit Banners</h3>
            <form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                @foreach($banners as $index => $banner)
                    <div class="banner-section" style="margin-bottom: 1.5rem; padding: 1rem; border: 1px solid #ddd; border-radius: 8px; background-color: #f9f9f9;">
                        <h4 style="margin-bottom: 1rem; font-size: 1.25rem; color: #333;">Banner {{ $index + 1 }}</h4>
                        <div class="form-group" style="margin-bottom: 1rem;">
                            <input type="hidden" name="ids[]" value="{{ $banner->id }}">
                            <label for="title_{{ $index }}" style="font-weight: bold; margin-bottom: 0.5rem; display: block;">Title:</label>
                            <input type="text" name="title[]" id="title_{{ $index }}" class="form-control" value="{{ $banner->title }}" required style="border-radius: 4px; border-color: #ced4da;">
                        </div>
                        <div class="form-group" style="margin-bottom: 1rem;">
                            <label for="description_{{ $index }}" style="font-weight: bold; margin-bottom: 0.5rem; display: block;">Description:</label>
                            <textarea name="description[]" id="description_{{ $index }}" class="form-control" rows="3" required style="border-radius: 4px; border-color: #ced4da;">{{ $banner->description }}</textarea>
                        </div>
                        <div class="form-group" style="margin-bottom: 1rem;">
                            <label for="image_{{ $index }}" style="font-weight: bold; margin-bottom: 0.5rem; display: block;">Image:</label>
                            <input type="file" name="image[]" id="image_{{ $index }}" class="form-control" style="border-radius: 4px;">
                            @if($banner->image)
                                <div style="margin-top: 1rem;">
                                    <img src="{{ asset('images/' . $banner->image) }}" alt="Current Image" class="img-thumbnail" width="200" style="border-radius: 4px; border: 1px solid #ddd;">
                                </div>
                            @endif
                        </div>
                        <hr style="border-color: #ddd;">
                    </div>
                @endforeach

                <button type="submit" class="btn btn-primary" style="border-radius: 4px; padding: 0.75rem 1.25rem; font-size: 1rem; background-color: #007bff; border: none; color: white;">Update Banners</button>
            </form>
        </div>
    @endif
</div>

@endsection

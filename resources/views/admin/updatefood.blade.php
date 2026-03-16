@extends('admin.maindesgin')
<base href="/public">
@section('update_food')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">

                <section class="card shadow-sm border-0">

                    <div class="card-header bg-primary text-white py-3">
                        <h2 class="card-title h5 mb-0 text-center text-uppercase">Add New Food Item</h2>
                    </div>

                    <div class="card-body p-4">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        {{-- Main form --}}
                        <form action="{{ route('admin.postupdatefood', $food->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="food_name" class="form-label fw-bold">Food Title</label>
                                <input type="text" value="{{ $food->food_name }}" class="form-control" id="food_name"
                                    name="food_name" placeholder="Enter food name" required>
                            </div>
                            <div class="mb-3">
                                <label for="food_details" class="form-label fw-bold">Description</label>
                                <textarea class="form-control" id="food_details" name="food_details" rows="4"
                                    placeholder="Describe the dish..." required>{{ $food->food_details }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="food_price" class="form-label fw-bold">Price ($)</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" value="{{ $food->food_price }}" class="form-control"
                                        id="food_price" name="food_price" step="0.01" min="0" placeholder="0.00" required>
                                </div>
                            </div>


                            <div class="mb-4">
                                <label class="form-label fw-bold">Food Image</label>

                                <div class="d-flex align-items-center border rounded p-2 mb-2 bg-light">
                                    <div class="me-3 text-center">
                                        <small class="d-block text-muted mb-1">Current</small>
                                        <img src="{{ asset('food_img/' . $food->food_image) }}" alt="Current Image"
                                            class="img-thumbnail" style="width: 80px; height: 80px; object-fit: cover;">
                                    </div>
                                    <div class="flex-grow-1">
                                        <label for="food_image" class="small text-muted">Upload new image to replace</label>
                                        <input type="file" id="food_image" name="food_image"
                                            class="form-control form-control-sm" accept="image/*">
                                    </div>
                                </div>
                                <p class="form-text small text-muted">PNG, JPG or GIF (Max 10MB)</p>
                            </div>




                            <div class="d-grid">
                                <button type="submit" class="btn btn-success btn-lg">
                                    <i class="bi bi-arrow-repeat me-1"></i> Update Food Details
                                </button>
                            </div>
                        </form>
                    </div>
                </section>
                <div class="text-center mt-3">
                    <a href="{{ url()->previous() }}" class="text-decoration-none text-muted small">← Back to List</a>
                </div>
            </div>
        </div>
    </div>
@endsection
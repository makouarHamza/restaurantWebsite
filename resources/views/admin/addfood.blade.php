@extends('admin.maindesgin')

@section('addfood')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            
            <section class="card shadow-sm border-0">
                
                <div class="card-header bg-primary text-white py-3">
                    <h2 class="card-title h5 mb-0 text-center text-uppercase">Add New Food Item</h2>
                </div>

                <div class="card-body p-4">
                    {{-- Success Message --}}
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    {{-- Main Form --}}
                    <form action="{{ route('admin.postaddfood') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="food_name" class="form-label fw-bold">Food Title</label>
                            <input type="text" class="form-control" id="food_name" name="food_name" 
                                   placeholder="Enter food name" required>
                        </div>

                        <div class="mb-3">
                            <label for="food_details" class="form-label fw-bold">Description</label>
                            <textarea class="form-control" id="food_details" name="food_details" 
                                      rows="4" placeholder="Describe the dish..." required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="food_price" class="form-label fw-bold">Price ($)</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" class="form-control" id="food_price" name="food_price" 
                                       step="0.01" min="0" placeholder="0.00" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="food_image" class="form-label fw-bold">Food Image</label>
                            <input type="file" class="form-control" id="food_image" name="food_image" 
                                   accept="image/*" required>
                            <div class="form-text text-muted">
                                Accepted formats: PNG, JPG, GIF (Max 10MB)
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success btn-lg">
                                <i class="bi bi-plus-lg me-1"></i> Add Food Item
                            </button>
                        </div>
                    </form>
                </div>
            </section>

        </div>
    </div>
</div>
@endsection
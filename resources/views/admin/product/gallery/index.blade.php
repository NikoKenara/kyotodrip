@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Products</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>All Products</h4>

            </div>
            <div class="card-body">
                <div class="col-md-8">
                    <form action="{{ route('admin.product-gallery.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="file" class="form-control" name="image">
                            <input type="hidden" value="{{ $ProductId }}" name="product_id">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
@endsection

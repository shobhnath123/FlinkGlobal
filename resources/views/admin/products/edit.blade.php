@extends('layouts.admin')
@section('content')
    <div class="main_content_iner overly_inner ">
        <div class="container-fluid p-0 ">
            <!-- page title  -->
            <div class="row">
                <div class="col-12">
                    <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                        <div class="page_title_left d-flex align-items-center">
                            <h3 class="f_s_25 f_w_700 dark_text mr_30">Edi Product</h3>
                            <ol class="breadcrumb page_bradcam mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashbord</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Products</a></li>
                                <li class="breadcrumb-item active">New Product</li>
                            </ol>
                        </div>
                        <div class="page_title_right">
                            <div class="page_date_button d-flex align-items-center">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-lg-12">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_body">
                            <div class="card-body">
                                <form action="{{ route('products.update', $product->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label" for="name">Name</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                name="name" value="{{ old('name', $product->name) }}" id="name"
                                                placeholder="" required>
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="slug">Slug</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                name="slug" value="{{ old('slug', $product->slug) }}" id="slug"
                                                placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label" for="category">Category</label>
                                            <select name="category_id" class="form-select" required>
                                                <option value="">Select Category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="brand">Brand</label>
                                            <select name="brand_id" id="brand" class="form-select">
                                                <option value="">Select Brand</option>
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->id }}"
                                                        {{ old('brand_id', $product->brand_id) == $brand->id ? 'selected' : '' }}>
                                                        {{ $brand->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="short-description">Short Description</label>
                                        <textarea class="form-control" name="short_description" id="short-description" required>{{ old('short_description', $product->short_description) }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="information">Information</label>
                                        <textarea class="form-control" name="information" id="information" rows="3" required>{{ old('information', $product->information) }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="description">Description</label>
                                        <textarea class="form-control" name="description" value="{{ old('description', $product->description) }}"
                                            id="description" rows="3" required>{{ old('description', $product->description) }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Upload Image</label>

                                        <input type="file" class="form-control" name="image" id="image"
                                            accept="image/*" onchange="previewImage(event)">

                                        {{-- Old Image (Edit Page) --}}
                                        @if ($product->image)
                                            <img id="image-preview" src="{{ asset('storage/' . $product->image) }}"
                                                style="width:130px; margin-top:10px;">

                                            <button type="button" id="remove-image" class="btn btn-sm btn-danger"
                                                style="margin-top:5px;" onclick="removeImage()">
                                                Remove
                                            </button>
                                        @else
                                            <img id="image-preview" style="display:none; width:130px; margin-top:10px;">

                                            <button type="button" id="remove-image" class="btn btn-sm btn-danger"
                                                style="display:none; margin-top:5px;" onclick="removeImage()">
                                                Remove
                                            </button>
                                        @endif

                                        <small id="message" class="text-success"></small>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Upload Gallery Images</label>

                                        <input type="file" class="form-control" name="gallery_images[]"
                                            id="gallery-image" accept="image/*" multiple
                                            onchange="previewGalleryImages(event)">

                                        <div id="gallery-preview" style="margin-top:10px; display:flex; flex-wrap:wrap;">
                                        </div>

                                        {{-- Existing Images (Edit Page) --}}
                                        <div id="existing-gallery" style="margin-top:10px; display:flex; flex-wrap:wrap;">
                                            @foreach ($product->gallery_images ?? [] as $index => $img)
                                                <div class="img-box" style="position:relative; margin:5px;">

                                                    <img src="{{ asset('storage/' . $img) }}" width="80"
                                                        style="border:1px solid #ddd; padding:3px;">

                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        style="position:absolute; top:0; right:0;"
                                                        onclick="removeExistingImage(this, '{{ $img }}')">
                                                        ×
                                                    </button>

                                                </div>
                                            @endforeach
                                        </div>

                                        {{-- Hidden input for removed images --}}
                                        <input type="hidden" name="removed_gallery" id="removed_gallery">
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label" for="regular-price">Regular Price</label>
                                            <input type="text" name="regular_price"
                                                value="{{ old('regular_price', $product->regular_price) }}"
                                                class="form-control" id="regular-price" placeholder="" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="sale-price">Sale Price</label>
                                            <input type="text" name="sale_price"
                                                value="{{ old('sale_price', $product->sale_price) }}"
                                                class="form-control" id="sale-price" placeholder="">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label" for="sku">SKU</label>
                                            <input type="text" name="sku" value="{{ old('sku', $product->sku) }}"
                                                class="form-control" id="sku" placeholder="" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="quantity">Quantity</label>
                                            <input type="number" name="quantity"
                                                value="{{ old('quantity', $product->quantity) }}" class="form-control"
                                                id="quantity" placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label" for="stock">Stock</label>
                                            <select class="form-select" name="stock" id="stock" required>
                                                <option value="in-stock"
                                                    {{ old('stock', $product->stock ?? '') == 'in-stock' ? 'selected' : '' }}>
                                                    In Stock
                                                </option>

                                                <option value="out-of-stock"
                                                    {{ old('stock', $product->stock ?? '') == 'out-of-stock' ? 'selected' : '' }}>
                                                    Out of Stock
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="featured">Featured</label>
                                            <select class="form-select" name="featured" id="featured" required>
                                                <option value="1"
                                                    {{ old('featured', $product->featured ?? '') == '1' ? 'selected' : '' }}>
                                                    Yes </option>
                                                <option value="0"
                                                    {{ old('featured', $product->featured ?? '') == '0' ? 'selected' : '' }}>
                                                    No </option>
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        let removedGallery = [];

        // Preview NEW images
        function previewGalleryImages(event) {
            const preview = document.getElementById('gallery-preview');
            preview.innerHTML = "";

            const files = event.target.files;

            Array.from(files).forEach((file, index) => {
                const reader = new FileReader();

                reader.onload = function(e) {
                    const div = document.createElement('div');
                    div.style.position = "relative";
                    div.style.margin = "5px";

                    div.innerHTML = `
                <img src="${e.target.result}" width="80" style="border:1px solid #ddd; padding:3px;">
                <button type="button"
                        onclick="removeNewImage(this, ${index})"
                        style="position:absolute; top:0; right:0;"
                        class="btn btn-danger btn-sm">×</button>
            `;

                    preview.appendChild(div);
                };

                reader.readAsDataURL(file);
            });
        }

        // Remove NEW image (only preview)
        function removeNewImage(btn, index) {
            btn.parentElement.remove();
        }

        // Remove EXISTING image
        function removeExistingImage(btn, imagePath) {
            btn.parentElement.remove();

            removedGallery.push(imagePath);
            document.getElementById('removed_gallery').value = JSON.stringify(removedGallery);
        }
    </script>
@endsection

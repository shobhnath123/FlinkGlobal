@extends('layouts.admin')
@section('content')
    <div class="main_content_iner overly_inner ">
        <div class="container-fluid p-0 ">
            <!-- page title  -->
            <div class="row">
                <div class="col-12">
                    <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                        <div class="page_title_left d-flex align-items-center">
                            <h3 class="f_s_25 f_w_700 dark_text mr_30">Edit Slide</h3>
                            <ol class="breadcrumb page_bradcam mb-0">
                                <li class="breadcrumb-item"><a href="dashboard.html">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="slider.html">Slider</a></li>
                                <li class="breadcrumb-item active">Edit Slide</li>
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
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">New Slide</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <div class="card-body">
                                <form action="{{ route('slides.update', $slider->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label" for="title">Title</label>
                                            <input type="text"name="title"
                                                value="{{ old('title', $slider->title ?? '') }}" class="form-control"
                                                id="title" placeholder="" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="line1">Line 1</label>
                                            <input type="text" name="line1"
                                                value="{{ old('line1', $slider->line1 ?? '') }}" class="form-control"
                                                id="line1" placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label" for="line2">Line 2</label>
                                            <input type="text" class="form-control" name="line2"
                                                value="{{ old('line2', $slider->line2 ?? '') }}"id="line2" placeholder=""
                                                required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Status</label>
                                            <select name="status" class="form-control" required>
                                                <option value="1"
                                                    {{ old('status', $slider->status ?? 1) == 1 ? 'selected' : '' }}>Active
                                                </option>
                                                <option value="0"
                                                    {{ old('status', $slider->status ?? 1) == 0 ? 'selected' : '' }}>
                                                    Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="image">Upload Image</label>

                                        <input type="file" name="image" class="form-control" id="image"
                                            accept="image/*" onchange="previewImage(event)">

                                        {{-- Preview Image --}}
                                        <img id="image-preview"
                                            src="{{ $slider->image ? asset('storage/' . $slider->image) : '#' }}"
                                            style="margin-top:10px; width:160px; {{ $slider->image ? '' : 'display:none;' }}">

                                        <button type="button" id="remove-image" class="btn btn-sm btn-danger"
                                            style="margin-top:5px; {{ $slider->image ? '' : 'display:none;' }}"
                                            onclick="removeImage()">
                                            Remove
                                        </button>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.admin')
@section('content')
    <div class="main_content_iner overly_inner ">
        <div class="container-fluid p-0 ">
            <!-- page title  -->
            <div class="row">
                <div class="col-12">
                    <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                        <div class="page_title_left d-flex align-items-center">
                            <h3 class="f_s_25 f_w_700 dark_text mr_30">Edit Category</h3>
                            <ol class="breadcrumb page_bradcam mb-0">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Category</a></li>
                                <li class="breadcrumb-item active">Edit Category</li>
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
                                <form action="{{ route('categories.update', $category->id) }}" method="POST"
                                    enctype="multipart/form-data" data-parsley-validate>

                                    @csrf
                                    @method('PUT')

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Name</label>
                                            <input type="text" name="name" id="name" class="form-control"
                                                value="{{ $category->name }}" required data-parsley-trigger="change">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Slug</label>
                                            <input type="text" name="slug" id="slug" class="form-control"
                                                value="{{ $category->slug }}" required data-parsley-trigger="change">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Image</label>
                                        <input type="file" name="image" class="form-control" id="myfile"
                                            accept="image/*">
                                    </div>
                                    <div class="mb-3">
                                        <img 
                                            id="image-preview"
                                            src="{{ $category->image ? asset('storage/'.$category->image) : '' }}"
                                            width="120"
                                            style="{{ $category->image ? '' : 'display:none;' }}">
                                    </div>
                                    <div id="imgpreview" class="mb-3" style="display:none;">
                                        <img src="" width="120">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update Category</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            $(function() {

                $("#myfile").on("change", function() {
                    const [file] = this.files;

                    if (file) {
                        $("#imgpreview img").attr('src', URL.createObjectURL(file));
                        $("#imgpreview").show();
                    }
                });

                $("#name").on("keyup", function() {
                    $("#slug").val(StringToSlug($(this).val()));
                });

            });

            function StringToSlug(Text) {
                return Text.toLowerCase()
                    .replace(/[^\w ]+/g, '')
                    .replace(/ +/g, '-');
            }
        </script>
    @endpush
@endsection

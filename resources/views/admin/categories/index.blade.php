@extends('layouts.admin')
@section('content')
<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0 ">
        <!-- page title  -->
        <div class="row">
            <div class="col-12">
                <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                    <div class="page_title_left d-flex align-items-center">
                        <h3 class="f_s_25 f_w_700 dark_text mr_30">categories</h3>
                        <ol class="breadcrumb page_bradcam mb-0">
                            <li class="breadcrumb-item"><a href="dashboard.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">categories</li>
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
                        <div class="row">
                            <div class="col-6">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">Category</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <a href="{{ route('categories.create') }}" class="btn btn-sm btn-outline-primary float-end"
                                    style="display: flex; align-items: center; vertical-align: middle;">
                                    <i class="material-icons" style="margin-right: 4px;">add</i>
                                    Add New
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body">
                        <div class="table-responsive m-b-30">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Products</th>
                                        <th scope="col">Slug</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $key => $category)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                       
                                        <td>
                                            <div class="customer d-flex align-items-center">
                                                <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50"
                                                        src="{{ asset('storage/'.$category->image) }}" alt=""></div>
                                                <span class="f_s_12 f_w_600 color_text_5">{{ $category->name }}</span>
                                            </div>
                                        </td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->slug }}</td>
                                         <td>
                                            <div scope="row" bis_skin_checked="1">
                                                <div class="dropdown" bis_skin_checked="1">
                                                    <span class="dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown">
                                                        <i class="ti-more-alt"></i>
                                                    </span>
                                                    <div class="dropdown-menu dropdown-menu-right"
                                                        aria-labelledby="dropdownMenuButton" bis_skin_checked="1">
                                                        <a class="dropdown-item" href="#"> <i class="ti-eye"></i>
                                                            Action</a>
                                                            <a class="dropdown-item" href="{{ route('categories.edit',$category->id) }}"> <i class="fas fa-edit"></i>
                                                            Edit</a>
                                                            <form action="{{ route('categories.destroy',$category->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="dropdown-item"
                                                                    onclick="return confirm('Are you sure you want to delete this Category?')">
                                                                    <i class="ti-trash"></i> Delete
                                                                </button>
                                                            </form>
                                                    </div>
                                                </div>
                                            </div> 
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                           <div class="d-flex justify-content-left">
                                {{ $categories->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
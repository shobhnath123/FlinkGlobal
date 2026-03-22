@extends('layouts.admin')
@section('content')
    <div class="main_content_iner overly_inner ">
        <div class="container-fluid p-0 ">
            <!-- page title  -->
            <div class="row">
                <div class="col-12">
                    <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                        <div class="page_title_left d-flex align-items-center">
                            <h3 class="f_s_25 f_w_700 dark_text mr_30">Slider</h3>
                            <ol class="breadcrumb page_bradcam mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Slider</li>
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
                                            <h3 class="m-0">Slider</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <a href="{{ route('slides.create') }}" class="btn btn-sm btn-outline-primary float-end"
                                        style="display: flex; align-items: center; vertical-align: middle;">
                                        <i class="material-icons" style="margin-right: 4px;"></i>
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
                                            <th scope="col">Image</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Line1</th>
                                            <th scope="col">Link2</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @foreach ($sliders as $slider)
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>
                                                <img  src="{{ asset('storage/'.$slider->image) }}" height="52" alt="{{ $slider->title ?? ''}}">
                                            </td>
                                            <td>{{ $slider->title ?? '' }}</td>
                                            <td>{{ $slider->line1 ?? ''}}</td>
                                            <td>{{ $slider->line2 ?? ''}}</td>
                                            <td>{{ $slider->status == 1 ? 'Active' : 'Inactive'}}</td>
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
                                                            <a class="dropdown-item" href="{{ route('slides.edit',$slider->id) }}"> <i class="fas fa-edit"></i>
                                                            Edit</a>
                                                            <form action="{{ route('slides.destroy',$slider->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="dropdown-item"
                                                                    onclick="return confirm('Are you sure you want to delete this Slider?')">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

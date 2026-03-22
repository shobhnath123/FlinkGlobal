@extends('layouts.admin')
@section('content')
    <div class="main_content_iner overly_inner ">
        <div class="container-fluid p-0 ">
            <!-- page title  -->
            <div class="row">
                <div class="col-12">
                    <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                        <div class="page_title_left d-flex align-items-center">
                            <h3 class="f_s_25 f_w_700 dark_text mr_30">Coupons</h3>
                            <ol class="breadcrumb page_bradcam mb-0">
                                <li class="breadcrumb-item"><a href="dashboard.html">Dashboard</a></li>
                                <li class="breadcrumb-item active">Coupons</li>
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
                                            <h3 class="m-0">Coupons</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <a href="{{ route('coupons.create') }}" class="btn btn-sm btn-outline-primary float-end"
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
                                            <th scope="col">Code Type</th>
                                            <th scope="col">Value</th>
                                            <th scope="col">Cart Value</th>
                                            <th scope="col">Expiry Date</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($coupons as $coupon) 
                                            
                                      
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>{{$coupon->type ?? ''}}</td>
                                            <td>{{$coupon->code ?? ''}}</td>
                                            <td>{{ $coupon->value ?? '' }}</td>
                                            <td>{{ $coupon->expiry_date ?? ''}}</td>
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
                                                                <a class="dropdown-item" href="{{ route('coupons.edit',$coupon->id) }}"> <i class="fas fa-edit"></i>
                                                                Edit</a>
                                                                <form action="{{ route('coupons.destroy',$coupon->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="dropdown-item"
                                                                        onclick="return confirm('Are you sure you want to delete this coupon?')">
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

@extends('layouts.admin')
@section('content')
    <div class="main_content_iner overly_inner ">
        <div class="container-fluid p-0 ">
            <!-- page title  -->
            <div class="row">
                <div class="col-12">
                    <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                        <div class="page_title_left d-flex align-items-center">
                            <h3 class="f_s_25 f_w_700 dark_text mr_30">Products</h3>
                            <ol class="breadcrumb page_bradcam mb-0">
                                <li class="breadcrumb-item"><a href="dashboard.html">Dashboard</a></li>
                                <li class="breadcrumb-item active">Products</li>
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
                                            <h3 class="m-0">Products</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <a href="{{ route('products.create') }}" class="btn btn-sm btn-outline-primary float-end"
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
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>SalePrice</th>
                                            <th>SKU</th>
                                            <th>Category</th>
                                            <th>Brand</th>
                                            <th>Featured</th>
                                            <th>Stock</th>
                                            <th>Quantity</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @foreach($products as $key => $product)
                                        <tr>
                                            <td>{{$product->id}}</td>
                                            <td>
                                                <img src="{{ asset('storage/'.$product->image) }}" alt="" height="52">
                                                <p class="d-inline-block align-middle mb-0">
                                                    <a href="#"
                                                        class="d-inline-block align-middle mb-0 f_s_16 f_w_600 color_theme2">
                                                        {{ $product->name??'' }}
                                                    </a>
                                                    <br>
                                                    {{-- <span class="text-muted font_s_13">size-08 (Model 2025)</span> --}}
                                                </p>
                                            </td>
                                            <td>${{ $product->regular_price??'' }}</td>
                                            <td>${{ $product->sale_price??'' }}</td>
                                            <td>{{ $product->sku??'' }}</td>
                                            <td>{{ $product->category->name ?? '' }}</td>
                                            <td>{{ $product->brand->name ?? '' }}</td>
                                            <td>{{ $product->featured ? 'Yes' : 'No' }}</td>
                                            <td>{{ $product->stock }}</td>
                                            <td>{{ $product->quantity }}</td>
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
                                                                <a class="dropdown-item" href="{{ route('products.edit',$product->id) }}"> <i class="fas fa-edit"></i>
                                                                Edit</a>
                                                                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="dropdown-item"
                                                                        onclick="return confirm('Are you sure you want to delete this products?')">
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
                                    {{ $products->links() }}
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

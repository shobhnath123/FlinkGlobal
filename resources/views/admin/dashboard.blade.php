@extends('layouts.admin')
@section('content')
<section class="main_content dashboard_part large_header_bg">
    <!-- menu  -->
    <div class="container-fluid g-0">
        <div class="row">
            <div class="col-lg-12 p-0 ">
                <div class="header_iner d-flex justify-content-between align-items-center">
                    <div class="sidebar_icon d-lg-none">
                        <i class="ti-menu"></i>
                    </div>
                    <div class="line_icon open_miniSide d-none d-lg-block">
                        <img src="{{ asset('admin/img/line_img.png') }}" alt="">
                    </div>
                    <div class="serach_field-area d-flex align-items-center">
                        <div class="search_inner">
                            <form action="#">
                                <div class="search_field">
                                    <input type="text" placeholder="Search">
                                </div>
                                <button type="submit"> <img src="{{ asset('admin/img/icon/icon_search.svg') }}"
                                        alt=""> </button>
                            </form>
                        </div>
                    </div>
                    <div class="header_right d-flex justify-content-between align-items-center">
                        <div class="header_notification_warp d-flex align-items-center">
                            <li>
                                <a class="bell_notification_clicker" href="#"> <img
                                        src="{{ asset('admin/img/icon/bell.svg') }}" alt="">
                                    <span>2</span>
                                </a>
                                <!-- Menu_NOtification_Wrap  -->
                                <div class="Menu_NOtification_Wrap">
                                    <div class="notification_Header">
                                        <h4>Notifications</h4>
                                    </div>
                                    <div class="Notification_body">
                                        <!-- single_notify  -->
                                        <div class="single_notify d-flex align-items-center">
                                            <div class="notify_thumb">
                                                <a href="#"><img src="{{ asset('admin/img/staf/2.png') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="notify_content">
                                                <a href="#">
                                                    <h5>Cool Marketing </h5>
                                                </a>
                                                <p>Lorem ipsum dolor sit amet</p>
                                            </div>
                                        </div>
                                        <!-- single_notify  -->
                                        <div class="single_notify d-flex align-items-center">
                                            <div class="notify_thumb">
                                                <a href="#"><img src="{{ asset('admin/img/staf/4.png') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="notify_content">
                                                <a href="#">
                                                    <h5>Awesome packages</h5>
                                                </a>
                                                <p>Lorem ipsum dolor sit amet</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="nofity_footer">
                                        <div class="submit_button text-center pt_20">
                                            <a href="#" class="btn_1">See More</a>
                                        </div>
                                    </div>
                                </div>
                                <!--/ Menu_NOtification_Wrap  -->
                            </li>
                        </div>
                        <div class="profile_info">
                            <img src="{{ asset('admin/img/client_img.png') }}" alt="#">
                            <div class="profile_info_iner">
                                <div class="profile_author_name">
                                    <p>Admin </p>
                                </div>
                                <div class="profile_info_details">
                                    <a href="profile.html">My Profile </a>
                                     <form method="POST" action="{{ route('logout') }}"  id="logout-form">
                                        @csrf
                                        <a href="{{ route('logout') }}" class="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <div class="icon"><i class="icon-settings"></i></div>
                                            <div class="text">Log Out</div>
                                        </a>
                                    </form>
                                    {{-- <a href="#">Log Out </a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ menu  -->
    <div class="main_content_iner overly_inner ">
        <div class="container-fluid p-0 ">
            <!-- page title  -->
            <div class="row">
                <div class="col-12">
                    <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                        <div class="page_title_left d-flex align-items-center">
                            <h3 class="f_s_25 f_w_700 dark_text mr_30">Dashboard</h3>
                        </div>
                        <div class="page_title_right">
                            <div class="page_date_button d-flex align-items-center">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-xl-7 ">
                    <div class="white_card mb_30 card_height_100">
                        <div class="white_card_header">
                            <div class="row align-items-center justify-content-between flex-wrap">
                                <div class="col-lg-4">
                                    <div class="main-title">
                                        <h3 class="m-0">Stoke Details</h3>
                                    </div>
                                </div>
                                <div class="col-lg-4 text-end d-flex justify-content-end">
                                    <select class="nice_Select2 max-width-220">
                                        <option value="1">Show by month</option>
                                        <option value="1">Show by year</option>
                                        <option value="1">Show by day</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <div id="management_bar"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 " bis_skin_checked="1">
                    <div class="white_card card_height_100 mb_30 overflow_hidden" bis_skin_checked="1">
                        <div class="white_card_header" bis_skin_checked="1">
                            <div class="box_header m-0" bis_skin_checked="1">
                                <div class="main-title" bis_skin_checked="1">
                                    <h3 class="m-0">Sales Details</h3>
                                </div>
                                <div class="header_more_tool" bis_skin_checked="1">
                                    <div class="dropdown" bis_skin_checked="1">
                                        <span class="dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown">
                                            <i class="ti-more-alt"></i>
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton" bis_skin_checked="1">
                                            <a class="dropdown-item" href="#"> <i class="ti-eye"></i>
                                                Action</a>
                                            <a class="dropdown-item" href="#"> <i class="ti-trash"></i>
                                                Delete</a>
                                            <a class="dropdown-item" href="#"> <i class="fas fa-edit"></i>
                                                Edit</a>
                                            <a class="dropdown-item" href="#"> <i class="ti-printer"></i>
                                                Print</a>
                                            <a class="dropdown-item" href="#"> <i class="fa fa-download"></i>
                                                Download</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body pb-0" bis_skin_checked="1">
                            <div class="Sales_Details_plan" bis_skin_checked="1">
                                <div class="row" bis_skin_checked="1">

                                    <div class="col-lg-6" bis_skin_checked="1">
                                        <div class="single_plan d-flex align-items-center justify-content-between"
                                            bis_skin_checked="1">
                                            <div class="plan_left d-flex align-items-center" bis_skin_checked="1">
                                                <div class="thumb" bis_skin_checked="1">
                                                    📦
                                                </div>
                                                <div bis_skin_checked="1">
                                                    <h5>12</h5>
                                                    <span>Total Orders</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6" bis_skin_checked="1">
                                        <div class="single_plan d-flex align-items-center justify-content-between"
                                            bis_skin_checked="1">
                                            <div class="plan_left d-flex align-items-center" bis_skin_checked="1">
                                                <div class="thumb" bis_skin_checked="1">
                                                    💰
                                                </div>
                                                <div bis_skin_checked="1">
                                                    <h5>7436.66</h5>
                                                    <span>Total Amount</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6" bis_skin_checked="1">
                                        <div class="single_plan d-flex align-items-center justify-content-between"
                                            bis_skin_checked="1">
                                            <div class="plan_left d-flex align-items-center" bis_skin_checked="1">
                                                <div class="thumb" bis_skin_checked="1">
                                                    ⏳
                                                </div>
                                                <div bis_skin_checked="1">
                                                    <h5>11</h5>
                                                    <span>Pending Orders</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6" bis_skin_checked="1">
                                        <div class="single_plan d-flex align-items-center justify-content-between"
                                            bis_skin_checked="1">
                                            <div class="plan_left d-flex align-items-center" bis_skin_checked="1">
                                                <div class="thumb" bis_skin_checked="1">
                                                    💰
                                                </div>
                                                <div bis_skin_checked="1">
                                                    <h5>7291.46</h5>
                                                    <span>Pending Orders Amount</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6" bis_skin_checked="1">
                                        <div class="single_plan d-flex align-items-center justify-content-between"
                                            bis_skin_checked="1">
                                            <div class="plan_left d-flex align-items-center" bis_skin_checked="1">
                                                <div class="thumb" bis_skin_checked="1">
                                                    ✅
                                                </div>
                                                <div bis_skin_checked="1">
                                                    <h5>1</h5>
                                                    <span>Delivered Orders</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6" bis_skin_checked="1">
                                        <div class="single_plan d-flex align-items-center justify-content-between"
                                            bis_skin_checked="1">
                                            <div class="plan_left d-flex align-items-center" bis_skin_checked="1">
                                                <div class="thumb" bis_skin_checked="1">
                                                    💰
                                                </div>
                                                <div bis_skin_checked="1">
                                                    <h5>145.2</h5>
                                                    <span>Delivered Orders Amount</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6" bis_skin_checked="1">
                                        <div class="single_plan d-flex align-items-center justify-content-between"
                                            bis_skin_checked="1">
                                            <div class="plan_left d-flex align-items-center" bis_skin_checked="1">
                                                <div class="thumb" bis_skin_checked="1">
                                                    🚫
                                                </div>
                                                <div bis_skin_checked="1">
                                                    <h5>0</h5>
                                                    <span>Canceled Orders</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6" bis_skin_checked="1">
                                        <div class="single_plan d-flex align-items-center justify-content-between"
                                            bis_skin_checked="1">
                                            <div class="plan_left d-flex align-items-center" bis_skin_checked="1">
                                                <div class="thumb" bis_skin_checked="1">
                                                    💰
                                                </div>
                                                <div bis_skin_checked="1">
                                                    <h5>0</h5>
                                                    <span>Canceled Orders Amount</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-12" bis_skin_checked="1">
                    <div class="white_card card_height_100 mb_30" bis_skin_checked="1">
                        <div class="white_card_header" bis_skin_checked="1">
                            <div class="row align-items-center" bis_skin_checked="1">
                                <div class="col-lg-4" bis_skin_checked="1">
                                    <div class="main-title" bis_skin_checked="1">
                                        <h3 class="m-0">Latest Orders</h3>
                                    </div>
                                </div>
                                <div class="col-lg-8" bis_skin_checked="1">
                                    <a href="orders.html" class="btn_1 float-end">View All Orders</a>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body table-responsive" bis_skin_checked="1">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="col">OrderNo</th>
                                        <th class="col">Name</th>
                                        <th class="col">Phone</th>
                                        <th class="col">Subtotal</th>
                                        <th class="col">Tax</th>
                                        <th class="col">Total</th>
                                        <th class="col">Status</th>
                                        <th class="col">Order Date</th>
                                        <th class="col">Total Items</th>
                                        <th class="col">Delivered On</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">12</td>
                                        <td class="text-center">Sudhir Kumar</td>
                                        <td class="text-center">1234567890</td>
                                        <td class="text-center">$788</td>
                                        <td class="text-center">$165.48</td>
                                        <td class="text-center">$953.48</td>
                                        <td class="text-center">
                                            <span class="badge bg-warning">Ordered</span>
                                        </td>
                                        <td class="text-center">2025-07-15 15:48:43</td>
                                        <td class="text-center">4</td>
                                        <td class="text-center"></td>
                                        <td class="text-center">
                                            <a href="order-details.html">
                                                <div class="list-icon-function view-icon" bis_skin_checked="1">
                                                    <div class="item eye" bis_skin_checked="1">
                                                        <i class="fa fa-eye"></i>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">11</td>
                                        <td class="text-center">Sudhir Kumar</td>
                                        <td class="text-center">1234567890</td>
                                        <td class="text-center">$630</td>
                                        <td class="text-center">$132.3</td>
                                        <td class="text-center">$762.3</td>
                                        <td class="text-center">
                                            <span class="badge bg-warning">Ordered</span>
                                        </td>
                                        <td class="text-center">2025-07-12 07:36:30</td>
                                        <td class="text-center">3</td>
                                        <td class="text-center"></td>
                                        <td class="text-center">
                                            <a href="order-details.html">
                                                <div class="list-icon-function view-icon" bis_skin_checked="1">
                                                    <div class="item eye" bis_skin_checked="1">
                                                        <i class="fa fa-eye"></i>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">10</td>
                                        <td class="text-center">Sudhir Kumar</td>
                                        <td class="text-center">1234567890</td>
                                        <td class="text-center">$158</td>
                                        <td class="text-center">$33.18</td>
                                        <td class="text-center">$191.18</td>
                                        <td class="text-center">
                                            <span class="badge bg-warning">Ordered</span>
                                        </td>
                                        <td class="text-center">2025-07-12 07:30:28</td>
                                        <td class="text-center">1</td>
                                        <td class="text-center"></td>
                                        <td class="text-center">
                                            <a href="order-details.html">
                                                <div class="list-icon-function view-icon" bis_skin_checked="1">
                                                    <div class="item eye" bis_skin_checked="1">
                                                        <i class="fa fa-eye"></i>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">9</td>
                                        <td class="text-center">Sudhir Kumar</td>
                                        <td class="text-center">1234567890</td>
                                        <td class="text-center">$510</td>
                                        <td class="text-center">$107.1</td>
                                        <td class="text-center">$617.1</td>
                                        <td class="text-center">
                                            <span class="badge bg-warning">Ordered</span>
                                        </td>
                                        <td class="text-center">2025-07-12 07:24:05</td>
                                        <td class="text-center">2</td>
                                        <td class="text-center"></td>
                                        <td class="text-center">
                                            <a href="order-details.html">
                                                <div class="list-icon-function view-icon" bis_skin_checked="1">
                                                    <div class="item eye" bis_skin_checked="1">
                                                        <i class="fa fa-eye"></i>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">8</td>
                                        <td class="text-center">Sudhir Kumar</td>
                                        <td class="text-center">1234567890</td>
                                        <td class="text-center">$510</td>
                                        <td class="text-center">$107.1</td>
                                        <td class="text-center">$617.1</td>
                                        <td class="text-center">
                                            <span class="badge bg-warning">Ordered</span>
                                        </td>
                                        <td class="text-center">2025-07-12 07:13:14</td>
                                        <td class="text-center">2</td>
                                        <td class="text-center"></td>
                                        <td class="text-center">
                                            <a href="order-details.html">
                                                <div class="list-icon-function view-icon" bis_skin_checked="1">
                                                    <div class="item eye" bis_skin_checked="1">
                                                        <i class="fa fa-eye"></i>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">7</td>
                                        <td class="text-center">Sudhir Kumar</td>
                                        <td class="text-center">1234567890</td>
                                        <td class="text-center">$368</td>
                                        <td class="text-center">$77.28</td>
                                        <td class="text-center">$445.28</td>
                                        <td class="text-center">
                                            <span class="badge bg-warning">Ordered</span>
                                        </td>
                                        <td class="text-center">2025-07-12 07:08:59</td>
                                        <td class="text-center">2</td>
                                        <td class="text-center"></td>
                                        <td class="text-center">
                                            <a href="order-details.html">
                                                <div class="list-icon-function view-icon" bis_skin_checked="1">
                                                    <div class="item eye" bis_skin_checked="1">
                                                        <i class="fa fa-eye"></i>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">6</td>
                                        <td class="text-center">Sudhir Kumar</td>
                                        <td class="text-center">1234567890</td>
                                        <td class="text-center">$788</td>
                                        <td class="text-center">$165.48</td>
                                        <td class="text-center">$953.48</td>
                                        <td class="text-center">
                                            <span class="badge bg-warning">Ordered</span>
                                        </td>
                                        <td class="text-center">2025-07-12 07:04:58</td>
                                        <td class="text-center">4</td>
                                        <td class="text-center"></td>
                                        <td class="text-center">
                                            <a href="order-details.html">
                                                <div class="list-icon-function view-icon" bis_skin_checked="1">
                                                    <div class="item eye" bis_skin_checked="1">
                                                        <i class="fa fa-eye"></i>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">5</td>
                                        <td class="text-center">Sudhir Kumar</td>
                                        <td class="text-center">1234567890</td>
                                        <td class="text-center">$788</td>
                                        <td class="text-center">$165.48</td>
                                        <td class="text-center">$953.48</td>
                                        <td class="text-center">
                                            <span class="badge bg-warning">Ordered</span>
                                        </td>
                                        <td class="text-center">2025-07-06 16:58:13</td>
                                        <td class="text-center">4</td>
                                        <td class="text-center"></td>
                                        <td class="text-center">
                                            <a href="order-details.html">
                                                <div class="list-icon-function view-icon" bis_skin_checked="1">
                                                    <div class="item eye" bis_skin_checked="1">
                                                        <i class="fa fa-eye"></i>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">4</td>
                                        <td class="text-center">Sudhir Kumar</td>
                                        <td class="text-center">1234567890</td>
                                        <td class="text-center">$788</td>
                                        <td class="text-center">$165.48</td>
                                        <td class="text-center">$953.48</td>
                                        <td class="text-center">
                                            <span class="badge bg-warning">Ordered</span>
                                        </td>
                                        <td class="text-center">2025-07-06 16:50:00</td>
                                        <td class="text-center">4</td>
                                        <td class="text-center"></td>
                                        <td class="text-center">
                                            <a href="order-details.html">
                                                <div class="list-icon-function view-icon" bis_skin_checked="1">
                                                    <div class="item eye" bis_skin_checked="1">
                                                        <i class="fa fa-eye"></i>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">3</td>
                                        <td class="text-center">Sudhir Kumar</td>
                                        <td class="text-center">1234567890</td>
                                        <td class="text-center">$368</td>
                                        <td class="text-center">$77.28</td>
                                        <td class="text-center">$445.28</td>
                                        <td class="text-center">
                                            <span class="badge bg-warning">Ordered</span>
                                        </td>
                                        <td class="text-center">2025-07-06 16:44:53</td>
                                        <td class="text-center">2</td>
                                        <td class="text-center"></td>
                                        <td class="text-center">
                                            <a href="order-details.html">
                                                <div class="list-icon-function view-icon" bis_skin_checked="1">
                                                    <div class="item eye" bis_skin_checked="1">
                                                        <i class="fa fa-eye"></i>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

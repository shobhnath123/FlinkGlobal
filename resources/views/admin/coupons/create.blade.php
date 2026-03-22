@extends('layouts.admin')
@section('content')
    <div class="main_content_iner overly_inner ">
        <div class="container-fluid p-0 ">
            <!-- page title  -->
            <div class="row">
                <div class="col-12">
                    <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                        <div class="page_title_left d-flex align-items-center">
                            <h3 class="f_s_25 f_w_700 dark_text mr_30">New Coupon</h3>
                            <ol class="breadcrumb page_bradcam mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="coupons.html">Coupons</a></li>
                                <li class="breadcrumb-item active">New Coupon</li>
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
                                    <h3 class="m-0">New Coupon</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <div class="card-body">
                                <form action="{{ route('coupons.store') }}" method="POST">
                                    @csrf

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label>Coupon Code</label>
                                            <input type="text" name="code" value="{{ old('code') }}"
                                                class="form-control" required style="text-transform:uppercase;">
                                        </div>

                                        <div class="col-md-6">
                                            <label>Coupon Type</label>
                                            <select name="type" class="form-control" required>
                                                <option value="">Select Type</option>
                                                <option value="percent" {{ old('type') == 'percent' ? 'selected' : '' }}>
                                                    Percentage</option>
                                                <option value="fixed" {{ old('type') == 'fixed' ? 'selected' : '' }}>Fixed
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label>Value</label>
                                            <input type="number" name="value" value="{{ old('value') }}"
                                                class="form-control" required>

                                        </div>
                                        <div class="col-md-6">
                                            <label>Minimum Cart Value</label>
                                            <input type="number" name="cart_value" value="{{ old('cart_value') }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label>Expiry Date</label>
                                            <input type="date" name="expiry_date" value="{{ old('expiry_date') }}"
                                                class="form-control" required>
                                        </div>
                                       
                                    </div>

                                    {{-- User Type + Status --}}
<div class="row mb-3">
    <div class="col-md-6">
        <label>User Type</label>
        <select name="user_type" id="user_type" class="form-control" required>
            <option value="all">All Users</option>
            <option value="new">New Users</option>
            <option value="existing">Existing Users</option>
            <option value="specific">Specific Users</option>
        </select>
    </div>

    <div class="col-md-6">
        <label>Status</label>
        <select name="status" class="form-control" required>
            <option value="1">Active</option>
            <option value="0">Inactive</option>
        </select>
    </div>
</div>

{{-- ✅ Specific Users --}}
<div class="row mb-3 d-none" id="specific_users_div">
    <div class="col-md-12">
        <label>Select Users</label>
        <select name="users[]" class="form-control" multiple>
            @foreach ($users as $user)
                <option value="{{ $user->id }}">
                    {{ $user->name }} ({{ $user->email }})
                </option>
            @endforeach
        </select>
    </div>
</div>
                                    <button type="submit" class="btn btn-primary">Create Coupon</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <script>
    function toggleUsers() {
        let type = document.getElementById('user_type').value;
        let div = document.getElementById('specific_users_div');

        if (type === 'specific') {
            div.classList.remove('d-none');
        } else {
            div.classList.add('d-none');
        }
    }

    document.getElementById('user_type').addEventListener('change', toggleUsers);

    // ✅ run on page load
    window.onload = toggleUsers;
</script>
@endsection

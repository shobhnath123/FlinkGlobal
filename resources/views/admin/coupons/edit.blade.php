@extends('layouts.admin')
@section('content')
    <div class="main_content_iner overly_inner ">
        <div class="container-fluid p-0 ">
            <!-- page title  -->
            <div class="row">
                <div class="col-12">
                    <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                        <div class="page_title_left d-flex align-items-center">
                            <h3 class="f_s_25 f_w_700 dark_text mr_30">Edit Coupon</h3>
                            <ol class="breadcrumb page_bradcam mb-0">
                                <li class="breadcrumb-item"><a href="dashboard.html">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="coupons.html">Coupons</a></li>
                                <li class="breadcrumb-item active">Edit Coupon</li>
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
                                <form action="{{ route('coupons.update', $coupon->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label>Coupon Code</label>
                                            <input type="text" name="code" value="{{ old('code', $coupon->code) }}"
                                                class="form-control" required style="text-transform:uppercase;">
                                        </div>

                                        <div class="col-md-6">
                                            <label>Coupon Type</label>
                                            <select name="type" class="form-control" required>
                                                <option value="percent" {{ $coupon->type == 'percent' ? 'selected' : '' }}>
                                                    Percentage</option>
                                                <option value="fixed" {{ $coupon->type == 'fixed' ? 'selected' : '' }}>
                                                    Fixed
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label>Value</label>
                                            <input type="number" name="value" value="{{ old('value', $coupon->value) }}"
                                                class="form-control" required>

                                        </div>
                                        <div class="col-md-6">
                                            <label>Minimum Cart Value</label>
                                            <input type="number" name="cart_value"
                                                value="{{ old('cart_value', $coupon->cart_value) }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label>Expiry Date</label>
                                            <input type="date" name="expiry_date"
                                                value="{{ old('expiry_date', \Carbon\Carbon::parse($coupon->expiry_date)->format('Y-m-d')) }}"
                                                class="form-control" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Status</label>
                                            <select name="status" class="form-control" required>
                                                <option value="1" {{ $coupon->status == 1 ? 'selected' : '' }}>Active
                                                </option>
                                                <option value="0" {{ $coupon->status == 0 ? 'selected' : '' }}>
                                                    Inactive
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    {{-- User Type + Status --}}
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label>User Type</label>
                                            <select name="user_type" id="user_type" class="form-control" required>
                                                <option value="all" {{ $coupon->user_type == 'all' ? 'selected' : '' }}>
                                                    All Users
                                                </option>
                                                <option value="new" {{ $coupon->user_type == 'new' ? 'selected' : '' }}>
                                                    New Users
                                                </option>
                                                <option value="existing"
                                                    {{ $coupon->user_type == 'existing' ? 'selected' : '' }}>
                                                    Existing Users</option>
                                                <option value="specific"
                                                    {{ $coupon->user_type == 'specific' ? 'selected' : '' }}>
                                                    Specific Users</option>
                                            </select>
                                        </div>


                                    </div>

                                    {{-- ✅ Specific Users --}}
                                    <div class="row mb-3 {{ $coupon->user_type == 'specific' ? '' : 'd-none' }}"
                                        id="specific_users_div">
                                        <div class="col-md-12">
                                            <label>Select Users</label>
                                            <select name="users[]" class="form-control" multiple>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}"
                                                        {{ in_array($user->id, $couponUsers) ? 'selected' : '' }}>
                                                        {{ $user->name }} ({{ $user->email }})
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update Coupon</button>
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

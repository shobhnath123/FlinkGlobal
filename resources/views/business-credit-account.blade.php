<x-front-guest-layout>
    <style>
        :root {
            --primary-color: #be1e2d; /* Matches the red in the logo */
            --text-dark: #333;
            --text-light: #666;
            --border-color: #ddd;
            --bg-light: #f9f9f9;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--text-dark);
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #f0f0f0;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            padding: 25px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            border-top: 5px solid var(--primary-color);
        }

        /* Header Styles */
        header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            /* margin-bottom: 30px; */
            /* border-bottom: 2px solid var(--border-color); */
            /* padding-bottom: 20px; */
            flex-wrap: wrap;
        }

        .logo-section h1 {
            color: var(--primary-color);
            margin: 0;
            font-size: 28px;
            text-transform: uppercase;
            font-weight: 800;
        }
        
        .logo-section .subtext {
            text-align: center;
            margin-top: 10px;;
        }

        .company-info {
            text-align: right;
            font-size: 12px;
        }

        h2 {
            background-color: var(--text-dark);
            color: white;
            padding: 5px;
            font-size: 18px;
            margin-top: 30px;
            border-radius: 4px;
        }

        h3 {
            color: var(--primary-color);
            border-bottom: 1px solid var(--border-color);
            padding-bottom: 5px;
            margin-top: 25px;
        }

        /* Form Grid Layout */
        .form-row {
            display: flex;
            gap: 15px;
            margin-bottom: 15px;
            flex-wrap: wrap;
        }

        .form-group {
            flex: 1;
            min-width: 200px;
            position: relative;
        }

        label {
            display: block;
            font-weight: 600;
            font-size: 12px;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="date"],
        input[type="number"],
        input[type="tel"],
        select {
            width: 100%;
            height: 35px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box; /* Ensures padding doesn't affect width */
            font-size: 12px;
        }

        input:focus {
            border-color: var(--primary-color);
            outline: none;
        }

        /* Tables for References */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            border: 1px solid var(--border-color);
            padding: 8px;
            text-align: left;
            vertical-align: top;
        }

        th {
            background-color: var(--bg-light);
            font-size: 12px;
        }

        /* Error messages in table cells */
        td .text-danger {
            display: block;
            margin-top: 4px;
            color: red;
            font-size: 0.9em;
        }

        td input.error {
            border: 2px solid #dc2626 !important;
            width: 100%;
        }

        /* Terms Box */
        .terms-box {
            height: 300px;
            overflow-y: scroll;
            border: 1px solid #999;
            padding: 15px;
            background-color: #fff;
            font-size: 11px;
            margin-bottom: 20px;
        }

        .declaration {
            background-color: var(--bg-light);
            padding: 15px;
            border: 1px solid var(--border-color);
            font-size: 12px;
            margin: 20px 0;
        }

        /* Signature Section */
        .signature-row {
            margin-top: 40px;
            display: flex;
            gap: 30px;
        }
        
        .signature-line {
            border-top: 1px solid #333;
            margin-top: 40px;
            padding-top: 5px;
            font-size: 12px;
            text-align: center;
        }

        /* Guarantee Section specific */
        .guarantor-container {
            border: 1px dashed var(--text-dark);
            padding: 20px;
            margin-bottom: 20px;
            background-color: #fffbfb;
            overflow: visible;
        }

        button.submit-btn {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 15px 40px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
            display: block;
            margin: 40px auto;
            width: 50%;
        }

        button.submit-btn:hover {
            background-color: #a01925;
        }
        .legal-text { font-size: 12px; text-align: justify; margin-bottom: 20px; }
        .legal-text ol { padding-left: 20px; }
        /* .legal-text li { margin-bottom: 10px; } */
        .notes { font-size: 10px; font-style: italic; margin-top: 20px; border-top: 1px solid #ccc; padding-top: 10px; }

        .phone-input {
            display: flex;
            align-items: center;
        }

        .country-code {
            padding: 9px 10px;
            background: #f3f4f6;
            border: 1px solid #ccc;
            border-right: none;
            border-radius: 4px 0 0 4px;
            font-size: 10px;
        }

        .phone-input input {
            border-radius: 0 4px 4px 0;
            flex: 1;
        }
        
        /* Error color */
        .text-danger {
            color: red;
            font-size: 0.9em;
            margin-top: 4px;
        }
        .error {
            border: 2px solid #dc2626 !important; /* red border */
            /* background-color: #ffe6e6;  */
            outline: none; /* remove default outline */
        }
        input[type="checkbox"].error {
            outline: 2px solid #dc2626;
        }
        /* Address Suggestions */
        .address-wrapper {
            position: relative;
            width: 100%;
            overflow: visible !important;
        }

        .suggestions {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            z-index: 10000;

            background: #ffffff;
            border: 1px solid #dcdcdc;
            border-top: none;

            list-style: none;
            margin: 0;
            padding: 0;

            max-height: 220px;
            overflow-y: auto;

            box-shadow: 0 6px 15px rgba(0,0,0,0.15);
            border-radius: 0 0 6px 6px;
        }

.suggestions li {
    padding: 10px 14px;
    font-size: 14px;
    cursor: pointer;
    line-height: 1.4;
    border-bottom: 1px solid #f0f0f0;
    background: #fff;
}

.suggestions li:last-child {
    border-bottom: none;
}

.suggestions li:hover,
.suggestions li.active {
    background-color: #f5f7fa;
}



        @media (max-width: 600px) {
            header { flex-direction: column; text-align: center; }
            .company-info { text-align: center; margin-top: 10px; width: 100%; }
            .form-row { flex-direction: column; }
            .signature-row { flex-direction: column; gap: 0; }
        }

        /* Success Popup Modal */
        .popup-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 9999;
            justify-content: center;
            align-items: center;
        }

        .popup-overlay.show {
            display: flex;
        }

        .popup-content {
            background: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            text-align: center;
            max-width: 500px;
            animation: slideIn 0.3s ease-out;
        }

        @keyframes slideIn {
            from {
                transform: translateY(-50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .popup-icon {
            font-size: 60px;
            color: #22c55e;
            margin-bottom: 20px;
        }

        .popup-title {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }

        .popup-message {
            font-size: 16px;
            color: #666;
            margin-bottom: 30px;
        }

        .popup-btn {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 12px 30px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        .popup-btn:hover {
            background-color: #a01925;
        }
        /* Preson section csss */
        .clause-num {
            min-width: 25px;
            font-weight: bold;
        }
        .clause-item {
            display: flex;
            line-height: normal;
        }
        .sub-list {
            list-style-type: lower-alpha;
            padding-left: 40px;
            margin-top: 5px;
        }
        .legal-text ol {
            padding-left: 20px;
        }
        .clause {
            display: flex;
            align-items: flex-start;
        }
        .num {
            font-weight: bold;
            margin-right: 15px;
            min-width: 10px; 
        }
    </style>
<div class="container">
    <header>
        <div class="logo-section">
            <img src="{{ asset("flinktech_logo.webp") }}" alt="FlinkTech Logo" style="height: 40px; vertical-align: middle;">
            <div class="subtext"><img src="{{ asset("fervour-logo.webp") }}" alt="fervour Logo" style="height: 20px; vertical-align: center;"><img src="{{ asset("uvw-logo.png") }}" alt="uvw Logo" style="height: 20px; vertical-align: center;"></div>
        </div>
        <div class="company-info">
            <strong>FlinkGlobal Limited T/A FlinkTech</strong><br>
            23 Stewart Gibson Place, Manurewa, AUCKLAND 2105<br>
            Phone: (09) 393 0900<br>
            Email: office@flinkglobal.com<br>
            Web: www.flinkglobal.com
        </div>
    </header>
    
    <!-- Success Popup Modal -->
    <div id="successPopup" class="popup-overlay">
        <div class="popup-content">
            <div class="popup-icon">✓</div>
            <div class="popup-title">Form Submitted Successfully</div>
            <div class="popup-message">Your application has been submitted successfully. We will review it and contact you soon.</div>
            <button class="popup-btn" onclick="closePopup()">Close</button>
        </div>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif  
    <h1 style="text-align: center; font-size: 24px;">Business - Credit Account Application</h1>
    <p style="text-align: center; font-size: 14px;">To Be Completed by Applicants - Please complete all sections and read the Terms and Conditions of Trade.</p>
    <form action="{{ route('business.account.store') }}" method="POST">
        @csrf
        <!-- SECTION 1: CLIENT DETAILS -->
        <h2>Client Details</h2>
        <div class="form-row">
            <div class="form-group">
                <label>Full Name (Contact Person):<span style="color: red;">*</span></label>
                <input type="text" name="contact_person" value="{{old('contact_person')}}" class="@error('contact_person') error @enderror">
                @error('contact_person') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="form-group address-wrapper">
                 <label>Physical Address:<span style="color: red;">*</span></label>
                <input type="text" id="address_input" name="physical_address" value="{{ old('physical_address')}}" class="@error('physical_address') error @enderror" autocomplete="off">
                <input type="hidden" id="physical_address_dpid" name="physical_address_dpid">
                <ul id="address_suggestions" class="suggestions"></ul>
                {{-- @error('postcode_phy') <span class="text-danger">{{ $message }}</span> @enderror --}}
            </div>
            {{-- <div class="form-group">
                <label>Physical Address:<span style="color: red;">*</span></label>
                <input type="text" name="physical_address" value="{{ old('physical_address')}}" class="@error('physical_address') error @enderror">
                 @error('physical_address') <span class="text-danger">{{ $message }}</span> @enderror
            </div> --}}
            <div class="form-group" style="flex: 0 0 100px;">
                <label>Postcode:<span style="color: red;">*</span></label>
                <input type="text" name="postcode_phy" value="{{old('postcode_phy')}}" class="@error('postcode_phy') error @enderror">
                 @error('postcode_phy') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="form-group address-wrapper">
                <label>Billing Address:<span style="color: red;">*</span></label>
                <input type="text" id="billing_address_input" name="billing_address" value="{{ old('billing_address') }}" autocomplete="off" data-postcode="postcode_bill">
                <input type="hidden" id="billing_address_dpid" name="billing_address_dpid">
                <ul id="billing_address_suggestions" class="suggestions"></ul>
                @error('billing_address')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group" style="flex: 0 0 100px;">
                <label>Postcode:<span style="color: red;">*</span></label>
                <input type="text"
                    name="postcode_bill"
                    id="postcode_bill"
                    value="{{ old('postcode_bill') }}"
                    class="@error('postcode_bill') error @enderror">

                @error('postcode_bill')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        {{-- <div class="form-row">
            <div class="form-group">
                <label>Billing Address:<span style="color: red;">*</span></label>
                <input type="text" name="billing_address" value="{{old('billing_address')}}" class="@error('billing_address') error @enderror">
                 @error('billing_address') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group" style="flex: 0 0 100px;">
                <label>Postcode:<span style="color: red;">*</span></label>
                <input type="text" name="postcode_bill" value="{{old('postcode_bill')}}" class="@error('postcode_bill') error @enderror">
                @error('contact_person') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div> --}}
        <div class="form-row">
            <div class="form-group">
                <label>Driver’s Licence No:<span style="color: red;">*</span></label>
                <input type="text" name="drivers_licence" value="{{old('drivers_licence')}}" class="@error('drivers_licence') error @enderror">
                 @error('drivers_licence') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label>D.O.B:<span style="color: red;">*</span></label>
                <input type="date" name="dob"  value="{{old ('dob')}}" class="@error('dob') error @enderror">
                 @error('dob') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label>Email Address:<span style="color: red;">*</span></label>
                <input type="email" name="email" value="{{old('email')}}" class="@error('email') error @enderror">
                 @error('email') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
            <label>Mobile No:<span style="color: red;">*</span></label>
            <div class="phone-input">
                <span class="country-code">+64</span>
                <input type="tel" name="mobile" placeholder="21 123 4567" pattern="[0-9]{7,10}" value="{{old('mobile')}}" class="@error('mobile') error @enderror">
            </div>
            @error('mobile') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        </div>

        <!-- SECTION 2: BUSINESS DETAILS -->
        <h2>Business Details</h2>
        <div class="form-row">
            <div class="form-group">
                <label>Legal Name:<span style="color: red;">*</span></label>
                <input type="text" name="legal_name" value="{{old('legal_name')}}" class="@error('legal_name') error @enderror">
                 @error('legal_name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label>Trading Name:<span style="color: red;">*</span></label>
                <input type="text" name="trading_name" value="{{old('trading_name')}}" class="@error('trading_name') error @enderror">
                 @error('trading_name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label>GST No:<span style="color: red;">*</span></label>
                <input type="text" name="gst_no" value="{{old('gst_no')}}" class="@error('gst_no') error @enderror">
                 @error('gst_no') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label>Company Number:<span style="color: red;">*</span></label>
                <input type="text" name="company_no" value="{{old('company_no')}}" class="@error('company_no') error @enderror">
                 @error('company_no') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label>NZBN Number:<span style="color: red;">*</span></label>
                <input type="text" name="nzbn" value="{{old('nzbn')}}" class="@error('nzbn') error @enderror">
                 @error('nzbn') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label>Nature of Business:<span style="color: red;">*</span></label>
                <input type="text" name="nature_business" value="{{old('nature_business')}}" class="@error('nature_business') error @enderror">
                 @error('nature_business') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label>Date Incorp:<span style="color: red;">*</span></label>
                <input type="date" name="date_incorp" value="{{old('date_incorp')}}" class="@error('date_incorp') error @enderror">
                 @error('date_incorp') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label>Paid Up Capital ($):<span style="color: red;">*</span></label>
                <input type="number" name="paid_capital" value="{{old('paid_capital')}}" class="@error('paid_capital') error @enderror">
                 @error('paid_capital') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label>Est. Monthly Purchases ($):<span style="color: red;">*</span></label>
                <input type="number" name="monthly_purchases" value="{{old('monthly_purchases')}}" class="@error('monthly_purchases') error @enderror">
                 @error('monthly_purchases') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label>Credit Limit Required ($):<span style="color: red;">*</span></label>
                <input type="number" name="credit_limit" value="{{old('credit_limit')}}" class="@error('credit_limit') error @enderror">
                 @error('credit_limit') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
         <div class="form-row">
            <div class="form-group">
                <label>Principal Place of Business is:<span style="color: red;">*</span></label>
                <input type="text" name="principal_place_of_business" value="{{old('principal_place_of_business')}}" class="@error('principal_place_of_business') error @enderror">
                 @error('principal_place_of_business') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label>(to whom):<span style="color: red;">*</span></label>
                 <input type="text" name="to_whom" value="{{old('to_whom')}}" class="@error('to_whom') error @enderror">
                  @error('to_whom') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <!-- SECTION 3: DIRECTORS DETAILS -->
        <h2>Directors Details</h2>
        <div class="form-row">
            <div class="form-group">
                <label>Number of Directors: <span style="color: red;">*</span></label>
                <input type="number" name="num_directors" id="num_directors" min="1" max="6" value="{{ old('num_directors') }}" class="@error('num_directors') error @enderror">
                @error('num_directors') <span class="text-danger">{{ $message }}</span> @enderror

            </div>
        </div>

        <!-- Directors Container -->
        <div id="directors-container"></div>

        <!-- Director 1 (Template) -->
        <template id="director-template">
            <h3>Director (<span class="director-number"></span>)</h3>
            <div class="form-row">
                <div class="form-group">
                    <label>Full Name:<span style="color: red;">*</span></label>
                    <input type="text" class="dir_name" name="" required>
                </div>
                <div class="form-group">
                    <label>D.O.B:<span style="color: red;">*</span></label>
                    <input type="date" class="dir_dob" name="" required>
                </div>
                <div class="form-group">
                    <label>Mobile No:<span style="color: red;">*</span></label>
                    <input type="tel" class="dir_mobile" name="" required>
                </div>
                
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label>Private Address:<span style="color: red;">*</span></label>
                    <input type="text" class="dir_address" name="" required>
                </div>
                <div class="form-group">
                    <label>Driver's Licence:<span style="color: red;">*</span></label>
                    <input type="text" class="dir_dl" name="" required>
                </div>
                <div class="form-group" style="flex: 0 0 100px;">
                    <label>Post Code:<span style="color: red;">*</span></label>
                    <input type="text" class="dir_pc" name="" required>
                </div>
            </div>
        </template>

        <!-- SECTION 4: PAYMENT TERMS -->
        <h2>Account Payment Terms</h2>
        <div class="form-row">
            <div class="form-group">
                <label>Purchase Order Required? <span style="color: red;">*</span></label>
                <select name="po_required" class="@error('po_required') error @enderror">
                    <option value="Yes" {{ old('po_required') == 'Yes' ? 'selected' : '' }}>Yes</option>
                    <option value="No" {{ old('po_required') == 'No' ? 'selected' : '' }}>No</option>
                </select>
            </div>
           <div class="form-group">
                <label>Accounts to be emailed? <span style="color: red;">*</span></label>
                <select name="accounts_email_opt" class="@error('accounts_email_opt') error @enderror">
                    <option value="Yes" {{ old('accounts_email_opt') == 'Yes' ? 'selected' : '' }}>
                        Yes
                    </option>
                    <option value="No" {{ old('accounts_email_opt') == 'No' ? 'selected' : '' }}>
                        No
                    </option>
                </select>
            </div>
            <div class="form-group">
                <label>Accounts Email Address:<span style="color: red;">*</span></label>
                <input type="email" name="accounts_email" value="{{old("accounts_email")}}" class="@error('accounts_email') error @enderror">
                @error('accounts_email') <span class="text-danger">{{ $message }}</span> @enderror

            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label>Accounts Contact:<span style="color: red;">*</span></label>
                <input type="text" name="accounts_contact" value="{{old("accounts_contact")}}" class="@error('accounts_email') error @enderror">
                 @error('accounts_email') <span class="text-danger">{{ $message }}</span> @enderror

            </div>
            <div class="form-group">
                <label>Mobile No:<span style="color: red;">*</span></label>
                <div class="phone-input">
                    <span class="country-code">+64</span>            
                    <input type="tel" name="accounts_mobile" value="{{old("accounts_mobile")}}" class="@error('accounts_mobile') error @enderror">
                </div>
                @error('accounts_mobile') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label>Bank and Branch:<span style="color: red;">*</span></label>
                <input type="text" name="bank_branch" value="{{old("bank_branch")}}" class="@error('bank_branch') error @enderror">
                @error('bank_branch') <span class="text-danger">{{ $message }}</span> @enderror

            </div>
            <div class="form-group">
                <label>Account No:<span style="color: red;">*</span></label>
                <input type="text" name="bank_account_no" value="{{old("bank_account_no")}}" class="@error('bank_account_no') error @enderror">
                @error('bank_account_no') <span class="text-danger">{{ $message }}</span> @enderror

            </div>
        </div>

        <!-- SECTION 5: REFERENCES -->
        <h2>Trade / Personal References</h2>
        <table>
            <thead>
                <tr>
                    <th style="width: 30%;">Name <span style="color: red;">*</span></th>
                    <th style="width: 40%;">Company Name/ Address <span style="color: red;">*</span></th>
                    <th style="width: 30%;">Mobile No/ Email <span style="color: red;">*</span></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <input type="text" name="ref1_name" value="{{ old('ref1_name') }}" class="@error('ref1_name') error @enderror">
                        @error('ref1_name') <span class="text-danger">{{ $message }}</span> @enderror
                    </td>
                    <td>
                        <input type="text" name="ref1_company" value="{{ old('ref1_company') }}" class="@error('ref1_company') error @enderror" >
                        @error('ref1_company') <span class="text-danger">{{ $message }}</span> @enderror
                    </td>
                    <td>
                        <div class="phone-input">
                            <span class="country-code">+64</span>
                            <input type="text" name="ref1_contact" value="{{ old('ref1_contact') }}" class="@error('ref1_contact') error @enderror" >
                        </div>
                        @error('ref1_contact') <span class="text-danger">{{ $message }}</span> @enderror                    
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="ref2_name" value="{{ old('ref2_name') }}" class="@error('ref2_name') error @enderror" >
                        @error('ref2_name') <span class="text-danger">{{ $message }}</span> @enderror
                    </td>
                    <td>
                        <input type="text" name="ref2_company" value="{{ old('ref2_company') }}" class="@error('ref2_company') error @enderror" >
                        @error('ref2_company') <span class="text-danger">{{ $message }}</span> @enderror
                    </td>
                    <td>
                        <div class="phone-input">
                            <span class="country-code">+64</span>
                            <input type="text" name="ref2_contact" value="{{ old('ref2_contact') }}" class="@error('ref2_contact') error @enderror" >
                        </div>
                        @error('ref2_contact') <span class="text-danger">{{ $message }}</span> @enderror
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="ref3_name" value="{{ old('ref3_name') }}" class="@error('ref3_name') error @enderror" >
                        @error('ref3_name') <span class="text-danger">{{ $message }}</span> @enderror
                    </td>
                    <td>
                        <input type="text" name="ref3_company" value="{{ old('ref3_company') }}" class="@error('ref3_company') error @enderror" >
                        @error('ref3_company') <span class="text-danger">{{ $message }}</span> @enderror
                    </td>
                    <td>
                        <div class="phone-input">
                            <span class="country-code">+64</span>
                            <input type="text" name="ref3_contact" value="{{ old('ref3_contact') }}" class="@error('ref3_contact') error @enderror" >
                        </div>
                        @error('ref3_contact') <span class="text-danger">{{ $message }}</span> @enderror
                    </td>   
                </tr>
            </tbody>
        </table>

        <div class="declaration">
            <p>I certify that the above information is true and correct and that I accept the supply of credit by the Supplier.</p>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>SIGNED (CLIENT) Name:</label>
                <input type="text" name="signed_client_name" value="{{ old("signed_client_name") }}" class="@error('signed_client_name') error @enderror">
                 @error('signed_client_name') <span class="text-danger">{{ $message }}</span> @enderror   
            </div>
            <div class="form-group">
                <label>Position:</label>
                <input type="text" name="signed_position" value="{{ old('signed_position') }}" class="@error('signed_position') error @enderror">
                 @error('signed_position') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label>Date:</label>
                <input type="date" name="signed_date" value="{{ old('signed_date') }}" class="@error('signed_date') error @enderror">
                 @error('signed_date') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <!-- PAGE 2: GUARANTEE -->
        <h2 style="border-top: 5px solid var(--primary-color); margin-top: 50px;">Personal/Directors Guarantee and Indemnity</h2>
        <p><strong>IN CONSIDERATION</strong> of Flinkglobal Limited T/A FlinkTech and its successors and assigns (“the Supplier”) at the request of the Guarantor (as is now acknowledged) supplying and continuing to supply goods and/or services to:</p>
        <input type="text" placeholder="Insert Client Name Here">
        <p>(“the Client”)</p>   
         <div class="document-container">
            <h1>I/WE (also referred to as the “Guarantor/s”) UNCONDITIONALLY AND IRREVOCABLY:</h1>
            <div class="legal-text">
                <div class="clauses-list">
                    <div class="clause-item">
                        <div class="clause-num">1.</div>
                        <div class="clause-text">
                            <strong>GUARANTEE</strong> the due and punctual payment to the Supplier of all monies which are now owing to the Supplier by the Client and all further sums of money from time to time owing to the Supplier by the Client in respect of goods and services supplied or to be supplied by the Supplier to the Client or any other liability of the Client to the Supplier, and the due observance and performance by the Client of all its obligations contained or implied in any contract or agreement with the Supplier, including but not limited to the Terms & Conditions of Trade signed by the Client and annexed to this Guarantee and Indemnity.  If for any reason the Client does not pay any amount owing to the Supplier, the Guarantor will immediately on demand pay the relevant amount to the Supplier. In consideration of the Supplier agreeing to supply the goods and/or services to the Client, the Guarantor charges all of its right, title and interest (joint or several) in any land, realty or other assets capable of being charged, owned by the Guarantor now or in the future, to secure the performance by the Guarantor of its obligations under this Guarantee and Indemnity (including, but not limited to, the payment of any money) and the Guarantor acknowledges that this personal guarantee and indemnity constitutes a security agreement for the purposes of the Personal Property Securities Act 1999 (“PPSA”) and unequivocally consents to the Supplier registering any interest so charged. Furthermore, it is agreed by both parties that where the Guarantor is acting in the capacity as a trustee for a trust, then the Guarantor agrees to charge all its right title and interest in any land realty, or other assets capable of being charged in its own capacity and in its capacity as trustee and shall be subject to the PPSA Registration as stated above.  The Guarantor irrevocably appoints the Supplier and each director of the Supplier as the Guarantor’s true and lawful attorney/s to perform all necessary acts to give effect to this clause including, but not limited to, signing any document on the Guarantor’s behalf which the Supplier may reasonably require to:
                            <ol class="sub-list" type="a">
                                <li>register a financing statement or financing change statement in relation to a security interest on the Personal Property Securities Register;</li>
                                <li>register any other document required to be registered by the PPSA or any other law; or</li>
                                <li>correct a defect in a statement referred to in clause 1(a) or 1(b).</li>
                            </ol>
                        </div>
                    </div>
                    <div class="clause-item">
                        <div class="clause-num">2.</div>
                        <div class="clause-text">
                            <strong>HOLD HARMLESS AND INDEMNIFY</strong>the Supplier on demand as a separate obligation against any liability (including but not limited to damages, costs, losses and legal fees calculated on a solicitor and own client basis) incurred by, or assessed against, the Supplier in connection with:
                            <ol class="sub-list" type="a">
                                <li>the supply of goods and/or services to the Client; or</li>
                                <li>the recovery of monies owing to the Supplier by the Client including the enforcement of this Guarantee and Indemnity, and including but not limited to the Supplier’s nominees’ costs of collection and legal costs; or</li>
                                <li>monies paid by the Supplier with the Client’s consent in settlement of a dispute that arises or results from a dispute between, the Supplier, the Client, and a third party or any combination thereof, over the supply of goods and/or services by the Supplier to the Client.</li>
                            </ol>
                        </div>
                    </div>
                    <div class="clause-item">
                        <div class="clause-num">I/WE FURTHER ACKNOWLEDGE AND AGREE THAT</div>
                    </div>
                    <div class="clause-item">
                        <div class="clause-num">3.</div>
                        <div class="clause-text">
                            I/We have received, read, and understood the Supplier’s Terms and Conditions prior to entering into this Guarantee and Indemnity and agree to be bound by those Terms and Conditions.
                        </div>
                    </div>
                    <div class="clause-item">
                        <div class="clause-num">4.</div>
                        <div class="clause-text">
                        This Guarantee and Indemnity shall constitute an unconditional and continuing Guarantee and Indemnity and accordingly shall be irrevocable and remain in full force and effect until all monies owing to the Supplier by the Client and all obligations herein have been fully paid satisfied and performed.
                        </div>
                    </div>
                    <div class="clause-item">
                        <div class="clause-num">5.</div>
                        <div class="clause-text">
                        No granting of credit, extension of further credit, or granting of time and no waiver, indulgence, or neglect to sue on the Supplier’s part (whether in respect of the Client or any one or more of any other Guarantor(s) or otherwise) and no failure by any named Guarantor to properly execute this Guarantee and Indemnity shall impair or limit the liability under this Guarantee and Indemnity of any Guarantor.  Without affecting the Client’s obligations to the Supplier, each Guarantor shall be a principal debtor and liable to the Supplier accordingly.
                        </div>
                    </div>
                    <div class="clause-item">
                        <div class="clause-num">6.</div>
                        <div class="clause-text">
                        The liability under this Guarantee and Indemnity shall not be discharged, abrogated, prejudiced, or affected by:
                            <ol class="sub-list" type="a">
                                <li>any alteration, modification, variation or addition to any contract or agreement in respect of the supply of goods and/or services;</li>
                                <li>the liquidation, receivership, administration, bankruptcy, dissolution, compromise or scheme of arrangement in respect of the Client; </li>
                                <li>any other act, omission, or event which, but for this provision, might operate to discharge, impair, or otherwise affect any obligations under this Guarantee and Indemnity of any of the rights, powers or remedies conferred by this Guarantee and Indemnity or by law.</li>
                            </ol>
                        </div>
                    </div>
                    <div class="clause-item">
                        <div class="clause-num">7.</div>
                        <div class="clause-text">
                            The term "Guarantor" whenever used in this Guarantee and Indemnity shall, if there is more than one person named as Guarantor, mean, and refer to each of them individually and all of them together unless the context otherwise requires, the obligations and agreements on the part of the Guarantor, shall include the Guarantor's executors, administrators, successors and permitted assignments (where applicable) contained in this Guarantee and Indemnity shall bind them jointly and severally.
                        </div>
                    </div>
                    <div class="clause-item">
                        <div class="clause-num">8.</div>
                        <div class="clause-text"><strong>I/We have been advised to obtain independent legal advice before executing this Guarantee and Indemnity.  I/we understand that I/we am/are liable for all amounts owing (both now and in the future) by the Client to the Supplier.</strong></div>
                    </div>
                    <div class="clause-item">
                        <div class="clause-num">9.</div>
                        <div class="clause-text">
                        I/we irrevocably authorise the Supplier to obtain from any person or company any information which the Supplier may require for credit reference purposes.  I/We further irrevocably authorise the Supplier to provide to any third party, in response to credit references and enquiries about me/us or by way of information exchange with credit reference agencies, details of this Guarantee and Indemnity and any subsequent dealings that I/we may have with the Supplier as a result of this Guarantee and Indemnity being actioned by the Supplier.
                        </div>
                    </div>
                    <div class="clause-item">
                        <div class="clause-num">10.</div>
                        <div class="clause-text">
                        The above information is to be used by the Supplier for all purposes in connection with the Supplier considering this Guarantee and Indemnity and the subsequent enforcement of the same. For and on behalf of the Client I/We confirm I/We have read, understood, and accept the terms of this Guarantee and Indemnity, and I/We agree to be bound by this Guarantee and Indemnity.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-row">
            <!-- Guarantor 1 -->
            <div class="form-group guarantor-container">
                <h3>GUARANTOR-1</h3>
                <label>Signed:<span style="color: red;">*</span></label>
                <input type="text" name="g1_signed" value="{{old('g1_signed')}}" class="@error('g1_signed') error @enderror">
                @error('g1_signed') <span class="text-danger">{{ $message }}</span> @enderror

                <label>Full Name:<span style="color: red;">*</span></label>
                <input type="text" name="g1_name" value="{{old('g1_name')}}" class="@error('g1_name')error @enderror">
                @error('g1_name') <span class="text-danger">{{ $message }}</span> @enderror

                <label>Home Address:<span style="color: red;">*</span></label>
                <div class="address-wrapper">
                    <input type="text" id="g1_address_input" name="g1_address" value="{{ old('g1_address')}}" class="@error('g1_address') error @enderror" autocomplete="off">
                    <input type="hidden" id="g1_address_dpid" name="g1_address_dpid">
                    <ul id="g1_address_suggestions" class="suggestions"></ul>
                </div>
                @error('g1_address') <span class="text-danger">{{ $message }}</span> @enderror
               
                <label>Date of Birth:<span style="color: red;">*</span></label>
                <input type="date" name="g1_dob" value="{{old('g1_dob')}}" class="@error('g1_dob') error @enderror">
                @error('g1_dob') <span class="text-danger">{{ $message }}</span> @enderror

                <label>Signature of Witness:<span style="color: red;">*</span></label>
                <input type="date" name="g1_signature_of_witness" value="{{old('g1_signature_of_witness')}}" class="@error('g1_signature_of_witness') error @enderror">
                @error('g1_signature_of_witness') <span class="text-danger">{{ $message }}</span> @enderror

                <label>Name of Witness:<span style="color: red;">*</span></label>
                <input type="text" name="g1_witness_name" value="{{old('g1_witness_name')}}" class="@error('g1_witness_name') error @enderror">
                 @error('g1_witness_name') <span class="text-danger">{{ $message }}</span> @enderror

                <label>Occupation:<span style="color: red;">*</span></label>
                <input type="text" name="g1_witness_occ" value="{{old('g1_witness_occ')}}" class="@error('g1_witness_occ') error @enderror">
                 @error('g1_witness_occ') <span class="text-danger">{{ $message }}</span> @enderror

                <label>Present Address:<span style="color: red;">*</span></label>
                <div class="address-wrapper">
                    <input type="text" id="g1_witness_addr_input" name="g1_witness_addr" value="{{old('g1_witness_addr')}}" class="@error('g1_witness_addr') error @enderror" autocomplete="off">
                    <input type="hidden" id="g1_witness_addr_dpid" name="g1_witness_addr_dpid">
                    <ul id="g1_witness_addr_suggestions" class="suggestions"></ul>
                </div>
                 @error('g1_witness_addr') <span class="text-danger">{{ $message }}</span> @enderror

            </div>

            <!-- Guarantor 2 -->
            <div class="form-group guarantor-container">
                <h3>GUARANTOR-2</h3>
                 <label>Signed:<span style="color: red;">*</span></label>
                <input type="text" name="g2_signed" value="{{old('g2_signed')}}" class="@error('g2_signed') error @enderror">
                @error('g2_signed') <span class="text-danger">{{ $message }}</span> @enderror

                <label>Full Name:<span style="color: red;">*</span></label>
                <input type="text" name="g2_name" value="{{old('g2_name')}}" class="@error('g2_name')error @enderror">
                @error('g2_name') <span class="text-danger">{{ $message }}</span> @enderror

                <label>Home Address:<span style="color: red;">*</span></label>
                <div class="address-wrapper">
                    <input type="text" id="g2_address_input" name="g2_address" value="{{old('g2_address')}}" class="@error('g2_address') error @enderror" autocomplete="off">
                    <input type="hidden" id="g2_address_dpid" name="g2_address_dpid">
                    <ul id="g2_address_suggestions" class="suggestions"></ul>
                </div>
                @error('g2_address') <span class="text-danger">{{ $message }}</span> @enderror

                <label>Date of Birth:<span style="color: red;">*</span></label>
                <input type="date" name="g2_dob" value="{{old('g2_dob')}}" class="@error('g2_dob') error @enderror">
                @error('g2_dob') <span class="text-danger">{{ $message }}</span> @enderror

                <label>Signature of Witness:<span style="color: red;">*</span></label>
                <input type="date" name="g2_signature_of_witness" value="{{old('g2_signature_of_witness')}}" class="@error('g2_signature_of_witness') error @enderror">
                @error('g2_signature_of_witness') <span class="text-danger">{{ $message }}</span> @enderror

                <label>Name of Witness:<span style="color: red;">*</span></label>
                <input type="text" name="g2_witness_name" value="{{old('g2_witness_name')}}" class="@error('g2_witness_name') error @enderror">
                @error('g2_witness_name') <span class="text-danger">{{ $message }}</span> @enderror

                <label>Occupation:<span style="color: red;">*</span></label>
                <input type="text" name="g2_witness_occ" value="{{old('g2_witness_occ')}}" class="@error('g2_witness_occ') error @enderror">
                @error('g2_witness_occ') <span class="text-danger">{{ $message }}</span> @enderror

                <label>Present Address:<span style="color: red;">*</span></label>
                <div class="address-wrapper">
                    <input type="text" id="g2_witness_addr_input" name="g2_witness_addr" value="{{old('g2_witness_addr')}}" class="@error('g2_witness_addr') error @enderror" autocomplete="off">
                    <input type="hidden" id="g2_witness_addr_dpid" name="g2_witness_addr_dpid">
                    <ul id="g2_witness_addr_suggestions" class="suggestions"></ul>
                </div>
                 @error('g2_witness_addr') <span class="text-danger">{{ $message }}</span> @enderror

            </div>
            
        </div>
        <div class="notes">
            <strong>Notes:</strong><br>
                1. If the Client is a proprietary limited company, the Guarantor(s) must be the director(s).<br>
        </div>
        <!-- PAGE 2: TERMS AND CONDITIONS -->
        <h2>Terms & Conditions of Trade</h2>
        <p>Please scroll to read the full Terms and Conditions.</p>
        <div class="terms-box">
            <div class="content">
                <div class="term-section">
                    <strong>1. Definitions</strong>
                    <p class="clause"><span class="num">1.1</span>"Client"means the person/s, entities or any person acting on behalf of and with the authority of the Client requesting the Supplier to provide the Services as specified in any proposal, quotation, order, invoice or other documentation, and:</p>
                    <ol class="sub-list">
                        <li>if there is more than one Client, is a reference to each Client jointly and severally; and</li>
                        <li>if the Client is a partnership, it shall bind each partner jointly and severally; and</li>
                        <li>if the Client is a part of a Trust, shall be bound in their capacity as a trustee; and</li>
                        <li>includes the Client’s executors, administrators, successors and permitted assigns.</li>
                    </ol>
                    <p class="clause"><span class="num">1.2</span>"Contract"means the terms and conditions contained herein, together with any quotation, order, invoice or other document or amendments expressed to be supplemental to this Contract.</p>
                    <p class="clause"><span class="num">1.3</span>"Cookies"means small files which are stored on a user’s computer. They are designed to hold a modest amount of data (including Personal Information) specific to a particular client and website, and can be accessed either by the web server or the client’s computer. If the Client does not wish to allow Cookies to operate in the background when using the Supplier’s website, then the Client shall have the right to enable / disable the Cookies first by selecting the option to enable / disable provided on the website, prior to making enquiries via the website.</p>
                    <p class="clause"><span class="num">1.4</span>"Goods" means all Goods or Services supplied by the Supplier to the Client at the Client’s request from time to time (where the context so permits the terms ‘Goods’ or ‘Services’ shall be interchangeable for the other)..</p>
                    <p class="clause"><span class="num">1.5</span>"Price" means the Price payable (plus any Goods and Services Tax (“GST”) where applicable) for the Goods as agreed between the Supplier and the Client in accordance with clause 5 below.</p>
                    <p class="clause"><span class="num">1.6</span>"Supplier" means Flinkglobal Limited T/A FlinkTech, its successors and assigns..</p>
                </div>
                <div class="term-section">
                    <strong>2. Acceptance</strong>
                    <p class="clause"><span class="num">2.1</span>The parties acknowledge and agree that:</p>
                    <ol class="sub-list">
                        <li>they have read and understood the terms and conditions contained in this Contract; and</li>
                        <li>the parties are taken to have exclusively accepted and are immediately bound, jointly and severally, by these terms and conditions if the Client places an order for or accepts Delivery of the Goods.</li>
                    </ol>
                    <p class="clause"><span class="num">2.2</span>In the event of any inconsistency between the terms and conditions of this Contract and any other prior document or schedule that the parties have entered into, the terms of this Contract shall prevail.</p>
                    <p class="clause"><span class="num">2.3</span>Any amendment to the terms and conditions contained in this Contract may only be amended in writing by the consent of both parties.</p>
                    <p class="clause"><span class="num">2.4</span>The Client acknowledges and accepts that:</p>
                    <ol class="sub-list">
                        <li>the supply of Goods on credit shall not take effect until the Client has completed a credit application with the Supplier and it has been approved with a credit limit established for the account;</li>
                        <li>limit and/or the account exceeds the payment terms, the Supplier reserves the right to refuse Delivery; and</li>
                        <li>the supply of Goods for accepted orders may be subject to availability and if, for any reason, the Goods are not or cease to be available, the Supplier reserves the right to substitute comparable Goods (or components of the Goods) and vary the Price as per clause 5.2. In all such cases the Supplier will notify the Client in advance of any such substitution, and also reserves the right to place the Client’s order and/or services on hold until such time as the Supplier and the Client agree to such changes.</li>
                    </ol>
                    <p class="clause"><span class="num">2.5</span>Any advice, recommendation, information, assistance or service provided by the Supplier in relation to the Goods or Services supplied is given in good faith to the Client, or the Client’s agent and is based on the Supplier’s own knowledge and experience and shall be accepted without liability on the part of the Supplier.</p>
                    <p class="clause"><span class="num">2.6</span>Electronic signatures shall be deemed to be accepted by either party providing that the parties have complied with Section 226 of the Contract and Commercial Law Act 2017 or any other applicable provisions of that Act or any Regulations referred to in that Act.</p>
                </div>
                <div class="term-section">
                    <strong>3. Errors and Omissions</strong>
                    <p class="clause"><span class="num">3.1</span>The Client acknowledges and accepts that the Supplier shall, without prejudice, accept no liability in respect of any alleged or actual error(s) and/or omission(s): </p>
                    <ol class="sub-list">
                        <li>resulting from an inadvertent mistake made by the Supplier in the formation and/or administration of this Contract; and/or</li>
                        <li>contained in/omitted from any literature (hard copy and/or electronic) supplied by the Supplier in respect of the Services.</li>
                    </ol>
                    <p class="clause"><span class="num">3.2</span>If such an error and/or omission occurs in accordance with clause 3.1, and is not attributable to the negligence and/or wilful misconduct of the Supplier; the Client:</p>
                    <ol class="sub-list">
                        <li>shall not be entitled to treat this Contract as repudiated nor render it invalid; but</li>
                        <li>shall not be responsible for any additional costs incurred by the Supplier arising from the error or omission.</li>
                    </ol>
                </div>
                <div class="term-section">
                    <strong>4. Change in Control</strong>
                    <p class="clause"><span class="num">4.1</span>notice of any proposed change of ownership of the Client and/or any other change in the Client’s details (including but not limited to, changes in the Client’s name, address and contact phone or fax number/s, change of trustees or business practice). The Client shall be liable for any loss incurred by the Supplier as a result of the Client’s failure to comply with this clause.</p>
                </div>
                <div class="term-section">
                    <strong>5. Price and Payment</strong>
                    <p class="clause"><span class="num">5.1</span>At the Supplier's sole discretion the Price shall be either:</p>
                    <ol class="sub-list">
                        <li>as indicated on any invoice provided by the Supplier to the Client; or</li>
                        <li>the Supplier's quoted Price (subject to clause 5.2) which will be valid for the period stated in the quotation or otherwise for a period of thirty (30) days.</li>
                    </ol>
                    <p class="clause"><span class="num">5.2</span>The Supplier reserves the right to change the Price if:</p>
                    <ol class="sub-list">
                        <li>a variation to the Supplier's quotation is requested; or</li>
                        <li>a variation to the Goods which are to be supplied is requested; or</li>
                        <li>in the event of increases to the Supplier in the cost of labour or materials (including but not limited to overseas transactions that may increase as a consequence of variations in foreign currency rates of exchange and/or international freight and insurance charges) which are beyond the Supplier's control.</li>
                    </ol>
                    <p class="clause"><span class="num">5.3</span>Variations will be charged for on the basis of the Supplier’s quotation, and will be detailed in writing, and shown as variations on the Supplier’s invoice. The Client shall be required to respond to any variation submitted by the Supplier within ten (10) working days. Failure to do so will entitle the Supplier to add the cost of the variation to the Price. Payment for all variations must be made in full at the time of their completion.</p>
                    <p class="clause"><span class="num">5.4</span>At the Supplier's sole discretion a reasonable non-refundable deposit may be required.</p>
                    <p class="clause"><span class="num">5.5</span>Time for payment for the Goods being of the essence, the Price will be payable by the Client on the date/s determined by the Supplier, which may be:</p>
                    <ol class="sub-list">
                        <li>before Delivery of the Goods;</li>
                        <li>on completion of the Goods and/or Services;</li>
                        <li>by way of instalments/progress payments in accordance with the Supplier's payment schedule;</li>
                        <li>the date specified on the quote or any invoice or other form as being the date for payment; or</li>
                        <li>failing any notice to the contrary, the date which is seven (7) days following the date of any invoice given to the Client by the Supplier.</li>
                    </ol>
                    <p class="clause"><span class="num">5.6</span>Payment may be made by electronic/on-line banking or by any other method as agreed to between the Client and the Supplier.</p>
                    <p class="clause"><span class="num">5.7</span>The Supplier may in its discretion allocate any payment received from the Client towards any invoice that the Supplier determines and may do so at the time of receipt or at any time afterwards. On any default by the Client the Supplier may re- allocate any payments previously received and allocated. In the absence of any payment allocation by the Supplier, payment will be deemed to be allocated in such manner as preserves the maximum value of the Supplier’s Purchase Money Security Interest (as defined in the PPSA) in the Goods.</p>
                    <p class="clause"><span class="num">5.8</span>The Client shall not be entitled to set off against, or deduct from the Price, any sums owed or claimed to be owed to the Client by the Supplier nor to withhold payment of any invoice because part of that invoice is in dispute.</p>
                    <p class="clause"><span class="num">5.9</span>Unless otherwise stated the Price does not include GST. In addition to the Price, the Client must pay to the Supplier an amount equal to any GST the Supplier must pay for any supply by the Supplier under this or any other contract for the sale of the Goods. The Client must pay GST, without deduction or set off of any other amounts, at the same time and on the same basis as the Client pays the Price. In addition, the Client must pay any other taxes and duties that may be applicable in addition to the Price except where they are expressly included in the Price.</p>
                </div>
                <div class="term-section">
                    <strong>6. Delivery of Goods</strong>
                    <p class="clause"><span class="num">6.1</span>Delivery ("Delivery") of the Goods is taken to occur at the time that:</p>
                    <ol class="sub-list">
                        <li>the Client or the Client's nominated carrier takes possession of the Goods at the Supplier's address; or</li>
                        <li>the Supplier (or the Supplier's nominated carrier) delivers the Goods to the Client's nominated address even if the Client is not present at the address.</li>
                    </ol>
                    <p class="clause"><span class="num">6.2</span>The cost of Delivery is either included in the Price or is in addition to the Price as agreed between the parties.</p>
                    <p class="clause"><span class="num">6.3</span>The Supplier may deliver the Goods in separate instalments. Each separate instalment shall be invoiced and paid in accordance with the provisions in these terms and conditions.</p>
                    <p class="clause"><span class="num">6.4</span>Any time specified by the Supplier for Delivery of the Goods is an estimate only and the Supplier will not be liable for any loss or damage incurred by the Client as a result of Delivery being late. However, both parties agree that they shall make every endeavour to enable the Goods to be delivered at the time and place as was arranged between both parties. In the event that the Supplier is unable to supply the Goods as agreed solely due to any action or inaction of the Client, then the Supplier shall be entitled to charge a reasonable fee for redelivery and/or storage.</p>
                    <strong>7. Risk</strong>
                    <p class="clause"><span class="num">7.1</span>Risk of damage to or loss of the Goods passes to the Client on Delivery and the Client must insure the Goods on or before Delivery.</p>
                    <p class="clause"><span class="num">7.2</span>If any of the Goods are damaged or destroyed following Delivery but prior to ownership passing to the Client, the Supplier is entitled to receive all insurance proceeds payable for the Goods. The production of these terms and conditions by the Supplier is sufficient evidence of the Supplier's rights to receive the insurance proceeds without the need for any person dealing with the Supplier to make further enquiries.</p>
                    <p class="clause"><span class="num">7.3</span>If the Client requests the Supplier to leave Goods outside the Supplier's premises for collection or to deliver the Goods to an unattended location then such Goods shall be left at the Client's sole risk.</p>
                    <p class="clause"><span class="num">7.4</span>All literature, samples, specifications, dimensions, and weights submitted with this quotation are approximate only and the data and descriptions contained in catalogues and other advertising material while being as accurate as possible may not necessarily be identical with products and services the Supplier supplies, and the Supplier reserves the right to supply products that have minor modifications in specifications as the Supplier sees fit.</p>
                    <p class="clause"><span class="num">7.5</span>The descriptions, illustrations and performances contained in catalogues, other advertising material and price lists do not form part of the Contract of sale of the products unless otherwise agreed.</p>
                    <p class="clause"><span class="num">7.6</span>The Supplier will not be held liable for any loss, damage or costs that may be incurred by the Client where the Client has failed to follow the recommendations and/or instructions provided by the manufacturer or Supplier in the correct use and maintenance of the Goods supplied.</p>
                </div>
                <div class="section">
                    <strong>8. Compliance with Laws</strong>
                    <p class="clause"><span class="num">8.1</span>The Client and the Supplier shall comply with the provisions of all statutes, regulations and bylaws of government, local and other public authorities that may be applicable to the Goods and/or use of the Goods.</p>
                    <p class="clause"><span class="num">8.2</span>It shall be the Client's responsibility to ensure that the Goods supplied are installed by a qualified tradesperson.</p>
                </div>
                <div class="term-section">
                    <strong>9. Title</strong>
                    <p class="clause"><span class="num">9.1</span>The Supplier and the Client agree that ownership of the Goods shall not pass until:</p>
                    <ol class="sub-list">
                        <li>the Client has paid the Supplier all amounts owing to the Supplier; and</li>
                        <li>the Client has met all of its other obligations to the Supplier.</li>
                    </ol>
                    <p class="clause"><span class="num">9.2</span>Receipt by the Supplier of any form of payment other than cash shall not be deemed to be payment until that form of payment has been honoured, cleared or recognised.</p>
                    <p class="clause"><span class="num">9.3</span>It is further agreed that until ownership of the Goods passes to the Client in accordance with clause 9.1:</p>
                    <ol class="sub-list">
                        <li>the Client is only a bailee of the Goods and must return the Goods to the Supplier on request;</li>
                        <li>the Client holds the benefit of the Client's insurance of the Goods on trust for the Supplier and must pay to the Supplier the proceeds of any insurance in the event of the Goods being lost, damaged or destroyed;</li>
                        <li>the Client must not sell, dispose, or otherwise part with possession of the Goods other than in the ordinary course of business and for market value. If the Client sells, disposes or parts with possession of the Goods then the Client must hold the proceeds of any such act on trust for the Supplier and must pay or deliver the proceeds to the Supplier on demand;</li>
                        <li>the Client should not convert or process the Goods or intermix them with other goods but if the Client does so then the Client holds the resulting product on trust for the benefit of the Supplier and must sell, dispose of or return the resulting product to the Supplier as it so directs;</li>
                        <li>the Client irrevocably authorises the Supplier to enter any premises where the Supplier believes the Goods are kept and recover possession of the Goods;</li>
                        <li>the Supplier may recover possession of any Goods in transit whether or not Delivery has occurred;</li>
                        <li>the Client shall not charge or grant an encumbrance over the Goods nor grant nor otherwise give away any interest in the Goods while they remain the property of the Supplier; and</li>
                        <li>the Supplier may commence proceedings to recover the Price of the Goods sold notwithstanding that ownership of the Goods has not passed to the Client.</li>
                    </ol>
                </div>
                <div class="term-section">
                    <strong>10. Personal Property Securities Act 1999 ("PPSA")</strong>
                    <p class="clause"><span class="num">10.1</span>Upon assenting to these terms and conditions in writing the Client acknowledges and agrees that:</p>
                    <ol class="sub-list">
                        <li>these terms and conditions constitute a security agreement for the purposes of the PPSA; and</li>
                        <li>a security interest is taken in all Goods that have previously been supplied and that will be supplied in the future by the Supplier to the Client, and the proceeds from such Goods as listed by the Supplier to the Client in invoices rendered from time to time.</li>
                    </ol>
                    <p class="clause"><span class="num">10.2</span>The Client undertakes to:</p>
                    <ol class="sub-list">
                        <li>sign any further documents and/or provide any further information (such information to be complete, accurate and up-to-date in all respects) which the Supplier may reasonably require to register a financing statement or financing change statement on the Personal Property Securities Register;</li>
                        <li>indemnify, and upon demand reimburse, the Supplier for all expenses incurred in registering a financing statement or financing change statement on the Personal Property Securities Register or releasing any Goods charged thereby;</li>
                        <li>not register, or permit to be registered, a financing statement or a financing change statement in relation to the Goods or the proceeds of such Goods in favour of a third party without the prior written consent of the Supplier; and</li>
                        <li>immediately advise the Supplier of any material change in its business practices of selling the Goods which would result in a change in the nature of proceeds derived from such sales.</li>
                    </ol>
                    <p class="clause"><span class="num">10.3</span>Unless otherwise agreed to in writing by the Supplier, the Client waives its right to receive a verification statement in accordance with section 148 of the PPSA.</p>
                    <p class="clause"><span class="num">10.4</span>The Client shall unconditionally ratify any actions taken by the Supplier under clauses 10.1 to 10.3.</p>
                    <p class="clause"><span class="num">10.5</span>Subject to any express provisions to the contrary (including those contained in this clause 10), nothing in these terms and conditions is intended to have the effect of contracting out of any of the provisions of the PPSA.</p>
                </div>
                <div class="term-section">
                    <strong>11. Security and Charge</strong>
                    <p class="clause"><span class="num">11.1</span>In consideration of the Supplier agreeing to supply the Goods, the Client charges all of its rights, title and interest (whether joint or several) in any land, realty or other assets capable of being charged, owned by the Client either now or in the future and the Client grants a security interest in all of its present and after-acquired property, to secure the performance by the Client of its obligations under these terms and conditions (including, but not limited to, the payment of any money). The terms of the charge and security interest are the terms of Memorandum 2018/4344 registered pursuant to s 209 of the Land Transfer Act 2017.</p>
                    <p class="clause"><span class="num">11.2</span>The Client indemnifies the Supplier from and against all the Supplier's costs and disbursements including legal costs on a solicitor and own client basis incurred in exercising the Supplier's rights under this clause.</p>
                    <p class="clause"><span class="num">11.3</span>The Client irrevocably appoints the Supplier and each director of the Supplier as the Client's true and lawful attorney/s to perform all necessary acts to give effect to the provisions of this clause 11 including, but not limited to, signing any document on the Client's behalf.</p>
                </div>
                <div class="term-section">
                    <strong>12. Defects and Returns</strong>
                    <p class="clause"><span class="num">12.1</span>The Client shall inspect the Goods on Delivery and shall within seven (7) days of Delivery (time being of the essence) notify the Supplier of any alleged defect, shortage in quantity, damage or failure to comply with the description or quote. The Client shall afford the Supplier an opportunity to inspect the Goods within a reasonable time following Delivery if the Client believes the Goods are defective in any way. If the Client fails to comply with these provisions the Goods shall be presumed to be free from any defect or damage. For defective Goods, which the Supplier has agreed in writing that the Client is entitled to reject, the Supplier's liability is limited to either (at the Supplier's discretion) replacing the Goods or repairing the Goods.</p>
                    <p class="clause"><span class="num">12.2</span>Goods will not be accepted for return other than in accordance with 12.1 above, and provided that:</p>
                    <ol class="sub-list">
                        <li>the Supplier has agreed in writing to accept the return of the Goods; and</li>
                        <li>the Goods are returned at the Client's cost within seven (7) days of the Delivery date; and</li>
                        <li>the Supplier will not be liable for Goods which have not been stored or used in a proper manner; and</li>
                        <li>the Goods are returned in the condition in which they were delivered and with all packaging material, brochures, and instruction material in as new condition as is reasonably possible in the circumstances.</li>
                    </ol>
                    <p class="clause"><span class="num">12.3</span>If the Supplier accepts that the Client is entitled to reject the Goods following their return pursuant to clause 12.2(b) the Supplier will reimburse the Client's actual and reasonable costs of return Delivery.</p>
                    <p class="clause"><span class="num">12.4</span>The Supplier may (in its discretion) accept the return of Goods for credit but this may incur a handling fee of twenty-five percent (25%) of the value of the returned Goods plus any freight.</p>
                    <p class="clause"><span class="num">12.5</span>Subject to clause 12.1, non-stocklist items or Goods made to the Client's specifications are not acceptable for credit or return.</p>
                </div>
                <div class="term-section">
                    <strong>13. Warranty</strong>
                    <p class="clause"><span class="num">13.1</span>For Goods not manufactured by the Supplier, the warranty shall be the current warranty provided by the manufacturer of the Goods. The Supplier shall not be bound by nor be responsible for any term, condition, representation or warranty other than that which is given by the manufacturer of the Goods.</p>
                </div>
                <div class="section">
                    <strong>14. Consumer Guarantees Act 1993 and the Fair Trading Act 1986</strong>
                    <p class="clause"><span class="num">14.1</span>If the Client is acquiring Goods for the purposes of a trade or business, the Client acknowledges that the provisions of the Consumer Guarantees Act 1993 (CGA) do not apply to the supply of Goods by the Supplier to the Client.</p>
                    <p class="clause"><span class="num">14.2</span>The Supplier agrees to abide by the provisions of the Fair Trading Act ("FTA").</p>
                </div>
                <div class="term-section">
                    <strong>15. Intellectual Property</strong>
                    <p class="clause"><span class="num">15.1</span>Where the Supplier has designed, drawn or developed Goods for the Client, then the copyright in any designs and drawings and documents shall remain the property of the Supplier. Under no circumstances may such designs, drawings and documents be used without the express written approval of the Supplier.</p>
                    <p class="clause"><span class="num">15.2</span>The Client warrants that all designs, specifications or instructions given to the Supplier will not cause the Supplier to infringe any patent, registered design or trademark in the execution of the Client's order and the Client agrees to indemnify the Supplier against any action taken by a third party against the Supplier in respect of any such infringement.</p>
                    <p class="clause"><span class="num">15.3</span>The Client agrees that the Supplier may (at no cost) use for the purposes of marketing or entry into any competition, any documents, designs, drawings or Goods which the Supplier has created for the Client.</p>
                </div>
                <div class="term-section">
                    <strong>16. Default and Consequences of Default</strong>
                    <p class="clause"><span class="num">16.1</span>Interest on overdue invoices shall accrue daily from the date when payment becomes due, until the date of payment, at a rate of two and a half percent (2.5%) per calendar month (and at the Supplier's sole discretion such interest shall compound monthly at such a rate) after as well as before any judgment.</p>
                    <p class="clause"><span class="num">16.2</span>If the Client owes the Supplier any money the Client shall indemnify the Supplier from and against all costs and disbursements incurred by the Supplier in recovering the debt (including but not limited to internal administration fees, legal costs on a solicitor and own client basis, the Supplier's collection agency costs, and bank dishonour fees).</p>
                    <p class="clause"><span class="num">16.3</span>Further to any other rights or remedies the Supplier may have under this Contract, if a Client has made payment to the Supplier, and the transaction is subsequently reversed, the Client shall be liable for the amount of the reversed transaction, in addition to any further costs incurred by the Supplier under this clause 16 where it can be proven that such reversal is found to be illegal, fraudulent or in contravention to the Client's obligations under this Contract.</p>
                    <p class="clause"><span class="num">16.4</span>Without prejudice to the Supplier's other remedies at law the Supplier shall be entitled to cancel all or any part of any order of the Client which remains unfulfilled and all amounts owing to the Supplier shall, whether or not due for payment, become immediately payable if:</p>
                    <ol class="sub-list">
                        <li>any money payable to the Supplier becomes overdue, or in the Supplier's opinion the Client will be unable to make a payment when it falls due;</li>
                        <li>the Client has exceeded any applicable credit limit provided by the Supplier;</li>
                        <li>the Client becomes insolvent, convenes a meeting with its creditors or proposes or enters into an arrangement with creditors, or makes an assignment for the benefit of its creditors; or</li>
                        <li>a receiver, manager, liquidator (provisional or otherwise) or similar person is appointed in respect of the Client or any asset of the Client.</li>
                    </ol>
                </div>
                <div class="term-section">
                    <strong>17. Cancellation</strong>
                    <p class="clause"><span class="num">17.1</span>Without prejudice to any other remedies the parties may have, if at any time either party is in breach of any obligation (including those relating to payment) under these terms and conditions the other party may suspend or terminate the supply of purchase of Goods to the other party. Neither party will be liable for any loss or damage the other party suffers because one of the parties has exercised its rights under this clause.</p>
                    <p class="clause"><span class="num">17.2</span>If the Supplier, due to reasons beyond the Supplier's reasonable control, is unable to deliver any Goods to the Client, the Supplier may cancel any Contract to which these terms and conditions apply or cancel Delivery of Goods at any time before the Goods are delivered by giving written notice to the Client. On giving such notice the Supplier shall repay to the Client any money paid by the Client for the Goods. The Supplier shall not be liable for any loss or damage whatsoever arising from such cancellation.</p>
                    <p class="clause"><span class="num">17.3</span>The Client may cancel Delivery of the Goods and/or Services by written notice served within twenty-four (24) hours of placement of the order. Failure by the Client to otherwise accept Delivery of the Goods and/or Services shall place the Client in breach of this Contract.</p>
                    <p class="clause"><span class="num">17.4</span>Cancellation of orders for Goods made to the Client's specifications, or for non-stocklist items, will definitely not be accepted once production has commenced, or an order has been placed.</p>
                </div>
                <div class="term-section">
                    <strong>18. Privacy Policy</strong>
                    <p class="clause"><span class="num">18.1</span>All emails, documents, images or other recorded information held or used by the Supplier is "Personal Information" as defined and referred to in clause 18.3 and therefore considered confidential. The Supplier acknowledges its obligation in relation to the handling, use, disclosure and processing of Personal Information pursuant to the Privacy Act 2020 ("The Act") including Part II of the OECD Guidelines as set out in the Act. The Supplier acknowledges that in the event it becomes aware of any data breaches and/or disclosure of the Client's Personal Information, held by the Supplier that may result in serious harm to the Client, the Supplier will notify the Client in accordance with the Act. Any release of such Personal Information must be in accordance with the Act and must be approved by the Client by written consent, unless subject to an operation of law.</p>
                    <p class="clause"><span class="num">18.2</span>Notwithstanding clause 18.1, privacy limitations will extend to the Supplier in respect of Cookies where the Client utilises the Supplier's website to make enquiries. The Supplier agrees to display reference to such Cookies and/or similar tracking technologies, such as pixels and web beacons (if applicable), such technology allows the collection of Personal Information such as the Client's:</p>
                    <ol class="sub-list">
                        <li>IP address, browser, email client type and other similar details;</li>
                        <li>tracking website usage and traffic; and</li>
                        <li>reports are available to the Supplier when the Supplier sends an email to the Client, so the Supplier may collect and review that information collectively ("Personal Information").</li>
                    </ol>
                    <p class="clause">If the Client consents to the Supplier's use of Cookies on the Supplier's website and later wishes to withdraw that consent, the Client may manage and control the Supplier's privacy controls via the Client's web browser, including removing Cookies by deleting them from the browser history when exiting the site.</p>
                    <p class="clause"><span class="num">18.3</span>The Client authorises the Supplier or Supplier's agent to:</p>
                    <ol class="sub-list">
                        <li>access, collect, retain and use any information about the Client;
                            <ol class="sub-sub-list">
                                <li>(including, name, address, D.O.B., occupation, driver's license details, electronic contact (email, Facebook or Twitter details), medical insurance details or next of kin and other contact information (where applicable), previous credit applications, credit history or any overdue fines balance information held by the Ministry of Justice) for the purpose of assessing the creditworthiness of the Client; or</li>
                                <li>for the purpose of marketing products and services to the Client.</li>
                            </ol>
                        </li>
                        <li>disclose information about the Client, whether collected by the Supplier from the Client directly or obtained by the Supplier from any other source, to any other credit provider or any credit reporting agency for the purposes of providing or obtaining a credit reference, debt collection or notifying a default by the Client.</li>
                    </ol>
                    <p class="clause"><span class="num">18.4</span>Where the Client is an individual the authorities under clause 18.3 are authorities or consents for the purposes of the Privacy Act 2020.</p>
                    <p class="clause"><span class="num">18.5</span>The Client shall have the right to request (by e-mail) from the Supplier, a copy of the Personal Information about the Client retained by the Supplier and the right to request that the Supplier correct any incorrect Personal Information.</p>
                    <p class="clause"><span class="num">18.6</span>The Supplier will destroy Personal Information upon the Client's request (by e-mail) or if it is no longer required unless it is required in order to fulfil the obligations of this Contract or is required to be maintained and/or stored in accordance with the law.</p>
                    <p class="clause"><span class="num">18.7</span>The Client can make a privacy complaint by contacting the Supplier via e-mail. The Supplier will respond to that complaint within seven (7) days of receipt and will take all reasonable steps to make a decision as to the complaint within twenty (20) days of receipt of the complaint. In the event that the Client is not satisfied with the resolution provided, the Client can make a complaint to the Privacy Commissioner at http://www.privacy.org.nz.</p>
                </div>
                <div class="term-section">
                    <strong>19. Service of Notices</strong>
                    <p class="clause"><span class="num">19.1</span>Any written notice given under this Contract shall be deemed to have been given and received:</p>
                    <ol class="sub-list">
                        <li>by handing the notice to the other party, in person;</li>
                        <li>by leaving it at the address of the other party as stated in this Contract;</li>
                        <li>by sending it by registered post to the address of the other party as stated in this Contract;</li>
                        <li>if sent by facsimile transmission to the fax number of the other party as stated in this Contract (if any), on receipt of confirmation of the transmission;</li>
                        <li>if sent by email to the other party's last known email address.</li>
                    </ol>
                    <p class="clause"><span class="num">19.2</span>Any notice that is posted shall be deemed to have been served, unless the contrary is shown, at the time when by the ordinary course of post, the notice would have been delivered.</p>
                </div>
                <div class="term-section">
                    <strong>20. Trusts</strong>
                    <p class="clause"><span class="num">20.1</span>If the Client at any time upon or subsequent to entering in to the Contract is acting in the capacity of trustee of any trust or as an agent for a trust (“Trust”) then whether or not the Supplier may have notice of the Trust, the Client covenants with the Supplier as follows:</p>
                    <ol class="sub-list">
                        <li>the Contract extends to all rights of indemnity which the Client now or subsequently may have against the Trust, the trustees and the trust fund;</li>
                        <li>the Client has full and complete power and authority under the Trust or from the Trustees of the Trust as the case maybe to enter into the Contract and the provisions of the Trust do not purport to exclude or take away the right of indemnity of the Client against the Trust, the trustees and the trust fund. The Client will not release the right of indemnity or commit any breach of trust or be a party to any other action which might prejudice that right of indemnity;</li>
                        <li>the Client will not during the term of the Contract without consent in writing of the Supplier (the Supplier will not unreasonably withhold consent), cause, permit, or suffer to happen any of the following events:</li>
                            <ol class="sub-sub-list">
                                <li>the removal, replacement or retirement of the Client as trustee of the Trust;</li>
                                <li>any alteration to or variation of the terms of the Trust;</li>
                                <li>any advancement or distribution of capital of the Trust; or</li>
                                <li>any resettlement of the trust fund or trust property.</li>
                            </ol>
                        </li>
                    </ol>
                </div>
                <div class="term-section">
                    <strong>21. General</strong>
                    <p class="clause"><span class="num">21.1</span>The failure by either party to enforce any provision of these terms and conditions shall not be treated as a waiver of that provision, nor shall it affect that party's right to subsequently enforce that provision. If any provision of these terms and conditions shall be invalid, void, illegal or unenforceable the validity, existence, legality and enforceability of the remaining provisions shall not be affected, prejudiced or impaired.</p>
                    <p class="clause"><span class="num">21.2</span>These terms and conditions and any Contract to which they apply shall be governed by the laws of New Zealand and are subject to the jurisdiction of the courts of New Zealand.</p>
                    <p class="clause"><span class="num">21.3</span>Subject to the CGA, the liability of the Supplier and the Client under this Contract shall be limited to the Price.</p>
                    <p class="clause"><span class="num">21.4</span>The Supplier may licence and/or assign all or any part of its rights and/or obligations under this Contract without the Client's consent provided the assignment does not cause detriment to the Client.</p>
                    <p class="clause"><span class="num">21.5</span>The Client cannot licence or assign without the written approval of the Supplier.</p>
                    <p class="clause"><span class="num">21.6</span>The Supplier may elect to subcontract out any part of the Services but shall not be relieved from any liability or obligation under this Contract by so doing. Furthermore, the Client agrees and understands that they have no authority to give any instruction to any of the Supplier's sub-contractors without the authority of Supplier.</p>
                    <p class="clause"><span class="num">21.7</span>The Client agrees that the Supplier may amend their general terms and conditions for subsequent future Contracts with the Client by disclosing such to the Client in writing. These changes shall be deemed to take effect from the date on which the Client accepts such changes, or otherwise at such time as the Client makes a further request for the Supplier to provide Goods to the Client.</p>
                    <p class="clause"><span class="num">21.8</span>Neither party shall be liable for any default due to any act of God, war, terrorism, strike, lock-out, industrial action, fire, flood, storm, national or global pandemics and/or the implementation of regulation, directions, rules or measures being enforced by Governments or embargo, including but not limited to, any Government imposed border lockdowns (including, worldwide destination ports), etc, ("Force Majeure") or other event beyond the reasonable control of either party. This clause does not apply to a failure by the Client to make any payment due to the Supplier, following cessation of a Force Majeure.</p>
                    <p class="clause"><span class="num">21.9</span>Both parties warrant that they have the power to enter into this Contract and have obtained all necessary authorisations to allow them to do so, they are not insolvent and that this Contract creates binding and valid legal obligations on them.</p>
                </div>
            </div>
        </div>
        
        <div class="form-row">
        <input type="checkbox" id="accept_terms" name="accept_terms" value="1" {{ old('accept_terms') ? 'checked' : '' }} required>
            @error('accept_terms')
                <div class="text-danger">{{ $message }}</div>
            @enderror
             <label for="accept_terms" style="display:inline; margin-left: 10px;">I/We confirm I/We have read, understood, and accept the terms of this Guarantee and Indemnity, and I/We agree to be bound by this Guarantee and Indemnity.</label>
        </div>
        <button type="submit" class="submit-btn">Submit Application</button>
    </form>

    <script>
        document.getElementById('num_directors').addEventListener('change', function () {
            const container = document.getElementById('directors-container');
            const template = document.getElementById('director-template').content;
            container.innerHTML = '';
            const count = parseInt(this.value);
            for (let i = 1; i <= count; i++) {
                const clone = document.importNode(template, true);
                clone.querySelector('.director-number').innerText = i;
                clone.querySelector('.dir_name').name = `dir${i}_name`;
                clone.querySelector('.dir_dob').name = `dir${i}_dob`;
                clone.querySelector('.dir_mobile').name = `dir${i}_mobile`;
                clone.querySelector('.dir_address').name = `dir${i}_address`;
                clone.querySelector('.dir_dl').name = `dir${i}_dl`;
                clone.querySelector('.dir_pc').name = `dir${i}_pc`;
                container.appendChild(clone);
            }
        });

        // Popup functions
        function showSuccessPopup() {
            document.getElementById('successPopup').classList.add('show');
        }

        function closePopup() {
            document.getElementById('successPopup').classList.remove('show');
        }

        // Form submission handler
        document.querySelector('form').addEventListener('submit', function(e) {
            // Only show popup if form is valid (no errors)
            // The form will redirect after showing success message
            const hasErrors = document.querySelector('.alert-danger') !== null;
            if (!hasErrors && this.method === 'POST') {
                // Show popup on successful submission
                setTimeout(() => {
                    showSuccessPopup();
                }, 500);
            }
        });

        // Close popup when clicking outside
        document.getElementById('successPopup').addEventListener('click', function(e) {
            if (e.target === this) {
                closePopup();
            }
        });
    </script>
    <script>
        function initAddressAutocomplete(inputId, listId, dpidId, postcodeName) {
            let timer = null;
            let activeIndex = -1;

            const input = document.getElementById(inputId);
            const list  = document.getElementById(listId);
            const wrapper = input.closest('.address-wrapper');

            input.addEventListener('keyup', function (e) {
                const query = this.value.trim();
                clearTimeout(timer);

                // Keyboard navigation
                const items = list.querySelectorAll('li');
                if (items.length) {
                    if (e.key === 'ArrowDown') {
                        activeIndex = (activeIndex + 1) % items.length;
                        updateActive(items);
                        return;
                    }
                    if (e.key === 'ArrowUp') {
                        activeIndex = (activeIndex - 1 + items.length) % items.length;
                        updateActive(items);
                        return;
                    }
                    if (e.key === 'Enter' && activeIndex >= 0) {
                        items[activeIndex].click();
                        return;
                    }
                }

                if (query.length < 3) {
                    list.innerHTML = '';
                    return;
                }

                timer = setTimeout(() => {
                    fetch(`{{ route('address.suggest') }}?q=${encodeURIComponent(query)}`)
                        .then(res => res.json())
                        .then(data => {
                            list.innerHTML = '';
                            activeIndex = -1;

                            if (!data.success || !data.addresses?.length) return;

                            data.addresses.forEach(addr => {
                                const li = document.createElement('li');
                                li.textContent = addr.FullAddress;

                                li.addEventListener('click', function(e) {
                                    e.stopPropagation();
                                    input.value = addr.FullAddress;
                                    document.getElementById(dpidId).value = addr.FullAddress;

                                    // 🔥 Auto-fill postcode (NZ = 4 digits)
                                    const postcode = addr.FullAddress.match(/\b\d{4}\b/);
                                    if (postcode && postcodeName) {
                                        document.querySelector(`input[name="${postcodeName}"]`).value = postcode[0];
                                    }

                                    list.innerHTML = '';
                                }, {once: true});

                                list.appendChild(li);
                            });
                        })
                        .catch(() => list.innerHTML = '');
                }, 400);
            });

            function updateActive(items) {
                items.forEach(i => i.classList.remove('active'));
                if (items[activeIndex]) {
                    items[activeIndex].classList.add('active');
                    items[activeIndex].scrollIntoView({ block: 'nearest' });
                }
            }

            document.addEventListener('click', function (e) {
                if (wrapper && !wrapper.contains(e.target)) {
                    list.innerHTML = '';
                }
            });
        }
    </script>
    <script>
        initAddressAutocomplete(
            'address_input',
            'address_suggestions',
            'physical_address_dpid',
            'postcode_phy'
        );

        initAddressAutocomplete(
            'billing_address_input',
            'billing_address_suggestions',
            'billing_address_dpid',
            'postcode_bill'
        );

        initAddressAutocomplete(
            'g1_address_input',
            'g1_address_suggestions',
            'g1_address_dpid',
            null
        );

        initAddressAutocomplete(
            'g2_address_input',
            'g2_address_suggestions',
            'g2_address_dpid',
            null
        );

        initAddressAutocomplete(
            'g1_witness_addr_input',
            'g1_witness_addr_suggestions',
            'g1_witness_addr_dpid',
            null
        );

        initAddressAutocomplete(
            'g2_witness_addr_input',
            'g2_witness_addr_suggestions',
            'g2_witness_addr_dpid',
            null
        );  
    </script>

    {{-- <script>
        let timer = null;
        let activeIndex = -1;

        const input = document.getElementById('address_input');
        const list  = document.getElementById('address_suggestions');
        input.addEventListener('keyup', function (e) {
            const query = this.value.trim();
            clearTimeout(timer);
            // Keyboard navigation
            const items = list.querySelectorAll('li');
            if (items.length) {
                if (e.key === 'ArrowDown') {
                    activeIndex = (activeIndex + 1) % items.length;
                    updateActive(items);
                    return;
                }
                if (e.key === 'ArrowUp') {
                    activeIndex = (activeIndex - 1 + items.length) % items.length;
                    updateActive(items);
                    return;
                }
                if (e.key === 'Enter' && activeIndex >= 0) {
                    items[activeIndex].click();
                    return;
                }
            }
            if (query.length < 3) {
                list.innerHTML = '';
                return;
            }
            timer = setTimeout(() => {
                fetch(`{{ route('address.suggest') }}?q=${encodeURIComponent(query)}`)
                    .then(res => res.json())
                    .then(data => {
                        list.innerHTML = '';
                        activeIndex = -1;
                        if (!data.success || !data.addresses?.length) return;
                        data.addresses.forEach(addr => {
                            const li = document.createElement('li');
                            li.textContent = addr.FullAddress;
                            li.onclick = () => {
                                input.value = addr.FullAddress;
                                document.getElementById('physical_address').value = addr.DPID;
                                // 🔥 Auto-fill postcode (NZ = 4 digits)
                                const postcode = addr.FullAddress.match(/\b\d{4}\b/);
                                if (postcode) {
                                    document.querySelector('input[name="postcode_phy"]').value = postcode[0];
                                }
                                list.innerHTML = '';
                            };
                            list.appendChild(li);
                        });
                    })
                    .catch(() => list.innerHTML = '');
            }, 400);
        });
        // Highlight active item
        function updateActive(items) {
            items.forEach(i => i.classList.remove('active'));
            if (items[activeIndex]) {
                items[activeIndex].classList.add('active');
                items[activeIndex].scrollIntoView({ block: 'nearest' });
            }
        }
        // Close dropdown on outside click
        document.addEventListener('click', function (e) {
            if (!e.target.closest('.address-wrapper')) {
                list.innerHTML = '';
            }
        });
    </script> --}}

</div>

</x-front-guest-layout>
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
            padding: 40px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            border-top: 5px solid var(--primary-color);
        }

        /* Header Styles */
        header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 30px;
            border-bottom: 2px solid var(--border-color);
            padding-bottom: 20px;
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
            font-size: 13px;
        }

        h2 {
            background-color: var(--text-dark);
            color: white;
            padding: 10px;
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
        }

        label {
            display: block;
            font-weight: 600;
            font-size: 13px;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="date"],
        input[type="number"],
        input[type="tel"],
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box; /* Ensures padding doesn't affect width */
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
        }

        th {
            background-color: var(--bg-light);
            font-size: 13px;
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
            font-size: 13px;
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
            font-size: 14px;
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

        @media (max-width: 600px) {
            header { flex-direction: column; text-align: center; }
            .company-info { text-align: center; margin-top: 10px; width: 100%; }
            .form-row { flex-direction: column; }
            .signature-row { flex-direction: column; gap: 0; }
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
            Email: contact@flinkglobal.com<br>
            Web: www.flinkglobal.com
        </div>
    </header>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
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
            <div class="form-group">
                <label>Physical Address:<span style="color: red;">*</span></label>
                <input type="text" name="physical_address" value="{{ old('physical_address')}}" class="@error('physical_address') error @enderror">
                 @error('physical_address') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group" style="flex: 0 0 100px;">
                <label>Postcode:<span style="color: red;">*</span></label>
                <input type="text" name="postcode_phy" value="{{old('postcode_phy')}}" class="@error('postcode_phy') error @enderror">
                 @error('postcode_phy') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="form-row">
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
        </div>
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
                <input 
                    type="tel" 
                    name="mobile"
                    placeholder="21 123 4567"
                    pattern="[0-9]{7,10}"
                    value="{{old('mobile')}}" class="@error('mobile') error @enderror"
                >
                 @error('mobile') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
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
                <input type="text" name="principal_place_of_business_is" value="{{old('principal_place_of_business_is')}}" class="@error('principal_place_of_business_is') error @enderror">
                 @error('principal_place_of_business_is') <span class="text-danger">{{ $message }}</span> @enderror
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
                <input type="number" name="num_directors" id="num_directors" min="1" max="10" value="{{ old('num_directors') }}" class="@error('num_directors') error @enderror">
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
                    <input type="text" class="dir_name" name="">
                </div>
                <div class="form-group">
                    <label>D.O.B:<span style="color: red;">*</span></label>
                    <input type="text" class="dir_dob" name="" placeholder="dd/mm/yyyy" pattern="\d{2}/\d{2}/\d{4}">
                </div>
                <div class="form-group">
                    <label>Mobile No:<span style="color: red;">*</span></label>
                    <input type="tel" class="dir_mobile" name="">
                </div>
                
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label>Private Address:<span style="color: red;">*</span></label>
                    <input type="text" class="dir_address" name="">
                </div>
                <div class="form-group">
                    <label>Driver's Licence:<span style="color: red;">*</span></label>
                    <input type="text" class="dir_dl" name="">
                </div>
                <div class="form-group" style="flex: 0 0 100px;">
                    <label>Post Code:<span style="color: red;">*</span></label>
                    <input type="text" class="dir_pc" name="">
                </div>
            </div>
        </template>

        <!-- SECTION 4: PAYMENT TERMS -->
        <h2>Account Payment Terms</h2>
        <div class="form-row">
            <div class="form-group">
                <label>Purchase Order Required? <span style="color: red;">*</span></label>
                <select name="po_required" class="@error('po_required') error @enderror">
                    <option value="Yes{{ old('po_required') == 'Yes' ? 'selected' : '' }}">Yes</option>
                    <option value="No {{ old('accounts_email_opt') == 'Yes' ? 'selected' : '' }}">No</option>
                </select>
            </div>
            <div class="form-group">
                <label>Accounts to be emailed? <span style="color: red;">*</span></label>
                <select name="accounts_email_opt" class="@error('accounts_email_opt') error @enderror">
                    <option value="Yes {{ old('accounts_email_opt') == 'Yes' ? 'selected' : '' }}">Yes</option>
                    <option value="No {{ old('accounts_email_opt') == 'Yes' ? 'selected' : '' }}">No</option>
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
                <input type="tel" name="accounts_mobile" value="{{old("accounts_mobile")}}" class="@error('accounts_mobile') error @enderror">
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
                    <th style="width: 30%;">Name</th>
                    <th style="width: 40%;">Company Name/ Address</th>
                    <th style="width: 30%;">Mobile No/ Email</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="text" name="ref1_name"></td>
                    <td><input type="text" name="ref1_company"></td>
                    <td><input type="text" name="ref1_contact"></td>
                </tr>
                <tr>
                    <td><input type="text" name="ref2_name"></td>
                    <td><input type="text" name="ref2_company"></td>
                    <td><input type="text" name="ref2_contact"></td>
                </tr>
                <tr>
                    <td><input type="text" name="ref3_name"></td>
                    <td><input type="text" name="ref3_company"></td>
                    <td><input type="text" name="ref3_contact"></td>
                </tr>
            </tbody>
        </table>

        <div class="declaration">
            <p>I certify that the above information is true and correct and that I accept the supply of credit by the Supplier.</p>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>SIGNED (CLIENT) Name:</label>
                <input type="text" name="sing_client_name" value="{{ old("sing_client_name") }}" class="@error('sing_client_name') error @enderror">
                 @error('sing_client_name') <span class="text-danger">{{ $message }}</span> @enderror   
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
                <h1>Personal/Directors Guarantee and Indemnity</h1>
                <div class="legal-text">
                <p><strong>IN CONSIDERATION</strong> of Flinkglobal Limited T/A FlinkTech and its successors and assigns </p>
                <p><strong>I/WE (the "Guarantor/s") UNCONDITIONALLY AND IRREVOCABLY:</strong></p>
                <p style="text-align: center; font-weight: bold;">
                    For and on behalf of the Client I/We confirm I/We have read, understood, and accept the terms of this Guarantee and Indemnity. [cite: 336]
                </p>
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
                <input type="text" name="g1_address" value="{{old('g1_address')}}" class="@error('g1_address') error @enderror">
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
                <input type="text" name="g1_witness_addr" value="{{old('g1_witness_addr')}}" class="@error('g1_witness_addr') error @enderror">
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
                <input type="text" name="g2_address" value="{{old('g2_address')}}" class="@error('g2_address') error @enderror">
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
                <input type="text" name="g2_witness_addr" value="{{old('g2_witness_addr')}}" class="@error('g2_witness_addr') error @enderror">
                 @error('g2_witness_addr') <span class="text-danger">{{ $message }}</span> @enderror

            </div>
            <div class="notes">
                <strong>Notes:</strong><br>
                1. If the Client is a proprietary limited company, the Guarantor(s) must be the director(s).<br>
              </div>
        </div>

        <!-- PAGE 3: TERMS AND CONDITIONS -->
        <h2>Terms & Conditions of Trade</h2>
        <p>Please scroll to read the full Terms and Conditions.</p>
        <div class="terms-box">
            <h3>1. Definitions</h3>
            <p>1.1 “Client” means the person/s, entities or any person acting on behalf of and with the authority of the Client requesting the Supplier to provide the Services as specified in any proposal, quotation, order, invoice or other documentation.</p>
            <h3>2. Acceptance</h3>            
            <h3>9. Title</h3>
            
            <h3>11. Security and Charge</h3>
            
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
        // Director Details Dynamic Generation
        const numDirectorsInput = document.getElementById('num_directors');
        const directorsContainer = document.getElementById('directors-container');
        const directorTemplate = document.getElementById('director-template');

        numDirectorsInput.addEventListener('input', function() {
            const numDirectors = parseInt(this.value) || 0;
            directorsContainer.innerHTML = ''; // Clear existing directors

            if (numDirectors > 0) {
                for (let i = 1; i <= numDirectors; i++) {
                    // Clone the template
                    const clone = directorTemplate.content.cloneNode(true);
                    
                    // Update director number
                    clone.querySelector('.director-number').textContent = i;
                    
                    // Update input names
                    clone.querySelector('.dir_name').name = `dir${i}_name`;
                    clone.querySelector('.dir_dob').name = `dir${i}_name`;
                    clone.querySelector('.dir_mobile').name = `dir${i}_mobile`;
                    clone.querySelector('.dir_dl').name = `dir${i}_dl`;
                    clone.querySelector('.dir_address').name = `dir${i}_address`;
                    clone.querySelector('.dir_pc').name = `dir${i}_pc`;
                    
                    // Append to container
                    directorsContainer.appendChild(clone);
                }
            }
        });

        // Trigger on page load in case a value was pre-filled
        window.addEventListener('DOMContentLoaded', function() {
            if (numDirectorsInput.value) {
                numDirectorsInput.dispatchEvent(new Event('input'));
            }
        });
    </script>
</div>

</x-front-guest-layout>
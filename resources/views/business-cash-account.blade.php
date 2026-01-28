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
            font-size: 12px;
        }

        h2 {
            background-color: var(--text-dark);
            color: white;
            padding: 5px;
            font-size: 18px;
            /* margin-top: 30px; */
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
    <h1 style="text-align: center; font-size: 24px;">Business - Cash Account Application</h1>
    <p style="text-align: center; font-size: 14px;">Please complete all sections and read the Terms and Conditions of Trade.</p>
    <form action="{{ route('cash.account.store') }}" method="POST">
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

        <div class="declaration">
            <p>I certify that the above information is true and correct and that I accept the supply of credit by the Supplier (if applicable). I have read and understood the TERMS AND CONDITIONS OF TRADE (under mentioned) of Flinkglobal Limited T/A FlinkTech which form part of and are intended to be read in conjunction with this Cash account application and agree to be bound by these conditions. I authorise the use of my personal information as detailed in the Privacy Act clause therein.</p>
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
    </script>
</div>

</x-front-guest-layout>
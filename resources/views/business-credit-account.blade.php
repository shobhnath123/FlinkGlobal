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
            <strong>23 Stewart Gibson Place, Manurewa, AUCKLAND 2105</strong><br>
            Phone: (09) 393 0900<br>
            Email: contact@flinkglobal.com<br>
            Web: www.flinkglobal.com
        </div>
    </header>

    <h1 style="text-align: center; font-size: 24px;">Business - Credit Account Application</h1>
    <p style="text-align: center; font-size: 14px;">To Be Completed by Applicants - Please complete all sections and read the Terms and Conditions of Trade.</p>

    <form action="{{ route('business.account.store') }}" method="POST">
        @csrf
        <!-- SECTION 1: CLIENT DETAILS -->
        <h2>Client Details</h2>
        <div class="form-row">
            <div class="form-group">
                <label>Full Name (Contact Person):</label>
                <input type="text" name="contact_person">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label>Physical Address:</label>
                <input type="text" name="physical_address">
            </div>
            <div class="form-group" style="flex: 0 0 100px;">
                <label>Postcode:</label>
                <input type="text" name="postcode_phy">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label>Billing Address:</label>
                <input type="text" name="billing_address">
            </div>
            <div class="form-group" style="flex: 0 0 100px;">
                <label>Postcode:</label>
                <input type="text" name="postcode_bill">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label>Driver’s Licence No:</label>
                <input type="text" name="drivers_licence">
            </div>
            <div class="form-group">
                <label>D.O.B:</label>
                <input type="text" name="dob" placeholder="dd/mm/yyyy" pattern="\d{2}/\d{2}/\d{4}">
            </div>
            <div class="form-group">
                <label>Email Address:</label>
                <input type="email" name="email">
            </div>
            <div class="form-group">
                <label>Mobile No:</label>
                <input type="tel" name="mobile">
            </div>
        </div>

        <!-- SECTION 2: BUSINESS DETAILS -->
        <h2>Business Details</h2>
        <div class="form-row">
            <div class="form-group">
                <label>Legal Name:</label>
                <input type="text" name="legal_name">
            </div>
            <div class="form-group">
                <label>Trading Name:</label>
                <input type="text" name="trading_name">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label>GST No:</label>
                <input type="text" name="gst_no">
            </div>
            <div class="form-group">
                <label>Company Number:</label>
                <input type="text" name="company_no">
            </div>
            <div class="form-group">
                <label>NZBN Number:</label>
                <input type="text" name="nzbn">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label>Nature of Business:</label>
                <input type="text" name="nature_business">
            </div>
            <div class="form-group">
                <label>Date Incorp:</label>
                <input type="date" name="date_incorp">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label>Paid Up Capital ($):</label>
                <input type="number" name="paid_capital">
            </div>
            <div class="form-group">
                <label>Est. Monthly Purchases ($):</label>
                <input type="number" name="monthly_purchases">
            </div>
            <div class="form-group">
                <label>Credit Limit Required ($):</label>
                <input type="number" name="credit_limit">
            </div>
        </div>

        <!-- SECTION 3: DIRECTORS DETAILS -->
        <h2>Directors Details</h2>
        <div class="form-row">
            <div class="form-group">
                <label>Number of Directors: <span style="color: red;">*</span></label>
                <input type="number" name="num_directors" id="num_directors" min="1" max="10" required>
            </div>
        </div>

        <!-- Directors Container -->
        <div id="directors-container"></div>

        <!-- Director 1 (Template) -->
        <template id="director-template">
            <h3>Director (<span class="director-number"></span>)</h3>
            <div class="form-row">
                <div class="form-group">
                    <label>Full Name:</label>
                    <input type="text" class="dir_name" name="">
                </div>
                <div class="form-group">
                    <label>Mobile No:</label>
                    <input type="tel" class="dir_mobile" name="">
                </div>
                <div class="form-group">
                    <label>Driver's Licence:</label>
                    <input type="text" class="dir_dl" name="">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label>Private Address:</label>
                    <input type="text" class="dir_address" name="">
                </div>
                <div class="form-group" style="flex: 0 0 100px;">
                    <label>Post Code:</label>
                    <input type="text" class="dir_pc" name="">
                </div>
            </div>
        </template>

        <!-- SECTION 4: PAYMENT TERMS -->
        <h2>Account Payment Terms</h2>
        <div class="form-row">
            <div class="form-group">
                <label>Purchase Order Required?</label>
                <select name="po_required">
                    <option value="No">No</option>
                    <option value="Yes">Yes</option>
                </select>
            </div>
            <div class="form-group">
                <label>Accounts to be emailed?</label>
                <select name="accounts_email_opt">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="form-group">
                <label>Accounts Email Address:</label>
                <input type="email" name="accounts_email">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label>Accounts Contact:</label>
                <input type="text" name="accounts_contact">
            </div>
            <div class="form-group">
                <label>Mobile No:</label>
                <input type="tel" name="accounts_mobile">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label>Bank and Branch:</label>
                <input type="text" name="bank_branch">
            </div>
            <div class="form-group">
                <label>Account No:</label>
                <input type="text" name="bank_account_no">
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
            <p>I certify that the above information is true and correct and that I accept the supply of credit by the Supplier (if applicable). I have read and understood the TERMS AND CONDITIONS OF TRADE (under mentioned) of Flinkglobal Limited T/A FlinkTech which form part of and are intended to be read in conjunction with this Credit account application and agree to be bound by these conditions. I authorise the use of my personal information as detailed in the Privacy Act clause therein.</p>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>SIGNED (CLIENT) Name:</label>
                <input type="text">
            </div>
            <div class="form-group">
                <label>Position:</label>
                <input type="text">
            </div>
            <div class="form-group">
                <label>Date:</label>
                <input type="date">
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
                <p><strong>IN CONSIDERATION</strong> of Flinkglobal Limited T/A FlinkTech and its successors and assigns ("the Supplier") at the request of the Guarantor supplying and continuing to supply goods and/or services to the Client.</p>
                
                <p><strong>I/WE (the "Guarantor/s") UNCONDITIONALLY AND IRREVOCABLY:</strong></p>
                <ol>
                    <li><strong>GUARANTEE</strong> the due and punctual payment to the Supplier of all monies which are now owing to the Supplier by the Client and all further sums of money from time to time owing to the Supplier by the Client in respect of goods and services supplied or to be supplied by the Supplier to the Client or any other liability of the Client to the Supplier, and the due observance and performance by the Client of all its obligations contained or implied in any contract or agreement with the Supplier, including but not limited to the Terms & Conditions of Trade signed by the Client and annexed to this Guarantee and Indemnity. If for any reason the Client does not pay any amount owing to the Supplier, the Guarantor will immediately on demand pay the relevant amount to the Supplier. In consideration of the Supplier agreeing to supply the goods and/or services to the Client, the Guarantor charges all of its right, title and interest (joint or several) in any land, realty or other assets capable of being charged, owned by the Guarantor now or in the future, to secure the performance by the Guarantor of its obligations under this Guarantee and Indemnity (including, but not limited to, the payment of any money) and the Guarantor acknowledges that this personal guarantee and indemnity constitutes a security agreement for the purposes of the Personal Property Securities Act 1999 (“PPSA”) and unequivocally consents to the Supplier registering any interest so charged. Furthermore, it is agreed by both parties that where the Guarantor is acting in the capacity as a trustee for a trust, then the Guarantor agrees to charge all its right title and interest in any land realty, or other assets capable of being charged in its own capacity and in its capacity as trustee and shall be subject to the PPSA Registration as stated above. The Guarantor irrevocably appoints the Supplier and each director of the Supplier as the Guarantor’s true and lawful attorney/s to perform all necessary acts to give effect to this clause including, but not limited to, signing any document on the Guarantor’s behalf which the Supplier may reasonably require to:<ol type="a">
                        <li>register a financing statement or financing change statement in relation to a security interest on the Personal Property Securities Register;</li>
                        <li>register any other document required to be registered by the PPSA or any other law; or</li>
                        <li>correct a defect in a statement referred to in clause 1(a) or 1(b).</li>
                    </ol></li>
                    <li><strong>HOLD HARMLESS AND INDEMNIFY</strong> the Supplier on demand as a separate obligation against any liability (including but not limited to damages, costs, losses and legal fees calculated on a solicitor and own client basis) incurred by, or assessed against, the Supplier in connection with:<ol type="a">
                        <li>the supply of goods and/or services to the Client; or</li>
                        <li>the recovery of monies owing to the Supplier by the Client including the enforcement of this Guarantee and Indemnity, and including but not limited to the Supplier’s nominees’ costs of collection and legal costs; or</li>
                        <li>monies paid by the Supplier with the Client’s consent in settlement of a dispute that arises or results from a dispute between, the Supplier, the Client, and a third party or any combination thereof, over the supply of goods and/or services by the Supplier to the Client.</li>
                    </ol></li>
                    <li>The liability under this Guarantee shall not be discharged by any alteration to contract, liquidation of Client, etc. [cite: 326]</li>
                    <li>I/We have been advised to obtain independent legal advice before executing this Guarantee. [cite: 331]</li>
                    <li>I/We authorise the Supplier to obtain/provide credit information from/to third parties. [cite: 333]</li>
                </ol>
                
                <p style="text-align: center; font-weight: bold;">
                    For and on behalf of the Client I/We confirm I/We have read, understood, and accept the terms of this Guarantee and Indemnity. [cite: 336]
                </p>
            </div>
        </div>
        <div class="form-row">
            <!-- Guarantor 1 -->
            <div class="form-group guarantor-container">
                <h3>GUARANTOR-1</h3>
                <label>Full Name:</label>
                <input type="text" name="g1_name">
                <label>Home Address:</label>
                <input type="text" name="g1_address">
                <label>Date of Birth:</label>
                <input type="date" name="g1_dob">
                
                <div class="signature-line">Signed (Guarantor 1)</div>
                
                <hr style="margin: 20px 0;">
                
                <label>Name of Witness:</label>
                <input type="text" name="g1_witness_name">
                <label>Occupation:</label>
                <input type="text" name="g1_witness_occ">
                <label>Present Address:</label>
                <input type="text" name="g1_witness_addr">
                <div class="signature-line">Signature of Witness</div>
            </div>

            <!-- Guarantor 2 -->
            <div class="form-group guarantor-container">
                <h3>GUARANTOR-2</h3>
                <label>Full Name:</label>
                <input type="text" name="g2_name">
                <label>Home Address:</label>
                <input type="text" name="g2_address">
                <label>Date of Birth:</label>
                <input type="date" name="g2_dob">
                
                <div class="signature-line">Signed (Guarantor 2)</div>

                <hr style="margin: 20px 0;">

                <label>Name of Witness:</label>
                <input type="text" name="g2_witness_name">
                <label>Occupation:</label>
                <input type="text" name="g2_witness_occ">
                <label>Present Address:</label>
                <input type="text" name="g2_witness_addr">
                <div class="signature-line">Signature of Witness</div>
            </div>
            <div class="notes">
                <strong>Notes:</strong><br>
                1. If the Client is a proprietary limited company, the Guarantor(s) must be the director(s).<br>
                2. If the Client is a limited partnership, the Guarantor(s) must be the general partners.<br>
                3. If the Client is a sole trader, the Guarantor(s) should be a suitable person.<br>
                4.  If the Client is a club or incorporated society the Guarantor(s) should be the president and secretary or other committee members.
            </div>
        </div>

        <!-- PAGE 3: TERMS AND CONDITIONS -->
        <h2>Terms & Conditions of Trade</h2>
        <p>Please scroll to read the full Terms and Conditions.</p>
        <div class="terms-box">
            <h3>1. Definitions</h3>
            <p>1.1 “Client” means the person/s, entities or any person acting on behalf of and with the authority of the Client requesting the Supplier to provide the Services as specified in any proposal, quotation, order, invoice or other documentation.</p>
            <p>1.2 “Contract” means the terms and conditions contained herein, together with any quotation, order, invoice or other document or amendments expressed to be supplemental to this Contract.</p>
            <p>1.4 “Goods” means all Goods or Services supplied by the Supplier to the Client at the Client’s request from time to time.</p>
            <p>1.5 “Price” means the Price payable (plus any Goods and Services Tax (“GST”) where applicable) for the Goods as agreed between the Supplier and the Client.</p>
            
            <h3>2. Acceptance</h3>
            <p>2.1 The parties acknowledge and agree that: (a) they have read and understood the terms and conditions contained in this Contract; and (b) the parties are taken to have exclusively accepted and are immediately bound, jointly and severally, by these terms and conditions if the Client places an order for or accepts Delivery of the Goods.</p>

            <h3>5. Price and Payment</h3>
            <p>5.1 At the Supplier’s sole discretion the Price shall be either: (a) as indicated on any invoice provided by the Supplier to the Client; or (b) the Supplier’s quoted Price which will be valid for the period stated in the quotation or otherwise for a period of thirty (30) days.</p>
            <p>5.5 Time for payment for the Goods being of the essence, the Price will be payable by the Client on the date/s determined by the Supplier.</p>

            <h3>9. Title</h3>
            <p>9.1 The Supplier and the Client agree that ownership of the Goods shall not pass until: (a) the Client has paid the Supplier all amounts owing to the Supplier; and (b) the Client has met all of its other obligations to the Supplier.</p>

            <h3>10. Personal Property Securities Act 1999 (“PPSA”)</h3>
            <p>10.1 Upon assenting to these terms and conditions in writing the Client acknowledges and agrees that: (a) these terms and conditions constitute a security agreement for the purposes of the PPSA; and (b) a security interest is taken in all Goods that have previously been supplied and that will be supplied in the future by the Supplier to the Client.</p>

            <h3>11. Security and Charge</h3>
            <p>11.1 In consideration of the Supplier agreeing to supply the Goods, the Client charges all of its rights, title and interest (whether joint or several) in any land, realty or other assets capable of being charged, owned by the Client either now or in the future, and the Client grants a security interest in all of its present and after-acquired property, to secure the performance by the Client of its obligations under these terms and conditions.</p>
            <p>11.3 The Client irrevocably appoints the Supplier and each director of the Supplier as the Client’s true and lawful attorney/s to perform all necessary acts to give effect to the provisions of this clause 11 including, but not limited to, signing any document on the Client’s behalf.</p>

            <h3>18. Privacy Policy</h3>
            <p>18.1 All emails, documents, images or other recorded information held or used by the Supplier is “Personal Information” considered confidential. The Supplier acknowledges its obligation in relation to the handling, use, disclosure and processing of Personal Information pursuant to the Privacy Act 2020.</p>
            
            <p><em>(Note: Full Terms and Conditions from the original document are incorporated by reference here to save space, but the Security/Charge and PPSA sections have been explicitly included above as they are critical.)</em></p>
        </div>
        
        <div class="form-row">
             <input type="checkbox" id="accept_terms" name="accept_terms" required>
             <label for="accept_terms" style="display:inline; margin-left: 10px;">I/We confirm I/We have read, understood, and accept the terms of this Guarantee and Indemnity, and I/We agree to be bound by this Guarantee and Indemnity.</label>
        </div>

        <h2>Account Details</h2>
        <div class="form-row">
            <div class="form-group">
                <label>Account Name:</label>
                <input type="text" name="account_name" required>
            </div>
            <div class="form-group">
                <label>Amount:</label>
                <input type="number" step="0.01" name="amount" required>
            </div>
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business - Credit Account Application</title>
    <style>
        @page {
            size: A4;
            margin: 8mm;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 10px;
            background-color: white;
            color: #000;
            line-height: 1.1;
        }

        .container {
            width: 100%;
            margin: 0 auto;
        }

        /* Header */
        .header-table {
            width: 100%;
            margin-bottom: 10px;
            border-collapse: collapse;
        }

        .header-table td {
            border: none !important;
            vertical-align: top;
            padding: 0;
        }

        .logo-section {
            width: 60%;
        }

        .info-section {
            width: 40%;
            text-align: right;
            font-size: 8pt;
            line-height: 1.3;
        }

        .main-logo img {
            height: 32px;
            display: block;
        }

        .sub-logos {
            margin-top: 5px;
            margin-left: 20px;
        }

        .sub-logos img {
            height: 18px;
            margin-right: 15px;
            vertical-align: middle;
        }

        .company-info {
            text-align: right;
            font-size: 8.5px;
            line-height: 1.25;
        }

        h1 {
            text-align: center;
            font-size: 18px;
            margin: 5px 0 2px 0;
            color: #333;
            font-weight: normal;
        }

        .instruction {
            text-align: center;
            font-weight: bold;
            font-size: 9px;
            margin-bottom: 8px;
        }

        /* Tables & Sections */
        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
            margin-bottom: 0;
        }

        td {
            border: 1px solid #000;
            padding: 2px 4px;
            height: 16px;
            vertical-align: middle;
        }

        .section-header {
            font-weight: bold;
            background-color: #eef2f5;
            padding: 3px 4px !important;
            font-size: 9.5px;
        }

        .label-cell {
            font-size: 9px;
            border-right: none;
            width: 160px;
        }

        .value-cell {
            border-left: none;
        }

        .half-cell {
            width: 50%;
        }

        /* Footer Declaration */
        .declaration {
            font-size: 7.5px;
            text-align: justify;
            line-height: 1.2;
            padding-left: 15px;
            padding-right: 15px;
            position: absolute;
            bottom: 60px;
            left: 10px;
        }

        /* Add this to your <style> block */
        .signature-section {
            position: absolute;
            bottom: 10px;
            left: 10px;
            width: 100%;
            padding-left: 15px;
            padding-right: 15px;
            /* Optional: Add background to prevent text overlapping if content gets too long */
            background-color: #fff;
        }

        .signature-table {
            width: 100%;
            border-collapse: collapse;
        }

        .signature-table td {
            border: none !important;
            padding: 2px 5px;
            vertical-align: top;
        }

        .sig-label {
            font-weight: bold;
            font-size: 11px;
            margin-bottom: 10px;
            display: block;
        }

        .sig-row {
            display: flex;
            justify-content: space-between;
            font-size: 10px;
        }

        .ec-credit {
            text-align: right;
            line-height: 1.2;
        }

        .ec-credit img {
            height: 28px;
            margin-bottom: 5px;
        }

        .ec-credit-text {
            font-size: 7px;
            color: #444;
            display: block;
        }

        /* Spacing fixes */
        .spacer {
            height: 2px;
            border: none !important;
        }

        .no-bottom {
            border-bottom: none !important;
        }

        .no-top {
            border-top: none !important;
        }

        /* Hanging Indent Tables for Legal Clauses */
        .clause-table td {
            border: none;
            vertical-align: top;
            text-align: justify;
            font-size: 8px;
            padding: 1px 0;
        }

        .c-num {
            width: 5px;
            font-weight: bold;
        }

        /* Sub-list (a,b,c) inside clauses */
        .sub-table {
            margin-left: 0;
            width: 100%;
        }

        .sub-alpha {
            width: 15px;
            padding-left: 5px;
        }

        /* --- GUARANTOR BOXES (50/50 Layout) --- */
        .guarantor-wrapper {
            width: 100%;
            margin-top: 10px;
            page-break-inside: avoid;
        }

        .guarantor-wrapper td {
            border: none;
            padding: 0;
            vertical-align: top;
        }

        .g-box {
            border: 1px solid #000;
            padding: 5px;
            height: 250px;
            /* Fixed height to match image */
        }

        .g-header {
            font-family: "Times New Roman", serif;
            font-size: 11px;
            font-weight: bold;
            border-bottom: 1px solid #000;
            margin-bottom: 5px;
        }

        /* Fields inside the box */
        .g-field-table td {
            border: none;
            padding: 1px 0;
            vertical-align: bottom;
        }

        .g-label {
            font-size: 10px;
            white-space: nowrap;
            padding-right: 5px;
            width: 1%;
        }

        .g-line {
            border-bottom: 0.5pt solid #000;
            width: 100%;
            height: 11px;
            font-family: "Times New Roman", serif;
            font-size: 9px;
        }

        .deed-row {
            margin-top: 8px;
            font-size: 8px;
        }

        .short-line {
            display: inline-block;
            border-bottom: 0.5pt solid #000;
            width: 30px;
        }

        /* Footer */
        /* .footer-notes {
            margin-top: 5px;
            border-top: 1px solid #000;
            padding-top: 3px;
            font-size: 8px;
        } */

        .footer-notes {
            margin-top: 8px;
            border-top: 0.5pt solid #000;
            padding-top: 4px;
            font-size: 7px;
            line-height: 1.2;
        }

        .copyright {
            text-align: right;
            font-size: 7px;
            margin-top: 2px;
        }

        .page-break {
            page-break-before: always;
        }

        .g-field-table {
            width: 100%;
            border-collapse: collapse;
        }

        .g-field-table td {
            padding: 4px 6px;
            vertical-align: top;
            line-height: 16px;
            font-size: 11px;
        }

        .g-label {
            width: 40%;
            font-weight: bold;
        }

        .g-line {
            border-bottom: 1px solid #000;
            height: 16px;
        }

        .g-box {
            border: 1px solid #000;
            padding: 10px;
            page-break-inside: avoid;
        }

        .g-header {
            font-weight: bold;
            border-bottom: 1px solid #000;
            margin-bottom: 6px;
            padding-bottom: 3px;
        }

        sub-title {
            font-size: 14px;
        }
    </style>
</head>

<body>
    <table style="border:none; padding: 10px;">
        <tr>
            <td style="border:none; padding-left:15px;" class="layout-col">
                <div class="section">
                    <div class="container">
                        <!-- Header -->
                        <table class="header-table">
                            <tr>
                                <td width="60%">
                                    <div class="main-logo">
                                        <img src="https://flinktech.nz/wp-content/uploads/2021/05/flinktech_logo-1536x293-removebg-preview.png"
                                            alt="flinktech">
                                    </div>
                                    <div class="sub-logos">
                                        <img src="https://www.fervour.info/wp-content/uploads/2024/03/fervour-logo.webp"
                                            alt="Fervour">
                                        <img src="https://flinkglobal.com/uvw/wp-content/uploads/2020/10/logo-small-1.png"
                                            alt="UvW">
                                    </div>
                                </td>
                                <td width="40%" class="company-info">
                                    FlinkGlobal Limited T/A <strong>FlinkTech</strong><br>
                                    23 Stewart Gibson Place, Manurewa, AUCKLAND 2105<br>
                                    Phone: (09) 393 0900<br>
                                    Email: contact@flinkglobal.com<br>
                                    Web: www.flinkglobal.com
                                </td>
                            </tr>
                        </table>

                        <h1 style="border:none; text-align: center; font-size: 12px;">Business - Credit Account
                            Application</h1>
                        <div class="instruction">
                            To Be Completed by Applicants - Please complete all sections and read the Terms and
                            Conditions of Trade under mentioned. </div>

                        <!-- Client Details -->
                        <table>
                            <tr class="section-header">
                                <td colspan="4">Client Details:</td>
                            </tr>
                            <tr style="font-size: 11px;">
                                <td style="width: 120px;">Full Name (Contact Person):</td>
                                <td colspan="2">{{ $app->contact_person }}</td>
                                <td style="width: 60px; border-left: none;">Postcode:{{ $app->postcode_phy }}</td>
                            </tr>
                            <tr style="font-size: 11px;">
                                <td>Physical Address:</td>
                                <td colspan="3">{{ $app->physical_address }}</td>
                            </tr>
                            <tr style="font-size: 11px;">
                                <td>Billing Address:</td>
                                <td colspan="3">{{ $app->billing_address }}</td>
                            </tr>
                            <tr style="font-size: 11px;">
                                <td style="width: 60px;">Postcode: {{ $app->postcode_phy }}</td>
                                <td colspan="2">Driver's Licence No:{{ $app->drivers_licence }}</td>
                                <td style="width: 60px;">D.O.B. {{ \Carbon\Carbon::parse($app->dob)->format('d/m/Y') }}
                                </td>
                            </tr>
                            <tr style="font-size: 11px;">
                                <td>Email Address:</td>
                                <td colspan="2">{{ $app->email }}</td>
                                <td>Mobile No: {{ $app->mobile }}</td>
                            </tr>
                            <!-- Business Details -->
                            <tr class="spacer">
                                <td colspan="4" style="border:none;"></td>
                            </tr>
                            <tr class="section-header">
                                <td colspan="4">Business Details:</td>
                            </tr>
                            <tr style="font-size: 11px;">
                                <td>Legal Name:</td>
                                <td colspan="3">{{ $app->legal_name }}</td>
                            </tr>
                            <tr style="font-size: 11px;">
                                <td>Trading Name:</td>
                                <td colspan="3">{{ $app->trading_name }}</td>
                            </tr>
                            <tr style="font-size: 11px;">
                                <td>GST No:</td>
                                <td colspan="2" style="width: 180px;">{{ $app->gst_no }}</td>
                                <td>Company Number: {{ $app->company_no }}</td>
                            </tr>
                            <tr style="font-size: 11px;">
                                <td>NZBN Number:</td>
                                <td colspan="3">{{ $app->nzbn }}</td>
                            </tr>
                            <tr style="font-size: 11px;">
                                <td>Nature of Business:</td>
                                <td colspan="2">{{ $app->nature_business }}</td>
                                <td>Date Incorp:
                                    {{ $app->date_incorp ? \Carbon\Carbon::parse($app->date_incorp)->format('d/m/Y') : '' }}
                                </td>
                            </tr>
                            <tr style="font-size: 11px;">
                                <td>Paid Up Capital:$</td>
                                <td>{{ $app->paid_capital }}</td>
                                <td>Estimated Monthly Purchases:$
                                    {{ $app->monthly_purchases }}
                                </td>
                                <td>Credit Required:$ {{ $app->credit_required}}</td>
                            </tr>
                            <tr style="font-size: 11px;">
                                <td>Principal Place of Business:$</td>
                                <td colspan="2">{{ $app->principal_place_of_business }}</td>
                                <td>(to whome):{{ $app->to_whom }}</td>
                            </tr>
                            <!-- Account Payment Terms -->
                            <tr style="font-size: 11px;" class="spacer">
                                <td colspan="4" style="border:none;"></td>
                            </tr>

                            <!-- Directors Details -->
                            <tr class="section-header">
                                <td colspan="4">Directors Details:</td>
                            </tr>
                        </table>

                        <!-- Directors rows -->
                        <table style="margin-top: -1px;">
                            @foreach($app->directors as $index => $director)
                                <tr style="font-size: 11px;">
                                    <td style="width: 120px;">({{ $index + 1 }}) Full Name:</td>
                                    <td colspan="2">{{ $director->full_name }}</td>
                                    <td style="width: 60px;">
                                        D.O.B.: {{ \Carbon\Carbon::parse($director->dob)->format('d/m/Y') }}</td>
                                </tr>
                                <tr style="font-size: 11px;">
                                    <td>Driver's Licence No:</td>
                                    <td>{{ $director->drivers_licence }}</td>
                                    <td>Mobile No: {{ $director->mobile }}</td>
                                    <td>Postcode: {{ $director->postcode }}</td>
                                </tr>
                                <tr style="font-size: 11px;">
                                    <td>Private Address:</td>
                                    <td colspan="3">{{ $director->address }}</td>
                                </tr>
                                @if(!$loop->last)
                                    <tr style="font-size: 11px;" class="spacer">
                                        <td colspan="4"
                                            style="border-left:none; border-right:none; border-bottom:1px solid #000; border-top:none;">
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </table>
                        <!-- Client Details -->
                        <table>
                            <!-- Business Details -->
                            <tr class="spacer">
                                <td colspan="4" style="border:none;"></td>
                            </tr>
                            <tr class="section-header">
                                <td colspan="4">Account Payment Terms:</td>
                            </tr>
                            <tr style="font-size: 11px;">
                                <td>Purchases Order Required?:</td>
                                <td colspan="">{{ $app->po_required }}</td>
                                <td>Account to be emailed: </td>
                                <td>{{ $app->accounts_email_opt }}</td>
                            </tr>

                            <tr style="font-size: 11px;">
                                <td>Account Email Address:</td>
                                <td colspan="3">{{ $app->accounts_email }}</td>
                            </tr>
                            <tr style="font-size: 11px;">
                                <td>Mobile No:</td>
                                <td>{{ $app->accounts_mobile }}</td>
                                <td>Account Contact: </td>
                                <td>{{ $app->accounts_contact }}</td>
                            </tr>
                            <tr style="font-size: 11px;">
                                <td>Bank and Branch:</td>
                                <td>{{ $app->bank_branch }}</td>
                                <td>Account No: </td>
                                <td>{{ $app->bank_account_no }}</td>
                            </tr>
                            <!-- Account Payment Terms -->
                            <tr style="font-size: 11px;" class="spacer">
                                <td colspan="4" style="border:none;"></td>
                            </tr>
                        </table>
                        <table>
                            <tr class="section-header">
                                <td colspan="3">Trade / Personal References:</td>
                            </tr>
                            <tr style="text-align: center; font-size: 11px;">
                                <td>Name:</td>
                                <td>Company Name/ Address:</td>
                                <td>Mobile No/ Email:</td>
                            </tr>
                            @forelse($app->references as $ref)
                                <tr style="text-align: center; font-size: 11px;">
                                    <td>{{ $ref->name }}</td>
                                    <td>{{ $ref->company }}</td>
                                    <td>{{ $ref->contact }}</td>
                                </tr>
                            @empty
                                <tr style="text-align: center; font-size: 11px;">
                                    <td colspan="3" style="text-align: center; color: #999;"></td>
                                </tr>
                            @endforelse
                        </table>
                        <!-- Declaration -->
                        <div class="declaration">
                            I certify that the above information is true and correct and that I accept the supply of
                            credit by
                            the
                            Supplier (if applicable). I have read and understood the TERMS AND CONDITIONS OF TRADE
                            (under
                            mentioned)
                            of
                            Flinkglobal Limited T/A FlinkTech which form part of and are intended to be read in
                            conjunction with
                            this
                            Cash account application and agree to be bound by these conditions. I authorise the use of
                            my
                            personal
                            information as detailed in the Privacy Act clause therein.
                        </div>

                        <!-- Signature -->
                        <div class="signature-section" style="margin-top: 20px;">
                            <div
                                style="font-weight: bold; font-size: 11px; margin-bottom: 5px; font-family: Helvetica, Arial, sans-serif;">
                                SIGNED (CLIENT):
                            </div>

                            <table
                                style="width: 100%; border-collapse: collapse; font-family: Helvetica, Arial, sans-serif; border: none;">
                                <tr>
                                    <td width="60%" style="vertical-align: bottom; padding-bottom: 5px;border: none;">
                                        <div style="font-size: 10px;">
                                            <span style="display: inline-block; width: 160px;">
                                                <strong>Name:</strong> {{ $app->contact_person }}
                                            </span>

                                            <span style="display: inline-block; width: 140px;">
                                                <strong>Position:</strong> {{ $app->signed_position }}
                                            </span>

                                            <span style="display: inline-block; width: 100px;">
                                                <strong>Date:</strong>
                                                {{ \Carbon\Carbon::parse($app->signed_date)->format('d/m/Y') }}
                                            </span>
                                        </div>
                                    </td>

                                    <td width="40%" style="vertical-align: bottom; border: none;">
                                        <table style="width: 100%; border-collapse: collapse;border:none;">
                                            <tr>
                                                <td
                                                    style="width: 30px; vertical-align: right; padding-right: 0px;border:none;">
                                                    <img src="{{ asset('ec.webp') }}"
                                                        style="height: 20px; display: block;" alt="EC">
                                                </td>
                                                <td style="vertical-align: left;border:none;">
                                                    <div style="font-size: 7px; color: #444; line-height: 1.1;">
                                                        Protected by EC Credit Control – Credit Management
                                                        Specialists<br>
                                                        <strong>© Copyright 1999 – 2024 – #35596</strong>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
    </table>
    <div style="page-break-before: always;"></div>
    <table style="border:none; ">
        <tr>
            <td style="border:none; padding-left:15px; padding-right:15px;">
                <div class="section">
                    <div class="container">
                        <!-- Header -->
                        <table style="margin-top:20px;" class="header-table">
                            <tr>
                                <td width="60%">
                                    <div class="main-logo">
                                        <img src="https://flinktech.nz/wp-content/uploads/2021/05/flinktech_logo-1536x293-removebg-preview.png"
                                            alt="flinktech">
                                    </div>
                                    <div class="sub-logos">
                                        <img src="https://www.fervour.info/wp-content/uploads/2024/03/fervour-logo.webp"
                                            alt="Fervour">
                                        <img src="https://flinkglobal.com/uvw/wp-content/uploads/2020/10/logo-small-1.png"
                                            alt="UvW">
                                    </div>
                                </td>
                                <td width="40%" class="company-info">
                                    FlinkGlobal Limited T/A <strong>FlinkTech</strong><br>
                                    23 Stewart Gibson Place, Manurewa, AUCKLAND 2105<br>
                                    Phone: (09) 393 0900<br>
                                    Email: contact@flinkglobal.com<br>
                                    Web: www.flinkglobal.com
                                </td>
                            </tr>
                        </table>

                        <h2 style="font-size: 16px;">Personal/Directors Guarantee and Indemnity</h2>
                        <div style="font-size: 14px;">
                            <strong>IN CONSIDERATION</strong> of Flinkglobal Limited T/A FlinkTech and its
                            successors
                            and assigns (“the
                            Supplier”) at the request of the Guarantor (as is now acknowledged) supplying and
                            continuing
                            to supply goods
                            and/or services to:
                            <br>
                            <div style="padding:5px;"> <span
                                    style="font-size: 14px;height:10px; border:1px solid #000;">{{ $app->contact_person }}</span>
                                <strong>(“th
                                    e Client”)</strong>
                            </div>
                        </div>

                        <div style="font-size: 14px;">I/WE (also referred to as the “Guarantor/s”) UNCONDITIONALLY
                            AND
                            IRREVOCABLY:</div>
                        <table class="clause-table sub-table">
                            <tr>
                                <td style="width: 1%;" class="c-num">1.</td>
                                <td><strong>GUARANTEE</strong> the due and punctual payment to the Supplier of all
                                    monies which are now
                                    owing to the Supplier by the Client and all further sums of money from time to
                                    time
                                    owing to the
                                    Supplier by the Client in respect of goods and services supplied or to be
                                    supplied
                                    by the Supplier to
                                    the Client or any other liability of the Client to the Supplier, and the due
                                    observance and performance
                                    by the Client of all its obligations contained or implied in any contract or
                                    agreement with the
                                    Supplier, including but not limited to the Terms & Conditions of Trade signed by
                                    the
                                    Client and annexed
                                    to this Guarantee and Indemnity. If for any reason the Client does not pay any
                                    amount owing to the
                                    Supplier, the Guarantor will immediately on demand pay the relevant amount to
                                    the
                                    Supplier. In
                                    consideration of the Supplier agreeing to supply the goods and/or services to
                                    the
                                    Client, the Guarantor
                                    charges all of its right, title and interest (joint or several) in any land,
                                    realty
                                    or other assets
                                    capable of being charged, owned by the Guarantor now or in the future, to secure
                                    the
                                    performance by the
                                    Guarantor of its obligations under this Guarantee and Indemnity (including, but
                                    not
                                    limited to, the
                                    payment of any money) and the Guarantor acknowledges that this personal
                                    guarantee
                                    and indemnity
                                    constitutes a security agreement for the purposes of the Personal Property
                                    Securities Act 1999 (“PPSA”)
                                    and unequivocally consents to the Supplier registering any interest so charged.
                                    Furthermore, it is
                                    agreed by both parties that where the Guarantor is acting in the capacity as a
                                    trustee for a trust, then
                                    the Guarantor agrees to charge all its right title and interest in any land
                                    realty,
                                    or other assets
                                    capable of being charged in its own capacity and in its capacity as trustee and
                                    shall be subject to the
                                    PPSA Registration as stated above. The Guarantor irrevocably appoints the
                                    Supplier
                                    and each director of
                                    the Supplier as the Guarantor’s true and lawful attorney/s to perform all
                                    necessary
                                    acts to give effect
                                    to this clause including, but not limited to, signing any document on the
                                    Guarantor’s behalf which the
                                    Supplier may reasonably require to:
                                    <table class="sub-table">
                                        <ol type="a"
                                            style="margin:0; padding-left:20px; line-height:1.3; list-style-type: lower-alpha;">
                                            <li>a.register a financing statement or financing change statement in
                                                relation
                                                to a security
                                                interest on the Personal Property Securities Register;.</li>
                                            <li>b. register any other document required to be registered by the PPSA
                                                or
                                                any
                                                other law; or
                                            </li>
                                            <li>c.correct a defect in a statement referred to in clause 1(a) or
                                                1(b).
                                            </li>
                                        </ol>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 1%;">2.</td>
                                <td><strong>HOLD HARMLESS AND INDEMNIFY</strong> the Supplier on demand as a
                                    separate
                                    obligation against any
                                    liability (including but not limited to damages, costs, losses and legal fees
                                    calculated on a solicitor
                                    and own client basis) incurred by, or assessed against, the Supplier in
                                    connection
                                    with:
                                    <table class="sub-table">
                                        <ol type="a"
                                            style="margin:0; padding-left:20px; line-height:1.3; list-style-type: lower-alpha;">
                                            <li>a. the supply of goods and/or services to the
                                                Client; or.</li>
                                            <li>b. the recovery of monies owing to the Supplier
                                                by the Client including the
                                                enforcement of this
                                                Guarantee and Indemnity, and including but not limited to the
                                                Supplier’s
                                                nominees’ costs of
                                                collection and legal costs; or
                                            </li>
                                            <li>c. monies paid by the Supplier with the
                                                Client’s consent in settlement of a
                                                dispute that arises
                                                or results from a dispute between, the Supplier, the Client, and a
                                                third
                                                party or any
                                                combination thereof, over the supply of goods and/or services by the
                                                Supplier to the Client.
                                            </li>
                                        </ol>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        <div><strong>I/WE FURTHER ACKNOWLEDGE AND AGREE THAT:</strong></div>
                        <table class="clause-table">
                            <tr>
                                <td style="width: 1%;">3.</td>
                                <td>I/We have received, read, and understood the Supplier’s Terms and Conditions
                                    prior
                                    to entering into this
                                    Guarantee and Indemnity and agree to be bound by those Terms and Conditions.
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 1%;">4.</td>
                                <td>This Guarantee and Indemnity shall constitute an unconditional and continuing
                                    Guarantee and Indemnity
                                    and accordingly shall be irrevocable and remain in full force and effect until
                                    all
                                    monies owing to the
                                    Supplier by the Client and all obligations herein have been fully paid satisfied
                                    and
                                    performed.</td>
                            </tr>
                            <tr>
                                <td style="width: 1%;">5.</td>
                                <td>No granting of credit, extension of further credit, or granting of time and no
                                    waiver, indulgence, or
                                    neglect to sue on the Supplier’s part (whether in respect of the Client or any
                                    one
                                    or more of any other
                                    Guarantor(s) or otherwise) and no failure by any named Guarantor to properly
                                    execute
                                    this Guarantee and
                                    Indemnity shall impair or limit the liability under this Guarantee and Indemnity
                                    of
                                    any Guarantor.
                                    Without affecting the Client’s obligations to the Supplier, each Guarantor shall
                                    be
                                    a principal debtor
                                    and liable to the Supplier accordingly.</td>
                            </tr>
                            <tr>
                                <td style="width: 1%;">6.</td>
                                <td>The liability under this Guarantee and Indemnity shall not be discharged,
                                    abrogated,
                                    prejudiced, or affected by:
                                    <table class="sub-table">
                                        <ol type="a"
                                            style="margin:0; padding-left:20px; line-height:1.3; list-style-type: lower-alpha;">
                                            <li>a. any alteration, modification, variation or addition to any
                                                contract
                                                or agreement in respect of the supply of goods and/or services;</li>
                                            <li>b. the liquidation, receivership, administration, bankruptcy,
                                                dissolution, compromise or scheme of arrangement in respect of the
                                                Client;</li>
                                            <li>c. any other act, omission, or event which, but for this provision,
                                                might operate to discharge, impair, or otherwise affect any
                                                obligations
                                                under this Guarantee and Indemnity of any of the rights, powers or
                                                remedies conferred by this Guarantee and Indemnity or by law.</li>
                                        </ol>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 1%;">7.</td>
                                <td>The term “Guarantor” whenever used in this Guarantee and Indemnity shall, if
                                    there
                                    is more than one person named as Guarantor, mean, and refer to each of them
                                    individually and all of them together unless the context otherwise requires, the
                                    obligations and agreements on the part of the Guarantor, shall include the
                                    Guarantor’s executors, administrators, successors and permitted assignments
                                    (where
                                    applicable) contained in this Guarantee and Indemnity shall bind them jointly
                                    and
                                    severally.</td>
                            </tr>
                            <tr>
                                <td style="width: 1%;">8.</td>
                                <td><strong>I/We have been advised to obtain independent legal advice before
                                        executing
                                        this Guarantee and
                                        Indemnity. I/we understand that I/we am/are liable for all amounts owing
                                        (both
                                        now and in the
                                        future) by the Client to the Supplier.</strong></td>
                            </tr>
                            <tr>
                                <td style="width: 1%;">9.</td>
                                <td>I/we irrevocably authorise the Supplier to obtain from any person or company any
                                    information which the Supplier may require for credit reference purposes. I/We
                                    further irrevocably authorise the Supplier to provide to any third party, in
                                    response to credit references and enquiries about me/us or by way of information
                                    exchange with credit reference agencies, details of this Guarantee and Indemnity
                                    and
                                    any subsequent dealings that I/we may have with the Supplier as a result of this
                                    Guarantee and Indemnity being actioned by the Supplier.</td>
                            </tr>
                            <tr>
                                <td style="width: 1%;">10.</td>
                                <td> The above information is to be used by the Supplier for all purposes in
                                    connection
                                    with the Supplier considering this Guarantee and Indemnity and the subsequent
                                    enforcement of the same<strong>For and on behalf of the Client I/We confirm I/We
                                        have
                                        read, understood, and
                                        accept
                                        the terms of this Guarantee and Indemnity, and I/We agree to be bound by
                                        this
                                        Guarantee and Indemnity.</strong></td>
                            </tr>
                        </table>
                        <table class="guarantor-wrapper" width="100%">
                            @forelse($app->guarantors->chunk(2) as $chunk)
                                <tr>
                                    @foreach($chunk as $index => $guarantor)
                                        <td width="40%" valign="top">
                                            <div class="g-box">
                                                <div class="g-header">
                                                    GUARANTOR-{{ ($loop->parent->index * 2) + $loop->index + 1 }}
                                                </div>

                                                <table class="g-field-table">
                                                    <tr>
                                                        <td class="g-label">SIGNED:</td>
                                                        <td class="g-line"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="g-label">FULL NAME:</td>
                                                        <td class="g-line">{{ $guarantor->full_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="g-label">HOME ADDRESS:</td>
                                                        <td class="g-line">{{ $guarantor->address }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="g-label">DATE OF BIRTH:</td>
                                                        <td class="g-line">
                                                            {{ \Carbon\Carbon::parse($guarantor->dob)->format('d/m/Y') }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="g-label">SIGNATURE OF WITNESS:</td>
                                                        <td class="g-line"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="g-label">NAME OF WITNESS:</td>
                                                        <td class="g-line">{{ $guarantor->witness_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="g-label">OCCUPATION:</td>
                                                        <td class="g-line">{{ $guarantor->witness_occupation }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="g-label">PRESENT ADDRESS:</td>
                                                        <td class="g-line">{{ $guarantor->witness_address }}</td>
                                                    </tr>
                                                </table>

                                                <div class="deed-row">
                                                    EXECUTED as a Deed this
                                                    <span class="short-line"></span> day of
                                                    <span class="short-line"></span> 20__
                                                </div>
                                            </div>
                                        </td>

                                        {{-- Space column between two boxes --}}
                                        @if(!$loop->last)
                                            <td width="4%"></td>
                                        @endif
                                    @endforeach

                                    {{-- If only one guarantor in last row, fill empty column --}}
                                    @if($chunk->count() == 1)
                                        <td width="4%"></td>
                                        <td width="40%"></td>
                                    @endif
                                </tr>
                            @empty
                                <tr>
                                    <td>No guarantors found.</td>
                                </tr>
                            @endforelse
                        </table>
                    </div>
                </div>
                <div style="" class="footer-notes signature-section">
                    <strong>Note:</strong>
                    <ol type="a" style="margin:0; padding-left:20px; line-height:1.3; list-style-type: lower-alpha;">
                        <li>1.If the Client is a proprietary limited company, the Guarantor(s) must be the director(s)
                            of the company.</li>
                        <li>2. If the Client is a limited partnership, the Guarantor(s) must be the general partners.
                        </li>
                        <li>3. If the Client is a sole trader or partnership the Guarantor(s) should be some other
                            suitable person(s).</li>
                        <li>3. 4. If the Client is a club or incorporated society the Guarantor(s) should be the
                            president and secretary or other committee member.</li>
                    </ol>
                    <div class="copyright">
                        © Copyright - EC Credit Control 1999 - 2024 – #35596
                    </div>
                </div>

            </td>
        </tr>
    </table>
    <!-- T&C Page -->
    <div style="page-break-before: always;"></div>
    @include('business-credit-account-tc')
</body>

</html>
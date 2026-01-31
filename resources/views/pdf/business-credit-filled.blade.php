<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Credit Account Application</title>
    <style>
        /* General Page Layout */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 16px;
            background-color: white;
            color: #000;
        }

        .page-wrapper {
            position: relative;
            min-height: 297mm;
        }

        .page-header {
            padding-bottom: 10px;
        }

        .page-content {
            padding-bottom: 45mm; /* reserve space for footer */
        }

        .page-footer {
            position: absolute;
            bottom: 12mm;
            left: 0;
            right: 0;
            font-size: 8px;
        }

        .container {
            max-width: 210mm; /* A4 Width */
            margin: 0 auto;
        }

        /* Header Section */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 5px;
        }

        .logo-section {
            width: 50%;
        }

        /* Simulating the Logos with text/css since we don't have the image files */
        .main-logo {
            font-size: 24px;
            font-weight: bold;
            font-family: sans-serif;
            margin-bottom: 5px;
        }
        .logo-red { color: #C00000; }
        .logo-black { color: #000; }
        
        .sub-logos {
            margin-top: 5px;
            font-size: 18px;
            font-weight: bold;
            display: flex;
            gap: 15px;
            margin-left: 33px;
        }
        .fervour {
            background-color: #000;
            color: #fff;
            padding: 2px 5px;
            font-style: italic;
        }
        .uvw {
            color: #C00000;
            text-decoration: underline;
        }

        .company-info {
            width: 50%;
            text-align: right;
            font-size: 11px;
            line-height: 1.2;
        }

        /* Title Section */
        h1 {
            text-align: center;
            font-family: "Times New Roman", serif;
            font-size: 22px;
            margin: 0px 0 5px 0;
            font-weight: normal;
            border: none;
            border-top: none;
            border-bottom: none;
            padding: 0;
        }

        .instruction {
            text-align: center;
            font-weight: bold;
            font-size: 12px;
        }

        /* Form Tables */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0; /* Tables are stacked tight */
            table-layout: fixed;
        }
        td, th {   
            border: 1px solid #000;          
            padding: 2px 4px;
            vertical-align: bottom; /* Aligns text like a form input line */
            height: 14px;
            font-size: 11px;
        }


        /* Utility Classes for Columns */
        .section-header {
            background-color: #fff;
            font-weight: bold;
            /* border-bottom: 1px solid black; */
        }
        
        .label {
            white-space: nowrap;
            width: 1%; /* Shrink to fit content */
        }
        
        .input-cell {
            /* Areas where user writes */
        }

        /* Specific Table Tweaks */
        .no-top-border { border-top: none; }
        .no-bottom-border { border-bottom: none; }

        /* Footer / Declaration */
        .declaration {
            margin-top: 10px;
            font-size: 8px;
            text-align: justify;
            line-height: 1.2;
        }

        /* FOOTER STYLES */
        .footer-inner {
            display: flex;
    justify-content: space-between;
    align-items: flex-start;
    width: 100%;
    font-size: 11px;
    border-top: 1px solid #000;
    padding-top: 6px;
        }

        .footer-left {
            width: 65%;
        }

        .signed-line {
            margin-bottom: 20px;
            font-weight: bold;
        }

        .signature-row {
            display: flex;
            gap: 28px;
            font-size: 10px;
        }

        .footer-right {
            width: 45%;
            display: flex;
            align-items: flex-start;
            justify-content: flex-end;
            /* gap: 5px; */
        }
        .ec-text {
            display: inline-block;
            margin-left: 0px;
            vertical-align: top;
            font-size: 9px;
        }
        .ec-tetx {
            font-size: 10px;
            line-height: 1.3;
        }
        .signature-row span {
            display: inline-block;
        }
        .signature-section {
            margin-top: 15px;
            display: flex;
            justify-content: space-between;
            font-weight: bold;
            font-size: 12px;
        }        
        .footer-logo {
            margin-bottom: 0px;
            text-align: right;
            font-size: 7px;
            color: #555;
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }
        /* Print Settings */
        @page {
            size: A4;
            margin: 15mm 10mm;
        }
    </style>
</head>
<body>

<div class="page-wrapper">
    <!-- Page Header (repeats on every page) -->
    <div class="page-header">
        <div class="container">
            <div class="header">
                <div class="logo-section">
                    <div class="main-logo">
                        <img src="https://flinktech.nz/wp-content/uploads/2021/05/flinktech_logo-1536x293-removebg-preview.png" alt="flinktech" style="height: 35px; vertical-align: middle;">
                    </div>
                    <div class="sub-logos">
                        <img src="https://www.fervour.info/wp-content/uploads/2024/03/fervour-logo.webp" alt="Fervour" style="height: 22px; vertical-align: middle;">
                        <img src="https://flinkglobal.com/uvw/wp-content/uploads/2020/10/logo-small-1.png" alt="UvW" style="height: 22px; vertical-align: middle;">
                    </div>
                </div>
                <div class="company-info">
                    FlinkGlobal Limited T/A <strong>FlinkTech</strong><br>
                    23 Stewart Gibson Place, Manurewa, AUCKLAND 2105<br>
                    Phone: (09) 393 0900<br>
                    Email: contact@flinkglobal.com<br>
                    Web: www.flinkglobal.com
                </div>
            </div>
        </div>
    </div>
    <!-- Page Content -->
    <div class="page-content">
        <div class="container">
            <h1 style="border: none">Business - Credit Account Application</h1>
            <div class="instruction">
                To Be Completed by Applicants - Please complete all sections and read the Terms and Conditions of Trade under mentioned.    
            </div>

            <!-- Client Details -->
            <table>
                <tr class="section-header"><td colspan="4">Client Details:</td></tr>
                <tr>
                    <td class="label">Full Name (Contact Person):</td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td class="label">Physical Address:</td>
                    <td colspan="1">{{ $app->physical_address }}</td>
                    <td style="width: 122px;">Postcode:</td>
                    <td style="width: 122px;">{{ $app->postcode_phy }} </div>
                </tr>
                <tr>
                    <td class="label">Billing Address:</td>
                    <td colspan="1">{{ $app->billing_address }}</td>
                    <td>Postcode:</td>
                    <td style="width: 122px;">{{ $app->postcode_bill }}</td>
                </tr>
                <tr>
                    <td class="label">Driver's Licence No:</td>
                    <td>{{ $app->drivers_licence }}</td>
                    <td class="label">D.O.B.</td>
                    <td>{{ \Carbon\Carbon::parse($app->dob)->format('d/m/Y') }}</td>
                </tr>
                <tr>
                    <td class="label">Email Address:</td>
                    <td>{{ $app->email }}</td>
                    <td class="label">Mobile No:</td>
                    <td>{{ $app->mobile }}</td>
                </tr>
            </table>

            <!-- Business Details -->
            <table style="margin-top: -1px;">
                <tr> <td colspan="6"  style="height: 4px; padding: 0;"></td></tr>
                <tr class="section-header"><td colspan="6">Business Details:</td></tr>
                <tr>
                    <td class="label">Legal Name:</td>
                    <td colspan="5">{{ $app->legal_name }}</td>
                </tr>
                <tr>
                    <td class="label">Trading Name:</td>
                    <td colspan="5">{{ $app->trading_name }}</td>
                </tr>
                <tr>
                    <td class="label">GST No:</td>
                    <td>{{ $app->gst_no }}</td>
                    <td class="label">Company Number:</td>
                    <td>{{ $app->company_no }}</td>
                    <td class="label">NZBN Number:</td>
                    <td>{{ $app->nzbn }}</td>
                </tr>
                <tr>
                    <td class="label">Nature of Business:</td>
                    <td colspan="3">{{ $app->nature_business }}</td>
                    <td class="label">Date Incorp.</td>
                    <td>{{ \Carbon\Carbon::parse($app->date_incorp)->format('d/m/Y') }}</td>
                </tr>
                <tr>
                    <td class="label">Paid Up Capital: $</td>
                    <td>{{ number_format($app->paid_capital, 2) }}</td>
                    <td class="label">Est. Monthly Purchases: $</td>
                    <td>{{ number_format($app->monthly_purchases, 2) }}</td>
                    <td class="label">Credit Limit: $</td>
                    <td>{{ number_format($app->credit_limit, 2) }}</td>
                </tr>
                <tr>
                    <td class="label">Principal Place of Business is:</td>
                    <td colspan="3">{{ $app->principal_place_of_business }}</td>
                    <td class="label">(to whom):</td>
                    <td>{{ $app->to_whom }}</td>
                </tr>
            </table>

            <!-- Directors Details -->
            <table style="margin-top: -1px;">
                <tr class="section-header"><td colspan="8">Directors Details:</td></tr>
                @forelse($app->directors as $index => $director)
                <tr>
                    <td class="label">({{ $index + 1 }}) Full Name:</td>
                    <td>{{ $director->full_name }}</td>
                    <td class="label">D.O.B:</td>
                    <td>{{ \Carbon\Carbon::parse($director->dob)->format('d/m/Y') }}</td>
                    <td class="label">Mobile:</td>
                    <td>{{ $director->mobile }}</td>
                    <td class="label">Driver's Licence:</td>
                    <td>{{ $director->drivers_licence }}</td>
                </tr>
                <tr>
                    <td class="label">Private Address:</td>
                    <td colspan="5">{{ $director->address }}</td>
                    <td class="label">Postcode:</td>
                    <td>{{ $director->postcode }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" style="text-align: center; color: #999;">No directors information provided</td>
                </tr>
                @endforelse
            </table>

            <!-- Account Payment Terms -->
            <table style="margin-top: -1px;">
                <tr> <td colspan="4"  style="height: 4px; padding: 0;"></td></tr>
                <tr class="section-header"><td colspan="4">Account Payment Terms:</td></tr>
                <tr>
                    <td class="label">Purchase Order Required?</td>
                    <td>{{ $app->po_required }}</td>
                    <td class="label">Accounts to be emailed?</td>
                    <td>{{ $app->accounts_email_opt }}</td>
                </tr>
                <tr>
                    <td class="label">Accounts Email Address:</td>
                    <td colspan="3">{{ $app->accounts_email }}</td>
                </tr>
                <tr>
                    <td class="label">Accounts Contact:</td>
                    <td>{{ $app->accounts_contact }}</td>
                    <td class="label">Mobile No:</td>
                    <td>{{ $app->accounts_mobile }}</td>
                </tr>
                <tr>
                    <td class="label">Bank and Branch:</td>
                    <td>{{ $app->bank_branch }}</td>
                    <td class="label">Account No:</td>
                    <td>{{ $app->bank_account_no }}</td>
                </tr>
            </table>

            <!-- Trade References -->
            <table style="margin-top: -1px;">
                <tr> <td colspan="3"  style="height: 4px; padding: 0;"></td></tr>
                <tr class="section-header"><td colspan="3">Trade / Personal References:</td></tr>
                <tr style="text-align: left;">
                    <td style="width: 30%;"><strong>Name:</strong></td>
                    <td style="width: 40%;"><strong>Company Name/ Address:</strong></td>
                    <td style="width: 30%;"><strong>Mobile No/ Email:</strong></td>
                </tr>
                @forelse($app->references as $ref)
                <tr>
                    <td>{{ $ref->name }}</td>
                    <td>{{ $ref->company }}</td>
                    <td>{{ $ref->contact }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" style="text-align: center; color: #999;">No references provided</td>
                </tr>
                @endforelse
            </table>

            <!-- Guarantors Section -->
            <table style="margin-top: -1px;">
                <tr class="section-header"><td colspan="4">Personal/Directors Guarantee and Indemnity:</td></tr>
                @forelse($app->guarantors as $guarantor)
                <tr>
                    <td colspan="4" style="font-weight: bold;">Guarantor {{ $loop->iteration }} - {{ $guarantor->full_name }}</td>
                </tr>
                <tr>
                    <td class="label">Full Name:</td>
                    <td>{{ $guarantor->full_name }}</td>
                    <td class="label">D.O.B:</td>
                    <td>{{ \Carbon\Carbon::parse($guarantor->dob)->format('d/m/Y') }}</td>
                </tr>
                <tr>
                    <td class="label">Home Address:</td>
                    <td colspan="3">{{ $guarantor->address }}</td>
                </tr>
                <tr>
                    <td class="label">Witness Name:</td>
                    <td>{{ $guarantor->witness_name }}</td>
                    <td class="label">Occupation:</td>
                    <td>{{ $guarantor->witness_occupation }}</td>
                </tr>
                <tr>
                    <td class="label">Witness Address:</td>
                    <td colspan="3">{{ $guarantor->witness_address }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" style="text-align: center; color: #999;">No guarantor information provided</td>
                </tr>
                @endforelse
            </table>                     
        </div>
    </div>
    <!-- FOOTER -->
    <div class="page-footer">
        <!-- Declaration -->
        <div class="declaration">
            <strong>Declaration:</strong> I certify that the above information is true and correct and that I accept the supply of credit by the Supplier (if applicable). I have read and understood the TERMS AND CONDITIONS OF TRADE of FlinkGlobal Limited T/A FlinkTech which form part of and are intended to be read in conjunction with this Credit account application and agree to be bound by these conditions. I authorise the use of my personal information as detailed in the Privacy Act clause therein.
        </div>  
        <div class="footer-inner">
            <div class="footer-left">
                <div class="signature-row" >
                    <span style="width: 200px;">Name: {{ $app->contact_person }}</span>
                    <span style="width: 200px;">Position: {{ $app->signed_position }}</span>
                    <span style="width: 150px;">Date: {{ \Carbon\Carbon::parse($app->signed_date)->format('d/m/Y') }}</span>
                </div>
            </div>
            <div class="footer-right">
                <img src="{{ asset('ec.webp') }}" class="ec-logo" style="height: 25px;margin-bottom:10px;">
                <div class="ec-text">
                    Protected by EC Credit Control – Credit Management Specialists
                    © Copyright 1999 - 2023 – #35596
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Terms and Conditions on new page --}}
@include('business-credit-account-tc')  
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Credit Account Application</title>
    <style>
        /* General Page Layout */
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 10px;
            margin: 0;
            padding: 20px;
            box-sizing: border-box;
            background-color: white;
            color: #000;
        }

        .container {
            max-width: 210mm;
            margin: 0 auto;
        }

        /* Header Section */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 20px;
        }

        .logo-section {
            width: 50%;
        }

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
            font-size: 9px;
            line-height: 1.3;
        }

        /* Title Section */
        h1 {
            text-align: center;
            font-family: "Times New Roman", serif;
            font-size: 18px;
            margin: 10px 0 5px 0;
            font-weight: normal;
        }

        .instruction {
            text-align: center;
            font-weight: bold;
            font-size: 9px;
            margin-bottom: 10px;
        }

        /* Form Tables */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0;
        }

        td, th {
            border: 1px solid black;
            padding: 2px 4px;
            vertical-align: top;
            height: auto;
            min-height: 14px;
        }

        .section-header {
            background-color: #f0f0f0;
            font-weight: bold;
            border-bottom: 1px solid black;
        }
        
        .label {
            white-space: nowrap;
            width: 1%;
            font-weight: bold;
        }
        
        .input-cell {
            /* Areas where data displays */
        }

        .no-top-border { border-top: none; }
        .no-bottom-border { border-bottom: none; }

        .declaration {
            margin-top: 10px;
            font-size: 8px;
            text-align: justify;
            line-height: 1.2;
        }

        .signature-section {
            margin-top: 15px;
            display: flex;
            justify-content: space-between;
            font-weight: bold;
            font-size: 10px;
        }
        
        .footer-logo {
            margin-top: 20px;
            text-align: right;
            font-size: 7px;
            color: #555;
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }
        
        .ec-logo {
            font-size: 14px;
            font-weight: bold;
            color: #0099cc;
            margin-right: 10px;
        }

        @media print {
            body { padding: 0; }
            .container { width: 100%; max-width: none; }
        }
    </style>
</head>
<body>

<div class="container">

    <!-- Header -->
    <div class="header">
        <div class="logo-section">
            <div class="main-logo">
                <span class="logo-red">▲FLINK</span><span class="logo-black">TECH</span>
                <div style="font-size: 8px; margin-left: 20px; color: #555;">Brilliance... Delivered</div>
            </div>
            <div class="sub-logos">
                <span class="fervour">FERVOUR</span>
                <span class="uvw">UvW</span>
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

    <h1>Business - Credit Account Application</h1>
    <div class="instruction">
        To Be Completed by Applicants - Please complete all sections and read the Terms and Conditions of Trade under mentioned.
    </div>

    <!-- Client Details -->
    <table>
        <tr class="section-header"><td colspan="4">Client Details:</td></tr>
        <tr>
            <td class="label">Full Name (Contact Person):</td>
            <td colspan="3">{{ $app->contact_person }}</td>
        </tr>
        <tr>
            <td class="label">Physical Address:</td>
            <td colspan="2">{{ $app->physical_address }}</td>
            <td style="width: 150px;">Postcode: {{ $app->postcode_phy }}</td>
        </tr>
        <tr>
            <td class="label">Billing Address:</td>
            <td colspan="2">{{ $app->billing_address }}</td>
            <td>Postcode: {{ $app->postcode_bill }}</td>
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
            <td colspan="6">{{ $director->address }}</td>
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
        <tr class="section-header"><td colspan="3">Trade / Personal References:</td></tr>
        <tr style="text-align: center;">
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

    <!-- Declaration -->
    <div class="declaration">
        <strong>Declaration:</strong> I certify that the above information is true and correct and that I accept the supply of credit by the Supplier (if applicable). I have read and understood the TERMS AND CONDITIONS OF TRADE of FlinkGlobal Limited T/A FlinkTech which form part of and are intended to be read in conjunction with this Credit account application and agree to be bound by these conditions. I authorise the use of my personal information as detailed in the Privacy Act clause therein.
    </div>

    <!-- Signatures -->
    <table style="margin-top: 15px;">
        <tr>
            <td colspan="3" style="font-weight: bold;">SIGNED (CLIENT):</td>
        </tr>
        <tr>
            <td class="label">Name:</td>
            <td>{{ $app->sing_client_name }}</td>
            <td></td>
        </tr>
        <tr>
            <td class="label">Position:</td>
            <td>{{ $app->signed_position }}</td>
            <td></td>
        </tr>
        <tr>
            <td class="label">Date:</td>
            <td>{{ \Carbon\Carbon::parse($app->signed_date)->format('d/m/Y') }}</td>
            <td></td>
        </tr>
    </table>

    <!-- Footer Logo -->
    <div class="footer-logo">
        <span class="ec-logo">ec</span> <span style="color:#0099cc;">CREDIT CONTROL</span>
        <span style="margin-left: 10px;">Protected by EC Credit Control – Credit Management Specialists</span>
    </div>
    {{-- <div class="pagebreak" style="page-break-before: always;"></div> --}}
</div>
@include('business-credit-account-tc')

</body>
</html>

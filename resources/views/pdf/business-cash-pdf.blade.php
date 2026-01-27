<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cash Account Application</title>

    <style>
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
            max-width: 210mm;
            margin: 0 auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
        }

        .logo-section {
            width: 50%;
        }

        .sub-logos {
            margin-left: 33px;
            display: flex;
            gap: 15px;
        }

        .company-info {
            width: 50%;
            text-align: right;
            font-size: 11px;
            line-height: 1.2;
        }

        h1 {
            text-align: center;
            font-family: "Times New Roman", serif;
            font-size: 22px;
            /* margin: 10px 0 5px; */
            font-weight: normal;
        }
        h2 {
            text-align: center;
            font-size: 26px;
            font-weight: normal;
        }

        .instruction {
            text-align: center;
            font-weight: bold;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        td {
            border: 1px solid #ccc;
            padding: 2px 4px;
            height: 14px;
            font-size: 11px;
            vertical-align: bottom;
        }

        .section-header {
            font-weight: bold;
        }

        .label {
            white-space: nowrap;
            width: 1%;
        }

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
            align-items: flex-end;
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
            gap: 35px;
            font-size: 10px;
        }

        .footer-right {
            width: 35%;
            text-align: right;
            line-height: 1.2;
        }

        .ec-logo {
            font-size: 18px;
            font-weight: bold;
            color: #0099cc;
        }

        .ec-text {
            display: inline-block;
            margin-left: 6px;
            vertical-align: top;
        }

        @page {
            size: A4;
            margin: 15mm 10mm;
        }
    </style>
</head>

<body>

<div class="page-wrapper">

    <!-- HEADER -->
    <div class="page-header">
        <div class="container header">
            <div class="logo-section">
                <img src="https://flinktech.nz/wp-content/uploads/2021/05/flinktech_logo-1536x293-removebg-preview.png" height="35">
                <div class="sub-logos">
                    <img src="https://www.fervour.info/wp-content/uploads/2024/03/fervour-logo.webp" height="22">
                    <img src="https://flinkglobal.com/uvw/wp-content/uploads/2020/10/logo-small-1.png" height="22">
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

    <!-- CONTENT -->
    <div class="page-content">
        <div class="container">
            <h2>Business - Cash Account Application</h2>
            <div class="instruction">
                Please complete all sections and read the Terms and Conditions of Trade under mentioned.
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
            <td colspan="8" style="text-align: center; color: #999;"></td>
        </tr>
        @endforelse
    </table>

    <!-- Declaration -->
    <div class="declaration">
        <strong>Declaration:</strong> I certify that the above information is true and correct and that I accept the supply of credit by the Supplier (if applicable). I have read and understood the TERMS AND CONDITIONS OF TRADE (under mentioned) of Flinkglobal Limited T/A FlinkTech which form part of and are intended to be read in conjunction with this Cash account application and agree to be bound by these conditions. I authorise the use of my personal information as detailed in the Privacy Act clause therein.
    </div>

        </div>
    </div>

    <!-- FOOTER -->
    <div class="page-footer">
        <div class="container footer-inner">

            <div class="footer-left">
                <div class="signed-line">SIGNED (CLIENT):</div>
                <div class="signature-row">
                    <div>Name: {{ $app->contact_person }}</div>
                    <div>Position: {{ $app->signed_position }}</div>
                    <div>Date: {{ \Carbon\Carbon::parse($app->signed_date)->format('d/m/Y') }}</div>
                </div>
            </div>

            <div class="footer-right">
                <span class="ec-logo">ec</span>
                <span class="ec-text">
                    <strong>CREDIT CONTROL</strong><br>
                    Protected by EC Credit Control – Credit Management Specialists<br>
                    © Copyright 1999 – 2023 – 53596
                </span>
            </div>

        </div>
    </div>

</div>

@include('business-credit-account-tc')

</body>
</html>

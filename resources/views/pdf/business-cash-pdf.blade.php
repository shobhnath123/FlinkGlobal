<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business - Cash Account Application</title>
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
                                        <img src="{{ asset('images/FG-Combine.webp') }}"
                                         width="200px" alt="flinktech">
                                        <div style="font-size: 9px; margin-top: 8px;">Application No.: FG-{{ str_pad($app->id, 6, '0', STR_PAD_LEFT) }}</div>
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

                        <h1 style="border:none; text-align: center; font-size: 12px;">Business - Cash Account
                            Application</h1>
                        <div class="instruction">
                            Please complete all sections and read the Terms and Conditions of Trade under mentioned.
                        </div>

                        <!-- Client Details -->
                        <table>
                            <tr class="section-header">
                                <td colspan="4">Client Details:</td>
                            </tr>
                            <tr style="font-size: 11px;">
                                <td style="width: 120px;">Full Name (Contact Person):</td>
                                <td colspan="3">{{ $app->contact_person }}</td>

                            </tr>
                            <tr style="font-size: 11px;">
                                <td>Physical Address:</td>
                                <td colspan="">{{ $app->physical_address }}</td>
                                <td style="width: 60px; border-left: none; text-align: right;">Postcode:</td>
                                <td>{{ $app->postcode_phy }}</td>
                            </tr>
                            <tr style="font-size: 11px;">
                                <td>Billing Address:</td>
                                <td colspan="">{{ $app->billing_address }}</td>
                                <td style="width: 60px; border-left: none; text-align: right;">Postcode:</td>
                                <td>{{ $app->postcode_bill }}</td>
                            </tr>
                            <tr style="font-size: 11px;">
                                <td style="width: 60px;">Driver's Licence No:</td>
                                <td colspan="">{{ $app->drivers_licence }}</td>
                                <td style="width: 60px; text-align: right;">D.O.B. </td>
                                <td>{{ \Carbon\Carbon::parse($app->dob)->format('d/m/Y') }}</td>
                            </tr>
                            <tr style="font-size: 11px;">
                                <td>Email Address:</td>
                                <td colspan="">{{ $app->email }}</td>
                                <td style="text-align: right;">Mobile No:</td>
                                <td>{{ $app->mobile }}</td>
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
                                <td>{{ $app->gst_no }}</td>
                                <td style="width: 100px; text-align: right;">Company Number:</td>
                                <td>{{ $app->company_no }}</td>
                            </tr>
                            <tr style="font-size: 11px;">
                                <td>NZBN Number:</td>
                                <td colspan="3">{{ $app->nzbn }}</td>
                            </tr>
                            <tr style="font-size: 11px;">
                                <td>Nature of Business:</td>
                                <td colspan="">{{ $app->nature_business }}</td>
                                <td style="text-align: right;">Date Incorp:</td>
                                <td>
                                    {{ $app->date_incorp ? \Carbon\Carbon::parse($app->date_incorp)->format('d/m/Y') : '' }}
                                </td>
                            </tr>
                            <!-- Account Payment Terms -->
                            <tr style="font-size: 11px;" class="spacer">
                                <td colspan="4" style="border:none;"></td>
                            </tr>
                            <tr class="section-header">
                                <td colspan="4">Account Payment Terms:</td>
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
                                    <td colspan="">{{ $director->full_name }}</td>
                                    <td style="width: 60px; text-align: right;">
                                        D.O.B.: </td>
                                    <td style="width: 60px; text-align: left;">
                                        {{ \Carbon\Carbon::parse($director->dob)->format('d/m/Y') }}</td>
                                </tr>
                                <tr style="font-size: 11px;">
                                    <td>Driver's Licence No:</td>
                                    <td>{{ $director->drivers_licence }}</td>
                                    <td style="width: 100px; text-align: right;">Mobile No: </td>
                                    <td style="width: 100px; text-align: left;">{{ $director->mobile }}</td>
                                </tr>
                                <tr style="font-size: 11px;">
                                    <td>Private Address:</td>
                                    <td colspan="">{{ $director->address }}</td>
                                    <td style="width: 5%; text-align: right;">Postcode: </td>
                                    <td style="width: 5%; text-align: left;">{{ $director->postcode }}</td>
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
    <!-- T&C Page -->
    <div style="page-break-before: always;"></div>
    @include('business-credit-account-tc')
</body>

</html>
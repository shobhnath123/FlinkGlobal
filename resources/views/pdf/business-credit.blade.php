<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Credit Account Application</title>
    <style>
        @page {
            size: A4;
            margin: 15mm 10mm;
        }
        
        /* General Page Layout */
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
        }

        .page-wrapper {
            position: relative;
            page-break-after: always;
            margin: 0;
            padding: 0;
            min-height: 297mm; /* A4 Height */
        }

        .page-header {
            position: relative;
            margin-bottom: 10px;
            padding-top: 0;
            padding-bottom: 10px;
            border-bottom: 1px solid #ddd;
            display: block;
        }

        .page-content {
            position: relative;
            display: block;
            min-height: calc(297mm - 140mm);
            padding: 0;
        }

        .page-footer {
            position: relative;
            margin-top: 20px;
            padding-top: 10px;
            border-top: 1px solid #ddd;
            display: block;
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
            margin-bottom: 10px;
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
            line-height: 1.3;
        }

        /* Title Section */
        h1 {
            text-align: center;
            font-family: "Times New Roman", serif;
            font-size: 22px;
            margin: 10px 0 5px 0;
            font-weight: normal;
        }

        .instruction {
            text-align: center;
            font-weight: bold;
            font-size: 10px;
        }

        /* Form Tables */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0; /* Tables are stacked tight */
        }

        td, th {
            border: 0.5pt solid black;
            padding: 2px 4px;
            vertical-align: bottom; /* Aligns text like a form input line */
            height: 14px;
        }


        /* Utility Classes for Columns */
        .section-header {
            background-color: #fff;
            font-weight: bold;
            border-bottom: 1px solid black;
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

        /* Print Settings */
        @page {
            size: A4;
            margin: 15mm 10mm;
        }

        @media print {
            body { 
                margin: 0; 
                padding: 0;
            }
            .page-wrapper {
                margin: 0;
                padding: 0;
                page-break-after: always;
            }
            .page-header {
                position: relative;
                display: block;
            }
            .page-footer {
                position: relative;
                display: block;
            }
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

    <h1>Business - Credit Account Application</h1>
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
            <td colspan="1"></td>
            <td style="width: 150px;">Postcode:</td>
            <td style="width: 122px;"></td>
        </tr>
        <tr>
            <td class="label">Billing Address:</td>
            <td colspan="1"></td>
            <td>Postcode:</td>
            <td></td>
        </tr>
        <tr>
            <td class="label">Driver’s Licence No:</td>
            <td></td>
            <td class="label">D.O.B.</td>
            <td></td>
        </tr>
        <tr>
            <td class="label">Email Address:</td>
            <td></td>
            <td class="label">Mobile No:</td>
            <td></td>
        </tr>
    </table>

    <!-- Business Details -->
    <table style="margin-top: -1px;"> <!-- Negative margin to merge double borders -->
        <tr class="section-header" ><td height: 2px; colspan="6"></td></tr>
        <tr class="section-header"><td colspan="6">Business Details:</td></tr>
        <tr>
            <td class="label">Legal Name:</td>
            <td colspan="5"></td>
        </tr>
        <tr>
            <td class="label">Trading Name:</td>
            <td colspan="5"></td>
        </tr>
        <tr>
            <td class="label">GST No:</td>
            <td></td>
            <td class="label">Company Number:</td>
            <td></td>
            <td class="label">NZBN Number:</td>
            <td></td>
        </tr>
        <tr>
            <td class="label">Nature of Business:</td>
            <td colspan="3"></td>
            <td class="label">Date Incorp.</td>
            <td></td>
        </tr>
        <tr>
            <td class="label">Paid Up Capital: $</td>
            <td></td>
            <td class="label">Estimated Monthly Purchases: $</td>
            <td></td>
            <td class="label">Credit Limit Required: $</td>
            <td></td>
        </tr>
        <tr>
            <td class="label">Principal Place of Business is:</td>
            <td colspan="3" style="color: #555; font-style: italic;"></td>
            <td class="label">(to whom):</td>
            <td></td>
        </tr>
    </table>

    <!-- Directors Details -->
    <table style="margin-top: -1px;">
        <tr class="section-header"><td colspan="8">Directors Details:</td></tr>
        
        <!-- Director 1 -->
        <tr>
            <td class="label">(1) Full Name:</td>
            <td></td>
            <td class="label">D.O.B</td>
            <td></td>
            <td class="label">Mobile No:</td>
            <td></td>
            <td class="label">Driver’s Licence No:</td>
            <td></td>
        </tr>
        <tr>
            <td class="label">Private Address:</td>
            <td colspan="5"></td>
            <td class="label">Post Code:</td>
            <td></td>
        </tr>

        <!-- Director 2 -->
        <tr>
            <td class="label">(2) Full Name:</td>
            <td></td>
            <td class="label">D.O.B</td>
            <td></td>
            <td class="label">Mobile No:</td>
            <td></td>
            <td class="label">Driver’s Licence No:</td>
            <td></td>
        </tr>
        <tr>
            <td class="label">Private Address:</td>
            <td colspan="5"></td>
            <td class="label">Post Code:</td>
            <td></td>
        </tr>

        <!-- Director 3 -->
        <tr>
            <td class="label">(3) Full Name:</td>
            <td></td>
            <td class="label">D.O.B</td>
            <td></td>
            <td class="label">Mobile No:</td>
            <td></td>
            <td class="label">Driver’s Licence No:</td>
            <td></td>
        </tr>
        <tr>
            <td class="label">Private Address:</td>
            <td colspan="5"></td>
            <td class="label">Post Code:</td>
            <td></td>
        </tr>

        <!-- Director 4 -->
        <tr>
            <td class="label">(4) Full Name:</td>
            <td></td>
            <td class="label">D.O.B</td>
            <td></td>
            <td class="label">Mobile No:</td>
            <td></td>
            <td class="label">Driver’s Licence No:</td>
            <td></td>
        </tr>
        <tr>
            <td class="label">Private Address:</td>
            <td colspan="5"></td>
            <td class="label">Post Code:</td>
            <td></td>
        </tr>

        <!-- Director 5 -->
        <tr>
            <td class="label">(5) Full Name:</td>
            <td></td>
            <td class="label">D.O.B</td>
            <td></td>
            <td class="label">Mobile No:</td>
            <td></td>
            <td class="label">Driver’s Licence No:</td>
            <td></td>
        </tr>
        <tr>
            <td class="label">Private Address:</td>
            <td colspan="5"></td>
            <td class="label">Post Code:</td>
            <td></td>
        </tr>

        <!-- Director 6 -->
        <tr>
            <td class="label">(6) Full Name:</td>
            <td></td>
            <td class="label">D.O.B</td>
            <td></td>
            <td class="label">Mobile No:</td>
            <td></td>
            <td class="label">Driver’s Licence No:</td>
            <td></td>
        </tr>
        <tr>
            <td class="label">Private Address:</td>
            <td colspan="5"></td>
            <td class="label">Post Code:</td>
            <td></td>
        </tr>
    </table>

    <!-- Account Payment Terms -->
    <table style="margin-top: -1px;">
        <tr class="section-header"><td colspan="4">Account Payment Terms:</td></tr>
        <tr>
            <td class="label">Purchase Order Required?</td>
            <td></td>
            <td class="label">Accounts to be emailed?</td>
            <td></td>
        </tr>
        <tr>
            <td class="label">Accounts Email Address:</td>
            <td colspan="3"></td>
        </tr>
        <tr>
            <td class="label">Accounts Contact:</td>
            <td></td>
            <td class="label">Mobile No:</td>
            <td></td>
        </tr>
        <tr>
            <td class="label">Bank and Branch:</td>
            <td></td>
            <td class="label">Account No:</td>
            <td></td>
        </tr>
    </table>

    <!-- Trade References -->
    <table style="margin-top: -1px;">
        <tr class="section-header"><td colspan="3">Trade / Personal References:</td></tr>
        <tr style="text-align: center;">
            <td style="width: 30%;">Name:</td>
            <td style="width: 40%;">Company Name/ Address:</td>
            <td style="width: 30%;">Mobile No/ Email:</td>
        </tr>
        <tr>
            <td>1.</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>2.</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>3.</td>
            <td></td>
            <td></td>
        </tr>
    </table>

    <!-- Declaration -->
    <div class="declaration">
        I certify that the above information is true and correct and that I accept the supply of credit by the Supplier (if applicable). I have read and understood the TERMS 
        AND CONDITIONS OF TRADE (under mentioned) of FlinkGlobal Limited T/A FlinkTech which form part of and are intended to be read in conjunction with this Credit 
        account application and agree to be bound by these conditions. I authorise the use of my personal information as detailed in the Privacy Act clause therein.
    </div>

    <!-- Signatures -->
    <div class="signature-section">
        <div>SIGNED (CLIENT):</div>
    </div>
    <div class="signature-section" style="margin-top: 30px; font-weight: normal;">
        <div style="width: 40%; border-top: 1px solid black; padding-top: 2px;">Name:</div>
        <div style="width: 30%; border-top: 1px solid black; padding-top: 2px;">Position:</div>
        <div style="width: 20%; border-top: 1px solid black; padding-top: 2px;">Date:</div>
    </div>

    <!-- Footer Logo -->
    <div class="footer-logo">
        <span class="ec-logo">ec</span> <span style="color:#0099cc;">CREDIT CONTROL</span>
        <span style="margin-left: 10px;">Protected by EC Credit Control – Credit Management Specialists<br>© Copyright 1999 - 2023 - #35596</span>
    </div>
        </div>
    </div>

    <!-- Page Footer (repeats on every page) -->
    <div class="page-footer">
        <div class="container" style="border-top: 1px solid #ddd; padding-top: 5px;">
            <div style="display: flex; justify-content: space-between; align-items: center; font-size: 8px;">
                <div>
                    <strong>FlinkGlobal Limited T/A FlinkTech</strong><br>
                    23 Stewart Gibson Place, Manurewa, AUCKLAND 2105<br>
                    Phone: (09) 393 0900 | Email: contact@flinkglobal.com
                </div>
                <div style="text-align: right;">
                    Generated: {{ \Carbon\Carbon::now()->format('d/m/Y H:i') }}<br>
                    Application ID: {{ $app->id }}<br>
                    <span class="page-number" style="font-size: 9px;"><strong>Page 1</strong></span>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
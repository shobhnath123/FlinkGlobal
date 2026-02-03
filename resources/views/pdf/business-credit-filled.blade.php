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
            font-size: 15px;
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
            padding-bottom: 45mm;
            /* reserve space for footer */
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
            /* A4 Width */
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

        .logo-red {
            color: #C00000;
        }

        .logo-black {
            color: #000;
        }

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
            margin-bottom: 0;
            /* Tables are stacked tight */
            table-layout: fixed;
        }

        td,
        th {
            border: 1px solid #000;
            padding: 2px 4px;
            vertical-align: bottom;
            /* Aligns text like a form input line */
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
            width: 1%;
            /* Shrink to fit content */
        }

        .input-cell {
            /* Areas where user writes */
        }

        /* Specific Table Tweaks */
        .no-top-border {
            border-top: none;
        }

        .no-bottom-border {
            border-bottom: none;
        }

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
        /* ===============================
        GUARANTOR SECTION (ISOLATED)
        ================================ */

        .guarantor-section {
            margin-top: 10px;
            margin-bottom: 5px;
            page-break-inside: avoid;
        }

        .guarantor-section .guarantee-signatures {
            display: flex;
            gap: 20px;
            align-items: stretch;
        }

        .guarantor-section .guarantor-box {
            flex: 1;
            border: 2px solid #000;
            /* padding: 10px; */
            font-family: "Times New Roman", serif;
            font-size: 11px;
            min-height: 200px;
            line-height: 1;
        }

        .guarantor-section .guarantor-title {
            font-weight: bold;
            font-size: 13px;
            margin-bottom: 10px;
            border-bottom: 1px solid #000;
            padding-bottom: 4px;
        }

        /* rows */
        .guarantor-section .g-row {
            display: flex;
            align-items: baseline;
            margin-bottom: 6px;
        }

        .guarantor-section .g-label {
            min-width: 140px;
            /* font-weight: bold; */
            font-size: 10px;
        }

        /* input line */
        .guarantor-section .g-line {
            flex: 1;
            border-bottom: 1px solid #000;
            height: 12px;
        }

        /* deed row */
        .guarantor-section .g-deed {
            margin-top: 10px;
            font-size: 10px;
        }

        .guarantor-section .g-short {
            display: inline-block;
            width: 45px;
            border-bottom: 1px solid #000;
            margin: 0 5px;
        }

        .clause-text {
            font-size: 12px;
            /* main paragraph size */
            line-height: 1;
        }

        .clause-text .sub-list li {
            line-height: 1;
        }

        .clause-item {
            display: flex;

        }

        .clause-num {
            min-width: 15px;
            font-weight: bold;
        }

        /* second page */

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
                            <img src="https://flinktech.nz/wp-content/uploads/2021/05/flinktech_logo-1536x293-removebg-preview.png"
                                alt="flinktech" style="height: 35px; vertical-align: middle;">
                        </div>
                        <div class="sub-logos">
                            <img src="https://www.fervour.info/wp-content/uploads/2024/03/fervour-logo.webp"
                                alt="Fervour" style="height: 22px; vertical-align: middle;">
                            <img src="https://flinkglobal.com/uvw/wp-content/uploads/2020/10/logo-small-1.png" alt="UvW"
                                style="height: 22px; vertical-align: middle;">
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
                    To Be Completed by Applicants - Please complete all sections and read the Terms and Conditions of
                    Trade under mentioned.
                </div>

                <!-- Client Details -->
                <table>
                    <tr class="section-header">
                        <td colspan="4">Client Details:</td>
                    </tr>
                    <tr>
                        <td class="label">Full Name (Contact Person):</td>
                        <td colspan="3">{{ $app->contact_person }}</td>
                    </tr>
                    <tr>
                        <td class="label">Physical Address:</td>
                        <td colspan="1">{{ $app->physical_address }}</td>
                        <td style="width: 122px;">Postcode:</td>
                        <td style="width: 122px;">{{ $app->postcode_phy }}
            </div>
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
                <tr>
                    <td colspan="6" style="height: 4px; padding: 0;"></td>
                </tr>
                <tr class="section-header">
                    <td colspan="6">Business Details:</td>
                </tr>
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
                <tr class="section-header">
                    <td colspan="8">Directors Details:</td>
                </tr>
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
                <tr>
                    <td colspan="4" style="height: 4px; padding: 0;"></td>
                </tr>
                <tr class="section-header">
                    <td colspan="4">Account Payment Terms:</td>
                </tr>
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
                <tr>
                    <td colspan="3" style="height: 4px; padding: 0;"></td>
                </tr>
                <tr class="section-header">
                    <td colspan="3">Trade / Personal References:</td>
                </tr>
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
                        <td colspan="3" style="text-align: center; color: #999;"></td>
                    </tr>
                @endforelse
            </table>

            <!-- Guarantors Section -->
            <table style="margin-top: -1px;">
                <tr class="section-header">
                    <td colspan="4">Personal/Directors Guarantee and Indemnity:</td>
                </tr>
                @forelse($app->guarantors as $guarantor)
                    <tr>
                        <td colspan="4" style="font-weight: bold;">Guarantor {{ $loop->iteration }} -
                            {{ $guarantor->full_name }}
                        </td>
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
                        <td colspan="4" style="text-align: center; color: #999;"></td>
                    </tr>
                @endforelse
            </table>
        </div>
    </div>
    <!-- FOOTER -->
    <div class="page-footer">
        <!-- Declaration -->
        <div class="declaration">
            <strong>Declaration:</strong> I certify that the above information is true and correct and that I accept the
            supply of credit by the Supplier (if applicable). I have read and understood the TERMS AND CONDITIONS OF
            TRADE of FlinkGlobal Limited T/A FlinkTech which form part of and are intended to be read in conjunction
            with this Credit account application and agree to be bound by these conditions. I authorise the use of my
            personal information as detailed in the Privacy Act clause therein.
        </div>
        <div class="footer-inner">
            <div class="footer-left">
                <div class="signature-row">
                    <span style="width: 200px;">Name: {{ $app->contact_person }}</span>
                    <span style="width: 200px;">Position: {{ $app->signed_position }}</span>
                    <span style="width: 150px;">Date:
                        {{ \Carbon\Carbon::parse($app->signed_date)->format('d/m/Y') }}</span>
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
    <div class="second-page">
        <!-- Page Header (repeats on every page) -->
        <div class="page-header">
            <div class="container">
                <div class="header">
                    <div class="logo-section">
                        <div class="main-logo">
                            <img src="https://flinktech.nz/wp-content/uploads/2021/05/flinktech_logo-1536x293-removebg-preview.png"
                                alt="flinktech" style="height: 35px; vertical-align: middle;">
                        </div>
                        <div class="sub-logos">
                            <img src="https://www.fervour.info/wp-content/uploads/2024/03/fervour-logo.webp"
                                alt="Fervour" style="height: 22px; vertical-align: middle;">
                            <img src="https://flinkglobal.com/uvw/wp-content/uploads/2020/10/logo-small-1.png" alt="UvW"
                                style="height: 22px; vertical-align: middle;">
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
        <!-- PAGE 2: GUARANTEE -->
        <div class="guarantee-and-indemnity">
            <h2 style="font-size: 15px;">Personal/Directors Guarantee and Indemnity</h2>
            <p style="font-size: 15px;"><strong>IN CONSIDERATION</strong> of Flinkglobal Limited T/A FlinkTech and its
                successors and assigns (“the Supplier”) at the request of the Guarantor (as is now acknowledged)
                supplying and continuing to supply goods and/or services to:</p>
            <input type="text" value="{{ $app->contact_person }}">&nbsp;&nbsp;&nbsp;&nbsp(“the Client”)
            <p></p>
            <div class="document-container">
                <h1 style="border: none">I/WE (also referred to as the “Guarantor/s”) UNCONDITIONALLY AND IRREVOCABLY:
                </h1>
                <div class="legal-text">
                    <div class="clauses-list">
                        <div class="clause-item">
                            <div class="clause-num">1.</div>
                            <div class="clause-text">
                                <strong>GUARANTEE</strong> the due and punctual payment to the Supplier of all monies
                                which are now owing to the Supplier by the Client and all further sums of money from
                                time to time owing to the Supplier by the Client in respect of goods and services
                                supplied or to be supplied by the Supplier to the Client or any other liability of the
                                Client to the Supplier, and the due observance and performance by the Client of all its
                                obligations contained or implied in any contract or agreement with the Supplier,
                                including but not limited to the Terms & Conditions of Trade signed by the Client and
                                annexed to this Guarantee and Indemnity. If for any reason the Client does not pay any
                                amount owing to the Supplier, the Guarantor will immediately on demand pay the relevant
                                amount to the Supplier. In consideration of the Supplier agreeing to supply the goods
                                and/or services to the Client, the Guarantor charges all of its right, title and
                                interest (joint or several) in any land, realty or other assets capable of being
                                charged, owned by the Guarantor now or in the future, to secure the performance by the
                                Guarantor of its obligations under this Guarantee and Indemnity (including, but not
                                limited to, the payment of any money) and the Guarantor acknowledges that this personal
                                guarantee and indemnity constitutes a security agreement for the purposes of the
                                Personal Property Securities Act 1999 (“PPSA”) and unequivocally consents to the
                                Supplier registering any interest so charged. Furthermore, it is agreed by both parties
                                that where the Guarantor is acting in the capacity as a trustee for a trust, then the
                                Guarantor agrees to charge all its right title and interest in any land realty, or other
                                assets capable of being charged in its own capacity and in its capacity as trustee and
                                shall be subject to the PPSA Registration as stated above. The Guarantor irrevocably
                                appoints the Supplier and each director of the Supplier as the Guarantor’s true and
                                lawful attorney/s to perform all necessary acts to give effect to this clause including,
                                but not limited to, signing any document on the Guarantor’s behalf which the Supplier
                                may reasonably require to:
                                <ol class="sub-list" type="a">
                                    <li>register a financing statement or financing change statement in relation to a
                                        security interest on the Personal Property Securities Register;</li>
                                    <li>register any other document required to be registered by the PPSA or any other
                                        law; or</li>
                                    <li>correct a defect in a statement referred to in clause 1(a) or 1(b).</li>
                                </ol>
                            </div>
                        </div>
                        <div class="clause-item">
                            <div class="clause-num">2.</div>
                            <div class="clause-text">
                                <strong>HOLD HARMLESS AND INDEMNIFY</strong>the Supplier on demand as a separate
                                obligation against any liability (including but not limited to damages, costs, losses
                                and legal fees calculated on a solicitor and own client basis) incurred by, or assessed
                                against, the Supplier in connection with:
                                <ol class="sub-list" type="a">
                                    <li>the supply of goods and/or services to the Client; or</li>
                                    <li>the recovery of monies owing to the Supplier by the Client including the
                                        enforcement of this Guarantee and Indemnity, and including but not limited to
                                        the Supplier’s nominees’ costs of collection and legal costs; or</li>
                                    <li>monies paid by the Supplier with the Client’s consent in settlement of a dispute
                                        that arises or results from a dispute between, the Supplier, the Client, and a
                                        third party or any combination thereof, over the supply of goods and/or services
                                        by the Supplier to the Client.</li>
                                </ol>
                            </div>
                        </div>
                        <div class="clause-item">
                            <div class="clause-text"> <strong>I/WE FURTHER ACKNOWLEDGE AND AGREE THAT</strong></div>
                        </div>
                        <div class="clause-item">
                            <div class="clause-num">3.</div>
                            <div class="clause-text">
                                I/We have received, read, and understood the Supplier’s Terms and Conditions prior to
                                entering into this Guarantee and Indemnity and agree to be bound by those Terms and
                                Conditions.
                            </div>
                        </div>
                        <div class="clause-item">
                            <div class="clause-num">4.</div>
                            <div class="clause-text">
                                This Guarantee and Indemnity shall constitute an unconditional and continuing Guarantee
                                and Indemnity and accordingly shall be irrevocable and remain in full force and effect
                                until all monies owing to the Supplier by the Client and all obligations herein have
                                been fully paid satisfied and performed.
                            </div>
                        </div>
                        <div class="clause-item">
                            <div class="clause-num">5.</div>
                            <div class="clause-text">
                                No granting of credit, extension of further credit, or granting of time and no waiver,
                                indulgence, or neglect to sue on the Supplier’s part (whether in respect of the Client
                                or any one or more of any other Guarantor(s) or otherwise) and no failure by any named
                                Guarantor to properly execute this Guarantee and Indemnity shall impair or limit the
                                liability under this Guarantee and Indemnity of any Guarantor. Without affecting the
                                Client’s obligations to the Supplier, each Guarantor shall be a principal debtor and
                                liable to the Supplier accordingly.
                            </div>
                        </div>
                        <div class="clause-item">
                            <div class="clause-num">6.</div>
                            <div class="clause-text">
                                The liability under this Guarantee and Indemnity shall not be discharged, abrogated,
                                prejudiced, or affected by:
                                <ol class="sub-list" type="a">
                                    <li>any alteration, modification, variation or addition to any contract or agreement
                                        in respect of the supply of goods and/or services;</li>
                                    <li>the liquidation, receivership, administration, bankruptcy, dissolution,
                                        compromise or scheme of arrangement in respect of the Client; </li>
                                    <li>any other act, omission, or event which, but for this provision, might operate
                                        to discharge, impair, or otherwise affect any obligations under this Guarantee
                                        and Indemnity of any of the rights, powers or remedies conferred by this
                                        Guarantee and Indemnity or by law.</li>
                                </ol>
                            </div>
                        </div>
                        <div class="clause-item">
                            <div class="clause-num">7.</div>
                            <div class="clause-text">
                                The term "Guarantor" whenever used in this Guarantee and Indemnity shall, if there is
                                more than one person named as Guarantor, mean, and refer to each of them individually
                                and all of them together unless the context otherwise requires, the obligations and
                                agreements on the part of the Guarantor, shall include the Guarantor's executors,
                                administrators, successors and permitted assignments (where applicable) contained in
                                this Guarantee and Indemnity shall bind them jointly and severally.
                            </div>
                        </div>
                        <div class="clause-item">
                            <div class="clause-num">8.</div>
                            <div class="clause-text"><strong>I/We have been advised to obtain independent legal advice
                                    before executing this Guarantee and Indemnity. I/we understand that I/we am/are
                                    liable for all amounts owing (both now and in the future) by the Client to the
                                    Supplier.</strong></div>
                        </div>
                        <div class="clause-item">
                            <div class="clause-num">9.</div>
                            <div class="clause-text">
                                I/we irrevocably authorise the Supplier to obtain from any person or company any
                                information which the Supplier may require for credit reference purposes. I/We further
                                irrevocably authorise the Supplier to provide to any third party, in response to credit
                                references and enquiries about me/us or by way of information exchange with credit
                                reference agencies, details of this Guarantee and Indemnity and any subsequent dealings
                                that I/we may have with the Supplier as a result of this Guarantee and Indemnity being
                                actioned by the Supplier.
                            </div>
                        </div>
                        <div class="clause-item">
                            <div class="clause-num">10.</div>
                            <div class="clause-text">
                                The above information is to be used by the Supplier for all purposes in connection with
                                the Supplier considering this Guarantee and Indemnity and the subsequent enforcement of
                                the same. For and on behalf of the Client I/We confirm I/We have read, understood, and
                                accept the terms of this Guarantee and Indemnity, and I/We agree to be bound by this
                                Guarantee and Indemnity.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <!-- Guarantor 1 -->
                <div class="guarantor-section">
                    <div class="guarantee-signatures">
                        @forelse($app->guarantors as $index => $guarantor)
                            <div class="guarantor-box">
                                <div class="guarantor-title">
                                    GUARANTOR-{{ $index + 1 }}
                                </div>
                                <div class="g-row">
                                    <span class="g-label">SIGNED:</span>
                                    <div class="g-line"></div>
                                </div>
                                <div class="g-row">
                                    <span class="g-label">FULL NAME:</span>
                                    <div class="g-line">{{ $guarantor->full_name }}</div>
                                </div>
                                <div class="g-row">
                                    <span class="g-label">HOME ADDRESS:</span>
                                    <div class="g-line">{{ $guarantor->address }}</div>
                                </div>
                                <div class="g-row">
                                    <span class="g-label">DATE OF BIRTH:</span>
                                    <div class="g-line">
                                        {{ \Carbon\Carbon::parse($guarantor->dob)->format('d/m/Y') }}
                                    </div>
                                </div>
                                <div class="g-row">
                                    <span class="g-label">SIGNATURE OF WITNESS:</span>
                                    <div class="g-line"></div>
                                </div>
                                <div class="g-row">
                                    <span class="g-label">NAME OF WITNESS:</span>
                                    <div class="g-line">{{ $guarantor->witness_name }}</div>
                                </div>
                                <div class="g-row">
                                    <span class="g-label">OCCUPATION:</span>
                                    <div class="g-line">{{ $guarantor->witness_occupation }}</div>
                                </div>
                                <div class="g-row">
                                    <span class="g-label">PRESENT ADDRESS:</span>
                                    <div class="g-line">{{ $guarantor->witness_address }}</div>
                                </div>
                                <!-- <div class="g-deed">
                                        EXECUTED as a Deed this
                                        <span class="g-short"></span>
                                        day of
                                        <span class="g-short"></span>
                                        20__
                                    </div> -->
                            </div>
                        @empty
                            <p>No guarantors found.</p>
                        @endforelse

                    </div>
                </div>
            </div>
            <div class="notes">
                <strong>Notes:</strong><br>
                1. If the Client is a proprietary limited company, the Guarantor(s) must be the director(s)of the
                company.<br>
                2. If the Client is a limited partnership, the Guarantor(s) must be the general partners.<br>
                3. If the Client is a sole trader or partnership the Guarantor(s) should be some other suitable
                person(s).<br>
                3. If the Client is a club or incorporated society the Guarantor(s) should be the president and
                secretary or other committee member<br>
            </div>
            <p style="text-align:end; font-size:10px;">u ©Copyright - EC Credit Control 1999 - 2024 – #35596</p>
        </div>
    </div>
    <div style="page-break-before: always;"></div>
    {{-- Terms and Conditions on new page --}}
    @include('business-credit-account-tc')
</body>

</html>
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | PDF Generation Service
    |--------------------------------------------------------------------------
    |
    | This option controls which PDF generation service to use.
    | Supported: "pdfshift", "dompdf"
    |
    | For production with exact design match, use "pdfshift" with API key
    | Sign up at https://pdfshift.io (free trial available)
    |
    */

    'service' => env('PDF_SERVICE', 'dompdf'),

    /*
    |--------------------------------------------------------------------------
    | HTML2PDF Configuration
    |--------------------------------------------------------------------------
    |
    | html2pdf.app is a free service (50 PDFs/month on free tier)
    | For production, consider upgrading or using a paid alternative
    |
    */

    'html2pdf' => [
        'api_url' => 'https://api.html2pdf.app/v1/generate',
        'timeout' => 30,
    ],

    /*
    |--------------------------------------------------------------------------
    | PDFShift Configuration
    |--------------------------------------------------------------------------
    |
    | PDFShift.io is a premium service with better reliability
    | Sign up at https://pdfshift.io to get your API key
    |
    */

    'pdfshift' => [
        'api_key' => env('PDFSHIFT_API_KEY', ''),
        'api_url' => 'https://api.pdfshift.io/v3/convert/pdf',
        'timeout' => 30,
    ],

    /*
    |--------------------------------------------------------------------------
    | Default PDF Options
    |--------------------------------------------------------------------------
    */

    'options' => [
        'format' => 'A4',
        'margin' => [
            'top' => '15mm',
            'right' => '10mm',
            'bottom' => '15mm',
            'left' => '10mm',
        ],
        'printBackground' => true,
        'displayHeaderFooter' => false,
        'preferCSSPageSize' => true,
    ],

];

# Quick Reference: PDF Generation

## Current Status
✅ **READY TO USE** - Using html2pdf.app (50 free PDFs/month)

## How It Works
1. Form submitted → Job queued
2. Job generates HTML from Blade template
3. PdfService sends HTML to external API
4. API returns perfect PDF (using real browser)
5. PDF attached to email and sent

## Switch to Production Service

### PDFShift (Recommended for Production)
```bash
# In your .env file, add:
PDF_SERVICE=pdfshift
PDFSHIFT_API_KEY=your_api_key_here
```

Then run:
```bash
php artisan config:clear
```

## Force DomPDF (Fallback)
```bash
# In your .env file, add:
PDF_SERVICE=dompdf
```

## Check Logs
```bash
tail -f storage/logs/laravel.log
```

## Test PDF Generation
1. Go to: http://localhost/flinktech/cash-account
2. Fill and submit form
3. Check email for PDF attachment

## Files to Deploy
- ✅ app/Services/PdfService.php
- ✅ app/Jobs/ProcessCashApplication.php
- ✅ app/Jobs/ProcessCreditApplication.php
- ✅ app/Http/Controllers/CashAccountApplicationController.php
- ✅ app/Http/Controllers/BusinessAccountController.php
- ✅ config/pdf.php

## Support
- html2pdf.app: https://html2pdf.app
- PDFShift.io: https://pdfshift.io
- Documentation: See PDF_SERVICE_README.md

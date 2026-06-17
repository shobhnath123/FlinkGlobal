# PDF Generation Service

This application uses an external PDF generation service to create high-quality PDFs that match the original design exactly.

## How It Works

The `PdfService` class sends your HTML to an external API that uses a real browser engine (like Chrome) to render the PDF, giving you the same quality as Browsershot without requiring Node.js on your server.

## Current Setup

- **Service**: html2pdf.app (Free tier: 50 PDFs/month)
- **Fallback**: DomPDF (if API fails or is unavailable)

## For Production Use

The free tier of html2pdf.app is limited to 50 PDFs per month. For production, you have several options:

### Option 1: Upgrade html2pdf.app
Visit https://html2pdf.app/pricing to upgrade to a paid plan.

### Option 2: Switch to PDFShift (Recommended for Production)
1. Sign up at https://pdfshift.io
2. Get your API key
3. Add to your `.env` file:
   ```
   PDF_SERVICE=pdfshift
   PDFSHIFT_API_KEY=your_api_key_here
   ```

### Option 3: Use DocRaptor
1. Sign up at https://docraptor.com
2. Update `PdfService.php` to use DocRaptor API

### Option 4: Install Node.js on cPanel
If your hosting supports it:
1. Install Node.js via cPanel
2. Install Puppeteer: `npm install -g puppeteer`
3. Revert to using Browsershot in your code

## Testing

To test the PDF generation:
1. Submit a form (Cash or Credit Account)
2. Check your email for the PDF attachment
3. The PDF should match the original design exactly

## Troubleshooting

If PDFs don't look right:
- Check `storage/logs/laravel.log` for errors
- The system will automatically fall back to DomPDF if the API fails
- You can force DomPDF by setting `PDF_SERVICE=dompdf` in `.env`

## Files Modified

- `app/Services/PdfService.php` - Main PDF generation service
- `app/Jobs/ProcessCashApplication.php` - Updated to use PdfService
- `app/Jobs/ProcessCreditApplication.php` - Updated to use PdfService
- `app/Http/Controllers/CashAccountApplicationController.php` - Updated preview method
- `app/Http/Controllers/BusinessAccountController.php` - Updated preview methods
- `config/pdf.php` - Configuration file for PDF service

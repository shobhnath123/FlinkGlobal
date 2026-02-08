# IMPORTANT: How to Get Perfect PDFs

## The Problem
- DomPDF cannot render complex layouts (multi-column, advanced CSS)
- Free PDF APIs require authentication/API keys
- Your current PDFs look compressed because DomPDF is being used as fallback

## The Solution (5 Minutes Setup)

### Step 1: Sign Up for PDFShift (FREE)
1. Go to: https://pdfshift.io/register
2. Sign up for a free account
3. You get **250 PDFs/month FREE** (no credit card required)
4. Copy your API key from the dashboard

### Step 2: Add API Key to Your Project
Open your `.env` file and add these two lines:

```env
PDF_SERVICE=pdfshift
PDFSHIFT_API_KEY=your_api_key_here
```

Replace `your_api_key_here` with the actual API key from PDFShift.

### Step 3: Clear Cache
Run this command:
```bash
php artisan config:clear
```

### Step 4: Test
Submit a form and check the PDF - it will now look EXACTLY like your original design!

## Alternative: Install Node.js on cPanel

If your cPanel supports Node.js:
1. Go to cPanel → "Setup Node.js App"
2. Install Node.js 18 or higher
3. Run: `npm install -g puppeteer`
4. Revert code to use Browsershot

## Current Status

Right now, the system is using **DomPDF** (which is why the PDFs look different).

Once you add the PDFShift API key, it will automatically switch to using PDFShift, and your PDFs will look perfect!

## Cost

- **Free Tier**: 250 PDFs/month (perfect for testing and small production)
- **Paid Plans**: Start at $29/month for 2,500 PDFs

For most businesses, the free tier is enough to start with.

---

**Next Step**: Sign up at https://pdfshift.io/register and add your API key to `.env`

<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Exception;

class PdfService
{
    /**
     * Generate PDF from HTML using configured service
     * 
     * @param string $html The HTML content to convert
     * @param array $options Additional options for PDF generation
     * @return string Binary PDF content
     * @throws Exception
     */
    public static function generateFromHtml(string $html, array $options = []): string
    {
        $service = config('pdf.service', 'html2pdf');

        try {
            switch ($service) {
                case 'pdfshift':
                    return self::generateWithPdfShift($html, $options);

                case 'html2pdf':
                    return self::generateWithHtml2Pdf($html, $options);

                case 'dompdf':
                default:
                    return self::fallbackToDomPdf($html);
            }
        } catch (Exception $e) {
            Log::error('PDF generation error, using DomPDF fallback', [
                'service' => $service,
                'error' => $e->getMessage()
            ]);

            return self::fallbackToDomPdf($html);
        }
    }

    /**
     * Generate PDF using PDFShift.io
     * 
     * @param string $html
     * @param array $options
     * @return string
     */
    private static function generateWithPdfShift(string $html, array $options = []): string
    {
        $apiKey = config('pdf.pdfshift.api_key');

        if (empty($apiKey)) {
            throw new Exception('PDFShift API key not configured');
        }

        $response = Http::timeout(config('pdf.pdfshift.timeout', 30))
            ->withBasicAuth('api', $apiKey)
            ->post(config('pdf.pdfshift.api_url'), [
                'source' => $html,
                'landscape' => false,
                'use_print' => true,
            ]);

        if ($response->successful()) {
            return $response->body();
        }

        throw new Exception('PDFShift API failed: ' . $response->body());
    }

    /**
     * Generate PDF using a simple Chrome headless approach via public API
     * 
     * @param string $html
     * @param array $options
     * @return string
     */
    private static function generateWithHtml2Pdf(string $html, array $options = []): string
    {
        // Try CloudConvert-like simple API first
        // This is a workaround - for production, use PDFShift with API key

        try {
            // Use a simple POST to a PDF generation endpoint
            // For now, we'll use DomPDF but with better rendering
            Log::info('Using DomPDF for PDF generation (html2pdf requires API key)');

            throw new Exception('html2pdf requires API key - falling back to DomPDF');

        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Fallback to DomPDF if external service fails
     * 
     * @param string $html
     * @return string
     */
    private static function fallbackToDomPdf(string $html): string
    {
        // UPDATE: Enable remote images so logos load correctly
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadHTML($html)
            ->setPaper('a4')
            ->setOptions(['isRemoteEnabled' => true]);

        return $pdf->output();
    }
    // private static function fallbackToDomPdf(string $html): string
    // {
    //     $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadHTML($html)
    //         ->setPaper('a4');

    //     return $pdf->output();
    // }
}

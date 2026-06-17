<!DOCTYPE html>
<html>
<body style="margin:0; padding:0; background-color:#f4f6f8; font-family: Arial, Helvetica, sans-serif;">
    <table width="100%" cellpadding="0" cellspacing="0">
    {{-- <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f4f6f8; padding:20px 0;"> --}}
        <tr>
            <td align="">
                <table width="" cellpadding="0" cellspacing="0"
                    style="background:#ffffff; border-radius:6px; padding:30px;">
                    <tr>
                        <td style="font-size:14px; color:#333333; line-height:1.6;">
                            <p>Dear {{ $recipientName }},</p>
                            <p>We hope this email finds you well.</p>
                            <p>
                                As part of our ongoing engagement with <strong>FlinkGlobal Limited</strong>, please find
                                attached the Account Application document that requires your authorized signature for
                                processing.
                            </p>
                            <p style="font-weight:bold; margin-top:20px;">ACTION REQUIRED:</p>
                            <p>Kindly sign the attached document using one of the following methods:</p>
                            <p><strong>1. Digital Signature (Preferred)</strong></p>
                            <ul style="padding-left:20px;">
                                <li>Open the PDF using Adobe Acrobat Reader, DocuSign, or any e-signature platform</li>
                                <li>Apply your digital signature electronically</li>
                                <li>Save and secure the signed document</li>
                            </ul>
                            <p><strong>2. Print & Sign</strong></p>
                            <ul style="padding-left:20px;">
                                <li>Print the attached document</li>
                                <li>Sign physically in the designated signature field</li>
                                <li>Scan the complete signed document as PDF</li>
                            </ul>
                            <p><strong>3. Mobile Signature</strong></p>
                            <ul style="padding-left:20px;">
                                <li>Open the PDF on your mobile device</li>
                                <li>Use your finger or stylus to sign directly on the document</li>
                                <li>Save as PDF</li>
                            </ul>
                            <p>
                                Once signed, please reply to this email with the signed Account Application attached.
                            </p>
                            <p style="margin-top:20px;">
                                <strong>Document Details:</strong><br>
                                Company: FlinkGlobal Limited<br>
                                Document Type: Account Application Form
                            </p>
                            <p>
                                Thank you for your prompt attention to this matter. We look forward to your response.
                            </p>
                            <p style="margin-top:25px;">
                                Best regards,<br>
                                <strong>Team FlinkGlobal</strong>
                                <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('flinktech_logo.png'))) }}" alt="FlinkGlobal Logo" style="display:block; margin-top:10px; width:120px;">  
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>

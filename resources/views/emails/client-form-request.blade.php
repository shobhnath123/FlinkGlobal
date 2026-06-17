<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Application Request</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px;">
    
    <div style="text-align: center; margin-bottom: 30px;">
        <h2>FlinkTech Application</h2>
    </div>

    <div style="background-color: #f9f9f9; padding: 30px; border-radius: 8px; border: 1px solid #e1e1e1;">
        <h3 style="margin-top: 0;">Hello,</h3>
        
        <p>You have been requested to complete a <strong>Business {{ ucfirst($formRequest->form_type) }} Application</strong> for FlinkTech.</p>
        
        <p>Please click the button below to securely access and fill out your application form. Your email address has been pre-filled for your convenience.</p>
        
        <div style="text-align: center; margin: 35px 0;">
            <a href="{{ route('client.form.show', $formRequest->token) }}" style="background-color: #2563eb; color: #ffffff; padding: 12px 24px; text-decoration: none; border-radius: 4px; font-weight: bold; display: inline-block;">
                Complete Application
            </a>
        </div>
        
        <p style="font-size: 14px; color: #666; margin-top: 30px; border-top: 1px solid #eee; pt-4;">
            If the button above does not work, please copy and paste the following URL into your browser:<br>
            <a href="{{ route('client.form.show', $formRequest->token) }}" style="color: #2563eb; word-break: break-all;">
                {{ route('client.form.show', $formRequest->token) }}
            </a>
        </p>
    </div>
    
    <div style="text-align: center; margin-top: 30px; font-size: 12px; color: #999;">
        <p>&copy; {{ date('Y') }} FlinkTech. All rights reserved.</p>
    </div>

</body>
</html>

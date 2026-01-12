{{--
Email template for resource request confirmation.
Sent when users submit the Impact Brief request form.
--}}
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="font-family: 'Helvetica Neue', Arial, sans-serif; line-height: 1.6; color: #1f2937; background-color: #f8f9fc; margin: 0; padding: 0;">
    <div style="max-width: 600px; margin: 0 auto; padding: 2rem; background-color: #ffffff;">
        <img src="{{ asset('images/logo.png') }}" alt="CEIQ" style="height: 32px; margin-bottom: 2rem;">

        <h1 style="color: #111827; font-size: 1.5rem; margin-bottom: 1rem; font-weight: 700;">
            Hi {{ $resourceRequest->name }},
        </h1>

        <p style="color: #4b5563; font-size: 1rem; margin-bottom: 1rem;">
            Thank you for your interest in the CEIQ Impact Brief! As a {{ $resourceRequest->role }},
            you understand the importance of data-driven community engagement.
        </p>

        <p style="color: #4b5563; font-size: 1rem; margin-bottom: 0.5rem;">
            Your Impact Brief includes:
        </p>
        <ul style="color: #4b5563; font-size: 1rem; margin-bottom: 1.5rem; padding-left: 1.5rem;">
            <li style="margin-bottom: 0.5rem;">Action Gap Radar visualization</li>
            <li style="margin-bottom: 0.5rem;">Implementation checklist</li>
            <li style="margin-bottom: 0.5rem;">Ready-to-send stakeholder story template</li>
        </ul>

        @if($resourceRequest->wants_preview)
        <p style="margin: 2rem 0; text-align: center;">
            <a href="#" style="display: inline-block; background-color: #2563eb; color: white; padding: 0.75rem 1.5rem; border-radius: 0.5rem; text-decoration: none; font-weight: 600;">
                Download Your Impact Brief
            </a>
        </p>
        @endif

        <p style="color: #4b5563; font-size: 1rem; margin-bottom: 1rem;">
            Have questions? Reply to this email and we'll be happy to help.
        </p>

        <hr style="border: none; border-top: 1px solid #e5e7eb; margin: 2rem 0;">

        <p style="color: #6b7280; font-size: 0.875rem; margin-bottom: 0.5rem;">
            Best regards,<br>
            <strong>The CEIQ Team</strong>
        </p>

        <p style="color: #9ca3af; font-size: 0.75rem; margin-top: 2rem;">
            CEIQ, Inc. | <a href="https://ceiqinc.com" style="color: #2563eb;">ceiqinc.com</a>
        </p>
    </div>
</body>
</html>

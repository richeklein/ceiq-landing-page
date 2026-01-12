{{--
Email template for demo request notification.
Sent to sales team when users submit the demo request form.
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
            New Demo Request
        </h1>

        <p style="color: #4b5563; font-size: 1rem; margin-bottom: 1.5rem;">
            A new demo request has been submitted. Here are the details:
        </p>

        <table style="width: 100%; border-collapse: collapse; margin-bottom: 1.5rem;">
            <tr>
                <td style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb; font-weight: 600; color: #374151; width: 140px;">Name</td>
                <td style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb; color: #1f2937;">{{ $demoRequest->name }}</td>
            </tr>
            <tr>
                <td style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb; font-weight: 600; color: #374151;">Email</td>
                <td style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb; color: #1f2937;">
                    <a href="mailto:{{ $demoRequest->email }}" style="color: #2563eb;">{{ $demoRequest->email }}</a>
                </td>
            </tr>
            @if($demoRequest->organization)
            <tr>
                <td style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb; font-weight: 600; color: #374151;">Organization</td>
                <td style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb; color: #1f2937;">{{ $demoRequest->organization }}</td>
            </tr>
            @endif
            <tr>
                <td style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb; font-weight: 600; color: #374151;">Submitted</td>
                <td style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb; color: #1f2937;">{{ $demoRequest->created_at->format('M j, Y \a\t g:i A') }}</td>
            </tr>
        </table>

        @if($demoRequest->questions)
        <div style="background-color: #f3f4f6; border-radius: 0.5rem; padding: 1rem; margin-bottom: 1.5rem;">
            <h3 style="color: #374151; font-size: 0.875rem; font-weight: 600; margin: 0 0 0.5rem 0; text-transform: uppercase; letter-spacing: 0.05em;">Questions / Comments</h3>
            <p style="color: #1f2937; font-size: 1rem; margin: 0; white-space: pre-wrap;">{{ $demoRequest->questions }}</p>
        </div>
        @endif

        <p style="margin: 2rem 0; text-align: center;">
            <a href="mailto:{{ $demoRequest->email }}?subject=Re: CEIQ Demo Request" style="display: inline-block; background-color: #2563eb; color: white; padding: 0.75rem 1.5rem; border-radius: 0.5rem; text-decoration: none; font-weight: 600;">
                Reply to {{ $demoRequest->name }}
            </a>
        </p>

        <hr style="border: none; border-top: 1px solid #e5e7eb; margin: 2rem 0;">

        <p style="color: #9ca3af; font-size: 0.75rem; margin-top: 2rem;">
            CEIQ, Inc. | <a href="https://ceiqinc.com" style="color: #2563eb;">ceiqinc.com</a>
        </p>
    </div>
</body>
</html>

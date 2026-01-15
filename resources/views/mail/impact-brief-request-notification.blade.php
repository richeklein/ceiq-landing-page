{{--
Email notification sent to the CEIQ team when someone requests the Impact Brief.
Contains the requester's details for follow-up.
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
            New Impact Brief Request
        </h1>

        <p style="color: #4b5563; font-size: 1rem; margin-bottom: 1.5rem;">
            Someone has requested the CEIQ Impact Brief. Here are their details:
        </p>

        <table style="width: 100%; border-collapse: collapse; margin-bottom: 1.5rem;">
            <tr>
                <td style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb; font-weight: 600; color: #374151; width: 140px;">Name</td>
                <td style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb; color: #4b5563;">{{ $resourceRequest->name }}</td>
            </tr>
            <tr>
                <td style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb; font-weight: 600; color: #374151;">Email</td>
                <td style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb; color: #4b5563;">
                    <a href="mailto:{{ $resourceRequest->email }}" style="color: #2563eb;">{{ $resourceRequest->email }}</a>
                </td>
            </tr>
            <tr>
                <td style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb; font-weight: 600; color: #374151;">Role</td>
                <td style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb; color: #4b5563;">{{ $resourceRequest->role }}</td>
            </tr>
            @if($resourceRequest->organization)
            <tr>
                <td style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb; font-weight: 600; color: #374151;">Organization</td>
                <td style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb; color: #4b5563;">{{ $resourceRequest->organization }}</td>
            </tr>
            @endif
            <tr>
                <td style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb; font-weight: 600; color: #374151;">Newsletter</td>
                <td style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb; color: #4b5563;">{{ $resourceRequest->wants_preview ? 'Yes, opted in' : 'No' }}</td>
            </tr>
            <tr>
                <td style="padding: 0.75rem; font-weight: 600; color: #374151;">Requested At</td>
                <td style="padding: 0.75rem; color: #4b5563;">{{ $resourceRequest->created_at->format('M j, Y \a\t g:i A') }}</td>
            </tr>
        </table>

        
        <hr style="border: none; border-top: 1px solid #e5e7eb; margin: 2rem 0;">

        <p style="color: #9ca3af; font-size: 0.75rem;">
            This is an automated notification from the CEIQ website.
        </p>
    </div>
</body>
</html>

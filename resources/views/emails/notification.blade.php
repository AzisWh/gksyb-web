<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>
</head>
<body style="margin:0;padding:0;background-color:#f4f6f8;font-family:Arial,Helvetica,sans-serif;">
    
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center" style="padding:40px 10px;">
                
                <table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff;border-radius:10px;overflow:hidden;box-shadow:0 10px 25px rgba(0,0,0,0.1);">
                    
                    <tr>
                        <td style="background:#0f172a;padding:20px;text-align:center;">
                            <h1 style="margin:0;color:#ffffff;font-size:22px;">
                                {{ config('app.name') }}
                            </h1>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:30px;color:#334155;">
                            <h2 style="margin-top:0;color:#0f172a;">
                                {{ $title }}
                            </h2>

                            <p style="line-height:1.7;font-size:15px;">
                                {!! nl2br(e($messageContent)) !!}
                            </p>

                            <div style="margin-top:30px;text-align:center;">
                                <a href="{{ url('/admin-terhubung') }}"
                                   style="display:inline-block;padding:12px 30px;
                                   background:#2563eb;color:#ffffff;
                                   text-decoration:none;border-radius:6px;
                                   font-weight:bold;">
                                    Kunjungi Website
                                </a>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td style="background:#f1f5f9;padding:20px;text-align:center;font-size:12px;color:#64748b;">
                            © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>
</html>

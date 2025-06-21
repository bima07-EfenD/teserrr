@component('mail::message')
<div style="text-align: center; margin-bottom: 30px;">
    <img src="{{ asset('images/Frame.png') }}" alt="TEAM TAS Logo" style="height: 60px; margin-bottom: 20px;">
    <h1 style="color: #16a34a; font-size: 24px; margin-bottom: 20px;">Reset Password</h1>
</div>

<div style="background-color: #f3f4f6; padding: 20px; border-radius: 8px; margin-bottom: 30px;">
    <p style="color: #374151; font-size: 16px; line-height: 1.6; margin-bottom: 15px;">
        Halo {{ $name }},
    </p>
    <p style="color: #374151; font-size: 16px; line-height: 1.6; margin-bottom: 15px;">
        Kami menerima permintaan untuk mereset password akun TEAM TAS Anda. Untuk melanjutkan proses reset password, silakan klik tombol di bawah ini:
    </p>
</div>

@component('mail::button', ['url' => $url, 'color' => 'success'])
Reset Password
@endcomponent

<div style="margin-top: 30px; padding: 20px; background-color: #f3f4f6; border-radius: 8px;">
    <p style="color: #374151; font-size: 14px; line-height: 1.6; margin-bottom: 10px;">
        <strong>Catatan Penting:</strong>
    </p>
    <ul style="color: #374151; font-size: 14px; line-height: 1.6; margin: 0; padding-left: 20px;">
        <li>Link reset password ini akan kadaluarsa dalam 60 menit</li>
        <li>Jika Anda tidak meminta reset password, abaikan email ini</li>
        <li>Untuk keamanan, jangan bagikan link ini kepada siapapun</li>
    </ul>
</div>

<div style="margin-top: 30px; text-align: center; color: #6b7280; font-size: 14px;">
    <p>Jika Anda mengalami kesulitan, silakan hubungi tim support kami di:</p>
    <p style="margin: 5px 0;">Email: tanialpukatsidorejo@gmail.com</p>
    <p style="margin: 5px 0;">WhatsApp: +62 812-3456-7890</p>
</div>

<div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #e5e7eb; text-align: center; color: #6b7280; font-size: 12px;">
    <p>© {{ date('Y') }} TEAM TAS. All rights reserved.</p>
</div>
@endcomponent

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Akun</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body style="font-family: sans-serif; background-color: #211C84; color: white; min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 1rem;">

    <div style="width: 100%; background-color: #211C84; border-radius: 0.5rem; overflow: hidden; box-shadow: 0 10px 15px rgba(0,0,0,0.3);">

        <!-- Header -->
        <div style="background-color: #211C84; padding: 1.5rem;">
            <div style="margin-bottom: 1rem;">
                <img src="{{ asset('assets/logo-bg-transparant.png')}}" alt="UPC 2025" style="width: 80px; height: 50px;">{{-- ganti saat hosting url {{ asset('assets/hero-100persen.png') }} --}}
            </div>
            <h1 style="font-size: 1.25rem; font-weight: 600; color: #d1d5db;">Halo, {{ $name }}!</h1>
        </div>

        <!-- Detail Box -->
        <div style="background-color: white; color: black; padding: 20px; border-top-left-radius: 0.5rem; border-top-right-radius: 0.5rem;">
            <p style="font-size: 0.875rem; margin-bottom: 1rem; color: #000">Anda mendaftar sebagai: <strong>{{ $role }}</p>
            <p style="font-size: 0.875rem; margin-bottom: 1rem; color: #000">Akun Anda sedang menunggu proses verifikasi.<strong>{{ $role }}</p>
            <p style="font-size: 0.875rem; color: #000">Terima kasih telah mendaftar di aplikasi kami.</p>
        </div>

        {{-- footer --}}
        <div style="background-color: #211C84; padding: 1rem;">
            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td align="center" style="padding-bottom: 0.5rem;">
                        <table border="0" cellpadding="0" cellspacing="0" align="center">
                            <tr>
                                <td style="padding: 0 0.5rem;">
                                    <a href="https://wa.me/yourwhatsapplink" target="_blank" style="display: block;">
                                        <img src="{{ asset('assets/wa.png')}}" alt="WhatsApp" style="height: 24px;">
                                    </a>
                                </td>
                                <td style="padding: 0 0.5rem;">
                                    <a href="https://www.instagram.com/yourinstagramlink" target="_blank" style="display: block;">
                                        <img src="{{ asset('assets/ig.png')}}" alt="Instagram" style="height: 24px;">
                                    </a>
                                </td>
                                <td style="padding: 0 0.5rem;">
                                    <a href="https://www.tiktok.com/@yourtiktoklink" target="_blank" style="display: block;">
                                        <img src="{{ asset('assets/tiktok.png')}}" alt="TikTok" style="height: 24px; display: block;">
                                    </a>
                                </td>
                                <td style="padding: 0 0.5rem;">
                                    <a href="https://www.youtube.com/youryoutubelink" target="_blank" style="display: block;">
                                        <img src="{{ asset('assets/youtube.png')}}" alt="YouTube" style="height: 24px;">
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="padding-top: 16px;">
                        <img src="{{ asset('assets/logo-bg-transparant.png') }}" alt="UPC 2025" style="width: 40px; opacity: 0.7; display: block;">
                    </td>
                </tr>
            </table>
        </div>
        <div style="background-color: #211C84; text-align: center; padding: 6px;">
            <p style="font-size: 0.75rem; color: #9ca3af;">© 2025 MADOLAN. All Rights Reserved</p>
        </div>
    </div>

</body>
</html>


